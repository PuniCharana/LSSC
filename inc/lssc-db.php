<?php 
defined('ABSPATH') or die('No direct access permitted');
/*
-------------------------------------------------
                    Sare Buttons
-------------------------------------------------
*/

/*
* Option Page
*/


// create custom plugin settings menu
add_action( 'admin_menu', 'lssc_plugin_create_menu' );

function lssc_plugin_create_menu() {

    //create new top-level menu
    add_menu_page( 'LSSC Plugin Settings', 'LSSC Settings', 'administrator', __FILE__, 'lssc_plugin_settings_page' );

    //call register settings function
    add_action( 'admin_init', 'register_lssc_plugin_settings' );
}


function register_lssc_plugin_settings() {
    //register our settings
    register_setting( 'lssc-plugin-settings-group', 'ls_title_optional_name' );
    register_setting( 'lssc-plugin-settings-group', 'ls_location_page' );
    register_setting( 'lssc-plugin-settings-group', 'ls_location_post' );
    register_setting( 'lssc-plugin-settings-group', 'ls_exclude' );
    register_setting( 'lssc-plugin-settings-group', 'ls_share_facebook' );
    register_setting( 'lssc-plugin-settings-group', 'ls_share_twitter' );
    register_setting( 'lssc-plugin-settings-group', 'ls_share_google_plus' );
    register_setting( 'lssc-plugin-settings-group', 'ls_share_vk' );
    register_setting( 'lssc-plugin-settings-group', 'ls_share_tumblr' );
    register_setting( 'lssc-plugin-settings-group', 'ls_select_placement' );
    register_setting( 'lssc-plugin-settings-group', 'ls_select_size' );
    register_setting( 'lssc-plugin-settings-group', 'ls_color' );
    register_setting( 'lssc-plugin-settings-group', 'ls_style' );
    register_setting( 'lssc-plugin-settings-group', 'ls_shortcode' );
}

