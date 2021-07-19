<?php
    namespace App\Http\Controllers;
    use App\Models\InvitedUser;
    use App\Models\GameProperty;
    use Illuminate\Http\Request;
    use Carbon\Carbon;
    use Illuminate\Support\Facades\Auth;

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
        public function index(Request $request)
        {
            $gameProperty = GameProperty::all();
           
            return view('user.invite_user')->with('gameProperties',$gameProperty);
           
        } 

        public function update(Request $request)
        {
            $gameProperty= GameProperty::find($request->get('thisId'));
            
            //array_push($gameProperty->user_array,$request->get('player1'));
            //$gameProperty->user_array = $request->get('player1');   
            for($k = 1; $k < $gameProperty->noPlayers; $k++){
                $tempName = 'player' . $k;
                $gameProperty->user_array = $gameProperty->user_array.','.$request->get($tempName);
            }
            
           // $request->input($gameProperty->user_array.','.$request->get('player1'));     
            $gameProperty->save();
            return redirect('/')->with('success', 'game property has been successfully update');
        }

        public function store(Request $request)
        {
            $request->validate([
                'user_array'=>'required',
            ],
            [
                'user_array' => 'Please type the E-mail address.'
            ]);


            $gameProperty = new InvitedUser([
                'user_array' => $request -> get('player1')
            ]);

            $invitedUser -> save();

            return redirect('/');
        }
    }
?>