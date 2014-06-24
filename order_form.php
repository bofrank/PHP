<?php

  $myOrder = "";
  
  if($_POST["sala_bao"]){
    $myOrder = $myOrder.$_POST["item1num"]." Sala Bao, ";
  }
  if($_POST["khao_soi_gai"]){
    $myOrder = $myOrder.$_POST["item2num"]." Khao Soi Gai, ";
  }
  if($_POST["phad_thai"]){
    $myOrder = $myOrder.$_POST["item4num"]." Phad Thai, ";
  }
  if($_POST["phad_thai_rai_sen"]){
    $myOrder = $myOrder.$_POST["item5num"]." Phad Thai Rai Sen, ";
  }
  if($_POST["daily_special"]){
    $myOrder = $myOrder.$_POST["item7num"]." Daily Special ";
  }

  if($_POST["notes"]){
    $myOrder = $myOrder.$_POST["notes"]."!";
  }

  $myOrder = $myOrder." at ".$_POST["time"];
  
  $to = "2063291503@vtext.com,poncharee@icloud.com";
  $subject = "Take Out Order";
  $body = "Name: ".$_POST["customer"]." \n Items: ".$myOrder." Phone: ".$_POST["chonhwa"];
  $headers = "From:ticket"."\r\n"."CC: bo@bofrank.com";

  if((strlen($_POST["chonhwa"])==10)&&($_POST["honeypot"]=="")){
    if ((mail($to,$subject,$body,$headers))) {
      echo("Thank you ".$_POST["customer"]." for your take out order of ".$myOrder."!<br><br>");
    }else{
      echo("Your order did not go through, please try again.");
    }
  }else{
    echo("Please use the form at <a href='littleuncleseattle.com'>littleuncleseattle.com</a> to place your order.");
  }

?>