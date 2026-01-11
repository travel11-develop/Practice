<?php
require_once __DIR__ . '/../../core/Controller.php';

class HomeController extends Controller
{
    public function index() {
         $this->view('home', [
            'message' => '自作フレームワークで表示できました！'
        ]);
    }
}
