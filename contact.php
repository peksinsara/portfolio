<?php
if(isset($_POST['email'])){
    $email_to="peksin.sara@gmail.com";
    $email_subject="From portfolio";
    
    function problem($error)
    {
        echo "I'm sorry, but the error is found";
        echo "These errors appear below. <br><br>";
        echo $error . "<br><br>";
    die();
    }
    if(   
           !isset($_POST['name']) ||
    !isset($_POST['email']) ||
    !isset($_POST['text'])
    ){
        problem('We are sorry, but there has been a problem with your submission.');

    }
    $name = $_POST['name']; // required
    $email = $_POST['email']; // required
    $message = $_POST['text']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
if (!preg_match($email_exp, $email)) {
        $error_message .= 'The Email address you entered does not appear to be valid.<br>';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if (!preg_match($string_exp, $name)) {
        $error_message .= 'The Name you entered does not appear to be valid.<br>';
    }

    if (strlen($message) < 2) {
        $error_message .= 'The Message you entered do not appear to be valid.<br>';
    }

    if (strlen($error_message) > 0) {
        problem($error_message);
    }
    $email_message = "Form details below.\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "name: " . clean_string($name) . "\n";
    $email_message .= "email: " . clean_string($email) . "\n";
    $email_message .= "text: " . clean_string($text) . "\n";

    // create email headers
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
?>

    <!-- include your success message below -->

    Thank you for contacting us. We will be in touch with you very soon.

<?php
}
?>