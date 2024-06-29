@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Data Pengguna</h3>
        <div class="row">
            <div class="col-md-6">
                <span>Menampilkan {{ $show }} data dari {{ $total }}</span>
            </div>
            <div class="col-md-6">
                <a href="/{{ $url }}/create" class="btn btn-primary float-r">
                    <i class="fa fa-plus-circle"></i> &nbsp; Tambah Pengguna
                </a>
            </div>
        </div>
        <div class="data-table">
            <table class="table table-hover table-striped" aria-describedby="datatable">
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor HP</th>
                    <th>Akses</th>
                    <th>Aksi</th>
                </tr>
                @php
                    $i = (($page-1) * 10) + 1;
                @endphp
                @foreach ($admins as $admin)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->phone }}</td>
                        <td>{{ $admin->role }}</td>
                        <td>
                            <a class="btn btn-info" href="/{{ $url }}/edit/{{$admin->id}}">
                                <i class="fa fa-pencil"></i>
                            </a>
                            @if($admin->role !== 'superuser')
                            <a class="btn btn-danger" href="/{{ $url }}/delete/{{$admin->id}}">
                                <i class="fa fa-trash"></i>
                            </a>
                            @endif
                            <a class="btn btn-warning" href="/{{ $url }}/pass/{{$admin->id}}">
                                <i class="fa fa-key"></i>
                            </a>
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
