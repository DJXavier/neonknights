@extends('layouts.app')

<style>
</style>

<title>Create Group</title>

@section('content')
<div class="container">
    <div class="row justify-content-left">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Group') }}</div>

                <div class="card-body">
                    <form method="POST" action="">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Group Name') }}</label>

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
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Max Players') }}</label>

                            <div class="col-md-6">
                                <select name="players-select" id="players-select">
                                    <option value=4>4</option>
                                    <option value=5>5</option>
                                    <option value=6>6</option>
                                    <option value=7>7</option>
                                    <option value=8>8</option>
                                    <option value=9>9</option>
                                    <option value=10>10</option>
                                    <option value=11>11</option>
                                    <option value=12>12</option>
                                </select>
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address 1') }}</label>

                            <div class="col-md-6">
                                <input id="email1" type="email" class="form-control @error('email1') is-invalid @enderror" name="email" value="{{ old('email1') }}" required autocomplete="email">

                                @error('email1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address 2') }}</label>

                            <div class="col-md-6">
                                <input id="email2" type="email" class="form-control @error('email2') is-invalid @enderror" name="email" value="{{ old('email2') }}" required autocomplete="email">

                                @error('email2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address 3') }}</label>

                            <div class="col-md-6">
                                <input id="email3" type="email" class="form-control @error('email3') is-invalid @enderror" name="email" value="{{ old('email3') }}" required autocomplete="email">

                                @error('email3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address 4') }}</label>

                            <div class="col-md-6">
                                <input id="email4" type="email" class="form-control @error('email4') is-invalid @enderror" name="email" value="{{ old('email4') }}" required autocomplete="email">

                                @error('email4')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
@endsection
