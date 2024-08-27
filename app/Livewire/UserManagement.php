<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserManagement extends Component
{
    public $users;
    public $name, $email, $password, $userId;
    public $approved = false;
    public $updateMode = false;
    public $isModalOpen = false;


    public function render()
    {
        $this->users = User::all();
        return view('livewire.user-management')->layout('layouts.app');
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->resetInputFields();
        $this->isModalOpen = false;
        $this->updateMode = false;
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->userId = '';
        $this->approved = false;
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'approved' => $this->approved
        ]);

        $this->closeModal();
        session()->flash('message', 'User Created Successfully.');
    }

    public function create()
    {
        $this->updateMode = false;
        $this->isModalOpen = true;
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->userId = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->approved = $user->approved;
        $this->updateMode = true;
        $this->isModalOpen = true;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->userId,
        ]);

        $user = User::find($this->userId);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'approved' => $this->approved,
        ]);

        $this->closeModal();

        session()->flash('message', 'User Updated Successfully.');
    }

    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('message', 'User Deleted Successfully.');
    }
}
