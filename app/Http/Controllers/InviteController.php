<?php
    namespace App\Http\Controllers;
    use App\Models\InvitedUser;
    use App\Models\GameProperty;
    use Illuminate\Http\Request;
    use Carbon\Carbon;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Mail\Mailable;
    use Mail;
    use App\Mail\GameInvite;


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
            $emailList = array();
           
            for($k = 1; $k < $gameProperty->noPlayers; $k++){
                $tempName = 'player' . $k;
                $request->validate([
                    $tempName=>'required|email'
                ]);
                $gameProperty->user_array = $gameProperty->user_array.','.$request->get($tempName);
                array_push($emailList,$request->get($tempName));
                
            }
            
            $gameProperty->save();
            
            $gameProperty = GameProperty::findOrFail($request->get('thisId'));
            foreach ($emailList as $recipient) {
                Mail::to($recipient)->send(new GameInvite($gameProperty));
            }
            //now we want to mail to those emails
            //To retrieve emails, just use $emaisToSentList
            //eg: $emaisToSentList[0], $emaisToSentList[1], according to for your self-made for loop

            return redirect('/invite-successful')->with('success', 'game property has been successfully update');
        }

        
    }
?>