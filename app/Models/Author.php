<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use HasFactory;


    protected $table = 'authors';
    protected $fillable = ['author_name'];


    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
