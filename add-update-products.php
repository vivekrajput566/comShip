
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0" >
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/exif-js"></script>

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  </head>

  <?php

  session_start();
  $email="rajputvivek566@gmail.com";
  $_SESSION['userid']=$email;
  if(isset($_SESSION['userid'])){

  }
  else{
    header("location:http://localhost/withmerce/login-form.php");
    exit();
  }

  $con=new mysqli("localhost","root","","withmerce");
  $email="rajputvivek566@gmail.com";
  $selectshopitem=mysqli_query($con,"select * from shopitem where email='$email' && status=0");


  $selectshopinfo=mysqli_query($con,"select * from shopinfo where email='$email' ");
  $shopinfofetch=mysqli_fetch_array($selectshopinfo);
  ?>
<style>
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
  z-index: 2;
  background-color:white;
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
            <a href="javascript:void(0)">
            <div id="menu-btn" class="material-icons" style="font-size:30px;margin:auto;color:white;">
            menu
          </div>
        </a>

          </div>

          <div id="company-name-body">
              <?php echo $shopinfofetch['shopname'];?>

          </div>
          <!--
          <div id="user-login-status" class="">
            <div class="" id="unregistered-user">
              LOGIN
            </div>
            <div class="" style="display:none;" id="registered-user">
              username
            </div>
          </div>
        -->



        </header>

      </div>
      <a href="javascript:void(0)" >
      <div id="add-item-button-box">

        <div id="add-item-button" class="material-icons">add

        </div>

      </div>
    </a>

    <div id="menu-body" >
      <div id="menu-close-icon" style="width:100%;height:40px;">
        <a href="javascript:void(0)" style="color:black;">
        <div class="material-icons" style="float:right;font-size:30px;" id="close-icon-button">
          close
        </div>
      </a>
     </div>
     <BR>
       <a href="http://localhost/withmerce/">
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
     <a href="http://localhost/withmerce/shop-owner-add-or-edit-item.php">
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
     <a href="http://localhost/withmerce/shop-order-history.php">
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
     <a href="http://localhost/withmerce/shop-owner.php">
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
     <a href="http://localhost/withmerce/contact-us.php">
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
        height:150px;
        position: relative;
      }
      #shop-image{
        position:absolute;
        width:100%;
        height:130px;
        margin:auto;
        top:0;left: 0;right: 0;bottom: 0;
      }
</style>
      <div id="main-body">
        <div id="shop-image-body">
          <div id="shop-image">
            <img src="chilli_tadka.png" alt="shop-image" id="shop-img" style="width:100%;height:130px;">
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
              border: 2px solid black;
        }
</style>
        <div id="search-body">
          <div id="search-box">
            <input type="search" name="search-box" id="search-input" placeholder="search item here...">
          </div>
        </div>

<style>
body{
  margin: 0;

}

 #shops-data-body{
  width:50%;
  height:180px;
  float:left;

  margin-top: 10px;
  box-shadow: 0px 2px 0px 0px #a59c9c;

 }
 #shops-data{
  width:98%;
  height:180px;
  margin-left:auto;
  margin-right:auto;

 }
 #shop-img{
   width: 110px;
     height: 110px;
     position: relative;
     margin: auto;
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
 #edit-button{
  width:100%;
  height:20px;
  text-align: center;
  font-family:arial;
  font-size: 14px;
    line-height: 22px;
 }
 #item-edit-body{
  width: 100%;
  margin: auto;
  height: auto;
  overflow: auto;
  position: fixed;
  background-color: white;
  border: 1px solid black;
  left: 0;
  right: 0;
  top:0;
  bottom:0;
  background-color: rgba(255, 255, 255, 0.8);
  z-index: 1;

 }
 #item-edit{
  width:95%;
  height:auto;
  overflow: auto;
  margin: auto;
    margin-top: 5px;
    background: white;
 border: 1px solid black;
 }
 #edit-item-image{
   width: 50%;
     height: 153px;
     FLOAT: LEFT;
     margin: auto;
     /* MARGIN-LEFT: 10PX; */
     position: relative;

 }
 #edit-img{

 }
 #edit-item-name{
  width:80%;
  height:50px;
  margin:auto;
 }
 #edit-name{
  border-radius: 10px;
  outline:none;
  width:100%;
  height: 50px;
  font-size: 15px;
 font-family: arial;
 border:1px solid black;


 }
 #edit-item-description{
  width:80%;
  margin:auto;
  height:75px;

 }
 #edit-description{
 width:100%;
 height:75px;
 overflow:auto;
 resize: none;
 border-radius: 10px;
 font-size: 15px;
 font-family: arial;
 outline:none;
 border:1px solid black;

  }
  #edit-item-price{
    width:80%;
    height:50px;
    margin:auto;
  }
  #edit-price{
    width:100%;
    height:50px;
    border-radius: 10px;
    font-size: 15px;
 font-family: arial;
 border:1px solid black;
 outline:none;
  }
  #edit-update-button{
    width:80%;
    height:45px;
    margin:auto;
  }
  #edit-update{
    width:100%;
    height:40px;
    outline:none;
    border-radius: 10px;
    background: #2f96ef;
    color:white;

    border:1px solid black;
  }
  #edit-delete-button{
    width:80%;
    height:45px;
    margin:auto;
  }
  #edit-delete{
    width:100%;
    height:40px;
    outline:none;
    border-radius: 10px;
    background:#ef3d3d;
    color:white;
    border:1px solid black;
  }

  #item-add-body{
    width: 100%;
    margin: auto;
    height: auto;
    overflow: auto;
    position: fixed;
    background-color: white;
    border: 1px solid black;
    left: 0;
    right: 0;
    top:0;
    bottom:0;
    z-index: 1;
    background-color: rgba(255, 255, 255, 0.8);

  }
  #item-add{
    width:95%;
    height:auto;
    overflow: auto;
    margin: auto;
      margin-top: 20px;
      background: white;
  border: 1px solid black;
  }
  #add-item-image{
    width: 50%;
