<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registrasi;
use App\Http\Requests\RegistrasiRequest;

class RegistrasiControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        // $datas = Registrasi::all();
        $datas = Registrasi::where('nama', 'LIKE', '%'.$keyword.'%')
        ->orWhere('kelamin', 'LIKE', '%'.$keyword.'%')
        ->orWhere('hobi', 'LIKE', '%'.$keyword.'%')
        ->orWhere('email', 'LIKE', '%'.$keyword.'%')
        ->orWhere('hobi', 'LIKE', '%'.$keyword.'%')
        ->orWhere('tlp', 'LIKE', '%'.$keyword.'%')
        ->orWhere('username', 'LIKE', '%'.$keyword.'%')
        ->orWhere('password', 'LIKE', '%'.$keyword.'%')
        ->paginate();
        $datas->withPath('registrasi');
        $datas->appends($request->all());
        return view('registrasi.index', compact(
            'datas', 'keyword'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Registrasi;
        return view('registrasi.create', compact(
            'model'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegistrasiRequest $request)
    {
        $request->validate([
            'nama' => 'required|max:5',
            'username' => 'required|max:5',
            'password' => 'required|min:7',
            'email' => 'required|email|min:6|max:200|unique:users',
            'tlp' => 'required|numeric|digits_between:6,15'
        ]);

        $model = new Registrasi;
        $model->nama = $request->nama;
        $model->kelamin = $request->kelamin;
        $model->hobi = $request->hobi;
        $model->email = $request->email;
        $model->tlp = $request->tlp;
        $model->username = $request->username;
        $model->password = $request->password;
        $model->save();

        return redirect('registrasi')->with('success', "Data berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Registrasi::find($id);
        $model->delete();
        return redirect('registrasi');
    }
}
