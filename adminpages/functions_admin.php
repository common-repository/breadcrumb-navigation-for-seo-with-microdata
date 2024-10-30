<?php 
/*
 * Breadcrumb Navigation for SEO with Microdata
 * Copyright (C) 2015  Tobias Merz

 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.

 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */
 
    if(@$_POST['hidden_bread'] == 'Y') {
        //Form data sent
    } else {
        //Normal page display
    }


if(@$_POST['hidden_bread'] == 'Y') {
        //Text befor the breadcrumbs
        $breadcrumb_text = $_POST['breadcrumb_text'];
        update_option('breadcrumb_text', $breadcrumb_text);
        // color of the text
        $bdc_txt_color = $_POST['bdc_txt_color'];
        update_option('bdc_txt_color', $bdc_txt_color);
        //color
        $bread_col = $_POST['bread_col'];
        update_option('bread_col', $bread_col);
        //color of actual site
        $act_col = $_POST['act_col'];
        update_option('act_col', $act_col);
        // title of home page
        $home_title = $_POST['home_title'];
        update_option('home_title', $home_title);
        
?>
<div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
<?php 
}
if( isset($_POST ['submit2']) ) {
	$theme_1 = $_POST['theme'];
	update_option('theme', $theme_1);
}

/* ------------------------------------------------------------------------ *
 * Inserts from Admin Panel input fields
 * ------------------------------------------------------------------------ */

		// text before breadcrumbs
		$text_val = get_option('breadcrumb_text');
		// color of the text
		$text_color_val = get_option('bdc_txt_color');
		// color of links
		$color_val = get_option('bread_col');
		//color of actual site
		$act_color_val = get_option('act_col');
		// home title
		$title_home_val = get_option('home_title');

		
?>

<div class="wrap">
    <h1><?php    echo "Settings for the Breadcrumb Navigation"; ?></h1>
    </br></br>
    <form name="theme_form"  method="post" action="">
    <p><input type="radio" name="theme" value="default">Default</p>
	<p><input type="radio" name="theme" value="213">Twenty Thirteen</p>
	<p><input type="radio" name="theme" value="214">Twenty Fourteen</p>
	<p><input type="radio" name="theme" value="215">Twenty Fifteen</p>
	<p><input type="radio" name="theme" value="zerif">Zerif</p>
    <input type="submit" name="submit2" value="Update Theme Options" />
</form>
    <form name="bread_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
        <input type="hidden" name="hidden_bread" value="Y">
        <p><?php _e("Breadcrumb Text: " ); ?><input type="text" style="margin-left:60px;" name="breadcrumb_text" value="<?php _e($text_val); ?>" size="20"><?php _e(" ex: You are here" ); ?></p>
        <p><?php _e("Breadcrumb Text Color: " ); ?><input type="color" style="margin-left:25px;" name="bdc_txt_color" value="<?php _e($text_color_val); ?>" size="20"><?php _e(" The text color of the Breadcrumb Text" ); ?></p>
        <p><?php _e("Title of the Home Page: " ); ?><input type="text" style="margin-left:27px;" name="home_title" value="<?php _e($title_home_val) ?>" size="20"><?php _e(" ex: HOME" ); ?></p>
        <p><?php _e("Color of the links:");?><input type="color" style="margin-left:67px;" name="bread_col" value="<?php _e($color_val); ?>" size="20"></p>
        <p><?php _e("Color of the actual page:");?><input type="color" style="margin-left:26px;" name="act_col" value="<?php _e($act_color_val); ?>" size="20"></p>
       	<p class="submit">
        <input type="submit" name="Submit" value="<?php _e('Update Options', 'trdom_bread' ) ?>" />
        </p>
    </form>
</div>

<p class="donate"><b>If you like my Plugin please make a donation.</b></p>
<div class="donate_button">
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="N7GRP39J2SJRS">
<input type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online.">
<img alt="" border="0" src="https://www.paypalobjects.com/de_DE/i/scr/pixel.gif" width="1" height="1">
</form>
</div>