height: 153px;
FLOAT: LEFT;
margin: auto;
/* MARGIN-LEFT: 10PX; */
position: relative;
  }
  #add-img{

  }
  #add-item-name{
    width:80%;
    height:50px;
    margin:auto;
  }
  #add-name{
    border-radius: 10px;
    outline:none;
    width:100%;
    height: 50px;
    font-size: 15px;
  font-family: arial;
    border:1px solid black;


  }
  #add-item-description{
    width:80%;
    margin:auto;
    height:150px;

  }
  #add-description{
  width:100%;
  height:150px;
  overflow:auto;
  resize: none;
  border-radius: 10px;
  font-size: 15px;
  font-family: arial;
  outline:none;
    border:1px solid black;

    }
    #add-item-price{
      width:80%;
      height:50px;
      margin:auto;
    }
    #add-price{
      width:100%;
      height:50px;
      border-radius: 10px;
      font-size: 15px;
  font-family: arial;
  outline:none;
  border:1px solid black;
    }
    #add-item-btn{
      width:80%;
      height:45px;
      margin:auto;
    }
    #add-itm{
      width:100%;
      height:40px;
      outline:none;
      border-radius: 10px;
      background: #2f96ef;
      color:white;
      border:1px solid black;
    }
    #add-item-img-form{
      width: 85%;
    height: 150px;
    /* FLOAT: LEFT; */
    margin: auto;
    /* MARGIN-LEFT: 10PX; */
    position: relative;
    }

    #add-item-img-form2{
      width: 85%;
      height: 150px;
      /* FLOAT: LEFT; */
      margin: auto;
      /* MARGIN-LEFT: 10PX; */
      position: relative;
    }
 a{
  text-decoration: none;
  color:black;
  -webkit-tap-highlight-color:transparent;
 }


</style>

