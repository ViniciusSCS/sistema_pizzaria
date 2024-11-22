<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function store($data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function listar()
    {
        return User::select('id', 'name', 'email', 'created_at')
            ->paginate('10');
    }

    public function find($id)
    {
        return User::find($id);
    }
}
