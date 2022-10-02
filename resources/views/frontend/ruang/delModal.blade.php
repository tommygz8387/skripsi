<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="delModalLabel"><strong>Hapus Data Ruang</strong></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                Apakah anda ingin menghapus data {{ $Ruang->nama }}?
            </div>
        </div>
        <div class="modal-footer">
            <a href="{{ route('ruang.delete', ['id' => $Ruang->id]) }}" class="btn btn-primary mr-2">Submit</a>
            <button type="button" class="btn btn-secondary text-light" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
