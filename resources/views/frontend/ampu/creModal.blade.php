<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="createModalLabel">Tambah Data Ampu</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form class="forms-sample" method="POST" action="{{ route('ampu.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="Guru">Guru</label><br>
                <select class="form-control js-example-basic-single w-100s" aria-label="Default select example" id="Guru" name="guru_id" required style="width: 100%">
                    <option selected disabled hidden value="">Pilih Guru</option>
                    @foreach ($dataGuru as $Guru)
                        <option value="{{ $Guru->id }}">{{ $Guru->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="Mapel">Mata Pelajaran</label><br>
                <select class="form-control js-example-basic-single" aria-label="Default select example" id="Mapel" name="mapel_id" required style="width: 100%">
                    <option selected disabled hidden value="">Pilih Mapel</option>
                    @foreach ($dataMapel as $Mapel)
                        <option value="{{ $Mapel->id }}">{{ $Mapel->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="Tingkat">Tingkat</label><br>
                <select class="form-control js-example-basic-single" aria-label="Default select example" id="Tingkat" name="tingkat_id" required style="width: 100%">
                    <option selected disabled hidden value="">Pilih Tingkat</option>
                    @foreach ($dataTingkat as $Tingkat)
                        <option value="{{ $Tingkat->id }}">{{ $Tingkat->tingkat }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
    </div>
</div>
