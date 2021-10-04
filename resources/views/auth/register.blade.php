@extends('layouts.app')

@section('content')

<style>
    body {
        background-color: #080325e6;
    }
    #password-conditions {
        display: none;
    }
    .valid {
        color: green;
    }
    .invalid {
        color: red;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" onfocus="passwordFocus()" onblur="passwordBlur()" onkeyup="passwordKeyUp()" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div id="password-conditions">
                                    <label for="password-requirements">{{ __('Password must meet the following:') }}</label>
                                    <p id="password-length" class="invalid">Minimum of <b>8 characters</b></p>
                                    <p id="password-number" class="invalid">Includes <b>one number</b></p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br>
@endsection

<script>
    function passwordFocus() {
        document.getElementById("password-conditions").style.display = "block";
    }

    function passwordBlur(){
        document.getElementById("password-conditions").style.display = "none";
    }

    function passwordKeyUp() {
        //Checking the password includes a number
        var numbers = /[0-9]/g;
        if(document.getElementById("password").value.match(numbers)) {  
            document.getElementById("password-number").classList.remove("invalid");
            document.getElementById("password-number").classList.add("valid");
        } else {
            document.getElementById("password-number").classList.remove("valid");
            document.getElementById("password-number").classList.add("invalid");
        }
        
        //Checking the passwords meets the minimum length
        if(document.getElementById("password").value.length >= 8) {
            document.getElementById("password-length").classList.remove("invalid");
            document.getElementById("password-length").classList.add("valid");
        } else {
            document.getElementById("password-length").classList.remove("valid");
            document.getElementById("password-length").classList.add("invalid");
        }
    }
</script>
