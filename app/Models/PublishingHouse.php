<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublishingHouse extends Model
{
    protected $fillable = ['name'];
    public function books()
    {
        return $this->hasMany(Books::class);
    }
}
