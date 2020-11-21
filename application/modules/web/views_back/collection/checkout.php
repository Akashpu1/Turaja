
<!-- breadcrumb area start -->
       <div class="breadcrumb-area">
           <div class="container">
               <div class="row">
                   <div class="col-12">
                       <div class="breadcrumb-wrap">
                           <nav aria-label="breadcrumb">
                               <ul class="breadcrumb">
                                   <li class="breadcrumb-item"><a href="<?php echo base_url('web/home')?>"><i class="fa fa-home"></i></a></li>
                                  <!-- <li class="breadcrumb-item"><a href="<?php echo base_url('web/shop')?>">shop</a></li>  -->
                                   <li class="breadcrumb-item active" aria-current="page">checkout</li>
                               </ul>
                           </nav>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- breadcrumb area end -->

       <!-- checkout main wrapper start -->
       <div class="checkout-page-wrapper section-padding">
           <div class="container">
               <div class="row">

               </div>
               <div class="row">
                   <!-- Checkout Billing Details -->
                   <div class="col-lg-6">
                       <div class="checkout-billing-details-wrap">
                           <h5 class="checkout-title">Billing Details</h5>
                           <div class="billing-form-wrap">
                               <form action="<?php echo base_url('web/checkout/'); ?>" Method="post">

                                   <div class="single-input-item">
                                       <label for="f_name" class="required">First Name</label>
                                       <input type="text" id="name" readonly value="<?php echo $username;?>" name="name" placeholder=" Name" required />
                                  </div>

                                   <div class="single-input-item">
                                       <label for="email" class="required">Email Address</label>
                                       <input type="email" id="email" readonly value="<?php echo $email;?>" name="email" placeholder="Email Address" required />
                                   </div>
                                   <div class="single-input-item">
                                       <label for="email" class="required">Mobile</label>
                                       <input type="text" id="phone" value="<?php echo $phone;?>" name="phone" placeholder="mobile" required />
                                   </div>

                                   <div class="single-input-item">
                                       <label for="street-address" class="required mt-20">Street address</label>
                                       <input type="text" id="address" name="address" placeholder="Street address Line 1" required />
                                   </div>

                                   <div class="single-input-item">
                                       <label for="postcode" class="required">Postcode / ZIP</label>
                                       <input type="text" id="postcode"  name="postcode" placeholder="Postcode / ZIP" required />
                                   </div>

                                   <br><br>
                                   <?php if($this->cart->total_items() > 0){
                                     $sub_total=0;
                                     $gst=0;
                                     foreach($cartIvalue as $item){

                                       $gst= $gst+ $item['gst'];
                                      $sub_total=($sub_total+$item['subtotal']);
                                   }
                                
                                 ?>

                                <input type="hidden"  name="total" value="<?php echo $sub_total+$gst+70?>" required />
                                <?php } ?>
                                    <button type="submit" name="placeOrder" class="btn btn-sqr">Place Order</button>

                               </form>
                           </div>
                       </div>
                   </div>

                   <!-- Order Summary Details -->
                   <div class="col-lg-6">
                       <div class="order-summary-details">
                           <h5 class="checkout-title">Your Order Summary</h5>
                           <div class="order-summary-content">
                               <!-- Order Summary Table -->
                               <div class="order-summary-table table-responsive text-center">
                                   <table class="table table-bordered">
                                       <thead>
                                           <tr>
                                               <th>Products</th>
                                               <th>Total</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                         <?php if($this->cart->total_items() > 0){ foreach($cartIvalue as $item){ ?>
                                           <tr>
                                               <td><a href="<?php echo base_url('')?>"><?php echo $item["name"]; ?> X <strong> <?php echo $item["qty"]; ?></strong></a>
                                               </td>
                                               <td><?php echo '₹'.$item["subtotal"]; ?></td>
                                           </tr>
                                         <?php } } ?>

                                       </tbody>
                                       <tfoot>
                                         <?php if($this->cart->total_items() > 0){
                		                        $sub_total=0;
                                            $gst=0;
                													  foreach($cartIvalue as $item){

                                             $data['cartIvalue']=$item;
                                             	$gst= $gst+ $item['gst'];
                														 $sub_total=($sub_total+$item['subtotal']);
                                          }   ?>
                                          <tr>
                                              <td>Tax</td>
                                              <td><strong><?php echo $gst.'%';?></strong></td>
                                          </tr>
                                           <tr>
                                               <td>Sub Total</td>
                                               <td><strong><?php echo '₹'.($sub_total+ $gst);?></strong></td>
                                           </tr>
                                           <tr>
                                               <td>Shipping</td>
                                               <td class="d-flex justify-content-center">
                                                   <ul class="shipping-type">
                                                       <li>
                                                           <div class="custom-control custom-radio">
                                                               <input type="radio" id="flatrate" name="shipping" class="custom-control-input" checked />
                                                               <label class="custom-control-label" for="flatrate">
                                                                   Rate: ₹70.00</label>
                                                           </div>
                                                       </li>
                                                       <li>

                                                       </li>
                                                   </ul>
                                               </td>
                                           </tr>
                                           <tr>
                                               <td>Total Amount</td>
                                               <?php $total=0; $total=$sub_total+70?>
                                               <td><strong><?php echo '₹'.$total;?></strong></td>
                                           </tr>
                                         <?php }else{?>
                                           <tr>
                                               <td>Sub Total</td>
                                               <td><strong>0</strong></td>
                                           </tr>
                                           <tr>
                                               <td>Shipping</td>
                                               <td class="d-flex justify-content-center">
                                                   <ul class="shipping-type">
                                                       <li>
                                                           <div class="custom-control custom-radio">
                                                               <input type="radio" id="flatrate" name="shipping" class="custom-control-input" checked />
                                                               <label class="custom-control-label" for="flatrate">Flat
                                                                   Rate: ₹70.00</label>
                                                           </div>
                                                       </li>
                                                       <li>

                                                       </li>
                                                   </ul>
                                               </td>
                                           </tr>
                                           <tr>
                                               <td>Total Amount</td>

                                               <td><strong>0</strong></td>
                                           </tr>
                                           <?php
                                         }
                   															 ?>

                                       </tfoot>
                                   </table>
                               </div>
                               <!-- Order Payment Method -->
                               <!-- <div class="order-payment-method">
                                   <div class="single-payment-method show">
                                       <div class="payment-method-name">
                                           <div class="custom-control custom-radio">
                                               <input type="radio" id="cashon" name="paymentmethod" value="cash" class="custom-control-input" checked />
                                               <label class="custom-control-label" for="cashon">Cash On Delivery</label>
                                           </div>
                                       </div>
                                       <div class="payment-method-details" data-method="cash">
                                           <p>Pay with cash upon delivery.</p>
                                       </div>
                                   </div>
                               </div> -->
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- checkout main wrapper end -->
