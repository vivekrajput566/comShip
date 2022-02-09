<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no" >
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  </head>

  <?php
  session_start();
  if(isset($_SESSION['userid'])){
  $phonenumber=$_SESSION['userid'];
  $dirname=dirname($_SERVER['REQUEST_URI']);
  $shopid=basename($dirname);
  $itemnameurl=basename($_SERVER['REQUEST_URI']);
  $con=new mysqli("localhost","root","","shriecom");
  $selectdata=mysqli_query($con,"select * from shopitem where itemurl='$itemnameurl'");
  $fetchdata=mysqli_fetch_array($selectdata);
  if(mysqli_num_rows($selectdata)==0){
    $selectdata->close();
    header("location:http://localhost/greendizen");
    exit();
  }
  $itemname=pathinfo($itemnameurl,PATHINFO_FILENAME);
  $itemname=str_replace("-"," ",$itemname);
  //$selectitemdata=mysqli_query($con,"select * from shopitem where ='$itemname' ");
  $iteminfofetch=$fetchdata;
  $itemuniqueid=$iteminfofetch['uniqueid'];
  $selectnoofitemincarttable=mysqli_query($con,"select * from shoppingcart where $phonenumber=$phonenumber ");
  $noofitemsincart=mysqli_num_rows($selectnoofitemincarttable);
  $selectcarttable=mysqli_query($con,"select * from shoppingcart where uniqueid='$itemuniqueid' and $phonenumber=$phonenumber ");
  $itemspresentincart=mysqli_num_rows($selectcarttable);

    }
    else{
      $dirname=dirname($_SERVER['REQUEST_URI']);
      $shopid=basename($dirname);
      $itemnameurl=basename($_SERVER['REQUEST_URI']);
      $con=new mysqli("localhost","root","","shriecom");
      $selectdata=mysqli_query($con,"select * from shopitem where itemurl='$itemnameurl'");
      $fetchdata=mysqli_fetch_array($selectdata);
      if(mysqli_num_rows($selectdata)==0){
        $selectdata->close();
        header("location:http://localhost/greendizen");
        exit();
      }
      $iteminfofetch=$fetchdata;
      $itemuniqueid=$fetchdata['uniqueid'];
    }

  ?>

  <style>

  body{
    margin:0;
  }
  *{
    box-sizing: border-box;
  }
  #header-container{
    width:100%;
    height:60px;

    background: #2db333;
      color: white;
  }
  #company-name-body{
        max-height: 38px;
        margin-top: 15px;
        margin-left:14px;
        font-size: 25px;
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
  a{
    -webkit-highlight-tap-color:transparent;
    text-decoration:none;
    color:white;


  }
  </style>
  </style>
  <body id="body-container" style="width:100%;">
    <div  id="header-container" class="">
      <header id="header-body">
        <div id="menu-button" >
          <a href="http://localhost/greendizen/<?php echo $shopid;?>"><div id="menu-btn" class="material-icons" style="font-size:25px;margin:auto;opacity:0.9;">
          arrow_back
        </div></a>

        </div>

        <div id="company-name-body">
            GreenDizen

        </div>

        <div id="cart-button" >
          <div id="cart-block">
            <a href="http://localhost/greendizen/cart.php">
          <div id="cart-btn" class="material-icons" style="font-size:30px;float:left;opacity:0.9;">
            shopping_cart
        </div>

        <div id="cart-items-number" >

          <?php
          if(isset($_SESSION['userid'])){
          echo $noofitemsincart;
        }
          ?>
        </div>
        </a>
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
    <style>
    #main-body{
      width:100%;
      height: auto;
      overflow: auto;
      margin: auto;
    }


    </style>
    <div id="main-body">


<style>
      #item-details-body{
        width: 95%;
    height: auto;

    padding-bottom: 10px;
    margin: auto;
    border-radius: 10px;

      }
      #item-image-body{
        width:100%;
        height:170px;
        padding-top: 10px;

      }
      #item-image-box{
        width:160px;
        height: 160px;
        position: relative;
        margin: auto;



      }
      #item-image{
        max-width: 100%;
        max-height: 100%;
        position: absolute;
        left:0;
        right:0;
        margin:auto;
      }
      #item-image-block{
        width:50%;
        height:170px;
        float:left;

      }
      #item-pricing-block{
        width:100%;
        height:80px;
        padding:15px;
        text-align: center;
      }
      #item-price-box{
        width: 50%;
        height: 50px;
        font-size: 25px;
        font-family: arial;
        float: left;
        text-align: left;
      }
      #price-quantity-selector{
        width:50%;
        height: 50px;
        float:left;
      }
      #price-quantity-decrease-box{
        width:20px;
        height:20px;
        float:left;

      }
      #price-quantity-decrease{
        font-size: 18px;
        border-radius: 5px;
        border:1px solid black;
        cursor: pointer;
        user-select: none;
        -webkit-tap-highlight-color:transparent;
      }

      #price-quantity-show-box{
        padding-right: 5px;
        padding-left: 5px;
        height:20px;
                float:left;
      }
      #price-quantity-show{
        font-size: 15px;
        font-family: arial;
        cursor: pointer;
       user-select: none;


      }
      #price-quantity-increase-box{
        width:20px;
        height:20px;
                float:left;
      }
      #price-quantity-increase{
        font-size:18px;
        border:1px solid black;
        border-radius: 5px;
        user-select: none;
        cursor: pointer;
        -webkit-tap-highlight-color:transparent;
      }
      #item-name-and-description{
        padding-left: 15px;
      }
      #item-name{
        font-size: 18px;
        font-family: arial;
        line-height: 35px;
      }
      #item-description{
        font-size:12px;
        font-family: arial;
      }