<script>
 $(document).ready(function(){

  $("#close-edit").click(function(){
    $("#item-edit-body").hide();
     $("#confirm-delete-body").hide();
  })

 $("#add-item-button-box").click(function(){
  $("#item-add-body").show();

 })
 $("#close-add").click(function(){

  $("#item-add-body").hide();
 })
 $("#edit-delete").click(function(){
 $("#confirm-delete-body").show();

 })
 $("#no-button").click(function(){
  $("#confirm-delete-body").hide();
 })

 })
 itemid=0;
 itemimagestatus=0;

 function editItemFunction(itemId,itemuniqueid){
  itemImage=$("#itemimageinput"+itemId).val();
  itemsideImage=$("#itemsideimageinput"+itemId).val();
  itemName=$("#itemnameinput"+itemId).val();
  itemPrice=$("#itempriceinput"+itemId).val();
  itemDescription=$("#itemdescriptioninput"+itemId).val();
  itemImagestatus=$("#itemimagestatusinput"+itemId).val();
  itemsideImagestatus=$("#itemsideimagestatusinput"+itemId).val();
  itemImagestatus=parseInt(itemImagestatus);
  itemsideImagestatus=parseInt(itemsideImagestatus);
  itemid=itemId;
  $("#edit-img").attr('src',itemImage);
  $("#edit-side-img").attr('src',itemsideImage);
  $("#edit-name").val(itemName);
  $("#edit-description").val(itemDescription);
  $("#edit-price").val(itemPrice);
  $("#edit-uniqueid").val(itemuniqueid);
  if(itemImagestatus==0 && itemsideImagestatus==0){
    console.log("hii")
  $("#item-img").attr("src","photos/"+itemImage);
  $("#item-img2").attr("src","photos/"+itemsideImage);
  }

  else if(itemImagestatus==2 && itemsideImagestatus==2 ){
    console.log("okk")
    itemimagestatus=2;
    $("#item-img").attr("src",itemImage);
    $("#item-img2").attr("src",itemsideImage);
  }
  else if(itemImagestatus==2){
    console.log("hfdhgf")
    itemimagestatus=2;

    $("#item-img").attr("src",itemImage);
  }
  else if(itemsideImagestatus==2){
    console.log("hfdhgf")
    itemimagestatus=2;

    $("#item-img2").attr("src",itemsideImage);
  }
  else{
    $("#item-img").attr("src",itemImage);
    $("#item-img2").attr("src",itemsideImage);
  }



  $("#item-edit-body").show();


  }
</script>


<script>

$("document").ready(function(){

 image='';
 image2='';
 formdata=new FormData();
 edititemimagestatus=0;
 edititemimagestatus2=0;
  $("#item-image-upload").change(function(e){

  e.preventDefault();

      let reader=new FileReader()

      reader.onloadend=function(){

        $("#item-img").attr('class','');
        EXIF.getData($("#item-image-upload")[0].files[0], function() {

       switch(parseInt(EXIF.getTag(this, "Orientation"))) {

               case 2:
                   $("#item-img").attr('class','flip'); break;
               case 3:
                   $("#item-img").attr('class','rotate-180'); break;
               case 4:
                   $("#item-img").attr('class','flip-and-rotate-180'); break;
               case 5:
                   $("#item-img").attr('class','rotate-90'); break;
               case 6:
                   $("#item-img").attr('class','flip-rotate-90'); break;
               case 7:
                   $("#item-img").attr('class','rotate-270'); break;
               case 8:
                   $("#item-img").attr('class','flip-and-rotate-270'); break;
           }




      })


      $("#item-img").attr('src',reader.result)
      if(edititemimagestatus2==1){
        formdata.append('item_img[0]',$("#item-image-upload")[0].files[0]);
        formdata.append('item_img[1]',$("#item-image-upload2")[0].files[0]);
      }
      else{
      formdata.append('item_img[0]',$("#item-image-upload")[0].files[0]);
      }
      image=reader.result;
      $("#item-image-upload").val("");

  }
  if(event.target.files[0]){
    edititemimagestatus=1

    reader.readAsDataURL(event.target.files[0])
  }


})


$("#item-image-upload2").change(function(e){
console.log("fgdfd");
e.preventDefault();

    let reader=new FileReader()

    reader.onloadend=function(){

      $("#item-img2").attr('class','');
      EXIF.getData($("#item-image-upload2")[0].files[0], function() {

     switch(parseInt(EXIF.getTag(this, "Orientation"))) {

             case 2:
                 $("#item-img2").attr('class','flip'); break;
             case 3:
                 $("#item-img2").attr('class','rotate-180'); break;
             case 4:
                 $("#item-img2").attr('class','flip-and-rotate-180'); break;
             case 5:
                 $("#item-img2").attr('class','rotate-90'); break;
             case 6:
                 $("#item-img2").attr('class','flip-rotate-90'); break;
             case 7:
                 $("#item-img2").attr('class','rotate-270'); break;
             case 8:
                 $("#item-img2").attr('class','flip-and-rotate-270'); break;
         }




    })


    $("#item-img2").attr('src',reader.result)
    if(edititemimagestatus==0){
      formdata.append('item_img[0]',$("#item-image-upload2")[0].files[0]);
    }
    else{
        formdata.append('item_img[1]',$("#item-image-upload2")[0].files[0]);
    }
    image2=reader.result;
    $("#item-image-upload2").val("");

}
if(event.target.files[0]){
  edititemimagestatus2=1

  reader.readAsDataURL(event.target.files[0])
}


})

})

function submit_update_item_form(){

    itemname=$("#edit-name").val();
    itemdescription=$("#edit-description").val();
    itemprice=$("#edit-price").val();
    itemuniqueid=$("#edit-uniqueid").val();
    //itemprice=parseInt(itemprice);



    if(itemname.trim().length==0 ){
      $("#item-update-error").text("enter item name");
      return;
    }

    if(itemdescription.trim().length==0){
      $("#item-update-error").text("enter item description");
      return;
    }
    if(itemprice.trim().length==0 || isNaN(itemprice)){
      $("#item-update-error").text("enter price");
      return;
    }

    tempneweditimagestatus=0;
    if(edititemimagestatus==1 && edititemimagestatus2==1){

      tempneweditimagestatus=1;
    formdata.append('updateimagestatus','11');
    $("#itemimagestatusinput"+itemid).val("2");
    $("#itemsideimagestatusinput"+itemid).val("2");

    }

    else if(edititemimagestatus==1){
      tempneweditimagestatus=1;

      formdata.append('updateimagestatus','1');
      $("#itemimagestatusinput"+itemid).val("2");
    }

    else if(edititemimagestatus2==1){
      tempneweditimagestatus=1;

      formdata.append('updateimagestatus','2');
      $("#itemsideimagestatusinput"+itemid).val("2");
    }

    else if(itemImagestatus==2){

      formdata.append('updateimagestatus','0');
     $("#itemimagestatusinput"+itemid).val("2");
     $("#itemsideimagestatusinput"+itemid).val("2");

  }
    else{
      formdata.append('updateimagestatus','0');
      $("#itemimagestatusinput"+itemid).val("0");
      $("#itemsideimagestatusinput"+itemid).val("0");
    }



    $("#itemnameinput"+itemid).val(itemname);
    $("#itemdescriptioninput"+itemid).val(itemdescription);
    $("#itempriceinput"+itemid).val(itemprice);
    $(".item-name"+itemid).text(itemname)
    $(".item-price"+itemid).text(itemprice)
    formdata.append('itemname',itemname)
    formdata.append('itemdescription',itemdescription)
    formdata.append('itemprice',itemprice)
    formdata.append('itemuniqueid',itemuniqueid)
    formdata.append('updateitem','updateitem')
    $("#item-update-error").css('color','green');
    $("#item-update-error").text("updating...");

    $.ajax({
      type:'POST',
      url:'ajax_backend.php',
      data:formdata,
      processData:false,
      contentType: false,
      success:function(data,textStatus){

       if(data){
         console.log(data);
         if(edititemimagestatus==1 && edititemimagestatus2==1 ){
           $("#itemimageinput"+itemid).val(image);
           $("#itemsideimageinput"+itemid).val(image2);
         $(".item-img"+itemid).attr('src',image);
       }
       if(edititemimagestatus==1 ){
         $("#itemimageinput"+itemid).val(image);

         $(".item-img"+itemid).attr('src',image);
        }
       if(edititemimagestatus2==1){
         $("#itemsideimageinput"+itemid).val(image2);


     }
         $("#loading-image-body").hide();
         $("#item-update-error").css('color','green');
         $("#item-update-error").text("updated successfully");
         setTimeout(function(){
           $("#item-update-error").text("");
          $("#item-update-error").css('color','red');
        },2000);



       }
       else{
         $("#item-add-error").text(data);


       }
      }


      })


}

function deleteitem(){

  itemuniqueid=$("#edit-uniqueid").val();
  $("#confirm-delete-body").hide();
  $("#item-edit-body").hide();
  $(".shops-data-body-class"+itemid).remove();
  $.ajax({
    type:'POST',
    url:'ajax_backend.php',
    data:{'deleteitem':'deleteitem','itemuniqueid':itemuniqueid},
    success:function(data,textStatus){

     if(data==1){

      console.log(data);

     }
     else{
       console.log(data)

     }
    }


    })

}

//////////////   ADD ITEM FUNCTIONS ///////////////////////////


