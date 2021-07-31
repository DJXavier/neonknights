<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Rules\IsValidPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ChangePasswordController extends Controller
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
    public function changePassword()
    {
        return view('auth.changePassword');
    } 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required', new IsValidPassword, 'different:current_password'],
            'confirmed_password' => ['required', 'same:new_password'],
        ]);

        Auth::user()->update(['password'=> Hash::make($request->new_password)]);

        return redirect('changePasswordSuccessfully');
    }
}