<?php
//appealbox
function diver_get_appeal($id){
  $id = (get_option( 'diver_postsettings_appealbox',$id))?get_option( 'diver_postsettings_appealbox',$id):$id;
  $appealimgurl = get_post_meta($id,'appealimg-uploader_img',true);
  $appealtitle = get_post_meta($id,'appeal_title',true);
  $appealdescription = get_post_meta($id,'appeal_description',true);
  $appealbtntext = get_post_meta($id,'appeal_btntext',true);
  $appeallink = get_post_meta($id,'appeal_link',true);
  $appealtitlebg = (get_post_meta($id, 'appeal_titlebg', true))?get_post_meta($id, 'appeal_titlebg', true):'';
  $appealtitlecolor = (get_post_meta($id, 'appeal_titlecolor', true))?get_post_meta($id, 'appeal_titlecolor', true):'';
  $appealbg = (get_post_meta($id, 'appeal_bg', true))?get_post_meta($id, 'appeal_bg', true):'#fff';
  $appealcolor = (get_post_meta($id, 'appeal_color', true))?get_post_meta($id, 'appeal_color', true):'#333';
  $appealbtnbg = (get_post_meta($id, 'appeal_btnbg', true))?get_post_meta($id, 'appeal_btnbg', true):'#f44336';
  $appealbtncolor = (get_post_meta($id, 'appeal_btncolor', true))?get_post_meta($id, 'appeal_btncolor', true):'#fff';

  if(!empty($appealtitle)):
    ?>
<div class="appeal_box widget" style="background: <?php echo $appealbg ?>">
  <div class="widgettitle" style="background: <?php echo $appealtitlebg ?>;color: <?php echo $appealtitlecolor ?>;"><?php echo $appealtitle ?></div>
  <div class="appeal_meta" style="color: <?php echo $appealcolor ?>;">
    <div class="appeal_img"><img src="<?php echo esc_url($appealimgurl); ?>"></div>
    <div class="appeal_desc"><?php echo $appealdescription ?></div>
    <?php if($appealbtntext): ?>
      <div class="button"><a href="<?php echo $appeallink ?>" target="_brank" rel="nofollow" style="background: <?php echo $appealbtnbg ?>;color: <?php echo $appealbtncolor ?>;"><?php echo $appealbtntext ?></a></div>
    <?php endif; ?>
  </div>
</div>
<?php endif; } ?>