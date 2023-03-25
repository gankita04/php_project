<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
  <?php
    require_once('nav.php');
    ?>
    <div class="container">
        <div class="row">
            <div class="col-xl-3">
                <?php
                    require_once('sidebar.php');
                ?>
            </div>
            
            <div class="col-xl-9">
            <h1>products</h1>
            <div class="row resultData">
                
                    <?php
                        $sqlQuery1 = "select * from products order by proid desc";
                        // echo $sqlQuery1;
                        $result = $connection->query($sqlQuery1) or die($connection->error);
                        // print_r($result);

                        if($result->num_rows > 0):
                            while($ans = $result->fetch_assoc()):
                                // print_r($ans);

                    ?>

                <div class="col-xl-3 text-center">
                    <a href="single_product.php?productid=<?php echo $ans['proid']; ?>">
                        <img src="<?php echo $ans['propath'];?>" class="img-fluid /">
                    </a>
                    <h4 class="mt-3 mb-3">
                        <del><?php echo round($ans['proprice']);?></del><br/>

                        <?php echo round($ans['proprice'] - ($ans['proprice'])*$ans['prodiscount']/100);?>
                    </h4>
                    <p class="mt-3 mb-3">
                        <a href="single_product.php?productid=<?php echo $ans['proid']; ?>">
                            <?php echo($ans['prodname']);?></a>
                    </p>
                    <p>
                        <button for=<?php echo $ans['proid']?>
                         class="btn btn-dark btn-sm btn-add-cart">Add To Cart</button>
                    </p>
                
                </div>
                <?php
                endwhile;
                endif;
                ?>
            </div>
        </div>
        
            
       </div>
 </div>
        
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
