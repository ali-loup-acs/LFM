    <?php
      ini_set('display_errors', 1);
      require_once('envoimail.php');
      require_once('include/db.php');
      print_r($_REQUEST);
      // function human_filesize($bytes, $decimals = 2) {
      //   $sz = 'BKMGTP';
      //   $factor = floor((strlen($bytes) - 1) / 3);
      //   return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
      // }
      // ini_set('display_startup_errors', 1);
      // error_reporting(E_ALL);
      // $tmp_dir = ini_get('upload_tmp_dir') ? ini_get('upload_tmp_dir') : sys_get_temp_dir();
      // die($tmp_dir);
      if(isset($_FILES['file'])&&isset($_REQUEST['email'])&&isset($_REQUEST['emailp']))
      {
           $id_dir = uniqid();
           $dossier = 'upload'.'/'.$id_dir;
           mkdir($dossier,0755);
           $file = basename($_FILES['file']['name']);
           if(move_uploaded_file($_FILES['file']['tmp_name'], $dossier .'/' . $file)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
           {
                echo 'Upload effectué avec succès !';
                $info = pathinfo($file);
                $size = $_FILES['file']['size'];
                $file_name =  $info['filename'];
                $type = $info['extension'];
                $url = 'http://'.$_SERVER['SERVER_NAME'].'/LFM/mercidl.php?file='.$id_dir;
                $email = $_REQUEST['email'];
                $emailp = $_REQUEST['emailp'];
                addFile($id_dir,$file_name,$size,$type, $url, $email, $emailp);
                if(isset($_REQUEST['copy'])){
                  sendEmail($email,$emailp,$url,$_REQUEST['copy']);
                }
                else {
                  sendEmail($email,$emailp,$url);
                }
                header('Location:http://'.$_SERVER['SERVER_NAME'].'/LFM/merciup.php');

           }
           else //Sinon (la fonction renvoie FALSE).
           {
                echo 'Echec de l\'upload !';
           }
      }
    ?>
