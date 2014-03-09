<?php
/*
Plugin Name: Zarinpal Donate - حمایت مالی 
Plugin URI: http://www.zarinpal.com
Description: افزونه حمایت مالی از وبسایت با ساختاری حرفه ای و کاملا ایمن 
Version: 1.0
Author: مسعود امینی
Author URI: http://www.masoudamini.ir
*/

! defined( 'ABSPATH' ) and exit;

add_action( 'admin_menu', 'WPAddMenuItem' );

function WPAddMenuItem()
{
    add_menu_page( 'افزونه حمایت مالی زرین پال', 'حمایت مالی', 'install_plugins', 'WPDonateZarinpal', 'WPMenuContent' );
	function WPMenuContent()
	{
		include 'lib/main.php';
	}
}

function WPDonateZarinpalShortcode(){
	add_shortcode('WPDonateZarinpal', 'WPDonateZarinpalForm');
}

function WPDonateZarinpalForm() {
	return '
	
	
	<form action="https://www.zarinpal.com/webservice/Simplepay" method="post" id="TransactionAddForm">
		<input type="hidden" id="TransactionAccountID" value="' . get_option('wp_donate_marchand') . '" name="data[Transaction][account_id]">
		<input type="text" id="TransactionAmount" value="مبلبغ به تومان ..." name="data[Transaction][amount]">
		<input type="text" id="TransactionDesc" value="نام پرداخت کننده" name="data[Transaction][desc]">
		<input type="hidden" id="TransactionRedirectUrl" value="' . get_option('wp_donate_return') . '" name="data[Transaction][redirect_url]">
		<input type="submit"  value="اتصال به درگاه"  name="submit">
	</form>

	';
}

add_action( 'init', 'WPDonateZarinpalShortcode');

function WPDonateStyles() {
	if( is_admin() ) {
		wp_enqueue_style( 'WPDonateAdminStyle', plugins_url('WP-Zarinpal-Donate/css/WPDonateAdmin.css', '__FILE__') );
	} else {
		wp_enqueue_style( 'WPDonateStyle', plugins_url('WP-Zarinpal-Donate/css/WPDonate.css', '__FILE__') );
	}
}

add_action( 'init', 'WPDonateStyles');

?>