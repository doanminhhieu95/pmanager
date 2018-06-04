@extends('layouts.app') @section('content')
<div class="panel panel-primary">
    <div class="panel-heading">
        <i class="fa fa-plus fa-fw"> </i> Thêm project
        <div class="pull-right">

        </div>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="row col-md-12 col-lg-12 col-sm-12 pull-left " style="background: white;">

            <!-- Example row of columns -->
            <div class="row  col-md-12 col-lg-12 col-sm-12">
           
                <form method="post" action="{{route('Projects.store') }}" >
                    <!--chong tan cong xss-->
                    {{ csrf_field() }}

                   <!--  <input type="hidden" name="_method" value="put">-->
                   

                    <div class="form-group">
                        <label for="company-name">Name
                            <span class="required">*</span>
                        </label>
                        <input placeholder="Enter name" name="Name" id="company-name" required name="Name" spellcheck="false" class="form-control"
                            />
                    </div>


                    <div class="form-group">
                        <label for="company-content">Description</label>
                        <textarea placeholder="Enter description" style="resize: vertical" id="company-content" name="Description" rows="5" spellcheck="false"
                            class="form-control autosize-target text-left">
                            </textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Submit" />
                    </div>
                </form>


            </div>
        </div>
    </div>
    <!-- /.panel-body -->
</div>
<!-- /.panel -->


<!-- /.panel -->
@endsection