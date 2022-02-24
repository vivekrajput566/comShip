<?php session_start();
if(!isset($_SESSION['pickup-details']) || !isset($_SESSION['destination-details']) || !isset($_SESSION['product-details'])){
  header("location:index.php");
  exit();
}
if(!isset($_SESSION['userid'])){
  header("location:login-form.php?delivery-charges=delivery-charges");
  exit();
}



?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>ShriEcom</title>
    <style>
    input[type=submit] {
      width: 100%;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size:20px;
      background-color:#0d6efd;
    }

  </style>

  <script>
  $(document).ready(function(){

    $("#cash-on-delivery").click(function(){
      $("#modeOfPayment").val(1);
      $("#pay-now").prop("checked",false);

    })
    $("#pay-now").click(function(){
      $("#modeOfPayment").val(0);
      $("#cash-on-delivery").prop("checked",false);

    })

  })
  </script>
  <body>
    <div class="container-fluid">
      <div class="row bg-primary ">
        <div class="col-2 bg-primary text-white h5 p-2 material-icons" style="font-size:30px;">
          menu
        </div>
        <div class="col-8 bg-primary text-center text-white h1 p-2 ">
          ShriEcom
        </div>
        <div class="col-2 bg-primary text-white h1 p-2 ps-5">

        </div>
      </div>

<center><br>
  <h3>Ship Your Order</h3>
</center>


  <br>
  <div class="row" id="pickup-details" style="display:block;position:relative;width:auto;height:660px;">
  <div class="row" style="background-color:#f2f2f2;height:auto;width:90%;margin:auto;top:0;right:0;left:0;bottom:0;padding-bottom:20px;">
  <br>
  <div class="text-primary" style="font-size:20px;text-align: center;height:80px;font-weight:bold;"> Delivery charges </div>

  <div id="delivery-charges-body" class="row" style="padding:5px;">
    <div class="col-8">
      Charges
    </div>
    <div class="col-4" style="text-align:right;">
      $40
    </div>

  </div>

  <div id="delivery-tax-charges-body" class="row" style="padding:5px;">
    <div class="col-8">
      Tax
    </div>
    <div class="col-4" style="text-align:right;">
      $0
    </div>

  </div>

  <div id="delivery-total-charges-body" class="row" style="padding:5px;">
    <div class="col-8">
      Total amount
    </div>
    <div class="col-4" style="text-align:right;">
      $40
    </div>


  </div>


  <div id="select-cod" class="row" style="padding:5px;">

    <div class="col-1">
      <input type="radio" id="cash-on-delivery" name="cash-on-delivery" checked="true" />
    </div>
    <div class="col-11" style="text-align:left;">
      Cash On Delivery
    </div>
  </div>
  <div id="select-prepaid" class="row" style="padding:5px;">
      <div class="col-1">
        <input type="radio" id="pay-now" name="pay-now"/>
      </div>
      <div class="col-11" style="text-align:left;">
        Pay now
      </div>
  </div>

  <?php


      $pickupUsername=$_SESSION["pickup-username"];
      $pickupAddress=$_SESSION["pickup-address"];
    #  $pickupPincode=$_SESSION["pickup-pincode"];
      $pickupMobileNo=$_SESSION["pickup-mobileno"];

      $destinationUsername=$_SESSION["destination-username"];
      $destinationAddress=$_SESSION["destination-address"];
    #  $destinationPincode=$_SESSION["destination-pincode"];
      $destinationMobileNo=$_SESSION["destination-mobileno"];



        $productName=$_SESSION['product-name'];
        $weight=$_SESSION['product-weight'];
        $amount=$_SESSION['product-amount'];
        $amountCollect=$_SESSION['amount-collect'];


  ?>

    <div id="pickup details" class="row" style="padding:5px;background:white;margin:0;margin-top:15px;  ">
        <div class="row" style="font-weight:bold;">
          Pickup details
        </div>
        <div class="row">
          <?php echo $pickupUsername;?>
        </div>
        <div class="row">
            <?php echo $pickupAddress;?>
        </div>
        <div class="row">
          <?php echo $pickupMobileNo; ?>
        </div>
    </div>

    <div id="p destination details" class="row" style="padding:5px;margin:0;margin-top:15px;background:white;">
        <div class="row" style="font-weight:bold;">
          Destination details
        </div>
        <div class="row">
          <?php echo $destinationUsername;?>
        </div>
        <div class="row">
            <?php echo $destinationAddress;?>
        </div>
        <div class="row">
            <?php echo $destinationMobileNo;?>
        </div>
    </div>

    <div id="product-details" class="row" style="padding:5px;background:white;margin:0;margin-top:15px;  ">
        <div class="row" style="font-weight:bold;">
          Product details
        </div>
        <div class="row">
          <?php echo $productName;?>
        </div>
        <div class="row">
            <?php echo $weight;?>kg
        </div>
        <div class="row">
          $<?php echo $amount; ?>
        </div>
        <div class="row">
          <?php if($amountCollect){ echo "cod"; } else{ echo "prepaid"; } ?>
        </div>

    </div>

    <div style="height:60px;">
    </div>


  </div>


</div>

  <div class="continue-button" style="position:fixed;bottom:0;width:95%;margin:auto;left:0;right:0;">
    <form method="post" action="payment.php">
      <input type="hidden" value="40" name="delivery-charges" />
      <input type="hidden" value="1" id="modeOfPayment" name="modeOfPaymnet" />


  <input type="submit"  value="Continue">
  </div>

  </body>
</html>
