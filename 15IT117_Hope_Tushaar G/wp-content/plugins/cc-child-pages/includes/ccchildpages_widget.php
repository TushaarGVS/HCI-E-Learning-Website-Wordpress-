<?php
/**
* ccchildpages_widget
*/
class ccchildpages_widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct(
			'ccchildpages_widget', // Base ID
			__('CC Child Pages', 'cc-child-pages'), // Name
			array( 'description' => __( 'Displays current child pages as a menu', 'cc-child-pages' ), ) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget
		

		$sortby = empty( $instance['sortby'] ) ? 'menu_order' : $instance['sortby'];
		$exclude = empty( $instance['exclude'] ) ? '' : $instance['exclude'];
		$showall = empty( $instance['showall'] ) ? 'off' : $instance['showall'];
		$showtitle = empty( $instance['showtitle'] ) ? 'off' : $instance['showtitle'];
		$siblings = empty( $instance['siblings'] ) ? 'off' : $instance['siblings'];
		$parent_id = empty( $instance['parent'] ) ? -1 : $instance['parent'];
		$depth = empty( $instance['depth'] ) ? 0 : $instance['depth'];
		
		if ( $showall == 'off' && $siblings == 'off' && ( $parent_id == -1 ) && ( ! is_page() ) ) return; // If we are not viewing a page AND a parent page has not been specified AND  we are not viewing ALL pages, don't show widget at all ...	
		
		$exclude_tree = '';	
		
		if ( $siblings != 'off' ) {
			$parent_id = wp_get_post_parent_id(get_the_ID());
			
			// Add current page id to exclude tree list ...
			$exclude_tree .= get_the_ID();
		}
		else if ( $showall != 'off' ) {
			$parent_id = 0;
		}
		else if ( $parent_id == -1 ) $parent_id = get_the_ID();
		
		$widget_title = $instance['title'];
		
		if ( $parent_id > 0 && $showtitle != 'off' ) {
			$widget_title = get_the_title($parent_id);
		}

		if ( $sortby == 'menu_order' )
			$sortby = 'menu_order, post_title';
		
		$out = wp_list_pages( apply_filters( 'ccchildpages_widget_pages_args', array(
			'title_li'        => '',
			'child_of'        => $parent_id,
			'echo'            => 0,
			'depth'           => $depth,
			'sort_column'     => $sortby,
			'exclude'         => $exclude,
			'exclude_tree'    => $exclude_tree
		), $args, $instance ) );
		
		if ( empty($out) ) return; // Give up if the page has no children
		
		$ul_open = apply_filters( 'ccchildpages_widget_start_ul', '<ul>', $args, $instance );
		$ul_close = apply_filters( 'ccchildpages_widget_end_ul', '</ul>', $args, $instance );
		
		$out = apply_filters( 'ccchildpages_widget_output', $ul_open . $out . $ul_close, $args, $instance );
		
		echo apply_filters( 'ccchildpages_before_widget', $args['before_widget'], $args, $instance );
		if ( ! empty( $widget_title ) ) {
			$before_title = apply_filters( 'ccchildpages_widget_before_title', $args['before_title'], $args, $instance );
			$after_title = apply_filters( 'ccchildpages_widget_after_title', $args['after_title'], $args, $instance );
			echo $before_title . apply_filters( 'widget_title', $widget_title, $args, $instance ). $after_title;
		}
		echo $out;
		echo apply_filters( 'ccchildpages_after_widget', $args['after_widget'], $args, $instance );
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		
		$title = ( isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '' );
		$exclude = ( isset( $instance['exclude'] ) ? $instance['exclude'] : '' );
		$sortby = ( isset( $instance['sortby'] ) ? $instance['sortby'] : '' );
		$showall = ( isset( $instance['showall'] ) ? $instance['showall'] : 'off' );
		$showtitle = ( isset( $instance['showtitle'] ) ? $instance['showtitle'] : 'off' );
		$siblings = ( isset( $instance['siblings'] ) ? $instance['siblings'] : 'off' );
		$parent_id = ( isset( $instance['parent'] ) ? intval($instance['parent']) : -1 );
		$depth = ( isset( $instance['depth'] ) ? intval($instance['depth']) : 0 );
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'cc-child-pages' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('showtitle'); ?>"><?php _e( 'Show Page Title:', 'cc-child-pages' ); ?></label> <input type="checkbox" <?php checked($showtitle, 'on'); ?> name="<?php echo $this->get_field_name('showtitle'); ?>" id="<?php echo $this->get_field_id('showtitle'); ?>" class="checkbox" />
			<br />
			<small><?php _e( 'Overrides the Title field, unless parent page has no parent.', 'cc-child-pages' ); ?></small>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('sortby'); ?>"><?php _e( 'Sort by:', 'cc-child-pages' ); ?></label>
			<select name="<?php echo $this->get_field_name('sortby'); ?>" id="<?php echo $this->get_field_id('sortby'); ?>" class="widefat">
				<option value="post_title"<?php selected( $sortby, 'post_title' ); ?>><?php _e('Page title', 'cc-child-pages'); ?></option>
				<option value="menu_order"<?php selected( $sortby, 'menu_order' ); ?>><?php _e('Page order', 'cc-child-pages'); ?></option>
				<option value="ID"<?php selected( $sortby, 'ID' ); ?>><?php _e( 'Page ID', 'cc-child-pages' ); ?></option>
				<option value="post_date"<?php selected( $sortby, 'post_date' ); ?>><?php _e( 'Date created', 'cc-child-pages' ); ?></option>
				<option value="post_modified"<?php selected( $sortby, 'post_modified' ); ?>><?php _e( 'Date modified', 'cc-child-pages' ); ?></option>
				<option value="post_author"<?php selected( $sortby, 'post_author' ); ?>><?php _e( 'Page author', 'cc-child-pages' ); ?></option>
				<option value="comment_count"<?php selected( $sortby, 'comment_count' ); ?>><?php _e( 'Comment count', 'cc-child-pages' ); ?></option>
				<option value="rand"<?php selected( $sortby, 'rand' ); ?>><?php _e( 'Random', 'cc-child-pages' ); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('exclude'); ?>"><?php _e( 'Exclude:', 'cc-child-pages' ); ?></label> <input type="text" value="<?php echo $exclude; ?>" name="<?php echo $this->get_field_name('exclude'); ?>" id="<?php echo $this->get_field_id('exclude'); ?>" class="widefat" />
			<br />
			<small><?php _e( 'Page IDs, separated by commas.', 'cc-child-pages' ); ?></small>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('showall'); ?>"><?php _e( 'Show All Pages:', 'cc-child-pages' ); ?></label> <input type="checkbox" <?php checked($showall, 'on'); ?> name="<?php echo $this->get_field_name('showall'); ?>" id="<?php echo $this->get_field_id('showall'); ?>" class="checkbox" />
			<br />
			<small><?php _e( 'Overrides the Parent field, shows all top-level pages.', 'cc-child-pages' ); ?></small>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('siblings'); ?>"><?php _e( 'Show Sibling Pages:', 'cc-child-pages' ); ?></label> <input type="checkbox" <?php checked($siblings, 'on'); ?> name="<?php echo $this->get_field_name('siblings'); ?>" id="<?php echo $this->get_field_id('siblings'); ?>" class="checkbox" />
			<br />
			<small><?php _e( 'Overrides the Parent and Show All field, shows sibling pages.', 'cc-child-pages' ); ?></small>
		</p>
		<p>
<?php
$args = array(
	'depth'					=> $depth,
	'child_of'				=> 0,
	'selected'				=> $parent_id,
	'sort_column'			=> 'menu_order',
	'echo'					=> 1,
	'name'					=> $this->get_field_name('parent'),
	'id'					=> $this->get_field_name('parent'), // string
	'show_option_none'		=> 'Current Page', // string
	'show_option_no_change'	=> null, // string
	'option_none_value'		=> -1, // string
);?>
			<label for="<?php echo $this->get_field_id('parent'); ?>"><?php _e( 'Parent:', 'cc-child-pages' ); ?></label> <?php wp_dropdown_pages( $args ); ?>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('depth'); ?>"><?php _e( 'Depth:', 'cc-child-pages' ); ?></label> <input type="text" value="<?php echo $depth; ?>" name="<?php echo $this->get_field_name('depth'); ?>" id="<?php echo $this->get_field_id('depth'); ?>" class="widefat" />
			<br />
			<small>
				<ul>
					<li>0 - <?php _e( 'Pages and sub-pages displayed in hierarchical (indented) form (Default).', 'cc-child-pages'); ?></li>
					<li>-1 - <?php _e( 'Pages in sub-pages displayed in flat (no indent) form.', 'cc-child-pages' ); ?></li>
					<li>1 - <?php _e( 'Show only top level Pages', 'cc-child-pages' ); ?></li>
					<li>2 - <?php _e( 'Value of 2 (or greater) specifies the depth (or level) to descend in displaying Pages.', 'cc-child-pages'); ?></li>
				</ul>
			</small>
		</p>
		<?php 
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['parent'] = ( ! empty( $new_instance['parent'] ) ) ? strip_tags( $new_instance['parent'] ) : -1;
		$instance['depth'] = ( ! empty( $new_instance['depth'] ) ) ? strip_tags( $new_instance['depth'] ) : 0;

		if ( in_array( $new_instance['sortby'], array( 'post_title', 'menu_order', 'ID', 'post_author', 'post_date', 'post_modified', 'comment_count', 'rand' ) ) ) {
			$instance['sortby'] = $new_instance['sortby'];
		} else {
			$instance['sortby'] = 'menu_order';
		}

		$instance['exclude'] = strip_tags( $new_instance['exclude'] );

		$instance['showall'] = $new_instance['showall'];

		$instance['showtitle'] = $new_instance['showtitle'];

		$instance['siblings'] = $new_instance['siblings'];

		return $instance;
	}
	
	public static function has_children() {
		// return number of children for current page
		global $post;
		return count( get_posts( array('post_parent' => $post->ID, 'post_type' => $post->post_type) ) );
	}

}
?>