<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Contato;

class ContatoController extends BaseController
{
    protected $contato;

    public function __construct()
    {
        $this->contato = new Contato();
    }

    public function index()
    {
        $contatos = $this->contato->findAll();

        return view('contatos/index', ['contatos' => $contatos]);
    }

    public function showContact($id)
    {
           $contato = $this->contato->find($id);

           if(!$contato){
              return redirect()->back()->with('errors','Não foi encontrado um registro de contato');
           }

           return view('contatos/showContact',['contato' => $contato]);
    }

    public function contactForm()
    {
        return view('contatos/contatoForm');
    }

    public function insertContact()
    {
        try {
            $data = [
                'nome'     => $this->request->getPost('nome'),
                'cpf'      => $this->request->getPost('cpf'),
                'telefone' => $this->request->getPost('telefone'),
                'email'    => $this->request->getPost('email'),
                'corpo'    => $this->request->getPost('corpo'),
            ];

            if (!$this->contato->insert($data)) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('errors', $this->contato->errors());
            }

            return redirect()
                ->to('/contatos')
                ->with('success', 'Contato cadastrado com sucesso!');
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Ocorreu um erro ao tentar salvar o contato. Tente novamente mais tarde.');
        }
    }

    public function deleteContact($id)
    {
        try {
            
            $contato = $this->contato->find($id);

            if (!$contato) {
                return redirect()
                    ->back()
                    ->with('error', 'Contato não encontrado.');
            }

            if (!$this->contato->delete($id)) {
                return redirect()
                    ->back()
                    ->with('error', 'Erro ao tentar deletar o contato.');
            }

            return redirect()
                ->back()
                ->with('success', 'Contato deletado com sucesso!');

        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return redirect()
                ->back()
                ->with('error', 'Ocorreu um erro inesperado. Tente novamente mais tarde.');
        }
    }
}
