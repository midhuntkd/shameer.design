<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminUserModel;

class AuthController extends BaseController
{
    public function loginForm()
    {
        if (session()->get('admin_id')) {
            return redirect()->to('admin');
        }

        return view('admin/auth/login');
    }

    public function attemptLogin()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Please provide username and password.');
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $model = new AdminUserModel();
        $user  = $model->where('username', $username)->first();

        if (!$user || !password_verify($password, $user['password_hash'])) {
            return redirect()->back()->withInput()->with('error', 'Invalid credentials.');
        }

        session()->set([
            'admin_id'       => $user['id'],
            'admin_username' => $user['username'],
        ]);

        return redirect()->to('admin');
    }

    public function logout()
    {
        session()->remove(['admin_id', 'admin_username']);
        return redirect()->to('admin/login');
    }
}
