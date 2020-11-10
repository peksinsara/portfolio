<?php

if(isset($_POST['submit'])){
    #getting the data
    $name=$_POST['name'];
    $mailFrom=$_POST['email'];
    $message=$_POST['text'];

    $mailTo="peksin.sara@gmail.com";
    $headers="From: ".$mailFrom;
    $txt="You have recived an e-mail from ".$name.".\n\n".$message;

    mail( $mailTo,$subject,$txt, $headers);
    header("Location: index.html?mailsend");
}