<?php 
	
	require __DIR__ . '/vendor/autoload.php';

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	if (!empty($_POST['formdata'])) {
		
		$formdata = $_POST['formdata'];

		foreach ($formdata as $value) {
			$data[$value['name']] = $value['value'];
		}

		
		$mail = new PHPMailer(true); 

		try {

		    $mail->isSMTP();                                      // Set mailer to use SMTP
		    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		    $mail->SMTPAuth = true;                               // Enable SMTP authentication
		    $mail->Username = 'contact.lee.litigation@gmail.com';                 // SMTP username
		    $mail->Password = 'xxxx xxxx xxxx xxxx';                           // SMTP password
		    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		    $mail->Port = 465;                                    // TCP port to connect to

		    //Recipients
		    $mail->setFrom('contact.lee.litigation@gmail.com', 'Mailer');
		    $mail->addAddress('info@leelitigation.com', 'Info');
		    $mail->addAddress('tara@leelitigation.com', 'Tara');

		    //Content
		    $mail->isHTML(true);
		    $mail->Subject = 'Contact Form';


		    $body = '<h1>Contact Form</h1>
		    <p><strong>Name:</strong> '.$data['name'].'</p>
		    <p><strong>Email:</strong> '.$data['email'].'</p>
		    <p><strong>Phone:</strong> '.$data['phone'].'</p>
		    <p><strong>Subject:</strong> '.$data['subject'].'</p>
		    <p><strong>Message:</strong> '.$data['message'].'</p>';

		    $mail->Body = $body;

		    $mail->send();

		    echo true;

		} catch (Exception $e) {

		    echo false;

		}

	}
	

?>
