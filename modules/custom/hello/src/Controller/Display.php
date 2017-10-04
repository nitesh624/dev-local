<?php
/**
 * @file
 * Contains \Drupal\hello\Controller\Display.
 */

namespace Drupal\hello\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Link;
use Drupal\Core\Url;

/**
 * Class Display.
 *
 * @package Drupal\hello\Controller
 */
class Display extends ControllerBase {

/**
   * showdata.
   *
   * @return string
   *   Return Table format data.
  */	

public function showdata(){

	$result = \Drupal::database()->select('hello','h')
	->fields('h',array('id','name','email'))
	->execute()->fetchAllAssoc('id');

//create the row element
	$rows = array();
	foreach ($result as $row => $content){
		$rows[] = array('data' => array($content->id, $content->name, $content->email));
	}

//craete the header
	$header = array('id', 'name', 'email');
	$output = array(
		'#theme' => 'table',
		'#header' => $header,
		'#rows' => $rows
	);
	return $output;
	}

}