<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="editGuruModalLabel"><strong>Edit Data Guru</strong></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form class="forms-sample" method="POST" action="{{ route('guru.update', ['id' => $Guru->id]) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="namaGuru">Nama</label>
                <input type="text" class="form-control" id="namaGuru" placeholder="Nama" name="nama" value="{{ $Guru->nama }}" required>
            </div>
            <div class="form-group">
                <label for="nipGuru">Nomor Identitas Pegawai (NIP)</label>
                <input type="number" class="form-control" id="nipGuru" placeholder="NIP" name="nip" value="{{ $Guru->nip }}" required>
            </div>
            <div class="form-group">
                <label for="notlp">Nomor Telepon</label>
                <input type="number" class="form-control" id="notlp" placeholder="Nomor Telepon" name="no_tlp" value="{{ $Guru->no_tlp }}" required>
            </div>
            <div class="form-group">
                <label for="jmlAmpu">Jumlah Ampu per Minggu</label>
                <input type="number" class="form-control" id="jmlAmpu" placeholder="Jumlah Ampu" name="jml_ampu" value="{{ $Guru->jml_ampu }}" required>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" placeholder="Keterangan" name="keterangan" value="{{ $Guru->keterangan }}" required>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
    </div>
</div>
