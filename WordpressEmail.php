<?php
$kit_customer_email = $order->billing_email;

$subject = 'Welcome to LeanBodyMD';
$headers = 'From: LeanBodyMD ';
$message = '<h1> Hi' . $order->billing_first_name . '</h1>';
$message .= '<p> Welcome! Thank you for choosing LeanBodyMD to achieve your weight loss and wellness goals. </p>';
$message .= '<p> Your program kit will arrive in the mail soon. In the meantime, please visit LeanBodyMD.com and take the time to read the LeanBodyMD Program Guidebook, FAQs, blog thoroughly as well as review the grocery lists for each phase,. Each of these items are accessible on the home page. These tools will give you a full understanding of the program and help adequately prepare you for success.</p>';
$message .= '<p> Once your program kit arrives, click the link below on the date you will begin the program. This will activate the LeanBodyMD email coaching series to offer additional tips for success and guidance as you complete the program.</p>';
$message .= '<a href="http://some.com">Link to MailChaip</a>';
$message .= '<p> If you have questions on getting started or need additional guidance not found on the website, you may contact the LeanBodyMD team at </p><a href="mailto:ahsan.munir@vistabit.com"> info@leanbodymd.com</a>';

$message .= '<p>Be Well,</p>';
$message .= '<p>The LeanBodyMD Team</p>';
$message .= '<small>*Please allow at least 48 hours for a response. Hours of operation are Monday through Friday 10am-5pm EST.</small>';
add_filter( 'wp_mail_content_type', 'set_html_content_type' );
@wp_mail( $to, $subject, $message, $headers );
remove_filter( 'wp_mail_content_type', 'set_html_content_type' );
