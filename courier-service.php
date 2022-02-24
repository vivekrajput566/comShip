<?php session_start();


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>ShriEcom</title>
    <style>
  input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }
  input[type=number], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }

  #submit-pickup-details {
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
  #submit-destination-details {
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
  <body>
    <div class="container-fluid">
      <div class="row bg-primary">
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
  <div>

  <br>
  <script>
  var cod=1;
    $(document).ready(function(){

      $("#submit-pickup-details").click(function(){
        let pickupUsername=$("#pickup-username").val().trim();
        let pickupAddress=$("#pickup-user-address").val().trim();
        let pickupPincode=$("#pickup-user-pincode").val().trim();
        let pickupMobileNo=$("#pickup-mobile-no").val().trim();
        let productWeight=$("#product-weight").val().trim();
        if(pickupUsername.trim().length==0){
          $(".pickup-details-error").text("Enter Pickup Username");
          return;
        }
        if(pickupAddress.trim().length==0){
          $(".pickup-details-error").text("Enter Pickup address");
          return;
        }
        if(pickupPincode.trim().length!=6){
          $(".pickup-details-error").text("Enter valid pickup pincode");
          return;
        }
        if(pickupMobileNo.trim().length!=10 ){
          $(".pickup-details-error").text("Enter valid pickup Mobile no.");
          return;
        }
        if(productWeight.trim().length==0 || isNaN(productWeight.trim())){
          $(".pickup-details-error").text("Enter valid product weight");
          return;
        }
        let pickupFormData= new FormData();
        pickupFormData.append("pickup-username",pickupUsername);
        pickupFormData.append("pickup-address",pickupAddress);
        pickupFormData.append("pickup-pincode",pickupPincode);
        pickupFormData.append("pickup-mobileno",pickupMobileNo);
        pickupFormData.append("product-weight",productWeight);
        pickupFormData.append("pickup-data","pickup-data");
        $("#pickup-loading").show();
        $("#pickup-continue").hide();
        $.ajax({
          type:'POST',
          url:'ajax_backend.php',
          data:pickupFormData,
          processData:false,
          contentType:false,
          success:function(data){
            if(data==1){
              $("#pickup-details-error").text("Server error");
              $("#pickup-details").hide();
              $("#destination-details").show();

            }
            else{
              $("#pickup-details-error").text("Server error try again");
              $("#pickup-loading").hide();
              $("#pickup-continue").show();
            }
          }
        })



      })


      $("#submit-destination-details").click(function(){
        let destinationUsername=$("#destination-username").val().trim();
        let destinationAddress=$("#destination-user-address").val().trim();
        let destinationPincode=$("#destination-user-pincode").val().trim();
        let destinationMobileNo=$("#destination-mobile-no").val().trim();
        let productWeight=$("#product-weight").val().trim();
        if(destinationUsername.trim().length==0){
          $(".destination-details-error").text("Enter Customer's Username");
          return;
        }
        if(destinationAddress.trim().length==0){
          $(".destination-details-error").text("Enter Customer's address");
          return;
        }
        if(destinationPincode.trim().length!=6){
          $(".destination-details-error").text("Enter valid pincode");
          return;
        }
        if(destinationMobileNo.trim().length!=10 ){
          $(".destination-details-error").text("Enter valid Customer's Mobile no.");
          return;
        }

        let destinationFormData= new FormData();
        destinationFormData.append("destination-username",destinationUsername);
        destinationFormData.append("destination-address",destinationAddress);
        destinationFormData.append("destination-pincode",destinationPincode);
        destinationFormData.append("destination-mobileno",destinationMobileNo);
        destinationFormData.append("destination-data","destination-data");
        $("#destination-loading").show();
        $("#destination-continue").hide();
        $.ajax({
          type:'POST',
          url:'ajax_backend.php',
          data:destinationFormData,
          processData:false,
          contentType:false,
          success:function(data){
            console.log(data)
            if(data==1){
              $("#destination-details-error").text("Server error");
              $("#destination-details").hide();
              $("#product-details").show();

            }
            else{
              $("#destination-details-error").text("Server error try again");
              $("#destination-loading").hide();
              $("#destination-continue").show();
            }
          }
        })



      })



      $("#submit-product-details").click(function(){
        let productName=$("#product-name").val().trim();
        let productWeight=$("#product-weight").val().trim();
        let productAmount=$("#product-amount").val().trim();
        let amountCollect=cod;
        if(productName.trim().length==0){
          $(".product-details-error").text("Enter Product Name");
          return;
        }
        if(productWeight.trim().length==0){
          $(".product-details-error").text("Enter Product Weight");
          return;
        }
        if(productAmount.trim().length==0){
          $(".product-details-error").text("Enter Product Amount");
          return;
        }


        let productFormData= new FormData();
        productFormData.append("product-name",productName);
        productFormData.append("product-weight",productWeight);
        productFormData.append("product-amount",productAmount);
        productFormData.append("amount-collect",amountCollect);
        productFormData.append("product-data","product-data");
        $("#product-loading").show();
        $("#product-continue").hide();
        $.ajax({
          type:'POST',
          url:'ajax_backend.php',
          data:productFormData,
          processData:false,
          contentType:false,
          success:function(data){
            console.log(data)
            if(data==1){

              window.location="delivery-charges.php";

            }
            else{
              $("#product-details-error").text("Server error try again");
              $("#product-loading").hide();
              $("#product-continue").show();
            }
          }
        })



      })



      $("#cash-on-delivery").click(function(){
        $("#pay-now").prop("checked",false);

        cod=1;

      })
      $("#pay-now").click(function(){
        cod=0;
        $("#cash-on-delivery").prop("checked",false);

      })

    })
  </script>
  <div class="row" id="pickup-details" style="display:block;position:relative;width:auto;height:650px;">
  <div class="row" style="background-color:#f2f2f2;height:auto;width:90%;position:absolute;margin:auto;top:0;right:0;left:0;bottom:0;">
    <center><br>
  <span class="text-primary" style="font-size:20px;font-weight:bold;">  Pickup Details </span><br>
  <span class="text-danger pickup-details-error" style="font-size:15px;font-weight:bold;"> </span>
  </center>
  <?php

    $pickupUsername="";
    $pickupAddress="";
    $pickupPincode="";
    $pickupMobileNo="";
    if(isset($_SESSION["pickup-details"])){
      $pickupUsername=$_SESSION["pickup-username"];
      $pickupAddress=$_SESSION["pickup-address"];
      $pickupPincode=$_SESSION["pickup-pincode"];
      $pickupMobileNo=$_SESSION["pickup-mobileno"];
    }
  ?>

      <label for="pickup-username">Your name</label>
      <input type="text" id="pickup-username" name="pickup-username" value="<?php echo $pickupUsername;  ?>" required placeholder="Enter Your name">

      <label for="pickup-user-address">Your Pickup Address</label>
      <input type="text" id="pickup-user-address" name="pickup-user-address" value="<?php echo $pickupAddress;  ?>" required placeholder="Enter Complete Pickup Address">

      <label for="pickup-user-pincode">Your Pickup Pincode</label>
      <input type="number" id="pickup-user-pincode" name="pickup-user-pincode" value="<?php echo $pickupPincode;  ?>" required placeholder="Enter Your Area PINCODE">


      <label for="pickup-mobile-no">Your Mobile Number</label>
      <input type="number" id="pickup-mobile-no" name="pickup-user-mobile-no" value="<?php echo $pickupMobileNo;  ?>" required placeholder="Enter Your Mobile Number">

      <label for="product-weight">Product Weight (kg)</label>
      <input type="text" id="product-weight" name="product-weight" required placeholder="Enter your product weight">

      <button  id="submit-pickup-details"  >
        <div class="spinner-border text-light text-left" id="pickup-loading" style="display: none;" ></div>
        <div id="pickup-continue">Continue</div>
        </button>

  </div>
  </div>




  <!--- destination <details -->
  <div class="row" id="destination-details" style="display:none;position:relative;width:auto;height:524px;">
  <div class="row" style="background-color:#f2f2f2;height:auto;width:90%;position:absolute;margin:auto;top:0;right:0;left:0;bottom:0;">
    <center>
  <span class="text-primary" style="font-size:20px;font-weight:bold;">  Destination Details </span><br>
  <span class="text-danger destination-details-error" style="font-size:15px;font-weight:bold;"> </span>
  </center>


      <label for="destination-username">Customer Name</label>
      <input type="text" id="destination-username" name="destination-username" placeholder="Enter customer's name">

      <label for="destination-user-address">Customer Address</label>
      <input type="text" id="destination-user-address" name="destination-user-address" placeholder="Enter complete customer's address">

      <label for="destination-user-pincode">Customer Pincode</label>
      <input type="number" id="destination-user-pincode" name="destination-user-pincode" placeholder="Enter customer's area PINCODE">


      <label for="destination-mobile-no">Customer's Mobile Number</label>
      <input type="number" id="destination-mobile-no" name="destination-user-mobile-no" placeholder="Enter customer's mobile number">



      <button  id="submit-destination-details">
        <div class="spinner-border text-light text-left" id="destination-loading" style="display: none;" ></div>
        <div id="destination-continue">Continue</div>
      </button>

  </div>
  </div>

  <div class="row" id="product-details" style="display:none;position:relative;width:auto;height:524px;">
  <div class="row" style="background-color:#f2f2f2;height:auto;width:90%;position:absolute;margin:auto;top:0;right:0;left:0;bottom:0;">
    <center>
  <span class="text-primary" style="font-size:20px;font-weight:bold;">  Product Details </span><br>
  <span class="text-danger product-details-error" style="font-size:15px;font-weight:bold;"> </span>
  </center>


      <label for="product-username">Product Name</label>
      <input type="text" id="product-name" name="product-name" placeholder="Enter Product name">

      <label for="product-weight">Product Weight</label>
      <input type="number" id="product-weight" name="product-weight" placeholder="Enter Product weight">

      <label for="product-amount">Product Amount</label>
      <input type="number" id="product-amount" name="product-amount" placeholder="Enter Product Amount ">

      <div id="select-cod" class="row" style="padding:5px;">
        <div style="padding-left:10px;padding-bottom: 10px;font-weight:bold;">Collect Amount</div><br>
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
            Prepaid
          </div>
      </div>


      <button  id="submit-product-details">
        <div class="spinner-border text-light text-left" id="product-loading" style="display: none;" ></div>
        <div id="product-continue">Continue</div>
      </button>

  </div>
  </div>




</div>
  </body>
</html>
