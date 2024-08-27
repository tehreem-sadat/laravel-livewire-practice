<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function viewBusinessForm(User $user)
    {
        // Fetch the user's form details if necessary
        $businessDetail = $user->businessDetail; // assuming a relationship or query to get form details

        return view('view-business-form', compact('user', 'businessDetail'));
    }
}
