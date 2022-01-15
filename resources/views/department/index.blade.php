@extends('layouts.main')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

       @include('includes.flashmessage')
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">{{$panel}} Management</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary">{{$title}} {{$panel}}s

                            <a class="btn btn-success" href="{{route($base_route.'create')}}"><i class="fas fa-plus"></i>Create</a>
                        </h6>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div id="dataTable_filter" class="dataTables_filter">
                            <form method="GET" action="{{route($base_route.'index')}}">
                            <label>Search:
                                <input type="search" name="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable" value="{{old('search')}}">
                            </label>
                                <button type="submit" class="btn btn-success">Search</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>

                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data['rows'] as $key=>$user)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$user->name}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route($base_route.'edit',$user->id)}}">Edit</a>


                                {!!  Form::open(['route' => [$base_route.'destroy',$user->id],'method'=>'post','class'=>'d-inline']) !!}

                                {!! Form::hidden('_method','DELETE') !!}

                                {!!  Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure you want to delete this item?');"]) !!}

                                {!! Form::close() !!}




                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

   @endsection
