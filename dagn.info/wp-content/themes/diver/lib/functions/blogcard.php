<?php
add_filter('embed_oembed_discover', '__return_false');
remove_action('wp_head','rest_output_link_wp_head');
remove_action('wp_head','wp_oembed_add_discovery_links');
remove_action('wp_head','wp_oembed_add_host_js');
remove_filter( 'pre_oembed_result', 'wp_filter_pre_oembed_result');

function urllink($match)
{
    if (!empty($match[1])) {
        return url_to_blog_card_tag($match[1]);
    }
    return $match[0];
}

//本文中のURLをブログカードタグに変更する
function url_to_blog_card($the_content) {
  if ( is_singular() ) {//投稿ページもしくは固定ページのとき

      $res = preg_match_all('/^(<p>)?(<br ? \/?>)?(<a.+?>)?https?:\/\/'.preg_quote(apply_filters("url_to_blog_card_domain",get_this_site_domain()), "/").'\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+(<\/a>)?(<br ? \/?>)?(<\/p>)?/im', $the_content,$m);

      if ($res) {
        foreach ($m[0] as $match) {
          // if ( !is_p_tag_appropriate($match) ) {
          //   return;
          // }


          $tag = url_to_blog_card_tag(strip_tags($match));

          if ( !$tag ) continue;

          $the_content = preg_replace('{'.preg_quote($match).'}', '$1'.$tag , $the_content, 1);

          wp_reset_postdata();
        }
      }
  }
  return $the_content;//置換後のコンテンツを返す
}
add_filter('the_content', 'url_to_blog_card',999999);


function url_to_blog_card_tag($url) {

  if ( !$url ) return;
  $url = strip_tags($url);
  $id = url_to_postid( $url );
  if ( !$id ) return;

  $post = get_post($id);
  setup_postdata($post);
  $title = $post->post_title;
  $date = mysql2date('Y.m.d', $post->post_date);
  $excerpt = get_diver_excerpt($post->ID, 90);
  $thumbnail = get_diver_thumb_id_img($id,'midium');

  $tag = '<div class="sc_getpost"><a class="clearfix" href="'.$url.'"><div><div class="sc_getpost_thumb">'.$thumbnail.'</div><div class="title">'.$title.'</div><div class="date">'.$date.'</div><div class="substr">'.str_replace(array("\r\n", "\r", "\n"), '',$excerpt).'</div></div></a></div>';
  return $tag;
}


function is_p_tag_appropriate($match){
  if (strpos($match,'p>') !== false){
    //pタグが含まれていた場合は開始タグと終了タグが揃っているかどうか
    if ( (strpos($match,'<p>') !== false) && (strpos($match,'</p>') !== false) ) {
      return true;
    }
    return false;
  }
  return true;
}
?>