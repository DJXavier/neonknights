@extends('layouts.app')

<style>
    .groupSizeValue
    {
        text-align: right;
    }
</style>

                  

                
<title>Invite Players</title>
@section('content')
<div class="container-xl">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="/submittedweeklyaction/{{session('id')}}" method="POST">
            @csrf 

            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach 
            <table class="col-md-12">
                    <td class="col-md-3" style="padding:0px">
                        <div class="card" style="">
                            <div class="card-header" style="text-align: center; font-weight: bold" >
                                {{ __('Quest') }}

                            </div>
                            <div class="card-body">
                                <div class="form-group row">    
                                    <label for="type" class="form-control-plaintext text-md" style="text-align:center" >takes 3 time slots</label>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <input  value="add" id="myQuestButton" name="myQuestButton" type="button" class="btn btn-primary" onclick="questClick()">
                                        </input>  
                                        <input value="" type="hidden" id="questButton" name="questButton">

                                        </input>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>    
                    <td class="col-md-3"  style="padding:0px">
                        <div class="card">
                            <div class="card-header" style="text-align: center; font-weight: bold">
                                {{ __('Party') }}

                            </div>
                            <div class="card-body">
                                <div class="form-group row">    
                                    <label for="type" class="form-control-plaintext text-md" style="text-align:center" >takes 1 time slots</label>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <input value="add" id="myPartyButton" name="myPartyButton" type="button" class="btn btn-primary" onclick="partyClick()">
                                        </input>

                                        <input value="" type="hidden" id="partyButton" name="partyButton">
                                    
                                        </input>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>  
                    <td class="col-md-3"  style="padding:0px">
                        <div class="card">
                            <div class="card-header" style="text-align: center; font-weight: bold">
                                {{ __('Train') }}

                            </div>
                            <div class="card-body">
                                <div class="form-group row">    
                                    <label for="type" class="form-control-plaintext text-md" style="text-align:center" >takes 1 time slots</label>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <input value="add" id="myTrainButton" name="myTrainButton" type="button" class="btn btn-primary" onclick="trainClick();">
                                        </input>

                                        <input value="" type="hidden" id="trainButton" name="trainButton">
                                    
                                        </input>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>  
                    <td class="col-md-3"  style="padding:0px">
                        <div class="card">
                            <div class="card-header" style="text-align: center; font-weight: bold">
                                {{ __('Slack off') }}

                            </div>
                            <div class="card-body">
                                <div class="form-group row">    
                                    <label for="type" class="form-control-plaintext text-md" style="text-align:center" >takes 1 time slots</label>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <input value="add" id="mySlackOffButton" name="mySlackOffButton" type="button" class="btn btn-primary" onclick="slackOffClick();">
                                        </input>

                                        <input value="" type="hidden" id="slackOffButton" name="slackOffButton">
                                    
                                        </input>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td> 
                
            </table>
            
            <table class="col-md-12">
                <div class="card">
                    <div class="card-header" style="text-align: center; font-weight: bold">
                        {{ __('Write Poem') }}
                    </div>
                    <div class="card-body">
                        
                        <div class="form-group row">    
                            <label for="type" class="form-control-plaintext text-md" style="text-align:center" >takes 2 time slots</label>
                        </div>
                
                        <textarea class="form-control" style="width:100%" rows = "4"></textarea>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 " style="text-align:center">
                                <input value="add" id="myPoemButton" name="myPoemButton" type="button" class="btn btn-primary" onclick="poemClick();">
                                </input>

                                <input value="" type="hidden" id="poemButton" name="poemButton">
                            
                                </input>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </table>

            <table class="col-md-12">
                <td class="col-md-6" style="padding:0px">
                    <div class="card ">
                        <div class="card-header" style="text-align: center; font-weight: bold">
                            {{ __('Flirt') }}
                        </div>
                            
                            
                        <div class="card-body">
                            <div class="form-group row">    
                                <label for="type" class="form-control-plaintext text-md" style="text-align:center" >takes 1 time slot</label>
                            </div>
                
                            <table class="table-bordered col-md-12">
                                <thead>
                                    <th>
                                        Select
                                        
                                    </th>
                                    
                                    <th>
                                        Noblebots
                                        
                                    </th>
                                    <th>
                                        Level
                                        
                                    </th>
                                    <tr>
                                        <td>
                                            <input type="radio" name="flirtChoice">
                                                
                                            </input>
                                        </td>
                                        <td>
                                            Noblebots No.89757
                                        </td>
                                        <td>
                                            4
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="radio" name="flirtChoice">
                                                
                                            </input>
                                        </td>
                                        <td>
                                            Noblebots No.101
                                        </td>
                                        <td>
                                            5
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="radio" name="flirtChoice">
                                                
                                            </input>
                                        </td>
                                        <td>
                                            
                                            Noblebots No.7768
                                        </td>
                                        <td>
                                            3
                                        </td>
                                    </tr>
                                </thead>
                            </table>
                            <div class="form-group row mb-0">
                                <div class="col-md-12 " style="text-align:center">
                                    <input value="add" id="myFlirtButton" name="myFlirtButton" type="button" class="btn btn-primary" onclick="flirtClick();">
                                    </input>

                                    <input value="" type="hidden" id="flirtButton" name="flirtButton">
                                
                                    </input>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </td>
                <td class="col-md-6" style="padding:0px">
                    <div class="card">
                        <div class="card-header" style="text-align: center; font-weight: bold">
                            {{ __('Jousting') }}
                        </div>
                        <div class="card-body">
                            
                            <div class="form-group row">    
                                <label for="type" class="form-control-plaintext text-md" style="text-align:center" >takes 1 time slot</label>
                            </div>
                
                            <table class="table-bordered col-md-12">
                                <thead>
                                    <th>
                                        Select
                                    </th>
                                    
                                    <th>
                                        Noblebots
                                    </th>
                                    <th>
                                        Level
                                    </th>
                                    <tr>
                                        <td>
                                            <input type="radio" name="knightChoice">
                                                
                                            </input>
                                        </td>
                                        <td>
                                            Knight 1
                                        </td>
                                        <td>
                                            4
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="radio" name="knightChoice">
                                                
                                            </input>
                                        </td>
                                        <td>
                                            Knight 2
                                        </td>
                                        <td>
                                            3
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="radio" name="knightChoice">
                                                
                                            </input>
                                        </td>
                                        <td>
                                            Knight 3
                                        </td>
                                        <td>
                                            2
                                        </td>
                                    </tr>
                                </thead>
                            </table>
                            <div class="form-group row mb-0">
                                <div class="col-md-12 " style="text-align:center">
                                    <input value="add" id="myJoustButton" name="myJoustButton" type="button" class="btn btn-primary" onclick="joustClick();">
                                    </input>

                                    <input value="" type="hidden" id="joustButton" name="joustButton">
                                
                                    </input>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </td>
                
            </table>
                    
            <table class="col-md-12">
                <div class="card">
                    <div class="card-header" style="text-align: center; font-weight: bold">
                        {{ __('Will you accept jousts?') }}
                    </div>
                    <div class="card-body ">
                        <div class="form-group" style="text-align: center">
                            <input type="radio" id="joustAccept" name="joustAccept" class= "col-md-1" style="text-align:left" onclick="toggleOnJoust()">
                                Agree
                            </input>
                            <input type="radio" id="joustAccept" name="joustAccept" class= "col-md-1" style="text-align:right" onclick="toggleOffJoust()">
                                Decline                 
                            </input>
                            <input value="" type="hidden" id="joustAcceptButton" name="joustAcceptButton">
                                
                            </input>
                        </div>
                    </div>
                </div>
            </table>
           
                <?php 
                    $thisId = session('id');
                    $slotTotal =session('slots');
                    echo '<input value ="' . $thisId . '"' . 'type="hidden" name="thisId" id="thisId">';
                    echo '<input value ="' . session('noPlayers') . '"' . 'type="hidden" name="players" id="players">';
                    echo '<input value ="' . $slotTotal . '"' . 'type="hidden" name="slotTotal" id="slotTotal">';

                ?>
                
                <div class="form-group row mb-0">
                    <div class="col-md-6 " style="text-align:right">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Confirm') }}
                        </button>
                    </div>
                    <div class="col-md-6 " style="text-align:left">
                        <button type="reset" class="btn btn-primary">
                            {{ __('Reset') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    
    function questClick(){
        if(document.getElementById('myQuestButton').style.backgroundColor!='red')
        {
            document.getElementById('myQuestButton').style.backgroundColor='red';
            document.getElementById('myQuestButton').value='chosen'; 
            document.getElementById('questButton').value='chosen';  
        } 
        else{
            document.getElementById('myQuestButton').style.backgroundColor = '3490dc';
            document.getElementById('myQuestButton').value ='add';
            document.getElementById('questButton').value='nope';
        } 
    }
    function partyClick(){
        if(document.getElementById('myPartyButton').style.backgroundColor!='red')
        {
            document.getElementById('myPartyButton').style.backgroundColor='red';
            document.getElementById('myPartyButton').value='chosen'; 
            document.getElementById('partyButton').value='chosen'; 
        } 
        else{
            document.getElementById('myPartyButton').style.backgroundColor = '3490dc';
            document.getElementById('myPartyButton').value ='add';
            document.getElementById('partyButton').value='nope'; 
        } 
    }
    function trainClick(){
        if(document.getElementById('myTrainButton').style.backgroundColor!='red')
        {
            document.getElementById('myTrainButton').style.backgroundColor='red';
            document.getElementById('myTrainButton').value='chosen'; 
            document.getElementById('trainButton').value='chosen'; 
        } 
        else{
            document.getElementById('myTrainButton').style.backgroundColor = '3490dc';
            document.getElementById('myTrainButton').value ='add';
            document.getElementById('trainButton').value='nope'; 
        } 
    }
    function slackOffClick(){
        if(document.getElementById('mySlackOffButton').style.backgroundColor!='red')
        {
            document.getElementById('mySlackOffButton').style.backgroundColor='red';
            document.getElementById('mySlackOffButton').value='chosen'; 
            document.getElementById('slackOffButton').value='chosen'; 
        } 
        else{
            document.getElementById('mySlackOffButton').style.backgroundColor = '3490dc';
            document.getElementById('mySlackOffButton').value ='add';
            document.getElementById('slackOffButton').value='nope'; 
        } 
    }
    function poemClick(){
        if(document.getElementById('myPoemButton').style.backgroundColor!='red')
        {
            document.getElementById('myPoemButton').style.backgroundColor='red';
            document.getElementById('myPoemButton').value='chosen'; 
            document.getElementById('poemButton').value='chosen'; 
        } 
        else{
            document.getElementById('myPoemButton').style.backgroundColor = '3490dc';
            document.getElementById('myPoemButton').value ='add';
            document.getElementById('poemButton').value='nope'; 
        } 
    }
    function flirtClick(){
        if(document.getElementById('myFlirtButton').style.backgroundColor!='red')
        {
            document.getElementById('myFlirtButton').style.backgroundColor='red';
            document.getElementById('myFlirtButton').value='chosen'; 
            document.getElementById('flirtButton').value='chosen'; 
        } 
        else{
            document.getElementById('myFlirtButton').style.backgroundColor = '3490dc';
            document.getElementById('myFlirtButton').value ='add';
            document.getElementById('flirtButton').value='nope'; 
        } 
    }
    function joustClick(){
        if(document.getElementById('myJoustButton').style.backgroundColor!='red')
        {
            document.getElementById('myJoustButton').style.backgroundColor='red';
            document.getElementById('myJoustButton').value='chosen'; 
            document.getElementById('joustButton').value='chosen'; 
        } 
        else{
            document.getElementById('myJoustButton').style.backgroundColor = '3490dc';
            document.getElementById('myJoustButton').value ='add';
            document.getElementById('joustButton').value='nope'; 
        } 
    }

    function toggleOnJoust(){
        document.getElementById('joustAcceptButton').value='yes'; 
    }
    function toggleOffJoust(){
        document.getElementById('joustAcceptButton').value='no'; 
    }
    
    
</script>
@endsection
