<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="editModalLabel"><strong>Edit Data Jam Khusus</strong></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form class="forms-sample" method="POST" action="{{ route('manual.update', ['id' => $Manual->id]) }}"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="Hari">Hari</label>
                <select class="form-control" aria-label="Default select example" id="Hari" name="hari_id">
                    <option selected hidden value="{{ $Manual->hari_id }}">{{ $Manual->slot->hari->hari }}</option>
                    @foreach ($dataHari as $hari)
                        <option value="{{ $hari->id }}">{{ $hari->hari }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="Jam">Jam</label>
                <select class="form-control" aria-label="Default select example" id="Jam" name="waktu_id">
                    <option selected hidden value="{{ $Manual->waktu_id }}">{{ $Manual->slot->waktu->jam_mulai }}-{{ $Manual->slot->waktu->jam_selesai }}</option>
                    @foreach ($dataWaktu as $waktu)
                        <option value="{{ $waktu->id }}">{{ $waktu->jam_mulai }}-{{ $waktu->jam_selesai }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="Kelas">Kelas</label>
                <select class="form-control" aria-label="Default select example" id="Kelas" name="kelas_id">
                    <option selected hidden value="{{ $Manual->kelas_id }}">{{ $Manual->kelas->nama }}</option>
                    @foreach ($dataKelas as $Kelas)
                        <option value="{{ $Kelas->id }}">{{ $Kelas->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="Guru">Guru</label>
                <select class="form-control" aria-label="Default select example" id="Guru" name="guru_id">
                    <option selected hidden value="{{ $Manual->guru_id }}">{{ $Manual->guru->nama }}</option>
                    @foreach ($dataGuru as $Guru)
                        <option value="{{ $Guru->id }}">{{ $Guru->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="Mapel">Mata Pelajaran</label>
                <select class="form-control" aria-label="Default select example" id="Mapel" name="mapel_id">
                    <option selected hidden value="{{ $Manual->mapel_id }}">{{ $Manual->mapel->nama }}</option>
                    @foreach ($dataMapel as $Mapel)
                        <option value="{{ $Mapel->id }}">{{ $Mapel->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="Ruang">Ruang</label>
                <select class="form-control" aria-label="Default select example" id="Ruang" name="ruang_id">
                    <option selected hidden value="{{ $Manual->ruang_id }}">{{ $Manual->ruang->nama }}</option>
                    @foreach ($dataRuang as $Ruang)
                        <option value="{{ $Ruang->id }}">{{ $Ruang->nama }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
    </div>
</div>
