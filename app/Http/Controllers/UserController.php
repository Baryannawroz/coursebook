<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();


        return view('users.user_index', compact('users'));
    }
    public function edit(User $user)

    {



        return view('users.user_edit', compact('user'));
    }
    public function update(User $user, Request $request)

    {
        $user->role = $request['role_id'];
        $user->save();


        return redirect('Users');
    }
}
