<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Book extends Component
{
    public $showTable = true;
    public $createForm = false;
    public $updateForm = false;
    public $categorys;
    public function render()
    {

        return view('livewire.book')->layout('layout.app');
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
}
