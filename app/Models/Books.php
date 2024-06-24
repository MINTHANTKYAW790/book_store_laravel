<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $fillable = ['code_number', 'name', 'price', 'publishing_date', 'description', 'image', 'save_pdf', 'deleted', 'author_id', 'genre_id', 'publishing_house_id', 'inserted_by', 'edition'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function publishingHouse()
    {
        return $this->belongsTo(PublishingHouse::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'inserted_by');
    }
}
