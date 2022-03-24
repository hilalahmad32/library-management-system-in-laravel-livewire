<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\IssueBook as ModelsIssueBook;
use App\Models\Setting;
use App\Models\Student;
use Livewire\Component;

class IssueBook extends Component
{
    public $showTable = true;
    public $createForm = false;
    public $updateForm = false;

    public $students;
    public $books;

    public $student_id;
    public $book_id;

    public $issue_id;
    public $student_name;
    public $book_name;
    public $phone;
    public $email;
    public $issue_date;
    public $return_date;
    public $book_status;

    public $totalIssueBook;
    public function render()
    {
        $this->totalIssueBook = ModelsIssueBook::count();
        $this->students = Student::orderBy('id', 'DESC')->get();
        $this->books = Book::where('book_status', 'Y')->orderBy('id', 'DESC')->get();

        $issues = ModelsIssueBook::orderBy('id', 'DESC')->paginate(6);
        return view('livewire.issue-book', compact('issues'))->layout('layout.app');
    }

    public function showForm()
    {
        $this->showTable = false;
        $this->createForm = true;
    }

    public function goBack()
    {
        $this->showTable = true;
        $this->createForm = false;
        $this->updateForm = false;
    }

    public function resetField()
    {
        $this->student_id;
        $this->book_id;
    }
    public function store()
    {
        $issue = new ModelsIssueBook();
        $this->validate([
            'student_id' => ['required'],
            'book_id' => ['required'],
        ]);

        $return_days = "";
        $days = Setting::all('return_days');
        foreach ($days as $day) {
            $return_days = $day->return_days;
        }

        $issue->book_id = $this->book_id;
        $issue->student_id = $this->student_id;
        $issue->issue_date = date('Y-m-d');
        $issue->return_date = date('Y-m-d', strtotime("+" . $return_days . "days"));
        $result = $issue->save();

        if ($result) {
            $books = Book::findOrFail($this->book_id);
            $books->book_status = 'N';
            $books->save();
            session()->flash('success', 'Book Issue Successfully');
            $this->showTable = true;
            $this->createForm = false;
        } else {
            session()->flash('error', 'Author Not Issue Successfully');
        }
    }

    public function editBook($id)
    {
        $this->updateForm = true;
        $this->showTable = false;

        $issues = ModelsIssueBook::findOrFail($id);
        $this->issue_id = $issues->id;
        $this->student_name = $issues->students->name;
        $this->book_name = $issues->books->book_name;
        $this->phone = $issues->students->phone;
        $this->email = $issues->students->email;
        $this->issue_date = $issues->issue_date;
        $this->return_date = $issues->return_date;
        $this->issue_status = $issues->issue_status;
    }

    public function returnBook($id)
    {
        $issues = ModelsIssueBook::findOrFail($id);
        $issues->issue_status = 'Y';
        $issues->return_date = date('Y-m-d');
        $result = $issues->save();

        if ($result) {
            $books = Book::findOrFail($issues->book_id);
            $books->book_status = 'Y';
            $books->save();
            session()->flash('success', 'Book Issue Retruned Successfully');
            $this->updateForm = false;
            $this->showTable = true;
        } else {
            session()->flash('error', 'Author Not Issue Retruned Successfully');
        }
    }

    public function deleteBook($id)
    {
        $issues = ModelsIssueBook::findOrFail($id);
        $result = $issues->delete();
        if ($result) {
            $books = Book::findOrFail($issues->book_id);
            $books->book_status = 'Y';
            $books->save();
            session()->flash('success', 'Book Issue Delete Successfully');
        } else {
            session()->flash('error', 'Author Not Issue Delete Successfully');
        }
    }
}
