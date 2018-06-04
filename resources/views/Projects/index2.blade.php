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
                <button data-toggle="modal" data-target="#favoritesModal" name="btn_Edit" id="btn_Edit" data-title="{{$project->Name}}" type="button"
                    class="btn btn-primary btn-xs">
                    Edit
                </button>

                
                <button type="button" class="btn btn-danger btn-xs" onclick="
                  var result = confirm('Are you sure you wish to delete this Company?');
                      if( result ){
                              event.preventDefault();
                              document.getElementById('delete-form').submit();
                      }">
                    Delete
                </button>
                <form id="delete-form" action="" method="POST" style="display: none;">
                    <input type="hidden" name="_method" value="delete"> {{ csrf_field() }}
                </form>


            </li>
            @endforeach
        </ul>
    </div>

    <!-- Form modal -->

    <div class="modal fade" id="favoritesModal" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="ProjectsName">

                    </h4>
                    <input placeholder="Enter name" name="fav-title" id="fav-title" required name="Name" spellcheck="false" class="form-control">
                </div>

                <div class="modal-body">
                    <p>
                        Thông tin project
                        <b>
                            <span id="fav-title"></span>
                        </b>
                        to your favorites list.
                    </p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <span class="pull-right">
                        <button type="button" class="btn btn-primary">
                            Lưu
                        </button>
                    </span>
                </div>


            </div>
        </div>




    </div>

  


    @endsection