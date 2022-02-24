<?php
session_start();
if(isset($_POST['shopregister'])){

    if(($_FILES['shop_img']['type'] == 'image/gif')
  	 || ($_FILES['shop_img']['type']== 'image/jpeg')
     || ($_FILES['shop_img']['type'] == 'image/jpg')
     || ($_FILES['shop_img']['type'] == 'image/png'))
     {

// Get image name
	  $RANDOM=rand(10000000000,99999999999);
  	$image = $RANDOM.$_FILES['shop_img']['name'];
    $image_name=$RANDOM.$_FILES['shop_img']['name'];
  	// image file directory
  	$target = "photos/".basename($image);
    $image=$_FILES['shop_img']['tmp_name'];
    $imagetype=$_FILES['shop_img']['type'];
    switch($imagetype){
      case 'image/jpeg':
            $image = imagecreatefromjpeg($image);
            break;
        case 'image/png':
            $image = imagecreatefrompng($image);
            break;
        case 'image/gif':
            $image = imagecreatefromgif($image);
            break;
        default:
            $image = imagecreatefromjpeg($image);


    }
    imagejpeg($image,$target,20);

	// Note: $image is an Imagick object, not a filename! See example use below.




   }
   else{
     echo("please select valid image");
     exit();
   }
   $phonenumber=$_SESSION['userid'];
   $shopname=$_POST['shopname'];
   $shopownername=$_POST['shopownername'];
   $shopaddress=$_POST['shopaddress'];
   //$phonenumber=$_POST['shopphonenumber'];
   $shopcategory=$_POST['shopcategory'];
   $con=new mysqli("localhost","root","","shriecom");
   if($con){

     $insertdata=$con->prepare("insert into shopinfo (shopname,shopownername,shopaddress,phonenumber,shopimg,shopcategory) values (?,?,?,?,?,?)");
     $insertdata->bind_param("ssssiss",$shopname,$shopownername,$shopaddress,$phonenumber,$image_name,$shopcategory);
     $insertdata->execute();
     $insertdata->close();
     $lastid=$con->insert_id;
     mkdir($lastid);
     $content="<?php include('../shop.php'); ?>";
     $dir=$lastid.'/index.php';
     $indexfile=fopen($dir,'w');
     fwrite($indexfile,$content);
     $_SESSION['shopowner']=$phonenumber;
     $_SESSION['shop-register-form']=$phonenumber;
   }
   else{
     echo"no ok";
   }


   echo 1;

}


