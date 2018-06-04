@extends('layouts.app') @section('content')
<div class="panel panel-primary">
    <div class="panel-heading">
        <i class="fa fa-list fa-fw"></i> Danh sách công ty
        <div class="pull-right">
            <div class="btn-group">
                <button type="button" class="btn btn-success btn-circle">
                    <a href="/company/create" style="color:inherit;">
                        <i class="fa fa-plus"></i>
                    </a>
                </button>

            </div>
        </div>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <ul class="list-group">
            @foreach($Companies as $company)
            <li class="list-group-item">
                <div class="col-md-8">
                    <a href="/company/{{$company -> id }}">
                        {{$company->Name}}</a>
                </div>
                <button type="button" class="btn btn-success btn-primary btn-xs">
                    <a href="/company/{{$company -> id }}" style="color:inherit;">View projects</a>
                </button>
                <button type="button" class="btn btn-success btn-info btn-xs">
                    <a href="/company/{{$company->id}}/edit" style="color:inherit;">Edit</a>
                </button>
                <button type="button" class="btn btn-success btn-danger btn-xs">
                    <a href="#" onclick="
                        var result = confirm('Are you sure you wish to delete this Company?');
                        if(result){
                            event.preventDefault();
                            document.getElementById('delete-form').submit();
                        }" style="color:inherit;">Delete</a>
                </button>
                <form id="delete-form" action="{{route('company.destroy',[$company->id])}}" method="POST" style="display:none;">
                    <input type="hidden" name="_method" value="delete"> {{csrf_field()}}
                </form>
            </li>
            @endforeach
        </ul>
    </div>
    <!-- /.panel-body -->
</div>

@endsection