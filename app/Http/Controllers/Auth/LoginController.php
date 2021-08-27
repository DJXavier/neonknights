<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\SQLUser;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated(Request $request, $user) {
        $sqlinstance = SQLUser::all()->filter(function ($value, $key) use ($user) {
            return $value->mongo_id == $user->_id;
        })->first();
        
        if($sqlinstance == null) {
            SQLUser::create([
                'name' => $user->name,
                'email' => $user->email,
                'mongo_id' => $user->_id,
            ]);
        } else {
            if ($sqlinstance->name != $user->name)
                $sqlinstance->name = $user->name;
            if ($sqlinstance->email != $user->email)
                $sqlinstance->email = $user->email;
            if ($sqlinstance->mongo_id != $user->_id)
                $sqlinstance->mongo_id = $user->_id;
            
            if ($sqlinstance->isDirty())
                $sqlinstance->save();
        }
    }
}
