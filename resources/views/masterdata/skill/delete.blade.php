@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($message != null)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}</div>
        @endif
        <h3>Delete {{ ucwords($view) }}</h3>
        <form class="data-table" method="POST">
            @csrf
            <div class="form-data">
                <h5>Yakin menghapus data ini?</h5>
                <span>Keahlian PRT : {{ @$items->skill }}</span>
            </div>
            <br>
            <div class="items">
                <div class="label"></div>
                    <div class="value">
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Yakin</button> &nbsp;
                        <a href="/{{$url}}" class="btn btn-light"><i class="fa fa-arrow-left"></i></a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
