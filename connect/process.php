<?php

    $filenameee =  $_FILES['file']['name'];
    $fileName = $_FILES['file']['tmp_name']; 
    $surname = $_POST['surname'];
    $firstname = $_POST['firstname'];
    $address = $_POST['address'];
    $town = $_POST['town'];
    $country = $_POST['country'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $marital = $_POST['marital'];
    $gender = $_POST['gender'];
    $destination = $_POST['destination'];
    $citizenship = $_POST['citizenship'];
    $disability = $_POST['disabelity'];
    $travelwithspouse = $_POST['travelwithspoue'];
    
    $message ="Surname = ". $surname . "\r\n First Name = " . $firstname . "\r\n Address = " . $address . "\r\n Town / City = " . $town . "\r\n Country = " . $country . "\r\n Date of Birth = " . $firstname . "\r\n Email Address = " . $email . "\r\n Phone Number = " . $phone . "\r\n Mariral Status = " . $marital . "\r\n Gender = " . $gender . "\r\n Destination = " . $destination . "\r\n citizenship = " . $citizenship . "\r\n Disabilities = " . $disability . "\r\n Travel With Souse = " . $travelwithspouse;
    
    $subject ="APPLICATION FORM";
    $fromname ="Great Adventure Int'l";
    $fromemail = 'testrun@greatadventureintl.com';  //if u dont have an email create one on your cpanel

    $mailto = 'rotimiariyo@gmail.com';  //the email which u want to recv this email




    $content = file_get_contents($fileName);
    $content = chunk_split(base64_encode($content));

    // a random hash will be necessary to send mixed content
    $separator = md5(time());

    // carriage return type (RFC)
    $eol = "\r\n";

    // main header (multipart mandatory)
    $headers = "From: ".$fromname." <".$fromemail.">" . $eol;
    $headers .= "MIME-Version: 1.0" . $eol;
    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
    $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
    $headers .= "This is a MIME encoded message." . $eol;

    // message
    $body = "--" . $separator . $eol;
    $body .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
    $body .= "Content-Transfer-Encoding: 8bit" . $eol;
    $body .= $message . $eol;

    // attachment
    $body .= "--" . $separator . $eol;
    $body .= "Content-Type: application/octet-stream; name=\"" . $filenameee . "\"" . $eol;
    $body .= "Content-Transfer-Encoding: base64" . $eol;
    $body .= "Content-Disposition: attachment" . $eol;
    $body .= $content . $eol;
    $body .= "--" . $separator . "--";

    //SEND Mail
    if (mail($mailto, $subject, $body, $headers)) {
        header("Location: https://web.facebook.com/"); // Redirect to success page
    exit(); // do what you want after sending the email
        
        
    } else {
        echo "mail send ... ERROR!";
        print_r( error_get_last() );
    }
    
    ?>
    
    
