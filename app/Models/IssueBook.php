<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssueBook extends Model
{
    use HasFactory;

    protected $table = 'issue_books';
    public function students()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function books()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
