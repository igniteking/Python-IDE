<?php 

$amount = "199";
$name = @$_GET['username'];
$course_category = @$_GET['course_category'];
?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        jQuery.ajax({
          type: 'post',
          url: 'payment_process_refral.php',
          data: "amt=" + "<?php echo $amount;?>" + "&name=" + "<?php echo $name; ?>" + "&course_category=" + "<?php echo $course_category; ?>",
          success: function(result) {
            var options = {
              "key": "rzp_test_j1EvXkK1lRyYz4",
              "amount": <?php echo $amount;?> * 100,
              "currency": "INR",
              "name": "GlowEDU",
              "description": "C-Course",
              "image": "images/logo.jpeg",
              "handler": function(response) {
                jQuery.ajax({
                  type: 'post',
                  url: 'payment_process_refral.php',
                  data: "payment_id=" + response.razorpay_payment_id + "&name=" + "<?php echo $name; ?>",
                  success: function(result) {
                    window.location.href = "thankyou.php";
                  }
                });
              }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
          }
        });
    </script>