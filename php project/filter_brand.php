<?php
    require_once('db/connection.php');
    
    // echo "hello";
    // {categoryid:ans} ==>Array([categoryid]=>9)

    print_r($_POST);
    // print_r($_REQUEST);

    $id = $_POST['brandid'];

    $sqlQuery = "select * from products where probrid='$id' ";
    // echo $sqlQuery;
    // exit;

    $result = $connection->query($sqlQuery) or die($connection->error);
    // print_r($result);

    if($result->num_rows > 0):
        while($ans = $result->fetch_assoc()):   
?>

<div class="col-xl-3 text-center">
                    <a href="single_product.php?productid=<?php echo $ans['proid']; ?>">
                        <img src="<?php echo $ans['propath'];?>" class="img-fluid /">
                    </a>
                    <h4 class="mt-3 mb-3">
                        <del><?php echo round($ans['proprice']);?></del>

                        <?php echo round($ans['proprice'] - ($ans['proprice'])*$ans['prodiscount']/100);?>
                    </h4>
                    <p class="mt-3 mb-3">
                        <a href="single_product.php?productid=<?php echo $ans['proid']; ?>">
                            <?php echo($ans['prodname']);?></a>
                    </p>
                    <p>
                        <button class="btn btn-dark btn-sm">Add To Cart</button>
                    </p>
                
                </div>
<?php
    endwhile;
    endif;
?>