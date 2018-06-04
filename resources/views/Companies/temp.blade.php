@extends('layouts.app')

@section('content')
<div class="col-md-6 col-lg-6 col-offset-3 col-lg-offset-3">
    <div class="panel panel-primary">
        <div class="panel panel-heading">
            Danh sách công ty
        </div>
        <div class="panel panel-body">
            <ul class="list-group">
            @foreach($Companies as $company)
                <li class="list-group-item"><a href="/company/{{$company -> id }}">
                {{$company->Name}}</a></li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection