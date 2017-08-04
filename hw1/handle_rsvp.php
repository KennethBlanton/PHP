<?php

$phone = $_REQUEST["phoneNumber"];
$firstName = $_REQUEST["firstName"];
$lastName = $_REQUEST["lastName"];
$email = $_REQUEST["email"];
$drink = $_REQUEST["drink"];
$comments = $_REQUEST["comments"];
$postInfo = array($phone,$drink,$firstName,$lastName,$email,$comments);
// echo $email;

foreach ($postInfo as $info) {
  if(empty($info)) {
    die("Must enter SOMETHING in fields!");
  }
}

$postEntry = ucwords(implode(", ", $postInfo));
$postData = $postEntry."\n";

function writeToGuest($postData){
  $fileName = "guest.csv";
  $date = date("Y-m-d H:i:s");


  $handler = fopen($fileName, "a+");
  fwrite($handler, $postData);
  fclose($handler);
}
  // die($postData);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo $email;
    die("Must enter a valid email");
}

if(!preg_match('/^[0-9]{3}[0-9]{3}[0-9]{4}$/', $phone)){
  die("please enter a valid phone number");
}

writeToGuest($postData);

mail("kjblanton1992@gmail.com", $firstName." ".$lastName." has RSVP'd!", "Lets party");

echo "Thanks ".$firstName." for RSVP'ing. Feel free to check out the guest list or don't it's your life."; ?>
  <div class="links" style="">
    <a href="guest.csv"> See Who's coming</a>
  </div>


