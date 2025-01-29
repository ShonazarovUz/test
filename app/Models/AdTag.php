<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'ad_id',
        'tag_id',
    ];

    // AdTag orqali Ad va Tag o'rtasidagi ko'plab-ko'plarga munosabat
    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
