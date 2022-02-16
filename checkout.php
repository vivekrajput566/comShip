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
  if(!isset($_GET['itemid']) && !isset($_GET['cartitem'])){
    header("location:http://localhost/shriecom/shopping.php");
    exit();
  }
  session_start();
  if(!isset($_SESSION['userid'])){
    header("location:http://localhost/shriecom/login-form.php?delivery-charges=delivery-charges");
    exit();
  }
  if(!isset($_SESSION['ecom-customer-delivery-details'])){
    header('location:http://localhost/shriecom/ecom-customer-delivery-details.php?itemid='.$_GET['itemid'].'&itemquantity='.$_GET['itemquantity']);
    exit();
  }
  $phonenumber=$_SESSION['userid'];
  $con=new mysqli("localhost","root","","shriecom");
  $selectnoofitemincarttable=mysqli_query($con,"select * from shoppingcart where phonenumber=$phonenumber ");
  $noofitemsincart=mysqli_num_rows($selectnoofitemincarttable);
  $selectuserdata=mysqli_query($con,"select * from ecom_customer_delivery_details where customerid=$phonenumber ");
  $userdata=mysqli_fetch_array($selectuserdata);
  $username=$userdata['username'];
  $useraddress=$userdata['address'];
  $userphoneno=$userdata['phonenumber'];
  $userpincode=$userdata['pincode'];

  if(isset($_GET['itemid'])){
    if(empty($_GET['itemid']) || empty($_GET['itemquantity'])){
      header("location:http://localhost/shriecom");
      exit();
    }
    if($_GET['itemquantity']<1 || !is_numeric($_GET['itemquantity'])){
      $itemquantity=1;
    }
    else{
        $itemquantity=$_GET['itemquantity'];
    }
    $uniqueid=$_GET['itemid'];

    $selectshopitem=mysqli_query($con,"select * from shopitem where uniqueid='$uniqueid'");
    if(mysqli_num_rows($selectshopitem)==0){
      header("location:http://localhost/shriecom");
      exit();
    }
    //$noofitemsincart=mysqli_num_rows($selectshopitem);
    $iteminfofetch=mysqli_fetch_array($selectshopitem);
    $itemname=$iteminfofetch['itemname'];
    $itemdescription=$iteminfofetch['itemdescription'];
    $itemprice=$iteminfofetch['itemprice']*$itemquantity;
    $shopid=$iteminfofetch['shopid'];
    $itemimg=$iteminfofetch['itemimg'];

  //  $selectshopinfo=mysqli_query($con,"select * from shopinfo where id=$shopid");
  //  $shopinfofetch=mysqli_fetch_array($selectshopinfo);
  //  $shopname=$shopinfofetch['shopname'];

  }

  if(isset($_GET['cartitem'])){
    $selectshoppingcart=mysqli_query($con,"select uniqueid,quantity from shoppingcart where phonenumber='$phonenumber' ");

  }
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
     width: 50%;
height: 100%;
display: table-cell;
vertical-align: middle;
font-size: 25px;
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
     color:white;
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
    <div  id="header-container" class="">
      <header id="header-body" style="background:#0d6efd;">
        <div id="menu-button" >
          <a href="http://localhost/shriecom/<?php echo $shopid;?>"><div id="menu-btn" class="material-icons" style="font-size:25px;margin:auto;opacity:0.9;">
          arrow_back
        </div></a>

        </div>

        <div id="company-name-body" style="text-align:center;">
            ShriEcom

        </div>

        <div id="cart-button" >
          <div id="cart-block">
            <a href="http://localhost/shriecom/cart.php">
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
    #delivery-popup-box{
      position: fixed;
      width:95%;
      top:0;
      left:0;
      right:0;
      bottom:0;
      margin: auto;
      height:300px;
      overflow:auto;
      border:0.5px solid #837979;
      border-radius: 15px;
      background: white;
      z-index: 1;
      display: none;
    }
    #popup-for-nearest-metro-station{
      position:absolute;
      width:90%;
      height:100px;
      top:60px;
      right:0;
      left:0;
      margin:auto;
    }

    #popup-for-selected-metro-stations{
      position:absolute;
      width:90%;
      height:100px;
      top:60px;
      right:0;
      left:0;
      margin:auto;
    }

    #input-for-delivery{
      width: 80%;
    height: 50px;
    border-radius: 15px;
    border: 1px solid black;
    outline: none;
    position: absolute;
    left: 0;
    left: 0;
    right: 0;
    font-size: 15px;
    top: 0;
    /* bottom: 0; */
    margin: auto;
    }
    #submit-metro-station{
      position:absolute;
      width:90%;
      height:100px;
      top:65px;
      right:0;
      left:0;
      margin:auto;
    }
    #select-metro-station{
      width: 80%;
    height: 50px;
    border-radius: 15px;
    border: 1px solid black;
    outline: none;
    position: absolute;
    left: 0;
    left: 0;
    right: 0;
    font-size: 15px;
    top: 0;
    /* bottom: 0; */
    margin: auto;
    }
    </style>

    <script>
    $(document).ready(function(){

      $("#remove-button").click(function(){
        $("#delivery-popup-box").css("display","none");
        $("#popup-for-nearest-metro-station").css("display","none");

        $("#popup-for-selected-metro-stations").css("display","none");
        $("#homedeliverycheckbox").prop("checked",false);
        $("#pickfromyournearestmetrostationcheckbox").prop("checked",false);
        $("#freepickupfromtheseplacesdeliverycheckbox").prop("checked",false);
        $("#fareaccordingtogooglemapcheckbox").prop("checked",false);
        $("#delivery-error").text("");
        $("#input-for-delivery").val("");
        deliveryThrough=0;
        $("#buynowlink").attr("href","javascript:void(0)")
        $("#item-total-price-number").text("₹"+totalamount)


      })

    })

    function homedeliverycheckbox(){

      $("#homedeliverycheckbox").prop("checked",true);
      $("#pickfromyournearestmetrostationcheckbox").prop("checked",false);
      $("#freepickupfromtheseplacesdeliverycheckbox").prop("checked",false);
      $("#fareaccordingtogooglemapcheckbox").prop("checked",false);
      deliveryThroughFunction(1);
    }
    function pickfromyournearestmetrostationcheckbox(){

      $("#homedeliverycheckbox").prop("checked",false);
      $("#pickfromyournearestmetrostationcheckbox").prop("checked",true);
      $("#freepickupfromtheseplacesdeliverycheckbox").prop("checked",false);
      $("#fareaccordingtogooglemapcheckbox").prop("checked",false);
      $("#popup-for-nearest-metro-station").show();
      $("#delivery-popup-box").show();

    }
    function freepickupfromtheseplacesdeliverycheckbox(){

      $("#homedeliverycheckbox").prop("checked",false);
      $("#pickfromyournearestmetrostationcheckbox").prop("checked",false);
      $("#freepickupfromtheseplacesdeliverycheckbox").prop("checked",true);
      $("#fareaccordingtogooglemapcheckbox").prop("checked",false);
      $("#delivery-popup-box").show();
      $("#popup-for-selected-metro-stations").show();
    }
    function fareaccordingtogooglemapcheckbox(){

      $("#homedeliverycheckbox").prop("checked",false);
      $("#pickfromyournearestmetrostationcheckbox").prop("checked",false);
      $("#freepickupfromtheseplacesdeliverycheckbox").prop("checked",false);
      $("#fareaccordingtogooglemapcheckbox").prop("checked",true);
      deliveryThroughFunction(4);
    }


    deliveryThrough=0;


    function deliveryThroughFunction(deliveryThroughStatus){
      deliveryThrough=deliveryThroughStatus;
      if(deliveryThrough==2){
        metrostation=$("#input-for-delivery").val();
        metrostation=metrostation.trim();
        if(metrostation.length==0){
          $("#delivery-error").text("Please Enter your nearest metro station ");
          return;
        }
        else{
          deliveryCharges=60;
          totalamountforshow=totalamount+deliveryCharges;
          $("#item-total-price-number").text("₹"+totalamountforshow)
        }
      }
      if(deliveryThrough==3){
        metrostation=$("#select-metro-station").val();
        if(metrostation==null){
          $("#delivery-error").text("Please Select Metro Station");
          return;
        }
        else{

            deliveryCharges=10;
            totalamountforshow=totalamount+deliveryCharges;
            $("#item-total-price-number").text("₹"+totalamountforshow)

        }

      }
      if(deliveryThrough==1){
        deliveryCharges=90;
        totalamountforshow=totalamount+deliveryCharges;
        $("#item-total-price-number").text("₹"+totalamountforshow)
      }

      if(deliveryThrough==4){
        deliveryCharges=0;
        $("#item-total-price-number").text("₹"+totalamount+"+ (FARE ON Delivery)")
      }

      <?php
        if(isset($_GET['itemid'])){
      ?>
        $("#buynowlink").attr("href",`http://localhost/shriecom/payment.php?itemid=<?php echo $iteminfofetch['uniqueid'];?>&itemquantity=${quantity}&deliveryThrough=${deliveryThrough}`)
<?php } ?>

       <?php
             if(isset($_GET['cartitem'])){
       ?>
             $("#buynowlink").attr("href",`http://localhost/shriecom/payment.php?cartitem=cartitem&deliveryThrough=${deliveryThrough}`)
    <?php } ?>

    $("#delivery-popup-box").css("display","none");
    $("#popup-for-nearest-metro-station").css("display","none");

    $("#popup-for-selected-metro-stations").css("display","none");
    $("#delivery-error").text("");


    }



    </script>


       <div id="delivery-popup-box" >
         <div id="remove-button" class="material-icons" style="font-size:25px;position:absolute;top:10px;right:10px;margin:auto;z-index:1;">
           clear
         </div>

         <div id="delivery-error"  style="color:red;font-size:15px;position:absolute;top:30px;right:0;left:0;text-align: center;margin:auto;">

         </div>

          <div id="popup-for-nearest-metro-station" style="display:none;">

             <input type="text" name="metrostation" id="input-for-delivery" placeholder="Enter your nearest metro station" >

             <div id="submit-metro-station">
               <input type="button" value="submit" onclick="deliveryThroughFunction(2)" style="width:150px;height:40px;position:absolute;left:0;right:0;margin:auto;border-radius:10px;border:1px solid black;outline:none;background:#1a73e8;color:white;font-size:16px;">
             </div>

         </div>

         <div id="popup-for-selected-metro-stations" style="display:none;">

            <select id="select-metro-station" >
              <option disabled="disabled" selected="selected">Select Metro Station</option>
              <option value="najafgarh">Najafgarh</option>
              <option value="dwarka mor">Dwarka mor</option>
              <option value="nangloi">Nangloi</option>
            </select>


            <div id="submit-metro-station">
              <input type="button" value="submit" onclick="deliveryThroughFunction(3)" style="width:150px;height:40px;position:absolute;left:0;right:0;margin:auto;border-radius:10px;border:1px solid black;outline:none;background:#1a73e8;color:white;font-size:18px;">
            </div>

        </div>

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
    box-shadow:0px 1px 2px 0px rgba(60,64,67,0.3), 0px 1px 3px 1px rgba(60,64,67,0.15);;
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

      <?php if(isset($_GET['itemid'])){?>
      <div id="item-details-body" style="padding-top:10px;" >
        <div id="item-image-and-pricing">
          <div id="item-image-block">
           <div id="item-image-box">
             <img src="photos/<?php echo $itemimg;?>"  id="item-image"  >
           </div>
          </div>
          <div id="item-pricing-block">
            <br>
            <div id="item-price-box">
              <?php echo $itemprice;?>
            </div>
            <br>
            <div id="price-quantity-selector">
              <div id="price-quantity-selector-box" style="width:fit-content;margin:auto;height:50px;">
              <div id="price-quantity-decrease-box">
                <div id="price_quantity_decrease" onclick="price_quantity_decrease('#item-price-box')" class="material-icons">
                  remove
                </div>
              </div>
              <div id="price-quantity-show-box">
                <div id="price-quantity-show">
                  Qty <?php echo $itemquantity;?>
                </div>
              </div>
              <div id="price-quantity-increase-box">
                <div id="price_quantity_increase" onclick="price_quantity_increase('#item-price-box')" class="material-icons">
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
             <?php echo $itemname;?>
           </div>
         </div>
         <div id="item-description-box">
           <div id="item-description">
             <?php echo $itemdescription;?>
           </div>
         </div>
       </div>


      </div>
    <?php } ?>

    <?php if(isset($_GET['cartitem'])){
      $i=0;
      $itemprice=0;
      while($shoppingcartinfo=mysqli_fetch_array($selectshoppingcart)){
        $i=$i+1;

        $itemuniqueid=$shoppingcartinfo['uniqueid'];
        $selectshopitemtable=mysqli_query($con,"select * from shopitem where uniqueid='$itemuniqueid' ");
        $cartiteminfo=mysqli_fetch_array($selectshopitemtable);
        $itemprice=$itemprice+$cartiteminfo['itemprice']*$shoppingcartinfo['quantity'];

      ?>
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

  <?php }} ?>


