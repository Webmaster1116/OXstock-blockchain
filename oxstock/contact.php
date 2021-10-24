<?php 
require_once 'classes/configure.php'; 
include('header.php'); ?>
    <!---------------------- end priching ---------------->
    <section class="contact-dtls">
        <div class="container">
<div class="row">
       
    <div class="col-lg-6">
   
            <div class="cont-form">
                <h2>Get in touch</h2>
                <form action="/action_page.php" id="form1">

                    <div class="form-group half-width">
                        <input type="text" class="form-control" placeholder="First Name">
                    </div>
                    <div class="form-group half-width">
                        <input type="last-name" class="form-control" placeholder="Surname">
                    </div>
                    <div class="form-group half-width">
                        <input type="email" class="form-control" placeholder="Your Email">
                    </div>
                    <div class="form-group half-width">
                        <input type="number" class="form-control" placeholder="Mobile Number">
                    </div>
                    <div class="form-group full-width">
                        <textarea class="form-control" placeholder="Here goes your message"></textarea>
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


  <!---------------------- footer ---------------->
   <?php include('footer.php'); ?>