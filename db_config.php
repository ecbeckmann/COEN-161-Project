<?php

  $dsn = 'mysql:host=dbserver.engr.scu.edu;dbname=sdb_mhattori';
  $username = 'mhattori';
  $password = '00001072990';
  $options = array(
                   PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                   );
  
  try {
    $dbh = new PDO($dsn, $username, $password);
    //echo "Connected";
  } catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    
  }
  
?>
