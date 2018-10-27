<?php

namespace Opencycle\Http\Controllers;

use Opencycle\Group;
use Opencycle\User;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::count();
        $users = User::count();

        return view('home', compact('groups', 'users'));
    }
}
