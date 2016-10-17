<?php 

add_action('add_meta_boxes', 'package_page_region_meta');
function package_page_region_meta()
{
  
            add_meta_box(
                'package_region', // $id
                __( 'Package Region', 'aat-reavel' ), // $title
                'package_region_fields', // $callback
                'packages', // $page
                'normal', // $context
                'high'); // $priority
        
    
}

// Field Array
$prefix = 'aat_package_meta';
$package_region_fields = array(
    
    array(
        'label' => 'Package Region',
        'desc'  => 'Type the region of package',
        'id'    => $prefix.'region',
        'type'  => 'text'
    ),
);

// The Callback
function package_region_fields() {
global $package_region_fields, $post;
// Use nonce for verification
//echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';
     
     wp_nonce_field( 'custom_meta_box_nonce_action', 'custom_meta_box_nonce_field' );

    // Begin the field table and loop
    echo '<table class="form-table">';
    foreach ($package_region_fields as $field) {
        // get value of this field if it exists for this post
        $meta = get_post_meta($post->ID, $field['id'], true);
        // begin a table row with
        echo '<tr>
                <th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
                <td>';
                switch($field['type']) {

                                        
                        // text
                        case 'text':
                            echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" />
                                <br /><span class="description">'.$field['desc'].'</span>';
                        break;
                } //end switch loop
        echo '</td></tr>';
    } // end foreach
    echo '</table>'; // end table formatting
}

// Save the Data in Table
function save_package_region_data($post_id) {
    global $package_region_fields;
     
    // verify nonce: 
   // if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))
   if ( !isset( $_POST['custom_meta_box_nonce_field'] ) || !wp_verify_nonce( $_POST['custom_meta_box_nonce_field'], 'custom_meta_box_nonce_action' ) )
            return $post_id; 
        return $post_id;
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;
    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id))
            return $post_id;
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
    }
     
    // loop through fields and save the data
    foreach ($package_region_fields as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    } // end foreach Loop
}
add_action('save_post', 'save_package_region_data');

?>