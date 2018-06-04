@extends('layouts.app')

@section('content')
<div class="col-md-6 col-lg-6 col-offset-3 col-lg-offset-3">
    <div class="panel panel-primary">
        <div class="panel panel-heading">
            Danh sách nhiệm vụ
        </div>
        <div class="panel panel-body">
            <ul class="list-group">
                @foreach($Tasks as $task)
                <li class="list-group-item">{{$task->Name}}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection