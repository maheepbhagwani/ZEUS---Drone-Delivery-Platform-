<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$mysql=mysql_connect("localhost","root","") or die("The Server is offline");
mysql_select_db("zeus",$mysql) or die("The database is hidden, problem is beign solved");
?>