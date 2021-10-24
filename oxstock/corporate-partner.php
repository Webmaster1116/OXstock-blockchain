<?php 
require_once 'classes/configure.php'; 
include(DIR_BASE.'header.php'); 
?>

<section class="contact-dtls">

    <div class="container">

        <div class="row">



            <div class="col-lg-6">



                <div class="cont-form">

                    <h2>Corporate Partner</h2>

                    <form action="/action_page.php" id="form1">



                        <div class="form-group half-width">

                            <input type="text" class="form-control" placeholder="Full Business Name">

                        </div>

                        <div class="form-group half-width">

                            <input type="last-name" class="form-control" placeholder="ABN">

                        </div>
                        
                        <div class="form-group half-width">

                            <input type="last-name" class="form-control" placeholder="Website">

                        </div>
                        
                        <div class="form-group half-width">

                            <input type="text" class="form-control" id="exampleInputNumber" placeholder="Mobile Number">

                        </div>

                        <div class="form-group full-width">

                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Your Email">

                        </div>

                        

                        <div class="form-group full-width">

                            <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Suggested Corporate Partnership"></textarea>

                        </div>

                        <div class="pp-btn">

                            <button type="button" class="btn btn-default">Submit</button>



                        </div>

                    </form>

                </div>

            </div>

            <div class="col-lg-6">

              <div class="right-img">

                <img src="plugin/images/contact.png">

            </div>

        </div>

    </div>

</div>

</section>

<?php include('footer.php'); ?>