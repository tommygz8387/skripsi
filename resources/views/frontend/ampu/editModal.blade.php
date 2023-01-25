<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="editModalLabel"><strong>Edit Data Jam Khusus</strong></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form class="forms-sample" method="POST" action="{{ route('ampu.update', ['id' => $Ampu->id]) }}"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="Guru">Guru</label><br>
                <select class="chosen" aria-label="Default select example" id="Guru" name="guru_id" style="width: 100%">
                    <option selected hidden value="{{ $Ampu->guru_id }}">{{ $Ampu->guru->nama }}</option>
                    @foreach ($dataGuru as $Guru)
                        <option value="{{ $Guru->id }}">{{ $Guru->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="Mapel">Mata Pelajaran</label><br>
                <select class="chosen" aria-label="Default select example" id="Mapel" name="mapel_id" style="width: 100%">
                    <option selected hidden value="{{ $Ampu->mapel_id }}">{{ $Ampu->mapel->nama }}</option>
                    @foreach ($dataMapel as $Mapel)
                        <option value="{{ $Mapel->id }}">{{ $Mapel->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="Tingkat">Tingkat</label><br>
                <select class="chosen" aria-label="Default select example" id="Tingkat" name="tingkat_id" style="width: 100%">
                    <option selected hidden value="{{ $Ampu->tingkat_id }}">{{ $Ampu->tingkat->tingkat }}</option>
                    @foreach ($dataTingkat as $Tingkat)
                        <option value="{{ $Tingkat->id }}">{{ $Tingkat->tingkat }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="Beban">Beban Ampu /  Minggu</label>
                <input type="number" class="form-control" id="Beban" placeholder="Beban Ampu" name="beban" min="1" max="4" step="1" required value="{{ $Ampu->beban }}">
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
    </div>
</div>
