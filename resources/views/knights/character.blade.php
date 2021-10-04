@extends('layouts.app')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@section('content')

<script>
function rollStrength() {
    var roll1 = Math.floor(Math.random() * 6) + 1;
    var roll2 = Math.floor(Math.random() * 6) + 1;
    var roll3 = Math.floor(Math.random() * 6) + 1;
    var total = roll1 + roll2 + roll3;
    document.getElementById("showStrength").innerHTML = total;
    document.getElementById("strength").value = total;
    return total;
}
function rollDexterity() {
    var roll1 = Math.floor(Math.random() * 6) + 1;
    var roll2 = Math.floor(Math.random() * 6) + 1;
    var roll3 = Math.floor(Math.random() * 6) + 1;
    var total = roll1 + roll2 + roll3;
    document.getElementById("showDexterity").innerHTML = total;
    document.getElementById("dexterity").value = total;
    return total;
}
function rollConstitution() {
    var roll1 = Math.floor(Math.random() * 6) + 1;
    var roll2 = Math.floor(Math.random() * 6) + 1;
    var roll3 = Math.floor(Math.random() * 6) + 1;
    var total = roll1 + roll2 + roll3;
    document.getElementById("showConstitution").innerHTML = total;
    document.getElementById("constitution").value = total;
    return total;
}

</script>
<style>
    body {
        background-color: #080325;
    }

    strong {
        font-size: 22px;
        font: sans-serif;
    }
</style>
<div class="container pb-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @foreach ($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                @endforeach 
                <div class="card-header">{{ __('Knight Creation')}}</div>
                <div class="card-body ">

                    <br>
                    <form action="{{ route('knight.store') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $id }}" name="gameId" >

                        <div class="form-group row">
                            <label for="knight" class="col-md-4 col-form-label text-md-right">{{ __('Knight Name') }} </label>
                            <div class="col-md-6"> 
                                <input type="text" class="form-control " name="character" >
                            </div>
                        </div>  

                        
                        <div class="form-group row">
                            <label class="col-4 text-md-right" >{{ __('Pronouns' )}} </label>
                            <div class="col-5 text-center"> 
                                <div class="form-check form-check-inline">
                                    <input type="radio" value="Male" class="form-check-input" id="male" name="gender">
                                    <label class="form-check-label" for="male">{{ __('He/His') }}</label>
                                </div>
                                <div class="form-check form-check-inline ">
                                    <input type="radio" value="Female" class="form-check-input" id="female" name="gender">
                                    <label class="form-check-label" for="female">{{ __('She/Her') }}</label>
                                </div>          
                                <div class="form-check form-check-inline">
                                    <input type="radio" value="Them" class="form-check-input" id="them" name="gender">
                                    <label class="form-check-label" for="them">{{ __('They/Them')}}</label>
                                </div>
                            </div>
                        </div>
                        <p></p>

                        <div class="form-group row mb-0">
                            <div class="col-1 offset-md-3">
                                <i class="fa fa-fw fa-hand-grab-o fa-2x pb-3" style="color: #d92b4c"></i>
                            </div>
                            <div class="col">
                                <input type="button" value="Roll Strength" style="width: 150px;" onclick="rollStrength(); this.onclick=null;">
                                <input type="hidden" value="" id="strength" name="strength">
                                <span class="offset-1" id= "showStrength"></span>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-1 offset-md-3">
                                <i class="fa fa-fw fa-eye fa-2x pb-3" style="color: #d92b4c"></i>
                            </div>
                            <div class="col">
                                <input type="button" value="Roll Dexterity" style="width: 150px;" onclick="rollDexterity(); this.onclick=null;">
                                <input type="hidden" value="" id="dexterity" name="dexterity">
                                <span class="offset-1" id= "showDexterity"></span>
                            </div>
                                
                        </div>
            
                        <div class="form-group row mb-0">
                            <div class="col-1 offset-md-3">
                                <i class="fa fa-fw fa-balance-scale fa-2x pb-3" style="color: #d92b4c"></i>
                            </div>
                            <div class="col">
                                <input type="button" value="Roll Constitution" style="width: 150px;" onclick="rollConstitution(); this.onclick=null;">
                                <input type="hidden" value="" id="constitution" name="constitution">
                                <span class="offset-1" id= "showConstitution" ></span>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row mb-0">
                            <div class="col text-center" >
                            <button type="submit" class="btn btn-primary" style="width: 200px;" id="create">{{ __('Create') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection