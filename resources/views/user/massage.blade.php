@if (Session::has('error'))
    <br>
    <div class="alert-danger"> Error! {{ Session::get('error') }}

    </div>
@endif

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Success!</h4>{{ Session::get('success') }}
    </div>
@endif
