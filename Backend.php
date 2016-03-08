<?php

$curl = curl_init();
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["emails"];

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.sendgrid.com/v3/contactdb/recipients",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "[\n  {\n    \"email\": \"$email\",\n    \"first_name\": \"$fname\",\n    \"last_name\": \"$lname\"\n  }\n]",
  CURLOPT_HTTPHEADER => array(
    "authorization: Bearer {YOUR_API_KEY}",
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo "Thank you for signing up for our Newsletter!";
}
?>