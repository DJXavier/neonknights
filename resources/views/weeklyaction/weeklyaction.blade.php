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
            
            <table class="col-md-12">
                    <td class="col-md-3" style="padding:0px">
                        <div class="card" style="">
                            <div class="card-header" style="text-align: center">
                                {{ __('Quest') }}

                            </div>
                            <div class="card-body">
                                <div class="form-group row">    
                                    <label for="type" class="form-control-plaintext text-md" style="text-align:center" >takes 3 time slots</label>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="button" class="btn btn-primary" onclick="if(this.style.backgroundColor!='red'){this.style.backgroundColor='red'} else{this.style.backgroundColor = '3490dc'} ;">
                                            {{ __('Add') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>    
                    <td class="col-md-3"  style="padding:0px">
                        <div class="card">
                            <div class="card-header" style="text-align: center">
                                {{ __('Party') }}

                            </div>
                            <div class="card-body">
                                <div class="form-group row">    
                                    <label for="type" class="form-control-plaintext text-md" style="text-align:center" >takes 1 time slots</label>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="button" class="btn btn-primary" onclick="if(this.style.backgroundColor!='red'){this.style.backgroundColor='red'} else{this.style.backgroundColor = '3490dc'} ;">
                                            {{ __('Add') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>  
                    <td class="col-md-3"  style="padding:0px">
                        <div class="card">
                            <div class="card-header" style="text-align: center">
                                {{ __('Train') }}

                            </div>
                            <div class="card-body">
                                <div class="form-group row">    
                                    <label for="type" class="form-control-plaintext text-md" style="text-align:center" >takes 1 time slots</label>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="button" class="btn btn-primary" onclick="if(this.style.backgroundColor!='red'){this.style.backgroundColor='red'} else{this.style.backgroundColor = '3490dc'} ;">
                                            {{ __('Add') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>  
                    <td class="col-md-3"  style="padding:0px">
                        <div class="card">
                            <div class="card-header" style="text-align: center">
                                {{ __('Slack off') }}

                            </div>
                            <div class="card-body">
                                <div class="form-group row">    
                                    <label for="type" class="form-control-plaintext text-md" style="text-align:center" >takes 1 time slots</label>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="button" class="btn btn-primary" onclick="if(this.style.backgroundColor!='red'){this.style.backgroundColor='red'} else{this.style.backgroundColor = '3490dc'} ;">
                                            {{ __('Add') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td> 
                
            </table>
            
            <table class="col-md-12">
                <div class="card">
                    <div class="card-header" style="text-align: center">
                        {{ __('Write Poem') }}
                    </div>
                    <div class="card-body">
                        
                        <div class="form-group row">    
                            <label for="type" class="form-control-plaintext text-md" style="text-align:center" >takes 2 time slots</label>
                        </div>
                
                        <textarea class="form-control" style="width:100%" rows = "4">

                        </textarea>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 " style="text-align:center">
                                <button type="button" class="btn btn-primary" onclick="if(this.style.backgroundColor!='red'){this.style.backgroundColor='red'} else{this.style.backgroundColor = '3490dc'} ;">
                                    {{ __('Add') }}
                                </button>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </table>

            <table class="col-md-12">
                <td class="col-md-6" style="padding:0px">
                    <div class="card ">
                        <div class="card-header" style="text-align: center">
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
                                    <button type="button" class="btn btn-primary" onclick="if(this.style.backgroundColor!='red'){this.style.backgroundColor='red'} else{this.style.backgroundColor = '3490dc'} ;">
                                        {{ __('Add') }}
                                    </button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </td>
                <td class="col-md-6" style="padding:0px">
                    <div class="card">
                        <div class="card-header" style="text-align: center">
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
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add') }}
                                    </button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </td>
                
            </table>
                    
            <table class="col-md-12">
                <div class="card">
                    <div class="card-header" style="text-align: center">
                        {{ __('Will you accept jousts?') }}
                    </div>
                    <div class="card-body ">
                        <div class="form-group">
                            <input type="radio" name="joustAccept" class= "col-md-1" style="text-align:right">
                                Agree                  
                            </input>
                            <input type="radio" name="joustAccept" class= "col-md-1" style="text-align:left">
                                Decline                 
                            </input>
                        </div>
                    </div>
                </div>
            </table>
            <form action="" method="POST">
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
@endsection
