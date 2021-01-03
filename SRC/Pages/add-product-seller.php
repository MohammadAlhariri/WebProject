<?php
include "IncludesParts/header.php"; ?>
<!--end header-->

<div class="container tm-mt-big tm-mb-big">
    <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="row mb-2">
                    <div class="col-12">
                        <h2 class="tm-block-title d-inline-block">Add Product</h2>
                    </div>
                </div>
                <div class="row tm-edit-product-row">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <form action="" class="tm-edit-product-form">
                            <div class="form-group mb-3">
                                <label
                                        for="name"
                                >Product Name
                                </label>
                                <input
                                        id="name"
                                        name="name"
                                        type="text"
                                        class="form-control validate"
                                        required
                                />
                            </div>
                            <div class="form-group mb-3">
                                <label
                                        for="description"
                                >Description</label
                                >
                                <textarea
                                        class="form-control validate"
                                        rows="3"
                                        required
                                ></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label
                                        for="category"
                                >Category</label
                                >
                                <select
                                        class="custom-select tm-select-accounts"
                                        id="category"
                                >
                                    <option selected>Select category</option>
                                    <option value="1">New Arrival</option>
                                    <option value="2">Most Popular</option>
                                    <option value="3">Trending</option>
                                    <option value="1">New Arrival</option>
                                    <option value="4">Most Popular blah</option>
                                    <option value="5">some blah</option>
                                    <option value="7">new blah</option>
                                    <option value="8">blah</option>

                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label
                                        for="price"
                                >Price</label
                                >
                                <input type="number" name="price" id="price" class="form-control validate">

                            </div>

                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                        <div class="tm-product-img-dummy mx-auto text-center">
                            <img  src="assets/img/productUploadImage.png" alt="page"id="imgLogo" width="70%">
                        </div>
                        <div class="custom-file mt-3 mb-3">
                            <input id="fileInput" type="file" style="display:none;"/>
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
                                <button type="submit" class="btn btn-primary text-uppercase">Add Product Now</button>
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
