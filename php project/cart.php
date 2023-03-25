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
        <h1>Cart page</h1>

        <?php
          if(!isset($_COOKIE['cartRecord'])){
            echo "Cart Empty";
          }
        ?>

        <?php
          if(isset($_COOKIE['cartRecord'])):

            $data = $_COOKIE['cartRecord'];
            // echo $data;

            $sqlQuery = "select * from products where proid in($data)";
            // echo "sqlQuery";

            $result = $connection->query($sqlQuery) or die($connection->error);
            // print_r($result);
        ?>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Discount</th>
      
      <th scope="col">Final Price</th>
      
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>

      <?php
        while($ans = $result->fetch_assoc()):
      ?>
    <tr>
      <th scope="row">
        <img src="<?php echo $ans['propath'];?>" width="80" alt="">
      </th>
      <td><?php echo $ans['prodname'];?> , <?php echo $ans['proid'];?></td>
      <td><?php echo round($ans['proprice']);?></td>
      <td><?php echo $ans['prodiscount'];?></td>
      
      <td><?php echo round($ans['proprice'] - ($ans['proprice']*$ans['prodiscount']/100) );?></td>
      <td>
        <button class="btn btn-danger cart-delete" for="<?php echo $ans['proid'];?>">X</button>
      </td>
    
    </tr>

   <?php
    endwhile;
   ?>

   <tr>
    <td colspan="6">
        <a href="checkout.php">Checkout</a>
    </td>
   </tr>
    </tbody>
</table>
<?php
      endif;
    ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
