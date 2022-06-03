@extends('layouts.index')

@section('content')
</br>

    @if(Session::has('success'))
        <p class="alert alert-success">{{ Session::get('success') }}</p><br/>
    @endif

    <a class="btn btn-info" href="{{ url('registrasi/create') }}">Tambah</a>
</br></br>
    <form method="GET" action="{{ url('registrasi') }}">
        <input type="text" name="keyword" value="{{ $keyword }}" />
        <button type="submit">Search</button>
    </form>
</br>
    <table class="table-bordered table">
        <tr>
            <th>nama</th>
            <th>Jenis Kelamin</th>
            <th>Hobi</th>
            <th>Email</th>
            <th>Telp</th>
            <th>Username</th>
            <th>Password</th>
            <th>Aksi</th>
        </tr>
        @foreach($datas as $key=>$value)
            <tr>
                <td>{{ $value->nama }}</td>
                <td>{{ $value->kelamin }}</td>
                <td>{{ $value->hobi }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->tlp }}</td>
                <td>{{ $value->username }}</td>
                <td>{{ $value->password }}</td>
                <td>
                    <form action="{{ url('registrasi/'.$value->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="Delete">
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>

                </td>
            </tr>
        @endforeach
    </table>
    {{ $datas->links() }}
@endsection