$("document").ready(function(){
  addimage="";
  addimage2="";
  additemformdata=new FormData();
  itemimagestatus=0;
  itemimagestatus2=0;
 $("#add-item-image-upload").change(function(e){

  e.preventDefault();







      let additemimagereader=new FileReader()

      additemimagereader.onloadend=function(){
        $("#add-item-img-add").attr('class','');
        EXIF.getData($("#add-item-image-upload")[0].files[0], function() {

       switch(parseInt(EXIF.getTag(this, "Orientation"))) {

               case 2:
                   $("#add-item-img-add").attr('class','flip'); break;
               case 3:
                   $("#add-item-img-add").attr('class','rotate-180'); break;
               case 4:
                   $("#add-item-img-add").attr('class','flip-and-rotate-180'); break;
               case 5:
                   $("#add-item-img-add").attr('class','rotate-90'); break;
               case 6:
                   $("#add-item-img-add").attr('class','flip-rotate-90'); break;
               case 7:
                   $("#add-item-img-add").attr('class','rotate-270'); break;
               case 8:
                   $("#add-item-img-add").attr('class','flip-and-rotate-270'); break;
           }


      $("#add-item-img-add").attr('src',additemimagereader.result)
      $("#add-item-img-add").show();
      additemformdata.append('add_item_img[0]',$("#add-item-image-upload")[0].files[0]);

      addimage=additemimagereader.result;
      $("#add-item-image-upload").val("");


        });

  }
  if(event.target.files[0]){
    itemimagestatus=1
    additemimagereader.readAsDataURL(event.target.files[0])
  }


})



//   ADD IMAGE 2


$("#add-item-image-upload2").change(function(e){

 e.preventDefault();







     let additemimagereader=new FileReader()

     additemimagereader.onloadend=function(){
       $("#add-item-img-add2").attr('class','');
       EXIF.getData($("#add-item-image-upload2")[0].files[0], function() {

      switch(parseInt(EXIF.getTag(this, "Orientation"))) {

              case 2:
                  $("#add-item-img-add2").attr('class','flip'); break;
              case 3:
                  $("#add-item-img-add2").attr('class','rotate-180'); break;
              case 4:
                  $("#add-item-img-add2").attr('class','flip-and-rotate-180'); break;
              case 5:
                  $("#add-item-img-add2").attr('class','rotate-90'); break;
              case 6:
                  $("#add-item-img-add2").attr('class','flip-rotate-90'); break;
              case 7:
                  $("#add-item-img-add2").attr('class','rotate-270'); break;
              case 8:
                  $("#add-item-img-add2").attr('class','flip-and-rotate-270'); break;
          }


     $("#add-item-img-add2").attr('src',additemimagereader.result)
     $("#add-item-img-add2").show();
    additemformdata.append('add_item_img[1]',$("#add-item-image-upload2")[0].files[0]);
     addimage2=additemimagereader.result;
     $("#add-item-image-upload2").val("");


       });

 }
 if(event.target.files[0]){
   itemimagestatus2=1
   additemimagereader.readAsDataURL(event.target.files[0])
 }


})



})

function submit_add_item_form(){

    itemname=$("#add-name").val();
    itemdescription=$("#add-description").val();
    itemprice=$("#add-price").val();
    //itemuniqueid=$("#edit-uniqueid").val();
    //itemprice=parseInt(itemprice);



    if(itemname.trim().length==0 ){
      $("#item-add-error").text("enter item name");
      return;
    }

    if(itemdescription.trim().length==0){
      $("#item-add-error").text("enter item description");
      return;
    }
    if(itemprice.trim().length==0 || isNaN(itemprice) || itemprice<=0){
      $("#item-add-error").text("enter price");
      return;
    }
    if(itemimagestatus==0){
      $("#item-add-error").text("please add item main image");
      return;
    }
    if(itemimagestatus2==0){
      $("#item-add-error").text("please add item side image");
      return;
    }
    //console.log(additemformdata.getAll());
    //return;
    //$("#itemimagestatusinput"+itemid).val("1");

  //  $("#itemnameinput"+itemid).val(itemname);
    //$("#itemdescriptioninput"+itemid).val(itemdescription);
  //  $("#itempriceinput"+itemid).val(itemprice);
  //  $("#item-name"+itemid).text(itemname)
  //  $("#item-price"+itemid).text(itemprice)
    additemformdata.append('itemname',itemname)
    additemformdata.append('itemdescription',itemdescription)
    additemformdata.append('itemprice',itemprice)
        additemformdata.append('additem','additem')
    $("#item-add-error").css('color','green');
    $("#item-add-error").text("adding.. ");

    $.ajax({
      type:'POST',
      url:'ajax_backend.php',
      data:additemformdata,
      processData:false,
      contentType: false,
      success:function(data,textStatus){
        data=JSON.parse(data)

       if(data[0]==1){

         additeminhtmlbody(itemname,itemdescription,itemprice,data[1]);
         addimage="";
         additemformdata=new FormData();
         itemimagestatus=0;
         $("#add-name").val("");
         $("#add-description").val("");
         $("#add-price").val("");
         $("#item-add-error").css('color','green');
         $("#item-add-error").text("added successfully");
         $("#add-item-img-add").hide();
         $("#add-item-img-add2").hide();

         setTimeout(function(){
           $("#item-add-error").text("");
          $("#item-add-error").css('color','red');
        },2000);



       }
       else{
         $("#item-add-error").text(data[1]);


       }
      }


      })


}

