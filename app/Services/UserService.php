<?php
namespace App\Services;

use App\Models\User;

class UserService
{
    public function getAllUsers()
    {
        return User::all();
    }

    public function getUserById($id)
    {
        return User::find($id);
    }

    public function destroy($id)
    {
        User::destroy($id);
        return User::all();
    }

    public function store(array $data)
    {
        User::store($data);
        return User::all();
    }
}
