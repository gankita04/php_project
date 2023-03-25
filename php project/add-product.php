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
        <h1>Add Product</h1>
        <form method="post" action="product_action.php" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product Name</label>
    <input type="text" name="proName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product Price</label>
    <input type="text" name="proPrice" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product Discount</label>
    <input type="text" name="proDisc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <select class="form-control" name="proCat">
        <option value="">Select Categories</option>
                       <?php
                            $sqlQuery1 = "select * from categories";
                            // echo $sqlQuery1;

                            $result = $connection->query($sqlQuery1) or die($connection->error);
                            // print_r($result);

                            if($result->num_rows > 0){
                                while($ans = $result->fetch_assoc()){
                                 // print_r ($ans);
                                 $id = $ans['catid'];

                                 echo "<option value='$id'>";
                                 echo $ans['catname'];
                                 echo "</option>";
                                }
                             }

                            
                        ?>  
    </select>

</div>
<div class="mb-3">
    <select class="form-control" name="proBrand">
        <option value="">Select Brand</option>
        <?php
                            $sqlQuery1 = "select * from brand";
                            // echo $sqlQuery1;

                            $result = $connection->query($sqlQuery1) or die($connection->error);
                            // print_r($result);

                            if($result->num_rows > 0){
                                while($ans = $result->fetch_assoc()){
                                 print_r ($ans);
                                 $id = $ans['brandid'];

                                 echo "<option value='$id'>";
                                 echo $ans['brandname'];
                                 echo "</option>";
                                }
                             }

                            
                        ?>  
    </select>

</div>


<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product Image</label>
    <input type="file" name="proImage" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product Description</label>
<textarea name="proDescription"  id="" cols="30" rows="10" class="form-control"></textarea>
</div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
