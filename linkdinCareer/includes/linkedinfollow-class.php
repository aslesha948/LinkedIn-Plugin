<?php
/**
 * Adds Linkedin_follow widget.
 */
 class linkedin_follow_Widget extends WP_Widget {
  
    /**
     * Register widget with WordPress.
     */
    function __construct() {
      parent::__construct(
        'linkedinfollow_widget', // Base ID
        esc_html__( 'Linkedin follow', 'linkd_domain' ), // Name
        array( 'description' => esc_html__( 'Widget to display Linkedin follow', 'linkd_domain' ), ) // Args
      );
    }
  
    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {



      echo $args['before_widget']; // Whatever you want to display before widget (<div>, etc)

      if ( ! empty( $instance['title'] ) ) {
        echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
      }

      // Widget Content Output
      //<script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
      echo '<div class="wpsite_follow_us_div linkedinbox"><script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
      <script type="IN/FollowCompany" data-id="'.$instance['companyID'].'"" data-counter="'.$instance['count_appearance'].'"></script></div>';

      echo $args['after_widget']; // Whatever you want to display after widget (</div>, etc)
    }
  
    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */


    public function form( $instance ) {
      $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Linkedin follow', 'linkd_domain' ); 
      
      $companyID = ! empty( $instance['companyID'] ) ? $instance['companyID'] : esc_html__( 'PoolurVehicle', 'linkd_domain' ); 

      $count_appearance = ! empty( $instance['count_appearance'] ) ? $instance['count_appearance'] : esc_html__( 'PoolurVehicle', 'linkd_domain' ); 
  
      ?>
      
      
      
      <!-- TITLE -->
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
          <?php esc_attr_e( 'Title:', 'linkd_domain' ); ?>
        </label> 

        <input 
          class="widefat" 
          id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
          name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
          type="text" 
          value="<?php echo esc_attr( $title ); ?>">
      </p>

      <!-- Company ID -->
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'companyID' ) ); ?>">
          <?php esc_attr_e( 'CompanyID:', 'linkd_domain' ); ?>
        </label> 

        <input 
          class="widefat" 
          id="<?php echo esc_attr( $this->get_field_id( 'companyID' ) ); ?>" 
          name="<?php echo esc_attr( $this->get_field_name( 'companyID' ) ); ?>" 
          type="text" 
          value="<?php echo esc_attr( $companyID ); ?>">
      </p>

      <!--Count Appearance -->
      <p>
      <label for="<?php echo $this->get_field_id('count_appearance'); ?>">
        <?php esc_attr_e('Count Location:', 'linkd_domain'); ?>
        
      </label>
      <select id="<?php echo $this->get_field_id('count_appearance'); ?>" name="<?php echo $this->get_field_name('count_appearance'); ?>">
        <option value="bottom" <?php echo ($count_appearance == 'bottom') ? 'selected' : ''; ?>>
            Bottom</option>
        <option value="right"<?php echo ($count_appearance == 'right') ? 'selected' : ''; ?>>
            Right</option>
      </select>

    </p>

      <?php 
    }
  
    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
      $instance = array();

      $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

      $instance['companyID'] = ( ! empty( $new_instance['companyID'] ) ) ? strip_tags( $new_instance['companyID'] ) : '';

      $instance['count_appearance'] = ( ! empty( $new_instance['count_appearance'] ) ) ? strip_tags( $new_instance['count_appearance'] ) : '';


  
      return $instance;
    }
  
  } 
