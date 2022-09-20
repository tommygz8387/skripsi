<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="editModalLabel"><strong>Edit Data Mata Pelajaran</strong></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form class="forms-sample" method="POST" action="{{ route('mapel.update', ['id' => $Mapel->id]) }}"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="namaMapel">Nama Mata Pelajaran</label>
                <input type="text" class="form-control" id="namaMapel" placeholder="Nama Mata Pelajaran"
                    name="nama" value="{{ $Mapel->nama }}">
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <select class="form-control" aria-label="Default select example" id="jurusan" name="jurusan_id" required>
                    <option selected hidden value="{{ $Mapel->jurusan_id }}">{{ $Mapel->jurusan->jurusan }}</option>
                    @foreach ($dataJurusan as $jurusan)
                        <option value="{{ $jurusan->id }}">{{ $jurusan->jurusan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="ampu10">Jam Ampu Kelas 10</label>
                <input type="number" class="form-control" id="ampu10" placeholder="Jam Ampu Pada Kelas 10"
                    name="ampu1"  value="{{ $Mapel->ampu1 }}" required>
            </div>
            <div class="form-group">
                <label for="ampu11">Jam Ampu Kelas 11</label>
                <input type="number" class="form-control" id="ampu11" placeholder="Jam Ampu Pada Kelas 11"
                    name="ampu2"  value="{{ $Mapel->ampu2 }}" required>
            </div>
            <div class="form-group">
                <label for="ampu12">Jam Ampu Kelas 12</label>
                <input type="number" class="form-control" id="ampu12" placeholder="Jam Ampu Pada Kelas 12"
                    name="ampu3"  value="{{ $Mapel->ampu3 }}" required>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
    </div>
</div>
