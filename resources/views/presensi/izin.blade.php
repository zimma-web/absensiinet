@extends('layouts.presensi')
@section('header')
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="javascript:;" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">Data Izin / Sakit</div>
        <div class="right">
        </div>
    </div>
@endsection
@section('content')
    <div class="fab-button bottom-right" style="margin-bottom: 70px">
        <a href="/presensi/buatizin" class="fab" id="fab-button">
            <ion-icon name="add-outline"></ion-icon>
        </a>
    </div>
@endsection
