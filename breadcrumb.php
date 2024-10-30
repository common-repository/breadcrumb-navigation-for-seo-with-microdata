<?php 
/*
 * Plugin Name: Breadcrumb Navigation for SEO with Microdata 
 * Description: With this Plugin you can generate a breadcrumb navigation with Microdata format from schema.org.
 * Author: 		Tobias Merz
 * Version:		1.2
 * License: 	GPLv2 or later
 */
?>
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

require_once( plugin_dir_path( __FILE__ ) . 'adminpages/admin.php');
require_once(plugin_dir_path(__FILE__) . 'check_theme.php');


/* ------------------------------------------------------------------------ *
 * Stylesheet
 * ------------------------------------------------------------------------ */
// get styles
function bnfs_load_style() {
	wp_enqueue_style(
			'breadcrumb-style',
			plugins_url('css/style.css', __FILE__));
}
// load stylesheet
add_action ('init', 'bnfs_load_style');



function bnfs_gen_breadcrumbs() {
	
	// Disable error reporting for notices
	error_reporting( error_reporting() & ~E_NOTICE );
	/* ------------------------------------------------------------------------ *
	 * WP stuff
	 * ------------------------------------------------------------------------ */

	// Home
	$domain = get_home_url();
	// Title of the Webpage
	$title .= get_bloginfo( 'name', 'display' );
	// Post_ID
	$post = get_the_ID();
	// Category
	$cat = get_the_category();
	$cat_link = get_category_link($cat);
	// get Category name
	foreach( $cat as $category ) {
		$output .=  esc_html( $category->name );
	}
	// get Category URL
	$categories = get_the_category();
	$category_id = $categories[0]->cat_ID;
	$cat_url = get_category_link( $category_id );
	// Name of Post
	$actual_title = get_the_title();
	// URL of post
	$p_url = get_permalink( $post );
	
/* ------------------------------------------------------------------------ *
 * Inserts from Admin Panel input fields
 * ------------------------------------------------------------------------ */
	
	// text before breadcrumbs
	$text = get_option('breadcrumb_text');
	if ($text == null) {
		$text = "You are here";
	}
	// color of the text
	$text_color = get_option('bdc_txt_color');
	// color of links
	$color = get_option('bread_col');
	//color of actual site
	$act_color = get_option('act_col');
	// home title
	$title_home = get_option('home_title');
	if ($title_home == null) {
		$title_home = $title;
	}

	/*
	 * THEME
	 */
	$theme_2 = get_option('theme');
	/*
	 * Get different css classes for the output
	 */
	
	switch ($theme_2) {
		case 'zerif': 
			$style = 'own';
			break;
		case '213':
			$style = 'own2';
			break;
		case '215': 
			$style = 'own3';
			break;
		case '214':
			$style = "own4";
			break;
		case 'default':
			$style = 'own';
			break;
	}
	/* ------------------------------------------------------------------------ *
	 * Breadcrumb output
	 * ------------------------------------------------------------------------ */
	// evaluate if page is a post or category
	if (is_single()) {
	echo'
	<ol class="'. $style .'" id="single">
		<span style="color:'. $text_color .'">'. $text .' : &nbsp; </span>
		<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
			<a itemprop="url" href="' . $domain . '" style="color:'.$color.'" title="' . $title_home .'">
				<span itemprop="title">'. $title_home . '</span>
			</a>
		</li>
		<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
			<a itemprop="url" itemprop="child" href="' . $cat_url . '" style="color:'.$color.'" title="' . trim($output) .'" >
				<span itemprop="title">'. trim($output) . '</span>
			</a>
		</li>
		<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
			<a itemprop="url" itemprop="child" href="' . $p_url . '" style="color:'.$act_color.'" title="' . $actual_title . '">
				<span itemprop="title">' . $actual_title . '</span>
			</a>
		</li>
	</ol>
	';
	}
	elseif (is_category()) {
		echo'
		<ol class="'. $style .'" id="single">
			<span style="color:'. $text_color .'">'. $text .' : &nbsp; </span>
			<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
				<a itemprop="url" href="' . $domain . '" style="color:'.$color.'" title="' . $title_home .'">
					<span itemprop="title">'. $title_home . '</span>
				</a>
			</li>
			<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb" style="color:'.$act_color.'">
				<a itemprop="url" href="' . $cat_url . '" style="color:'.$act_color.'" title="' . trim($output) . '">
					<span itemprop="title" itemprop="child" >' . trim($output) . '</span>
				</a>
		</li>
		</ol>
				';
	}
}
add_action ('wp_head', 'bnfs_gen_breadcrumbs');
?>