<?php if(isset($_GET['itemid'])){?>
  <script>


      itemPrice=<?php echo$itemprice?>;
      totalamount=<?php echo$itemprice?>;
      originalPrice=<?php echo$iteminfofetch['itemprice'];?>;
      quantity=<?php echo $_GET['itemquantity'];?>;
      itemspresentincart=<?php echo $noofitemsincart; ?>;
      deliveryCharges=0

      function price_quantity_increase(itempricebox){
        console.log("ohk")
        itemPrice=originalPrice+itemPrice;
        showPrice=itemPrice;
        quantity=quantity+1;

        $("#buynowlink").attr("href",`http://localhost/shriecom/payment.php?itemid=<?php echo $iteminfofetch['uniqueid'];?>&itemquantity=${quantity}&deliveryThrough=${deliveryThrough}`)
        showQuantity="Qty "+quantity;
        $(itempricebox).text(showPrice);
        $("#price-quantity-show").text(showQuantity)
        itempricenumber=totalamount+originalPrice;
        totalamount=totalamount+originalPrice
        $("#item-price-number").text(itempricenumber)
        $("#item-total-price-number").text(totalamount+deliveryCharges)


      }
      function price_quantity_decrease(itempricebox){
        if(quantity==1){
          return;
        }

        itemPrice=itemPrice-originalPrice;
        showPrice=itemPrice;
        quantity=quantity-1;
        $("#buynowlink").attr("href",`http://localhost/shriecom/payment.php?itemid=<?php echo $iteminfofetch['uniqueid'];?>&itemquantity=${quantity}&deliveryThrough=${deliveryThrough}`)
        showQuantity="Qty " + quantity;
        $(itempricebox).text(showPrice);
        $("#price-quantity-show").text(showQuantity)
        itempricenumber=totalamount-originalPrice;
        totalamount=totalamount-originalPrice
        $("#item-price-number").text(itempricenumber)
        $("#item-total-price-number").text(totalamount+deliveryCharges)
      }

  </script>
<?php }?>


