<?php


$loginerror = true;
$validator = new Validator();


if ( isset($_POST['formtoken'], $_SESSION['formtoken'])
    && $_POST['formtoken'] === $_SESSION['formtoken']) {
    
    if(isset($_POST['addproduct'])){

    $validator-> addField('prod_name');
    $validator-> addRulesToField('prod_name', array('empty'));
    $validator-> addField('serienumber');
    $validator-> addRulesToField('serienumber', array('empty'));
    $validator-> addRulesToField('serienumber', array('onlyNumbers'));
    $validator-> addField('price');
    $validator-> addRulesToField('price', array('empty'));
    $validator-> addRulesToField('price', array('onlyNumbers'));
    $validator-> addField('prod_description');
    $validator-> addRulesToField('prod_description', array('empty'));
    $validator-> addRulesToField('prod_description', array('max_length', 200));
    // Create an object to the class Validator to verify is the input are not empty and the
// description's length is inferior than 200 characters


    //if everything is ok calls the function imageLoad from the file function.php
    if ($validator->validForm()) {
       // $img= strtolower($_FILES['prod_image']);
       

        //insertProduct();
        inProductInstance();
      

        echo '<p class="alert alert-success">Your photo had been successfuly upload</p>';

        unset($_SESSION['formtoken']);
         $loginerror = false; 
         
         }else{
            echo '<p class="alert alert-danger">ERROR</p>';
         }
    
}

}
    
   if ($loginerror){

    $formToken = md5(uniqid());
    $_SESSION['formtoken'] = $formToken;

    ?>
   

         <div class="inner-wrap">
            <h2 class="h2">Load a new product</h2>
        
        <form role="form" id="addproduct" action="" method="post" enctype="multipart/form-data">
           

                

            <div class="form-group">
                <label for="name">Product Name <span class="alert alert-danger">* <?php $validator->outFieldError('prod_name'); ?></span> </label>
                <input class="form-control" type="text" name="prod_name" id = "prod_name"  />
                
            </div>

            <div class="form-group">
                <label for ="serien" >Serienumber <span class="alert alert-danger">* <?php $validator->outFieldError('serienumber'); ?></span></label>
                <input class="form-control" type="text" name="serienumber" id="serien" />
            </div>

            <div class="form-group">
                <label for="pcolour">Colour</label>
                <select class="form-control" type="text" name="colour" id="pcolour">
                    <?php 
                    
                        $get_opt = "SELECT * FROM optionsValues ORDER BY ov_id ASC";
                        $stmt = $dbh->query($get_opt);
                        while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>

                    <option value="<?php echo $rows['ov_name'] ?>"><?php echo $rows['ov_name'] ?></option>
                        
                    <?php
                        }
                    ?>

                </select>
            </div>

            <div class="form-group">
                <label for="price" >Price <span class="alert alert-danger">* <?php $validator->outFieldError('price'); ?></span></label>
                    <input class="form-control" type="text" name="price" id="price"/>
            </div>

            <div class="form-group">
                <label for="prod_description" >Description <span class="alert alert-danger">* <?php $validator->outFieldError('prod_description'); ?></span></label>
                    <textarea class="form-control"  rows="5" name="prod_description" id="prod_description"> </textarea>
            </div>

            <div class="form-group">
                <label for="fileup" >Select your photo<span class="alert alert-danger">* </span> </label>
                
                <input type="file" name="prod_image" id="fileToUpload" value="select" id="fileup" />
            </div>

                <input type="hidden" value="<?php echo $formToken;?>" name="formtoken" />
                <input type="submit" value="add Product" name="addproduct" class="btn btn-primary" />

            </div>


        </form>
        </div>



    <?php
}


?>
