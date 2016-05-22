<?php
require_once ('includes/header.php');

//var_dump($_SESSION);

?>



	
<?php
//Create a simple routing to the site

global $pid;

if (isset($_GET['pid'])) {
	$pid = $_GET['pid'];
} else {
	// Annars sätt $pid till 1
	$pid = "start";
}

$pages = array(
	"start" => "index.php",
	"catalog" => "prod_catalog.php",
    "addproduct" => "product_manage.php",
    "addoption"	=> "add_option.php",
   "product" => "singleProduct.php",

    
);

// Om $pid-värdet inte finns som nyckel i $pages, sätt $pid till 1.

if (!array_key_exists($pid, $pages)){
	$pid = "start";

    }
    include('content/'.$pages[$pid]);
?>




	



</body>
</html>