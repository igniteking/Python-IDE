<?php 
$name = @$_GET['username'];
$course_category = @$_GET['course_category'];
$email = @$_GET['email'];
if ($course_category =="python30") {
  $course_category_less = "python";
  $amount = '199';
  $days = "30";
?>
  <script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
  <script src='https://checkout.razorpay.com/v1/checkout.js'></script>
  <script>
      jQuery.ajax({
        type: 'post',
        url: 'payment_process_refral.php',
        data: 'amt=' + '$amount' + '&name=' + '<?php echo $name; ?>' + '&email=' + '<?php echo $email; ?>'  + '&days=' + '<?php echo $days; ?>' + '&course_category=' + '<?php echo $course_category_less?>',
        success: function(result) {
          var options = {
            'key': 'rzp_live_bf8Ijdlx7KFZsb',
            'amount': '<?php echo $amount;?>' * 100,
            'currency': 'INR',
            'name': 'GlowEDU',
            'description': 'C-Course',
            'image': 'images/logo.png',
            'handler': function(response) {
              jQuery.ajax({
                type: 'post',
                url: 'payment_process_refral.php',
                data: 'payment_id=' + response.razorpay_payment_id + '&name=' + '<?php echo $name; ?>',
                success: function(result) {
                  window.location.href = 'thankyou.php';
                }
              });
            }
          };
          var rzp1 = new Razorpay(options);
          rzp1.open();
        }
      });
  </script>

<?php
} elseif ($course_category =="python180") {
    $course_category_less = "python";
    $amount = ' 1074';
    $days = "180";
  ?>
    <script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
    <script src='https://checkout.razorpay.com/v1/checkout.js'></script>
    <script>
        jQuery.ajax({
          type: 'post',
          url: 'payment_process_refral.php',
          data: 'amt=' + '$amount' + '&name=' + '<?php echo $name; ?>' + '&email=' + '<?php echo $email; ?>'  + '&days=' + '<?php echo $days; ?>' + '&course_category=' + '<?php echo $course_category_less?>',
          success: function(result) {
            var options = {
              'key': 'rzp_live_bf8Ijdlx7KFZsb',
              'amount': '<?php echo $amount;?>' * 100,
              'currency': 'INR',
              'name': 'GlowEDU',
              'description': 'C-Course',
              'image': 'images/logo.png',
              'handler': function(response) {
                jQuery.ajax({
                  type: 'post',
                  url: 'payment_process_refral.php',
                  data: 'payment_id=' + response.razorpay_payment_id + '&name=' + '<?php echo $name; ?>',
                  success: function(result) {
                    window.location.href = 'thankyou.php';
                  }
                });
              }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
          }
        });
    </script>
 <?php
} elseif ($course_category =="python365") {
    $course_category_less = "python";
    $amount = ' 1910';
    $days = "365";
  ?>
    <script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
    <script src='https://checkout.razorpay.com/v1/checkout.js'></script>
    <script>
        jQuery.ajax({
          type: 'post',
          url: 'payment_process_refral.php',
          data: 'amt=' + '$amount' + '&name=' + '<?php echo $name; ?>' + '&email=' + '<?php echo $email; ?>'  + '&days=' + '<?php echo $days; ?>' + '&course_category=' + '<?php echo $course_category_less?>',
          success: function(result) {
            var options = {
              'key': 'rzp_live_bf8Ijdlx7KFZsb',
              'amount': '<?php echo $amount;?>' * 100,
              'currency': 'INR',
              'name': 'GlowEDU',
              'description': 'C-Course',
              'image': 'images/logo.png',
              'handler': function(response) {
                jQuery.ajax({
                  type: 'post',
                  url: 'payment_process_refral.php',
                  data: 'payment_id=' + response.razorpay_payment_id + '&name=' + '<?php echo $name; ?>',
                  success: function(result) {
                    window.location.href = 'thankyou.php';
                  }
                });
              }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
          }
        });
    </script>
   <?php
} elseif ($course_category =="cc_plus30") {
    $course_category_less = "cc_plus";
    $amount = ' 199';
    $days = "30";
  ?>
    <script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
    <script src='https://checkout.razorpay.com/v1/checkout.js'></script>
    <script>
        jQuery.ajax({
          type: 'post',
          url: 'payment_process_refral.php',
          data: 'amt=' + '$amount' + '&name=' + '<?php echo $name; ?>' + '&email=' + '<?php echo $email; ?>'  + '&days=' + '<?php echo $days; ?>' + '&course_category=' + '<?php echo $course_category_less?>',
          success: function(result) {
            var options = {
              'key': 'rzp_live_bf8Ijdlx7KFZsb',
              'amount': '<?php echo $amount;?>' * 100,
              'currency': 'INR',
              'name': 'GlowEDU',
              'description': 'C-Course',
              'image': 'images/logo.png',
              'handler': function(response) {
                jQuery.ajax({
                  type: 'post',
                  url: 'payment_process_refral.php',
                  data: 'payment_id=' + response.razorpay_payment_id + '&name=' + '<?php echo $name; ?>',
                  success: function(result) {
                    window.location.href = 'thankyou.php';
                  }
                });
              }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
          }
        });
    </script>
 <?php
} elseif ($course_category =="cc_plus180") {
    $course_category_less = "cc_plus30";
    $amount = '1074';
    $days = "180";
  ?>
    <script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
    <script src='https://checkout.razorpay.com/v1/checkout.js'></script>
    <script>
        jQuery.ajax({
          type: 'post',
          url: 'payment_process_refral.php',
          data: 'amt=' + '$amount' + '&name=' + '<?php echo $name; ?>' + '&email=' + '<?php echo $email; ?>'  + '&days=' + '<?php echo $days; ?>' + '&course_category=' + '<?php echo $course_category_less?>',
          success: function(result) {
            var options = {
              'key': 'rzp_live_bf8Ijdlx7KFZsb',
              'amount': '<?php echo $amount;?>' * 100,
              'currency': 'INR',
              'name': 'GlowEDU',
              'description': 'C-Course',
              'image': 'images/logo.png',
              'handler': function(response) {
                jQuery.ajax({
                  type: 'post',
                  url: 'payment_process_refral.php',
                  data: 'payment_id=' + response.razorpay_payment_id + '&name=' + '<?php echo $name; ?>',
                  success: function(result) {
                    window.location.href = 'thankyou.php';
                  }
                });
              }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
          }
        });
    </script>
    <?php
} elseif ($course_category =="cc_plus360") {
    $course_category_less = "cc_plus30";
    $amount = '1910';
    $days = "360";
  ?>
    <script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
    <script src='https://checkout.razorpay.com/v1/checkout.js'></script>
    <script>
        jQuery.ajax({
          type: 'post',
          url: 'payment_process_refral.php',
          data: 'amt=' + '$amount' + '&name=' + '<?php echo $name; ?>' + '&email=' + '<?php echo $email; ?>'  + '&days=' + '<?php echo $days; ?>' + '&course_category=' + '<?php echo $course_category_less?>',
          success: function(result) {
            var options = {
              'key': 'rzp_live_bf8Ijdlx7KFZsb',
              'amount': '<?php echo $amount;?>' * 100,
              'currency': 'INR',
              'name': 'GlowEDU',
              'description': 'C-Course',
              'image': 'images/logo.png',
              'handler': function(response) {
                jQuery.ajax({
                  type: 'post',
                  url: 'payment_process_refral.php',
                  data: 'payment_id=' + response.razorpay_payment_id + '&name=' + '<?php echo $name; ?>',
                  success: function(result) {
                    window.location.href = 'thankyou.php';
                  }
                });
              }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
          }
        });
    </script>
       <?php
} elseif ($course_category =="javascript30") {
    $course_category_less = "javascript";
    $amount = ' 199';
    $days = "30";
  ?>
    <script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
    <script src='https://checkout.razorpay.com/v1/checkout.js'></script>
    <script>
        jQuery.ajax({
          type: 'post',
          url: 'payment_process_refral.php',
          data: 'amt=' + '$amount' + '&name=' + '<?php echo $name; ?>' + '&email=' + '<?php echo $email; ?>'  + '&days=' + '<?php echo $days; ?>' + '&course_category=' + '<?php echo $course_category_less?>',
          success: function(result) {
            var options = {
              'key': 'rzp_live_bf8Ijdlx7KFZsb',
              'amount': '<?php echo $amount;?>' * 100,
              'currency': 'INR',
              'name': 'GlowEDU',
              'description': 'C-Course',
              'image': 'images/logo.png',
              'handler': function(response) {
                jQuery.ajax({
                  type: 'post',
                  url: 'payment_process_refral.php',
                  data: 'payment_id=' + response.razorpay_payment_id + '&name=' + '<?php echo $name; ?>',
                  success: function(result) {
                    window.location.href = 'thankyou.php';
                  }
                });
              }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
          }
        });
    </script>
 <?php
} elseif ($course_category =="javascript180") {
    $course_category_less = "javascript";
    $amount = '1074';
    $days = "180";
  ?>
    <script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
    <script src='https://checkout.razorpay.com/v1/checkout.js'></script>
    <script>
        jQuery.ajax({
          type: 'post',
          url: 'payment_process_refral.php',
          data: 'amt=' + '$amount' + '&name=' + '<?php echo $name; ?>' + '&email=' + '<?php echo $email; ?>'  + '&days=' + '<?php echo $days; ?>' + '&course_category=' + '<?php echo $course_category_less?>',
          success: function(result) {
            var options = {
              'key': 'rzp_live_bf8Ijdlx7KFZsb',
              'amount': '<?php echo $amount;?>' * 100,
              'currency': 'INR',
              'name': 'GlowEDU',
              'description': 'C-Course',
              'image': 'images/logo.png',
              'handler': function(response) {
                jQuery.ajax({
                  type: 'post',
                  url: 'payment_process_refral.php',
                  data: 'payment_id=' + response.razorpay_payment_id + '&name=' + '<?php echo $name; ?>',
                  success: function(result) {
                    window.location.href = 'thankyou.php';
                  }
                });
              }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
          }
        });
    </script>
    <?php
} elseif ($course_category =="javascript360") {
    $course_category_less = "javascript";
    $amount = '1910';
    $days = "360";
  ?>
    <script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
    <script src='https://checkout.razorpay.com/v1/checkout.js'></script>
    <script>
        jQuery.ajax({
          type: 'post',
          url: 'payment_process_refral.php',
          data: 'amt=' + '$amount' + '&name=' + '<?php echo $name; ?>' + '&email=' + '<?php echo $email; ?>'  + '&days=' + '<?php echo $days; ?>' + '&course_category=' + '<?php echo $course_category_less?>',
          success: function(result) {
            var options = {
              'key': 'rzp_live_bf8Ijdlx7KFZsb',
              'amount': '<?php echo $amount;?>' * 100,
              'currency': 'INR',
              'name': 'GlowEDU',
              'description': 'C-Course',
              'image': 'images/logo.png',
              'handler': function(response) {
                jQuery.ajax({
                  type: 'post',
                  url: 'payment_process_refral.php',
                  data: 'payment_id=' + response.razorpay_payment_id + '&name=' + '<?php echo $name; ?>',
                  success: function(result) {
                    window.location.href = 'thankyou.php';
                  }
                });
              }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
          }
        });
    </script>
 <?php }?>