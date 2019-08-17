<?php
// amp
function is_amp(){
  global $post;
  $myAmp = false;

  if(!apply_filters('diver_amp_enable',true)){
      return false;
  }
  if(!$post){
      return false;
  }
  $amp_check = apply_filters('diver_amp_enable_all_set',get_post_meta($post->ID, "amp_name", true));

  if(empty($_GET['amp'])){
    return false;
  }
  if(!empty($_GET['amp'])&& is_single()&&$amp_check){
      $myAmp = true;
  }

  if(!empty($_GET['amp'])&& is_single()&&$amp_check){
      $myAmp = true;
  }

  return $myAmp;
}


function add_post_format_template($single_template) {
  $new_template = $single_template;
  if(is_amp()==1&&apply_filters('diver_amp_enable',true)){
      $new_template = locate_template('/lib/amp/single.php');
  }
  return $new_template;
}
add_filter( 'single_template', 'add_post_format_template' );
?>