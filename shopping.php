
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no" >
    <link rel="icon" href="icon.jpeg" type="image/icon type">
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  </head>

  <?php
session_start();

  unset($_SESSION['payment-page-redirect']);
  $con=new mysqli("localhost","root","","shriecom");
  $selectdata=mysqli_query($con,"select * from shopinfo order by id desc");
  $fetchdata=mysqli_fetch_array($selectdata);

  ?>
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
<script>
$(document).ready(function(){
 windowHeight=screen.height;
 console.log(windowHeight);
$("#menu-body").css('height',windowHeight);
 $("#menu-btn").click(function(){
   $("body").css('overflow','hidden')
   $("#menu-body").show();
   $("#menu-body").animate({width:'100%',height:windowHeight});


 })
 $("#close-icon-button").click(function(){
   $("body").css('overflow','auto')
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
          <div id="menu-btn" class="material-icons" style="font-size:30px;color:white;margin:auto;padding-left:5px;">
          menu
        </div   >

        </div>

        <div id="company-name-body" style="text-align:center;">
            ShriEcom

        </div>
        <div id="cart-button" >
          <div id="cart-block">
            <a href="http://localhost/shriecom/cart.php">
          <div id="cart-btn" class="material-icons" style="font-size:30px;color:white;float:left;opacity:0.9;">
            shopping_cart
        </div>

        <div id="cart-items-number" >
          <?php if(isset($_SESSION['userid']))
          {
            $phonenumber=$_SESSION['userid'];
            $selectshoppingcart=mysqli_query($con,"select uniqueid,quantity from shoppingcart where phonenumber='$phonenumber' ");
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
<style>
#main-body{
  width:97%;
  height:auto;
  margin:auto;
  overflow: auto;

}
</style>

      <div id="main-body" class="">
<style>
#search-body{

background: white;

overflow: auto;
  width:100%;
  height: 40px;
  margin-top:5px;
}
#search-item-box{
  width:70%;
  height:40px;
  float:left;
}
#search-shop-box{
  width:70%;
  height:100%;
  float:left;
  display:none;
}
#search-input-box{
  width:100%;
  height:100%;
  border-radius:10px;
  outline:none;

}
#search-option{
  width:20%;
  height: auto;
  float:left;
  text-align: center;
  border:1px solid black;
  border-radius: 8px;
  position:absolute;
  z-index: 1;
  top:65px;
  right:7px;
}
#item-search{
  width:100%;
  height:100%;
  float:left;
  border-top-right-radius: 8px;
    border-top-left-radius: 8px;
    border-bottom-right-radius: 8px;
      border-bottom-left-radius: 8px;
  background-color:#3399ff;
  color:white;
  padding-top: 10px;
  padding-bottom: 10px;


}
#shop-search{
  width:100%;
  height:100%;
  float:left;
  padding-top: 10px;
  padding-bottom: 10px;
  border-bottom-right-radius: 8px;
    border-bottom-left-radius: 8px;
    border-top-right-radius: 8px;
      border-top-left-radius: 8px;
  background-color: white;
  z-index: 1;
  display: none;


}
#item-input-box{
  width:100%;
  height:100%;
  border-radius: 8px;
  outline: none;
  margin:auto;
  border:1px solid black;
}
#shop-input-box{
  width:100%;
  height:100%;
  border-radius: 8px;
  outline: none;
  margin:auto;
  border:1px solid black;
}
#search-filter{
  float:left;
  width:9%;


}
#filter-option{
  width:80px;
  height: auto;
  float:left;
  text-align: center;
  border:1px solid black;
  border-radius: 8px;
  position:absolute;
  z-index: 1;
  top:104px;
  display: none;
  left:5px;
  background-color: white;
}
#lowest-option{
  width:100%;
  height:100%;
  float:left;
  border-top-right-radius: 8px;
    border-top-left-radius: 8px;

  background-color:#3399ff;
  color:white;
  padding-top: 10px;
  padding-bottom: 10px;


}
#rating-option{
  width:100%;
  height:100%;
  float:left;
  padding-top: 10px;
  padding-bottom: 10px;
  border-bottom-right-radius: 8px;
    border-bottom-left-radius: 8px;
  background-color: white;
  z-index: 1;



}
</style>
<script>
 $(document).ready(function(){
 searchStatus=0
  $("#item-search").click(function(){
  if(searchStatus==0){
     $("#item-search").show();
     $("#shop-search").show();
     $("#item-search").css("border-bottom-right-radius","0px");
     $("#item-search").css("border-bottom-left-radius","0px");
     searchStatus=1;
  }
  else{
    searchStatus=0;
    $("#item-search").css("border-bottom-right-radius","8px");
    $("#item-search").css("border-bottom-left-radius","8px");
     $("#shop-search").hide();
     $("#item-search").css("background-color","#3399ff");
     $("#item-search").css("color","white");
     $("#shop-search").css("background-color","white");
     $("#shop-search").css("color","black");
     $("#search-item-box").show();
     $("#search-shop-box").hide();
  }

  })
  $("#shop-search").click(function(){
    if(searchStatus==0){
       $("#item-search").show();
       $("#shop-search").show();
       searchStatus=1;
       $("#shop-search").css("border-top-right-radius","0px");
       $("#shop-search").css("border-top-left-radius","0px");
    }
    else{
      searchStatus=0;
       $("#item-search").hide();
       $("#shop-search").css("border-top-right-radius","8px");
       $("#shop-search").css("border-top-left-radius","8px");
       $("#shop-search").css("background-color","#3399ff");
       $("#shop-search").css("color","white");
       $("#item-search").css("background-color","white");
       $("#item-search").css("color","black");
       $("#search-item-box").hide();
       $("#search-shop-box").show();
    }

  })
filterStatus=0;
  $("#search-filter").click(function(){
    if(filterStatus==0){
     $("#filter-option").show();
     filterStatus=1;
    }
    else{
      filterStatus=0;
      $("#filter-option").hide();
    }

  })
  $("#lowest-option").click(function(){
    $("#lowest-option").css("background-color","#3399ff");
    $("#lowest-option").css("color","white");
    $("#rating-option").css("background-color","white");
    $("#rating-option").css("color","black");
    $("#filter-option").hide();
    filterStatus=0;
  })

  $("#rating-option").click(function(){
    $("#rating-option").css("background-color","#3399ff");
    $("#rating-option").css("color","white");
    $("#lowest-option").css("background-color","white");
    $("#lowest-option").css("color","black");
    $("#filter-option").hide();
    filterStatus=0;
  })
  searchinputstatus=0
  $("#item-input-box").click(function(){
    if(searchinputstatus==0){
    $("#content-body").hide();
    $("#search-body").css("height","40px");
     }

  })

  $("#close-searching-body").click(function(){
    searchinputstatus=0;
    $("#content-body").show();
    $("#search-body").css("height","40px");
    $("#search-result-body").html("");
    $("#item-input-box").val("");

  })
  $("#item-input-box").on('input',function(){
    inputtext=$("#item-input-box").val();
    if(inputtext.trim().length==0){
      $("#search-result-body").html("");
      return;
    }

    $.ajax({
      type:'post',
      url:'ajax_backend.php',
      data:{'searchinput':'searchinput','inputtext':inputtext},
      success:function(data,status){
        searchresult=JSON.parse(data);
        console.log(data)
        $("#search-result-body").html("");
        if(searchresult[0]==1){

          t=1
          while(t<searchresult.length){
            searchresultlength=searchresult[t].length;
          i=0;
          while(i<searchresultlength){
            searchresulthtmlcontent=`<div id='searchresults' onclick="fetchsearchresult('${searchresult[t][i]}')" style='width:100%;float:left;border-bottom:0.1px solid #ded9d93b;font-size:14px;font-weight:600;font-family:arial;line-height:50px;'>${searchresult[t][i]}<div>`
            $("#search-result-body").append(searchresulthtmlcontent);
            i++;
          }
          t=t+1;
        }

        }
        else{
            searchresulthtmlcontent="<div id='searchresults' style='width:100%;float:left;border-bottom:0.1px solid #ded9d93b;'>not found any item</div>"
            $("#search-result-body").append(searchresulthtmlcontent);
        }
      }


    })
  })


 })

 function fetchsearchresult(inputtext){
   $("#item-input-box").val(inputtext);
   $.ajax({
     type:'post',
     url:'ajax_backend.php',
     data:{'fetchsearchresult':'fetchsearchresult','inputtext':inputtext},
     success:function(data,status){
       fetchresult=JSON.parse(data);
       console.log(data);
       $("#search-result-body").html("");
       if(fetchresult[0]==1){

         t=0
         while(t<fetchresult[1].length){
           fetchresultlength=fetchresult[1][t].length;

       fetchresulthtmlcontent=`
       <div id="shops-data-body-item">
        <a href="http://localhost/shriecom/${fetchresult[1][t][0]}/${fetchresult[1][t][1]}">
         <div class="" id="shops-data-item">
           <div class="" id="shop-img-item" >
             <img src="photos/${fetchresult[1][t][4]}"  id="item-image-item" >
           </div>
           <div class="" id="item-name-item">
            ${fetchresult[1][t][2]}
           </div>
           <div class="" id="item-price-item">
           ${fetchresult[1][t][3]}
           </div>
           <div class="" id="item-shop-name-item">
           ${fetchresult[1][t][5]}
           </div>
         </div>
       </div>
     </a>
       `
       $("#search-result-body").append(fetchresulthtmlcontent);

        t=t+1;
      }
      }
     }
   })

 }



