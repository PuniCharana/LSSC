<?php 
defined('ABSPATH') or die('No direct access permitted');
/*
* Widgetdize social connect
*/

add_action( 'widgets_init', 'register_social_connect_widget' );

function register_social_connect_widget() {
    register_widget( 'Little_Sparrow_Widget_Social_Connect' );
}

class Little_Sparrow_Widget_Social_Connect extends WP_widget {
    function __construct() {
        $option = array(
            'name'        => 'Little Sparrow Social Connect',
            'description' => 'Add social menu to the sidebar'
        );
        parent::__construct( 'Little_Sparrow_Widget_Social_Connect', '', $option );
    }
    public function form( $instance ) {
        extract( $instance );
        ?>
        <p><b>Note: </b>Leave the title blank unless you want to style it your own</p>
        <p>
            <label for="<?php echo $this->get_field_id( 'lssc_w_title' ); ?>">Title</label>
            <input
            type="text"
            class="widefat"
            id="<?php echo $this->get_field_id( 'lssc_w_title' ); ?>"
            name="<?php echo $this->get_field_name( 'lssc_w_title' ); ?>"
            value="<?php if ( isset( $lssc_w_title ) ) echo esc_attr( $lssc_w_title ); ?>"
            placeholder="Menu Tittle"
            />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'lssc_w_style' ); ?>">Style</label>
            <input
            type="checkbox"
            class="widefat"
            id="<?php echo $this->get_field_id( 'lssc_w_style' ); ?>"
            name="<?php echo $this->get_field_name( 'lssc_w_style' ); ?>"
            <?php if ( isset( $lssc_w_style ) ) echo 'checked'; ?>
            />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('lssc_w_color'); ?>">Color</label>
            <input
            type="checkbox"
            class="widefat"
            id="<?php echo $this->get_field_id( 'lssc_w_color' ); ?>"
            name="<?php echo $this->get_field_name( 'lssc_w_color' ); ?>"
            <?php if (isset($lssc_w_color)) echo 'checked'; ?>
            />
        </p>

        <p><b>Note: </b>Enter only your user name</p>

