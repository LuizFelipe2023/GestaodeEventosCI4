<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SecaoController extends BaseController
{
    public function sobre()
    {
           return view('secoes/sobre');
    }
}