</script>


<style>

#shops-data-body-item{
  width:50%;
      height: 170px;
      float: left;
      margin-top: 10px;


}
#shops-data-item{
  width: 90%;
  height: 100%;
  margin-left: auto;
  margin-right: auto;
  box-shadow: 1px 3px 5px -3px;
}




#shop-img-item{
  width:100px;
  height: 100px;
  margin: auto;
  position:relative;
}
#item-name-item{
  text-align: center;
  font-family: arial;
  font-size: 12px;
  max-height: 34px;
  overflow: hidden;
  margin-top: 10px;
  line-height: 16px;
  text-overflow: ellipsis;
white-space: nowrap;
width: 91%;
    margin: auto;
}
#item-price-item{
  text-align: center;
      font-family: arial;
      font-size: 12px;
      max-height: 28px;
      overflow: hidden;
      font-weight: bold;
      line-height: 24px;
      width: 91%;
    margin: auto;
}
#item-image-item{
  max-width: 100%;
    max-height: 100%;
    position: absolute;
    left: 0;
    right: 0;
    top:0;
    bottom:0;
    margin: auto;
}

#item-shop-name-item{
  text-align: center;
      font-size: 11px;
      max-height: 15px;
      overflow: hidden;
      font-weight: bold;
      line-height: 13px;
      color: #747171;
      width: 91%;
    margin: auto;
    white-space: nowrap;
