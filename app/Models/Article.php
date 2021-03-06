<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'body', 'image', 'published_at'];

    /*
    |------------------------------------------------------------------------------------
    | Relations
    |------------------------------------------------------------------------------------
    */
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    /*
    |------------------------------------------------------------------------------------
    | Attributes
    |------------------------------------------------------------------------------------
    */

    public function getImageAttribute()
    {
        $image = $this->attributes['image'];

        if (\Str::startsWith($image, 'http')) {
            return $image;
        }

        return 'uploads/' . $image;
    }
}
