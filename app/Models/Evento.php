<?php

namespace App\Models;

use CodeIgniter\Model;

class Evento extends Model
{
    protected $table            = 'eventos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nome', 'tipo', 'endereco', 'data', 'capacidade_total', 'gratuito', 'imagem'];
    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [
        'capacidade_total' => 'integer',
        'gratuito'         => 'boolean',
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules = [
        'nome'            => 'required|min_length[4]',
        'tipo'            => 'required',
        'endereco'        => 'required|min_length[4]',
        'data'            => 'required|valid_date',
        'capacidade_total'=> 'required|integer|greater_than[0]',
        'gratuito'        => 'required|in_list[0,1]',
        'imagem'          => 'permit_empty',
    ];

    protected $validationMessages = [
        'nome' => [
            'required'   => 'O campo "nome" é obrigatório.',
            'min_length' => 'O campo "nome" deve ter pelo menos 4 caracteres.'
        ],
        'tipo' => [
            'required' => 'O campo "tipo" é obrigatório.'
        ],
        'endereco' => [
            'required'   => 'O campo "endereço" é obrigatório.',
            'min_length' => 'O campo "endereço" deve ter pelo menos 4 caracteres.'
        ],
        'data' => [
            'required'   => 'O campo "data" é obrigatório.',
            'valid_date' => 'O campo "data" deve conter uma data válida.'
        ],
        'capacidade_total' => [
            'required'      => 'O campo "capacidade total" é obrigatório.',
            'integer'       => 'O campo "capacidade total" deve ser um número inteiro.',
            'greater_than'  => 'O campo "capacidade total" deve ser maior que zero.'
        ],
        'gratuito' => [
            'required' => 'O campo "gratuito" é obrigatório.',
            'in_list'  => 'O campo "gratuito" deve ser 0 (não) ou 1 (sim).'
        ],
        'imagem' => [
            'uploaded' => 'Você deve fazer o upload de um arquivo válido se optar por enviar uma imagem.',
            'mime_in'  => 'O arquivo deve ser do tipo JPG, JPEG ou PNG.',
            'max_size' => 'O arquivo de imagem não pode ultrapassar 2MB.',
        ],
    ];

    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
    protected $allowCallbacks = false;
    protected $beforeInsert   = [];
    protected $beforeUpdate   = [];
}
