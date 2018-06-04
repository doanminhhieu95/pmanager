@extends('layouts.app')

@section('content')
<div class="col-md-6 col-lg-6 col-offset-3 col-lg-offset-3">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Dang sách comment
        </div>
        <div class="panel-body">
            <ul class="list-group">
            @foreach($Comments as $comment)
                <li class="list-group-item">{{$comment->Body}}</li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection