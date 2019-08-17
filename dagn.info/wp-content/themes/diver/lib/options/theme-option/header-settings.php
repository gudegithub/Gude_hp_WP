<?php
    $headerbackground = get_theme_mod( 'background-header', '#ffffff');
    $headertext = get_theme_mod('text-header','#333333');
    $headerlink = get_theme_mod('link-header','#333355');
    $headerlinkhover = get_theme_mod('link-hover-header','#6495ED')
?>
<style>

    .preview_header_area{
        border:1px solid #ccc;
        background-color: <?php echo $headerbackground; ?>
    }
    #preview_header.flex{
        position: relative;
        margin: 0 auto;
        width: 90%;
    }
    #preview_header.flex{
        position: relative;
        margin: 0 auto;
        width: 90%;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        -js-display: flex;
        display: flex;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -ms-flex-pack: justify;
        justify-content: space-between;     
    }
    #preview_header.flex div#logo {
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
    }

    #preview_header.block div#logo{
        text-align: center;
        padding-top: 1.5em;
    }

    ul#mainnavul {
        font-size: 12px;
        padding: 0;
        margin: 0;
    }
    ul#mainnavul li{
        display: inline-block;
    }
    ul#mainnavul li ul{
        display: none;
    }

    #preview_header.block .preview_menu{
        text-align: center;
    }

    #preview_header.flex ul#mainnavul{
        display: flex;
    }

    div#logo img {
        height: 40px;
    }
    
    #preview_header .preview_menu a{
        text-decoration: none;
        display: inline-block;
        line-height: 1;
        text-align: center;
        text-decoration: none;
        white-space: nowrap;
        vertical-align: bottom;
        padding: 1.5em .8em;
        color: <?php echo $headerlink; ?>
    }

    #preview_header .menu_desc {
        font-size: 10px;
        margin-top: 5px;
        opacity: .5;
        text-align: center;
        white-space: normal;
        padding: 0 .5em;
    }
    .preview_header_title{
        padding-bottom:.5em;
        line-height: 1.3;
        font-weight: 600;
        font-size: 14px;
        color: #000;
    }

</style>
<?php
// POSTデータがあれば設定を更新
    if (isset($_POST['diverseosettings'])) {
        update_option('diver_header_visible_on', isset($_POST['diver_header_visible_on'])? 1 : 0);
        update_option('diver_header_logo_h1', isset($_POST['diver_header_logo_h1'])? 1 : 0);
        update_option('diver_header_logo_position', $_POST['diver_header_logo_position']);
        update_option('diver_header_menu_position', $_POST['diver_header_menu_position']);
        update_option('diver_header_bgimg_on', isset($_POST['diver_header_bgimg_on'])? 1 : 0);

        update_option('header_logoimg-uploader_img', wp_unslash($_POST['header_logoimg-uploader_img']));
        update_option('header_bgimg-uploader_img', wp_unslash($_POST['header_bgimg-uploader_img']));

    }
    $diver_header_visible_on = get_option('diver_header_visible_on','1');
    $diver_header_logo_h1 = get_option('diver_header_logo_h1','0');
    $diver_header_logo_position = get_option('diver_header_logo_position','flex');
    $diver_header_menu_position = get_option('diver_header_menu_position','right');
    $diver_header_bgimg_on = get_option('diver_header_bgimg_on','1');

?>
<?php
    // 更新完了を通知
    if (isset($_POST['diverseosettings'])) {
        echo '<div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible">
            <p><strong>設定を保存しました。</strong></p></div>';
    }
?>

<h1 class="diver_option_header">ヘッダー設定</h1>
<div class="diver_option_desc">
    ヘッダーを設定します。
</div>

<h2 class="diver_option_title">ヘッダーデザイン設定  <a href="" style="font-size: 12px;color: #1e8cbe;margin-left: 15px;"><i class="fa fa-check-square-o" aria-hidden="true"></i>
 ヘッダーデザイン設定解説</a></h2>
<div class="diver_option_wrap">

<form method="post" action="">
<input type="hidden" name="diverseosettings">
    <table class="form-table">

        <tr>
            <th scope="row"><label for="diver_header_visible_on">ヘッダーを表示する</label></th>
            <td><label><input name="diver_header_visible_on" type="checkbox" id="diver_header_visible_on" value="1" <?php checked( 1, $diver_header_visible_on); ?> /></label></td>
        </tr>
    </table>
        <div class="preview_header_title">ヘッダープレビュー</div>
        <div class="preview_header_area">
            <div id="preview_header">
                <div id="logo">
                    <?php $diverlogo = get_theme_mod("diver_logo"); ?>
                    <a href="<?php echo home_url('/'); ?>">
                        <?php if(empty($diverlogo)): ?>
                            <div class="logo_title"><?php bloginfo('name'); ?></div>
                        <?php else: ?>
                            <img src="<?php echo esc_url($diverlogo) ?>" alt="<?php bloginfo('name'); ?>">
                        <?php endif; ?>
                    </a>
                </div>            
                <div class="preview_menu">
                    <?php wp_nav_menu( array ( 
                        'theme_location' => 'header-navi',
                        'items_wrap' => '<ul id="mainnavul" class="menu">%3$s</ul>',
                        'link_before' => '',
                        'link_after' => '',
                        'depth' => 0,
                        'fallback_cb' => ''
                    )); ?>
                </div>
            </div>
        </div>

    <table class="form-table">

        <tr>
            <th scope="row"><label for="diver_header_logo_h1">サイトロゴをh1タグする <br><span style="font-size: .8em;color:#f55;">※トップページのみ</span></label></th>
            <td><label><input name="diver_header_logo_h1" type="checkbox" id="diver_header_logo_h1" value="1" <?php checked( 1, $diver_header_logo_h1); ?> /></label></td>
        </tr>


        <tr>
            <th scope="row"><label for="header_logoimg-uploader_img">サイトロゴ画像</label></th>
            <td>
            <?php $url = get_option('header_logoimg-uploader_img',get_theme_mod('header_image')) ?>
                <div id="preview_fvbgimg">
                    <?php if($url): ?>
                        <img src="<?php echo $url ?>" style="max-width:100%;max-height:300px;">
                    <?php endif; ?>
                </div>
                <input type="text" id="src_header_logoimg" name="header_logoimg-uploader_img" value="<?php echo $url; ?>" />
                <input class="button" type="button" name="mediauploadbtn" id="header_logoimg" value="画像を選択" />
                <input class="button" type="button" name="media-clear" id="header_logoimg" value="クリア" />
            </td>
        </tr>

        <tr>
            <th scope="row"><label for="header_bgimg-uploader_img">ヘッダー背景画像</label></th>
            <td>
            <?php $url = get_option('header_bgimg-uploader_img',get_theme_mod('header_image')) ?>
                <div id="preview_header_bgimg">
                    <?php if($url): ?>
                        <img src="<?php echo $url ?>" style="max-width:100%;max-height:300px;">
                    <?php endif; ?>
                </div>
                <input type="text" id="src_header_bgimg" name="header_bgimg-uploader_img" value="<?php echo $url; ?>" />
                <input class="button" type="button" name="mediauploadbtn" id="header_bgimg" value="画像を選択" />
                <input class="button" type="button" name="media-clear" id="header_bgimg" value="クリア" />
            </td>
        </tr>

        <tr>
            <th scope="row"><label for="diver_header_bgimg_on">画像を背景にする</label></th>
            <td><label><input name="diver_header_bgimg_on" type="checkbox" id="diver_header_bgimg_on" value="1" <?php checked( 1, $diver_header_bgimg_on); ?> />（背景にしていない状態ではコンテンツは表示されません。）</label></td>
        </tr>

        <tr>
            <th scope="row">配置</th>
            <td><p>
                <label><input name="diver_header_logo_position" type="radio" value="flex" <?php checked( 'flex', $diver_header_logo_position ); ?>/>左寄せ</label>　
                <label><input name="diver_header_logo_position" type="radio" value="block" <?php checked( 'block', $diver_header_logo_position ); ?> />中央寄せ</label>
                </p>
            </td>
        </tr>

        <tr>
            <th scope="row">メニュー表示位置</th>
            <td><p>
                <label><input name="diver_header_menu_position" type="radio" value="right" <?php checked( 'right', $diver_header_menu_position ); ?>/>ロゴの右に表示</label>　
                <label><input name="diver_header_menu_position" type="radio" value="center" <?php checked( 'center', $diver_header_menu_position ); ?> />ロゴを挟む</label>　
                <label><input name="diver_header_menu_position" type="radio" value="independ" <?php checked( 'independ', $diver_header_menu_position ); ?> />独立</label>
                </p>
            </td>
        </tr>

    </table>
<?php submit_button(); ?>
</form>
</div>

<script type="text/javascript">
    jQuery(document).ready(function($) {

        $('input[name="diver_header_logo_position"]').addClass($('#diver_header_logo_position').val());
            
        $('input[name="diver_header_logo_position"]').change(function() {
            $('#preview_header').removeClass().addClass($(this).val());
        });
    });
</script>