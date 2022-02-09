<?php

$page_url=$_SERVER['REQUEST_URI'];
$shopid=basename($page_url);
$con=new mysqli("localhost","root","","withmerce");
$select_table=mysqli_query($con,"select * from shopinfo where id='$shopid' ");
$fetchdata=mysqli_fetch_array($select_table);
if(mysqli_num_rows($select_table)==0){
  header("location:http://localhost/unname");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no " >
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  </head>
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

  background: #4899ec;
    color: white;
}
#company-name-body{
      max-height: 38px;
      margin-top: 8px;
      text-align: center;
      font-size: 18px;
      overflow: hidden;
      font-family: arial;

}
#user-login-status{
  width:15%;
  height:100%;
  font-size: 16px;
  text-align: right;
  vertical-align:middle;
  display: table-cell;

}
#menu-button{
  width:15%;
  height: 100%;

  display: table-cell;
  vertical-align: middle;
}
#cart-button{
  width:15%;
  height: 100%;
  position: relative;
  display: table-cell;
  vertical-align: middle;
  user-select: none;
}
#header-body{
  width:100%;
  height:100%;
  display: table;
}
#body-container{

  position:relative;
}
#menu-body{
  width:0%;
  overflow:hidden;
  display: none;
  background-color: white;
  position:absolute;
  top:0;
  z-index: 2;
  border:2px solid black;
}
#cart-items-number{
  font-size: 14px;
      margin-top: 5px;
      float: left;
      position: absolute;
      left: 1px;
      text-align: center;
      top: 13px;
      font-family: arial;
      font-weight: 600;
      color: black;
      width: 30px;
}
</style>
<script>
$(document).ready(function(){
  windowHeight=screen.height;
$("#menu-body").css('height',windowHeight);
  $("#menu-btn").click(function(){
    $("#menu-body").show();
    $("#body-container").css("overflow","hidden");
    $("#menu-body").animate({width:'100%',height:windowHeight});


  })
  $("#close-icon-button").click(function(){
    $("#menu-body").animate({width:'0%',height:'0%'},function(){
      $("#menu-body").hide();
          $("#body-container").css("overflow","auto");
$("#menu-body").css('height',windowHeight);
    });




  })
})
</script>
  <body id="body-container">

      <div  id="header-container" class="">
        <header id="header-body">
          <div id="menu-button" >
            <div id="menu-btn" class="material-icons" style="font-size:30px;margin:auto;opacity:0.9;">
            menu
          </div>

          </div>

          <div id="company-name-body">
              <?php echo $fetchdata['shopname']; ?>

          </div>

          <div id="cart-button" >
            <div id="cart-block">
            <div id="cart-btn" class="material-icons" style="font-size:30px;float:left;opacity:0.9;">
            	shopping_cart
          </div>
          <div id="cart-items-number" >
            0
          </div>
        </div>

          </div>

<!--
          <div id="user-login-status" class="">
            <div class="" id="unregistered-user" style="margin-right:10px;">
              Login
            </div>
            <div class="" style="display:none;" id="registered-user" style="margin-right:10px;">
              username
            </div>
          </div>

