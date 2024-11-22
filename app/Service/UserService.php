<?php

namespace App\Service;

use App\Repositories\UserRepository;

class UserService
{
    protected $repository;
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store($request)
    {
        $data = $request->all();

        return $this->repository->store($data);
    }

    public function listar()
    {
        return $this->repository->listar();
    }

    public function find($id)
    {
        $user = $this->repository->find($id);

        if(!$user){
            return null;
        }

        return $user;
    }

}
