<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Usuario;

class UsuarioController extends BaseController
{
    protected $usuario;

    public function __construct()
    {
        $this->usuario = new Usuario();
    }

    public function index()
    {
        $usuarios = $this->usuario->findAll();
        return view('usuarios/index', ['usuarios' => $usuarios]);
    }

    public function usuarioForm()
    {
        return view('usuarios/usuarioForm');
    }

    public function insertUser()
    {
        try {
            $password = $this->request->getPost('password');
            $confirmPassword = $this->request->getPost('confirmPassword');

            if ($password !== $confirmPassword) {
                return redirect()->back()->withInput()->with('errors', [
                    'password' => 'As senhas não coincidem.'
                ]);
            }

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            $data = [
                'nome' => $this->request->getPost('nome'),
                'email' => $this->request->getPost('email'),
                'cpf' => $this->request->getPost('cpf'),
                'password' => $hashedPassword,
                'isAdmin' => false
            ];

            if (!$this->usuario->insert($data)) {
                return redirect()->back()->withInput()->with('errors', $this->usuario->errors());
            }

            return redirect()->to('/usuarios')->with('success', 'Usuário cadastrado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Erro ao cadastrar usuário: ' . $e->getMessage());
        }
    }

    public function editUserForm($id)
    {
        $usuario = $this->usuario->find($id);

        if (!$usuario) {
            return redirect()->to('/usuarios')->with('error', 'Usuário não encontrado.');
        }

        return view('usuarios/editUsuario', ['usuario' => $usuario]);
    }

    public function updateUser($id)
    {
        try {
            $usuario = $this->usuario->find($id);

            if (!$usuario) {
                return redirect()->to('/usuarios')->with('error', 'Usuário não encontrado.');
            }

            $data = [
                'nome' => $this->request->getPost('nome'),
                'email' => $this->request->getPost('email'),
                'cpf' => $this->request->getPost('cpf'),
            ];

            if (!$this->usuario->update($id, $data)) {
                return redirect()->back()->withInput()->with('errors', $this->usuario->errors());
            }

            return redirect()->to('/usuarios')->with('success', 'Usuário atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Erro ao atualizar usuário: ' . $e->getMessage());
        }
    }

    public function deleteUser($id)
    {
        try {
            $usuario = $this->usuario->find($id);

            if (!$usuario) {
                return redirect()->to('/usuarios')->with('error', 'Usuário não encontrado.');
            }

            if (!$this->usuario->delete($id)) {
                return redirect()->to('/usuarios')->with('error', 'Erro ao deletar o usuário.');
            }

            return redirect()->to('/usuarios')->with('success', 'Usuário deletado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->to('/usuarios')->with('error', 'Erro ao deletar usuário: ' . $e->getMessage());
        }
    }
}
