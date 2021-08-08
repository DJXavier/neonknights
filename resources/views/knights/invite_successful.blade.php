@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <label class="card-header">Group Created</label>
            <div class="card-body">
                <p>Emails have been sent successfully.</p>
                <a class="btn btn-sm btn-secondary" type="button" href="/character/create/{{session('id')}}">Create Character</a>
            </div>
        </div>
    </div>
@endsection