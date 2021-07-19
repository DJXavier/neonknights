<?php
    namespace App\Http\Controllers;
    use App\Models\GameProperty;
    use Illuminate\Http\Request;
    use Carbon\Carbon;
    use Illuminate\Support\Facades\Auth;
    
    class CreateGroupController extends Controller{
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
            return view('user.create-group')->with('gameProperties',$gameProperty);

            //return view('create-group',compact('gameProperty','gameProperty'));
        } 

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            $request->validate([
                'name'=>'required|Min:5|Max:20|',
                'type'=> 'required',
                'noPlayers' => 'required'
            ],
            [
                'name.required' => 'Game Name is required. (At least 5 letters and no more than 20 letters)',
                'type.required' => 'You need to select Game type.',
                'noPlayers.required' => 'You need to select Number of players.'
            ]);
            
    
            $gameProperty = new GameProperty([
                'name' => $request->get('name'),
                'type'=> $request->get('type'),
                'noPlayers'=> $request->get('noPlayers'),
                'dayOfWeek' => Carbon::parse(now())->format('l'),
                'user_array' => Auth::user()->email

            ]);
    
            
            //return Redirect::to('changePassword',compact('message'));
            $gameProperty->save();
            session()->remove('curId');
            session()->put('curId', $gameProperty->_id);
            return redirect('/invite-user');
        }
 
 
    }

?>