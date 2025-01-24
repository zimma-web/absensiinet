@extends('layouts.presensi')
@section('header')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">

    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="javascript:;" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">Form Izin</div>
        <div class="right">
        </div>
    </div>
@endsection
@section('content')
    <div class="row" style="margin-top: 70px">
        <div class="col">
            <form action="#" method="POST" id="frmizin">
                @csrf
                <div class="col">
                    <div class="form-group">
                        <input type="text" id="tgl_izin" nama="tgl_izin" class="form-control datepicker"
                            placeholder="Tanggal">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <select name="status" id="status" class="form-control">
                            <option value="">Izin/Sakit</option>
                            <option value="i">Izin</option>
                            <option value="s">Sakit</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control" placeholder="keterangan"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary w-100">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('myscript')
    <script>
        var currYear = (new Date()).getFullYear();
        $(document).ready(function() {
            $(".datepicker").datepicker({
                format: "yyyy-mm-dd"
            });

            $("#frmizin").submit(function() {
                var tgl_izin = $("#tgl_izin").val();
                var status = $("#status").val();
                var keterangan = $("#keterangan").val();
                if (tgl_izin == "") {
                    Swal.fire({
                        title: 'Oops!',
                        text: 'Tanggal harus diisi',
                        icon: 'warning',
                    })
                    return false;
                } else if (status == "") {
                    Swal.fire({
                        title: 'Oops!',
                        text: 'Status harus diisi',
                        icon: 'warning',
                    })
                    return false;
                } else if (keterangan == "") {
                    Swal.fire({
                        title: 'Oops!',
                        text: 'Keterangan harus diisi',
                        icon: 'warning',
                    })
                    return false;
                }
            });
        });
    </script>
@endpush
