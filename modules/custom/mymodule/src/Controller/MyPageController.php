<?php

namespace Drupal\mymodule\Controller; //allow automatically load file from /modules/mymodule/src/Controller

use Drupal\Core\Controller\ControllerBase;

class MyPageController extends ControllerBase{

    public function customPage(){
        return [
            '#markup' => t('Welcome to my page'), //markup key denotes a value that does not have and additional rendering or theming processes
        ];
    }
    
    public function cats($name){
        return [
          '#markup' => t('My name is: @name', [
              '@name' => $name,
          ]),  
        ];
    }
}