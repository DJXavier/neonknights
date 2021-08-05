<?php
    namespace App\Http\Controllers;
    use App\Models\GameProperty;
    use Illuminate\Http\Request;

    class InviteController extends Controller{
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
            $gameProperty = GameProperty::all();
            //$invitedUser = InvitedUser::all();
            //return view('user.invite_user',compact('currentGame'));
           
            return view('user.invite_user')->with('gameProperties',$gameProperty);

        } 

        public function store(){

        }

       



    }
?>