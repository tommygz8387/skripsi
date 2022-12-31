<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="seedModalLabel"><strong>Generate Data Dummy
                Jam Khusus</strong></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form class="forms-sample" method="get" action="{{ route('jkhusus.generate') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nilai">Masukkan jumlah data</label>
                <input type="number" class="form-control" id="nilai" placeholder="Masukkan jumlah data" name="val" required>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
    </div>
</div>
