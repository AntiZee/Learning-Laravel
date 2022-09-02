<?php

namespace App\Http\Controllers;

use App\Services\AdminService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminController extends Controller
{
    private AdminService $adminService;
    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }
    public function login(): Response
    {
        return response()->view('user.login', [
            'title' => 'Login'
        ]);
    }
    public function doLogin(Request $request): RedirectResponse
    {
        $user = $request->input('user');
        $pass = $request->input('password');
        if (empty($user) || empty($pass)) {
            return response()->view('user.login', [
                'title' => 'Login',
                'error' => 'User or password is required'
            ]);
        }
        if ($this->adminService->login($user, $pass)) {
            $request->session()->put('user', $user);
            return redirect('/');
        }
        return response()->view('user.login', [
            'title' => 'Login',
            'error' => 'User or password is incorrect'
        ]);
    }
    public function doLogout()
    {
    }
}
