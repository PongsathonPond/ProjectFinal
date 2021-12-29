<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class routeController extends Controller
{
    public function index()
    {

        $role = Auth::user()->role;

        if ($role == '1') {
            return view('page.Admin.Route.index');

        } else {

            return view('page.User.Route.index');
        }
    }
}
