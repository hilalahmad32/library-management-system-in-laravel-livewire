<?php

namespace App\Http\Livewire;

use App\Models\Setting as ModelsSetting;
use Livewire\Component;

class Setting extends Component
{
    public $showTable = true;
    public $updateForm = false;

    public $setting_id;
    public $return_days;
    public $fine;

    public function render()
    {
        $settings = ModelsSetting::find(1);
        return view('livewire.setting', compact('settings'))->layout('layout.app');
    }

    public function goBack()
    {
        $this->showTable = true;
        $this->updateForm = false;
    }

    public function editSetting($id)
    {
        $this->showTable = false;
        $this->updateForm = true;
        $settings = ModelsSetting::find($id);
        $this->setting_id = $settings->id;
        $this->return_days = $settings->return_days;
        $this->fine = $settings->fine;
    }

    public function update($id)
    {
        $settings = ModelsSetting::find($id);

        $settings->return_days = $this->return_days;
        $settings->fine = $this->fine;
        $result = $settings->save();
        if ($result) {
            session()->flash('success', 'Setting Update Successfully');
            $this->showTable = true;
            $this->updateForm = false;
            $this->return_days = '';
            $this->fine = '';
        } else {
            session()->flash('error', 'Category Not Update Successfully');
        }
    }
}
