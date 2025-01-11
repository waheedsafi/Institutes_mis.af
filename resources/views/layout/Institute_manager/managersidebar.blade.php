{{-- 	
@foreach ($perdata as $perm)
@foreach ($perm as $key => $value)
<li class="nav-item">{{$value}}</li>

@endforeach --}}

{{-- @endforeach --}}
<script>
    var permisi = {!! json_encode($perdata) !!};
    $(document).ready(function() {

        // $('#user-view').attr('hidden', false);

        $.each(permisi, function(array, key) {
            $.each(key, function(keyy, value) {

                $('#' + value + '').attr('hidden', false);
            });
        });

    });
</script>

<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">



    <li id='test'>

    </li>

    <!-- Add icons to the links using the .nav-icon class
  with font-awesome or any other icon font library -->
    <li hidden id='view-user' class="nav-item ">
        <a disabled id="dashboard" href="{{ route('admin.dashboard') }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt "></i>
            <p>Dashboard</p>
        </a>
    </li>
    <li hidden id="add-user" class="nav-item">
        <a href="{{ route('admin.institute') }}" class="nav-link">
            <i class="nav-icon fas fa-university"></i>
            <p>Student Add</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('admin.users') }}" class="nav-link">
            <i class="nav-icon fas fa-user-alt"></i>
            <p>Departments</p>
        </a>

    </li>
    <li class="nav-item">
        <a href="brands.html" class="nav-link">
            <i class="nav-icon fas fa-lock"></i>

            <p>Role</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="products.html" class="nav-link">
            <i class="nav-icon fas fa-user-lock"></i>
            <p>Permission</p>
        </a>
    </li>


    <li class="nav-item">
        <a href="orders.html" class="nav-link">
            <i class="nav-icon fas fa-book-open"></i>
            <p>Subject</p>
        </a>
    </li>

</ul>
