@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Data Kontrak</h3>
        <div class="row">
            <div class="col-md-6">
                <span>Menampilkan {{ $show }} data dari {{ $total }}</span>
            </div>
        </div>
        <div class="data-table">
            <table class="table table-hover table-striped" aria-describedby="datatable">
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Jenis Pekerjaan</th>
                    <th>Durasi Kontrak</th>
                    <th>Asal Kota</th>
                    <th>Status</th>
                    <th>Total Pembayaran</th>
                    <th>Aksi</th>
                </tr>
                @php
                    $i = (($page-1) * 10) + 1;
                @endphp
                @foreach ($items as $d)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $d->name }}</td>
                        <td>{{ $d->talent->type->type }}</td>
                        <td>{{ $d->plan_number }} {{ $d->plan_type }}</td>
                        <td>{{ $d->address }}</td>
                        <td>
                            <span class="contract-status {{ $d->status == "rejected" ? 'reject' : '' }} ">{{ $d->status }}</span>
                        </td>
                        <td>Rp. {{ number_format(@$d->amount, 0, '.', '.') }}</td>
                        <td>
                            <a class="btn btn-warning" href="/apperlog/progress/{{ $d->id }}" title="Check Status">
                                <i class="fa fa-clock"></i>
                            </a>
                            @if (Auth::user()->role == "superuser")
                            <a class="btn btn-primary" href="/{{ $url }}/view/{{ $d->id }}" title="Approve">
                                <i class="fa fa-check"></i>
                            </a>
                            @endif
                            @if($d->document)
                            <a class="btn btn-info" href="/{{ $url }}/sign/{{ $d->id }}" title="Contract">
                                <i class="fa fa-book"></i>
                            </a>
                            @endif
                        </td>
                    </tr>
                @php
                    $i++;
                @endphp
                @endforeach
            </table>
            <nav aria-label="..." style="float: right">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="?page={{$prev}}" tabindex="-1"> < </a>
                    </li>
            
                    @php
                        $visiblePages = 10; // Set the number of visible pages
                        $startPage = max(1, $page - floor($visiblePages / 2));
                        $endPage = min($total_page, $startPage + $visiblePages - 1);
                    @endphp
            
                    @for ($i = $startPage; $i <= $endPage; $i++)
                        <li class="page-item {{ $page == $i ? 'active' : '' }}">
                            <a class="page-link" href="?page={{$i}}">{{ $i }}</a>
                        </li>
                    @endfor
            
                    <li class="page-item">
                        <a class="page-link" href="?page={{$next}}"> > </a>
                    </li>
                </ul>
            </nav>
            
        </div>
    </div>
@endsection
