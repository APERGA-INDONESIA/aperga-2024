@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Apperfind Dashboard</h3>
        <div class="row">
            <div class="col-md-6">
                <span>Menampilkan {{ $show }} data dari {{ $total }}</span>
            </div>
            @if (Auth::user()->role == 'superuser')
                <div class="col-md-6">
                    <a href="/{{ $url }}/create" class="btn btn-primary float-r">
                        <i class="fa fa-plus-circle"></i> &nbsp; Tambah Tenaga Ahli
                    </a>
                </div>
            @endif
        </div>
        <div class="data-table">
            <div class="apperfind-view">
                <div class="box">
                    <div class="title">
                        <div class="product-title">
                            <form method="GET" class="product-title">
                            <input class="form-control" type="text" placeholder="Cari . . ." name="search" value="{{@$search}}">
                            &nbsp;&nbsp;
                            <select class="form-control" name="type_id">
                                <option value="0">-- Tipe --</option>
                                @foreach ($type as $t)
                                    <option value="{{ $t->id }}" @selected($t->id == $type_id)>{{ $t->type }}</option>
                                @endforeach
                            </select>
                            &nbsp;&nbsp;
                            <select class="form-control" name="location_id">
                                <option value="0">-- Lokasi --</option>
                                @foreach ($locations as $l)
                                    <option value="{{ $l->id }}" @selected($l->id == $location_id)>{{ $l->name }}</option>
                                @endforeach
                            </select>
                            &nbsp;&nbsp;
                            <select class="form-control" name="age">
                                <option value="0">-- Umur --</option>
                                @foreach ($ages as $k => $v)
                                    <option value="{{ $k }}" @selected($k == @$age)>{{ $v }}</option>
                                @endforeach
                            </select>
                            &nbsp;&nbsp;
                            <button class="btn btn-primary">
                                <i class="fa fa-search"></i>
                            </button>
                            </form>
                        </div>
                    </div>
                    <div class="pos-container">
                        <div class="product-list">
                            @foreach ($items as $item)
                                <div class="product">
                                    <div class="img-container">
                                        <img src="{{ $item->image1 ?? "/img/logo-w.png" }}">
                                    </div>
                                    <div class="details">
                                        <div class="name">{{ $item->name }}</div>
                                        <div class="attr"><i class="fa-regular fa-user"></i> &nbsp;&nbsp;&nbsp; {{ @$item->type->type }}</div>
                                        <div class="attr"><i class="fa-regular fa-map"></i> &nbsp; {{ @$item->location_->name }}</div>
                                        <div class="attr"><i class="fa-regular fa-star"></i> &nbsp;&nbsp; {{ @$item->rating }} </div>
                                        @if(Auth::user()->role == "superuser")
                                        <div style="display: flex; flex-direction: row; width : 90%">
                                            <a class="btn btn-primary btn-sm button-detail superuser" href="/apperfind/edit/{{ $item->id }}">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a class="btn btn-sm button-detail superuser danger" href="/apperfind/delete/{{ $item->id }}">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <a class="btn btn-primary btn-sm button-detail superuser" href="/apperfind/detail/{{ $item->id }}">
                                                <i class="fa fa-arrow-right"></i>
                                            </a>
                                        </div>
                                        @else
                                        <a class="btn btn-primary btn-sm button-detail" href="/apperfind/detail/{{ $item->id }}">
                                            Selengkapnya
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                            <!-- Add more products as needed -->
                        </div>
                    </div>
                </div>
            </div>
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
