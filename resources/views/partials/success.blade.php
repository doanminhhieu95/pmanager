@if(session()->has('thanhcong'))
    <div class="alert alert-dismissable alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>
            {!!session()->get('thanhcong')!!}
        </strong>
    </div>
@endif