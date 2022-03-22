<?php

namespace App\Http\Livewire;

use App\Models\Student as ModelsStudent;
use Livewire\Component;

class Student extends Component
{
    public $showTable = true;
    public $createForm = false;
    public $updateForm = false;

    public $name;
    public $email;
    public $address;
    public $phone;
    public $gender;
    public $classes;
    public function render()
    {

        $students = ModelsStudent::orderBy('id', 'DESC')->get();

        return view('livewire.student', compact('students'))->layout('layout.app');
    }

    public function showForm()
    {
        $this->showTable = false;
        $this->createForm = true;
    }

    public function resetField()
    {

        $this->name = "";
        $this->email = "";
        $this->address = "";
        $this->phone = "";
        $this->gender = "";
        $this->classes = "";
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
            'name' => ['required', 'string', 'unique:students'],
            'email' => ['required', 'string', 'unique:students'],
            'phone' => ['required', 'string', 'unique:students'],
            'address' => ['required'],
            'gender' => ['required'],
            'classes' => ['required'],
        ]);

        $result = ModelsStudent::create($validate);
        if ($result) {
            session()->flash('success', 'Student Add Successfully');
            $this->showTable = true;
            $this->createForm = false;
            $this->resetField();
        } else {
            session()->flash('error', 'Student Not Add Successfully');
        }
    }
}
