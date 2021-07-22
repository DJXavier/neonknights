@extends('layouts.app')

<style>
    .groupSizeValue
    {
        text-align: right;
    }
</style>

<title>Invite Players</title>

@section('content')
<div class="container">
    <div class="row justify-content-left">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Invite Player') }}</div>

                <div class="card-body">
                    <form action="{{ route('invite.property') }}" method="GET">

                        @csrf 
                        <!-- @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                        @endforeach  -->
                        @if(session()->get('curId') != "0")
                            {{'Game id is:'}}
                            {{ $gameProperties->where('_id',session()->get('curId'))->pluck('id')[0]}}
                            <br>
                        @endif

                        <div class="form-group row">
                        
                            <?php 
                                $count =$gameProperties->where('_id',session()->get('curId'))->pluck('noPlayers');
                                
                                if($count[0] != '0'){
                                   // echo $count[0]; 
                                }
                                session()->put('playerCount',$count[0]);
                            ?> 

                        </div>
                    </form>

                    <form action="{{route('invite.propertySubmit')}}" method="POST">
                        @csrf 
                        @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                        @endforeach 
                        <?php 
                            $thisId = session()->get('curId');
                            echo '<input value ="' . $thisId . '"' . 'type="hidden" name="thisId" id="thisId">';
                        ?>
                        <div class="form-group row">
                            <label for="playerEmails" class="col-md-4 col-form-label text-md-right">Player Emails</label>
                            
                            <div class="col-md-6"  >
                                <?php 
                                    for($i = 1; $i < session()->get('playerCount'); $i++){
                                        echo $i;
                                        echo '.';
                                        echo '<input value="" type="display" name="player'. $i . '"' . 'id="player' . $i .'"><br></br>'; 
                                    }
                                ?> 
                            </div>    
                            
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm') }}
                                </button>
                                 
                            </div>
                        </div>

                    </form>
                    

                    
                </div>
            </div>
        </div>
    </div
</div>
@endsection
