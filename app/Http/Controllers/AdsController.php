<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AdsController extends Controller
{
    public function index()
    {
        $ads = Ad::paginate(10);
        return response()->json($ads);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric|min:0',
        ]);

        $ad = Ad::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return response()->json($ad, Response::HTTP_CREATED);
    }

    public function show(Ad $ad)
    {
        return response()->json($ad);
    }

    public function update(Request $request, Ad $ad)
    {
        if ($ad->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], Response::HTTP_FORBIDDEN);
        }

        $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string|max:1000',
            'price' => 'sometimes|numeric|min:0',
        ]);

        $ad->update($request->only(['title', 'description', 'price']));

        return response()->json($ad);
    }

    public function destroy(Ad $ad)
    {
        if ($ad->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], Response::HTTP_FORBIDDEN);
        }

        $ad->delete();
        return response()->json(['message' => 'Deleted successfully'], Response::HTTP_NO_CONTENT);
    }
}
