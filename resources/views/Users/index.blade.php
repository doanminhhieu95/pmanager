@extends('layouts.app')

@section('content')
<div class="col-md-6 col-lg-6 col-offset-3 col-lg-offset-3">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Danh sách người dùng
        </div>
        <div class="panel-body">
            <ul class="list-group">
            @foreach($Users as $user)
                <li class="list-group-item">{{$user->name}}</li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection