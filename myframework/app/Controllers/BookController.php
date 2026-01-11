<?php
require_once __DIR__ . '/../../core/Controller.php';

class BookController extends Controller
{
    /**
     * bookテーブルの操作一覧を表示
     */
    public function index() {
        $this->view('book/home');
    }
}
