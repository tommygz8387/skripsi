<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="importModalLabel">Import Data Guru</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form class="forms-sample" method="POST" action="{{ route('import') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Import Data</label>
                <input type="file" name="iguru" class="file-upload-default" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Import Data">
                    <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Import</button>
                    </span>
                </div>
            </div>
            <p style="lead">Belum punya template? klik <a href="{{ route('download') }}">disini</a></p>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mr-2 mt-2">Submit</button>
                <button type="reset" class="btn btn-danger mt-2">Reset</button>
            </div>
        </form>
    </div>
</div>