        <p>
            <label for="<?php echo $this->get_field_id( 'lssc_w_facebook' ); ?>">Facebook</label>
            <input
            type="text"
            class="widefat"
            id="<?php echo $this->get_field_id( 'lssc_w_facebook' ); ?>"
            name="<?php echo $this->get_field_name( 'lssc_w_facebook' ); ?>"
            value="<?php if ( isset( $lssc_w_facebook ) ) echo esc_attr( $lssc_w_facebook ); ?>"
            placeholder="user_name"
            />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'lssc_w_twitter' ); ?>">Twitter</label>
            <input
            type="text"
            class="widefat"
            id="<?php echo $this->get_field_id( 'lssc_w_twitter' ); ?>"
            name="<?php echo $this->get_field_name( 'lssc_w_twitter' ); ?>"
            value="<?php if ( isset( $lssc_w_twitter ) ) echo esc_attr( $lssc_w_twitter ); ?>"
            placeholder="user_name"
            />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'lssc_w_youtube' ); ?>">Youtube</label>
            <input
            type="text"
            class="widefat"
            id="<?php echo $this->get_field_id( 'lssc_w_youtube' ); ?>"
            name="<?php echo $this->get_field_name( 'lssc_w_youtube' ); ?>"
            value="<?php if ( isset( $lssc_w_youtube ) ) echo esc_attr( $lssc_w_youtube ); ?>"
            placeholder="user_name"
            />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'lssc_w_instagram' ); ?>">Instagram</label>
            <input
            type="text"
            class="widefat"
            id="<?php echo $this->get_field_id( 'lssc_w_instagram' ); ?>"
            name="<?php echo $this->get_field_name( 'lssc_w_instagram' ); ?>"
            value="<?php if ( isset( $lssc_w_instagram ) ) echo esc_attr( $lssc_w_instagram ); ?>"
            placeholder="user_name"
            />
        </p>

         <p>
            <label for="<?php echo $this->get_field_id( 'lssc_w_tumblr' ); ?>">Tumblr</label>
            <input
            type="text"
            class="widefat"
            id="<?php echo $this->get_field_id( 'lssc_w_tumblr' ); ?>"
            name="<?php echo $this->get_field_name( 'lssc_w_tumblr' ); ?>"
            value="<?php if ( isset( $lssc_w_tumblr ) ) echo esc_attr( $lssc_w_tumblr ); ?>"
            placeholder="user_name"
            />
        </p>

         <p>
            <label for="<?php echo $this->get_field_id( 'lssc_w_flickr' ); ?>">Flickr</label>
            <input
            type="text"
            class="widefat"
            id="<?php echo $this->get_field_id( 'lssc_w_flickr' ); ?>"
            name="<?php echo $this->get_field_name( 'lssc_w_flickr' ); ?>"
            value="<?php if ( isset($lssc_w_flickr ) ) echo esc_attr( $lssc_w_flickr ); ?>"
            placeholder="user_name"
            />
        </p>

         <p>
            <label for="<?php echo $this->get_field_id( 'lssc_w_github' ); ?>">Github</label>
            <input
            type="text"
            class="widefat"
            id="<?php echo $this->get_field_id( 'lssc_w_github' ); ?>"
            name="<?php echo $this->get_field_name( 'lssc_w_github' ); ?>"
            value="<?php if ( isset( $lssc_w_github ) ) echo esc_attr( $lssc_w_github ); ?>"
            placeholder="user_name"
            />
        </p>

         <p>
            <label for="<?php echo $this->get_field_id( 'lssc_w_vk' ); ?>">vk</label>
            <input
            type="text"
            class="widefat"
            id="<?php echo $this->get_field_id( 'lssc_w_vk' ); ?>"
            name="<?php echo $this->get_field_name( 'lssc_w_vk' ); ?>"
            value="<?php if ( isset($lssc_w_vk) ) echo esc_attr( $lssc_w_vk ); ?>"
            placeholder="user_name"
            />
        </p>

         <p>
            <label for="<?php echo $this->get_field_id( 'lssc_w_google_plus' ); ?>">Google+</label>
            <input
            type="text"
            class="widefat"
            id="<?php echo $this->get_field_id( 'lssc_w_google_plus' ); ?>"
            name="<?php echo $this->get_field_name( 'lssc_w_google_plus' ); ?>"
            value="<?php if ( isset( $lssc_w_google_plus ) ) echo esc_attr( $lssc_w_google_plus ); ?>"
            placeholder="user_name"
            />
        </p>

         <p>
            <label for="<?php echo $this->get_field_id( 'lssc_w_pinterest' ); ?>">Pinterest</label>
            <input
            type="text"
            class="widefat"
            id="<?php echo $this->get_field_id( 'lssc_w_pinterest' ); ?>"
            name="<?php echo $this->get_field_name( 'lssc_w_pinterest' ); ?>"
            value="<?php if ( isset( $lssc_w_pinterest ) ) echo esc_attr( $lssc_w_pinterest ); ?>"
            placeholder="user_name"
            />
        </p>

    <?php
    }
    // Widget to display on front end
    public function widget( $args, $instance ) {
        extract( $instance );
        // If style is selected
        if ( !empty( $lssc_w_style )) {
            wp_enqueue_style( 'lssc-w-style', plugins_url( '../assets/little-sparrow-w-style.css', __FILE__ ), array(), '1.0.0' );
        }
        // If color is selected
        if ( !empty( $lssc_w_color ) ) {
            wp_enqueue_style( 'lssc-w-color', plugins_url( '../assets/little-sparrow-w-color.css', __FILE__ ), array(), '1.0.0' );
        }
        // Display the widget
        echo $before_widget;
        get_social_menus( $instance );
        echo $after_widget;
    }
}

function get_social_menus( $instance ){
    extract( $instance );
    // If nothing is selcted then return
    if ( empty( $lssc_w_facebook ) && empty( $lssc_w_google_plus ) && empty( $lssc_w_twitter ) && empty( $lssc_w_tumblr ) && empty( $lssc_w_flickr ) && empty( $lssc_w_github ) && empty( $lssc_w_vk ) && empty( $lssc_w_pinterest ) && empty( $lssc_w_instagram ) ) {
        return;
    }
    // Wrap it with aside (standard WP widgets)
    echo '<aside id="lssc-w-'.str_replace( ' ', '-', strtolower( $lssc_w_title ) ).'" class="widget lssc-w-connect">';
    // If there is a title display it
    if ( !empty( $lssc_w_title ) ) {
        echo '<h3 class="widget-title">';
        echo $lssc_w_title;
        echo '</h3>';
    }
   echo '<ul>';

    foreach ( $instance as $key => $value ) {
        // If value meaning that the particular checkbox is checked in widget options
       if ( $value ) {
            // plus.google its a little different then others so.
            if ( $key == 'lssc_w_google_plus' ) {
                ?>
                <li class="<?php echo $key; ?>">
                    <a href="http://www.plus.google.com/<?php echo $value; ?>"><i class="fa fa-<?php echo str_replace('_', '-', str_replace( 'lssc_w_', '', $key )); ?> fa-2x"></i></a>
                </li>
                <?php
            } else {
                if ( $key != 'lssc_w_color' && $key != 'lssc_w_style' && $key != 'lssc_w_title' ) {                    
                    ?>
                    <li class="<?php echo $key; ?>">
                        <a href="http://www.<?php echo str_replace( 'lssc_w_', '', $key ); ?>.com/<?php echo $value; ?>"><i class="fa fa-<?php echo str_replace( 'lssc_w_', '', $key ); ?> fa-2x"></i></a>
                    </li>
                    <?php
                }               
            }
       }
   }
    echo '</ul></aside>';
}