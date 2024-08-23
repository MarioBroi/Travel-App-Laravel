<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable = ["trip_id", "title", "description", "image", "notes", "rating", "is_completed"];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
