@extends('layouts.app')

@section('content')
<script>
function rollStrength() {
    var roll1 = Math.floor(Math.random() * 6) + 1;
    var roll2 = Math.floor(Math.random() * 6) + 1;
    var roll3 = Math.floor(Math.random() * 6) + 1;
    var total = roll1 + roll2 + roll3;
    document.getElementById("showStrength").innerHTML = total;
    return total;
}
function rollDexterity() {
    var roll1 = Math.floor(Math.random() * 6) + 1;
    var roll2 = Math.floor(Math.random() * 6) + 1;
    var roll3 = Math.floor(Math.random() * 6) + 1;
    var total = roll1 + roll2 + roll3;
    document.getElementById("showDexterity").innerHTML = total;
    return total;
}
function rollConstitution() {
    var roll1 = Math.floor(Math.random() * 6) + 1;
    var roll2 = Math.floor(Math.random() * 6) + 1;
    var roll3 = Math.floor(Math.random() * 6) + 1;
    var total = roll1 + roll2 + roll3;
    document.getElementById("showConstitution").innerHTML = total;
    return total;
}

</script>
<!-- <style>
    body {
        background-color: #080325e6;
    }

    p {
        font-size: 22px;
        font: sans-serif;
    }

    strong {
        font-size: 22px;
        font: sans-serif;
    }

    h1 {
        
        font-size: 50px;
        color: #ffffff;
    }

    h3 {
        color: #ffffff;
    }

    div{
        font-size: 22px;
        color: #ffffff;
    }

</style> -->
<head>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Knight Creation')}}</div>
                <div class="card-body">
                
                    <br>
                    <form action="" method="POST">
                        <div class="form-group row">
                            <label for="knight" class="col-md-4 col-form-label text-md-right">{{ __('Knight Name') }} </label>
                            <div class="col-md-6"> 
                                <input type="text" class="form-control " name="character" >
                            </div>
                        </div>  

                        
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Pronouns' )}} </label>
                            <div class="form-check form-check-inline">
                                <input type="radio" value="Male" class="form-check-input" id="male" name="gender">
                                <label class="form-check-label" for="male">{{ __('He/His') }}</label>
                            </div>
                            <div class="form-check form-check-inline col-md-1">
                                <input type="radio" value="Female" class="form-check-input" id="female" name="gender">
                                <label class="form-check-label" for="female">{{ __('She/Her') }}</label>
                            </div>          
                            <div class="form-check form-check-inline">
                                <input type="radio" value="Them" class="form-check-input" id="them" name="gender">
                                <label class="form-check-label" for="them">{{ __('They/Them')}}</label>
                            </div>
                        </div>
                        <p></p>

                        <div class="form-group row">
                            <div class="col-sm-1 justify-content-center text-center">
                                <i class="fa fa-fw fa-hand-grab-o fa-2x pb-3" style="color: #d92b4c"></i>
                            </div>
                            <div class="col-sm-10">
                                <input type="button" value="Roll Strength" id="strength" name="strength" onclick="rollStrength(); this.onclick=null;">
                                &nbsp;&nbsp;<span id= "showStrength"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-1 justify-content-center text-center">
                                <i class="fa fa-fw fa-eye fa-2x pb-3" style="color: #d92b4c"></i>
                            </div>
                            
                            <div class="col-sm-10">
                                <input type="button" value="Roll Dexterity" id="dexterity" name="dexterity" onclick="rollDexterity(); this.onclick=null;">
                                &nbsp;&nbsp;<span id= "showDexterity"></span>
                            </div>
                                
                        </div>
            
                        <div class="form-group row">
                            <div class="col-sm-1 justify-content-center text-center">
                                <i class="fa fa-fw fa-balance-scale fa-2x pb-3" style="color: #d92b4c"></i>
                            </div>
                            <div class="col-sm-10" >
                                <input type="button" value="Roll Constitution" id="constitution" name="constitution" onclick="rollConstitution(); this.onclick=null;">
                                &nbsp;&nbsp;<span id= "showConstitution"></span>
                            </div>
                        </div>
                    <br>
                    
                    <input type="submit" class="btn btn-primary" value="Create Character" id="create" name="create">
                        
                    </form>
                </div>
            </div>
        </div>
        </div>
        </div>
    </div>
</body>
@endsection