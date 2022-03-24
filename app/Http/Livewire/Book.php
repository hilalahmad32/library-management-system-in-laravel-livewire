<?php

namespace App\Http\Livewire;

use App\Models\Author;
use App\Models\Book as ModelsBook;
use App\Models\Category;
use App\Models\Publisher;
use Livewire\Component;
use Livewire\WithPagination;

class Book extends Component
{
    public $showTable = true;
    public $createForm = false;
    public $updateForm = false;
    public $categorys;
    public $publishers;
    public $authors;

    public $category_id;
    public $author_id;
    public $publisher_id;
    public $book_name;

    // update variable
    public $book_id;
    public $edit_category_id;
    public $edit_author_id;
    public $edit_publisher_id;
    public $edit_book_name;


    public $search;
    public $totalBook;

    use WithPagination;
    public function render()
    {
        $this->totalBook = ModelsBook::count();
        $this->publishers = Publisher::orderBy('id', 'DESC')->get();
        $this->categorys = Category::orderBy('id', 'DESC')->get();
        $this->authors = Author::orderBy('id', 'DESC')->get();
        if ($this->search != "") {
            $books = ModelsBook::orderBy('id', 'DESC')->where('book_name', 'LIKE', '%' . $this->search . '%')->paginate(6);
            return view('livewire.book', compact('books'))->layout('layout.app');
        } else {
            $books = ModelsBook::orderBy('id', 'DESC')->paginate(6);
            return view('livewire.book', compact('books'))->layout('layout.app');
        }
    }

    public function showForm()
    {
        $this->showTable = false;
        $this->createForm = true;
    }

    public function resetField()
    {
        $this->category_id = "";
        $this->author_id = "";
        $this->publisher_id = "";
        $this->book_name = "";

        // update variable
        $this->book_id = "";
        $this->edit_category_id = "";
        $this->edit_author_id = "";
        $this->edit_publisher_id = "";
        $this->edit_book_name = "";
    }
    public function goBack()
    {
        $this->showTable = true;
        $this->createForm = false;
        $this->updateForm = false;
    }

    public function store()
    {
        $validate = $this->validate([
            'category_id' => ['required'],
            'publisher_id' => ['required'],
            'author_id' => ['required'],
            'book_name' => ['required'],
        ]);

        $result = ModelsBook::create($validate);
        if ($result) {
            session()->flash('success', 'Book Add Successfully');
            $this->showTable = true;
            $this->createForm = false;
            $this->resetField();
        } else {
            session()->flash('error', 'Author Not Add Successfully');
        }
    }
    public function editBook($id)
    {
        $this->showTable = false;
        $this->updateForm = true;
        $books = ModelsBook::findOrFail($id);

        $this->book_id = $books->id;
        $this->edit_category_id = $books->category_id;
        $this->edit_author_id = $books->author_id;
        $this->edit_publisher_id = $books->publisher_id;
        $this->edit_book_name = $books->book_name;
    }

    public function update($id)
    {
        $books = ModelsBook::findOrFail($id);
        $books->book_name = $this->edit_book_name;
        $books->category_id = $this->edit_category_id;
        $books->publisher_id = $this->edit_publisher_id;
        $books->author_id = $this->edit_author_id;
        $result = $books->save();
        if ($result) {
            session()->flash('success', 'Book Add Successfully');
            $this->showTable = true;
            $this->updateForm = false;
            $this->resetField();
        } else {
            session()->flash('error', 'Author Not Add Successfully');
        }
    }

    public function deleteBook($id)
    {
        $result = ModelsBook::findOrFail($id)->delete();
        if ($result) {
            session()->flash('success', 'Book Delete Successfully');
        } else {
            session()->flash('error', 'Author Not Delete Successfully');
        }
    }
}
