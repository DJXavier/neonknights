<?php
namespace App\Http\Controllers;
use App\Models\GameProperty;
use Illuminate\Http\Request;

    class InviteuserController extends Controller{
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
    public function store(Request $request)
    {
        $request->validate([
            'inviteemail'=>'required',
        ],
        [
            'inviteemail.required' => 'Please type the E-mail address.'
        ]);


        $gameProperty = new GameProperty([
            'user_array' => $request -> get('inviteemail')
        ]);

        $gameProperty -> save();

        return redirect('/');
    }
}
?>