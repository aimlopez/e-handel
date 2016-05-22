<?php
//var_dump($_POST);
// Create an object to the class Validator to verify is the input are not empty and the
// description's length is inferior than 200 characters
$loginerror = true;
$validator = new Validator();


if ( isset($_POST['formtoken'], $_SESSION['formtoken'])
    && $_POST['formtoken'] === $_SESSION['formtoken']) {

    if(isset($_POST['addOption'])){


    $validator-> addField('color_name');
    $validator-> addRulesToField('color_name', array('empty'));
   
 
    $option = $_POST['color_name'];
    //if everything is ok calls the function imageLoad from the file function.php
    if ($validator->validForm() && 
        !IfOptionsExit($option)) {

        insertOption($option);

        echo '<p class="alert alert-success">Your new option had been created successfuly</p>';

        unset($_SESSION['formtoken']);
        $loginerror = false;
    
}

}
    }
if ($loginerror){

    $formToken = md5(uniqid());
    $_SESSION['formtoken'] = $formToken;

    ?>

    <div class='row col-sm-6'>
        <div class='col-sm-8'>
     
        <form role="form" id="addColor" action="" method="post" enctype="multipart/form-data">
        
            
            
                <h1 class="h2">Add new colors</h1>

                    <div class="form-group">
                    <label class="control-label"> Write a color<span class="alert alert-danger">* <?php $validator->outFieldError('color_name'); ?></span></label>
                    <input class="form-control" type="text" id="color_name" name="color_name" />
                  <!--  <span> or</span>
                    <span> Write a hexadecimal color</span>
                   <span> #</span><input type="text" name="color_hex" /> -->
                   
           <br/>

            <input type="hidden" value="<?php echo $formToken;?>" name="formtoken" />
            <input class="btn btn-primary" type="submit" value="Submit" name="addOption" />


</div>


</form>

</div>
</div>

<div class="row col-sm-6 table-responsive">

<h1 class="h2">Current Options</h1>

    <?php
       $get_opt = "SELECT options.opt_name, options.opt_id, optionsValues.ov_name, optionsValues.ov_id  FROM options
    INNER JOIN optionsValues ON options.opt_id = optionsValues.opt_id  ORDER BY ov_id ASC";
        $stmt = $dbh->query($get_opt);
    if ($stmt) {
        ?>
    <table class= 'table table-responsive table-bordered'>

        <thead>
            <tr>
                <th ><strong>Id</strong></th>
                <th ><strong>Options</strong></th>
                <th ><strong>Options Value</strong></th>
           
            </tr>
          
        </thead>
<?php
    while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
   
   
            ?>
        <tbody>
            <tr>
                <td ><?php echo $rows['ov_id']; ?></td>
                <td ><?php echo $rows['opt_name']; ?></td>
                <td ><?php echo $rows['ov_name']; ?></td>
                
            </tr>
        </tbody>
            <?php
// close while loop 
         }
    }else {
        return "we could not connect with the database;";
    }

?>

</table>


</div>


    <?php
}

?>
