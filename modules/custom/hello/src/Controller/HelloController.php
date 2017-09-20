<?php

  namespace Drupal\hello\Controller;

  use Drupal\Core\Controller\ControllerBase;

  class HelloController extends ControllerBase { 

     public function sayhello() { 
      
        return array(

           '#markup' => hello_world(),
        );
     }

     public function welcome(){
     	return array(
     		'#markup' => hello_welcome(),
     		);
     }

     public function show(){
      $connection = \Drupal\Core\Database\Database::getConnection();
        
        $sth = $connection->select('hello', 'h')
        ->fields('h', array('name', 'email'));
        
        $data = $sth->execute();
        
        $results = $data->fetchAll(\PDO::FETCH_OBJ);
        

         return array(
      '#type' => 'markup',
      '#markup' => $this->t($results),
    );
       // foreach ($results as $row) {
       //     echo "name: {$row->name}, email: {$row->email}";
     //}
  }
}