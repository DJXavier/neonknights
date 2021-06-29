@extends('layouts.app')

<title>Character Creation</title>

@section('content')
<div class="container">
    <div class="row justify-content-left">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Character Creation') }}</div>

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
                            <label for="pronouns" class="col-md-4 col-form-label text-md-right">{{ __('Pronouns') }}</label>

                            <div class="col-md-6">
                                <label><input type="radio" name="radio_pronouns">He/Him</label>
                                <label><input type="radio" name="radio_pronouns">She/Her</label>
                                <label><input type="radio" name="radio_pronouns">They/Them</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rolldice" class="col-md-4 col-form-label text-md-right">{{ __('Roll the Dice') }}</label>

                            <div class="col-md-6">
                                <input type="button" value="Dice roll" onclick="RollDice();" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="strength" class="col-md-4 col-form-label text-md-right">{{ __('Strength') }}</label>

                            <div class="col-md-6">
                                <input type="text" id="str" name="str" disabled/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dexterity" class="col-md-4 col-form-label text-md-right">{{ __('Dexterity') }}</label>

                            <div class="col-md-6">
                                <input type="text" id="dex" name="dex" disabled/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="constitution" class="col-md-4 col-form-label text-md-right">{{ __('Constitution') }}</label>

                            <div class="col-md-6">  
                                <input type="text" id="con" name="con" disabled/>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function RollDice() {
        var rnd = Math.floor(Math.random() * 6 + 1);
        document.getElementById("str").value = rnd;

        var rnd = Math.floor(Math.random() * 6 + 1);
        document.getElementById("dex").value = rnd;

        var rnd = Math.floor(Math.random() * 6 + 1);
        document.getElementById("con").value = rnd;
    }
</script>

@endsection