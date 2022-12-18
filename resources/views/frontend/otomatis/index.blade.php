@extends('layouts.app')
@section('title')
    Penjadwalan Otomatis - Inisialisasi
@endsection
@section('content')
    {{-- form data user --}}
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Penjadwalan Otomatis</h4>
                <div class="row justify-content-between mx-0">
                    <p class="card-description">
                        Optimasi Penjadwalan dengan Algoritma Ant Colony
                    </p>
                </div>
                <hr>
                <form class="forms-sample" method="get" action="{{ route('init') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row m-auto">

                        <div class="col-6">
                            <div class="form-group">
                                <label for="alpha">Alpha (&alpha;)</label>
                                <input type="number" class="form-control" id="alpha" placeholder="Nilai Alpha" name="alpha" required step=".01" onkeyup="success()" value="0.1">
                            </div>
                            <div class="form-group">
                                <label for="beta">Beta (&beta;)</label>
                                <input type="number" class="form-control" id="beta" placeholder="Nilai Beta" name="beta" required step=".01" onkeyup="success()" value="0.1">
                            </div>
                            <div class="form-group">
                                <label for="q">Nilai Q</label>
                                <input type="number" class="form-control" id="q" placeholder="Nilai Q" name="q" required onkeyup="success()" value="1">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="rho">Rho (&rho;)</label>
                                <input type="number" class="form-control" id="rho" placeholder="Nilai Rho" name="rho" required step=".01" onkeyup="success()" value="0.1">
                            </div>
                            <div class="form-group">
                                <label for="tau">&tau;ij</label>
                                <input type="number" class="form-control" id="tau" placeholder="Nilai &tau;ij" name="tau" required step=".01" onkeyup="success()" value="0.1">
                            </div>
                            <div class="d-flex justify-content-end mt-5">
                                <button type="submit" class="btn btn-primary mr-2" id="g">Submit</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('cus-script')
    <script>
        $(document).ready(function() {
            $("#g").click(function() {
            // add spinner to button
                $(this).html(
                    '<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span> Loading...'
                );
            });
        });
    </script>
    <script type="text/javascript">
        function success() {
            if(document.getElementById("alpha").value===""||document.getElementById("beta").value===""||document.getElementById("q").value===""||document.getElementById("rho").value===""||document.getElementById("tau").value==="") { 
                document.getElementById('g').disabled = true; 
            } else { 
                document.getElementById('g').disabled = false;
            }
        }
    </script>

@endsection