-->

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

         <div id="refer-to-shopid" style="font-family:arial;width:100%;height:30px;font-size:13px;padding-left:10px;display:table;white-space:nowrap;">
          <div  style="height: 21px;font-size:15px;text-align: center;display: inline-block;vertical-align: middle;border-radius: 20%;">
            shop id :
          </div>
          <div id="history-page" style="display:inline-block;vertical-align:middle;font-size:15px;height:21px;font-weight:600;">
            &nbsp<?php echo $fetchdata['id'];?>
          </div>
         </div>


         <div id="refer-to-shopownername" style="font-family:arial;width:100%;height:30px;font-size:13px;padding-left:10px;display:table;white-space:nowrap;">
          <div  style="height: 21px;font-size:15px;text-align: center;display: inline-block;vertical-align: middle;border-radius: 20%;">
            owner :
          </div>
          <div id="history-page" style="display:inline-block;vertical-align:middle;font-size:15px;height:21px;">
            &nbsp<?php echo $fetchdata['shopownername'];?>
          </div>
         </div>

         <div id="refer-to-shopid" style="font-family:arial;width:100%;height:30px;font-size:13px;padding-left:10px;display:table;white-space:nowrap;">
          <div  style="width:fit-content;white-space: normal;float:left;height: 21px;font-size:15px;text-align: center;display: inline-block;vertical-align: middle;border-radius: 20%;">
            address :
          </div>
          <div id="history-page" style="width: 75%;display: inline-block;vertical-align: middle;font-size: 15px;max-height: 69px;overflow: hidden;white-space: normal;">
            &nbsp<?php echo $fetchdata['shopaddress'];?>
          </div>
         </div>



       <br>

         <a href="http://localhost/unname/">
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


       <a href="http://localhost/unname/cart.php">
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
       <a href="http://localhost/unname/my-order.php">
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
       <a href="http://localhost/unname/shop-owner.php">
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
     <a href="http://localhost/unname/login-form.php">
     <div id="refer-login-page" style="font-family:arial;width:100%;height:30px;font-size:13px;padding-left:10px;display:table;white-space:nowrap;">
      <div class="material-icons" style="width: 22px;height: 21px;font-size: 20px;text-align: center;display: inline-block;vertical-align: middle;border-radius: 20%;">
        login
      </div>
      <div id="login-page" style="display:inline-block;vertical-align:middle;font-size:15px;">
      &nbsp login
      </div>
     </div>
   </a>
   <br>
       <a href="http://localhost/unname/contact-us.php">
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
      <style>
      #main-body{
        width:100%;
        height:auto;


      }
      #shop-image-body{
        width:100%;
        height:170px;
        position: relative;
      }
      #shop-image{
        position:absolute;
        width:100%;
        height:160px;
        margin:auto;
        top:5px;left: 0;right: 0;
      }
        </style>
      <div id="main-body">
        <div id="shop-image-body">
          <div id="shop-image">
            <img src="../photos/<?php echo $fetchdata['shopimg']; ?>" alt="shop-image" id="shop-img" style="width:100%;height:160px;object-fit:cover;">
          </div>
        </div>
        <style>
        #search-body{
          width:100%;
          height:40px;
        }
        #search-box{
          width:90%;
          margin:auto;
          height:100%;

        }
        #search-input{
          width:100%;
          height:100%;
          border-radius: 10px;
          outline:none;
          border:1px solid black;
        }
        </style>
        <div id="search-body">
          <div id="search-box">
            <input type="search" name="search-box" id="search-input" placeholder="search item here...">
          </div>
        </div>

<style>

#shops-data-body{
  width:50%;
      height: 170px;
      float: left;
      margin-top: 10px;


}
#shops-data{
  width: 90%;
  height: 100%;
  margin-left: auto;
  margin-right: auto;
  box-shadow: 0px 1px 2px 0px rgba(60,64,67,0.3), 0px 1px 3px 1px rgba(60,64,67,0.15);;
}




#shop-img{
  width:110px;
  height: 110px;
  margin: auto;
  position:relative;
}
#item-name{
  text-align: center;
  font-family: arial;
  font-size: 12px;
  max-height: 34px;
  overflow: hidden;
  margin-top: 10px;
  line-height: 16px;
  text-overflow: ellipsis;
white-space: nowrap;
}
#item-price{
  text-align: center;
      font-family: arial;
      font-size: 12px;
      max-height: 28px;
      overflow: hidden;
      font-weight: bold;
      line-height: 28px;
}
#item-image{
  max-width: 100%;
    max-height: 100%;
    position: absolute;
    left: 0;
    right: 0;
    margin: auto;
}
#shop-item-body-block{
  width:100%;
  height:auto;

  margin:auto;

}
a{
  -webkit-tap-highlight-color:transparent;
  text-decoration: none;
  color:black;
}


</style>
     <div id="shop-item-body-block">
       <?php
       $con=new mysqli("localhost","root","","withmerce");
       $selectshopitem=mysqli_query($con,"select * from shopitem where shopid=$shopid ");
        ?>
        <?php
        while($fetchitemdata=mysqli_fetch_array($selectshopitem)){
        ?>
        <a href="http://localhost/unname/<?php echo $shopid.'/'.$fetchitemdata['itemurl'];?>">
        <div id="shops-data-body">
          <div class="" id="shops-data">

            <div class="" id="shop-img" >

              <img src="../photos/<?php echo $fetchitemdata['itemimg'];?>"  id="item-image" >
            </div>

            <div class="" id="item-name">
             <?php echo $fetchitemdata['itemname'];?>

            </div>

            <div class="" id="item-price">
              <?php echo $fetchitemdata['itemprice'];?>

            </div>


          </div>
        </div>
      </a>
      <?php }?>


      </div>

      </div>
      </body>
      <html>