<?php if(isset($_GET['cartitem'])){?>
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
            if(data==1){
              console.log(data);
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
<?php }?>




<style>
  #item-price-detail{
    width: 95%;
    height: auto;
    overflow: auto;
    padding: 10px;
    margin: auto;
    border-radius: 10px;
    box-shadow: 0px 1px 2px 0px rgba(60,64,67,0.3), 0px 1px 3px 1px rgba(60,64,67,0.15);;
  }
  #item-price-text-box{
    width:100%;
    height:40px;
  }
  #item-price-text{
    width:50%;
    height:40px;
    float:left;
    font-size: 15px;
    font-family: arial;

  }
  #item-price-number{
    width:50%;
    height: 40px;
    float:left;
    text-align:right;
    font-size: 15px;
    font-family: arial;

  }
  #item-delivery-charges-box{
    width:100%;
    height:40px;

  }
  #item-delivery-charges-text{
    width:80%;
    height:auto;
    float:left;
    font-size: 13px;
    font-family: arial;
  }
  #item-delivery-charges-number{
    width:20%;
    height: 30px;
    float:left;
    text-align: right;
    font-size: 15px;
    font-family: arial;

  }
  #item-total-price-text-box{
    width:100%;
    height:auto;
    padding-top: 10px;
    overflow: auto;

  }
  #item-total-price-text{
    width:50%;
    height:auto;
    float:left;
    font-size: 15px;
    font-family: arial;
    font-weight: 800;
  }
  #item-total-price-number{
    width:50%;
    height:auto;
    float:left;
    font-size: 15px;
    font-family: arial;
    font-weight: 800;
    text-align: right;
  }

