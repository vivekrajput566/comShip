<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0" >
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  </head>

<?php

  session_start();
  if(isset($_POST['delivery-charges'])){
    $modeOfPaymnet=$_POST['modeOfPayment'];
    $deliveryCharges=$_POST['delivery-charges'];
    $paramList=array();
    $ORDER_ID=rand(10000000,99999999);
    $CUST_ID="rajputvivek5686@gmail.com";
    $CHANNEL_ID="WEB";
    $paramList["ORDER_ID"] = $ORDER_ID;
    $paramList["CUST_ID"] = $CUST_ID;
    $paramList["INDUSTRY_TYPE_ID"] = "Retail";;
    $paramList["CHANNEL_ID"] = $CHANNEL_ID;
    $paramList["TXN_AMOUNT"] = $deliveryCharges;


  }
   if(isset($_SESSION['payment-page-redirect'])){
     header("location:http://localhost/shriecom/payment/PaytmKit/pgRedirect.php");
     exit();
   }

?>
<form method="post" action="PaytmKit/pgRedirect.php" name="f1">
<table border="1">
  <tbody>
  <?php
  foreach($paramList as $name => $value) {
    echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
  }
  ?>

  </tbody>
</table>
<script type="text/javascript">
  document.f1.submit();
</script>
</form>


<style>
 *{
    box-sizing: border-box;
 }
 body{
   margin:0;
 }
 #header-container{
  width:100%;
  height:60px;
  background:#2db333;
  color: white;
 }
 #company-name-body{
   width: 55%;
   height: 100%;
   float: left;
   text-align: center;
   font-size: 20px;
   margin-top:8px;
 }
 #user-login-status{
  width:30%;
  height:100%;
  float:left;
  text-align: center;
  padding-top: 10px;
 }
 #menu-button{
  width:20%;
  height: 100%;
  float:left;
  padding-top: 10px;
 }
 #header-body{
  width:100%;
  height:100%;
 }
 #body-container{

  position:relative;
 }
 #menu-body{
  width:0%;

  display: none;
  background-color: white;
  position:absolute;
  top:0;
  z-index: 2;
  border:2px solid black;
 }
 #add-item-button-box{
  position:fixed;
  bottom:10px;
  right:5px;
  width:40px;
  height:40px;
  font-size: 20px;
  margin:auto;
  border-radius: 50%;
  border:1px solid black;
 }
 #add-item-button{
  margin: auto;
    width: 20px;
    position: absolute;
    /* margin-top: auto; */
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    height: 20px;
    font-size:inherit;
    /* margin-bottom: auto; */
    text-align: center;
 }
 a{
  text-decoration: none;
  color:black;
  -webkit-tap-highlight-color:transparent;
 }
</style>
<script>
 $(document).ready(function(){
  windowHeight=screen.height;
 $("#menu-body").css('height',windowHeight);
  $("#menu-btn").click(function(){
    $("#menu-body").show();
    $("#menu-body").animate({width:'100%',height:windowHeight});


  })
  $("#close-icon-button").click(function(){
    $("#menu-body").animate({width:'0%',height:'0%'},function(){
      $("#menu-body").hide();
 $("#menu-body").css('height',windowHeight);
    });




  })
 })
