<!-- Modal -->
<div class="modal fade" id="createKelasModal" tabindex="-1" aria-labelledby="createKelasModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="createKelasModalLabel">Tambah Data Kelas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="POST" action="{{ route('kelas.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="namaKelas">Nama Kelas</label>
                        <input type="text" class="form-control" id="namaKelas" placeholder="Nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="kodeKelas">Kode Kelas</label>
                        <input type="text" class="form-control" id="kodeKelas" placeholder="Kode Kelas" name="kode">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>
