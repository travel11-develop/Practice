<?php

class Controller
{
    /**
     * viewファイルにアクセスする関数
     *
     * @param string
     * @param array|null
     */
    public function view(string $view, array $data = [])
    {
        // requireすると同じファイルスコープでファイルを読み込むため、extractの変数がviewで使える
        extract($data);
        require_once  __DIR__ . '/../app/Views/' . $view . '.php';
    }
}
