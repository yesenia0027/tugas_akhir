<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/dashboard');
        }

        return view('auth/login');
    }

    public function login()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()
                ->with('error', 'Username dan password wajib diisi.');
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = (new UserModel())->where('username', $username)->first();

        if (! $user || ! password_verify($password, $user['password'])) {
            return redirect()->back()->withInput()
                ->with('error', 'Username atau password salah.');
        }

        session()->regenerate();
        session()->set([
            'logged_in' => true,
            'user_id'   => $user['id'],
            'nama'      => $user['nama'],
            'role'      => $user['role'],
        ]);

        return redirect()->to('/dashboard');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}