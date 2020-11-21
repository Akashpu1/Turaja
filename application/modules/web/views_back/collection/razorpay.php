
<div class="order-payment-method">
    <div class="single-payment-method show">

        <br>
        <div class="payment-method-details" data-method="cash">
          <button id="rzp-button1">Pay with Razorpay</button>
        </div>
    </div>
  </div>
  <script src="<?php echo base_url() ?>/assets/js/vendor/jquery-3.3.1.min.js"></script>
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "rzp_test_g4cR1PF0UL3rpl", // Enter the Key ID generated from the Dashboard
    "amount": '<?php echo $order['totalPrice']*100;?>', // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": '<?php echo $title['title'];?>',
    "description": "Test Transaction",
    "image": "<?php echo base_url($logo['source']);?>",
    //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
      console.log(response);
    if(response)
    {
       window.location.href = '<?php echo base_url('web/checkout/congratulations'); ?>';
    }
          var payment_id= response.razorpay_payment_id;
          var order_id ='<?php echo $order['id'];?>';
          var user_id ='<?php echo $order['customer_id'];?>';
          var amount = '<?php echo $order['totalPrice']*100?>';
          var email ='<?php echo $order['email'];?>';
          $.ajax({
              url: "<?php echo base_url('web/checkout/payment_url'); ?>",
              type: "POST",
              data: { 'payment_id' : payment_id,  'order_id' : order_id, 'user_id' : user_id,'amount' : amount,'email' : email, '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'},
              dataType: "JSON",
              success: function(msg){
               window.location.href = '<?php echo base_url('web/checkout/congratulations'); ?>';
                // alert (data);
              }
            });
    },
    "prefill": {
        "name": '<?php echo $order['customer_name'];?>',
        "email": '<?php echo $order['email'];?>',
        "contact": '<?php echo $order['phone'];?>'
    },
    "notes": {
        "address": '<?php  echo $order['address'];?>'
    },
    "theme": {
        "color": "#F37254"
    }
};
var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>
