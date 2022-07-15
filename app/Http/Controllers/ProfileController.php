<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        $data = [
            'title' => 'Profile Pengguna',
            'data'  => auth()->user()
        ];

        return view('profile.show', $data);
    }

    public function edit()
    {
        $data = [
            'title' => 'Edit Profile Pengguna',
            'data'  => auth()->user()
        ];

        return view('profile.edit', $data);
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $user->name = $request->name;
        $user->save();

        return redirect()->route('profile.show')
                    ->with('info', 'Profil Berhasil diperbarui!');
    }

    public function changeProfile(Request $request)
    {
        # code...
    }
}
