<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\Rules;

class ChangeInfoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('changeInfo');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'new_name' => ['required', 'string', 'max:255'],
            'new_username' => ['required', 'string', 'max:190', 'unique:users,username,'.auth('web')->id()],
            'new_email' => ['required', 'string', 'email:rfc,strict,dns,spoof,filter', 'max:255'],
            'new_phone' => ['required', 'string', 'max:11']
        ]);

        User::find(auth()->user()->id)->update([
            'name'=> $request->new_name,
            'username'=> $request->new_username,
            'email'=> $request->new_email,
            'phone'=> $request->new_phone
        ]);

        return redirect()->route('dashboard');
    }
}
