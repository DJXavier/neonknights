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
<style>
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

</style>
<head>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <div class="container">
        <h1 style="text-decoration: underline;" >Character Creation</h1>
        
        <br>
        <form action="" method="POST">
            <label for="cName">Name: </label> 
            &nbsp;<input type="text" name="character">
            <p></p>
            <label>Pronouns: </label>
            &nbsp;<input type="radio" value="Male" id="male" name="gender">
            <label for="male">He/Him</label>
            &nbsp;<input type="radio" value="Female" id="female" name="gender">
            <label for="female">She/Her</label>
            &nbsp;<input type="radio" value="Them" id="them" name="gender">
            <label for="them">They/Them</label>
            <p></p>

        <div class="row">
            <div class="col-sm-1 justify-content-center text-center">
                <i class="fa fa-fw fa-hand-grab-o fa-2x pb-3" style="color: #d92b4c"></i>
            </div>
            <div class="col-sm-10">
                <input type="button" value="Roll Strength" id="strength" name="strength" onclick="rollStrength(); this.onclick=null;">
                &nbsp;&nbsp;<span id= "showStrength"></span>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-1 justify-content-center text-center">
                <i class="fa fa-fw fa-eye fa-2x pb-3" style="color: #d92b4c"></i>
            </div>
            
            <div class="col-sm-10">
                <input type="button" value="Roll Dexterity" id="dexterity" name="dexterity" onclick="rollDexterity(); this.onclick=null;">
                &nbsp;&nbsp;<span id= "showDexterity"></span>
            </div>
                
        </div>
 
        <div class="row">
            <div class="col-sm-1 justify-content-center text-center">
                <i class="fa fa-fw fa-balance-scale fa-2x pb-3" style="color: #d92b4c"></i>
            </div>
            <div class="col-sm-10" >
                <input type="button" value="Roll Constitution" id="constitution" name="constitution" onclick="rollConstitution(); this.onclick=null;">
                &nbsp;&nbsp;<span id= "showConstitution"></span>
            </div>
        </div>
        <br>
        <input type="submit" value="Create Character" id="submit" name="submit">

            
        </form>
    </div>
</body>
@endsection