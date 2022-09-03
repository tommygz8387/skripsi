<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="createModalLabel">Tambah Data Mata Pelajaran</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form class="forms-sample" method="POST" action="{{ route('mapel.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="namaMapel">Nama Mata Pelajaran</label>
                <input type="text" class="form-control" id="namaMapel" placeholder="Nama Mata Pelajaran"
                    name="nama">
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <input type="text" class="form-control" id="jurusan" placeholder="Jurusan" name="jurusan">
            </div>
            <div class="form-group">
                <label for="ampu10">Jam Ampu Kelas 10</label>
                <input type="number" class="form-control" id="ampu10" placeholder="Jam Ampu Pada Kelas 10"
                    name="ampu1">
            </div>
            <div class="form-group">
                <label for="ampu11">Jam Ampu Kelas 11</label>
                <input type="number" class="form-control" id="ampu11" placeholder="Jam Ampu Pada Kelas 11"
                    name="ampu2">
            </div>
            <div class="form-group">
                <label for="ampu12">Jam Ampu Kelas 12</label>
                <input type="number" class="form-control" id="ampu12" placeholder="Jam Ampu Pada Kelas 12"
                    name="ampu3">
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
    </div>
</div>
