@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="apperfind-success">
            <h2>Proses Pengajuan Kontrak Anda</h2>
            <div class="progress-bar">
                <div class="progress-item">
                    <div class="progress-item-icon active">
                        <div class="icon">
                            <span class="fa fa-check"></span> <br>
                        </div>
                    </div>
                    <div class="label">Ajuan Dibuat</div>
                </div>
                <div class="progress-item-line active"></div>
                <div class="progress-item">
                    <div class="progress-item-icon active">
                        <div class="icon">
                            @if ($data->status == 'onreview' || $data->status == 'created')
                                <span class="fa-regular fa-clock"></span>
                            @else
                                <span class="fa fa-check"></span>
                            @endif
                        </div>
                    </div>
                    <div class="label">Proses Review</div>
                </div>
                @if ($data->status == 'approved')
                    <div class="progress-item-line active"></div>
                    <div class="progress-item">
                        <div class="progress-item-icon active">
                            <div class="icon">
                                <span class="fa fa-check"></span> <br>
                            </div>
                        </div>
                        <div class="label">Disetujui</div>
                    </div>
                @elseif($data->status == 'rejected')
                    <div class="progress-item-line reject"></div>
                    <div class="progress-item">
                        <div class="progress-item-icon reject">
                            <div class="icon">
                                <span class="fa-regular fa-rectangle-xmark"></span> <br>
                            </div>
                        </div>
                        <div class="label">Ditolak</div>
                    </div>
                @else
                    <div class="progress-item-line"></div>
                    <div class="progress-item">
                        <div class="progress-item-icon">
                            <div class="icon">
                                <span class="fa fa-check"></span> <br>
                            </div>
                        </div>
                        <div class="label">Disetujui</div>
                    </div>
                @endif
            </div>

            <div class="detail-contract">
                <div class="contract-item">
                    <span class="label">ID Kontrak</span>
                    <span class="value">{{ $data->generated_id }}</span>
                </div>
                <div class="contract-item">
                    <span class="label">Lama Kontrak</span>
                    <span class="value">{{ $data->plan_number }}  {{ $data->plan_type }}</span>
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
                    <span class="label">Nama Talent</span>
                    <span class="value">{{ $data->talent->name }}</span>
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
                    <span class="value" >Rp. {{ number_format($data->amount, 0, '.', '.') }}</span>
                </div>
                <div class="contract-item">
                    <span class="label">Tanggal Pengajuan</span>
                    <span class="value">{{ date_format($data->created_at, "d M y") }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
