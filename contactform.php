<?php
use PHPMailer\PHPMailer\PHPMailer;
if(isset($_POST['name'])&& isset($_POST['mail'])){
    $name=$_POST['name'];
    $subject=$_POST['subject'];
    $mailfrom=$_POST['mail'];
    $message=$_POST['message'];
    $mymaail="ofekron33@gmail.com"; 
    $headers="From: ".$mailfrom;

    $txt="You have recieved an e-mail from ".$name.".\n\n". $message;
    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail=new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host="smtp.gmail.com";
    $mail->SMTPAuth=true;
    $mail->Username="ofekron33@gmail.com";
    $mail->Password="ofek9013";
    $mail->Port="587";
    $mail->SMTPSecure="ssl";

    $mail->isHTML(true);
    $mail->SetFrom($email,$name);
    $mail->addAddress("ofekron33@gmail.com")
    $mail->Subject=("$email"($subject)");
    $mail->Body=$body;

    if($mail->send()){
        $status="success";
        $response="Email is sent!"; 
    }

    else{
        $status="failed";
        $response="something is wrong <br>".$mail->Errorinfo;
    }

    exit(json_encode(array("status" =>$status,"response" =>$response)));}
    



    mail($mymaail,$subject,$txt,$headers);
    header("Location: index.php?mailsend")

}
?>