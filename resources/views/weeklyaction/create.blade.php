@extends('layouts.app')

<style>
    .groupSizeValue
    {
        text-align: right;
    }
</style>
                  

                
<title>Select Actions</title>
@section('content')
<?php
    $game = \App\Models\Game::Find($id);
    $knight = $game->knights()->where('user_id', auth()->user()->id)->get()->first();
?>
<div id="action-page">
    <input type="hidden" id="game-id" value={{ $game->id }} />
    <input type="hidden" id="knight-id" value={{ $knight->id }} />
</div>
<form action="/submittedweeklyaction/ {{ $game->id }}" method="POST" id="action-post">
    @csrf
    <div id="action-one">
        <input type="hidden" value="" id="one-type"/>
        <input type="hidden" value="" id="one-length"/>
        <input type="hidden" value="" id="one-joust-accept"/>
        <input type="hidden" value="" id="one-target"/>
        <input type="hidden" value="" id="one-entry"/>
        <input type="hidden" value="" id="one-time"/>
    </div>
    <div id="action-two">
        <input type="hidden" value="" id="two-type"/>
        <input type="hidden" value="" id="two-length"/>
        <input type="hidden" value="" id="two-joust-accept"/>
        <input type="hidden" value="" id="two-target"/>
        <input type="hidden" value="" id="two-entry"/>
        <input type="hidden" value="" id="two-time"/>
    </div>
    <div id="action-three">
        <input type="hidden" value="" id="three-type"/>
        <input type="hidden" value="" id="three-length"/>
        <input type="hidden" value="" id="three-joust-accept"/>
        <input type="hidden" value="" id="three-target"/>
        <input type="hidden" value="" id="three-entry"/>
        <input type="hidden" value="" id="three-time"/>
    </div>
</form>
<!--
<div class="container-xl">
    <div class="row justify-content-center">
        @if ($game != null)
            <div class="col-md-12"><h2>Action Entry for: {{ $game->name }}<h2></div>
        @endif
        <div class="col-md-12">
            <form action="/submittedweeklyaction/{{ $id }}" method="POST" onsubmit="event.preventDefault(); FormSubmit(event);">
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
                                        <input  value="add" id="quest" name="quest" type="button" class="btn btn-primary" onclick="AddActionClickListener('quest','questButton',3)">
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
                                        <input value="add" id="party" name="party" type="button" class="btn btn-primary" onclick="AddActionClickListener('party','partyButton',1)">
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
                                        <input value="add" id="train" name="train" type="button" class="btn btn-primary" onclick="AddActionClickListener('train','trainButton',1);">
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
                                        <input value="add" id="slackOff" name="slackOff" type="button" class="btn btn-primary" onclick="AddActionClickListener('slackOff','slackOffButton',1);">
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
                                <input value="add" id="poem" name="poem" type="button" class="btn btn-primary" onclick="AddActionClickListener('poem','poemButton',2);">
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
                                    <input value="add" id="flirt" name="flirt" type="button" class="btn btn-primary" onclick="AddActionClickListener('flirt','flirtButton',1);">
                                    </input>

                                    <input value="" type="hidden" id="flirtButton" name="flirtButton">
                                
                                    </input>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </td>
                <td class="col-md-6" style="padding:0px" id="knight-joust">
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
                            <input type="radio" id="joustAccept" name="joustAccept" class= "col-md-1" style="text-align:right" onclick="toggleOffJoust()" checked>
                                Decline                 
                            </input>
                            <input value="no" type="hidden" id="joustAcceptButton" name="joustAcceptButton">
                                
                            </input>
                        </div>
                    </div>
                </div>
            </table>
            <table class="col-md-12">
                <div class="card">
                    <div class="card-header" style="text-align: center; font-weight: bold">
                        {{ __('Currently Selected Actions') }}
                    </div>
                    <div class="card-body ">
                        <div id="displayPanel" class="form-group" style="text-align: center">
                            
                            
                        </div>
                    </div>
                </div>
            </table>
           
                <?php /*
                    $thisId = session('id');
                    $slotTotal =session('slots');
                    echo '<input value ="' . $thisId . '"' . 'type="hidden" name="thisId" id="thisId">';
                    echo '<input value ="' . session('noPlayers') . '"' . 'type="hidden" name="players" id="players">';
                    echo '<input value ="' . $slotTotal . '"' . 'type="hidden" name="slotTotal" id="slotTotal">';
*/
                ?>
                
                <div class="form-group row mb-0">
                    <div class="col-md-6 " style="text-align:right">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Confirm') }}
                        </button>
                    </div>
                    <div class="col-md-6 " style="text-align:left">
                        <input value="Reset" type="button" class="btn btn-primary" onClick="window.location.reload();">
                            
                        </input>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
-->
<!--
<script type="text/javascript">

    $slotMax = 3;
    $currentSlot = 0;

    var slotId = [false,false,false];
    
    function CheckAvailability($neededSlot){
        if($neededSlot + $currentSlot > $slotMax){
            alert("Hi, one week can only get maximum of three slots arranged, so please remove one or more actions.");
            return false;
        }else{
            $currentSlot += $neededSlot;
            return true;
        }
        
    }

    function FormSubmit($event) {
        if ($currentSlot != 3) {
            alert('You have not selected enough actions for the week.');
        } else {
            $event.target.submit();
        }
    }

    function AddActionClickListener($buttonName, $hiddenInputName,$neededSlot){
        if(document.getElementById($buttonName).style.backgroundColor!='red')
        {
            for(var i = 0; i< 3;i++){
                if(slotId[i]==false){
                    if(CheckAvailability($neededSlot)){
                        var input = document.createElement("input");
                        input.name="action"+i;
                        input.id="action"+i;
                        input.value=$buttonName;
                        input.class="form-control-plaintext text-md";
                        input.style="pointer-events:none";

                        var divRowStart = document.createElement("div");
                        divRowStart.class = "form-group row";
                        divRowStart.id="div"+i;
                        divRowStart.name="div"+i;

                        var deleteButton = document.createElement("input");
                        deleteButton.type="button"; 
                        deleteButton.class="btn btn-primary";
                        deleteButton.value="remove";
                        deleteButton.id="deleteButton"+i;
                        deleteButton.onclick=function ($neededSlot) {
                            var actionToDelete = document.getElementById('action'+i.toString());
                            var divToDelete = document.getElementById('div'+i.toString());
                            var buttonToDelete = document.getElementById('deleteButton'+i.toString());
                            actionToDelete.remove();
                            divToDelete.remove();
                            buttonToDelete.remove();
                            $currentSlot -= $neededSlot;
                            slotId[i] = false;

                        };
                        slotId[i] = true;
                        console.log(input.id);
                        document.getElementById('displayPanel').appendChild(divRowStart);
                        document.getElementById('displayPanel').appendChild(input);
                        document.getElementById('displayPanel').appendChild(deleteButton);

                        break;
                    }
                }
            } 
        } 
    }

    function toggleOnJoust(){
        document.getElementById('joustAcceptButton').value='yes'; 
    }
    function toggleOffJoust(){
        document.getElementById('joustAcceptButton').value='no'; 
    }

    
    
    
</script>
-->
@endsection
