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
  $phonenumber=$_SESSION['userid'];

  $con=new mysqli("localhost","root","","shriecom");
  $selectnoofitemincarttable=mysqli_query($con,"select * from shoppingcart where phonenumber='$phonenumber' ");
  $noofitemsincart=mysqli_num_rows($selectnoofitemincarttable);



    $selectshoppingcart=mysqli_query($con,"select uniqueid,quantity from shoppingcart where phonenumber='$phonenumber' ");
    $itemsincart=mysqli_num_rows($selectshoppingcart);


?>
  <style>

   * {

 box-sizing:border-box;

   }
   body{
     margin: 0;
   }
   #header-container{
    width:100%;
    height:60px;
    background: #2db333;
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
    width:30%;
    height:100%;
    display: table-cell;
    vertical-align: middle;
   }
   #menu-button{
    width:15%;
    height: 100%;

    display: table-cell;
    vertical-align: middle;
   }
   #header-body{
    width:100%;
    height:100%;
    display: table;
   }
   #body-container{
     position: relative;

   }
   a{
     text-decoration:none;
     color:black;
     -webkit-tap-highlight-color:transparent;

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

   #cart-button{
     width:15%;
     height: 100%;
     position: relative;
     display: table-cell;
     vertical-align: middle;
     user-select: none;
   }

  </style>
  <body id="body-container" style="width:100%;">
    <div id="header-container">
      <header id="header-body">
        <div id="menu-button" >
          <a href="javascript:void(0)">
          <div id="menu-btn" class="material-icons" style="font-size:25px;margin:auto;color:white;opacity:0.9">
          arrow_back
        </div>
      </a>

        </div>

        <div id="company-name-body">
          your cart items

        </div>

        <div id="cart-button" >
          <div id="cart-block">
          <div id="cart-btn" class="material-icons" style="font-size:30px;float:left;opacity:0.9;">
            shopping_cart
        </div>
        <div id="cart-items-number" >
          <?php echo $noofitemsincart;?>
        </div>
      </div>

        </div>

        <!--

        <div id="user-login-status" class="">
          <div class="" id="unregistered-user" style="text-align:right;margin-right:10px;">
            Login
          </div>
          <div class="" style="display:none;" id="registered-user">
            username
          </div>
        </div>
      -->

      </header>
    </div>
    <style>
    #main-body{
      width:99%;
      height: auto;
      overflow: auto;
      margin: auto;
    }


    </style>
    <div id="main-body">
      <br>