</style>
<script>
$(document).ready(function(){
  itemPrice=<?php echo$iteminfofetch['itemprice'];?>;
  originalPrice=<?php echo$iteminfofetch['itemprice'];?>;
  quantity=1;
  <?php
 if(isset($_SESSION['userid'])){
  ?>
  itemspresentincart=<?php echo $noofitemsincart; ?>;
  isitempresentincart=<?php echo $itemspresentincart;?>;
  <?php }
  else{?>
0;
    itemspresentincart=0;
    isitempresentincart=0;

  <?php }?>
  cartclickstatus=0;
  itemid="<?php echo$iteminfofetch['uniqueid'];?>";

  $("#price-quantity-increase").click(function(){

    if(isitempresentincart==1){

    $("#updating-box-show").show();
    $("#updating-show-text").text("updating..");
    }

    itemPrice=originalPrice+itemPrice;
    showPrice=itemPrice;
    quantity=quantity+1;
    $("#buynowlink").attr("href",`http://localhost/greendizen/checkout.php?itemid=<?php echo $iteminfofetch['uniqueid'];?>&itemquantity=${quantity}`)
    showQuantity="Qty "+quantity;
    showPrice="₹"+showPrice;
    $("#item-price-box").text(showPrice);
    $("#price-quantity-show").text(showQuantity)

    $.ajax({
      type:'post',
      url:'../ajax_backend.php',
      data:{'itemid':itemid,'itemquantity':quantity,'update_item_to_cart':'update_item_to_cart'},
      success:function(data,status){
        if(data==1){
          console.log(data);
          isitempresentincart=1;
          $("#updating-box-show").show();
          $("#updating-show-text").text("updated");
          setTimeout(function(){
            $("#updating-show-text").text("");
            $("#updating-box-show").hide();
         },2000);
          $("#add-to-cart-button").hide();
          $("#check-cart-button").show();

        }
        else{
          isitempresentincart=0;
          $("#updating-box-show").hide();
          console.log(data);
        }
      }

    })

  })

  $("#price-quantity-decrease").click(function(){
    if(quantity==1){
      return;
    }
    if(isitempresentincart==1){
    $("#updating-box-show").show();
    $("#updating-show-text").text("updating..");
    }
    itemPrice=itemPrice-originalPrice;
    showPrice=itemPrice;
    quantity=quantity-1;
    $("#buynowlink").attr("href",`http://localhost/greendizen/checkout.php?itemid=<?php echo $iteminfofetch['uniqueid'];?>&itemquantity=${quantity}`)
    showQuantity="Qty " + quantity;
    showPrice="₹"+showPrice;
    $("#item-price-box").text(showPrice);
    $("#price-quantity-show").text(showQuantity)

    $.ajax({
      type:'post',
      url:'../ajax_backend.php',
      data:{'itemid':itemid,'itemquantity':quantity,'update_item_to_cart':'update_item_to_cart'},
      success:function(data,status){
        if(data==1){
          console.log(data);
          itemspresentincart=1;
          $("#updating-box-show").show();
          $("#updating-show-text").text("updated");
          setTimeout(function(){
            $("#updating-show-text").text("");
            $("#updating-box-show").hide();
         },2000);
          $("#add-to-cart-button").hide();
          $("#check-cart-button").show();

        }
        else{
          isitempresentincart=0;
          $("#updating-box-show").hide();
          console.log(data);
        }
      }

    })

  })
  $("#add-to-cart-button").click(function(){
    if(cartclickstatus!=0){
      return false;
    }
    cartclickstatus=1;

    itemid="<?php echo$iteminfofetch['uniqueid'];?>";
    $.ajax({
      type:'post',
      url:'../ajax_backend.php',
      data:{'itemid':itemid,'itemquantity':quantity,'add_item_to_cart':'add_item_to_cart'},
      success:function(data,status){
        if(data==1){
          console.log(data);
          itemspresentincart=itemspresentincart+1;
          $("#add-to-cart-button").hide();
          $("#check-cart-button").show();
          $("#cart-items-number").text(itemspresentincart);
        }
        else{
          console.log(data);
        }
      }

    })


  })
})

