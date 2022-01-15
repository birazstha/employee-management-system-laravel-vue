@extends('layouts.main')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">{{$panel}} Management</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{$title}} {{$panel}}s

                    <a class="btn btn-warning" href="{{route($base_route.'index')}}"><i class="fas fa-plus"></i>List</a>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            {!!  Form::open(['route' => $base_route.'store','method'=>'post']) !!}

                        @include($base_route.'include.mainform')
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->



@endsection