function additeminhtmlbody(itemname,itemdescription,itemprice,additemuniqueid){
  localuniqueid=Math.floor(Math.random()*99999)+"ilumpbp";
  itemhtmlcontent = `<div id="shops-data-body" class="shops-data-body-class${localuniqueid}">
          <input type="hidden" id="itemimageinput${localuniqueid}" value="${addimage}">
          <input type="hidden" id="itemsideimageinput${localuniqueid}" value="${addimage2}">
          <input type="hidden" id="itemimagestatusinput${localuniqueid}" value="2">
          <input type="hidden" id="itemsideimagestatusinput${localuniqueid}" value="2">
          <input type="hidden" id="itemnameinput${localuniqueid}" value="${itemname}">
          <input type="hidden" id="itemdescriptioninput${localuniqueid}" value="${itemdescription}">
          <input type="hidden" id="itempriceinput${localuniqueid}" value="${itemprice}">
          <div class="" id="shops-data">
            <a href="javascript:void(0)" onclick="editItemFunction('${localuniqueid}','${additemuniqueid}')">
            <div id="edit-button"  >
              edit
            </div>
          </a>
            <div class="" id="shop-img" >

              <img src="${addimage}" class="item-img${localuniqueid}" style="max-width: 100%;max-height: 100%;margin: auto;position: absolute;left: 0;right: 0;top:0;bottom:0;">
            </div>

            <div  id="item-name" class="item-name${localuniqueid}">
             ${itemname}

            </div>

            <div  id="item-price" class="item-price${localuniqueid}">
              ${itemprice}

            </div>


          </div>
        </div>`
$("#shop-body").prepend(itemhtmlcontent);


}



</script>

<style>

.rotate-90 {
  -moz-transform: rotate(90deg);
  -webkit-transform: rotate(90deg);
  -o-transform: rotate(90deg);
  transform: rotate(90deg);
}

.rotate-180 {
  -moz-transform: rotate(180deg);
  -webkit-transform: rotate(180deg);
  -o-transform: rotate(180deg);
  transform: rotate(180deg);
}

.rotate-270 {
  -moz-transform: rotate(270deg);
  -webkit-transform: rotate(270deg);
  -o-transform: rotate(270deg);
  transform: rotate(270deg);
}

.flip {
  -moz-transform: scaleX(-1);
  -webkit-transform: scaleX(-1);
  -o-transform: scaleX(-1);
  transform: scaleX(-1);
}

.flip-and-rotate-90 {
  -moz-transform: rotate(90deg) scaleX(-1);
  -webkit-transform: rotate(90deg) scaleX(-1);
  -o-transform: rotate(90deg) scaleX(-1);
  transform: rotate(90deg) scaleX(-1);
}

.flip-and-rotate-180 {
  -moz-transform: rotate(180deg) scaleX(-1);
  -webkit-transform: rotate(180deg) scaleX(-1);
  -o-transform: rotate(180deg) scaleX(-1);
  transform: rotate(180deg) scaleX(-1);
}

.flip-and-rotate-270 {
  -moz-transform: rotate(270deg) scaleX(-1);
  -webkit-transform: rotate(270deg) scaleX(-1);
  -o-transform: rotate(270deg) scaleX(-1);
  transform: rotate(270deg) scaleX(-1);
}