</script>
  <body id="body-container">

      <div  id="header-container" class="">
        <header id="header-body">
          <div id="menu-button" >
            <a href="javascript:void(0)">
            <div id="menu-btn" class="material-icons" style="font-size:30px;margin:auto;color:white;">
            menu
          </div>
        </a>

          </div>

          <div id="company-name-body">
              Payment

          </div>




        </header>

      </div>

      <div id="menu-body" >
        <div id="menu-close-icon" style="width:100%;height:40px;">
          <a href="javascript:void(0)" style="color:black;">
          <div class="material-icons" style="float:right;font-size:30px;" id="close-icon-button">
            close
          </div>
        </a>
       </div>
       <BR>
         <a href="http://localhost/shriecom/">
       <div id="refer-to-home-page" style="font-family:arial;width:100%;height:30px;font-size:13px;padding-left:10px;display:table;white-space:nowrap;">
        <div class="material-icons" style="width: 22px;height: 21px;font-size: 20px;text-align: center;display: inline-block;vertical-align: middle;border-radius: 20%;">
          home
        </div>
        <div id="home-page" style="display:inline-block;vertical-align:middle;font-size:15px;">
        &nbsp Home
        </div>
       </div>
     </a>

       <br>
       <a href="http://localhost/shriecom/cart.php">
       <div id="refer-to-shoppingcart" style="font-family:arial;width:100%;height:30px;font-size:13px;padding-left:10px;display:table;white-space:nowrap;">
        <div class="material-icons" style="width: 22px;height: 21px;font-size: 20px;text-align: center;display: inline-block;vertical-align: middle;border-radius: 20%;">
          shopping_cart
        </div>
        <div id="history-page" style="display:inline-block;vertical-align:middle;font-size:15px;">
        &nbsp cart
        </div>
       </div>
     </a>
       <br>
       <a href="http://localhost/shriecom/myorder.php">
       <div id="refer-to-my-order" style="font-family:arial;width:100%;height:30px;font-size:13px;padding-left:10px;display:table;white-space:nowrap;">
        <div class="material-icons" style="width: 22px;height: 21px;font-size: 20px;text-align: center;display: inline-block;vertical-align: middle;border-radius: 20%;">
          description
        </div>
        <div id="my-order-page" style="display:inline-block;vertical-align:middle;font-size:15px;">
        &nbsp My orders
        </div>
       </div>
     </a>
     <br>
       <a href="http://localhost/shriecom/shop-owner.php">
       <div id="refer-to-shop-owner" style="font-family:arial;width:100%;height:30px;font-size:13px;padding-left:10px;display:table;white-space:nowrap;">
        <div class="material-icons" style="width: 22px;height: 21px;font-size: 20px;text-align: center;display: inline-block;vertical-align: middle;border-radius: 20%;">
          store
        </div>
        <div id="shop-owner-page" style="display:inline-block;vertical-align:middle;font-size:15px;">
        &nbsp Shop owner
        </div>
       </div>
     </a>
     <br>
     <?php if(!isset($_SESSION['userid'])){?>
     <a href="http://localhost/shriecom/login-form.php">
     <div id="refer-login-page" style="font-family:arial;width:100%;height:30px;font-size:13px;padding-left:10px;display:table;white-space:nowrap;">
      <div class="material-icons" style="width: 22px;height: 21px;font-size: 20px;text-align: center;display: inline-block;vertical-align: middle;border-radius: 20%;">
        login
      </div>
      <div id="login-page" style="display:inline-block;vertical-align:middle;font-size:15px;">
      &nbsp login
      </div>
     </div>
   </a>
  <?php }
  else{?>
    <a href="http://localhost/shriecom/logout.php">
    <div id="refer-login-page" style="font-family:arial;width:100%;height:30px;font-size:13px;padding-left:10px;display:table;white-space:nowrap;">
     <div class="material-icons" style="width: 22px;height: 21px;font-size: 20px;text-align: center;display: inline-block;vertical-align: middle;border-radius: 20%;">
       logout
     </div>
     <div id="login-page" style="display:inline-block;vertical-align:middle;font-size:15px;">
     &nbsp logout
     </div>
    </div>
  </a>
  <?php }?>
   <br>
       <a href="http://localhost/shriecom/contact-us.php">
       <div id="refer-to-customer-order" style="font-family:arial;width:100%;height:30px;font-size:13px;padding-left:10px;display:table;white-space:nowrap;">
        <div class="material-icons" style="width: 22px;height: 21px;font-size: 20px;text-align: center;display: inline-block;vertical-align: middle;border-radius: 20%;">
          contact_page
        </div>
        <div id="customer-order-page" style="display:inline-block;vertical-align:middle;font-size:15px;">
        &nbsp Contact us
        </div>
       </div>
     </a>
       <br>
       <hr>
      </div>


      <br><br>
      <div id="payment-option-body" style="font-family:Arial;text-align:center;width: 95%;font-size:21px;margin: auto;box-shadow: 0px 1px 2px 0px rgba(60,64,67,0.3), 0px 1px 3px 1px rgba(60,64,67,0.15);border-radius: 6px;">
        <br>Methods of payment
      <br><br>
        <div id="payment-options">
          <div id="cash-on-delivery" style="font-size:large;">
            cash on delivery
          </div>
          <div id="or-text">
            or
          </div>
          <div id="online-pay-on-delivery" style="font-size:large;">
            pay online on delivery
        </div>
      </div>
      <br><br>

<script>
<?php if(isset($_GET['itemid'])){?>
function confirm_order(){

 itemid="<?php echo $_GET['itemid'];?>";
 itemquantity=<?php echo $_GET['itemquantity'];?>;
 $.ajax({
   type:'POST',
   url:'ajax_backend.php',
   data:{'confirm_order':'confirm_order','itemid':itemid,'itemquantity':itemquantity},

   success:function(data,textStatus){
    if(data==1){
      window.location="http://localhost/shriecom/myorder.php";
      //$("#loading-image-body").hide();

    }
    else{
      console.log(data)
      //$("#loading-image-body").hide();

    }
   }


   })

   return false;

}
<?php } ?>

<?php if(isset($_GET['cartitem'])){?>
function confirm_order(){

 $.ajax({
   type:'POST',
   url:'ajax_backend.php',
   data:{'confirm_cart_order':'confirm_order'},

   success:function(data,textStatus){
    if(data==1){
      window.location="http://localhost/shriecom/myorder.php";
      //$("#loading-image-body").hide();

    }
    else{
      console.log(data)
      //$("#loading-image-body").hide();

    }
   }


   })

   return false;

}
<?php } ?>
</script>

      <div id="confirm-payment-button">
        <button onclick="confirm_order()" style="border: 0;outline:none;box-shadow: none;font-family:Arial;text-transform: none;border-radius: 4px;background-color:#1a73e8;color:white;width:80%;height:30px;font-size:17px;">
          confirm
        </button>
      </div>
      <br><br>
    </div>


        </body>

        </html>