text-overflow: ellipsis;
}


a{
  -webkit-tap-highlight-color:transparent;
  text-decoration: none;
  color:black;
}


</style>
        <div class="" id="search-body" style="position:relative;width:100%;">

    <div id="search-item-box" style="position:absolute;margin:auto;top:0;left:0;right:0;bottom:0;width:90%;">
            <div id="search-item-div" style="width:100%;height:100%;">
              <input type="search" id="item-input-box" placeholder="Search products here..">
            </div>
    </div>
    </div>
    <div id="search-result-body" style="padding-left:10px;height:auto;overflow:hidden;">

    </div>
<style>
#content-body{
  width:100%;
  height:auto;
  overflow: auto;
  margin-top:14px;

  padding-bottom: 10px;
}
#shops-data-body{
  width:100%;
  height:170px;
  float:left;

  margin-top: 10px;

}
#shops-data{
  width:98%;
  height:170px;
  margin-left:auto;
  margin-right:auto;

}
#shop-img{
  width:100%;
  height: 100px;
}
#shop-name{
  text-align: center;
  font-family: sans-serif;
  font-size: 14px;
  max-height: 32px;
  overflow: hidden;
  margin-top:10px;
}
#shop-address{
  text-align: center;
  font-family: sans-serif;
  font-size: 12px;
  max-height: 28px;
  overflow: hidden;
}
a{
  -webkit-tap-highlight-color:transparent;
  text-decoration: none;
  color:black;
}
#shriecom-ad-body{

  margin-top:5px;
  width:100%;
  height:250px;

}
#shriecom-ad-img{
  width: 100%;
  height:100%;

}
</style>

      <div id="shriecom-ad-body" >
        <div id="shriecom-ad-img">
          <img src="home-page.jpeg" style="width:100%;height:100%;">
        </div>
      </div>

      <style>

      #shops-data-body{
        width:200px;
            height: 220px;
            float: left;
            margin-top:1px;


      }
      #shops-data{
        width: 90%;
        height: 100%;
        margin-left: auto;
        margin-right: auto;
        box-shadow: 0px 1px 2px 0px rgba(60,64,67,0.3), 0px 1px 3px 1px rgba(60,64,67,0.15);;
      }




      #shop-img{
        width:160px;
        height: 160px;
        margin: auto;
        position:relative;
      }
      #item-name{
        color:black;
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
        color:black;
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
          top:4px;
          margin: auto;
      }
      #shop-item-body-block{
        width:100%;
        height:auto;
        white-space: nowrap;
        overflow-x:scroll;
        margin:auto;

      }
      a{
        -webkit-tap-highlight-color:transparent;
        text-decoration: none;
        color:black;
      }


      </style>
      <br>
      <p style="margin-left:12px;line-height:0px;font-size:16px;font-family:arial;">Trending product</p>
      <div id="shop-item-body-block">
        <?php
        $con=new mysqli("localhost","root","","shriecom");
        $selectshopitem=mysqli_query($con,"select * from shopitem where itemcode=101 AND potstatus=1");
         ?>
         <?php
        while($fetchitemdata=mysqli_fetch_array($selectshopitem)){
         ?>
         <div id="shop-items-scroll-x" style="display:inline-block;">
         <a href="store/<?php echo $fetchitemdata['itemurl'];?>">
         <div id="shops-data-body">
           <div class="" id="shops-data">

             <div class="" id="shop-img" >

               <img src="photos/<?php echo $fetchitemdata['itemimg'];?>"  id="item-image" >
             </div>

             <div class="" id="item-name">

              <?php echo $fetchitemdata['itemname'];?>

             </div>

             <div class="" id="item-price">

               ₹<?php echo $fetchitemdata['itemprice'];?>&nbsp<span style="color:#7e7575;text-decoration:line-through;">₹<?php echo (int)$fetchitemdata['itemprice']+250;?><span>

             </div>


           </div>
         </div>
       </a>
     </div>
  <?php }?>


       </div>




