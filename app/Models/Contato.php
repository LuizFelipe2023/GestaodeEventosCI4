<?php

namespace App\Models;

use CodeIgniter\Model;

class Contato extends Model
{
    protected $table            = 'contatos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;  
    protected $protectFields    = true;
    protected $allowedFields    = ['nome', 'cpf', 'telefone', 'email', 'corpo'];
    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

  
    protected array $casts = [
        
    ];

  
    protected $useTimestamps   = true; 
    protected $dateFormat      = 'datetime';  
    protected $createdField    = 'created_at';
    protected $updatedField    = 'updated_at';
    protected $deletedField    = 'deleted_at';

   
    protected $validationRules = [
        'nome'     => 'required|min_length[2]|max_length[255]',
        'cpf'      => 'required', 
        'telefone' => 'required|min_length[10]|max_length[15]',  
        'email'    => 'required|valid_email|max_length[255]',
        'corpo'    => 'required|min_length[4]|max_length[500]', 
    ];

   
    protected $validationMessages = [
        'nome' => [
            'required'   => 'O nome é obrigatório.',
            'min_length' => 'O nome deve ter pelo menos 2 caracteres.',
            'max_length' => 'O nome não pode ter mais de 255 caracteres.',
        ],
        'cpf' => [
            'required'        => 'O CPF é obrigatório.',
        ],
        'telefone' => [
            'required'        => 'O telefone é obrigatório.',
            'min_length'      => 'O telefone deve ter no mínimo 10 caracteres.',
            'max_length'      => 'O telefone não pode ter mais de 15 caracteres.',
        ],
        'email' => [
            'required'        => 'O e-mail é obrigatório.',
            'valid_email'     => 'Por favor, insira um e-mail válido.',
            'max_length'      => 'O e-mail não pode ter mais de 255 caracteres.',
        ],
        'corpo' => [
            'required'        => 'O corpo da mensagem é obrigatório.',
            'min_length'      => 'O corpo da mensagem deve ter pelo menos 4 caracteres.',
            'max_length'      => 'O corpo da mensagem não pode ter mais de 500 caracteres.',
        ],
    ];

    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
