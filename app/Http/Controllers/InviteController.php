<?php
    namespace App\Http\Controllers;
    use App\Models\InvitedUser;
    use App\Models\Game;
    use App\Models\User;
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
            $game = Game::all();
           
            return view('user.invite_user')->with('game',$game);
           
        }
        

        public function update(Request $request)
        {
            $game= Game::find($request->get('thisId'));
            //using a local variable emailList 
            $emailList = array();
            $curGameMaster = User::findOrFail($game->gameMaster);
            //pushing in current game master into the email list first 
            array_push($emailList,$curGameMaster->email);

            //then looping through all players from input field
            for($k = 1; $k < $game->noPlayers; $k++){
                $tempName = 'player' . $k;
                $request->validate([
                    $tempName=>'required|email'
                ]);
                array_push($emailList,$request->get($tempName));
            }
            //fiannly make invited field in game collection equals to emaillist contents
            $game->invited = $emailList;

            $game->save();
            
            $game = Game::findOrFail($request->get('thisId'));
            //now we sent mail to those emails
            foreach ($emailList as $recipient) {
                Mail::to($recipient)->send(new GameInvite($game));
            }
            
            
            return redirect('/invite-successful')->with('success', 'game property has been successfully update');
        }

        
    }
?>