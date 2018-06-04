@extends('layouts.app') @section('content')
<div class="container">
    <div class="col=md-9 col-lg-9 col-xs-9 pull-left">
        <!-- Jumbotron -->
        <div class="jumbotron">
            <h1>{{$company->Name}}</h1>
            <p class="lead">{{$company->Description}}</p>
        </div>

        <!-- Example row of columns -->
        <div class="row">
            @foreach($company->projects as $project)
            <div class="col-lg-4">
                <h2>{{$project->Name}}</h2>
                <p class="text-danger">{{$project->Description}}</p>
                <p>
                    <a href="/projects/{{$project->id}}" class="btn btn-primary" href="#" role="button">Xem dự án »</a>
                </p>
            </div>
            @endforeach
        </div>

        <!-- Site footer -->
        <footer class="footer" style="text-align:center;">
            <p>© 2016 Company, Inc.</p>
        </footer>
    </div>
    <div class="col=md-3 col-lg-3 col-xs-3 pull-right">

        <div class="sidebar-module sidebar-module-inset">
            <h4>Action</h4>

        </div>
        <div class="sidebar-module">
            <ol class="list-unstyled">
                <li>
                    <a href="/company/{{$company->id}}/edit">Sửa thông tin công ty</a>
                </li>
                <li>
                    <a href="#" onclick="
                        var result = confirm('Are you sure you wish to delete this Company?');
                        if(result){
                            event.preventDefault();
                            document.getElementById('delete-form').submit();
                        }">
                        Xóa công ty
                    </a>
                    <form id="delete-form" action="{{route('company.destroy',[$company->id])}}" method="POST" style="display:none;">
                        <input type="hidden" name="_method" value="delete"> {{csrf_field()}}
                    </form>
                </li>
                <li>
                    <a href="/company/{{$company->id}}/edit">Thêm công ty</a>
                </li>
            </ol>
        </div>
    </div>
</div>

@endsection