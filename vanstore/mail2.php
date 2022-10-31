<?php
	$name = 'nithin';
	$from = 'tnithin.18.it@anits.edu.in';
	$phone = '9494364499';
	$subject = 'HELLOOO';
	$message = 'PORA FRUIT';
	
	$headers ="From: Form Contact <$from>\n";
	$headers.="MIME-Version: 1.0\n";
	$headers.="Content-type: text/html; charset=iso 8859-1";
	
	ob_start();
	?>
		Hi imransdesign!<br /><br />
		<?php echo ucfirst( $name ); ?>  has sent you a message via contact form on your website!
		<br /><br />
		
		Name: <?php echo ucfirst( $name ); ?><br />
		Email: <?php echo $from; ?><br />
		Phone: <?php echo $phone; ?><br />
		Subject: <?php echo $subject; ?><br />
		Message: <br /><br />
		<?php echo $message; ?>
		<br />
		<br />
		============================================================
	<?php
	$body = ob_get_contents();
	ob_end_clean();
	
	$to = 'thotanithin29@gmail.com';

	$s = mail($to,$subject,$body,$headers,"-t -i -f $from");

	if( $s == 1 ){
		echo '<div class="success"><i class="fas fa-check-circle"></i><h3>Thank You!</h3>Your message has been sent successfully.</div>';
	}else{
		echo '<div>Your message sending failed!</div>';
	}	
?>