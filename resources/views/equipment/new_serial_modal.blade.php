<div class="modal fade in" id="new_serial_modal">
  <div class="modal-dialog">
    {{-- NE MOŽE OVAJ ACTION, MORA NOVA ROUTE ZA OVO --}}
    <form method="POST" action="/serials">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">


          <div>
            <label for="">Serial number:</label>
            <input type="hidden" name="equipment_id" value={{ $equipment->id }} />
            <input type="text" class="form-control" name="serial_number" id="serial_number_input">
          </div>


        </div>
        <div class="modal-footer">
          <a type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</a>
          <button type="submit" class="btn btn-primary">Save serial</button>
        </div>
      </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>