<?php
include "IncludesParts/header.php";?>

    <!-- Page Content -->
    <!-- About Page Starts Here -->
    <div class="contact-page">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Contact Us</h1>
            </div>
          </div>
          <div class="col-md-6">
            <div id="map">
                <img src="assets/Untitled-1.png" alt="logo" width="100%">

            </div>
          </div>
          <div class="col-md-6">
            <div class="right-content">
              <div class="container">
                <form id="contact" action="../model/sendFeedBackMSG.php" method="post">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input name="name" type="text" class="form-control" id="name" placeholder="Your name..." required="">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input name="phone" type="text" class="form-control" id="phone" placeholder="Your Phone..." required="">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject..." required="">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your message..." required=""></textarea>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <button type="submit" id="form-submit" class="button">Send Message</button>
                      </div>
                    </div>

                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- About Page Ends Here -->


<?php include "IncludesParts/footer.php";
