<?php
include "IncludesParts/header.php";
include "../model/getAllValidProducts.php";
$products = getAllProducts();?>

    <!-- Page Content -->
    <!-- Items Starts Here -->
    <div class="featured-page">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Featured Items</h1>
            </div>
          </div>
          <div class="col-md-8 col-sm-12">
            <div id="filters" class="button-group">
              <button class="btn btn-primary" data-filter="*">All Products</button>
              <button class="btn btn-primary" data-filter=".new">Newest</button>
              <button class="btn btn-primary" data-filter=".low">Low Price</button>
              <button class="btn btn-primary" data-filter=".high">High Price</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="featured container no-gutter">
        <div class="row posts">
<?php
$i=1;
while ($row = mysqli_fetch_array($products)) {

    ?>

            <div id="<?php echo $i++; ?>" class="item new col-md-4">
              <a href="single-product.php?productID=<?php echo $row["productID"]; ?>">
                <div class="featured-item">
                  <img src="../<?php echo $row["productImage"]; ?>" alt="<?php echo $row["productName"]; ?>">
                  <h4><?php echo $row["productName"]; ?></h4>
                  <h5>$<?php echo $row["productPrice"]; ?></h5>
                </div>
              </a>
            </div>
            <?php }?>

        </div>
    </div>


    <!-- Featred Page Ends Here -->

<?php include "IncludesParts/footer.php";