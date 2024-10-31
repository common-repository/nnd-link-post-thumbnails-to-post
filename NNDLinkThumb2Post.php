<?php
/*
Plugin Name: NND Link Thumbs 2 Posts
Plugin URI: http://nnd.bostonsuperblog.com/2010/10/30/wordpress-plug-in-nndlinkthumb2post/
Description: Makes post thumbnails link to post with post title as image title
Version: 1.1
Author: Dan Jones
Author URI: http://nnd.BostonSuperBlog.com
License: GPL2
*/

/*  Copyright YEAR  PLUGIN_AUTHOR_NAME  (email : PLUGIN AUTHOR EMAIL)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
add_filter( 'post_thumbnail_html', 'NND_Link_2_Post', 10, 3 );

function NND_Link_2_Post( $html, $post_id, $post_image_id ) {

$html = '<a href="' . get_permalink( $post_id ) . '" title="' . get_the_title($post_id) . '">' . $html . '</a>';

return $html;
}

/* Let's throw in a donate link and see if anyone does... */
if ( !function_exists( 'add_NND_donate_link' ) ) :
 function add_NND_donate_link($links, $file) {
static $this_plugin;
if (!$this_plugin) $this_plugin = plugin_basename(__FILE__);

if ($file == $this_plugin){
$donate_link = '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ZZJD8LKR2UAE8" target="_blank">Donate</a>';
 array_push($links, $donate_link);
}
return $links;
 }
endif;

 add_filter('plugin_row_meta', 'add_NND_donate_link', 10, 2 );
?>