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
	<body>
<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {

    $pickupUsername=$_SESSION["pickup-username"];
    $pickupAddress=$_SESSION["pickup-address"];
    $pickupPincode=$_SESSION["pickup-pincode"];
    $pickupMobileNo=$_SESSION["pickup-mobileno"];

    $destinationUsername=$_SESSION["destination-username"];
    $destinationAddress=$_SESSION["destination-address"];
    $destinationPincode=$_SESSION["destination-pincode"];
    $destinationMobileNo=$_SESSION["destination-mobileno"];



      $productName=$_SESSION['product-name'];
      $weight=$_SESSION['product-weight'];
      $amount=$_SESSION['product-amount'];
      $amountCollect=$_SESSION['amount-collect'];
      //insert data
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
		header("location:http://localhost/shriecom/shipments.php");
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	if (isset($_POST) && count($_POST)>0 )
	{
		foreach($_POST as $paramName => $paramValue) {
				echo "<br/>" . $paramName . " = " . $paramValue;
		}
	}


}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>
</body>
</html>
