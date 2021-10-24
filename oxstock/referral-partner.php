<?php 
require_once 'classes/configure.php'; 
include(DIR_BASE.'header.php'); 
?>

<section class="contact-dtls">

    <div class="container">

        <div class="row">



            <div class="col-lg-6">



                <div class="cont-form">

                    <h2>Referral Partner</h2>

                    <form action="/action_page.php" id="form1">



                        <div class="form-group half-width">

                            <input type="text" class="form-control" placeholder="Full Legal Name">

                        </div>
                        
                        <div class="form-group half-width">

                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Your Email">

                        </div>

                        <div class="form-group half-width">

                            <input type="text" class="form-control" id="exampleInputNumber" placeholder="Mobile Number">

                        </div>
                        
                        <div class="form-group full-width">
                            <lable>Do you wish to be considered as a referral partner? *</lable>
                            <input type="radio" name="referral_partner" class="form-control" id="referral_partner" value="yes">Yes
                            <input type="radio" name="referral_partner" class="form-control" id="referral_partner" value="not_sure">Not Sure
                        </div>
                        
                        <div class="form-group full-width">
                            <lable>Preferred Method of Payment *</lable>
                            <input type="radio" name="method_payment" class="form-control" id="method_payment" value="onetoten">1-10
                            <input type="radio" name="method_payment" class="form-control" id="method_payment" value="tenplus">10+
                            <input type="radio" name="method_payment" class="form-control" id="method_payment" value="hundredplus">100+
                        </div>
                        
                        <div class="form-group full-width">
                            <lable>How many people could you sign up in the next 60 days? *</lable>
                            <input type="radio" name="signup" class="form-control" id="signup" value="yes">Yes
                            <input type="radio" name="signup" class="form-control" id="signup" value="not_sure">Not Sure
                        </div>
                        
                        <div class="form-group full-width">
                            <lable>Would you be advertising as an individual or a business? *</lable>
                            <input type="radio" name="advertising" class="form-control" id="advertising" value="Personal">Personal
                            <input type="radio" name="advertising" class="form-control" id="advertising" value="Business">Business
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