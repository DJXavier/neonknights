@extends('layouts.app')
<title>Access Denied</title>

@section('content')
    <div class="container">
        <div class="card">
            <label class="card-header">Access Denied</label>
            <div class="card-body">
                @if (session('accessDeniedMessage') == '' || session('accessDeniedMessage') == null) 
                    <p>You do not have permissions to view this web page.</p>
                @else
                    <p>{{session('accessDeniedMessage')}}</p>
                @endif
            </div>
        </div>
    </div>
@endsection