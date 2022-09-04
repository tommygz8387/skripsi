<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="createWaktuModalLabel">Tambah Data Waktu Ajar</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form class="forms-sample" method="POST" action="{{ route('waktu.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="jamm">Jam Mulai</label>
                <input type="time" class="form-control" id="jamm" placeholder="Jam Mulai"
                    name="jam_mulai">
            </div>
            <div class="form-group">
                <label for="jams">Jam Selesai</label>
                <input type="time" class="form-control" id="jams" placeholder="Jam Selesai"
                    name="jam_selesai">
            </div>
            <div class="form-group">
                <label for="total">Total</label>
                <input type="number" class="form-control" id="total" placeholder="Total"
                    name="total">
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
    </div>
</div>
