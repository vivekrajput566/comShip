<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no" >
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


  </head>


  <?php
  session_start();


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
  background: #4899ec;
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
  height:100%;
  display: none;
  background-color: white;
  position:absolute;
  top:0;
  z-index: 2;
  border:2px solid black;
}
a{
  text-decoration: none;
    color: black;
    -webkit-tap-highlight-color: transparent;
}


</style>
<script>
$(document).ready(function(){
windowHeight=screen.height;
  $("#menu-btn").click(function(){
    $("#menu-body").show();
    $("#menu-body").animate({width:'100%',height:windowHeight});


  })
  $("#close-icon-button").click(function(){
    $("#menu-body").animate({width:'0%',height:'100%'},function(){
      $("#menu-body").hide();
$("#menu-body").css('height',windowHeight);
    });




  })
})
</script>

  <body>

    <div  id="header-container" class="bg-primary">
      <header id="header-body">
        <div id="menu-button" >
          <div id="menu-btn" class="material-icons" style="font-size:30px;margin:auto;padding-left:5px;">
          menu
        </div>

        </div>

        <div id="company-name-body">
            ComShip.in

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
  #body-container{
    width:100%;
  }

  #login-button-body{

    width:100%;
    height:auto;

  }
  #login-button-box{
    width:70%;
    height: 40px;
    margin:auto;
  }
  #login-button{
    width:100%;
    outline:none;
    color:white;
    background: #4899ec;
    border:1px solid black;
    height:100%;
    border-radius: 15px;
    font-size:16px;
    font-family: arial;
  }

  #signup-button-body{
    width:100%;
    height:50px;


  }
  #signup-button-box{
    width:70%;
    margin:auto;
    height:40px;
  }
  #signup-button{
    width:100%;
    outline:none;
    height:100%;
    color:white;
    background: #4899ec;
    border:1px solid black;
    border-radius: 15px;
    font-size:16px;
    font-family: arial;
  }
  #login-signup-button-body{
    width:90%;
    box-shadow: 0px 0px 6px 0px;
    margin:auto;
    height:300px;
    margin-top:80px;
    padding-top:50px;
  }

