@extends('layouts.app') @section('content')
<div class="row col-md-9 col-lg-9 col-xs-9 pull-left" style="background: white;">
    <h1>Update company</h1>
    <div class="row col-md-12 col-lg-12 col-sm-12">
        <!-- company trong route được định nghĩa tại trang web.php trong route -->
        <form method="post" action="{{route('company.update',[$company->id])}}">
            <!-- chống tấn công xss -->
            {{csrf_field()}}
            <input type="hidden" name="_method" value="put" />
            <div class="form-group">
                <label for="company-name">Name
                    <span class="required"></span>
                </label>
                <input placeholder="Enter name" name="Name" id="company-name" required="Name" spellcheck="false" class="form-control" value="{{$company->Name}}"
                />
            </div>
            <div class="form-group">
                <label for="company-content">Description</label>
                <textarea placeholder="Enter descrition" style="resize: vertical" id="company-content" name="Description" rows="5" spellcheck="false"
                    class="form-control autosize-target text-left">
                    {{$company->Description}}
                </textarea>
            </div>
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit" />
            </div>
        </form>
    </div>
</div>
<div class="col=md-3 col-lg-3 col-xs-3 pull-right">
    <div class="sidebar-module">
        <h4>Action</h4>

    </div>
    <div class="sidebar-module">
        <ol class="list-unstyled">
            <li>
                <a href="/company/{{$company->id}}">
                    <i class="fa fa-building-o" aria-hidden="true"></i>view companies</a>
            </li>
            <li>
                <a href="/company">
                    <i class="fa fa-building" aria-hidden="true"></i>All companies</a>
            </li>
        </ol>
    </div>
</div>
@endsection