<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0" >
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
   width: 55%;
   height: 100%;
   float: left;
   text-align: center;
   font-size: 20px;
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
              Rajput electronics

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
       <a href="http://localhost/shriecom/shop-owner-add-or-edit-item.php">
       <div id="refer-to-add-or-edit-item" style="font-family:arial;width:100%;height:30px;font-size:13px;padding-left:10px;display:table;white-space:nowrap;">
        <div class="material-icons" style="width: 22px;height: 21px;font-size: 20px;text-align: center;display: inline-block;vertical-align: middle;border: 1px solid black;border-radius: 20%;">
          add
        </div>
        <div id="add-&-edit-page" style="display:inline-block;vertical-align:middle;font-size:15px;">
        &nbsp Add & edit item
        </div>
       </div>
     </a>
       <br>
       <a href="http://localhost/shriecom/shop-order-history.php">
       <div id="refer-to-history" style="font-family:arial;width:100%;height:30px;font-size:13px;padding-left:10px;display:table;white-space:nowrap;">
        <div class="material-icons" style="width: 22px;height: 21px;font-size: 20px;text-align: center;display: inline-block;vertical-align: middle;border-radius: 20%;">
          history
        </div>
        <div id="history-page" style="display:inline-block;vertical-align:middle;font-size:15px;">
        &nbsp History
        </div>
       </div>
     </a>
       <br>
       <a href="http://localhost/shriecom/shop-owner.php">
       <div id="refer-to-customer-order" style="font-family:arial;width:100%;height:30px;font-size:13px;padding-left:10px;display:table;white-space:nowrap;">
        <div class="material-icons" style="width: 22px;height: 21px;font-size: 20px;text-align: center;display: inline-block;vertical-align: middle;border-radius: 20%;">
          description
        </div>
        <div id="customer-order-page" style="display:inline-block;vertical-align:middle;font-size:15px;">
        &nbsp Customer orders
        </div>
       </div>
     </a>
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

<style>
#main-body{
  width:100%;
  height:auto;
}
#order-body-block{
  width:100%;
  height:auto;
  margin-top:10px;
}
#order-box{
  width:100%;
  height:50px;

}
#new-order-button-box{
  width:50%;
  height:50px;
  float: left;
}
#new-order-button{
  width: 100%;
height: 50px;

background: black;
color: white;
}
#pending-order-button-box{
  width:50%;
  height: 50px;
  float:left;
}
#pending-order-button{
  width:100%;
  height: 50px;
}
button{
  text-align: center;
  border:none;
  outline:none;
  font-family: arial;
}
</style>
<script>

    $(document).ready(function(){
      $("#new-order-button-box").click(function(){
        $("#new-order-button").css("background","black");
        $("#new-order-button").css("color","white");
        $("#pending-order-button").css("background","rgb(239, 239, 239)");
        $("#pending-order-button").css("color","black");
        $("#pending-order-body").hide();
        $("#new-order-body").show();


      })

      $("#pending-order-button-box").click(function(){
        $("#pending-order-button").css("background","black");
        $("#pending-order-button").css("color","white");
        $("#new-order-button").css("background","rgb(239, 239, 239)");
        $("#new-order-button").css("color","black");
        $("#pending-order-body").show();
        $("#new-order-body").hide();


      })

    })



</script>
        <div id="main-body">



          <style>
                #item-details-body{
                  width: 98%;
              height: auto;
              margin-top: 20px;
              margin-left: auto;
              margin-right: auto;
              padding-bottom: 10px;
              border-radius: 10px;
              box-shadow: 1px 0px 5px 0px;
                }
                #item-image-and-pricing{
                  width:100%;
                  height:120px;
                  padding-top: 10px;

                }
                #item-image-box{
                  width:70px;
                  height: 70px;
                  position: relative;



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
                  width:30%;
                  max-height:120px;
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
                #price-quantity-decrease{
                  font-size: 18px;
                  border-radius: 5px;
                  border:1px solid black;
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
                #price-quantity-increase{
                  font-size:18px;
                  border:1px solid black;
                  border-radius: 5px;
                }
                #item-name-and-description{
                  width:70%;
                  float:left;
                  max-height:120px;
                }
                #item-description-box{
                  margin-top:5px;
                }
                #item-name{

font-size: 18px;
font-family: arial;
line-height: 20px;
max-height: 43px;
overflow: hidden;
text-overflow: ellipsis;
display: -webkit-box;
-webkit-line-clamp: 2;
-webkit-box-orient: vertical;
                }
                #item-description{
                  font-size: 12px;
    font-family: arial;
    max-height: 40px;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
                }

