<?php

namespace App\Http\Livewire;

use App\Models\Student as ModelsStudent;
use Livewire\Component;
use Livewire\WithPagination;

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

    public $student_id;
    public $edit_name;
    public $edit_email;
    public $edit_address;
    public $edit_phone;
    public $edit_gender;
    public $edit_classes;

    public $search;
    public $totalStudent;
    use WithPagination;
    public function render()
    {
        $this->totalStudent = ModelsStudent::count();
        if ($this->search) {
            $students = ModelsStudent::where('name', 'LIKE', '%' . $this->search . '%')->orderBy('id', 'DESC')->paginate(6);
            return view('livewire.student', compact('students'))->layout('layout.app');
        }
        $students = ModelsStudent::orderBy('id', 'DESC')->paginate(6);

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

        $this->student_id = "";
        $this->edit_name = "";
        $this->edit_email = "";
        $this->edit_address = "";
        $this->edit_phone = "";
        $this->edit_gender = "";
        $this->edit_classes = "";
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

    public function editStudent($id)
    {
        $this->showTable = false;
        $this->updateForm = true;
        $students = ModelsStudent::findOrFail($id);

        $this->student_id = $students->id;
        $this->edit_name = $students->name;
        $this->edit_email = $students->email;
        $this->edit_address = $students->address;
        $this->edit_phone = $students->phone;
        $this->edit_gender = $students->gender;
        $this->edit_classes = $students->classes;
    }

    public function update($id)
    {
        $this->showTable = false;
        $this->updateForm = true;
        $students = ModelsStudent::findOrFail($id);

        $students->name = $this->edit_name;
        $students->email = $this->edit_email;
        $students->address = $this->edit_address;
        $students->phone = $this->edit_phone;
        $students->gender = $this->edit_gender;
        $students->classes = $this->edit_classes;
        $result = $students->save();
        if ($result) {
            session()->flash('success', 'Student Update Successfully');
            $this->showTable = true;
            $this->updateForm = false;
            $this->resetField();
        } else {
            session()->flash('error', 'Student Not Update Successfully');
        }
    }

    public function deleteStudent($id)
    {
        $result = ModelsStudent::findOrFail($id)->delete();
        if ($result) {
            session()->flash('success', 'Student Delete Successfully');
        } else {
            session()->flash('error', 'Student Not Delete Successfully');
        }
    }
}
