<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function getAllUsers()
    {
        return User::all();
    }
    public function getAdminUsers()
    {
        return User::where('role', 'admin')->get();
    }
    public function getCustomerUsers()
    {
        return User::where('role', 'user')->get();
    }
    public function getManagerUsers()
    {
        return User::where('role', 'manager')->get();
    }
}
