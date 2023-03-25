<div>
                    <h1>Categories</h1>
                    <ul class="nav flex-column">
                        <?php
                            $sqlQuery1 = "select * from categories";
                            // echo $sqlQuery1;

                            $result = $connection->query($sqlQuery1) or die($connection->error);
                            // print_r($result);

                            if($result->num_rows > 0){
                               while($ans = $result->fetch_assoc()){
                                // print_r ($ans);

                                $id = $ans['catid'];
                                echo "<a href='#' for='$id' class='nav-link categoryData'>";
                                echo $ans['catname'];
                                echo "</a>";
                               }
                            }
                        ?>
                        </ul>
                </div>
                <div> 
                    <h1>brands</h1>
                    <ul class="nav flex-column">
                    <?php
                            $sqlQuery1 = "select * from brand";
                            // echo $sqlQuery1;

                            $result = $connection->query($sqlQuery1) or die($connection->error);
                            // print_r($result);

                            if($result->num_rows > 0){
                                while($ans = $result->fetch_assoc()){
                                 // print_r ($ans);

                                 $id = $ans['brandid'];
                                 echo "<a href='#' for='$id' class='nav-link brandData'>";
                                 echo $ans['brandname'];
                                 echo "</a>";
                                }
                             }

                            
                        ?>
                        </ul>
                
            </div>