<?php
  $db = new mysqli('localhost', 'root', '', 'zeus');
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} 
?>