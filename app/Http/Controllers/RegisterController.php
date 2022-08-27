<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $checkEmail = User::where('email', $request->email)->get();

        if (count($checkEmail) > 0) {
            return redirect('/')->with('error', 'Email telah terdaftar');
        }
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->nama_lengkap = $request->nama_lengkap;
        $user->alamat = $request->alamat;
        $user->no_telepon = $request->no_telepon;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->tamatan_pendidikan = $request->tamatan_pendidikan;
        $user->keahlian = $request->keahlian;
        if (!$request->file('foto')) {
            if ($request->jenis_kelamin == 'perempuan') {
                $user->foto = 'user/cewek.jpeg';
            } elseif ($request->jenis_kelamin == 'laki-laki') {
                $user->foto = 'user/cowok.jpeg';
            }
        } else {
            $user->foto = $request->file('foto')->store('user', 'public');
        }

        $user->save();
        return redirect('/')->with('success', 'Selamat akun anda telah terdaftar');
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
        // $checkEmail = User::where("email", $request->email)->get();

        // if(count($checkEmail) > 0){
        //     return redirect('/')->with('error', "Email telah terdaftar");
        // };
        $user = User::where('id', $id)->update([
            'username' => $request->username,
            'email' => $request->email,
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'tamatan_pendidikan' => $request->tamatan_pendidikan,
            'keahlian' => $request->keahlian,
        ]);
        // dd($request->foto_old);
        if (!$request->file('foto')) {
            // if ($request->foto_old != 'user/cewek.jpeg' || $request->foto_old != 'user/cowok.jpeg') {
            //     User::where('id', $id)->update([
            //         'foto' => $request->foto_old,
            //     ]);
            // } else {
                if ($request->jenis_kelamin == 'laki-laki') {
                    if ($request->foto_old == 'user/cewek.jpeg') {
                        User::where('id', $id)->update([
                            'foto' => 'user/cowok.jpeg',
                        ]);
                    } else {
                        User::where('id', $id)->update([
                            'foto' => $request->foto_old,
                        ]);
                    }
                } elseif ($request->jenis_kelamin == 'perempuan') {
                    if ($request->foto_old == 'user/cowok.jpeg') {
                        User::where('id', $id)->update([
                            'foto' => 'user/cewek.jpeg',
                        ]);
                    } else {
                        User::where('id', $id)->update([
                            'foto' => $request->foto_old,
                        ]);
                    }
                }
            // }
        } else {
            if ($request->foto_old == 'user/cowok.jpeg') {
                // Storage::delete('public/user/cowok.jpeg');
            } elseif ($request->foto_old == 'user/cewek.jpeg') {
                // Storage::delete('public/user/cewek.jpeg');
            } else {
                Storage::delete('public/' . $request->foto_old);
            }
            User::where('id', $id)->update([
                'foto' => $request->file('foto')->store('user', 'public'),
            ]);
        }
        // $user->update($data);
        return redirect('/user/profile')->with('success', 'data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}