<html>
    <head>
        <title></title>
		<meta charset="UTF-8" />
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <style>
            body{
                position: relative;
            }
            div{
                text-align: center;
                position:absolute;
                left:50%;
                right:0;
                top:50%;
                bottom:0;
                margin:auto;
                max-width:100%;
                max-height:100%;
                overflow:auto;
                transform: translate(-50%, -50%);
            }
            p{
                font-family: 'Roboto';
                letter-spacing: 1px;
                line-height: 6px;
            }
            .ic{
                width: 100px;
                height: 100px;
            }
            .text1{
                text-align: center;
                font-weight: bold;
                font-size: 18px;
            }
            .text2{
                text-align: center;
                font-weight: bold;
                font-size: 14px;
            }
            .text3{
                text-align: center;
                font-size: 12px;
            }
        </style>
        <script type="text/javascript">
            var n = 5;
            window.setInterval(function(){
                n--;
                document.getElementById('num').innerHTML=n;
            },1000);
            window.setTimeout(function(){
                window.location.replace("index.html");
				
            },5000);
        </script>
		
		
    </head>
    <body>
        <div>
            <img class="ic" src="https://www.shareicon.net/data/256x256/2016/08/20/817720_check_395x512.png" alt="icon"/>
            <p class="text1">Demande envoyée avec succès!</p>
            <p class="text2">Merci pour votre temps</p>
            <p class="text3">Vous allez être redirigé dans <span id="num">5</span> secondes.</p>
        </div>
    </body>
</html>


	<?php    require 'phpmailer/PHPMailerAutoload.php';

   $mail = new PHPMailer(true);
try {

   
  

    if(isset($_POST['submit'])){
        $to = "email@example.com"; // this is your Email address
        $from = $_POST['form_email']; // this is the sender's Email address
	$msg='Nom:'.$_POST['form_name']	."<br><br>"
	.'Sujet:'.$_POST['form_subject'] ."<br><br>"
	.'Email:'.$_POST['form_email']."<br><br>"
	.'Numero:'.$_POST['form_phone']."<br><br>"
	.'Message:'.$_POST['form_message']."<br><br>";

	  $subject = "Form submission";
        $subject2 = "Copy of your form submission";
        // $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];
        // $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];



        //Server settings
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'Info_SZM.casablanca@gmail.com';                 // SMTP username
        $mail->Password = 'Info_SZM1234';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom($from, 'Info_SZM');
        $mail->addAddress('Info_SZM.casablanca@gmail.com', $_POST['form_name']);     // Add a recipient
        $mail->addAddress($_POST['form_email']);               // Name is optional
        $mail->addReplyTo('Info_SZM.casablanca@gmail.com', 'Information');
        //$mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('uploads/'.$file_name);   
//$mail->addAttachment('uploads/'.$file_nom);  		// Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $msg;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->send();
    }
    // echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
	
	
	
	
	
	
	
	
?>	