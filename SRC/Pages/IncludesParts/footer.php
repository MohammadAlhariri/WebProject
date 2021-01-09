<div class="row subscribe-form ">


    <div class="row">
        <div class="col-md-6">
            <div class="col-md-12">
                <div class="section-heading">
                    <div class="line-dec"></div>
                    <h1>Subscribe on <span id="titlel"> <span id="elogo">e</span>-Commerce</span> now!</h1>
                </div>
            </div>
            <div class="container">
                <div class="col-md-12">
                    <div class="main-content">
                        <p>Integer vel turpis ultricies, lacinia ligula id, lobortis augue. Vivamus porttitor dui id
                            dictum
                            efficitur. Phasellus vel interdum elit.</p>
                        <div class="">
                            <form id="subscribe" action="" method="get">
                                <div class="row">
                                    <div class="col-md-7">
                                        <fieldset>
                                            <input name="email" type="text" class="form-control" id="email"
                                                   onfocus="if(this.value == 'Your Email...') { this.value = ''; }"
                                                   onBlur="if(this.value == '') { this.value = 'Your Email...';}"
                                                   value="Your Email..." required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-md-5">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="button">Subscribe
                                            </button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="footer">
                <div class="">
                    <div class="row text-light">
                        <div class="col-md-12">
                            <div class="logo">
                                <img src="assets/Untitled-1.png" alt="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="footer-menu">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="#">Help</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="about.php">About Us</a></li>
                                    <li><a href="contact.php">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="social-icons">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<div class="sub-footer">

    <div class="row">
        <div class="col-md-12">
            <div class="copyright-text">
                <p>Copyright &copy; 2021 Company Name

                </p>
            </div>
        </div>

    </div>
</div>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- Additional Scripts -->
<script src="assets/js/custom.js"></script>
<script src="assets/js/owl.js"></script>
<script src="assets/js/isotope.js"></script>
<script src="assets/js/flex-slider.js"></script>
<script src="assets/css/animation/library/dist/aos.js"></script>
<script src="assets/css/animation/animation.js"></script>

<script language="text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t) {                   //declaring the array outside of the
        if (!cleared[t.id]) {                      // function makes it static and global
            cleared[t.id] = 1;  // you could use true and false, but that's more typing
            t.value = '';         // with more chance of typos
            t.style.color = '#fff';
        }
    }
</script>
<script>
    $("#fileInput").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imgLogo').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });



    $(document).ready(function () {
        $('.pass_show').append('<span class="ptxt">Show</span>');
    });
    $(document).on('click', '.pass_show .ptxt', function () {

        $(this).text($(this).text() == "Show" ? "Hide" : "Show");

        $(this).prev().attr('type', function (index, attr) {
            return attr == 'password' ? 'text' : 'password';
        });

    });
</script>

</body>

</html>
