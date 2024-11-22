<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Service\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserController
 *
 * @package App\Http\Controllers
 * @author Vinícius Siqueira
 * @link https://github.com/ViniciusSCS
 * @date 2024-08-23 21:48:54
 * @copyright UniEVANGÉLICA
 */
class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = $this->service->listar();

        return [
            'status' => 200,
            'menssagem' => 'Usuários encontrados!!',
            'user' => $user
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function me()
    {
        $user = Auth::user();

        return [
            'status' => 200,
            'message' => 'Usuário logado!',
            "usuario" => $user
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserCreateRequest $request)
    {
        $user = $this->service->store($request);

        return [
            'status' => 200,
            'menssagem' => 'Usuário cadastrado com sucesso!!',
            'user' => $user
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = $this->service->find($id);

        if($user == null){
            return [
                'status' => 404,
                'message' => 'Usuário não encontrado! Que triste!',
                'user' => $user
            ];
        }

        return [
            'status' => 200,
            'message' => 'Usuário encontrado com sucesso!!',
            'user' => $user
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, string $id)
    {
        $data = $request->all();

        $user = User::find($id);

        if(!$user){
            return [
                'status' => 404,
                'message' => 'Usuário não encontrado! Que triste!',
                'user' => $user
            ];
        }

        $user->update($data);

        return [
            'status' => 200,
            'message' => 'Usuário atualizado com sucesso!!',
            'user' => $user
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if(!$user){
            return [
                'status' => 404,
                'message' => 'Usuário não encontrado! Que triste!',
                'user' => $user
            ];
        }

        $user->delete($id);

        return [
            'status' => 200,
            'message' => 'Usuário deletado com sucesso!!'
        ];

    }
}
