<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $fillable = ['name', 'email', 'phone', 'address', 'gender', 'classes'];

    public function issues()
    {
        return $this->hasMany(IssueBook::class);
    }
}
