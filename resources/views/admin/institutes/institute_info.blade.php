@extends('layout.admin.adminlayout')
@section('title', 'Info-Institute')


@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}

        </div>
    @endif
    <!-- Main content -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Info Institute @foreach ($instdata as $id => $data)
                            @php
                                $id = $data->Inid;
                                $name = $data->Institute_name;
                                $city = $data->city;
                                $location = $data->location;
                                $CEO = $data->CEO;
                                $status = $data->status;
                                $create_date = $data->create_date;
                                $founder = $data->founder;
                            @endphp
                        @endforeach
                        {{ $name }}
                    </h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.institute') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">

                                <label for="name">Name</label>
                                <input type="text" required name="name" id="name" disabled class="form-control"
                                    value="{{ $name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="city">City</label>
                                <input type="text" name="city" required id="city" disabled class="form-control"
                                    value="{{ $city }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">

                                <label for="founder">Founder</label>
                                <input type="text" name="founder" id="founder" disabled class="form-control"
                                    value="{{ $founder }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">

                                <label for="CEO">CEO</label>
                                <input type="text" name="CEO" id="CEO" class="form-control" disabled
                                    value="{{ $CEO }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                @php
                                    $active = '';
                                    $block = '';
                                    if ($status == 'active') {
                                        $active = 'selected';
                                    } else {
                                        # code...
                                        $block = 'selected';
                                    }
                                @endphp
                                <label for="status">Status</label>
                                <select name="status" id="status" disabled class="form-control">

                                    <option {{ $active }} value="1">Active</option>
                                    <option {{ $block }} value="0">Block</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">

                                <label for="create_date">Create Date</label>
                                <input disabled type="date" value="{{ $create_date }}"
                                    max="{{ date('Y') }}-{{ date('m') }}-{{ date('d') }}" name="create_date"
                                    id="create_date" class="form-control" placeholder="2000/3/3">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="Address">Address</label>
                                <input disabled name="location" id="location" class="form-control" cols="30"
                                    rows="5" value="{{ $location }}">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3">

                <a href="{{ route('admin.institute') }}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>

        </div>

        <!-- /.card -->
    </section>
    <!-- /.content -->

    </section>
@endsection
@section('saidbar')

    @include('layout.admin.adminsidebar')


@endsection
