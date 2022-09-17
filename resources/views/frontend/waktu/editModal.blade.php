<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="editWaktuModalLabel"><strong>Edit Data Waktu Ajar</strong></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form class="forms-sample" method="POST" action="{{ route('waktu.update', ['id' => $Waktu->id]) }}"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="jamm">Jam Mulai</label>
                <input type="time" class="form-control" id="jamm" placeholder="Jam Mulai" name="jam_mulai" value="{{ $Waktu->jam_mulai }}" required>
            </div>
            <div class="form-group">
                <label for="jams">Jam Selesai</label>
                <input type="time" class="form-control" id="jams" placeholder="Jam Selesai" name="jam_selesai" value="{{ $Waktu->jam_selesai }}" required>
            </div>
            <div class="form-group">
                <label for="total">Total</label>
                <input type="number" class="form-control" id="total" placeholder="Total" name="total" value="{{ $Waktu->total }}" required>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
    </div>
</div>
