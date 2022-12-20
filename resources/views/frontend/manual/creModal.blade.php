<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="createModalLabel">Tambah Data Jam Ajar</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form class="forms-sample" method="POST" action="{{ route('manual.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="Hari">Hari</label><br>
                <select class="form-control" aria-label="Default select example" id="Hari"
                    name="hari_id" required>
                    <option selected disabled hidden value="">Pilih Hari</option>
                    @foreach ($dataHari as $hari)
                        <option value="{{ $hari->id }}">{{ $hari->hari }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="Jam">Jam</label><br>
                <select class="form-control" aria-label="Default select example" id="Jam"
                    name="waktu_id" required>
                    <option selected disabled hidden value="">Pilih Jam</option>
                    {{-- @foreach ($dataWaktu as $waktu)
                        <option value="{{ $waktu->id }}">{{ $waktu->jam_mulai }}-{{ $waktu->jam_selesai }}</option>
                    @endforeach --}}
                </select>
            </div>
            <div class="form-group">
                <label for="Kelas">Kelas</label><br>
                <select class="form-control" aria-label="Default select example" id="Kelas"
                    name="kelas_id" required>
                    <option selected disabled hidden value="">Pilih Kelas</option>
                    @foreach ($dataKelas as $Kelas)
                        <option value="{{ $Kelas->id }}">{{ $Kelas->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="Guru">Guru</label><br>
                <select class="form-control" aria-label="Default select example" id="Guru"
                    name="guru_id" required>
                    <option selected disabled hidden value="">Pilih Guru</option>
                    @foreach ($dataGuru as $Guru)
                        <option value="{{ $Guru->id }}">{{ $Guru->nama }}</option>
                    @endforeach
                </select>
            </div>
            <wdiv class="form-group">
                <label for="Mapel">Mata Pelajaran</label><br>
                <select class="form-control" aria-label="Default select example" id="Mapel"
                    name="mapel_id" required>
                    <option selected disabled hidden value="">Pilih Mapel</option>
                    {{-- @foreach ($dataMapel as $Mapel)
                        <option value="{{ $Mapel->id }}">{{ $Mapel->nama }}</option>
                    @endforeach --}}
                </select>
            </wdiv>
            <div class="form-group">
                <label for="Ruang">Ruang</label><br>
                <select class="form-control" aria-label="Default select example" id="Ruang"
                    name="ruang_id" required>
                    <option selected disabled hidden value="">Pilih Ruang</option>
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
