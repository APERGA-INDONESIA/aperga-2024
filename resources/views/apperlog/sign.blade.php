@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Detail Kontrak</h3>
        <div class="row" style="justify-content: center; align-items: center; text-align:center">
            @if ($data->document)
                <embed src="/apperlog/pdf/{{ $data->id }}" type="application/pdf"
                    style="
                    width: 80%;
                    height: 70vh;
                " />
            @endif
            @if ($data->document_signed)
                <div>
                    <br><br>
                    <p>Kontrak sudah disetujui oleh {{ $data->name }} pada tanggal
                        {{ date('Y-m-d', strtotime($data->document_signed_at)) }} </p>
                </div>
            @else
                <form method="POST">
                    @csrf
                    <div>
                        <br>
                        <input type="checkbox" name="agree" />
                        Saya menyetujui segala ketentuan yang ada pada dokumen kontrak kerja dan bersedia menerima
                        konsekuensi yang berlaku
                        <br><br>
                        <button id="submit" class="btn btn-lg btn-primary" disabled>Lanjutkan</button>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection

@section('extrascript')
    {{-- gimme jquery code to disable button if checkbox is unchecked --}}
    <script>
        $(document).ready(function() {
            $('input[name="agree"]').on('change', function() {
                $('#submit').prop('disabled', !$(this).is(':checked'));
            });
        });
    </script>
@endsection
