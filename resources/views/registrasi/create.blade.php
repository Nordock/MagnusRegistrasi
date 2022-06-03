@extends('layouts.index')

@section('content')
</br>
    <form id="selectform" method="POST" action="{{ url('registrasi') }}">
        @csrf

        <div class="row clearfix">
            <div class="col-md-6"> Nama :</div>

            <div class="col-md-6">
                <input class="form-control" type="text" name="nama" value="{{ old('nama') }}">
                @foreach($errors->get('nama') as $msg)
                    <p class="text-danger">{{ $msg }}</p>
                @endforeach
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-md-6">Jenis Kelamin :</div>

            <div class="col-md-6">
                 <input class="form-control" type="text" name="kelamin" value="{{ old('kelamin') }}">
                 @foreach($errors->get('kelamin') as $msg)
                    <p class="text-danger">{{ $msg }}</p>
                @endforeach
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-md-6">Hobi :</div>

            <div class="col-md-6">
                 <input class="form-control" type="text" name="hobi" value="{{ old('hobi') }}">
                 @foreach($errors->get('hobi') as $msg)
                    <p class="text-danger">{{ $msg }}</p>
                @endforeach
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-md-6">Email :</div>

            <div class="col-md-6">
                 <input class="form-control" type="text" name="email" value="{{ old('email') }}">
                 @foreach($errors->get('email') as $msg)
                    <p class="text-danger">{{ $msg }}</p>
                @endforeach
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-md-6">Telp :</div>

            <div class="col-md-6">
                 <input class="form-control" type="text" name="tlp" value="{{ old('tlp') }}">
                 @foreach($errors->get('tlp') as $msg)
                    <p class="text-danger">{{ $msg }}</p>
                @endforeach
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-md-6">Username :</div>

            <div class="col-md-6">
                 <input class="form-control" type="text" name="username" value="{{ old('username') }}">
                 @foreach($errors->get('username') as $msg)
                    <p class="text-danger">{{ $msg }}</p>
                @endforeach
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-md-6">Password :</div>

            <div class="col-md-6">
                 <input class="form-control" type="text" name="password" value="{{ old('password') }}">
                 @foreach($errors->get('password') as $msg)
                    <p class="text-danger">{{ $msg }}</p>
                @endforeach
            </div>
        </div>
        <br/>
        <button  class="btn btn-danger" onclick="document.getElementById('selectform').reset(); document.getElementById('from').value = null; return false;">
            Reset
        </button>
        <button type="submit" class="btn btn-primary">Daftar</button>

    </form>


@endsection
