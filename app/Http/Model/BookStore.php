<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class BookStore extends Model
{
    protected $table = 'book_store';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'isbn',
        'value',
    ];
}
