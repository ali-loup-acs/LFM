<?php

  function addFile($id_dir,$file_name,$size,$type, $url ,$email , $emailp){
    require_once('.init.php');
    // use the connection here
    try {
      $dbh = new PDO('mysql:host='.$host.';dbname='.$dbname.';', $user, $password);
      $sql = "INSERT INTO FILES_UPLOAD (name, size, url, type, id_dir, email_from, email_to) VALUES ('$file_name', $size,'$url', '$type', '$id_dir', '$emailp', '$email')";
      

      $sth = $dbh->query($sql);// à changer

    //   if ($sth) {
    //  echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
    //  }
    //  else{
    //  echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
    //  }
      // $sth = $dbh->prepare($sql);
      // $sth->execute();
    } catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
    }
    // $sth = null;
    // $dbh = null;
    }

  function findFile($id_dir){
    require_once('.init.php');
    // use the connection here
    try {
      $dbh = new PDO('mysql:host='.$host.';dbname='.$dbname.';', $user, $password);
      $sql = "SELECT * FROM FILES_UPLOAD WHERE id_dir='$id_dir'";
      $sth = $dbh->query($sql);// à changer
      $res = $sth->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
    }
    // $sth = null;
    // $dbh = null;
    return $res;
    }
 ?>
