<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\TokenRepository;

/**
 * Class AuthController
 *
 * @package App\Http\Controllers
 * @author Vinícius Siqueira
 * @link https://github.com/ViniciusSCS
 * @date 2024-10-01 15:52:14
 * @copyright UniEVANGÉLICA
 */
class AuthController extends Controller
{
    protected $tokenRepository;

    public function __construct(TokenRepository $tokenRepository)
    {
        $this->tokenRepository = $tokenRepository;
    }

    public function login(Request $request)
    {
        //Receber a credencial (email e senha)
        $data = $request->all();

        //Verificar se credenciais estão no Banco
        if (Auth::attempt(['email' => strtolower($data['email']), 'password' => $data['password']])) {
            //Autentica o usuário
            $user = auth()->user();

            //cria um token
            $user->token = $user->createToken($user->email)->accessToken;
            return [
                'status' => 200,
                'message' => "Usuário logado com sucesso",
                "usuario" => $user
            ];
        } else {
            return [
                'status' => 404,
                'message' => "Usuário ou senha incorreto"
            ];
        }
    }

    public function logout(Request $request)
    {
        $tokenId = $request->user()->token()->id;

        $this->tokenRepository->revokeAccessToken($tokenId);

        return ['status' => true, 'message' => "Usuário deslogado com sucesso!"];
    }
}
