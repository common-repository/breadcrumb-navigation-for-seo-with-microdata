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
 
/* ------------------------------------------------------------------------ *
 * Setting Registration
 * ------------------------------------------------------------------------ */

function bnfs_menu_page() {
	include('functions_admin.php');
}

// admin menu function
function bnfs_breadcrumb_admin_menu() {
	add_menu_page('Breadcrumb Menu',		// ID used to identify this section and with which to register options
				  'Breadcrumb Menu',		// Title to be displayed on the administration page
				  'manage_options',			// Which type of users can see this menu item
				  'bnfs_breadcrumb_admin_menu',	// The unique ID - that is, the slug - for this menu item
				  'bnfs_menu_page'				// The name of the function to call when rendering the page for this menu
			);
}
add_action( 'admin_menu', 'bnfs_breadcrumb_admin_menu');
?>