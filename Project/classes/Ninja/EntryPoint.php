<?php

namespace Ninja;

class EntryPoint
{

    private $route;
    private $method;
    private $routes;

    public function __construct(string $route, string $method, \Ninja\Routes $routes)
    {
        $this->route = $route;
        $this->routes = $routes;
        $this->method = $method;
        $this->checkUrl();
    }


    private function checkUrl()
    {
        if ($this->route != strtolower($this->route)) {
            http_response_code(301);
            header('location: ' . strtolower($this->route));
        }
    }


    private function loadTemplate($templateFileName, $variables = [])
    {
        // in questo modo le variabile che crea extract hanno visibilità locale e non interferiscono con $page 
        // e $title nel caso che vengano create variabili con lo stesso nome
        extract($variables);

        ob_start();

        include __DIR__ . '/../../templates/' . $templateFileName;

        return ob_get_clean();
    }


    public function run()
    {

        $routes = $this->routes->getRoutes();
        $authentication = $this->routes->getAuthentication();


        $controller = $routes[$this->route][$this->method]['controller'];
        $action = $routes[$this->route][$this->method]['action'];

        if (isset($routes[$this->route]['login']) && !$authentication->isLoggedIn()) {
            header('location: /login/error');
        } else {

            $page = $controller->$action();

            $title = $page['title'];

            if (isset($page['variables'])) {
                $output = $this->loadTemplate($page['template'], $page['variables']);
            } else {
                $output = $this->loadTemplate($page['template']);
            }
            echo $this->loadTemplate('layout/layout.html.php', [
                'loggedIn' => $authentication->isLoggedIn(),
                'output' => $output,
                'title' => $title
            ]);
        }
    }
}