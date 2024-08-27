<?php

namespace App\Livewire;

use App\Models\BusinessDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BusinessDetailsForm extends Component
{
    public $business_email, $name, $type, $abn, $account_number;

    public function submit()
    {
        $this->validate([
            'business_email' => 'required|email',
            'name' => 'required',
            'type' => 'required',
            'abn' => 'required',
            'account_number' => 'required',
        ]);

        // Save business details
        BusinessDetail::create([
            'user_id' => Auth::id(),
            'business_email' => $this->business_email,
            'name' => $this->name,
            'type' => $this->type,
            'abn' => $this->abn,
            'account_number' => $this->account_number,
        ]);

        // Update user business details filled status
        Auth::user()->update(['business_details_filled' => true]);

        return redirect()->route('dashboard'); // Redirect to dashboard or appropriate route
    }

    public function render()
    {
        return view('livewire.business-details-form')->layout('layouts.app');;
    }
}
