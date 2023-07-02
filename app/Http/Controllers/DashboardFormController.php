<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class DashboardFormController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(Auth::id());

        return view('dashboard.form.index', compact('user'));

    }
    

}
