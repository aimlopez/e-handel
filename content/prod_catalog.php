
<div class="container">
<div class="page-header">
<h1 class="h2">OUR PRODUCTS</h1>
</div>



            <?php
                $get_product= "SELECT p.prod_id, p.prod_name, p.serienumber, p.prod_descript, p.image, p.price, opt.ov_name FROM `product` AS p LEFT JOIN product_instance AS pi ON p.prod_id = pi.prod_id LEFT JOIN optionsValues AS opt ON pi.ov_id= opt.ov_id";

                $stmt = $dbh->query($get_product);
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

            ?>

                       
   <div class="prod_div col-xs-12 col-md-3">                               
           

               
                   
                
                        <p><a class= "prod_link "href='index.php?pid=product&prodid=<?php echo $prod_id?>&colour=<?php echo $option?>'><img src="<?php echo $img ?>" class="thumb_img" />
                        <h4  class="text-left "><?php echo $prod_name  ?></h4>
                        </a></p>
                        <p> Price: <?php echo $price?> <span class="euro_sym glyphicon glyphicon-euro"></span>

                        <span class="" >
                        <a class="add_button btn btn-primary " href="" title="Add to cart"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</a> 
                        </span>
                        </p>
                   
    </div>       
               

<?php
        }
    }else {
        return "we could not connect with the database;";
    }
    ?>

  

    </div>


