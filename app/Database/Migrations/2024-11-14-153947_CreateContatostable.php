<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateContatosTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nome' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'cpf' => [
                'type'       => 'VARCHAR',
                'constraint' => 14,
                'null'       => false,
            ],
            'telefone' => [
                'type'       => 'VARCHAR',
                'constraint' => 15,
                'null'       => false,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'corpo' => [
                'type'       => 'TEXT',
                'null'       => false,
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'deleted_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
        ]);

        $this->forge->addKey('id', true); 
        $this->forge->createTable('contatos'); 
    }

    public function down()
    {
        $this->forge->dropTable('contatos'); 
    }
}
