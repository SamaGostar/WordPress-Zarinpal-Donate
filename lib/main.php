<?php 

if ( $_POST ) {
	
	if ( isset($_POST['return']) ) {
		update_option( 'wp_donate_return', $_POST['return'] );
	}
	
	if ( isset($_POST['marchand']) ) {
		update_option( 'wp_donate_marchand', $_POST['marchand'] );
	}
	

	
	echo '
	<div class="WPAlertBar">
		تنظیمات ذخیره شدند !
	</div>
	';
	
}

$wp_donate_return = get_option('wp_donate_return');

$wp_donate_marchand = get_option('wp_donate_marchand');

$wp_donate_password = get_option('wp_donate_password');

?>

<div class="WPDonateMain">

    <h2>پیکره بندی افزونه : </h2>
    
    <form method="post">
        <span>آدرس بازگشت از پرداخت : </span>
        <input type="text" name="return" value="<?php echo $wp_donate_return; ?>" />
        <span> (zp.xxxxxx.x)شماره حساب زین پال شما : </span>
        <input type="text" name="marchand" value="<?php echo $wp_donate_marchand; ?>" />
        
        <input type="submit" class="button-primary" value="ذخیره تنظیمات" />
    </form>
    
    <h2>آموزش استفاده افزونه : </h2>

	<p>برای استفاده از افزونه در برگه ها ، نوشته ها و ابزارک ها میتوانید از کد زیر استفاده نمایید : ( برای استفاده در ابزارک ها میتوانید از ابزارک متنی استفاده کنید )</p>
    <textarea>[WPDonateZarinpal]</textarea>
    
    <p>برای استفاده از افزونه در کد های پوسته خود میتوانید از کد زیر استفاده نمایید :</p>
    <textarea>&lt;?php echo do_shortcode('[WPDonateZarinpal]'); ?&gt;</textarea>

    <div class="copy">توسعه دهنده :  <a href="http://www.masoudamini.ir/">مسعود امینی</a> . </div>

</div>
