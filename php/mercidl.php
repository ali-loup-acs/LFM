<?php
include_once('db.php');
  $id_dir=$_REQUEST['file'];
  $result = findFile($id_dir);
  $size = $result['size'];
  $name = $result['name'];
  $type = $result['type']; 
  $mail = $result['email_from'];
  $url = 'http://'.$_SERVER['SERVER_NAME'].'/lfm/php/download.php?file='.$_REQUEST['file'];
  $nomfichier = $name.".".$type; 
  
  $templateddl = file_get_contents('../template/templateddl.html');
          
  $templateddl = str_replace('{{size}}', $size, $templateddl);
  $templateddl = str_replace('{{nomfichier}}', $nomfichier, $templateddl);
  $templateddl = str_replace('{{email}}', $mail, $templateddl);
  $templateddl = str_replace('{{url}}', $url, $templateddl);
  echo $templateddl;
?>

