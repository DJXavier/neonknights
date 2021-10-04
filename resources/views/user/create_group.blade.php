@extends('layouts.app')

<style>
    .groupSizeValue
    {
        text-align: right;
    }
</style>

<title>Create Group</title>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Group') }}</div>
                <div class="card-body">
                    <form id="group-create-form">

                        @csrf 
    
                        @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                        @endforeach 

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Game Name</label>

                            <div class="col-md-6">
                                <input id="name" type="String" class="form-control" name="name" autocomplete="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">Game Type</label>
                            <div class="col-md-6">
                                <select name="type" type="String" class="form-control" id="type">
                                    <option value="">-- Select Game Type --</option>
                                    <option value="campaign">Campaign</option>
                                    <option value="adventure">Adventure</option>

                                </select>
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="number of players" class="col-md-4 col-form-label text-md-right">Number of Players</label>

                            <div class="col-md-6">
                                <select name="noPlayers" type="int" class="form-control" id="noPlayers">
                                    <option value="">-- How many players in total? --</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="group-submit-button">
                                    {{ __('Create Game') }}
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