#accept-and-decline-body{
  width:100%;
  height: 55px;
  position: fixed;
  bottom:0px;
  background: white;

}
#view-more-details{
  width:100%;
  height:40px;
  font-size:13px;
   font-weight: 600;
  font-family: arial;
  border: 1px solid black;
    border-left: none;
    border-right: none;
}
#view-more-details-form{
  width:100%;
  height: 40px;
}
#new-order-body{
  display: block;
}
#pending-order-body{
  display:none;
}
#item-price{
  width:100%;
  padding-left: 10px;
  font-size: 20px;
  font-family: arial;
    border-bottom:1px solid #03030312;


}
#item-quantity{
  width:100%;
  padding-left: 10px;
  font-size: 16px;
  font-family: arial;
    border-bottom:1px solid #03030312;
}
#item-payment-option{
  width:100%;
  padding-left: 10px;
  font-size: 16px;
  font-family: arial;
    border-bottom:1px solid #03030312;
}
#item-order-time{
  width:100%;
  padding-left: 10px;
  font-size: 16px;
  font-family: arial;
    border-bottom:1px solid #03030312;
}
#customer-details{
  width:100%;
  padding-left: 10px;
  font-size: 16px;
  font-family: arial;
    border-bottom:1px solid #03030312;
}
#customer-name{
  width:100%;
  padding-left: 10px;
  font-size: 16px;
  font-family: arial;
    border-bottom:1px solid #03030312;
}
#customer-phone-number{
  width:100%;
  padding-left: 10px;
  font-size: 16px;
  font-family: arial;
  border-bottom:1px solid #03030312;
}
#customer-address{
  width:100%;
  padding-left: 10px;
  font-size: 16px;
  font-family: arial;
    border-bottom:1px solid #03030312;
}

#accept-button-box{
  width:50%;
  position: relative;
  height:40px;
  float:left;
}
#decline-button-box{
  width:50%;
  height: 40px;
  float:left;
  position: relative;
}
#accept-button{
  width:96%;
  height:40px;
  margin:auto;
  position: absolute;
    margin: auto;
    left: 0;
    right: 0;
    background: #40aa40;
    color: white;
    font-family: arial;
}
#decline-button{
  width:96%;
  height:40px;
  margin:auto;
  position: absolute;
    margin: auto;
    left: 0;
    right: 0;
    background: #f43131;
    color: white;
    font-family: arial;
}

          </style>

          <div id="new-order-body">
          <div id="item-details-body">
            <div id="item-image-and-pricing">
              <div id="item-image-block">
               <div id="item-image-box">
                 <img src="photos/9939129700815963673343416370984442777943192.jpg"  id="item-image"  >
               </div>
              </div>

              <div id="item-name-and-description">
               <div id="item-name-box">
                 <div id="item-name">
                   Socket
                 </div>
               </div>
               <div id="item-description-box">
                 <div id="item-description">
                   socket 16A k.k light
                 </div>
               </div>
             </div>

            </div>

            <div id="item-price">
              $45
            </div><br><br>
            <div id="item-quantity">
              Qty: 2
            </div><br><br>
            <div id="item-order-time">
              date: 12-06-2020
            </div><br><br>
            <div id="item-payment-option">
              payment: cash on delivery
            </div><br><br>
            <hr>
            <div id="customer-details">
              Customer details:-
              <br><br><br>
              <div id="customer-name">
                vivek rajput
              </div><br><br>

              <div id="customer-phone-number">
                7840034924
              </div><br><br>

              <div id="customer-address">
                rz a-6 jai vihar najafgarh new delhi
              </div><br><br></br><br>



            </div>


          </div>
        </div>
        <div id="confirm-delete-body" style="position:fixed;display:none;top:0;bottom:0;background-color: white;border:1px solid black;left:0;right:0;margin:auto;width:80%;height:200px;border-radius:10px;box-shadow: 1px 1px 14px 2px;">
          <br><br><br><div id="delete-text" style="text-align:center;font-size:15px;font-family:arial;">
            do you want to decline this order?
          </div><br><br>
          <div id="yes-no-confirm-buttons" style="width:100%;height:50px;">
          <div id="yes-button-box" style="width:50%;height:50px;float:left;">
            <div id="yes-button-center" style="margin:auto;width:40%;height:30px;">
            <input type="button" value="yes" onclick="decline_order()" id="yes-button" style="width:100%;height:30px;">
           </div>
          </div>
          <div id="no-button-box" style="width:50%;height:50px;float:left;">
            <div id="no-button-center" style="margin:auto;width:40%;height:30px;">
            <input type="button" value="no" id="no-button" style="margin:auto;width:100%;height:30px;">
          </div>
        </div>
        </div>
        </div>


        </div>
        <script>

        $(document).ready(function(){
          $("#decline-button").click(function(){
            $("#confirm-delete-body").show();

          })
          $("#no-button").click(function(){
            $("#confirm-delete-body").hide();
          })

        })


        </script>

        <script>

        function accept_order(){

         itemid="<?php echo $_GET['itemorderid'];?>";

         $.ajax({
           type:'POST',
           url:'ajax_backend.php',
           data:{'accept_order':'accept_order','itemid':itemid},

           success:function(data,textStatus){
            if(data==1){
              window.location="http://localhost/shriecom/shop-owner.php";
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



                function decline_order(){

                 itemid="<?php echo $_GET['itemorderid'];?>";

                 $.ajax({
                   type:'POST',
                   url:'ajax_backend.php',
                   data:{'decline_order':'decline_order','itemid':itemid},

                   success:function(data,textStatus){
                    if(data==1){
                      window.location="http://localhost/shriecom/shop-owner.php";
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
        </script>

                    <div id="accept-and-decline-body">

                        <div id="accept-button-box">
                          <button onclick="accept_order()" id="accept-button">accept</button>
                        </div>

                        <div id="decline-button-box">
                          <button  id="decline-button">decline</button>
                        </div>


                    </div>
        </body>

        </html>
