<?php

namespace App\Http\Livewire;

use App\Models\Publisher as ModelsPublisher;
use Livewire\Component;
use Livewire\WithPagination;

class Publisher extends Component
{
    public $showTable = true;
    public $createForm = false;
    public $updateForm = false;
    public $search;
    public $publisher_name;
    public $publisher_id;
    public $edit_publisher_name;

    public $totalPublisher;

    use WithPagination;
    public function render()
    {
        $this->totalPublisher = ModelsPublisher::count();
        $searchItem = '%' . $this->search . '%';
        if ($searchItem) {
            $publishers = ModelsPublisher::orderBy('id', 'DESC')->where('publisher_name', 'LIKE', $searchItem)->paginate(6);
            return view('livewire.publisher', compact('publishers'))->layout('layout.app');
        }
        $publishers = ModelsPublisher::orderBy('id', 'DESC')->paginate(6);
        return view('livewire.publisher', compact('publishers'))->layout('layout.app');
    }

    public function goBack()
    {
        $this->showTable = true;
        $this->createForm = false;
        $this->updateForm = false;
    }

    public function showForm()
    {
        $this->showTable = false;
        $this->createForm = true;
    }

    public function store()
    {
        $validate = $this->validate([
            'publisher_name' => ['required', 'string', 'unique:publishers']
        ]);
        $result = ModelsPublisher::create($validate);
        if ($result) {
            session()->flash('success', 'Publisher Add Successfully');
            $this->showTable = true;
            $this->createForm = false;
            $this->publisher_name = "";
        } else {
            session()->flash('success', 'Publisher Not Add Successfully');
        }
    }

    public function editPublisher($id)
    {
        $this->showTable = false;
        $this->updateForm = true;
        $publishers = ModelsPublisher::find($id);
        $this->publisher_id = $publishers->id;
        $this->edit_publisher_name = $publishers->publisher_name;
    }

    public function update($id)
    {
        $publishers = ModelsPublisher::find($id);
        $publishers->publisher_name = $this->edit_publisher_name;
        $result = $publishers->save();
        if ($result) {
            session()->flash('success', 'Publisher Update Successfully');
            $this->showTable = true;
            $this->updateForm = false;
            $this->edit_publisher_name = "";
        } else {
            session()->flash('success', 'Publisher Not Update Successfully');
        }
    }
    public function deletePublisher($id)
    {
        $result = ModelsPublisher::find($id)->delete();
        $result
            ? session()->flash('success', 'Publisher Delete Successfully')
            : session()->flash('success', 'Publisher Not Delete Successfully');
    }
}
