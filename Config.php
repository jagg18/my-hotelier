<?php
  $dbhost='localhost';
  $dbuser='root';
  $dbpassword='';
  $conn=@mysql_pconnect($dbhost, $dbuser, $dbpassword) or die ('Error connecting to myHotelier database');
?>