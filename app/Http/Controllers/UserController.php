<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class UserController
 *
 * @package App\Http\Controllers
 * @author Vinícius Sarmento
 * @link https://github.com/ViniciusSCS
 * @date 2024-08-23 21:48:54
 * @copyright UniEVANGÉLICA
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::select('id', 'name', 'email')->paginate('2');

        return [
            'status' => 200,
            'menssagem' => 'Usuários encontrados!!',
            'user' => $user
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserCreateRequest $request)
    {
        $data = $request->all();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
       public function edit($id)
    {
        $user = User::findOrFail($id); // Obtém o usuário pelo ID ou falha se não encontrar
        return view('users.edit', compact('user')); // Retorna a view de edição com os dados do usuário
    }

    /**
     * Update the specified user in storage.
     */
    public function update(UserEditRequest $request, $id)
    {
        $user = User::findOrFail($id); // Obtém o usuário pelo ID ou falha se não encontrar
        
        // Atualiza os dados do usuário com base na requisição validada
        $user->update($request->validated());

        return redirect()->route('users.index') // Redireciona para a lista de usuários ou para onde preferir
            ->with('success', 'Usuário atualizado com sucesso!');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserDeleteRequest $request, $id)
    {
        $user = User::findOrFail($id); // Obtém o usuário pelo ID ou retorna um erro 404 se não encontrado
        $user->delete(); // Deleta o usuário do banco de dados

        return redirect()->route('users.index') // Redireciona para a lista de usuários ou para onde preferir
            ->with('success', 'Usuário deletado com sucesso!');
    }
}
