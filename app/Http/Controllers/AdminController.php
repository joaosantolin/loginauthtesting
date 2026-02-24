<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard() {
        // 1. Buscamos os usuários do banco
        $users = User::all();

        // 2. Passamos a variável 'users' para a view
        return view('admin.dashboard', compact('users'));
    }

    public function index()
    {
        // Usamos paginate para carregar apenas 10 por vez
        $users = User::orderBy('name', 'asc')->paginate(10);

        return view('users.index', compact('users'));
    }
}
