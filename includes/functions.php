<?php


 
function IfOptionsExit($option){
    global $dbh;

    /*if ($dbh){
        echo 'connected';
    }else{
        echo 'unconneted';
    } */
    $checkOption = "SELECT * FROM optionsValues WHERE ov_name = :optionName";

    $stmt = $dbh->prepare($checkOption);
	$optionName = strtolower($option);

   
        $stmt->bindParam(':optionName', $optionName);
		$stmt->execute();
    $rows = $stmt->fetchAll();
    var_dump($rows);

    $num_rows = count($rows);
    if ($num_rows>0) {

        return true;
    }else{
        return false;
}
}

function insertOption($option){
    global $dbh;

$insertOption = "INSERT INTO optionsValues (ov_name, opt_id) VALUES (:opt_value, :optID)";
    $stmt = $dbh->prepare($insertOption);
   
    
    $optionValue = strtolower($option);
    $optID = 1; // I wrote a stactic variable because I'm not sure how to take the value from the other table exactly. If you read this message I hadn't time to see it in details.
    $stmt->bindParam(':opt_value', $optionValue);
    $stmt->bindParam(':optID', $optID);
    $stmt->execute();

    
}

/* functions to add product page */

function getoptionsID(){
    global $dbh;

    $getOptionValue= "SELECT ov_id FROM optionsValues WHERE ov_name = :name";

    $stmt = $dbh->prepare($getOptionValue);
    $name = strtolower($_POST['colour']);
    $stmt->bindParam(':name', $name);
    //$stmt->execute();

        $optValue = $stmt->fetchColumn();
        return $optValue;
        var_dump($optValue);

}

function Ifproductexist($serienumber){
    global $dbh;

 /*   if ($dbh){
        echo 'connected';
    }else{
        echo 'unconneted';
    }*/

    $checkprod= "SELECT * FROM product WHERE serienumber = :serienumber";
    
    $stmt = $dbh->prepare($checkprod);
    $serieNumber = strtolower($_POST['serienumber']);
    
        $stmt->bindParam(':serienumber', $serieNumber);
        $stmt->execute();
    $rows = $stmt->fetchAll();
    $num_rows = count($rows);
    if ($num_rows>0) {

        return true;

    }else{
        return false;


    }


}

function GetImageExtension($imagetype)

     {
        // var_dump($imagetype);
       if(empty($imagetype)) {return false;}

       switch($imagetype)
      

       {

           case 'image/bmp': return '.bmp';

           case 'image/gif': return '.gif';

           case 'image/jpeg': return '.jpg';

           case 'image/png': return '.png';

           default: 
            echo "<a href= index.php?addphoto> Upload a new file </a>";
            exit ("<p style='color:red;'> Fel file format. Only .bmp, .gif, .jpg and .png are permitted");

            break;

       }

  }

function insertProduct(){  



if (!empty($_FILES["image"]["name"])) {

 if ($_FILES["image"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    exit();
}

    else{
    //varible to store the original file name
    $file_name=$_FILES["image"]["name"];

    $temp_name=$_FILES["image"]["tmp_name"];
    //Varible to store file type
    $imgtype=$_FILES["image"]["type"];

    // We store the file extension and it is useful is we want to create a complete new name to te image
    $ext= GetImageExtension($imgtype);
 
    //Choose the file name. In this case I add tha user ID to the original name
    $imagename= $_POST['prod_name']."-".$_POST['colour']."-".$file_name;
    // This variable contain the path (folder and filename) where the file is stored
    $target_path = "images/".$imagename;

     

 //Function to save the file information in the database. 
 //It verify is the file had been upload first. If not show an error message

if(move_uploaded_file($temp_name, $target_path) && !Ifproductexist() ) {
        global $dbh;

     $insertProduct= "INSERT INTO product (prod_name, serie_number, prod_descript, price, image) VALUES (:name, :serienumber, :description, :price, :img_name)";

                            $stmt = $dbh->prepare($insertProduct);

                        $name = $_POST['prod_name'];
                        $serie = $_POST['serienumber'];
                        $description = $_POST['prod_description'];
                        $price = $_POST['price'];
                        $img_name = $target_path;

                        $stmt->bindParam(':name', $name);
                        $stmt->bindParam(':serienumber', $serie);
                        $stmt->bindParam(':description', $description);
                        $stmt->bindParam(':price', $price);
                        $stmt->bindParam(':img_name', $img_name);
                        $stmt->execute();
                        $last_id= $dbh-> lastInsetId();
                        var_dump($last_id);
                        return $last_id;
                        
   

} elseif(move_uploaded_file($temp_name, $target_path) && Ifproductexist()){

  global $dbh;
        // check if the product ID and the option value ID exist in the product_instance

       // 1. If it doesn't exist INSERT product ID and Option ID in the product_instance table.


       //2. If it existe return message this product exist. 
    }                  

   




}// end (else) file size is correct
} else{//end not empty file
    echo 'You need to insert a file';}

} //end function

function inProductInstance() {

    if (getoptionsID() > 0 && insertProduct() > 0){
        var_dump($last_id);
         $insertProInstance= "INSERT INTO product_instance (prod_id, ov_id) VALUES ($last_id, $optValue)";

        $stmt = $dbh->prepare($insertProInstance);
        $stmt->execute();
        var_dump($stmt);

    }



}