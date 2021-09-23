@extends('layouts.app')
<title>Delete Group</title>

@section('content')
    <div class="container">
        <div class="card">
            <label class="card-header">Group Management - Delete Group</label>
            <div class="card-body">
                <p>This group has been deleted, along with knights created for this group.</p>
                <a class="btn btn-sm btn-secondary" type="button" href="/display-groups-characters">Display Games & Characters</a>
            </div>
        </div>
    </div>
@endsection