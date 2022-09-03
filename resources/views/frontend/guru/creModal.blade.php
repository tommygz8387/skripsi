<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="createGuruModalLabel">Tambah Data Guru</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form class="forms-sample" method="POST" action="{{ route('guru.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="namaGuru">Nama</label>
                <input type="text" class="form-control" id="namaGuru" placeholder="Nama" name="nama">
            </div>
            <div class="form-group">
                <label for="nipGuru">Nomor Identitas Pegawai (NIP)</label>
                <input type="number" class="form-control" id="nipGuru" placeholder="NIP" name="nip" max="99999">
            </div>
            <div class="form-group">
                <label for="notlp">Nomor Telepon</label>
                <input type="number" class="form-control" id="notlp" placeholder="Nomor Telepon" name="no_tlp">
            </div>
            <div class="form-group">
                <label for="jmlAmpu">Jumlah Ampu per Minggu</label>
                <input type="number" class="form-control" id="jmlAmpu" placeholder="Jumlah Ampu" name="jml_ampu">
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" placeholder="Keterangan" name="keterangan">
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
    </div>
</div>
