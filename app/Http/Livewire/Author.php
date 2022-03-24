<?php

namespace App\Http\Livewire;

use App\Models\Author as ModelsAuthor;
use Livewire\Component;
use Livewire\WithPagination;

class Author extends Component
{
    public $showTable = true;
    public $createForm = false;
    public $updateForm = false;
    public $author_name;
    public $search;
    public $author_id;
    public $edit_author_name;
    public $totalAuthor;

    use WithPagination;
    public function render()
    {
        $this->totalAuthor = ModelsAuthor::count();

        $searchTerm = '%' . $this->search . '%';
        if ($this->search != '') {
            $authors = ModelsAuthor::where('author_name', 'LIKE', $searchTerm)->orderBy('id', 'DESC')->paginate(6);
            return view('livewire.author', compact('authors'))->layout('layout.app');
        }
        $authors = ModelsAuthor::orderBy('id', 'DESC')->paginate(6);
        return view('livewire.author', compact('authors'))->layout('layout.app');
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
    public function store()
    {
        $validate = $this->validate([
            'author_name' => ['required', 'string', 'unique:authors'],
        ]);

        $result = ModelsAuthor::create($validate);
        if ($result) {
            session()->flash('success', 'Author Add Successfully');
            $this->showTable = true;
            $this->createForm = false;
            $this->author_name = '';
        } else {
            session()->flash('error', 'Author Not Add Successfully');
        }
    }

    public function editAuthor($id)
    {
        $this->showTable = false;
        $this->updateForm = true;
        $authors = ModelsAuthor::findORFail($id);
        $this->author_id = $authors->id;
        $this->edit_author_name = $authors->author_name;
    }

    public function update($id)
    {
        $authors = ModelsAuthor::findOrFail($id);
        // $tis->validate([
        //     'edit_author_name' => ['required', 'string', 'unique:authors'],
        // ]);h

        $authors->author_name = $this->edit_author_name;
        $result = $authors->save();

        if ($result) {
            session()->flash('success', 'Author Update Successfully');
            $this->showTable = true;
            $this->updateForm = false;
            $this->edit_author_name = '';
        } else {
            session()->flash('error', 'Author Not Update Successfully');
        }
    }

    public function deleteAuthor($id)
    {
        $authors = ModelsAuthor::findOrFail($id);
        $result = $authors->delete();
        if ($result) {
            session()->flash('success', 'Author Delete Successfully');
        } else {
            session()->flash('error', 'Author Not Delete Successfully');
        }
    }
}
