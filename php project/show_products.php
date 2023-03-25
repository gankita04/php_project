<?php
  require_once('after_login.php');
  require_once('check_admin.php');
?>
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
        <h1>Show All Products</h1>
        
        <?php
            $sqlquery = "SELECT proid,prodname,proprice,prodiscount,round(proprice - 
            (proprice*prodiscount/100)) as discountedPrice , catname,brandname,propath FROM
            products,brand,categories WHERE brandid=probrid AND catid=procaid";

            // echo $sqlquery;

            $result = $connection->query($sqlquery) or die($connection->error);
            // print_r($result);

            if($result->num_rows > 0):
                 echo "<table class='table'>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Final Price</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                ";
                while($row = $result->fetch_object()):
        ?>
        <tr>
            <td><img src="<?php echo $row->propath?>" width="75" height="85"></td>
            <td><?php echo $row->prodname ?></td>
            <td><?php echo $row->proprice ?></td>
            <td><?php echo $row->prodiscount ?> % </td>
            <td><?php echo $row->discountedPrice ?></td>
            <td><?php echo $row->catname ?></td>
            <td><?php echo $row->brandname ?></td>
            <td>
                <a href="#" class='deletePro' for="<?php echo $row->proid ?>">Delete</a>
            </td>
            <td>
                <a href="editpage.php?proid=<?php echo $row->proid?>">Edit</a>
            </td>
        <?php
            endwhile;
            echo "</table>";
            endif;
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
