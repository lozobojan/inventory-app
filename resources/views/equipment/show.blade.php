@extends('layouts.main')

@section('page_title', 'Equipment details')

@section('content')

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-laptop-code mr-1"></i>
                        Equipment details
                    </h3>

                </div><!-- /.card-header -->

                <div class="card-body table-responsive">

                    <div class="row">
                        <div class="col-5 table-responsive">
                            <table class="table table-striped table-sm">
                                <tr>
                                    <td>ID</td>
                                    <td>{{ $equipment->id }}</td>
                                </tr>
                                <tr>
                                    <td>Category:</td>
                                    <td>{{ $equipment->category->name }}</td>
                                </tr>
                                <tr>
                                    <td>Name:</td>
                                    <td>{{ $equipment->name }}</td>
                                </tr>
                                <tr>
                                    <td>Available quantity:</td>
                                    <td>{{ $equipment->available_quantity }}</td>
                                </tr>
                                <tr>
                                    <td>Description:</td>
                                    <td>{{ $equipment->description }}</td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-7">
                            <table class="table table-hover table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Serial No.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($serial_numbers as $key => $sn)
                                        <tr style="@if($sn->is_used) text-decoration: line-through; @endif" >
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $sn->serial_number }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
    </div>

@endsection
