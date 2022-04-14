<?php
$ref = $_GET['reference'];
if ($ref == "") {
  header("Location:javascript://history.go(-1)");
}
?>

<?php

  $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($ref),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer   ",//Insert paystack Public Secret Key here
      "Cache-Control: no-cache",
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
  
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    $result = json_decode($response);
  }
  if($result->data->status == "success") {
    $status = $result->data->status;
     $reference = $result->data->reference;
     $lname = $result->data->customer->last_name;
     $fname = $result->data->customer->first_name;
     $fullname = $lname.' '.$fname;
     $amount = $result->data->amount;
     $channel = $result->data->channel;
     $email = $result->data->customer->email;
     date_default_timezone_set('Africa/Lagos');
     $date_time = date('m/d/Y h:i:s a', time());

     $connection = require_once 'php/db_oop.php';
     if($connection->verifyPayment($status, $reference, $amount, $fullname, $date_time, $channel, $email)){
      header("Location: success.php?status=success");
      exit;
     }else{
       echo "Some thing went wrong";
     }
  }else{
    header("Location: error.html");
    exit;
  }
  $connection = null;
?>