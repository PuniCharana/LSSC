<?php 
defined('ABSPATH') or die('No direct access permitted');
/*
-------------------------------------------------
                    Shortcode
-------------------------------------------------
*/

/*
Short Code example
[ls_sc_social_connect color="true" style="true"  twitter="user_name" github="user_name" facebook="user_name" google_plus="user_name" pinterest="user_name" flickr="user_name" tumblr="user_name" instagram="user_name" vk="user_name" youtube="user_name"]Follow Us[/ls_sc_social_connect]
*/

add_shortcode( 'ls_sc_social_connect', 'ls_shortcode_social_menu' );

function ls_shortcode_social_menu( $atts, $content ) {
    $atts = shortcode_atts(
        array(
            'content'           => $content,
            'color'             => false,
            'style'             => false,
            'twitter'           => false,
            'facebook'          => false,
            'instagram'         => false,
            'google_plus'       => false,
            'vk'                => false,
            'tumblr'            => false,
            'flickr'            => false,
            'github'            => false,
            'youtube'           => false,
            'pinterest'         => false
        ),$atts
    );
    extract( $atts );
    // If color is true
    if ( $color ) {
        wp_enqueue_style( 'ls-sc-color', plugins_url('../assets/little-sparrow-sc-color.css', __FILE__), array(), '1.0.0' );
    }
    // If style is true
    if ( $style ) {
        wp_enqueue_style( 'ls-sc-style', plugins_url('../assets/little-sparrow-sc-style.css', __FILE__), array(), '1.0.0' );
    }
    $data = '<div id="lssc-connect" class="lssc-sc-connect">';
    // If content use it as title
    if ( !empty( $content ) ){
        $data .= '<h3 class="entry-title">'.$content.'</h3>';
    }
    $data .= '<ul>';
    foreach ( $atts as $key => $value ) {
       if ( $value ) {
            // To exclude color , style  and the content from diplaying
            if ( $key !='color' && $key != 'style' && $key != 'content' ) {
                if ( $key == 'google_plus' ) {
                    $data .='<li class="lssc-'.str_replace( '_', '-', $key ).'">
                            <a href="http://www.plus.google.com/'.$value.'">
                            <i class="fa fa-'.str_replace( '_', '-', $key ).' fa-2x"></i>
                            </a>
                            </li>';
                } else {
                    $data .='<li class="lssc-'.$key.'">
                            <a href="http://www.'.$key.'.com/'.$value.'">
                            <i class="fa fa-'.$key.' fa-2x"></i>
                            </a>
                            </li>';
                }
            }
       }
    }
    $data .= '</ul></div>';
    return $data;
}