<?php

namespace App\Http\Controllers;

class AddSloleksDataController extends Controller
{
    public function __invoke($id)
    {
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }
}
