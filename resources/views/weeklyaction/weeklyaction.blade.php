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
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Weekly Action Panel') }}</div>

                <div class="card-body">
                    
                    <form action="/weeklyaction/{{session('id')}}/{{session('userId')}}" method="POST">
                        @csrf 
                        @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                        @endforeach 
                        
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">First action</label>
                            <div class="col-md-6">
                                <select name="firstaction" type="String" class="form-control" id="firstaction">
                                    <option value="">-- Select first action --</option>
                                    <option value="Going on Quests">Going on Quests</option>
                                    <option value="Flirt with a Noblebot">Flirt with a Noblebot</option>
                                    <option value="Party at the Tavern">Party at the Tavern</option>
                                    <option value="Train Jousting Skills">Train Jousting Skills</option>
                                    <option value="Write a song or a poem">Write a song or a poem</option>
                                    <option value="Joust against another playing character">Joust against another playing character</option>
                                    <option value="Slacking ">Slacking </option>
                                </select>
                                
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">Second Action</label>
                            <div class="col-md-6">
                                <select name="secondaction" type="String" class="form-control" id="secondaction">
                                    <option value="">-- Select second action --</option>
                                    
                                    <option value="Flirt with a Noblebot">Flirt with a Noblebot</option>
                                    <option value="Party at the Tavern">Party at the Tavern</option>
                                    <option value="Train Jousting Skills">Train Jousting Skills</option>
                                    <option value="Write a song or a poem">Write a song or a poem</option>
                                    <option value="Joust against another playing character">Joust against another playing character</option>
                                    <option value="Slacking ">Slacking </option>
                                </select>
                                
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">Third Action</label>
                            <div class="col-md-6">
                                <select name="thirdaction" type="String" class="form-control" id="thirdaction">
                                    <option value="">-- Select third action --</option>           
                                    <option value="Flirt with a Noblebot">Flirt with a Noblebot</option>
                                    <option value="Party at the Tavern">Party at the Tavern</option>
                                    <option value="Train Jousting Skills">Train Jousting Skills</option>
                                    <option value="Joust against another playing character">Joust against another playing character</option>
                                    <option value="Slacking ">Slacking </option>
                                </select>
                                
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
    </div>
</div>
@endsection
