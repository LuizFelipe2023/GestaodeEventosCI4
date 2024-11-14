<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Evento;

class EventoController extends BaseController
{
    protected $evento;

    public function __construct()
    {
        $this->evento = new Evento();
    }

    public function index()
    {
        try {
            $eventos = $this->evento->findAll();
            log_message('debug', 'Eventos encontrados: ' . count($eventos)); 
            return view('eventos/index', ['eventos' => $eventos]); 
        } catch (\Exception $e) {
            log_message('error', 'Erro ao carregar eventos: ' . $e->getMessage()); 
            return redirect()->to('/eventos')->with('errors', 'Erro ao carregar eventos.');
        }
    }

    public function showEvent($id)
    {
        try {
            $evento = $this->evento->find($id);
            if (!$evento) {
                log_message('warning', 'Evento não encontrado: ' . $id); 
                return redirect()->back()->with('errors', 'Não foi encontrado um evento no sistema.');
            }
            log_message('debug', 'Exibindo evento com ID: ' . $id); 
            return view('eventos/showEvent', ['evento' => $evento]); 
        } catch (\Exception $e) {
            log_message('error', 'Erro ao recuperar evento com ID ' . $id . ': ' . $e->getMessage());
            return redirect()->back()->with('errors', 'Houve um erro ao recuperar o evento solicitado.');
        }
    }

    
    public function createForm()
    {
        return view('eventos/createForm'); 
    }

   
    public function insertEvent()
    {
        try {
            $imagem = $this->request->getFile('imagem');
            $imagePath = null;
            $uploadPath = ROOTPATH . 'public/assets/'; 

            if ($imagem && $imagem->isValid()) {
                $nomeImagem = $imagem->getClientName();
                if ($imagem->move($uploadPath, $nomeImagem)) {
                    $imagePath = 'assets/' . $nomeImagem;
                    log_message('info', 'Imagem carregada: ' . $nomeImagem); 
                } else {
                    log_message('error', 'Erro ao carregar imagem: ' . $imagem->getErrorString());
                }
            }

            $data = [
                'nome' => $this->request->getPost('nome'),
                'tipo' => $this->request->getPost('tipo'),
                'endereco' => $this->request->getPost('endereco'),
                'data' => $this->request->getPost('data'),
                'capacidade_total' => $this->request->getPost('capacidade_total'),
                'gratuito' => $this->request->getPost('gratuito'),
                'imagem' => $imagePath
            ];

            if (!$this->evento->insert($data)) {
                log_message('error', 'Erro ao inserir evento: ' . json_encode($data)); 
                return redirect()->back()->withInput()->with('errors', $this->evento->errors());
            }

            log_message('info', 'Evento registrado com sucesso: ' . $data['nome']); 
            return redirect()->to('/eventos')->with('success', 'Evento foi registrado com sucesso');
        } catch (\Exception $e) {
            log_message('error', 'Erro ao registrar evento: ' . $e->getMessage()); 
            return redirect()->back()->with('errors', 'Houve um erro inesperado ao registrar um novo evento.');
        }
    }

    public function editForm($id)
    {
        try {
            $evento = $this->evento->find($id);
            if (!$evento) {
                log_message('warning', 'Evento não encontrado para editar: ' . $id);
                return redirect()->to('/eventos')->with('errors', 'Evento não encontrado.');
            }

            return view('eventos/editForm', ['evento' => $evento]); 
        } catch (\Exception $e) {
            log_message('error', 'Erro ao carregar evento para edição com ID ' . $id . ': ' . $e->getMessage());
            return redirect()->to('/eventos')->with('errors', 'Houve um erro ao carregar o evento para edição.');
        }
    }

    public function updateEvent($id)
    {
        try {
            $evento = $this->evento->find($id);

            if (!$evento) {
                log_message('warning', 'Evento não encontrado para atualizar: ' . $id); 
                return redirect()->to('/eventos')->with('errors', 'Evento não encontrado.');
            }

            $imagem = $this->request->getFile('imagem');
            $imagePath = $evento->imagem; 
    
            if ($imagem && $imagem->isValid()) {
                $uploadPath = ROOTPATH . 'public/assets/';
                $nomeImagem = $imagem->getClientName();
                if ($imagem->move($uploadPath, $nomeImagem)) {
                    $imagePath = 'assets/' . $nomeImagem;
                    log_message('info', 'Imagem atualizada: ' . $nomeImagem); 
                } else {
                    log_message('error', 'Erro ao carregar imagem: ' . $imagem->getErrorString());
                }
            }

            $data = [
                'nome' => $this->request->getPost('nome'),
                'tipo' => $this->request->getPost('tipo'),
                'endereco' => $this->request->getPost('endereco'),
                'data' => $this->request->getPost('data'),
                'capacidade_total' => $this->request->getPost('capacidade_total'),
                'gratuito' => $this->request->getPost('gratuito'),
                'imagem' => $imagePath,
            ];

            if (!$this->evento->update($id, $data)) {
                log_message('error', 'Erro ao atualizar evento com ID ' . $id . ': ' . json_encode($data)); 
                return redirect()->back()->withInput()->with('errors', $this->evento->errors());
            }

            log_message('info', 'Evento atualizado com sucesso: ' . $data['nome']); 
            return redirect()->to('/eventos')->with('success', 'Evento atualizado com sucesso.');
        } catch (\Exception $e) {
            log_message('error', 'Erro ao atualizar evento com ID ' . $id . ': ' . $e->getMessage()); 
            return redirect()->back()->with('errors', 'Houve um erro inesperado ao atualizar o evento.');
        }
    }

    public function deleteEvent($id)
    {
        try {
            $evento = $this->evento->find($id);

            if (!$evento) {
                log_message('warning', 'Evento não encontrado para exclusão: ' . $id); 
                return redirect()->back()->with('errors', 'Evento não encontrado.');
            }

            if (!$this->evento->delete($id)) {
                log_message('error', 'Erro ao excluir evento com ID ' . $id); 
                return redirect()->back()->with('errors', 'Houve um erro ao excluir o evento.');
            }

            if ($evento->imagem && file_exists(WRITEPATH . $evento->imagem)) {
                unlink(WRITEPATH . $evento['imagem']);
                log_message('info', 'Imagem excluída: ' . $evento['imagem']); 
            }

            log_message('info', 'Evento excluído com sucesso: ' . $id); 
            return redirect()->to('/eventos')->with('success', 'Evento excluído com sucesso.');
        } catch (\Exception $e) {
            log_message('error', 'Erro ao excluir evento com ID ' . $id . ': ' . $e->getMessage()); 
            return redirect()->to('/eventos')->with('errors', 'Houve um erro inesperado ao excluir o evento.');
        }
    }
}
