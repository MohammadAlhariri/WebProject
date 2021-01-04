<?php
include "IncludesParts/header.php";
include "../model/getProductInformation.php";
include "../model/getProductsByCategory.php";

$product=getValues($_GET["productID"]);

?>

    <!-- Page Content -->
    <!-- Single Starts Here -->
    <div class="single-product">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Single Product</h1>
            </div>
          </div>
          <div class="col-md-6">
            <div class="product-slider">
              <div id="slider" class="flexslider">
                <ul class="slides">
                  <li>
                    <img src="../<?php echo $product["productImage"];?>" />
                  </li>
<!--                  <li>-->
<!--                    <img src="assets/images/big-02.jpg" />-->
<!--                  </li>-->
<!--                  <li>-->
<!--                    <img src="assets/images/big-03.jpg" />-->
<!--                  </li>-->
<!--                  <li>-->
<!--                    <img src="assets/images/big-04.jpg" />-->
<!--                  </li>-->
                  <!-- items mirrored twice, total of 12 -->
                </ul>
              </div>
<!--              <div id="carousel" class="flexslider">-->
<!--                <ul class="slides">-->
<!--                  <li>-->
<!--                    <img src="assets/images/thumb-01.jpg" />-->
<!--                  </li>-->
<!--                  <li>-->
<!--                    <img src="assets/images/thumb-02.jpg" />-->
<!--                  </li>-->
<!--                  <li>-->
<!--                    <img src="assets/images/thumb-03.jpg" />-->
<!--                  </li>-->
<!--                  <li>-->
<!--                    <img src="assets/images/thumb-04.jpg" />-->
<!--                  </li>-->
                 <!-- items mirrored twice, total of 12 -->
<!--                </ul>-->
<!--              </div>-->
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-content">
              <h4><?php echo $product["productName"];?></h4>
              <h6>$<?php echo $product["productPrice"];?></h6>
              <p><?php echo $product["productDescription"];?></p>
<!--              <span>7 left on stock</span>-->
              <form action="" method="get">
                <label for="quantity">Quantity:</label>
                <input name="quantity" type="quantity" class="quantity-text" id="quantity" 
                	onfocus="if(this.value == '1') { this.value = ''; }" 
                    onBlur="if(this.value == '') { this.value = '1';}"
                    value="1">
                <input type="submit" class="button" value="Order Now!">
              </form>
              <div class="down-content">
                <div class="categories">
                  <h6>Category: <span><a href="#"><?php echo $product["productCategory"];?></a></span></h6>
                </div>
                <div class="share">
                  <h6>Share: <span><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-twitter"></i></a></span></h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Single Page Ends Here -->


    <!-- Similar Starts Here -->
    <div class="featured-items">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>You May Also Like</h1>
            </div>
          </div>
          <div class="col-md-12">
            <div class="owl-carousel owl-theme">
                <?php
                $products=getProductsByCategory($product["productCategory"]);
                while ($row=mysqli_fetch_array($products)){
                ?>



              <a href="single-product.php?productID=<?php echo $row["productID"];?>">
                <div class="featured-item">
                  <img src="../<?php echo $row["productImage"];?>" alt="<?php echo $row["productName"];?>">
                  <h4><?php echo $row["productName"];?></h4>
                  <h6>$<?php echo $row["productPrice"];?></h6>
                </div>
              </a>
                    <?php } ?>
              <!--<a href="single-product.php">
                <div class="featured-item">
                  <img src="assets/images/item-02.jpg" alt="Item 2">
                  <h4>Erat odio rhoncus</h4>
                  <h6>$25.00</h6>
                </div>
              </a>
              <a href="single-product.php">
                <div class="featured-item">
                  <img src="assets/images/item-03.jpg" alt="Item 3">
                  <h4>Integer vel turpis</h4>
                  <h6>$35.00</h6>
                </div>
              </a>
              <a href="single-product.php">
                <div class="featured-item">
                  <img src="assets/images/item-04.jpg" alt="Item 4">
                  <h4>Sed purus quam</h4>
                  <h6>$45.00</h6>
                </div>
              </a>
              <a href="single-product.php">
                <div class="featured-item">
                  <img src="assets/images/item-05.jpg" alt="Item 5">
                  <h4>Morbi aliquet</h4>
                  <h6>$55.00</h6>
                </div>
              </a>
              <a href="single-product.php">
                <div class="featured-item">
                  <img src="assets/images/item-06.jpg" alt="Item 6">
                  <h4>Urna ac diam</h4>
                  <h6>$65.00</h6>
                </div>
              </a>
              <a href="single-product.php">
                <div class="featured-item">
                  <img src="assets/images/item-04.jpg" alt="Item 7">
                  <h4>Proin eget imperdiet</h4>
                  <h6>$75.00</h6>
                </div>
              </a>
              <a href="single-product.php">
                <div class="featured-item">
                  <img src="assets/images/item-05.jpg" alt="Item 8">
                  <h4>Nullam risus nisl</h4>
                  <h6>$85.00</h6>
                </div>
              </a>
              <a href="single-product.php">
                <div class="featured-item">
                  <img src="assets/images/item-06.jpg" alt="Item 9">
                  <h4>Cras tempus</h4>
                  <h6>$95.00</h6>
                </div>
              </a>-->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Similar Ends Here -->



<?php include "IncludesParts/footer.php";