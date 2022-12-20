<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="createGuruModalLabel">Import Data Guru</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Import Data</label>
                <input type="file" name="iguru" id="iguru" class="file-upload-default" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" id="name" disabled placeholder="Import Data">
                    <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button" id="sub">Import</button>
                    </span>
                </div>
            </div>
            {{-- <div class="d-flex justify-content-end mt-3 mr-3 mb-3">
                <button type="submit" class="btn btn-primary">Save</button>
            </div> --}}
        </form>
    </div>
</div>
