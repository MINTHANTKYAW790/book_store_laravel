<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['author_name'];
    public function books()
    {
        return $this->hasMany(Books::class);
    }
}
