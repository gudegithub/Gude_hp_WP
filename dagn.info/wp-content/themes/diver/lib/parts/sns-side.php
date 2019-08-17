<?php
global $post;
$url_encode = apply_filters('get_diver_sns_link',urlencode(get_permalink()));
$position = get_theme_mod('sidebar_position_page','right');
$position = ($position=='left')?'right':'left';

$facebook = get_option('diver_sns_post_fixed-facebook',get_theme_mod('facebook','1'));
$twitter = get_option('diver_sns_post_fixed-twitter',get_theme_mod('twitter','1'));
$googleplus = get_option('diver_sns_post_fixed-googleplus',get_theme_mod('googleplus','1'));
$hatebu = get_option('diver_sns_post_fixed-hatebu',get_theme_mod('hatebu','1'));
$pocket = get_option('diver_sns_post_fixed-pocket',get_theme_mod('pocket','1'));
$feedly = get_option('diver_sns_post_fixed-feedly',get_theme_mod('feedly','1'));

if(diver_fix_sns_boolean()):
?>
<div id="share_plz" style="float: <?php echo $position?> ">

	<?php if($facebook): ?>

		<div class="fb-like share_sns" data-href="<?php echo $url_encode; ?>" data-layout="box_count" data-action="like" data-show-faces="true" data-share="false"></div>

		<div class="share-fb share_sns">
		<a href="http://www.facebook.com/share.php?u=<?php echo $url_encode; ?>" onclick="window.open(this.href,'FBwindow','width=650,height=450,menubar=no,toolbar=no,scrollbars=yes');return false;" title="Facebookでシェア"><i class="fa fa-facebook" style="font-size:1.5em;padding-top: 4px;"></i><br>シェア
		<?php if(function_exists('scc_get_share_facebook')) echo '<div class="sns_count">'.scc_get_share_facebook().'</div>'; ?>
		</a>
		</div>
	<?php endif; ?>

	<?php if($twitter): ?>
		<div class="sc-tw share_sns"><a data-url="<?php echo $url_encode; ?>" href="http://twitter.com/share?text=<?php the_title(); ?>&url=<?php echo $url_encode; ?>" class="twitter-share-button" data-lang="ja" data-count="vertical" data-dnt="true" target="_blank"><svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414"><path d="M16 3.038c-.59.26-1.22.437-1.885.517.677-.407 1.198-1.05 1.443-1.816-.634.375-1.337.648-2.085.795-.598-.638-1.45-1.036-2.396-1.036-1.812 0-3.282 1.468-3.282 3.28 0 .258.03.51.085.75C5.152 5.39 2.733 4.084 1.114 2.1.83 2.583.67 3.147.67 3.75c0 1.14.58 2.143 1.46 2.732-.538-.017-1.045-.165-1.487-.41v.04c0 1.59 1.13 2.918 2.633 3.22-.276.074-.566.114-.865.114-.21 0-.416-.02-.617-.058.418 1.304 1.63 2.253 3.067 2.28-1.124.88-2.54 1.404-4.077 1.404-.265 0-.526-.015-.783-.045 1.453.93 3.178 1.474 5.032 1.474 6.038 0 9.34-5 9.34-9.338 0-.143-.004-.284-.01-.425.64-.463 1.198-1.04 1.638-1.7z" fill="#fff" fill-rule="nonzero"></path></svg><span>Tweet</span>
		<?php if(function_exists('scc_get_share_twitter')) echo '<div class="sns_count">'.scc_get_share_twitter().'</div>'; ?>
		</a></div>

	<?php endif; ?>

	<?php if($googleplus): ?>
		<div class="share-googleplus share_sns">
		<a href="https://plusone.google.com/_/+1/confirm?hl=ja&url=<?php echo $url_encode; ?>" onclick="window.open(this.href, 'window', 'width=550, height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1'); return false;" title="GooglePlusで共有"><i class="fa fa-google-plus" style="font-size:1.5em;padding-top: 4px;"></i><span class="text">Google+</span><?php if(function_exists('scc_get_share_gplus')) echo (scc_get_share_gplus()==0)?'':'<div class="sns_count">'.scc_get_share_gplus().'</div>'; ?></a>
		</div>
	<?php endif; ?>

	<?php if($hatebu): ?>
		<div class="share-hatebu share_sns">       
		<a href="http://b.hatena.ne.jp/add?mode=confirm&url=<?php echo $url_encode; ?>&title=<?php echo urlencode( the_title( "" , "" , 0 ) ) ?>" onclick="window.open(this.href, 'HBwindow', 'width=600, height=400, menubar=no, toolbar=no, scrollbars=yes'); return false;" target="_blank"><div style="font-weight: bold;font-size: 1.5em">B!</div><span class="text">はてブ</span><?php if(function_exists('scc_get_share_hatebu')) echo (scc_get_share_hatebu()==0)?'':'<div class="sns_count">'.scc_get_share_hatebu().'</div>'; ?></a>
		</div>
	<?php endif; ?>

	<?php if($pocket): ?>
		<div class="share-pocket share_sns">
		<a href="http://getpocket.com/edit?url=<?php echo $url_encode; ?>&title=<?php the_title(); ?>" onclick="window.open(this.href, 'FBwindow', 'width=550, height=350, menubar=no, toolbar=no, scrollbars=yes'); return false;"><i class="fa fa-get-pocket" style="font-weight: bold;font-size: 1.5em"></i><span class="text">Pocket</span>
		<?php if(function_exists('scc_get_share_pocket')) echo (scc_get_share_pocket()==0)?'':'<div class="sns_count">'.scc_get_share_pocket().'</div>'; ?>
			</a></div>
	<?php endif; ?>

	<?php if($feedly): ?>
	<?php $homeurl = urlencode(home_url()); ?>
		<div class="share-feedly share_sns">
		<a href="https://feedly.com/i/subscription/feed%2F<?php echo $homeurl ?>%2Ffeed" target="_blank"><i class="fa fa-rss" aria-hidden="true" style="font-weight: bold;font-size: 1.5em"></i><span class="text">Feedly</span>
		<?php if(function_exists('scc_get_follow_feedly')) echo (scc_get_follow_feedly()==0)?'':'<div class="sns_count">'.scc_get_follow_feedly().'</div>'; ?>
		</a></div>
	<?php endif;  ?>
</div>
<?php endif; ?>