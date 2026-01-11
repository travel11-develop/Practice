<?php

class Router
{
    private array $routes = [];

    /**
     * HTTPメソッド、パス、actionを内部に保存する
     *
     * @param string $path
     * @param string $action HomeController@index
     */
    public function get(string $path, string $action): void
    {
        $this->routes['GET'][$path] = $action;
    }

    /**
     * 
     */
    public function dispatch()
    {
        // ヘッダー情報からHTTPメソッド・URLのパスを取得
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // 存在するかチェック
        if (empty($this->routes[$method][$uri])) {
            // 404エラー
            http_response_code(404);
            echo '404 Not Found';
            return;
        }

        // コントローラーのclassとactionをそれぞれ取得
        [$controller, $methodName] = explode('@', $this->routes[$method][$uri]);
        require_once __DIR__ . '/../app/Controllers/' . $controller . '.php';

        $controllerInstance = new $controller();
        $controllerInstance->$methodName();
    }
}
