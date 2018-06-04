@extends('layouts.app') @section('content')
<div class="panel panel-primary">
    <div class="panel-heading">
        <i class="fa fa-list fa-fw"></i> Danh sách dự án
        <div class="pull-right">
            <div class="btn-group">
                <button type="button" class="btn btn-success btn-circle">
                    <a href="project/create" style="color:inherit">
                        <i class="fa fa-plus"></i>
                    </a>

                </button>


            </div>

            <div class="btn-group">

                <button type="button" class="btn btn-danger btn-circle" data-url="{{ url('projectsDeleteAll') }}">
                    <a href="projectsDeleteAll" style="color:inherit">
                        <i class="fa fa-plus"></i>

                    </a>
                </button>
                <input type="hidden" name="_method" value="delete"> {{ csrf_field() }}
            </div>

        </div>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <ul class="list-group">
            @foreach($projects as $project)
            <li class="list-group-item">
                <div class="col-md-8">
                    <td>
                        <input type="checkbox" data-id="{{$project->id}}">
                    </td>
                    <a href="/project/{{ $project->id }}"> {{$project->Name}}</a>
                </div>
                <button type="button" class="btn btn-info btn-xs">
                    <a href="/project/{{ $project->id }}" style="color:inherit"> View projects
                    </a>
                </button>

                <button class="btn btn-primary btn-xs edit-modal" data-id="{{$project->id}}" data-name="{{$project->Name}}">
                    <span class="glyphicon glyphicon-edit"></span> Edit
                </button>

                <button class="delete-modal btn btn-danger btn-xs" data-id="{{$project->id}}" data-name="{{$project->Name}}">
                    <span class="glyphicon glyphicon-trash"></span> Delete
                </button>

                <!--    <button type="button" class="btn btn-danger btn-xs" onclick="
                  var result = confirm('Are you sure you wish to delete this Company?');
                      if( result ){
                              event.preventDefault();
                              document.getElementById('delete-form').submit();
                      }">
                    Delete
                </button>
                <form id="delete-form" action="" method="POST" style="display: none;">
                    <input type="hidden" name="_method" value="delete"> {{ csrf_field() }}
                </form>-->


            </li>
            @endforeach
        </ul>
    </div>
    <!-- Form modal -->


    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">ID:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fid" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="name">Name:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="n">
                            </div>
                        </div>
                    </form>
                    <div class="deleteContent">
                        Are you Sure you want to delete
                        <span class="dname"></span> ?
                        <span class="hidden did"></span>
                    </div>
                    
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn actionBtn" data-dismiss="modal">
                            <span id="footer_action_button" class='glyphicon'> </span>
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>



    @endsection