@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($message != null)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}</div>
        @endif
        <h3>Tambah {{ ucwords($view) }}</h3>
        <form class="data-table" method="POST">
            @csrf
            <div class="form-data">
                <div class="items">
                    <div class="label"> <span class="label">Nama</span> </div>
                    <div class="value"> <input class="form-control" type="text" name="name" required> </div>
                </div>
                <div class="items">
                    <div class="label"> <span class="label">Email</span> </div>
                    <div class="value"> <input class="form-control" type="email" name="email" required> </div>
                </div>
                <div class="items">
                    <div class="label"> <span class="label">Nomor HP</span> </div>
                    <div class="value"> <input class="form-control" type="text" name="phone"> </div>
                </div>
                <div class="items">
                    <div class="label"> <span class="label">Akses</span> </div>
                    <div class="value">
                        <select class="form-control" name="role" required>
                            <option>---</option>
                            <option value="superuser">Superuser</option>
                            <option value="customer">Customer</option>
                        </select>
                    </div>
                </div>
                <div class="items">
                    <div class="label"> <span class="label">Password</span> </div>
                    <div class="value"> <input class="form-control" type="password" name="password" required> </div>
                </div>
                <div class="items">
                    <div class="label"> <span class="label">Konfirmasi Password</span> </div>
                    <div class="value">
                        <input class="form-control" type="password" name="password_confirm" required>
                    </div>
                </div>
                <div class="items">
                    <div class="label"></div>
                    <div class="value">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i></button> &nbsp;
                        <a href="/{{$url}}" class="btn btn-light">
                            <i class="fa fa-arrow-left"></i>
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection