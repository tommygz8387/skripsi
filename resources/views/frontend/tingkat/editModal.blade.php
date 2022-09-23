<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="editTingkatModalLabel"><strong>Edit Data Tingkatan</strong></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form class="forms-sample" method="POST" action="{{ route('tingkat.update', ['id' => $Tingkat->id]) }}"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="tingkat">Tingkatan</label>
                <input type="text" class="form-control" id="tingkat" placeholder="Tingkatan" name="tingkat" value="{{ $Tingkat->tingkat }}" required>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
    </div>
</div>
