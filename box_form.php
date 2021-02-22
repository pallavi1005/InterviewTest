<?php
require_once 'box_form_class.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
		
  $boxData = new boxDataClass();
  // Call save data function 
  $boxData->saveBoxRecords();
  
  exit();
}
?>


