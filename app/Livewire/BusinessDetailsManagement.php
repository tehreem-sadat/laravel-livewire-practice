<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BusinessDetail;

class BusinessDetailsManagement extends Component
{
    public $forms;

    public function mount()
    {

        $this->forms = BusinessDetail::all();
    }

    public function render()
    {

        return view('livewire.business-details-management')->layout('layouts.app');
    }
}
