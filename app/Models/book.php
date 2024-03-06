<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'author_id',
        'publisher_id',
        'year',
        'cover'
    ];

    public function author()
    {
        return $this->belongsTo(author::class);
    }
    public function publisher()
    {
        return $this->belongsTo(publisher::class);
    }

}
