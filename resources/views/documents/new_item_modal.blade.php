<div class="modal fade in" id="new_item_modal">
    <div class="modal-dialog">
        <form method="POST" action="/document-items/{{ $document->id }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-6">
                            <label for="">Equipment:</label>
                            <select class="form-control" name="equipment_id" id="equipment_select">
                                @foreach($equipment as $e)
                                    <option value="{{ $e->id }}">{{ $e->full_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="">Serial number:</label>
                            <input type="text" class="form-control" name="serial_number" id="serial_number_input">
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
