@extends('layouts.main')

@section('page_title', 'Edit Document details')

@section('content')

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-plus mr-1"></i>
                        Edit Document details
                    </h3>

                </div><!-- /.card-header -->

                <div class="card-body table-responsive">

                    <form action="/documents/{{ $document->id }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-4">
                                <label for="user_select">Employee:</label>
                                <select name="user_id" id="user_select" class="form-control @error('user_id') is-invalid @endif">
                                    <option value="">- select an employee -</option>
                                    @foreach($users as $user)
                                        <option
                                            value="{{ $user->id }}"
                                            {{ $user->id == $document->user_id ? 'selected' : '' }}
                                        >
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
                            <div class="col-4">
                                <label for="date_input">Date:</label>
                                <input type="date" name="date" value="{{ $document->date->format('Y-m-d') }}" id="date_input" class="form-control @error('date') is-invalid @endif" />
                                @error('date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat mt-4">
                                    SAVE DOCUMENT DETAILS
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="row mt-4">
                        <div class="col-12 table-responsive">
                            <h6 class="my-3">
                                Document Items
                                <button type="button"
                                        class="btn btn-sm btn-flat btn-primary float-right"
                                        data-toggle="modal"
                                        data-target="#new_item_modal"
                                >
                                    Add items
                                </button>
                            </h6>

                            <table class="table table-sm table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Equipment</th>
                                        <th>Serial number</th>
                                        <th>Returned</th>
                                        <th>Returned date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($items as $item)
                                        <tr>
                                            <td>{{ $item->equipment->full_name }}</td>
                                            <td>{{ $item->serial_number }}</td>
                                            <td>
                                                @if($item->returned)
                                                    <i class="fa fa-check-circle"></i>
                                                @else
                                                    <i class="fa fa-times-circle"></i>
                                                @endif
                                            </td>
                                            <td>{{ $item->returned_date_formated }}</td>
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
    @include('documents.new_item_modal')
@endsection
@section('additional_scripts')
    <script src="{{ asset('js/documents/create.js') }}"></script>
@endsection