<br>
  <p style="margin-left:12px;line-height:0px;font-size:16px;font-family:arial;">Latest products</p>
<div id="shop-item-body-block">

  <?php
  $con=new mysqli("localhost","root","","shriecom");
  $selectshopitem=mysqli_query($con,"select * from shopitem where itemcode=101 AND potstatus=0");
   ?>
   <?php
  while($fetchitemdata=mysqli_fetch_array($selectshopitem)){
   ?>
   <div id="shop-items-scroll-x" style="display:inline-block;">
   <a href="store/<?php echo $fetchitemdata['itemurl'];?>">
   <div id="shops-data-body">
     <div class="" id="shops-data">

       <div class="" id="shop-img" >

         <img src="photos/<?php echo $fetchitemdata['itemimg'];?>"  id="item-image" >
       </div>

       <div class="" id="item-name">

        <?php echo $fetchitemdata['itemname'];?>

       </div>

       <div class="" id="item-price">

         ₹<?php echo $fetchitemdata['itemprice'];?>&nbsp<span style="color:#7e7575;text-decoration:line-through;">₹<?php echo (int)$fetchitemdata['itemprice']+250;?><span>

       </div>


     </div>
   </div>
 </a>
</div>

<?php }?>






 </div>


 <br>
   <p style="margin-left:12px;line-height:0px;font-size:16px;font-family:arial;">Succulent Plants</p>
 <div id="shop-item-body-block">

   <?php
   $con=new mysqli("localhost","root","","shriecom");
   $selectshopitem=mysqli_query($con,"select * from shopitem where itemcode=202 AND potstatus=1");
    ?>
    <?php
   while($fetchitemdata=mysqli_fetch_array($selectshopitem)){
    ?>
    <div id="shop-items-scroll-x" style="display:inline-block;">
    <a href="store/<?php echo $fetchitemdata['itemurl'];?>">
    <div id="shops-data-body">
      <div class="" id="shops-data">

        <div class="" id="shop-img" >

          <img src="photos/<?php echo $fetchitemdata['itemimg'];?>"  id="item-image" >
        </div>

        <div class="" id="item-name">

         <?php echo $fetchitemdata['itemname'];?>

        </div>

        <div class="" id="item-price">
          ₹<?php echo $fetchitemdata['itemprice'];?>&nbsp<span style="color:#7e7575;text-decoration:line-through;">₹<?php echo (int)$fetchitemdata['itemprice']+250;?><span>

        </div>


      </div>
    </div>
  </a>
 </div>


 <?php }?>






  </div>
<p> &nbsp</p>


      </div>



  </body>
</html>
