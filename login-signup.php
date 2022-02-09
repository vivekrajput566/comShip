<?php
session_start();
if(isset($_POST['login_submit'])){

    $con=new mysqli("localhost","root","","shriecom");
    $userid=$_POST['userid'];
    $userpassword=$_POST['userpassword'];


        $phonenumber_status=1;
        $select_table=$con->prepare("SELECT * FROM userdata WHERE phonenumber=? ");
        $select_table->bind_param("i",$userid);
        $select_table->execute();
        $select_table->store_result();
        $row=$select_table->num_rows;
        $select_table->close();



    if($row==1){

        $select_table_for_password=$con->prepare("SELECT password FROM userdata WHERE phonenumber=?");

        $select_table_for_password->bind_param("s",$userid);
        $select_table_for_password->execute();
        $select_table_for_password->bind_result($password);
        $select_table_for_password->fetch();
        $select_table_for_password->close();
        if($password==$userpassword){


        $option=0;
        $ciphermethod="BF-CBC";
        $ivlength=openssl_cipher_iv_length($ciphermethod);
        $encription_iv=random_bytes($ivlength);
        $encription_key="9543FERFCVDVDVJDVKN%%%EFSDFSDCSDCVSSVXCVXCVSDFWG3235RFWEFKJDVNSDK";
        $encription=openssl_encrypt($userid,$ciphermethod,$encription_key,$option,$encription_iv);
        setcookie("userid_cookie",$encription,time()+(60*60*24*100000));
        setcookie("useriv_cookie",$encription_iv,time()+(60*60*24*100000));
            $_SESSION['userid']=$userid;
            echo("1");
           }
        else{
           echo("Enter valid ID or Password");
        }

    }
    else{
        echo("Enter valid ID or Password");

    }
}

if(isset($_POST['signup_submit'])){
    $con=new mysqli("localhost","root","","shriecom");

    $username=$_POST['username'];
    //$email=$_POST['useremail'];
    $phonenumber=$_POST['userphoneno'];
    $password=$_POST['userpassword'];
    //$address=$_POST['useraddress'];

    /*$select_table=$con->prepare("SELECT * FROM userdata WHERE emailid=?");
    $select_table->bind_param("s",$email);
    $select_table->execute();
    $select_table->store_result();
    $row1=$select_table->num_rows;
    $select_table->close();
    */
    $select_table=$con->prepare("SELECT * FROM userdata WHERE phonenumber=?");
    $select_table->bind_param("s",$phonenumber);
    $select_table->execute();
    $select_table->store_result();
    $row2=$select_table->num_rows;
    $select_table->close();
    if($row2==0){
      $_SESSION['username']=$username;
      //$_SESSION['email']=$email;
      $_SESSION['password']=$password;
      $_SESSION['phonenumber']=$phonenumber;
    //  $_SESSION['address']=$address;
    //$to=$email;
      //  $subject=" YOUR OTP  FROM ananyatrainingcourses.com IS";
        //$message=rand(1111,9999);
//$message="5454";
    //    $_SESSION['signup_otp']=$message;
       //$from="info@anvikait.com";
      //$mail=mail($to,$subject,$message,"From:".$from);
      echo("1");

    }

    else{
    echo("Phone number already exist");
    }

    }





if(isset($_POST['signup_check_otp'])){
  $inputotp=$_POST['signup_check_otp'];
  $oriotp=5656;
  if($inputotp==$oriotp){

  $username=$_SESSION['username'];
//  $email=$_SESSION['email'];
  $password=$_SESSION['password'];
  $phonenumber=$_SESSION['phonenumber'];
//  $address=$_SESSION['address'];

  $con=new mysqli("localhost","root","","shriecom");
  /*$select_table=$con->prepare("SELECT * FROM userdata WHERE emailid=?");
  $select_table->bind_param("s",$email);
  $select_table->execute();
  $select_table->store_result();
  $row1=$select_table->num_rows;
  $select_table->close();
*/
  $select_table=$con->prepare("SELECT * FROM userdata WHERE phonenumber=?");
  $select_table->bind_param("s",$phonenumber);
  $select_table->execute();
  $select_table->store_result();
  $row2=$select_table->num_rows;
  $select_table->close();
  if($row2==0){
    $insertdata=$con->prepare("insert into userdata (username,phonenumber,password) values (?,?,?)");
    $insertdata->bind_param("sis",$username,$phonenumber,$password);
    $insertdata->execute();
    $insertdata->close();
    $lastid=$con->insert_id;

  $option=0;
  $ciphermethod="BF-CBC";
  $ivlength=openssl_cipher_iv_length($ciphermethod);
  $encription_iv=random_bytes($ivlength);
  $encription_key="9543FERFCVDVDVJDVKN%%%EFSDFSDCSDCVSSVXCVXCVSDFWG3235RFWEFKJDVNSDK";
  $encription=openssl_encrypt($phonenumber,$ciphermethod,$encription_key,$option,$encription_iv);
  setcookie("userid_cookie",$encription,time()+(60*60*24*100000));
  setcookie("useriv_cookie",$encription_iv,time()+(60*60*24*100000));

    echo 1;
    $_SESSION['userid']=$phonenumber;

  }
  else{
  echo("Phone number already exist");
  }

  }
  else{
    echo"enter valid otp";
  }

}



?>