</style>
    <div id="body-container">
      <div id="login-signup-button-body">
      <div id="login-button-body">
        <div id="login-button-box">
          <button class="bg-primary" id="login-button">login</button>
        </div>
      </div>

      <div id="or-text" style="text-align: center;font-size:16px;font-family: arial;width:100%;">or</div>

      <div id="signup-button-body">
        <div id="signup-button-box">
          <button class="bg-primary" id="signup-button">create new account</button>
        </div>
      </div>

    </div>

    <style>

      #login-signup-form-body{
        position:absolute;

        width: 100%;
  height: 600px;
  top:-60px;
  background:white;
  z-index: 2;
  opacity: 0;
  transform: rotate3d(0.3, .2, .2, 0deg) scale(0.1);
  transition: all ease 0.5s;
      }
      #login-form-body{
        width:90%;
        height:100%;
        border:1px solid black;
        margin:auto;
        padding-top:5px;
        border-radius: 10px;

      }
      #login-id-box{
        width:90%;
        height:50px;
        margin:auto;
      }
      #login-id{
          width:100%;
          height:50px;
          border-radius: 10px;
          font-size: 16px;
          font-family: arial;
          border:1px solid black;
          outline:none;

      }
      #login-password-box{
        width:90%;
        height:50px;
        margin:auto;
      }
      #login-password{
          width:100%;
          height:50px;
          border-radius: 10px;
          font-size: 16px;
          font-family: arial;
          border:1px solid black;
          outline:none;
      }
      #login-form-submit-box{
        width:90%;
        height:50px;
        margin:auto;

      }
      #login-form-submit{
        width:100%;
        height:50px;
        outline:none;
        background:#4899ec;
      color: white;
      border-radius: 10px;
      border:1px solid black;
      }

      #signup-form-body{
        width:90%;
        height:100%;
        border:1px solid black;
        margin:auto;
        padding-top:5px;
        border-radius: 10px;

      }
      #signup-email-box{
        width:90%;
        height:50px;
        margin:auto;
      }
      #signup-email{
          width:100%;
          height:50px;
          border-radius: 10px;
          font-size: 16px;
          font-family: arial;
          border:1px solid black;
          outline:none;

      }
      #signup-address-box{
        width:90%;
        height:50px;
        margin:auto;
      }
      #signup-address{
          width:100%;
          height:50px;
          border-radius: 10px;
          font-size: 16px;
          font-family: arial;
          border:1px solid black;
          outline:none;

      }
      #signup-phoneno-box{
        width:90%;
        height:50px;
        margin:auto;
      }
      #signup-phoneno{
          width:100%;
          height:50px;
          border-radius: 10px;
          font-size: 16px;
          font-family: arial;
          border:1px solid black;
          outline:none;

      }
      #signup-username-box{
        width:90%;
        height:50px;
        margin:auto;
      }
      #signup-username{
          width:100%;
          height:50px;
          border-radius: 10px;
          font-size: 16px;
          font-family: arial;
          border:1px solid black;
          outline:none;

      }
      #signup-password-box{
        width:90%;
        height:50px;
        margin:auto;
      }
      #signup-password{
          width:100%;
          height:50px;
          border-radius: 10px;
          font-size: 16px;
          font-family: arial;
          border:1px solid black;
          outline:none;
      }
      #signup-form-submit-box{
        width:90%;
        height:50px;
        margin:auto;

      }
      #signup-form-submit{
        width:100%;
        height:50px;
        outline:none;
        background:#4899ec;
      color: white;
      border-radius: 10px;
      border:1px solid black;
      }
      #signup-otp-body{
        width:90%;
        height:100%;
        border:1px solid black;
        margin:auto;
        padding-top:5px;
        border-radius: 10px;

      }
      #signup-otp-box{
        width:90%;
        height:50px;
        margin:auto;
      }
      #signup-otp{
          width:100%;
          height:50px;
          border-radius: 10px;
          font-size: 16px;
          font-family: arial;
          border:1px solid black;
          outline:none;

      }
      #signup-otp-form-submit-box{
        width:90%;
        height:50px;
        margin:auto;

      }
      #signup-otp-form-submit{
        width:100%;
        height:50px;
        outline:none;
        background:#4899ec;
      color: white;
      border-radius: 10px;
      border:1px solid black;
      }


    </style>
    <script>
    $(document).ready(function(){
      $("#login-button").click(function(){
        $("#login-form-body").show();
        $("#login-signup-form-body").css("opacity","1");
        $("#login-signup-form-body").css("transform","none");
      })
      $("#close-login-form").click(function(){
        $("#login-form-body").hide();
        $("#login-signup-form-body").css("opacity","0");
        $("#login-signup-form-body").css("transform","rotate3d(0.3, .2, .2, 0deg) scale(0)");
      })

      $("#signup-button").click(function(){
        $("#signup-form-body").show();
        $("#login-signup-form-body").css("opacity","1");
        $("#login-signup-form-body").css("transform","none");
      })
      $("#close-signup-form").click(function(){
        $("#signup-form-body").hide();
        $("#login-signup-form-body").css("opacity","0");
        $("#login-signup-form-body").css("transform","rotate3d(0.3, .2, .2, 0deg) scale(0)");
      })
      $("#close-signup-otp-form").click(function(){
        $("#signup-otp-body").hide();
        $("#login-signup-form-body").css("opacity","0");
        $("#login-signup-form-body").css("transform","rotate3d(0.3, .2, .2, 0deg) scale(0)");
      })

    })


    function signup_form_submit(){



      user_name=$("#signup-username").val();
      user_name=user_name.toLowerCase()
      user_name=user_name.trim();
      if(user_name.length==0){
      $("#signup-error").text("enter your name")
        return false;
      }



    user_phoneno=$("#signup-phoneno").val();
    user_phoneno=user_phoneno.trim();
    if(user_phoneno.length!=10){
      $("#signup-error").text("enter valid phone number")
      return false;
    }


    user_password=$("#signup-password").val();
    user_password=user_password.trim();
    if(user_password.length==0){
    $("#signup-error").text("enter password");
    return false;
    }
    if(user_password.length<=3){
    $("#signup-error").text("short password");
    return false;
    }




    $("#loading-image-body").show();


    $.ajax({
    type:'POST',
    url:'login-signup.php',
    async:false,
    data:{'username':user_name,'userphoneno':user_phoneno,'userpassword':user_password,'signup_submit':'signup_submit'},
    success:function(data,textStatus){

     if(data==1){
       console.log("okk")
       $("#signup-form-body").hide();
       $("#signup-otp-body").show();
       $("#loading-image-body").hide();
     }
     else{
     $("#signup-error").text(data);
     $("#loading-image-body").hide();
     }

    }

    })

return false;

  }

  function signup_otp_form_submit(){



          signup_otp=$("#signup-otp").val();
          signup_otp=signup_otp.trim();
          if(signup_otp.length==0){
          $("#signup-otp-error").text("enter otp");
          return false;
          }
          if(!isNaN(signup_otp)){
            if(signup_otp.length!=4){
              $("#signup-otp-error").text("enter valid otp number")
            return
            }
          }
          else{
            $("#signup-otp-error").text("enter otp number")
          return

          }



          $.ajax({
          type:'POST',
          url:'login-signup.php',
          data:{'signup_check_otp':signup_otp},
          success:function(data,textStatus){
            $("#loading-image-body").show();
           if(data==1){
             console.log("you are welcome");
             <?php if(isset($_GET['delivery-charges'])){?>
               window.location.href="delivery-charges.php";
               <?php }
               else{?>
            window.location.href="index.php";
            <?php }?>
           }
           else{
           $("#signup-otp-error").text(data);
           $("#loading-image-body").hide();
           }
          }

          })
          return false;

        }




  function login_form_submit(){


      var user_id=$("#login-id").val();
      user_id=user_id.trim()

      if(user_id.length!=10){
        $("#login-error").text("enter valid mobile no.");
        return
      }
      var user_password=$("#login-password").val();
      user_password=user_password.trim();

      if (user_password.trim().length==0){
        $("#login-error").text("enter password");
        return
      }
      if(user_password.length<=3){
      $("#login-error").text("wrong password");
      return
      }
$("#loading-image-body").show();


      $.ajax({
      type:'POST',
      url:'login-signup.php',
      data:{'userid':user_id,'userpassword':user_password,'login_submit':'login_submit'},
      success:function(data,textStatus){
       if(data==1){
         <?php if(isset($_GET['delivery-charges'])){?>
           window.location.href="delivery-charges.php"
           <?php }
           else{?>
        window.location.href="index.php"
        <?php }?>
       }
       else{
       $("#login-error").text(data);
       $("#loading-image-body").hide();
       }
      }

      })


    }

    </script>
    <div id="login-signup-form-body">

      <div id="loading-image-body" style="display: none;width:100%;position:absolute;left:0;right:0;bottom:0;top:0;margin:auto;height:100%;z-index:2;">
      <div id="loading-image-box"  style="position:absolute;left:0;right:0;bottom:0;top:0;margin:auto;width:82%;border-radius: 10px;height:200px;border:1px solid black;background:white;">
        <div class="spinner-border text-primary">
           
        </div>
        <span style="width:100%;font-size:15px;font-family: arial;position:absolute;bottom:10px;text-align:center;">wait for a sec......<span>
      </div>
    </div>
      <div id="login-form-body" style="display:none;">
        <div id="close-login-button" style="width:98%;text-align:right;"><div class="material-icons" id="close-login-form" style="width:20px;font-size:25px;cursor:pointer;">close</div></div>
        <div id="login-text" style="width:100%;font-size:18px;font-family:arial;text-align:center;">login here</div><br>
        <div id="login-error" style="width:100%;font-size:15px;font-family:arial;text-align:center;color:red;"></div><br>
        <form action="#" onsubmit="login_form_submit(); return false;">
          <div id="login-id-box">
      <input type="text" placeholder="enter email or phone number" id="login-id" name="login-id" required>
    </div><br>
      <div id="login-password-box">
      <input type="password" placeholder="enter password" id="login-password" name="password" required>
    </div><br>
    <div id="login-form-submit-box">
      <input type="submit" name="login-form-submit" id="login-form-submit" value="continue">
    </div>
      </form>
    </div>


    <div id="signup-form-body" style="display:none;">
      <div class="material-icons" id="close-signup-form" style="width:98%;text-align:right;font-size:25px;cursor:pointer;">close</div>
      <div id="signup-text" style="width:100%;font-size:18px;font-family:arial;text-align:center;">create new account</div><br>
      <div id="signup-error" style="width:100%;font-size:15px;font-family:arial;text-align:center;color:red;"></div><br>
      <form action="#" onsubmit="signup_form_submit(); return false;">
        <div id="signup-username-box">
    <input type="text" placeholder="enter your name" id="signup-username" name="signup-username" required>
  </div><br>

  <div id="signup-phoneno-box">
    <input type="number" placeholder="enter phone number" id="signup-phoneno" name="signup-phoneno" required>
  </div><br>


    <div id="signup-password-box">
    <input type="password" placeholder="enter password" id="signup-password" name="signup-password" required>
  </div><br>
  <div id="signup-form-submit-box">
    <input type="submit" name="signup-form-submit" id="signup-form-submit" value="continue">
  </div>
    </form>
  </div>


  <div id="signup-otp-body" style="display:none;">
    <div class="material-icons" id="close-signup-otp-form" style="width:98%;text-align:right;font-size:25px;cursor:pointer;">close</div>
    <div id="signup-otp-text" style="width:100%;font-size:16px;font-family:arial;text-align:center;">OTP | check your email</div><br>
    <div id="signup-otp-error" style="width:100%;font-size:14px;font-family:arial;text-align:center;color:red;"></div><br>
    <form action="#" onsubmit="signup_otp_form_submit(); return false;">
      <div id="signup-otp-box">
  <input type="number" placeholder="enter otp here" id="signup-otp" name="signup-otp" required>
</div><br>

<div id="signup-otp-form-submit-box">
  <input type="submit" name="signup-otp-form-submit" id="signup-otp-form-submit" value="continue">
</div>
  </form>
</div>


    </div>




    </div>





  </body>
</html>