if(isset($_POST['shop_item_submit']) && isset($_SESSION['userid'])){
  $itemlist=json_decode($_POST['itemlist']);
  $phonenumber=$_SESSION['userid'];
  $con=new mysqli("localhost","root","","shriecom");


  foreach ($itemlist as $itemdata ){
    $itemid=$itemdata[0];
    $itemprice=$itemdata[1];
    $selectdata=mysqli_query($con,"select itemname,itemdescription,itemimg from itemselect where id=$itemid");
    $fetcheddata=mysqli_fetch_array($selectdata);
    $phonenumber=$_SESSION['userid'];
    $selectuser=mysqli_query($con,"select id from shopinfo where phonenumber=$phonenumber");
    $fetchshopinfo=mysqli_fetch_array($selectuser);
    $shopid=$fetchshopinfo['id'];
    $itemname=$fetcheddata['itemname'];
    $RANDOM=rand(10000000000,99999999999);
    $itemdescription=$fetcheddata['itemdescription'];
    $itemimg=$fetcheddata['itemimg'];
    $item_url_text=preg_replace("/\s+/","-",$itemname);
    $itemname=str_replace("-"," ",$itemname);
    $item_url_link=$RANDOM.$item_url_text.".php";
    $itemfile=fopen("store".'/'.$item_url_link,"w");
    $content="<?php include('../item.php');?>";
    fwrite($itemfile,$content);
    $uniqueid=uniqid("ilumpbp",true);
    $status=0;
    $itemcode=0;
    $potstatus=0;
    $amazonprice=0;
    $flipkartprice=0;
    $otherwebsiteprice=0;
    $insertdata=$con->prepare("insert into shopitem (shopid,itemname,itemdescription,itemcode,potstatus,amazonprice,flipkartprice,otherwebsiteprice,itemprice,itemimg,itemurl,uniqueid,status) values (?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $insertdata->bind_param("ississsi",$shopid,$itemname,$itemdescription,$itemcode,$potstatus,$amazonprice,$flipkartprice,$otherwebsiteprice,$itemprice,$itemimg,$item_url_link,$uniqueid,$status);
    $insertdata->execute();
    $insertdata->close();

  }
  unset($_SESSION['shop-register-form']);
  echo 1;
}


if(isset($_POST['confirm_order'])){

  $itemid=$_POST['itemid'];
  $itemquantity=$_POST['itemquantity'];
  $phonenumber=$_SESSION['userid'];
  $con=new mysqli("localhost","root","","shriecom");
  $selectitemtable=mysqli_query($con,"select * from shopitem where uniqueid='$itemid' ");
  if(mysqli_num_rows($selectitemtable)==1){
    $RANDOM=rand(10000000000,99999999999);
    $orderid=$RANDOM;
  $fetchshopinfo=mysqli_fetch_array($selectitemtable);
  $shopid=$fetchshopinfo['shopid'];
  $shopownerphonenumber=$fetchshopinfo['phonenumber'];
  $status=1;
  $insertdata=$con->prepare("insert into itemorder (shopownerphonenumber,shopid,customerphonenumber,itemuniqueid,itemquantity,status,orderid) values (?,?,?,?,?,?,?)");
  $insertdata->bind_param("sissiii",$shopownerphonenumber,$shopid,$phonenumber,$itemid,$itemquantity,$status,$orderid);
  $insertdata->execute();
  $insertdata->close();
  echo 1;
  exit();
 }
 else{
   echo "please confirm valid item";
 }


}

if(isset($_POST['confirm_cart_order'])){


  $phonenumber=$_SESSION['userid'];
  $con=new mysqli("localhost","root","","shriecom");
  $selectcarttable=mysqli_query($con,"select * from shoppingcart where phonenumber=$phonenumber ");
  if(mysqli_num_rows($selectcarttable)!=0){
    $noOfItems=mysqli_num_rows($selectcarttable);
    $count=0;
    $RANDOM=rand(10000000000,99999999999);
    $orderid=$RANDOM;
    while($cartdata=mysqli_fetch_array($selectcarttable)){
      $itemid=$cartdata['uniqueid'];
      $itemquantity=$cartdata['quantity'];
  $selectitemtable=mysqli_query($con,"select * from shopitem where uniqueid='$itemid' ");

  if(mysqli_num_rows($selectitemtable)==1){
  $fetchshopinfo=mysqli_fetch_array($selectitemtable);
  $shopid=$fetchshopinfo['shopid'];
  //$shopownerphonenumber=$fetchshopinfo['phonenumber'];
  $status=1;
  $insertdata=$con->prepare("insert into itemorder (phonenumber,shopid,itemuniqueid,itemquantity,status,orderid) values (?,?,?,?,?,?)");
  $insertdata->bind_param("iissii",$phonenumber,$shopid,$itemid,$itemquantity,$status,$orderid);
  $insertdata->execute();
  $insertdata->close();
  $count=$count+1;
  if($count==$noOfItems){
    echo 1;
    exit();
  }

 }
 else{
   echo "please confirm valid item";
   break;
   exit();
 }
 }
 }
 else{
   exit();
 }
 exit();


}




if(isset($_POST['accept_order'])){
  $itemid=$_POST['itemid'];
  $phonenumber=$_SESSION['userid'];
  $con=new mysqli("localhost","root","","shriecom");
  $selectitemtable=mysqli_query($con,"select * from itemorder where id='$itemid' ");
  if(mysqli_num_rows($selectitemtable)==1){

  $status=2;
  $insertdata=$con->prepare("update itemorder set status=? where id=?");
  $insertdata->bind_param("ii",$status,$itemid);
  $insertdata->execute();
  $insertdata->close();
  echo 1;
  exit();
 }
 else{
   echo "please confirm valid item";
 }


}

if(isset($_POST['decline_order'])){
  $itemid=$_POST['itemid'];
  $phonenumber=$_SESSION['userid'];
  $con=new mysqli("localhost","root","","shriecom");
  $selectitemtable=mysqli_query($con,"select * from itemorder where id='$itemid'");
  if(mysqli_num_rows($selectitemtable)==1){

  $status=3;
  $insertdata=$con->prepare("update itemorder set status=? where id=?");
  $insertdata->bind_param("ii",$status,$itemid);
  $insertdata->execute();
  $insertdata->close();
  echo 1;
  exit();
 }
 else{
   echo "please confirm valid item";
 }


}



if(isset($_POST['add_item_to_cart'])){

  $itemid=$_POST['itemid'];
  $itemquantity=$_POST['itemquantity'];
  $phonenumber=$_SESSION['userid'];
  $con=new mysqli("localhost","root","","shriecom");
  $selectcarttable=mysqli_query($con,"select * from shoppingcart where uniqueid='$itemid' ");
  if(mysqli_num_rows($selectcarttable)==0){



  $selectitemdata=mysqli_query($con,"select * from shopitem where uniqueid='$itemid' ");
  $fetchitemdata=mysqli_fetch_array($selectitemdata);
  $insertdata=$con->prepare("insert into shoppingcart (phonenumber,uniqueid,quantity) values (?,?,?)");
  $insertdata->bind_param("iss",$phonenumber,$itemid,$itemquantity);
  $insertdata->execute();
  $insertdata->close();
  echo 1;
  exit();
 }
 echo 1;


}

if(isset($_POST['update_item_to_cart'])){

  $itemid=$_POST['itemid'];
  $itemquantity=$_POST['itemquantity'];
  $phonenumber=$_SESSION['userid'];
  $con=new mysqli("localhost","root","","shriecom");
  $selectcarttable=mysqli_query($con,"select * from shoppingcart where uniqueid='$itemid' and phonenumber=$phonenumber ");
  if(mysqli_num_rows($selectcarttable)==1){

  $updatedata=$con->prepare("update shoppingcart set quantity=? where uniqueid=? and phonenumber=?");
  $updatedata->bind_param("sss",$itemquantity,$itemid,$phonenumber);
  $updatedata->execute();
  $updatedata->close();
  echo 1;
  exit();
 }
 else{
   echo 0;
   exit();
 }
 echo 1;


}


if(isset($_POST['quantity_change'])){
  $itemquantity=$_POST['quantity'];
  $itemuniqueid=$_POST['uniqueid'];
  //echo $itemquantity." ".$itemuniqueid;
  $con=new mysqli("localhost","root","","shriecom");
  $selectcarttable=mysqli_query($con,"update shoppingcart set quantity=$itemquantity where uniqueid='$itemuniqueid'");
  //echo 1;

}

if(isset($_POST['removeitem'])){

  $itemuniqueid=$_POST['uniqueid'];
  //echo $itemquantity." ".$itemuniqueid;
  $con=new mysqli("localhost","root","","shriecom");
  $selectcarttable=mysqli_query($con,"delete from shoppingcart where uniqueid='$itemuniqueid'");
  //echo 1;

}

if(isset($_POST['updateitem'])){

  $itemname=$_POST['itemname'];
  $itemdescription=$_POST['itemdescription'];
  $itemprice=$_POST['itemprice'];
  $itemuniqueid=$_POST['itemuniqueid'];
  $phonenumber=$_SESSION['userid'];
  $imagestatus=0;
  $imageStatus=$_POST['updateimagestatus'];
  $imageStatus=intval($imageStatus);

  if($imageStatus==11){
    $e=1;
  }
  else if ($imageStatus==1 || $imageStatus==2){
    $e=0;
  }
  else{
        $e=-1;
  }
  if($imageStatus!=0){
$image_name=array();
$i=0;

while($i<=$e){

  if(($_FILES['item_img']['type'][$i] == 'image/gif')
   || ($_FILES['item_img']['type'][$i]== 'image/jpeg')
   || ($_FILES['item_img']['type'][$i]== 'image/jpg')
   || ($_FILES['item_img']['type'][$i]== 'image/png'))
   {

// Get image name
  $RANDOM=rand(10000000000,99999999999);
  $image = $RANDOM.$_FILES['item_img']['name'][$i];

  array_push($image_name,$RANDOM.$_FILES['item_img']['name'][$i]);

  // image file directory
  $target = "photos/".basename($image);
  $image=$_FILES['item_img']['tmp_name'][$i];
  if(($_FILES['item_img']['type'][$i] == 'image/jpg') || ($_FILES['item_img']['type'][$i] == 'image/jpeg')) {
    $exif=exif_read_data($image);
  }
  $imagetype=$_FILES['item_img']['type'][$i];
  switch($imagetype){
    case 'image/jpeg':
          $image = imagecreatefromjpeg($image);
          break;
      case 'image/png':
          $image = imagecreatefrompng($image);
          break;
      case 'image/gif':
          $image = imagecreatefromgif($image);
          break;
      default:
          $image = imagecreatefromjpeg($image);


  }

if(($_FILES['item_img']['type'][$i] == 'image/jpg') || ($_FILES['item_img']['type'][$i] == 'image/jpeg')){
  if (!empty($exif['Orientation'])) {

      switch ($exif['Orientation']) {
          case 3:
              $image = imagerotate($image, 180, 0);
              break;

          case 6:
              $image = imagerotate($image, -90, 0);
              break;

          case 8:
              $image = imagerotate($image, 90, 0);
              break;
      }
    }
  }

  imagejpeg($image,$target,20);
    }
// Note: $image is an Imagick object, not a filename! See example use below.

 else{

     echo("please select valid image");
     exit();

 }
 $i=$i+1;
}
}



  $con=new mysqli("localhost","root","","shriecom");
  $selectshopitemtable=mysqli_query($con,"select * from shopitem where uniqueid='$itemuniqueid' && phonenumber=$phonenumber");
  $iteminfofetch=mysqli_fetch_array($selectshopitemtable);
  if(mysqli_num_rows($selectshopitemtable)==1){
    $item_url_text=preg_replace("/\s+/","-",$itemname);
    $itemname=str_replace("-"," ",$itemname);
    $RANDOM=rand(10000000000,99999999999);
    $item_url_link=$RANDOM.$item_url_text.".php";
    $shopid=$iteminfofetch['shopid'];
    $oldfilename=$iteminfofetch['itemurl'];
    rename("store"."/".$oldfilename,"store"."/".$item_url_link);
    if($imageStatus==0){

    $updateshopitemtable=mysqli_query($con,"update shopitem set itemname='$itemname',itemdescription='$itemdescription',itemprice='$itemprice',itemurl='$item_url_link' where uniqueid='$itemuniqueid' ");
    echo 1;
    }

    else if($imageStatus==1){
      $updateshopitemtable=mysqli_query($con,"update shopitem set itemname='$itemname',itemdescription='$itemdescription',itemprice='$itemprice',itemimg='$image_name[0]',itemurl='$item_url_link' where uniqueid='$itemuniqueid' ");
      echo 1;
    }
    else if($imageStatus==2){
      $updateshopitemtable=mysqli_query($con,"update shopitem set itemname='$itemname',itemdescription='$itemdescription',itemprice='$itemprice',itemsideimg='$image_name[0]',itemurl='$item_url_link' where uniqueid='$itemuniqueid' ");
      echo 1;
    }
    else{
      $updateshopitemtable=mysqli_query($con,"update shopitem set itemname='$itemname',itemdescription='$itemdescription',itemprice='$itemprice',itemimg='$image_name[0]',itemsideimg='$image_name[1]',itemurl='$item_url_link' where uniqueid='$itemuniqueid' ");
      echo 1;
    }
  }
  else{
    echo 0;
  }



}

if(isset($_POST['deleteitem'])){

  $itemuniqueid=$_POST['itemuniqueid'];
  //echo $itemquantity." ".$itemuniqueid;
  $con=new mysqli("localhost","root","","shriecom");
  $status=1;
  $selectcarttable=mysqli_query($con,"update shopitem set status=$status where uniqueid='$itemuniqueid'");
  echo 1;

}



if(isset($_POST['additem'])){

  $itemname=$_POST['itemname'];
  $itemdescription=$_POST['itemdescription'];
  $itemprice=$_POST['itemprice'];
  $i=0;

  if((($_FILES['add_item_img']['type'][0] == 'image/gif')
   || ($_FILES['add_item_img']['type'][0]== 'image/jpeg')
   || ($_FILES['add_item_img']['type'][0] == 'image/jpg')
   || ($_FILES['add_item_img']['type'][0] == 'image/png'))
   && (($_FILES['add_item_img']['type'][1] == 'image/gif')
    || ($_FILES['add_item_img']['type'][1]== 'image/jpeg')
    || ($_FILES['add_item_img']['type'][1] == 'image/jpg')
    || ($_FILES['add_item_img']['type'][1] == 'image/png')))
   {
     $image_name=array();

     while($i<=1){

  // Get image name
  $RANDOM=rand(10000000000,99999999999);
  $image = $RANDOM.$_FILES['add_item_img']['name'][$i];

  array_push($image_name,$RANDOM.$_FILES['add_item_img']['name'][$i]);

  // image file directory
  $target = "photos/".basename($image);
  $image=$_FILES['add_item_img']['tmp_name'][$i];

  if(($_FILES['add_item_img']['type'][$i] == 'image/jpg') || ($_FILES['add_item_img']['type'][$i] == 'image/jpeg')) {
  $exif=exif_read_data($image);
}
  $imagetype=$_FILES['add_item_img']['type'][$i];
  switch($imagetype){
    case 'image/jpeg':
          $image = imagecreatefromjpeg($image);
          break;
      case 'image/png':
          $image = imagecreatefrompng($image);
          break;
      case 'image/gif':
          $image = imagecreatefromgif($image);
          break;
      default:
          $image = imagecreatefromjpeg($image);


  }


if(($_FILES['add_item_img']['type'][$i] == 'image/jpg') || ($_FILES['add_item_img']['type'][$i] == 'image/jpeg')) {

    if (!empty($exif['Orientation'])) {

        switch ($exif['Orientation']) {
            case 3:
                $image = imagerotate($image, 180, 0);
                break;

            case 6:
                $image = imagerotate($image, -90, 0);
                break;

            case 8:
                $image = imagerotate($image, 90, 0);
                break;
        }
      }
    }
  imagejpeg($image,$target,20);

  $i=$i+1;
 }

  // Note: $image is an Imagick object, not a filename! See example use below.


  $con=new mysqli("localhost","root","","shriecom");
  $phonenumber=$_SESSION['userid'];
  $selectuser=mysqli_query($con,"select id from shopinfo where phonenumber=$phonenumber");
  $fetchshopinfo=mysqli_fetch_array($selectuser);
  $shopid=$fetchshopinfo['id'];
  $item_url_text=preg_replace("/\s+/","-",$itemname);
  $itemname=str_replace("-"," ",$itemname);
  $selectshopitemtable=mysqli_query($con,"select * from shopitem where itemname='$itemname' && phonenumber=$phonenumber && status=0");
  //if(mysqli_num_rows($selectshopitemtable)==0){
  $RANDOM=rand(10000000000,99999999999);
  $item_url_link=$RANDOM.$item_url_text.".php";
  $itemfile=fopen("store".'/'.$item_url_link,"w");
  $content="<?php include('../item.php');?>";
  fwrite($itemfile,$content);
  $uniqueid=uniqid("ilumpbp",true);
  $status=0;
  $itemimg=$image_name[0];
  $itemimg2=$image_name[1];
  $insertdata=$con->prepare("insert into shopitem (phonenumber,shopid,itemname,itemdescription,itemprice,itemimg,itemsideimg,itemurl,uniqueid,status) values (?,?,?,?,?,?,?,?,?,?)");
  $insertdata->bind_param("sississssi",$phonenumber,$shopid,$itemname,$itemdescription,$itemprice,$itemimg,$itemimg2,$item_url_link,$uniqueid,$status);
  $insertdata->execute();
  $insertdata->close();
  $send=[1,$uniqueid];
  echo json_encode($send);
  exit();
//  }
//  else{
//    $send=[0,"item name aready exist please add more in name ex:product company name or size of item etc."];
//    echo json_encode($send);
//  }





  }

  else{

     echo("please select valid image");
     exit();

  }



}

if(isset($_POST['searchinput'])){
  $inputtext=$_POST['inputtext'];
  $con=new mysqli("localhost","root","","shriecom");
  $selectitemtable=mysqli_query($con,"select distinct  itemname from shopitem where itemname like '$inputtext%' or itemdescription like '$inputtext%' ");

  $selectitemtable2=mysqli_query($con,"select distinct itemname from shopitem where itemname like '%$inputtext%' and itemname not like '$inputtext%' ");
  $fetchresult2=mysqli_fetch_all($selectitemtable2);
  $fetchresult=mysqli_fetch_all($selectitemtable);
  //print_r($fetchresult);
  $resultarray=[1];
  array_push($resultarray,$fetchresult);
  array_push($resultarray,$fetchresult2);
  $resultarray=json_encode($resultarray);

  echo $resultarray;
  exit();

}

if(isset($_POST['fetchsearchresult'])){

  $inputtext=$_POST['inputtext'];

  $con=new mysqli("localhost","root","","shriecom");
  $selectitemtable=mysqli_query($con,"select shopitem.shopid,shopitem.itemurl,shopitem.itemname,shopitem.itemprice,shopitem.itemimg,shopinfo.shopname from shopitem inner join shopinfo on shopinfo.id=shopitem.shopid where itemname='$inputtext' ");
  $fetchresult=mysqli_fetch_all($selectitemtable);
  $resultarray=[1];
  array_push($resultarray,$fetchresult);

  $resultarray=json_encode($resultarray);

  echo $resultarray;
  exit();

}

if(isset($_POST['pickup-data'])){
  $username=$_POST['pickup-username'];
  $useraddress=$_POST['pickup-address'];
  $userpincode=$_POST['pickup-pincode'];
  $usermobileno=$_POST['pickup-mobileno'];
  $productweight=$_POST['product-weight'];
  $pickup_status="ok";

  $_SESSION['pickup-username']=$username;
  $_SESSION['pickup-address']=$useraddress;
  $_SESSION['pickup-pincode']=$userpincode;
  $_SESSION['pickup-mobileno']=$usermobileno;
  $_SESSION['product-weight']=$productweight;
  $_SESSION['pickup-details']=$pickup_status;


  echo 1;
  exit();

}

if(isset($_POST['destination-data'])){
  $username=$_POST['destination-username'];
  $useraddress=$_POST['destination-address'];
  $userpincode=$_POST['destination-pincode'];
  $usermobileno=$_POST['destination-mobileno'];

  $destination_status="ok";

  $_SESSION['destination-username']=$username;
  $_SESSION['destination-address']=$useraddress;
  $_SESSION['destination-pincode']=$userpincode;
  $_SESSION['destination-mobileno']=$usermobileno;
  $_SESSION['destination-details']=$destination_status;
  echo 1;
  exit();

}


if(isset($_POST['ecom-customer-details'])){
  $username=$_POST['destination-username'];
  $useraddress=$_POST['destination-address'];
  $userpincode=$_POST['destination-pincode'];
  $usermobileno=$_POST['destination-mobileno'];
  $customerid=$_SESSION['userid'];

  $con=new mysqli("localhost","root","","shriecom");

  $insert_into_table=$con->prepare("insert into ecom_customer_delivery_details (username,phonenumber,address,pincode,customerid) values (?,?,?,?,?)");
  $insert_into_table->bind_param("sisii",$username,$usermobileno,$useraddress,$userpincode,$customerid);
  $insert_into_table->execute();
  $insert_into_table->close();
  $_SESSION['ecom-customer-delivery-details']="ok";
  echo 1;
  exit();

}

if(isset($_POST['update-ecom-customer-details'])){
  $username=$_POST['username'];
  $useraddress=$_POST['useraddress'];
  $userpincode=$_POST['userpincode'];
  $usermobileno=$_POST['userphoneno'];
  $customerid=$_SESSION['userid'];

  $con=new mysqli("localhost","root","","shriecom");
  $update_customer_details=$con->prepare("update ecom_customer_delivery_details set username=?, phonenumber=?, address=?, pincode=? where customerid=?");
  $update_customer_details->bind_param("sisii",$username,$usermobileno,$useraddress,$userpincode,$customerid);
  $update_customer_details->execute();
  $update_customer_details->close();

  echo 1;
  exit();

}

if(isset($_POST['product-data'])){
  $productName=$_POST['product-name'];
  $weight=$_POST['product-weight'];
  $amount=$_POST['product-amount'];
  $amountCollect=$_POST['amount-collect'];

  $product_status="ok";

  $_SESSION['product-name']=$productName;
  $_SESSION['product-weight']=$weight;
  $_SESSION['product-amount']=$amount;
  $_SESSION['amount-collect']=$amountCollect;
  $_SESSION['product-details']=$product_status;
  echo 1;
  exit();

}



?>
