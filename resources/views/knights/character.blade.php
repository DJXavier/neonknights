@extends('layouts.app')

@section('content')
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
<label for="female">They/Them</label>
<br>
<label for="strength">Strength: </label>
<input type="button" value="Roll Dice" id="strength" name="strength">
<br>
<label for="dexterity">Dexterity: </label>
<input type="button" value="Roll Dice" id="dexterity" name="dexterity">
<br>
<label for="constitution">Constitution: </label>
<input type="button" value="Roll Dice" id="constitution" name="constitution">
<br><br>
<input type="submit" value="Create Character" id="submit" name="submit">
</form>

@endsection