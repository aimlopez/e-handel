<?php
session_start();
require_once ('includes/db_connection.php');
require_once ('includes/form_validation.php');
require_once ('includes/functions.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MyShop</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,700italic,800,600' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

</head>
<body>

<header>
	<nav class="navbar navbar-default">
		

    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href"#"><h1 id="logo_header">MyShop</h1></a>
      
      </div>

            <ul class="navbar nav-tabs navbar-nav pull-right" role="navigation">
        
             <li><a class="navbar-brand" href="index.php">Home</a></li>
              <li><a class="navbar-brand" href="index.php?pid=catalog">Catalog</a></li>
              <li><a class="navbar-brand" href="index.php?pid=addproduct">Product Manage</a></li>
              <li><a class="navbar-brand" href="index.php?pid=addoption">Options Manage</a></li>
       
</ul>

</div>
 </nav>

</header>
