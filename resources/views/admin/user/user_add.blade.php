@extends('layout.admin.adminlayout')
@section('title', 'Add-User')


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
                    <h1>Create User </h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.users') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <form action="{{ route('adduser') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">

                                    <label for="name">Name</label>
                                    <input type="text" required name="name" id="name" class="form-control"
                                        placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="city">City</label>
                                    <input type="text" name="city" required id="city" class="form-control"
                                        placeholder="City">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">

                                    <label for="founder">Founder</label>
                                    <input type="text" name="founder" id="founder" class="form-control"
                                        placeholder="founder">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">

                                    <label for="CEO">CEO</label>
                                    <input type="text" name="CEO" id="CEO" class="form-control"
                                        placeholder="CEO">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">

                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Block</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">

                                    <label for="create_date">Create Date</label>
                                    <input type="date" max="{{ date('Y') }}-{{ date('m') }}-{{ date('d') }}"
                                        name="create_date" id="create_date" class="form-control" placeholder="2000/3/3">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="Address">Address</label>
                                    <textarea name="location" id="location" class="form-control" cols="30" rows="5"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="pb-5 pt-3">
                    <button class="btn btn-primary" type="submit">Create</button>
                    <a href="{{ route('admin.institute') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->

    </section>
@endsection
@section('saidbar')
    @include('layout.admin.adminsidebar')
@endsection
