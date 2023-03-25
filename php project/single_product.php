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
    require_once('nav.php')
    ?>



<div class="container">
    <h1>
        Single Product Page
    </h1>

<?php
// print_r($_GET);
// print_r($_REQUEST);
// print_r($_POST);

$id=$_GET['productid'];
// echo $id;

$sqlQuery="select * from products WHERE proid='$id'";
// echo $sqlQuery;

$result=$connection->query($sqlQuery) or die($connection->error);
// print_r($result);

$ans=$result->fetch_assoc();

// echo "<pre>";
// print_r($ans);
// echo "</pre>";

?>

<div class="row">
    <div class="col-xl-5">
    <img src="<?php echo $ans['propath']; ?>" alt="">
    </div>

    <div class="col-xl-7">
        <h2>
            <del><?php echo round($ans['proprice']); ?></del> &nbsp;
            <?php
                echo round($ans['proprice']-($ans['proprice']*$ans['prodiscount']/100));
            ?>
        </h2>

        <h4><?php echo $ans['prodname']; ?></h4>

        <p>
            <?php
                echo $ans['prodesc'];
            ?>
        </p>

        <p>
            <button for=<?php echo $ans['proid']?>
            class="btn btn-dark btn-sm btn-add-cart">Add to Cart</button>
         </p>

    </div>
</div>

</div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