</style>
      <br>

      <div id="item-price-detail">
        <div id="item-price-text-box">
         <div id="item-price-text">
           Price
         </div>
         <div id="item-price-number">
           <?php echo $itemprice?>
         </div>
       </div>
       <div id="item-delivery-charges-box">
         <p style="font-family:arial;">Delivery charges:</p>
         <p>

         <div id="home-delivery" style="    padding-bottom: 5px;float:left;height:auto;width:100%;border-bottom:0.1px solid black;">
           <label for="homedeliverycheckbox">
         <div id="item-delivery-charges-text">

           <input type="checkbox" name="homedeliverycheckbox" id="homedeliverycheckbox" onclick="homedeliverycheckbox()" >
           Home delivery
         </div>
         <div id="item-delivery-charges-number">
           ₹90
         </div>
       </label>
         <br>


       </div>


       <p style="line-height: 1px;">&nbsp</p>
       <div id="pick-from-your-nearest-metro-station" style="padding-bottom: 5px;float:left;height:auto;width: 100%;border-bottom:0.1px solid black;">
         <label for="pickfromyournearestmetrostationcheckbox">
       <div id="item-delivery-charges-text">
         <input type="checkbox" name="homedelivery" id="pickfromyournearestmetrostationcheckbox" onclick="pickfromyournearestmetrostationcheckbox()"  value="Home Delivery">
         Deliver To My Nearest Metro Station

       </div>
       <div id="item-delivery-charges-number">
         ₹60
       </div>
     </label>
     </div>
     <p style="line-height: 1px;">&nbsp</p>

     <div id="free-pickup-from-these-places-delivery" style="    padding-bottom: 5px;float:left;height:auto;width: 100%;border-bottom:0.1px solid black;">
       <label for="freepickupfromtheseplacesdeliverycheckbox">
     <div id="item-delivery-charges-text">
       <input type="checkbox" name="homedelivery" id="freepickupfromtheseplacesdeliverycheckbox" onclick="freepickupfromtheseplacesdeliverycheckbox()" value="Home Delivery">
       Pick From These Metro Stations (najafgarh, dwarka mor, nangloi)
     </div>
     <div id="item-delivery-charges-number">
       ₹10
     </div>
   </label>
   </div>
   <p style="line-height: 1px;">&nbsp</p>
   <div id="fare-according-to-google-map" style="    padding-bottom: 5px;float:left;height:auto;width: 100%;border-bottom:0.1px solid black;">
     <label for="fareaccordingtogooglemapcheckbox">
   <div id="item-delivery-charges-text" style="width:60%;">
     <input type="checkbox" name="homedelivery" id="fareaccordingtogooglemapcheckbox" onclick="fareaccordingtogooglemapcheckbox()" value="Home Delivery">
     Home delivery (Fare According To Google Map)
   </div>
   <div id="item-delivery-charges-number" style="width:40%;">
     ₹10 to ₹100
   </div>
 </label>
 </div>
 <p style="line-height: 1px;">&nbsp</p>

       </div>
       <div id="item-total-price-text-box">
         <div id="item-total-price-text">
           Total price
         </div>
         <div id="item-total-price-number">
           <?php echo $itemprice;?>
         </div>
       </div>
         </div>
         <br>
<style>
#user-address-body{

  width: 95%;
height: auto;
overflow: auto;
border-radius: 10px;
/* border: 1px solid black; */
box-shadow:0px 1px 2px 0px rgba(60,64,67,0.3), 0px 1px 3px 1px rgba(60,64,67,0.15);;
margin: auto;
padding: 10px;

}
#my-details-text{
  width: 50%;
  display: table-cell;
  height: 25px;
  vertical-align: middle;
  font-family: arial;
  padding-left: 10px;
}
#edit-my-details{
  width: 50%;
display: table-cell;
vertical-align: middle;
height: 20px;
font-family: arial;
}
#edit-my-details-button{
  width: 40%;
height: 20px;
float: right;
margin-right: 10px;
}
#user-name{
  display: table-row;
  width:100%;
  font-size:13px;
        font-family: arial;

}
#user-address{
  width:100%;
  height: 32px;
  overflow: hidden;
text-overflow: ellipsis;
display: -webkit-box;
-webkit-line-clamp: 2;
-webkit-box-orient: vertical;
  font-size:13px;
        font-family: arial;
}
#user-phone-number{
  width:100%;
  display: table-row;
  font-size:13px;
        font-family: arial;
}
</style>

<script>


function edit_personal_details(){


  user_name=$("#update-username").val();
  user_name=user_name.toLowerCase()
  user_name=user_name.trim();
  if(user_name.length==0){
  $("#update-form-error").text("enter your name")
    return false;
  }

 user_phoneno=$("#update-phoneno").val();
 user_phoneno=user_phoneno.trim();
 if(user_phoneno.length!=10){
  $("#update-form-error").text("enter valid phone number")
  return false;
 }

 user_pincode=$("#update-pincode").val();
 user_pincode=user_pincode.trim();
 if(user_pincode.length!=6){
  $("#update-form-error").text("enter valid pincode")
  return false;
 }



 user_address=$("#update-address").val();
 user_address=user_address.toLowerCase()
 user_address=user_address.trim();
 if(user_address.length==0){
   $("#update-form-error").text("enter your address");
   return false;
 }




 $.ajax({
   type:'POST',
   url:'ajax_backend.php',
   async:false,
   data:{'username':user_name,'userphoneno':user_phoneno,'userpincode':user_pincode,'useraddress':user_address,'update-ecom-customer-details':'update-ecom-customer-details'},
   success:function(data,textStatus){

     if(data==1){
       console.log("okk")
       $("#user-name").text(user_name);
       $("#user-address").text(user_address);
       $("#user-phone-number").text(user_phoneno);
       $("#user-pincode").text(user_pincode);
       $("#update-form-body").hide();

     }
     else{
       console.log(data);
       $("#update-form-error").text(data);

     }

   }

 })

 return false;
  }