#item-img-form{
  width: 85%;
    height: 150px;
    /* FLOAT: LEFT; */
    margin: auto;
    /* MARGIN-LEFT: 10PX; */
    position: relative;
}
</style>

      <!---    EDIT ITEM  -->

        <div id="item-edit-body" style="display:none;">
          <div id="item-edit">
            <div id="edit-item-text" style="width:100%;height:30px;">
            <div style="font-size:16px;font-family:arial;width:50%;heigt:20px;margin:auto;float:left;">Edit Item</div>
            <div id="close-edit-body" class="material-icons" style="font-size:20px;width:48%;text-align:right;">
              <a href="javascript:void(0)">
              <div class="material-icons" id="close-edit">
                close
              </div>
            </a>
            </div>
            </div>
            <div id="edit-all-item-image" style="width: 100%;height: auto;overflow:auto;">
            <div id="edit-item-image">
            <form method="POST" id="item-img-form"  enctype="multipart/form-data">




                   <label for="item-image-upload" >
              <div id="item-image-body" style="border:1px solid black;height:150px;text-align:center;position:relative;">
              <div id="item-image" style="opacity: 0.7;padding-top:10px;">
                <img src="" alt="item-image" id="item-img" style="max-width:120px;max-height:120px;object-fit:cover;position: absolute;top: 0;bottom: 0;left: 0;right: 0;margin: auto;">

              </div>
              <br>
              <div id="select-item-img-body" style="position:relative;">
              <div id="add-item-img">
                update image
              </div><br>
              <div class="material-icons" style="text-align:center;font-size:45px;">
                add_a_photo
              </div>
            </div>

            </div>



                       </label>
                           <input type="file" style="display:none;"  name="item_img" accept="image/*"  required="" id="item-image-upload" />


              </form>
            </div>


            <div id="edit-item-image">
            <form method="POST" id="item-img-form"  enctype="multipart/form-data">




                   <label for="item-image-upload2" >
              <div id="item-image-body" style="border:1px solid black;height:150px;text-align:center;position:relative;">
              <div id="item-image" style="opacity: 0.7;padding-top:10px;">
                <img src="" alt="item-image" id="item-img2" style="max-width:120px;max-height:120px;object-fit:cover;position: absolute;top: 0;bottom: 0;left: 0;right: 0;margin: auto;">

              </div>
              <br>
              <div id="select-item-img-body" style="position:relative;">
              <div id="add-item-img">
                update image
              </div><br>
              <div class="material-icons" style="text-align:center;font-size:45px;">
                add_a_photo
              </div>
            </div>

            </div>



                       </label>
                           <input type="file" style="display:none;"  name="item_img" accept="image/*"  required="" id="item-image-upload2" />


              </form>
            </div>
          </div>

            <br>
            <div id="item-update-error" style="width:100%;text-align:center;">

            </div><br>
            <input type="hidden"  id="edit-uniqueid" value="">
            <div id="edit-item-name">
              <input type="text" placeholder="item name" id="edit-name" value="">
            </div><br>
            <div id="edit-item-description">
              <textarea id="edit-description" placeholder="item description"></textarea>
            </div><br>
            <div id="edit-item-price">
              <input type="number" id="edit-price" placeholder="item price">
          </div><br>
          <div id="edit-update-button">
            <input type="button" id="edit-update" onclick="submit_update_item_form()" value="update">

          </div><br>
          <div style="text-align:center;">or</div><br>
          <div id="edit-delete-button">
            <input type="button" id="edit-delete" value="delete this item">

          </div><br>

          </div>
          <div id="confirm-delete-body" style="position:fixed;display:none;top:0;bottom:0;background-color: white;border:1px solid black;left:0;right:0;margin:auto;width:80%;height:200px;border-radius:10px;box-shadow: 1px 1px 14px 2px;">
            <br><br><br><div id="delete-text" style="text-align:center;font-size:15px;font-family:arial;">
              do you want to delete this item?
            </div><br><br>
            <div id="yes-no-confirm-buttons" style="width:100%;height:50px;">
            <div id="yes-button-box" style="width:50%;height:50px;float:left;">
              <div id="yes-button-center" style="margin:auto;width:40%;height:30px;">
              <input type="button" value="yes" id="yes-button" onclick="deleteitem()" style="width:100%;height:30px;">
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


      <!-- ADD ITEM BODY               -->


      <div id="item-add-body" style="display:none;">
        <div id="item-add">
          <div id="add-item-text" style="width:100%;height:30px;">
          <div style="font-size:16px;font-family:arial;width:50%;heigt:20px;margin:auto;float:left;">Add  Item</div>
          <div id="close-add-body" class="material-icons" style="font-size:20px;width:48%;text-align:right;">
            <a href="javascript:void(0)">
            <div class="material-icons" id="close-add">
              close
            </div>
          </a>
          </div>
        </div>
        <div id="add-all-image" style="width:100%;height:auto;overflow:auto;">

        <div id="add-item-image">
          <form method="POST" id="add-item-img-form"  enctype="multipart/form-data">




                 <label for="add-item-image-upload" >
          <div id="add-item-image-body" style="border:1px solid black;height:150px;text-align:center;position:relative;">
            <div id="item-image-add" style="opacity: 0.7;padding-top:10px;">
              <img src="" alt="add-item-image" id="add-item-img-add" style="display:none;max-width:120px;max-height:120px;object-fit:cover;position: absolute;top: 0;bottom: 0;left: 0;right: 0;margin: auto;">

            </div>
            <br>
            <div id="add-select-item-img-body" style="position:relative;">
            <div id="add-item-img">
              add item image
            </div><br>
            <div class="material-icons" style="text-align:center;font-size:45px;">
              add_a_photo
            </div>
          </div>

          </div>



                     </label>
                         <input type="file" style="display:none;"  name="add_item_img" accept="image/*"  required="" id="add-item-image-upload"  />




            </form>
          </div>

         <div id="add-item-image">
            <form method="POST" id="add-item-img-form2"  enctype="multipart/form-data">




                   <label for="add-item-image-upload2" >
             <div id="add-item-image-body" style="border:1px solid black;height:150px;text-align:center;position:relative;">
              <div id="item-image-add" style="opacity: 0.7;padding-top:10px;">
                <img src="" alt="add-item-image" id="add-item-img-add2" style="display:none;max-width:120px;max-height:120px;object-fit:cover;position: absolute;top: 0;bottom: 0;left: 0;right: 0;margin: auto;">

              </div>
              <br>
              <div id="add-select-item-img-body" style="position:relative;">
              <div id="add-item-img">
                add item image
              </div><br>
              <div class="material-icons" style="text-align:center;font-size:45px;">
                add_a_photo
              </div>
             </div>

             </div>



                       </label>
                           <input type="file" style="display:none;"  name="add_item_img" accept="image/*"  required="" id="add-item-image-upload2"  />




               </form>
        </div>
          </div>
          <br><BR>
          <div id="item-add-error" style="color:red;text-align:center"></div></br>
          <div id="add-item-name">
            <input type="text" id="add-name" placeholder="enter item name">
          </div><br>
          <div id="add-item-description">
            <textarea id="add-description" placeholder="enter description of item (optional)"></textarea>
          </div><br>
          <div id="add-item-price">
            <input type="number" id="add-price" placeholder="enter price">
        </div><br>
        <div id="add-item-btn">
          <input type="button" id="add-itm" value="add" onclick="submit_add_item_form()">

        </div><br>
      </div>
    </div>

    <div id="shop-body">
    <?php
    $i=0;

    while($iteminfofetch=mysqli_fetch_array($selectshopitem)){
      $i=$i+1;
    ?>
        <div id="shops-data-body" class="shops-data-body-class<?php echo $i;?>">
          <input type="hidden" id="itemimageinput<?php echo$i;?>" value="<?php echo $iteminfofetch['itemimg'];?>">
          <input type="hidden" id="itemsideimageinput<?php echo$i;?>" value="<?php echo $iteminfofetch['itemsideimg'];?>">
          <input type="hidden" id="itemimagestatusinput<?php echo$i;?>" value="0">
            <input type="hidden" id="itemsideimagestatusinput<?php echo$i;?>" value="0">
          <input type="hidden" id="itemnameinput<?php echo$i;?>" value="<?php echo $iteminfofetch['itemname'];?>">
          <input type="hidden" id="itemdescriptioninput<?php echo$i;?>" value="<?php echo $iteminfofetch['itemdescription'];?>">
          <input type="hidden" id="itempriceinput<?php echo$i;?>" value="<?php echo $iteminfofetch['itemprice'];?>">
          <div class="" id="shops-data">
            <a href="javascript:void(0)" onclick="editItemFunction('<?php echo $i;?>','<?php echo $iteminfofetch['uniqueid'];?>')">
            <div id="edit-button"  >
              edit
            </div>
          </a>
            <div class="" id="shop-img" >

              <img src="photos/<?php echo $iteminfofetch['itemimg'];?>" class="item-img<?php echo$i;  ?>" style="max-width: 100%;max-height: 100%;margin: auto;position: absolute;left: 0;right: 0;top:0;bottom:0;">
            </div>

            <div  id="item-name" class="item-name<?php echo $i;?>">
             <?php echo $iteminfofetch['itemname'];?>

            </div>

            <div  id="item-price" class="item-price<?php echo $i;?>">
              <?php echo $iteminfofetch['itemprice'];?>

            </div>


          </div>
        </div>
      <?php }?>
    </div>





      </div>
      </body>
      <html>
