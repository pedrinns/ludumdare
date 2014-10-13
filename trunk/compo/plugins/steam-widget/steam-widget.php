<?php
/*
Plugin Name: steam-widget
Plugin URI: http://ludumdare.com/
Description: Steam Group and Curator widget
Version: 1.0
Author: Mike Kasprzak
Author URI: http://www.sykhronics.com
License: BSD
*/
// - ----------------------------------------------------------------------------------------- - //
// Store the current directory part of the requested URL (for building paths to files) //
@$http_dir = dirname($_SERVER["REQUEST_URI"]);
chdir(dirname(__FILE__));	// Change Working Directory to where I am (for my local paths) //
// - ----------------------------------------------------------------------------------------- - //

function wp_steam_info_get( $more_query => "" ) {
	global $wpdb;
	return $wpdb->get_results("
		SELECT *
		FROM `wp_steam_info`
		{$more_query};
	", ARRAY_A);
}

function wp_steam_games_get( $more_query => "" ) {
	global $wpdb;
	return $wpdb->get_results("
		SELECT *
		FROM `wp_steam_games`
		{$more_query};
	", ARRAY_A);	
}


/*
<div class="header"></div>
<div class="content nobottom">
  <div class="logo"></div>
  <div class="avatar"></div>
  <div class="headline_small">STEAM CURATOR</div>
  <div class="headline_big">Ludum Dare</div>
</div>
<div class="content nobottom">Steam games created during Ludum Dare events. <strong>Follow us!</strong> Help share LD with everyone!</div>
<div class="content overflow">
  <div class="left"><div class="countbox" style="color:#8bc53f">
    <div class="count">13</div>
    <div class="label">GAMES</div>
  </div></div>
  <div class="right"><div class="countbox" style="color:#62a7e3">
  <span class="right">
    <div class="follow_button" style="margin-left:12px;margin-top:5px">Follow</div>
  </span>
  <span class="left">
    <div class="count">2,000</div>
    <div class="label">FOLLOWERS</div>
  </span>
  </div></div>
</div>
<div class="rule"></div>
<div class="content center">
  <div class="banner new"><a href="somehting" title="open on STEAM"><img src="http://cdn.akamai.steamstatic.com/steam/apps/274290/capsule_231x87.jpg" /></a></div>
  <div class="banner soon"><a href="somehting" title="open on STEAM"><img src="http://cdn.akamai.steamstatic.com/steam/apps/321560/capsule_231x87.jpg" /></a></div>
  <div class="banner"><a href="somehting" title="open on STEAM"><img src="http://cdn.akamai.steamstatic.com/steam/apps/274190/capsule_231x87.jpg" /></a></div>
</div>
<div class="rule"></div>
<div class="content nobottom">
  <span class="right">
    <div class="follow_button" style="float:right">Join</div>
  </span>
  <div class="avatar_small"></div>
  <div class="headline_small">STEAM GROUP</div>
  <div class="headline_big">Ludum Dare</div>
</div>
<div class="content nobottom">Dev together. Play together.</div>
<div class="content overflow">
  <div class="left"><div class="countbox" style="color:#9a9a9a">
    <div class="count">555</div>
    <div class="label">MEMBERS</div>
  </div></div>
  <div class="right"><div class="countbox" style="color:#62a7e3">
    <div class="count">55</div>
    <div class="label">ONLINE</div>
  </div></div>
  <div class="center"><div class="countbox" style="color:#8bc53f">
    <div class="count">5</div>
    <div class="label">IN-GAME</div>
  </div></div>
</div>
<div class="footer"></div>
*/

add_action( 'wp_enqueue_scripts', 'prefix_add_my_stylesheet' );
function prefix_add_my_stylesheet() {
    wp_register_style( 'steam-style', plugins_url('style.css', __FILE__) );
    wp_enqueue_style( 'steam-style' );
}

?>
