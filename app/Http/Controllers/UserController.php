<?php


namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function posts($id)
    {
        $user = User::findOrFail($id);
        return $user->posts;
    }
}
