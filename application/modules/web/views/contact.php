<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Contact Us</h2>

        </div>
    </div>
</div>
<!-- Kenne's Breadcrumb Area End Here -->
<!-- Begin Contact Main Page Area -->
<div class="contact-main-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 order-1 order-lg-2">
                <div class="contact-page-side-content">
                    <h3 class="contact-page-title">Contact Us</h3>
                    <p class="contact-page-message">
                        <?php echo $contact->address  ?>
                    </p>
                    <div class="single-contact-block">
                        <h4><i class="fa fa-fax"></i> Address</h4>
                        <p> <?php echo $contact->address  ?></p>
                    </div>
                    <div class="single-contact-block">
                        <h4><i class="fa fa-phone"></i> Phone</h4>
                        <p>Mobile: <?php echo $contact->phone  ?></p>

                    </div>
                    <div class="single-contact-block last-child">
                        <h4><i class="fa fa-envelope-o"></i> Email</h4>
                        <p><?php echo $contact->email  ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 order-2 order-lg-1">
                <div class="contact-form-content">
                    <h3 class="contact-page-title">Tell Us Your Message</h3>
                    <div class="contact-form">
                        <form id="contact-form" action="#" method="post">
                            <div class="form-group">
                                <label>Your Name <span class="required">*</span></label>
                                <input type="text" name="con_name" id="con_name" required>
                            </div>
                            <div class="form-group">
                                <label>Your Email <span class="required">*</span></label>
                                <input type="email" name="con_email" id="con_email" required>
                            </div>
                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" name="con_subject" id="con_subject">
                            </div>
                            <div class="form-group form-group-2">
                                <label>Your Message</label>
                                <textarea name="con_message" id="con_message"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" value="submit" id="submit" class="kenne-contact-form_btn" name="submit">send</button>
                            </div>
                        </form>
                    </div>
                    <p class="form-messege"></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div id="google-map">

            <div class="mapouter">
                <div class="gmap_canvas"><iframe width="100%" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=university%20of%20san%20francisco&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div>
            </div>
        </div>
    </div>
</div>
<!--crop block-->