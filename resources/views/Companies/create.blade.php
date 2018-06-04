@extends('layouts.app') @section('content')
<div class="panel panel-primary">
    <div class="panel-heading">
        <i class="fa fa-list fa-fw"></i> Danh sách công ty
        <div class="pull-right">

        </div>
    </div>
    <div class="panel-body">
        <div class="row col=md-9 col-lg-9 col-xs-9 pull-left" style="background: white;">
            <h1>Update company</h1>
            <div class="row col-md-12 col-lg-12 col-sm-12">
                <!-- company trong route được định nghĩa tại trang web.php trong route -->
                <form method="post" action="{{route('company.store')}}">
                    <!-- chống tấn công xss -->
                    {{csrf_field()}}
                    
                    <div class="form-group">
                        <label for="company-name">Name
                            <span class="required"></span>
                        </label>
                        <input placeholder="Enter name" name="Name" id="company-name" required="Name" spellcheck="false" class="form-control" />

                        <div class="form-group">
                            <label for="company-content">Description</label>
                            <textarea placeholder="Enter description" style="resize: vertical" id="company-content" name="Description" rows="5" spellcheck="false"
                                class="form-control autosize-target text-left">

                            </textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection