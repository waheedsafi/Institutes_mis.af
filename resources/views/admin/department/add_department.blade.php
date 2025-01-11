@extends('layout.admin.adminlayout')
@section('title', 'Department-Add')


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
                    <h1>Create Institute </h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.department') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <form action="{{ route('adddepartment') }}" method="POST">
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

                                    <label for="semester">Number Of Semester</label>
                                    <select required name="semester" id="semester" class="form-control">
                                        <option value="2">2 Semster</option>
                                        <option selected value="4">4 Semster</option>
                                        <option value="6">6 Semster</option>




                                    </select>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="pb-5 pt-3">
                    <button class="btn btn-primary" type="submit">Create</button>
                    <a href="{{ route('admin.department') }}" class="btn btn-outline-dark ml-3">Cancel</a>
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
