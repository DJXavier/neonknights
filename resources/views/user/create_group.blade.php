@extends('layouts.app')

<style>
    .groupSizeValue
    {
        text-align: right;
    }
</style>

<title>Create Group</title>

@section('content')
<div class="container">
    <div class="row justify-content-left">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Group') }}</div>

                <div class="card-body">
                    <form id="groupForm" method="POST" action="">
                        <div id="groupEmail"></div>
                    </form>
                </div>
            </div>
        </div>
    </div
</div>
@endsection
