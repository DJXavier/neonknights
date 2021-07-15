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

<body>
    <div class="container">
        <h1>Character Creation</h1>
        <br>
        <form action="" method="POST">
            <label for="cName">Name: </label> 
            <input type="text" name="character">
            <br>
            <label>Pronouns: </label>
            <input type="radio" value="Male" id="male" name="gender">
            <label for="male">He/Him</label>
            <input type="radio" value="Female" id="female" name="gender">
            <label for="female">She/Her</label>
            <input type="radio" value="Them" id="them" name="gender">
            <label for="them">They/Them</label>
            <br>
        
            <label for="strength">Strength: </label>
            <input type="button" value="Roll Dice" id="strength" name="strength" onclick="rollStrength(); this.onclick=null;">
            <span id= "showStrength"></span>
            <br>
            <label for="dexterity">Dexterity: </label>
            <input type="button" value="Roll Dice" id="dexterity" name="dexterity" onclick="rollDexterity(); this.onclick=null;">
            <span id= "showDexterity"></span>
            <br>
            <label for="constitution">Constitution: </label>
            <input type="button" value="Roll Dice" id="constitution" name="constitution" onclick="rollConstitution(); this.onclick=null;">
            <span id= "showConstitution"></span>
            <br><br>
            <input type="submit" value="Create Character" id="submit" name="submit">

            
        </form>
    </div>
</body>
@endsection