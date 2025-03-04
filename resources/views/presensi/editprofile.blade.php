@extends('layouts.presensi')
@section('header')
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="javascript:;" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">Edit Profile</div>
        <div class="right">
        </div>
    </div>
@endsection

@section('content')
    <div class="row" style="margin-top: 4rem">
        <div class="col">
            @php
                $messagesuccess = Session::get('success');
                $messageerror = Session::get('error');
            @endphp
            @if (Session::get('success'))
                <div class="alert alert-success">
                    {{ $messagesuccess }}
                </div>
            @endif
            @if (Session::get('error'))
                <div class="alert alert-danger">
                    {{ $messageerror }}
                </div>
            @endif
        </div>
    </div>
    <form action="/presensi/{{ $karyawan->nik }}/updateprofile" method="POST" enctype="multipart/form-data"
        onsubmit="return validateProfileForm()">
        @csrf
        <div class="col">
            <div class="form-group boxed">
                <div class="input-wrapper">
                    <input type="text" class="form-control" value="{{ $karyawan->nama_lengkap }}" name="nama_lengkap"
                        placeholder="Nama Lengkap" autocomplete="off">
                </div>
            </div>
            <div class="form-group boxed">
                <div class="input-wrapper">
                    <input type="text" class="form-control" value="{{ $karyawan->no_hp }}" name="no_hp"
                        placeholder="No. HP" autocomplete="off">
                </div>
            </div>
            <div class="form-group boxed">
                <div class="input-wrapper">
                    <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off">
                </div>
            </div>
            <div class="custom-file-upload" id="fileUpload1">
                <input type="file" name="foto" id="fileuploadInput" accept=".png, .jpg, .jpeg">
                <label for="fileuploadInput">
                    <span>
                        <strong>
                            <ion-icon name="cloud-upload-outline" role="img" class="md hydrated"
                                aria-label="cloud upload outline"></ion-icon>
                            <i>Tap to Upload</i>
                        </strong>
                    </span>
                </label>
            </div>
            <div class="form-group boxed">
                <div class="input-wrapper">
                    <button type="submit" class="btn btn-primary btn-block">
                        <ion-icon name="refresh-outline"></ion-icon>
                        Update
                    </button>
                </div>
            </div>
            <div class="form-group boxed">
                <div class="input-wrapper">
                    <a href="/proseslogout" class="btn btn-danger btn-block">
                        <ion-icon name="log-out-outline"></ion-icon>
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </form>

    <script>
        function validateProfileForm() {
            const name = document.querySelector('input[name="nama_lengkap"]').value;
            const phone = document.querySelector('input[name="no_hp"]').value;

            if (!name) {
                Swal.fire({
                    title: 'Gagal',
                    text: 'Nama Harus Di Isi',
                    icon: 'error',
                });
                return false;
            }
            if (!phone) {
                Swal.fire({
                    title: 'Gagal',
                    text: 'No.Hp Harus Di Isi',
                    icon: 'error',
                });
                return false;
            }
            return true;
        }
    </script>
@endsection
