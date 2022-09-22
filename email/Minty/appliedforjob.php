<?php
include_once('email_funcs.php');

/*
echo get_email_head().get_email_webviewpart().get_email_menu().get_email_fullwidth_img()
.email_headtxt('Hello'.getBsnsTitle($bsns, $dbh).',', $align='left', $padding='0 15px')
.email_txt('HELLO', $align='left', $padding='0 15px').email_btn('HELLO', 'asdsad', 'center', $padding='0 15px').get_email_LR_IHSB('HEAD','dsada','left','right','btxt','blink').get_email_footer();

echo get_email_head().get_email_webviewpart().get_email_menu().get_email_fullwidth_img()
.email_headtxt('Hello '.$contname.',', $align='left', $padding='0 15px')
.email_txt('You have received new proposal for the job <b>'.$jtitle.'</b>', $align='left', $padding='0 15px').email_btn('HELLO', 'asdsad', 'center', $padding='0 15px').get_email_LR_IHSB('HEAD','dsada','left','right','btxt','blink').get_email_footer();*/


echo get_email_head().get_email_webviewpart().get_email_menu().get_email_fullwidth_img()
.email_headtxt('Hello '.$contname.',', $align='left', $padding='0 15px')
.email_txt('You have received new proposal for the job <a href="">'.$jtitle.'</a>', $align='left', $padding='0 15px')
.email_btn('VIEW', 'asdsad', 'left', $padding='0 15px')
.get_email_LR_IHSB('HEAD','dsada','left','right','btxt','blink')
.get_email_footer();
?>