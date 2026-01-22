<?php

namespace App\Controllers;

class IndexController extends BaseController
{
    public function IndexAction()
    {
        $this->renderHTML(__DIR__ . '/../../view/inicio/index_view.php');
    }
}