//page set up for the LSSC option page
function lssc_plugin_settings_page() {
?>
<div class="wrap">
<h2>LS Social Connect</h2>
<hr>
<form method="post" action="options.php">
    <?php settings_fields( 'lssc-plugin-settings-group' ); ?>
    <?php do_settings_sections( 'lssc-plugin-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Title (Optional) </th>
        <td>
            <input type="text" name="ls_title_optional_name" value="<?php echo esc_attr( get_option('ls_title_optional_name') ); ?>" placeholder="eg: Follow Me"/>
        </td>
        </tr>


        <tr valign="top">
        <th scope="row">Select Networks</th>
        <td>
            <input type="checkbox" name="ls_share_facebook" <?php if ( get_option( 'ls_share_facebook' ) ) echo "checked"; ?> />Facebook<br>
            <input type="checkbox" name="ls_share_twitter" <?php if ( get_option( 'ls_share_twitter' ) ) echo "checked"; ?> />Twitter<br>
            <input type="checkbox" name="ls_share_google_plus" <?php if ( get_option( 'ls_share_google_plus' ) ) echo "checked"; ?> />Google+<br>
            <input type="checkbox" name="ls_share_vk" <?php if ( get_option( 'ls_share_vk' ) ) echo "checked"; ?> />VK<br>
            <input type="checkbox" name="ls_share_tumblr" <?php if ( get_option( 'ls_share_tumblr' ) ) echo "checked"; ?> />Tumblr<br>
        </td>
        </tr>

        <tr valign="top">
        <th scope="row">Location</th>
        <td>
            <input type="checkbox" name="ls_location_page" <?php if ( get_option( 'ls_location_page' ) ) echo "checked"; ?> />Page<br>
            <input type="checkbox" name="ls_location_post" <?php if ( get_option( 'ls_location_post' ) ) echo "checked"; ?> />Post<br>
        </td>
        </tr>
        <tr valign="top">
        <th scope="row">Exclude Page</th>
        <td>
            <p>Enter a list of pages to be excluded from displaying the buttons with coma(,) seperating each of them.</p>
            <input type="text" name="ls_exclude" value="<?php echo esc_attr( get_option('ls_exclude') ); ?>" placeholder="eg: contact,about"/>
        </td>
        </tr>

        <?php $options_array = array( 'Above', 'Below', 'Both' ); ?>
        <tr valign="top">
        <th scope="row">PLacement</th>
        <td><select name="ls_select_placement">
            <?php
            foreach ( $options_array as $value ) {
                $selected = get_option( 'ls_select_placement' );
                if ( $selected == $value ) {
                    echo '<option value="'.$value.'" selected>'.$value.'</option>';
                } else {
                    echo '<option value="'.$value.'">'.$value.'</option>';
                }
            }
            ?>
        </select></td>
        </tr>

        <?php $options_array = array( 'Small', 'Medium' ); ?>
        <tr valign="top">
        <th scope="row">Button size</th>
        <td><select name="ls_select_size">
            <?php
            foreach ($options_array as $value) {
                $selected = get_option( 'ls_select_size' );
                if ( $selected == $value ) {
                    echo '<option value="'.$value.'" selected>'.$value.'</option>';
                } else {
                    echo '<option value="'.$value.'">'.$value.'</option>';
                }
            }
            ?>
        </select></td>
        </tr>

        <tr valign="top">
        <th scope="row">Color</th>
        <td>
            <?php $color = get_option( 'ls_color' ); ?>
            <input type="radio" name="ls_color" value="default" <?php if( $color == 'default' ) echo 'checked'; ?>>Default<br>
            <input type="radio" name="ls_color" value="black" <?php if( $color == 'black' ) echo 'checked'; ?>>Black<br>
            <input type="radio" name="ls_color" value="white" <?php if( $color == 'white' ) echo 'checked'; ?>>White<br>
        </td>
        </tr>

        <tr valign="top">
        <th scope="row">Style</th>
        <td>
        <input type="checkbox" name="ls_style" <?php if( get_option( 'ls_style' ) ) echo "checked"; ?> />
        <span>Unchecked if you want to style yourself</span>
        </td>
        </tr>

    </table>
    <?php submit_button(); ?>
    <hr><hr>
    <h2>Shortcode</h2><br>
    <span>Copy the code and place it anywhere you want in your page/post.</span><br>
    <span>Note : Enter your name in place of user_name (only user name).</span><br><br>
    <textarea name="ls_shortcode" rows="5" cols="100">[ls_sc_social_connect color="true" style="true"  twitter="user_name" github="user_name" facebook="user_name" google_plus="user_name" pinterest="user_name" flickr="user_name" tumblr="user_name" instagram="user_name" vk="user_name" youtube="user_name"]Follow Us[/ls_sc_social_connect]
    </textarea>

</form>
<hr>
<p>Find out more about LS Social Connect <a href="https://badworldandme.wordpress.com/plugins/ls-social-connect/">Learn more...</a></p>
</div>
<?php 
}/* End Of Display Options Page */


/*
* Cool stuff
*/
function ls_share_content_modify( $content ) {
    // Check is any options for page post or the networks options are selected
    // If nothing is selected do nothing and return the content  
    if(
        ( get_option( 'ls_location_page' )    ||
        get_option( 'ls_location_post' )      ||
        get_option( 'ls_location_excerpt' ) ) &&
        ( get_option( 'ls_share_facebook' )   ||
        get_option( 'ls_share_twitter' )      ||
        get_option( 'ls_share_google_plus' )  ||
        get_option( 'ls_share_tumblr' )       ||
        get_option( 'ls_share_vk' ) )
    ){

        $share_button = '<div id="lssc-db-share" class="lssc-db-share">';
        if( get_option('ls_title_optional_name') ){
            $share_button .= '<h2>'.get_option( 'ls_title_optional_name' ).'</h2>';
        }
        $share_button .= '<ul>';
            // Buttons option list
            $network_array = array(
                'facebook'      => get_option( 'ls_share_facebook' ),
                'twitter'       => get_option( 'ls_share_twitter' ),
                'google_plus'   => get_option( 'ls_share_google_plus' ),
                'vk'            => get_option( 'ls_share_vk' ),
                'tumblr'        => get_option( 'ls_share_tumblr' ),
                'pinterest'     => get_option( 'ls_share_pinterest' )
            );
            // If options selected add to the share button array
            foreach ( $network_array as $ls_key => $ls_value ) {
                if ( $ls_value ) {
                    if ( $ls_key == 'tumblr' ) {
                        $share_button .= '<li class="lssc-db-'.$ls_key.'"><a href="https://www.'.$ls_key.'.com/share/link?u='.get_permalink().'" target="_blank"><i class="fa fa-tumblr"></i></a> </li>';
                    }
                    if ( $ls_key == 'facebook' ) {
                        $share_button .= '<li class="lssc-db-'.$ls_key.'"><a href="https://www.'.$ls_key.'.com/sharer.php?u='.get_permalink().'" target="_blank"><i class="fa fa-facebook"></i></a> </li>';
                    }
                    if ( $ls_key == 'twitter' ) {
                        $share_button .= '<li class="lssc-db-'.$ls_key.'"><a href="https://www.'.$ls_key.'.com/share?u='.get_permalink().'"  target="_blank"><i class="fa fa-twitter"></i></a> </li>';
                    }
                    if ( $ls_key == 'google_plus' ) {
                        $share_button .= '<li class="lssc-db-'.str_replace( '_', '-', $ls_key ).'"><a href="https://www.plus.google.com/share?u='.get_permalink().'"  target="_blank"><i class="fa fa-google-plus"></i></a> </li>';
                    }
                    if ( $ls_key == 'vk' ) {
                        $share_button .= '<li class="lssc-db-'.$ls_key.'"><a href="https://www.vkontokte.ru/share.php?u='.get_permalink().'"  target="_blank"><i class="fa fa-vk"></i></a> </li>';
                    }
                }
            }
        $share_button .= '</ul></div>';
        // Get the current page name
        $page_name = get_post();
        $page_name = strtolower($page_name->post_title);
        // Explode the exclude page into array and compare with the current page 
        $array_page = explode(',',ltrim(rtrim(get_option('ls_exclude'),','),','));
        // Chech if there is an exclude page that match with the current page
        // If match set the page name to found
        foreach ( $array_page as $exclude_page ) {
            if ( $page_name === $exclude_page ) {
                $page_name = 'found';
            }
        }
        // If exclude page dont do anything
        // return the content 
        if ( $page_name != 'found' ) {
            // Note : Doing this way because this is returning a value
            //Check if display is on for both page and post
            if ( get_option('ls_location_page' ) && get_option( 'ls_location_post' ) ) {
                // Check where to place the share buttons ie above, below or both.
                // If both if selected place the share buttons above and below the content 
                if ( get_option( 'ls_select_placement' ) == 'Both' ) {
                    return $share_button.$content.$share_button;
                // If above is selected : Place the buttons above the content
                } elseif ( get_option( 'ls_select_placement' ) == 'Above' ) {
                    return $share_button.$content;
                // Place the buttons below the content
                } else {
                    return $content.$share_button;
                }
            // If page is selected only
            } elseif ( get_option( 'ls_location_page' ) ) {
                // Check if it is a page not a post
                if ( is_page() ) {
                    // Check where to place the share buttons ie above, below or both.
                    // If both if selected place the share buttons above and below the content 
                    if ( get_option( 'ls_select_placement' ) == 'Both' ) {
                        return $share_button.$content.$share_button;
                    // If above is selected : Place the buttons above the content
                    } elseif ( get_option( 'ls_select_placement' ) == 'Above' ) {
                        return $share_button.$content;
                    // Place the buttons below the content
                    } else {
                        return $content.$share_button;
                    }
                // If not page return
                } else {
                    return $content;
                }
            // If post is selected only
            } elseif ( get_option( 'ls_location_post' ) ) {
                // Check if it is a post not a page
                if ( !is_page() ) {
                    // Check where to place the share buttons ie above, below or both.
                    // If both if selected place the share buttons above and below the content 
                    if ( get_option( 'ls_select_placement' ) == 'Both' ) {
                        return $share_button.$content.$share_button;
                    // If above is selected : Place the buttons above the content
                    } elseif ( get_option( 'ls_select_placement' ) == 'Above' ) {
                        return $share_button.$content;
                    // Place the buttons below the content
                    } else {
                        return $content.$share_button;
                    }
                // Do nothing
                } else {
                    return $content;
                }
            // No location is selected
            } else {
                return $content;
            }
        // If exclude page is found do nothing return the content
        }else{
            return $content;
        }
    // Nothing is selected
    } else {
        return $content;        
    }
}
add_filter( 'the_content', 'ls_share_content_modify' );


add_action( 'wp_head','enqueue_css' );

function enqueue_css() {

    /*
    * Size
    * Colors
    * Styling
    */
    if ( get_option( 'ls_select_size' ) == 'Medium' ) {
        //Display medium button
        //Colors
        if ( get_option( 'ls_color' ) == 'white' ) {
            // Color = White
            wp_enqueue_style( 'ls-db-m-black', plugins_url('../assets/little-sparrow-db-m-white.css', __FILE__), array(), '1.0.0' );
        } elseif ( get_option( 'ls_color' ) == 'black' ) {
            // Color = Black
            wp_enqueue_style( 'ls-db-m-white', plugins_url('../assets/little-sparrow-db-m-black.css', __FILE__), array(), '1.0.0' );

        } else {
            //Default = With brand color
            wp_enqueue_style( 'ls-db-m-color', plugins_url('../assets/little-sparrow-db-m-color.css', __FILE__), array(), '1.0.0' );
        }
    } else {
        // Default small button
        //Colors
        if ( get_option( 'ls_color' ) == 'white' ) {
            // Color = White
            wp_enqueue_style( 'ls-db-s-black', plugins_url('../assets/little-sparrow-db-s-white.css', __FILE__), array(), '1.0.0' );
        } elseif ( get_option( 'ls_color' ) == 'black' ) {
            // Color = Black
            wp_enqueue_style( 'ls-db-s-white', plugins_url('../assets/little-sparrow-db-s-black.css', __FILE__), array(), '1.0.0' );

        }  else {
            //Default = With brand color
            wp_enqueue_style( 'ls-db-s-color', plugins_url('../assets/little-sparrow-db-s-color.css', __FILE__), array(), '1.0.0' );
        }

    }
    if ( get_option( 'ls_style' ) ) {
         wp_enqueue_style( 'ls-db-style', plugins_url( '../assets/little-sparrow-db-style.css', __FILE__ ), array(), '1.0.0' ); 
    }
}