<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="editModalLabel"><strong>Edit Data Jam Khusus Kelas</strong></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form class="forms-sample" method="POST" action="{{ route('jkkelas.update', ['id' => $JKKelas->id]) }}"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="Kelas">Kelas</label><br>
                <select class="chosen" aria-label="Default select example" id="Kelas" name="kelas_id" required>
                    <option selected hidden value="{{ $JKKelas->kelas_id }}">{{ $JKKelas->kelas->nama }}</option>
                    @foreach ($dataKelas as $Kelas)
                        <option value="{{ $Kelas->id }}">{{ $Kelas->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="Hari">Hari</label><br>
                <select class="chosen" aria-label="Default select example" id="Hari" name="hari_id" required>
                    <option selected hidden value="{{ $JKKelas->slot->hari_id }}">{{ $JKKelas->slot->hari->hari }}</option>
                    @foreach ($dataHari as $hari)
                        <option value="{{ $hari->id }}">{{ $hari->hari }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="Jam">Jam</label><br>
                <select class="chosen" aria-label="Default select example" id="Jam" name="waktu_id" required>
                    <option selected hidden value="{{ $JKKelas->slot->waktu_id }}">{{ $JKKelas->slot->waktu->jam_mulai }}-{{ $JKKelas->slot->waktu->jam_selesai }}</option>
                    @foreach ($dataWaktu as $waktu)
                        <option value="{{ $waktu->id }}">{{ $waktu->jam_mulai }}-{{ $waktu->jam_selesai }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
    </div>
</div>