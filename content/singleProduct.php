<?php


			if (isset($_GET['prodid']) && isset($_GET['colour']) ) {

			$prodid = $_GET['prodid'];
			$colour = $_GET['colour'];

			//$get_pro= "SELECT * FROM product_instance INNER JOIN product USING (prod_id)";
		$get_pro = "SELECT p.*, opt.ov_name FROM `product` AS p INNER JOIN product_instance AS pi ON p.prod_id = pi.prod_id LEFT JOIN optionsValues AS opt ON pi.ov_id= opt.ov_id WHERE pi.prod_id= :pd AND opt.ov_name =:colour"; 

//
			
			$stmt = $dbh->prepare($get_pro);
			$stmt->bindParam(':pd', $_GET['prodid']);
			$stmt->bindParam(':colour', $_GET['colour']);
				$stmt->execute();

		if ($stmt) {
        		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				
        			
        //I keep the user information in different variables so I can use it in my html
           			$prod_name = $row['prod_name'];
            	//$id = $row['userID'];

            		$img = $row['image'];

            		$serienumber = $row['serienumber'];

            		$option = $row['ov_name'];

            		$description = $row['prod_descript'];

            		$price= $row['price'];

            		$prod_id= $row['prod_id'];

            	//} 
            }
        }
          ?> 
          <div class="container" id="product-section">
 			 <div class="row">

   				<div class="col-md-6 adj_size text-xs-center">

					
				
					<img src="<?php echo $img ?>" class=".img-fluid" />
					
				</div>
				<div class="col-md-6 s_prod">
					<div class="row">
  						<div class="col-md-12">
   
 
							<h1 class='prod_name'><?php echo $prod_name?></h1>
						</div>
					</div>
					<div class="row">
 						<div class="col-md-12">
 				
  							<span class="monospaced">Serinumber: <?php echo $serienumber ?></span>
 						</div>
					</div><!-- end row -->
					<div class="row">
 						<div class="col-md-12">
  							<span class="monospaced"><?php echo $description ?></span><br/>
  							<span class="monospaced">Colour: <?php echo $option ?></span>
 						</div>
 						 	
						
					<div class="row">
 						<div class="col-md-12 bottom-rule">
  							<h2 class="product-price"><?php echo $price ?><span class="glyphicon glyphicon-euro"></span> </h2>
 						</div>
					</div>	
					<div class="row add-to-cart">
 						<div class="col-md-5 product-qty">
  							<span class="btn btn-default btn-lg btn-qty">
   								<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
  							</span>
  							<input class="btn btn-default btn-lg btn-qty" value="1" />
  							<span class="btn btn-default btn-lg btn-qty">
   							<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
  							</span>
 						</div>
 						<div id='addwlist' class="col-md-4">
  							<a class="btn btn-primary " href="" title="Add to cart"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</a></span>
  							<a class="monospaced" href="#">Add to Shopping List</a>
 						</div>
					</div>	
					<div class="row">
 						
 						<div id= "addwlist" class="col-md-4 col-md-offset-1">
  							
 						</div>
					</div>	
							

<?php
}


    ?>

     		
