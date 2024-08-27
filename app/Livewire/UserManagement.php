<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\User;
use App\Models\Role;

use Illuminate\Support\Facades\Hash;


class UserManagement extends Component
{
    public $users;
    public $name, $email, $password, $userId, $role;
    public $approved = false;
    public $updateMode = false;
    public $isModalOpen = false;
    public $roles;

    public function mount()
    {
        $this->roles = Role::all();
    }


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
        $this->resetErrorBag();
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

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'approved' => $this->approved
        ]);

        $defaultRole = Role::where('name', 'user')->first();
        if ($defaultRole) {
            $user->assignRole($defaultRole);
        }

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
        $this->role = $user->roles->first()->name;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->userId,
            'role' => 'required',

        ]);

        $user = User::find($this->userId);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'approved' => $this->approved,
        ]);

        $user->syncRoles($this->role);
        $this->closeModal();

        session()->flash('message', 'User Updated Successfully.');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);

        // Check if the user is an admin
        if ($user->hasRole('admin')) {
            session()->flash('error', 'Admin users cannot be deleted.');
            return;
        }
        $user->delete();
        session()->flash('message', 'User Deleted Successfully.');
    }
}