<style>
      #item-details-body{
        width: 95%;
    height: auto;

    padding-bottom: 10px;
    margin: auto;
    border-radius: 10px;
    margin-top:10px;
    box-shadow: 0px 1px 2px 0px rgba(60,64,67,0.3), 0px 1px 3px 1px rgba(60,64,67,0.15);
      }
      #item-image-and-pricing{
        width:100%;
        height:140px;


      }
      #item-image-box{
        width:120px;
        height: 120px;
        position: relative;
        margin-left:10px;


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
        height:120px;
        float:left;

      }
      #item-pricing-block{
        width:50%;
        height:120px;
        float:left;
        text-align: center;
      }
      #item-price-box{
        text-align:center;
      }
      #price-quantity-selector{
        width:100%;
        height: 50px;
      }
      #price-quantity-decrease-box{
        width:20px;
        height:20px;
        float:left;

      }
      #price_quantity_decrease{
        font-size: 18px;
        border-radius: 5px;
        border:1px solid black;
        cursor: pointer;
        user-select: none;
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


      }
      #price-quantity-increase-box{
        width:20px;
        height:20px;
                float:left;
      }
      #price_quantity_increase{
        font-size:18px;
        border:1px solid black;
        border-radius: 5px;
        cursor:pointer;
        user-select: none;
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
      <div style="text-align:center;font-size:15px;font-family:arial; display:none;" id="no-items-in-cart">no items in cart</div>
      <?php

      if($itemsincart==0){
        echo "<div style='text-align:center;font-size:15px;font-family:arial;'>no items in cart</div>";
      }



      $i=0;
      $itemprice=0;
      while($shoppingcartinfo=mysqli_fetch_array($selectshoppingcart)){
        $i=$i+1;

        $itemuniqueid=$shoppingcartinfo['uniqueid'];

        $selectshopitemtable=mysqli_query($con,"select * from shopitem where uniqueid='$itemuniqueid' ");

        $cartiteminfo=mysqli_fetch_array($selectshopitemtable);
        $itemprice=$itemprice+$cartiteminfo['itemprice']*$shoppingcartinfo['quantity'];

      ?>
    <!--  <a href="http://localhost/shriecom/<?php echo $cartiteminfo['shopid'].'/'.$cartiteminfo['itemurl'];?>"> -->
    <div id="item-details-body" class="item-details-body-class<?php echo $i;?>">
      <div id="delete-item-box" style="width:97%;text-align:right">
        <div id="delete-item" onclick="removeitem('.item-details-body-class<?php echo $i;?>','<?php echo $itemuniqueid;?>','#quantity<?php echo $i;?>',<?php echo $cartiteminfo['itemprice'];?>)" class="material-icons" style="width:20px;height:20px;font-size:18px;font-weight:800;cursor:pointer;user-select:none;">
          close
        </div>
      </div>
      <div id="item-image-and-pricing">
        <div id="item-image-block">
         <div id="item-image-box">
           <img src="photos/<?php echo $cartiteminfo['itemimg'];?>"  id="item-image"  >
         </div>
        </div>
        <div id="item-pricing-block">
          <br>
          <input type="hidden" id="itemPrice<?php echo$i;?>" value="<?php echo $cartiteminfo['itemprice']*$shoppingcartinfo['quantity'];?>">
          <div id="item-price-box<?php echo $i;?>">
            <?php echo $cartiteminfo['itemprice']*$shoppingcartinfo['quantity'];?>
          </div>
          <br>
          <div id="price-quantity-selector">
            <div id="price-quantity-selector-box" style="width:fit-content;margin:auto;height:50px;">
            <div id="price-quantity-decrease-box">
              <div id="price_quantity_decrease" onclick="price_quantity_decrease('#item-price-box<?php echo $i;?>',<?php echo $cartiteminfo['itemprice'];?>,'<?php echo $itemuniqueid;?>','#quantity<?php echo $i;?>','#itemPrice<?php echo$i;?>','#price-quantity-show<?php echo$i;?>')" class="material-icons">
                remove
              </div>
            </div>
            <div id="price-quantity-show-box">
              <input type="hidden" id="quantity<?php echo$i;?>" value="<?php echo$shoppingcartinfo['quantity'];?>">
              <div id="price-quantity-show<?php echo $i;?>">
                Qty <?php echo $shoppingcartinfo['quantity'];?>
              </div>
            </div>
            <div id="price-quantity-increase-box">
              <div id="price_quantity_increase" onclick="price_quantity_increase('#item-price-box<?php echo $i;?>',<?php echo $cartiteminfo['itemprice'];?>,'<?php echo $itemuniqueid;?>','#quantity<?php echo $i;?>','#itemPrice<?php echo$i;?>','#price-quantity-show<?php echo$i;?>')" class="material-icons">
                add
              </div>
            </div>
          </div>

           </div>
        </div>
      </div>

      <div id="item-name-and-description">
       <div id="item-name-box">
         <div id="item-name">
           <?php echo $cartiteminfo['itemname'];?>
         </div>
       </div>
       <div id="item-description-box">
         <div id="item-description">
           <?php echo $cartiteminfo['itemdescription'];?>
         </div>
       </div>
     </div>


    </div>
  <!--  </a> -->

  <?php } ?>





  <script>



      totalamount=<?php echo$itemprice?>;
      originalPrice=<?php echo$itemprice?>;

      itemspresentincart=<?php echo $noofitemsincart; ?>;

      function price_quantity_increase(itempricebox,originalPrice,itemuniqueid,quantityid,itemPriceid,quantityshow){

        quantity=$(quantityid).val();
        quantity=parseInt(quantity);
        itemPrice=$(itemPriceid).val();
        itemPrice=parseInt(itemPrice);
        itemPrice=originalPrice+itemPrice;
        $(itemPriceid).val(itemPrice);
        showPrice=itemPrice;
        quantity=quantity+1;
        $(quantityid).val(quantity);
        totalamount=totalamount+originalPrice;
        $("#item-price-number").text(totalamount);
        $("#item-total-price-number").text(totalamount);
        showQuantity="Qty "+quantity;
        $(itempricebox).text(showPrice);
        $(quantityshow).text(showQuantity)

        $.ajax({
          type:'post',
          url:'ajax_backend.php',
          data:{'quantity_change':'quantity_change','quantity':quantity,'uniqueid':itemuniqueid},
          success:function(data,status){
            if(data==1){
              console.log(data);
            }
            else{
              console.log(data);
            }
          }


        })
      }
      itemsincart=<?php echo $itemsincart; ?>;
      function removeitem(divid,itemuniqueid,quantityid,originalPrice){
        quantity=$(quantityid).val();
        quantity=parseInt(quantity);
        totalamount=totalamount-(quantity*originalPrice);

        $("#item-price-number").text(totalamount);
        $("#item-total-price-number").text(totalamount);

        $(divid).remove(divid);

        $.ajax({
          type:'post',
          url:'ajax_backend.php',
          data:{'removeitem':'removeitem','uniqueid':itemuniqueid},
          success:function(data,status){
            itemsincart=itemsincart-1
            if(itemsincart==0){
              console.log("okgg")
              $("#no-items-in-cart").show();
            }
            $("#cart-items-number").text(itemsincart)
            if(data==1){


            }
            else{
              console.log(data);
            }
          }


        })

      }
      function price_quantity_decrease(itempricebox,originalPrice,itemuniqueid,quantityid,itemPriceid,quantityshow){
        quantity=$(quantityid).val();
        itemPrice=$(itemPriceid).val();
        itemPrice=parseInt(itemPrice);
        quantity=parseInt(quantity);
        if(quantity==1){
          return;
        }
        itemPrice=$(itemPriceid).val();
        itemPrice=itemPrice-originalPrice;
        totalamount=totalamount-originalPrice;
        $("#item-price-number").text(totalamount);
        $("#item-total-price-number").text(totalamount);
        $(itemPriceid).val(itemPrice);
        showPrice=itemPrice;
        quantity=quantity-1;
        $(quantityid).val(quantity);
        showQuantity="Qty " + quantity;
        $(itempricebox).text(showPrice);
        $(quantityshow).text(showQuantity)

        $.ajax({
          type:'post',
          url:'ajax_backend.php',
          data:{'quantity_change':'quantity_change','quantity':quantity,'uniqueid':itemuniqueid},
          success:function(data,status){
            if(data==1){
              console.log(data);
            }
            else{
              console.log(data);
            }
          }


        })
      }

  </script>




<br><br><br>
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
      font-size:30px;
      font-family: arial;
      display: table-cell;
      vertical-align: middle;
    }
    </style>
    <?php
    if($itemsincart!=0){
    ?>
    <a href="http://localhost/shriecom/checkout.php?cartitem">
    <div id="checkout-item-body">
      <div id="checkout-item">
        checkout
      </div>
    </div>
  </a>
  <?php }?>


  </body>
</html>
