@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Detail Kontrak</h3>
        <div class="row">
            <div class="detail-contract col-md-6">
                <div class="contract-item">
                    <span class="label">ID Kontrak</span>
                    <span class="value">{{ $data->generated_id }}</span>
                </div>
                <div class="contract-item">
                    <span class="label">Lama Kontrak</span>
                    <span class="value">{{ $data->plan_number }} {{ $data->plan_type }}</span>
                </div>
                <div class="contract-item">
                    <span class="label">Nama Pengaju</span>
                    <span class="value">{{ $data->name }}</span>
                </div>
                <div class="contract-item">
                    <span class="label">Kontak Pengaju</span>
                    <span class="value">{{ $data->contact }}</span>
                </div>
                <div class="contract-item">
                    <span class="label">Tanggal Pengajuan</span>
                    <span class="value">{{ date_format($data->created_at, 'd M y') }}</span>
                </div>
                <div class="contract-item">
                    <span class="label">Jenis Pembayaran</span>
                    <span class="value" style="text-transform: uppercase">{{ $data->payment_type }}</span>
                </div>
                @if($data->payment_type == "dp")
                    <div class="contract-item">
                        <span class="label">Total DP</span>
                        <span class="value">Rp. {{ number_format($data->dp_amount, 0, '.', '.') }}</span>
                    </div>
                @endif
                <div class="contract-item">
                    <span class="label">Total Pembayaran Kontrak</span>
                    <span class="value">Rp. {{ number_format($data->amount, 0, '.', '.') }}</span>
                </div>
                <hr>
                <div class="contract-item">
                    <span class="label">Status</span>
                    <span class="value" style="text-transform: capitalize">{{ $data->status }}</span>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="contract-item">
                        <span class="label">Action</span>
                        <span class="value">
                            <select name="status" class="form-control">
                                <option value="0">---</option>
                                <option value="approved" @selected($data->status == 'approved')>Approve</option>
                                <option value="rejected" @selected($data->status == 'rejected')>Reject</option>
                            </select>
                        </span>
                    </div>
                    <div class="contract-item">
                        <span class="label">File Kontrak</span>
                        <span class="value">
                            <input type="file" name="file" class="form-control" accept="application/pdf" id="file" onchange="checkFile(this)">
                        </span>
                    </div>
                    <br>
                    <div class="contract-item">
                        <span class="label">&nbsp;</span>
                        <span class="value">
                            <button type="submit" class="btn btn-primary">
                                <span class="fa fa-save"></span>
                            </button>
                            <a href="/apperlog" class="btn btn-light">
                                <i class="fa fa-arrow-left"></i>
                            </a>
                        </span>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                @if ($data->document)
                    <embed src="/apperlog/pdf/{{ $data->id }}" type="application/pdf" width="100%" height="100%"/>
                @endif
            </div>
        </div>
    </div>
@endsection


@section("extrascript")
    <script>
        function checkFile(input) {
            if (input.files && input.files[0]) {
                const file = input.files[0];
                const maxSize = 1024 * 1024; // 1MB
                if (file.size > maxSize) {
                    setTimeout(() => {
                        alert('File lebih dari 1 MB.');
                    }, 300);
                    $("#file").val("");
                    return
                }
            }
        }
    </script>
@endsection