</script>
      <div id="item-details-body">
        <div id="item-image-body">
          <div id="item-image-block">
           <div id="item-image-box">
             <img src="../photos/<?php echo $iteminfofetch['itemimg'];?>"  id="item-image"  >
           </div>
          </div>

          <div id="item-image-block">
           <div id="item-image-box">
             <img src="../photos/<?php echo $iteminfofetch['itemsideimg'];?>"  id="item-image"  >
           </div>
          </div>

        </div>
        <hr>

        <div id="item-name-and-description">
         <div id="item-name-box">
           <div id="item-name">
             <?php echo$iteminfofetch['itemname'];?>
           </div>
         </div>
         <div id="item-description-box">
           <div id="item-description">
             <?php echo $iteminfofetch['itemdescription'];?>
           </div>
         </div>
       </div>

       <div id="item-pricing-block">
         <br>

         <div id="item-price-box" >
           ₹<?php echo $iteminfofetch['itemprice'];?>
         </div>

         <div id="price-quantity-selector">
           <div id="price-quantity-selector-box" style="width:fit-content;margin:auto;height:50px;">
           <div id="price-quantity-decrease-box">
             <div id="price-quantity-decrease" class="material-icons">
               remove
             </div>
           </div>
           <div id="price-quantity-show-box">
             <div id="price-quantity-show" >
               Qty 1
             </div>
           </div>
           <div id="price-quantity-increase-box">
             <div id="price-quantity-increase" class="material-icons">
               add
             </div>
           </div>
           <?php if(isset($_SESSION['userid'])){


             ?>

             <div id="updating-box-show" style="display:none;">
               <div id="updating-show-text" style="color:green;">

             </div>
           </div>
             <?php

         }

             ?>
         </div>

          </div>
       </div>
       <div id="add-to-cart-box" style="width:100%;height:35px;">
         <?php if(isset($_SESSION['userid'])){

           if($itemspresentincart==0){
           ?>

         <button  id="add-to-cart-button" style="width:80px;height:35px;background: #4899ec;color: white;border:1px solid black;outline:none;">add to cart</button>


         <div id="check-cart-button" style="display:none;">
           <a href="http://localhost/greendizen/cart.php">
         <button  id="cart-button" style="width:80px;height:35px;background: #4899ec;color: white;border:1px solid black;outline:none;">check cart</button>
          </a>
       </div>
     <?php }
     if($itemspresentincart==1){
     ?>
     <div id="check-cart-buttons" >
       <a href="http://localhost/greendizen/cart.php">
     <button  id="cart-page-button" style="width:80px;height:35px;background: #4899ec;color: white;border:none;border-radius: 5px;outline:none;">check cart</button>
      </a>
    </div>
    <?php }} ?>



       <?php if(!isset($_SESSION['userid'])){

         ?>
         <div id="login-to-check-cart-button">
           <a href="http://localhost/greendizen/login-form.php">
         <button  id="check-cart" style="width:80px;height:35px;background: #4899ec;color: white;border:1px solid black;outline:none;">add to cart</button>
          </a>
       </div>
     <?php }?>
     </div>
       <hr>




       <style>
        #other-website-pricing-body{
          width:100%;
          height:auto;
          overflow-x:scroll;
          white-space: nowrap;

        }
        #other-website-item-price-block{
          width:205px;
          height:205px;
          border:1px solid black;
          margin-left:2px;
          display: inline-block;
          position:relative;
        }
       </style>

       <div id="other-website-pricing-body">
         <p style="line-height:0px;font-family:arial;">price on other websites</p>
         <div id="other-website-item-price-block">
           <div id="amazon-logo" style="width:120px;height:50px;float:left;position: absolute;top: 0;margin: auto;right: 0;left: 0;">
             <img src="../amazon logo.png" style="max-width:100%;max-height:100%;">
           </div>
           <div id="amazon-item-image" style="width:130px;height:130px;float:left;position: absolute;top:40px;margin: auto;right: 0;left: 0;">
             <div id="other-item-image" style="width: 130px;height: 130px;float: left;position: relative;top:0px;margin: auto;right: 0;left: 0;">
             <img src="../photos/<?php echo $iteminfofetch['itemimg'];?>" style="max-width:100%;max-height:100%;position:absolute;top:0;left:0;right:0;bottom:0;margin:auto;">
           </div>
           </div>
           <div id="amazon-item-price" style="float:left;font-family:arial;text-align:center;position: absolute;left:0;margin: auto;right: 0;bottom: 5px;">
             <?php if($iteminfofetch['amazonprice']==0){
               echo "not available";
             }
             else{

              echo "₹".$iteminfofetch['amazonprice'];
               ?>

           <?php } ?>
           </div>
         </div>
         <div id="other-website-item-price-block">
           <div id="flipkart-logo" style="width:120px;height:50px;float:left;position: absolute;top: 0;margin: auto;right: 0;left: 0;">
             <img src="../flipkart logo.png" style="max-width:100%;max-height:100%;">
           </div>
           <div id="flipkart-item-image" style="width:130px;height:130px;float:left;position: absolute;top:40px;margin: auto;right: 0;left: 0;">
             <div id="other-item-image" style="width: 130px;height: 130px;float: left;position: relative;top:0px;margin: auto;right: 0;left: 0;">
             <img src="../photos/<?php echo $iteminfofetch['itemimg'];?>" style="max-width:100%;max-height:100%;position:absolute;top:0;left:0;right:0;bottom:0;margin:auto;">
           </div>
         </div>
           <div id="flipkart-item-price" style="float:left;font-family:arial;text-align:center;position: absolute;left:0;margin: auto;right: 0;bottom: 5px;">
             <?php if($iteminfofetch['flipkartprice']==0){
               echo "not available";
             }
             else{

              echo "₹".$iteminfofetch['flipkartprice'];
               ?>

           <?php } ?>
           </div>
         </div>
         <div id="other-website-item-price-block">
           <div id="flipkart-logo" style="width:120px;height:50px;text-align:center;font-family: arial;float:left;position: absolute;top: 0;margin: auto;right: 0;left: 0;">
             other website
           </div>
           <div id="other-item-image" style="width:130px;height:130px;float:left;position: absolute;top:40px;margin: auto;right: 0;left: 0;">
             <div id="other-item-image" style="width: 130px;height: 130px;float: left;position: relative;top:0px;margin: auto;right: 0;left: 0;">
             <img src="../photos/<?php echo $iteminfofetch['itemimg'];?>" style="max-width:100%;max-height:100%;position:absolute;top:0;left:0;right:0;bottom:0;margin:auto;">
           </div>
         </div>
           <div id="other-item-price" style="float:left;font-family:arial;text-align:center;position: absolute;left:0;margin: auto;right: 0;bottom: 5px;">
             <?php if($iteminfofetch['otherwebsiteprice']==0){
               echo "not available";
             }
             else{

              echo "₹".$iteminfofetch['otherwebsiteprice'];
               ?>

           <?php } ?>
           </div>
         </div>



       </div>

       <style>
       #item-rating-and-reviews{
         width:100%;
         height: auto;
         padding:15px;

       }
       #item-rating-block{
         width:100%;
         height:40px;
       }
       #item-rating-text{
         width:50%;
         height:100%;
         float:left;
         font-family: arial;
       }
       #item-rating-number{
         width:50%;
         height:100%;
         float:left;
        font-family: arial;
       }
       #item-reviews-block{
         width:100%;
         height: auto;
       }
       #item-review-text{
         width:100%;
         height:30px;
         font-family: arial;

       }
       #enter-item-reviews{
         width:100%;
         height: 50px;
       }
       #item-reviews-message{
         font-family: arial;
       }
       </style>
       <div id="item-rating-and-reviews">
         <div id="item-rating-block">
           <div id="item-rating-text">
             Ratings
           </div>
           <div id="item-rating-number">
             no ratings yet

           </div>
         </div>
         <div id="item-reviews-block">
           <div id="item-review-text">
             Reviews
           </div>
           <div id="enter-item-reviews">
             <input type="text" style="width:100%;height:40px;border:1px solid black;border-radius:6px;font-family: arial;" placeholder="give reviews here...">
           </div>
           <div id="item-reviews-message">
             no reviews yet
           </div>
         </div>
       </div>


     </div><br><br><br>
</div>

<style>
    #checkout-item-body{
      width:100%;
      height:50px;
      position: fixed;
      bottom:0;
      background: black;
      border-top:1px solid black;
      border-bottom:1px solid black;
      display: table;
    }
    #checkout-item{
      width:60%;
      height:50px;
      color:white;
      margin:auto;
      text-align: center;
      font-size:20px;
      font-family: arial;
      display: table-cell;
      vertical-align: middle;
    }
</style>
<script>
$(document).ready(function(){

})
</script>
<a id="buynowlink"href="http://localhost/greendizen/checkout.php?itemid=<?php echo $iteminfofetch['uniqueid'];?>&itemquantity=1">
    <div id="checkout-item-body">

      <div id="checkout-item" >
       BUY NOW
      </div>

    </div>
</a>
  </body>
</html>
