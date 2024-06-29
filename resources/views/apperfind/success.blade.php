@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="apperfind-success">
            <img src="/img/success.png" alt="success">
            <h2>Ajuan Kontrak Berhasil Dibuat</h2>
            <div class="content">
                <span>
                    Ajuan kontrak anda dengan nomor id <b> {{ $data->generated_id }} </b> untuk PRT atas nama  <b> {{ $data->talent->name }} </b> sudah berhasil dibuat dan sedang menunggu proses review oleh admin. Silahkan mengecek progres ajuan kontrak anda pada laman berikut
                </span>
            </div>
            <a class="progress-button" href="/apperlog/progress/{{ $data->id }}">Cek Progress Kontrak</a>
        </div>
    </div>
@endsection
