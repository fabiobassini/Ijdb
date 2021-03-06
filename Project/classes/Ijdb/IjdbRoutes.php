<?php

namespace Ijdb;

class IjdbRoutes implements \Ninja\Routes
{

    private $authorsTable;
    private $jokesTable;
    private $authentication;

    public function __construct()
    {
        include __DIR__ . '/../../includes/DatabaseConnection.php';
        $this->jokesTable = new \Ninja\DatabaseTable($pdo, 'joke', 'id');
        $this->authorsTable = new \Ninja\DatabaseTable($pdo, 'author', 'id');
        $this->authentication = new \Ninja\Authentication($this->authorsTable, 'email', 'password');
    }

    public function getRoutes(): array
    {

        $JokeController = new \Ijdb\Controllers\Joke($this->jokesTable, $this->authorsTable);
        $authorController = new \Ijdb\Controllers\Register($this->authorsTable);
        $loginController = new \Ijdb\Controllers\Login($this->authentication);

        // approccio REST
        $routes = [
            'author/register' => [
                'GET' => [
                    'controller' => $authorController,
                    'action' => 'registrationForm'
                ],
                'POST' => [
                    'controller' => $authorController,
                    'action' => 'registerUser'
                ]
            ],
            'author/success' => [
                'GET' => [
                    'controller' => $authorController,
                    'action' => 'success'
                ]
            ],
            'joke/edit' => [
                'POST' => [
                    'controller' => $JokeController,
                    'action' => 'saveEdit'
                ],
                'GET' => [
                    'controller' => $JokeController,
                    'action' => 'edit'
                ],
                'login' => true
            ],
            'joke/delete' => [
                'POST' => [
                    'controller' => $JokeController,
                    'action' => 'delete'
                ],
                'login' => true
            ],
            'joke/list' => [
                'GET' => [
                    'controller' => $JokeController,
                    'action' => 'list'
                ]
            ],
            'login' => [
                'GET' => [
                    'controller' => $loginController,
                    'action' => 'loginForm'
                ],
                'POST' => [
                    'controller' => $loginController,
                    'action' => 'processLogin'
                ]
            ],
            'login/error' => [
                'GET' => [
                    'controller' => $loginController,
                    'action' => 'error'
                ]
            ],
            'login/success' => [
                'GET' => [
                    'controller' => $loginController,
                    'action' => 'success'
                ],
                'login' => true
            ],
            'logout' => [
                'GET' => [
                    'controller' => $loginController,
                    'action' => 'logout'
                ]
            ],
            '' => [
                'GET' => [
                    'controller' => $JokeController,
                    'action' => 'home'
                ]
            ]
        ];
        return $routes;
    }

    public function getAuthentication(): \Ninja\Authentication
    {
        return $this->authentication;
    }
}
