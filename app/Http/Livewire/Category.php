<?php

namespace App\Http\Livewire;

use App\Models\Category as ModelsCategory;
use Livewire\Component;
use Livewire\WithPagination;

class Category extends Component
{
    public $showTable = true;
    public $createForm = false;
    public $updateForm = false;
    public $category_name;

    public $category_id;
    public $edit_category_name;
    public $search;

    public $totalCategory;

    use WithPagination;
    public function render()
    {
        $this->totalCategory = ModelsCategory::count();
        $searchItem = '%' . $this->search . '%';
        if ($searchItem) {
            $categorys = ModelsCategory::orderBy('id', 'DESC')->where('category_name', 'LIKE', $searchItem)->paginate(6);
            return view('livewire.category', compact('categorys'))->layout('layout.app');
        }
        $categorys = ModelsCategory::orderBy('id', 'DESC')->paginate(6);
        return view('livewire.category', compact('categorys'))->layout('layout.app');
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
            'category_name' => ['required', 'string', 'unique:categories']
        ]);
        $result = ModelsCategory::create($validate);
        if ($result) {
            session()->flash('success', 'Category Add Successfully');
            $this->showTable = true;
            $this->createForm = false;
            $this->category_name = '';
        } else {
            session()->flash('error', 'Category Not Add Successfully');
        }
    }

    public function editCategory($id)
    {
        $this->showTable = false;
        $this->updateForm = true;
        $categorys = ModelsCategory::find($id);
        $this->category_id = $categorys->id;
        $this->edit_category_name = $categorys->category_name;
    }

    public function update($id)
    {
        $categorys = ModelsCategory::find($id);
        // $this->validate([
        //     'category_name' => ['required']
        // ]);

        $categorys->category_name = $this->edit_category_name;
        $result = $categorys->save();
        if ($result) {
            session()->flash('success', 'Category Update Successfully');
            $this->showTable = true;
            $this->updateForm = false;
            $this->edit_category_name = '';
        } else {
            session()->flash('error', 'Category Not Update Successfully');
        }
    }

    public function deleteCategory($id)
    {
        $result = ModelsCategory::find($id)->delete();
        $result
            ?  session()->flash('success', 'Category Delete Successfully')
            :  session()->flash('error', 'Category Not Delete Successfully');
    }
}
