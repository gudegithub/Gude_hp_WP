<?php
/*
Template Name:投稿者一覧
*/
?>
<!--投稿者一覧を表示-->
<div class="writers"> 
<?php $users =get_users( array('orderby'=>ID,'order'=>ASC) ); ?>
<?php 
foreach($users as $user):
    $uid = $user->ID;
    $userData = get_userdata($uid); ?>
    <div class="writer-profile">
        <figure class="eyecatch">
           <?php echo get_avatar( $uid ,300 ); ?>
        </figure>
        <div class="profiletxt">
            <p class="name"><?php echo $user->display_name ?></p>
            <div class="description"><?php echo $userData->user_description ?></div>
            <div class="button"><a href="'.get_bloginfo(url).'/?author='.$uid.'"><?php echo $user->display_name ?>の記事一覧</a></div>
        </div>
    </div>
<?php endforeach; ?>
</div>