function hideupdateform(){
  $("#update-form-body").hide();
}
function showupdateform(){
  $("#update-form-body").show();
}
</script>
        <div id="update-form-body" style="display: none;width:95%;height:500px;position:fixed;top:0;bottom:0;left:0;right:0;margin:auto;border-radius: 10px;top:10px;border:1px solid black;z-index:1;background:white;">
          <div class="material-icons" onclick="hideupdateform()" style="position:absolute;top:10px;right:10px;font-size:30px;z-index:1;">
            clear
          </div>
          <div style="width:100%;height:auto;position:absolute;top:2px;left:0;right:0;bottom:0;text-align: center;margin:auto;">Update you details</div>
          <div id="update-form-error" style="width:100%;height:auto;position:absolute;top:30px;color:red;font-family: arial;left:0;right:0;bottom:0;text-align: center;margin:auto;"></div>
          <br><br><br><input type="text" id="update-username" placeholder="your name" value="<?php echo $username;?>" style="font-family: arial;position:absolute;left:0;right:0;margin: auto;width:80%;height:50px;border:1px solid black;border-radius:15px;outline:none;">
          <br>
            <input type="text" id="update-address" placeholder="your address" value="<?php echo $useraddress;?>" style="font-family: arial;position:absolute;top:120px;left:0;right:0;margin: auto;width:80%;height:50px;border:1px solid black;border-radius:15px;outline:none;">
          <br>
          <input type="number" id="update-pincode" placeholder="your pincode" value="<?php echo $userpincode;?>" style="font-family: arial;position:absolute;top:185px;left:0;right:0;margin: auto;width:80%;height:50px;border:1px solid black;border-radius:15px;outline:none;">
        <br>
          <input type="number" id="update-phoneno" placeholder="your phone number" value="<?php echo $userphoneno;?>" style="font-family: arial;position:absolute;top:250px;left:0;right:0;margin: auto;width:80%;height:50px;border:1px solid black;border-radius:15px;outline:none;">
          <br>
          <input type="button" onclick="edit_personal_details()" id="submit-update-form" placeholder="your phone number" value="UPDATE" style="background:#1a73e8;color:white;border:none;font-family: arial;position:absolute;top:315px;left:0;right:0;margin: auto;width:60%;height:40px;border-radius:15px;outline:none;">

        </div>
         <div id="user-address-body">
           <div id="user-details-heading" style="display:table;width:100%;height:30px;">
           <div id="my-details-text">
             My details
           </div>
           <div id="edit-my-details">
             <input type="button" value="edit" style="background:#1a73e8;color:white;outline:none;border:none;border-radius:5px;"onclick="showupdateform()" id="edit-my-details-button">
           </div>
         </div><br>
           <div id="user-name">
             <?php echo $username;?>
           </div><br>
           <div id="user-address">
             <?php echo $useraddress;?>

           </div><br>
           <div id="user-pincode">
             <?php echo $userpincode;?>

           </div><br>
           <div id="user-phone-number">
            <?php echo $userphoneno;?>
           </div><br>
         </div>
         <br>
    </div><br><br><br>
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
    <script>
    function test(){
      if(deliveryThrough==0){
        alert("please select one option from delivery section")
        return false;
      }
    }
    </script>

    <?php if(isset($_GET['itemid']) && isset($_GET['itemquantity'])){
      $itemid=$_GET['itemid'];
      $itemquantity=$_GET['itemquantity'];
    ?>
    <a href="javascript:void(0)" id="buynowlink" onclick="test()">
    <?php }
    ?>
    <?php if(isset($_GET['cartitem'])){
    ?>
    <a href="javascript:void(0)" id="buynowlink">
    <?php }
    ?>
    <div id="checkout-item-body">
      <div id="checkout-item">
        continue
      </div>
    </div>
  </a>


  </body>
</html>
