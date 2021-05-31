<div class="modal fade in" id="edit_serial_number_modal">
    <div class="modal-dialog">
        <form method="POST" action="" id="edit_serial_number_form">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Serial Number</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-12">
                            <label for="serial_number_input">Serial Number:</label>
                            <input type="text" class="form-control" name="serial_number" id="edit_serial_number_input">
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
