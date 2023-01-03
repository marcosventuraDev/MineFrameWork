<?php

namespace MF\Init;

abstract class Bootstrap{
        private $routes;
        
        abstract protected function initRoutes();

        public function __construct()
            {
                $this->initRoutes();
                $this->run($this->getUrl());
            }

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
   
       protected function run($url)
        {
            //pecorre todo o array 
            foreach($this->getRoutes() as $key => $route){
    
            //verifica se a url é igual à varialvel route do indice route
            if($url == $route['route'])
            {
                $class = "App\\Controllers\\".ucfirst($route['controller']);
    
                $controller = new $class;
                $action = $route['action'];
    
                $controller->$action();
    
            }
            }
    
        }   

    //função para recuperar a URL 
    protected function getUrl()
        {
            return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ;
        }

}