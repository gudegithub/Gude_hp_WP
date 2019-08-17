<?php
add_action('post_submitbox_misc_actions','title_field');
add_action('save_post', 'save_title_data');

//投稿ページに表示されるカスタムフィールド
function title_field($post){
	global $post_ID;
    wp_nonce_field(wp_create_nonce(__FILE__), 'title_field_nonce');

	$screen = get_current_screen();
	if ( 'page' != $screen->post_type ) return;

	$title_hidden = get_post_meta($post_ID, 'title_hidden', true);
  	?>
	<div class="misc-pub-section misc-pub-amp"><label>
	タイトルを非表示にする <input type="checkbox" name="title_hidden" <?php echo (($title_hidden=='on') ? 'checked="checked"': '');?> /></label>
	</div>
	<style>
	.misc-pub-amp:before{
		font: 400 20px/1 dashicons;
	    speak: none;
	    display: inline-block;
	    margin-left: -1px;
	    padding-right: 3px;
	    vertical-align: top;
	    -webkit-font-smoothing: antialiased;
	    content:"\f111";
	    color: #82878c;
	}
	</style>
	<?php
}


function save_title_data($post_id){
     $title_field_nonce = isset($_POST['title_field_nonce']) ? $_POST['title_field_nonce'] : null;
     if(!wp_verify_nonce($title_field_nonce, wp_create_nonce(__FILE__))) {return $post_id;}
     if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id; }
     if(!current_user_can('edit_post', $post_id)) { return $post_id; }

	$ampname = isset($_POST['title_hidden']) ? $_POST['title_hidden']: null;
	$ampname_ex = get_post_meta($post_id, 'title_hidden', true);

	if($ampname){
	  update_post_meta($post_id, 'title_hidden',$ampname);
	}else{
	  delete_post_meta($post_id, 'title_hidden',$ampname_ex);
	}
}
?>