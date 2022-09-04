<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="createHariModalLabel">Tambah Data Hari</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form class="forms-sample" method="POST" action="{{ route('hari.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="hari">Hari</label>
                <input type="text" class="form-control" id="hari" placeholder="Hari"
                    name="hari">
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
    </div>
</div>