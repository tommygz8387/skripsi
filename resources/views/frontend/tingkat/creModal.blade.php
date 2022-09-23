<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="createTingkatModalLabel">Tambah Data Tingkat</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form class="forms-sample" method="POST" action="{{ route('tingkat.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="Tingkat">Tingkat</label>
                <input type="text" class="form-control" id="Tingkat" placeholder="Tingkatan Kelas"
                    name="tingkat" required>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
    </div>
</div>