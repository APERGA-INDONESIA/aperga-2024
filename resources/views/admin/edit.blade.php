@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($message != null)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}</div>
        @endif
        <h3>Update {{ ucwords($view) }}</h3>
        <form class="data-table" method="POST">
            @csrf
            <div class="form-data">
                <div class="items">
                    <div class="label"> <span class="label">Nama</span> </div>
                    <div class="value">
                        <input class="form-control" type="text" name="name" value="{{ $admins->name }}" required>
                    </div>
                </div>
                <div class="items">
                    <div class="label"> <span class="label">Email</span> </div>
                    <div class="value">
                        <input class="form-control" type="text" name="email" value="{{ $admins->email }}" required>
                    </div>
                </div>
                <div class="items">
                    <div class="label"> <span class="label">Nomor HP</span> </div>
                    <div class="value">
                        <input class="form-control" type="text" name="phone" value="{{ $admins->phone }}">
                    </div>
                </div>
                <div class="items">
                    <div class="label"> <span class="label">Akses</span> </div>
                    <div class="value">
                        <select class="form-control" name="role" required>
                            <option>---</option>
                            <option value="superuser" {{ $admins->role === 'superuser' ? 'selected' : '' }}>
                                Superuser
                            </option>
                            <option value="customer" {{ $admins->role === 'customer' ? 'selected' : '' }}>
                                Customer
                            </option>
                        </select>
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
