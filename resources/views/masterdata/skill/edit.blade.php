@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($message != null)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}</div>
        @endif
        <h3>Edit Kategori Produk</h3>
        <form class="data-table" method="POST">
            @csrf
            <div class="form-data">
                <div class="items">
                    <div class="label"> <span class="label">Keahlian PRT</span> </div>
                    <div class="value">
                        <input class="form-control" type="text" name="skill" value="{{ $items->skill }}" required>
                    </div>
                </div>
                <div class="items">
                    <div class="label"></div>
                    <div class="value">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button> &nbsp;
                        <a href="/{{$url}}" class="btn btn-light"><i class="fa fa-arrow-left"></i></a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
