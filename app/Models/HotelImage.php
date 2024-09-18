<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelImage extends Model
{
    use HasFactory;

    protected $table = 'hotel_images';
    protected $fillable = ['hotel_id', 'image_path'];
    protected $appends = ['image_path'];


    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function getImagePathAttribute()
    {
        return asset($this->attributes['image_path']);
    }


}
