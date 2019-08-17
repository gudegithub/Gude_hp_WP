<ul id="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
<?php
    $str ='';
    if(!is_home()&&!is_admin()){
        $str.= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
        $str.= '<a href="'. home_url() .'" itemprop="item"><span itemprop="name">'.apply_filters('breadcrumb_hometitle','<i class="fa fa-home" aria-hidden="true"></i> ホーム').'</span></a><meta itemprop="position" content="1" /></li>';
 
        if(is_category()) {
            $cat = get_queried_object();
            if($cat -> parent != 0){
                $ancestors = array_reverse(get_ancestors( $cat->cat_ID, 'category' ));
                foreach($ancestors as $ancestor){
                    $str.='<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="'. get_category_link($ancestor) .'" itemprop="item"><span itemprop="name">'. get_cat_name($ancestor) .'</span></a><meta itemprop="position" content="2" /></li>';
                }
            }
        $str.='<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="'. get_category_link($cat->term_id). '" itemprop="item"><span itemprop="name">'. $cat->cat_name . '</span></a><meta itemprop="position" content="2" /></li>';
        } elseif(is_page()){
                $ancestors = array_reverse(get_post_ancestors( $post->ID ));
                foreach($ancestors as $ancestor){
                    $str.='<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="'. get_permalink($ancestor).'" itemprop="item"><span itemprop="name">'. get_the_title($ancestor) .'</span></a><meta itemprop="position" content="2" /></li>';
                }
                $str .= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name">'. wp_title('', false) .'</span><meta itemprop="position" content="2" /></li>';
        } elseif(is_single() && get_the_category($post->ID)){
            $categories = get_the_category($post->ID);
            $cat = $categories[0];
            if($cat -> parent != 0){
                $ancestors = array_reverse(get_ancestors( $cat->cat_ID, 'category' ));
                foreach($ancestors as $ancestor){
                    $str.='<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="'. get_category_link($ancestor).'" itemprop="item"><span itemprop="name">'. get_cat_name($ancestor). '</span></a><meta itemprop="position" content="2" /></li>';
                }
            }
            $str.='<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="'. get_category_link($cat->term_id). '" itemprop="item"><span itemprop="name">'. $cat->cat_name . '</span></a><meta itemprop="position" content="2" /></li>';
            $str.='<li class="breadcrumb-title" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="'.get_permalink(). '" itemprop="item"><span itemprop="name">'. get_the_title(). '</span></a><meta itemprop="position" content="3" /></li>';
        } else{
            $str.='<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name">'. wp_title('', false) .'</span></a><meta itemprop="position" content="2" /></li>';
        }
    }
    echo $str;
?>
</ul>