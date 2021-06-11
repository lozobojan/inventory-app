@extends('layouts.main')

@section('page_title', 'Edit Equipment details')

@section('content')

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-plus mr-1"></i>
                        Edit Equipment details
                    </h3>

                </div><!-- /.card-header -->

                <div class="card-body table-responsive">

                    <form action="/equipment/{{ $equipment->id }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-4">
                                <label for="catogory_select">Equipment category:</label>
                                <select name="equipment_category_id" id="catogory_select" class="form-control @error('equipment_category_id') is-invalid @endif">
                                    <option value="">- select a category -</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $equipment->equipment_category_id ? 'selected' : '' }} >{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error(' equipment_category_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
                            <div class="col-4">
                                <label for="name_input">Name:</label>
                                <input type="text" name="name" value="{{ $equipment->name }}" id="name_input" class="form-control @error('name') is-invalid @endif" placeholder="Enter a name" />
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label for="available_quantity_input">Available quantity:</label>
                                <input type="number" step="1" min="0" readonly name="available_quantity" value="{{ $equipment->available_quantity }}" class="form-control  @error('available_quantity') is-invalid @endif " placeholder="Enter quantity" id="available_quantity_input">
                                @error('available_quantity')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-7">
                                <label for="description_txt">Description:</label>
                                <textarea name="description" id="description_txt" class="form-control" placeholder="Enter equipment description" rows="4"></textarea>
                            </div>
                            <div class="col-5">
                                <label class="ml-3 mb-2" for="serial_numbers_select">Serial numbers:</label>
                                <div class="d-flex flex-row ml-3">

                                    <select id="serial_numbers_select" size="5" class="w-100 form-control"></select>
                                    @error('serial_number')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                    <input type="hidden" name="serial_numbers" id="serial_numbers" >
                                    <script>let serial_numbers = @json($equipment->serial_numbers_stringify)</script>

                                    <div class="d-flex flex-column mx-1">
                                        <button id="add" type="button" class="btn btn-success btn-sm btn-flat mt-1"><i class="fa fa-plus"></i></button>
                                        <button id="remove" type="button" class="btn btn-danger btn-sm btn-flat mt-1"><i class="fa fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-4 offset-4">
                                <button id="submit" type="submit" class="btn btn-primary btn-block btn-flat mt-4">
                                    SAVE EQUIPMENT DETAILS
                                </button>
                            </div>
                        </div>

                    </form>

                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
    </div>

@endsection
@section('additional_scripts')
    <script src="{{ asset('js/equipment/create.js') }}"></script>
@endsection
