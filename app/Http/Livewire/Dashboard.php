<?php

namespace App\Http\Livewire;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\IssueBook;
use App\Models\Publisher;
use App\Models\Student;
use Livewire\Component;

class Dashboard extends Component
{
    public $totalAuthor;
    public $totalPublisher;
    public $totalCategory;
    public $totalBooks;
    public $totalStudent;
    public $totalIssueBook;
    public function render()
    {
        $this->totalAuthor = Author::count();
        $this->totalPublisher = Publisher::count();
        $this->totalCategory = Category::count();
        $this->totalBooks = Book::count();
        $this->totalStudent = Student::count();
        $this->totalIssueBook = IssueBook::where('issue_status', 'N')->count();
        return view('livewire.dashboard')->layout('layout.app');
    }
}
