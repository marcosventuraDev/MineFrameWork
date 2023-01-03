<?php

namespace App;


use MF\Init\Bootstrap;
class Route extends Bootstrap {
 
    //Função para especificar valores de array's 
    protected function initRoutes()
    {

        $routes['home'] = array(
            'route' => '/',
            'controller'=> 'indexController',
            'action' => 'index'
        );

        $routes['sobre_nos']= array(
            'route' => '/sobreNos',
            'controller'=> 'indexController',
            'action' => 'sobreNos'
        );
        
    //Metodo setRoutes receberá os valors do array $routes da função initRoutes
        $this->setRoutes($routes);
    }

   

   

}