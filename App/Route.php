<?php

namespace App;

class Route {

    private $routes;

    //Metodo get para receber e retornar o valor de "routes"
    public function getRoutes()
    {
        return $this->routes;
    }

    //Metodo set para atribuir valor ao "routes"
    public function setRoutes(array $routes)
    {
        $this->routes = $routes;
    }

    public function __construct()
    {
        $this->initRoutes();
        $this->run($this->getUrl());

    }

    //Função para especificar valores de array's 
    public function initRoutes()
    {

        $routes['home'] = array(
            'route' => '/',
            'controller'=> 'indexController',
            'action' => 'index'
        );

        $routes['sobre_nos']= array(
            'route' => '/sobre_nos',
            'controller'=> 'indexController',
            'action' => 'sobreNos'
        );
        
    //Metodo setRoutes receberá os valors do array $routes da função initRoutes
        $this->setRoutes($routes);
    }

    public function run($url)
    {
       //pecorre todo o array 
        foreach($this->getRoutes() as $key => $route){

        //verifica se a url é igual à varialvel route do indice route
            if($url == $route['route'])
            {
                $class = "App\\Controllers\\". ucfirst($route['controller']);

                $controller = new $class;
                $action = $route['action'];

                $controller->$action();

            }
        }

    }

    //função para recuperar a URL 
    public function getUrl()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ;
    }

}