<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="delModalLabel"><strong>Hapus Data
                Slot Ajar</strong></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            Apakah anda ingin menghapus data?
        </div>
    </div>
    <div class="modal-footer">
        <a href="{{ route('slot.delete', ['id' => $Slot->id]) }}" class="btn btn-primary mr-2">Yes</a>
        <button type="button" class="btn btn-secondary text-light" data-dismiss="modal">No</button>
    </div>
</div>
