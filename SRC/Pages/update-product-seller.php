<?php
include "IncludesParts/header.php";
include "../model/getProductInformation.php";
$product = getValues($_POST["id"]);
?>
<!--end header-->
<div class="container tm-mt-big tm-mb-big">
    <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="row mb-2">
                    <div class="col-12">
                        <h2 class="tm-block-title d-inline-block">Update Product</h2>
                    </div>
                </div>
                <div class="row tm-edit-product-row">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <form action="../model/updateProduct.php" class="tm-edit-product-form" method="post"
                              enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <input type="hidden" name="productID" value="<?php echo $product["productID"]; ?>"/>
                                <label
                                        for="name"
                                >Product Name
                                </label>
                                <input
                                        id="name"
                                        name="name"
                                        type="text"
                                        class="form-control validate"
                                        value="<?php echo $product["productName"]; ?>"
                                        required
                                />
                            </div>
                            <div class="form-group mb-3">
                                <label
                                        for="description"
                                >Description</label
                                >
                                <textarea
                                        name="description"
                                        class="form-control validate"
                                        rows="3"

                                        required
                                ><?php echo $product["productDescription"]; ?></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label
                                        for="category"
                                >Select category</label
                                >

                                <select
                                        name="category"
                                        class="custom-select tm-select-accounts"
                                        id="category"
                                        onchange="selection()"
                                >
                                    <option selected
                                            value="<?php echo $product["productCategory"]; ?>"><?php echo $product["productCategory"]; ?></option>
                                    <option value="New Arrival">New Arrival</option>
                                    <option value="Most Popular">Most Popular</option>
                                    <option value="Trending">Trending</option>
                                    <option value="New Arrival">New Arrival</option>
                                    <option value="Most Popular blah">Most Popular blah</option>
                                    <option value="some blah">some blah</option>
                                    <option value="new blah">new blah</option>
                                    <option value="blah">blah</option>
                                    <option value="other">Others</option>

                                </select>
                                <input
                                        name="newCategory" id="others" class="form-control" hidden="hidden"
                                        placeholder="Category">
                            </div>
                            <script>function selection() {
                                    var selected = document.getElementById("category").value;
                                    if (selected == "other") {

                                        document.getElementById("others").removeAttribute("hidden");
                                    } else {
                                        document.getElementById("others").setAttribute("hidden", "hidden");
                                    }
                                }</script>
                            <div class="form-group mb-3">
                                <label
                                        for="price"
                                >Price</label
                                >
                                <input value="<?php echo $product["productPrice"]; ?>" type="number" name="price"
                                       id="price" class="form-control validate">

                            </div>

                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                        <div class="tm-product-img-dummy mx-auto text-center">
                            <img src="../<?php echo $product["productImage"]; ?>" alt="page" id="imgLogo" width="70%">
                        </div>
                        <div class="custom-file mt-3 mb-3">
                            <input name="fileInput" id="fileInput" type="file" style="display:none;"/>
                            <input
                                    type="button"
                                    class="btn btn-primary btn-block mx-auto"
                                    value="UPLOAD PRODUCT IMAGE"
                                    onclick="document.getElementById('fileInput').click();"
                            />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-2">
                                <button name="submit" type="submit" class="btn btn-primary text-uppercase">Add Product
                                    Now
                                </button>
                            </div>

                        </div>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--start footer-->
<?php
include "IncludesParts/footer.php"; ?>
<!--end footer-->

