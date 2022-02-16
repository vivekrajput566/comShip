<?php session_start();
if(!isset($_SESSION['userid'])){
  header("location:http://localhost/shriecom/login-form.php");
  exit();
}
else{
  $customerid=$_SESSION['userid'];
  $con=new mysqli("localhost","root","","shriecom");
  $customer_delivery_details=mysqli_query($con,"SELECT * FROM ecom_customer_delivery_details where customerid=$customerid");
  $isdata_present=mysqli_num_rows($customer_delivery_details);
  $username="";
  $phonenumber="";
  $address="";
  $pincode="";
  if($isdata_present){
    $customer_details=mysqli_fetch_array($customer_delivery_details);
    $username=$customer_details['username'];
    $phonenumber=$customer_details['phonenumber'];
    $address=$customer_details['address'];
    $pincode=$customer_details['pincode'];
  }
}

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
    $(document).ready(function(){

      $("#submit-destination-details").click(function(){
        let destinationUsername=$("#destination-username").val().trim();
        let destinationAddress=$("#destination-user-address").val().trim();
        let destinationPincode=$("#destination-user-pincode").val().trim();
        let destinationMobileNo=$("#destination-mobile-no").val().trim();

        if(destinationUsername.trim().length==0){
          $(".destination-details-error").text("Enter Your name");
          return;
        }
        if(destinationAddress.trim().length==0){
          $(".destination-details-error").text("Enter your address");
          return;
        }
        if(destinationPincode.trim().length!=6){
          $(".destination-details-error").text("Enter valid pincode");
          return;
        }
        if(destinationMobileNo.trim().length!=10 ){
          $(".destination-details-error").text("Enter valid Mobile no.");
          return;
        }

        let destinationFormData= new FormData();
        destinationFormData.append("destination-username",destinationUsername);
        destinationFormData.append("destination-address",destinationAddress);
        destinationFormData.append("destination-pincode",destinationPincode);
        destinationFormData.append("destination-mobileno",destinationMobileNo);
        destinationFormData.append("ecom-customer-details","ecom-customer-details");
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
              window.location="cart.php";

            }
            else{
              $("#destination-details-error").text("Server error try again");
              $("#destination-loading").hide();
              $("#destination-continue").show();
            }
          }
        })



      })

    })
  </script>




  <!--- destination <details -->
  <div class="row" id="destination-details" style="display:block;position:relative;width:auto;height:524px;">
  <div class="row" style="background-color:#f2f2f2;height:auto;width:90%;position:absolute;margin:auto;top:0;right:0;left:0;bottom:0;">
    <center>
  <span class="text-primary" style="font-size:20px;font-weight:bold;">Enter you details </span><br>
  <span class="text-danger destination-details-error" style="font-size:15px;font-weight:bold;"> </span>
  </center>


      <label for="destination-username">Your name</label>
      <input type="text" id="destination-username" name="destination-username"  value="<?php echo $username; ?>"placeholder="Enter your name">

      <label for="destination-user-address">Your Address</label>
      <input type="text" id="destination-user-address" name="destination-user-address" value="<?php echo $address; ?>" placeholder="Enter your complete address">

      <label for="destination-user-pincode">Your Pincode</label>
      <input type="number" id="destination-user-pincode" name="destination-user-pincode" value="<?php echo $pincode; ?>" placeholder="Enter your area PINCODE">


      <label for="destination-mobile-no">Your Mobile Number</label>
      <input type="number" id="destination-mobile-no" name="destination-user-mobile-no"  value="<?php echo $phonenumber; ?>" placeholder="Enter your mobile number">



      <button  id="submit-destination-details">
        <div class="spinner-border text-light text-left" id="destination-loading" style="display: none;" ></div>
        <div id="destination-continue">Continue</div>
      </button>

  </div>
  </div>
</div>
  </body>
</html>
