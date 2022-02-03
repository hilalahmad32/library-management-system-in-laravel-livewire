<?php

namespace App\Http\Livewire;

use App\Models\Setting as ModelsSetting;
use Livewire\Component;

class Setting extends Component
{
    public $return_days;
    public $fine;
    public $setting_id;

    public function render()
    {
        $settings = ModelsSetting::find(1);
        $this->setting_id = $settings->id;
        return view('livewire.setting')->layout('layout.app');
    }

    public function update($id)
    {
        $settings = ModelsSetting::find(1);
        $settings->return_days = $this->return_days;
        $settings->fine = $this->fine;
        $result = $settings->save();
        if ($result) {
            session()->flash('success', 'Setting Update Successfully');
        } else {
            session()->flash('error', 'Setting Not Update Successfully');
        }
    }
}
