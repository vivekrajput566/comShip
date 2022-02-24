
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width,initial-scale:1.0,user-scalable:no;">
    <meta charset="utf-8">
    <link rel="icon" href="icon.jpeg" type="image/icon type">
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  </head>

  <style>
  *{
      box-sizing: border-box;
  }
  body{
    margin: 0;
  }
  #header-container{
    width:100%;
    height:60px;
    background: #0d6efd;
  color: white;
  }
  #company-name-body{
    width:50%;
    height:100%;
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
    text-align: right;
    font-size: 15px;
    font-family: arial;

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
    top:0;
    display: none;
    background-color: white;
    position:fixed;
    z-index: 2;
    overflow:scroll;
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

  <body>


        <div  id="header-container" class="">
          <header id="header-body">
            <div id="menu-button" >
              <div id="menu-btn" class="material-icons" style="font-size:30px;color:white;margin:auto;padding-left:5px;">
              menu
            </div   >

            </div>

            <div id="company-name-body" style="text-align:center;">
                ShriEcom

            </div>
            <div id="cart-button" >
              <div id="cart-block">
                <a href="http://localhost/ShriEcom/cart.php">
              <div id="cart-btn" class="material-icons" style="font-size:30px;color:white;float:left;opacity:0.9;">
                shopping_cart
            </div>

            <div id="cart-items-number" >
              <?php if(isset($_SESSION['userid']))
              {
                $email=$_SESSION['userid'];
                $selectshoppingcart=mysqli_query($con,"select uniqueid,quantity from shoppingcart where email='$email' ");
                $itemsincart=mysqli_num_rows($selectshoppingcart);
                echo $itemsincart;
              }
              else{
                echo "0";
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
        <center>
        <div id="body-shipment">
          Shipments
        </div>
      </center>
        <div id="shipments-body" style="position:relative;">
          <div id="shipment-block" style="border:1px solid black;margin:auto;width:90%;top:0;left:0;right:0;left:0;bottom:0;height:auto;margin-top:10px;padding:15px;">
            <center><div id="shipment-status" style="color:green;">
              out for pickup
            </div></center>
            <div id="ship to">
                Ship to: <b>Yash</b>
            </div>
            <div id="address" style="white-space: nowrap;overflow: hidden !important;text-overflow: ellipsis;">
              Address:rohini
            </div>
            <div id="Phone no.">
              Phone no: 7840034924
          </div>
          <div id="price">
            Amount: $50
          </div>
          <div id="track-order">
            <center><button id="track-order-button">Track order</button></center>
          </div>

        </div>

  </body>
</html>
