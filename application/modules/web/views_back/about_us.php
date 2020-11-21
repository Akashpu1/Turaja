<!-- breadcrumb area start -->
       <div class="breadcrumb-area">
           <div class="container">
               <div class="row">
                   <div class="col-12">
                       <div class="breadcrumb-wrap">
                           <nav aria-label="breadcrumb">
                               <ul class="breadcrumb">
                                   <li class="breadcrumb-item"><a href="<?php echo base_url('home')?>"><i class="fa fa-home"></i></a></li>
                                   <li class="breadcrumb-item active" aria-current="page">About us</li>
                               </ul>
                           </nav>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- breadcrumb area end -->

       <!-- about us area start -->
       <section class="about-us section-padding">
           <div class="container">
               <div class="row align-items-center">
                   <div class="col-lg-5">
                       <div class="about-thumb">
                           <img src="<?php echo base_url()?>/assets/img/about/5085_1.jpg" alt="about thumb" height="550px;">
                       </div>
                   </div>
                   <div class="col-lg-7">
                       <div class="about-content">
                           <h2 class="about-title">About Us</h2>
                           <h5 class="about-sub-title">
                               Founded in 1986, I.D. Jewelry, LLC, a family owned & operated business has become a house-hold name in states all over the USA as well as countries all over the world.
                           </h5>
                           <p>For those that rather the full immersion of the in store experience we welcome your company and look forward to meeting you face to face. Being located in the 47 street diamond district, known to be the largest diamond.</p>
                           <p>Based in the heart of New York’s Diamond District, also known as the NYC diamond district, I. D. Jewelry has some of the most competitively priced in the market. It is our goal to supply our clients.</p>
                       </div>
                  </div>
               </div>
           </div>
       </section>
       <!-- about us area end -->

       <!-- choosing area start -->
       <div class="choosing-area section-padding pt-0">
           <div class="container">
               <div class="row">
                   <div class="col-12">
                       <div class="section-title text-center">
                           <h2 class="title">Why Choose Us</h2>
                           <p>Accumsan vitae pede lacus ut ullamcorper sollicitudin quisque libero</p>
                       </div>
                   </div>
               </div>
               <div class="row mbn-30">
                   <div class="col-lg-4 col-md-4">
                       <div class="single-choose-item text-center mb-30">
                           <i class="fa fa-globe"></i>
                           <h4>free shipping</h4>
                           <p>Amadea Shop is a very slick and clean e-commerce template with endless possibilities.</p>
                       </div>
                   </div>
                   <div class="col-lg-4 col-md-4">
                       <div class="single-choose-item text-center mb-30">
                           <i class="fa fa-plane"></i>
                           <h4>fast delivery</h4>
                           <p>Amadea Shop is a very slick and clean e-commerce template with endless possibilities.</p>
                       </div>
                   </div>
                   <div class="col-lg-4 col-md-4">
                       <div class="single-choose-item text-center mb-30">
                           <i class="fa fa-comments"></i>
                           <h4>customers support</h4>
                           <p>Amadea Shop is a very slick and clean e-commerce template with endless possibilities.</p>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- choosing area end -->


       <!-- testimonial area start -->
       <!-- <section class="testimonial-area section-padding bg-img" data-bg="<?php echo base_url() ?>/assets/img/testimonial/testimonials-bg.jpg">
           <div class="container">
               <div class="row">
                   <div class="col-12"> -->
                       <!-- section title start -->
                       <!-- <div class="section-title text-center">
                           <h2 class="title">testimonials</h2>
                           <p class="sub-title">What they say</p>
                       </div> -->
                       <!-- section title start -->
                   <!-- </div>
               </div>
               <div class="row">
                   <div class="col-12">
                       <div class="testimonial-thumb-wrapper">
                           <div class="testimonial-thumb-carousel">
                             <?php foreach($testimonial as $value):?>
                               <div class="testimonial-thumb">
                                   <img src="<?php echo base_url('uploads/testimonial/').$value['image'] ?>" alt="testimonial-thumb">
                               </div>
                             <?php endforeach;?>
                           </div>
                       </div>
                       <div class="testimonial-content-wrapper">
                           <div class="testimonial-content-carousel">
                             <?php foreach($testimonial as $value):?>
                               <div class="testimonial-content">
                                   <p><?php echo $value['discription']?></p>
                                   <div class="ratings">

                                       <?php for($i=1;$i<=$value['ratting'];$i++){?>
                                       <span><i class="fa fa-star checked"></i></span>
                                   <?php }
                                    if($value['ratting']<5)
                                    {
                                    $rat=5-$value['ratting'];
                                    for($i=1;$i<=$rat;$i++)
                                    { ?>
                                         <span><i class="fa fa-star-o"></i></span>
                                        <?php
                                    }
                                  }
                                   ?>



                                   </div>
                                   <h5 class="testimonial-author"><?php echo $value['name']?></h5>
                               </div>
                             <?php endforeach;?>

                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </section> -->
       <!-- testimonial area end -->
