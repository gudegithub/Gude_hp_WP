<?php
function size_settings($wp_customize) {
 
    $wp_customize->add_section( 'size-settings', array(
    'title'          => 'サイズ設定',
    'priority'       => 25,
    ) );

    $wp_customize->add_setting('main-max-size', array('default'=>'90%'));
    $wp_customize->add_control( 'main-max-size', array(
        'settings' => 'main-max-size',
        'label'   => 'サイト全体のサイズ',
        'description' => '大[1201px~]の横幅(default:90%)',
        'section' => 'size-settings',
    ));

    $wp_customize->add_setting('main-mid-size', array('default'=>'96%'));
    $wp_customize->add_control('main-mid-size', array(
        'settings' => 'main-mid-size',
        'description' => '中[769px~1200px]の横幅(default:96%)',
        'section' => 'size-settings',
    ));

    $wp_customize->add_setting('main-max-size-page', array('default'=>get_theme_mod('main-max-size','90%')));
    $wp_customize->add_control( 'main-max-size-page', array(
        'settings' => 'main-max-size-page',
        'label'   => '個別ページメインカラム',
        'description' => '大[1201px~]の横幅(default:90%)',
        'section' => 'size-settings',
    ));

    $wp_customize->add_setting('main-mid-size-page', array('default'=>get_theme_mod('main-mid-size','96%')));
    $wp_customize->add_control('main-mid-size-page', array(
        'settings' => 'main-mid-size-page',
        'description' => '中[769px~1200px]の横幅(default:96%)',
        'section' => 'size-settings',
    ));

    $wp_customize->add_setting('sidebar-size', array('default'=>'310px'));
    $wp_customize->add_control( 'sidebar-size', array(
        'settings' => 'sidebar-size',
        'label'   => 'サイドバー',
        'description' => 'サイドバーの横幅(default:310px)',
        'section' => 'size-settings',
    ));

    $wp_customize->add_setting('archive-list-postimg-max-size', array('default'=>'180px'));
    $wp_customize->add_control( 'archive-list-postimg-max-size', array(
        'settings' => 'archive-list-postimg-max-size',
        'label'   => '記事一覧画像の高さ(リスト)',
        'description' => 'リストレイアウトは、コンテンツ(タイトル等)の高さより低く設定することはできません。<br>大[768px~]の高さ(default:180px)',
        'section' => 'size-settings',
    ));

    $wp_customize->add_setting('archive-list-postimg-mid-size', array('default'=>'130px'));
    $wp_customize->add_control('archive-list-postimg-mid-size', array(
        'settings' => 'archive-list-postimg-mid-size',
        'description' => '中[~767px](SP)の高さ(default:130px)',
        'section' => 'size-settings',
    ));

    $wp_customize->add_setting('archive-list-postimg-min-size', array('default'=>'70px'));
    $wp_customize->add_control( 'archive-list-postimg-min-size', array(
        'settings' => 'archive-list-postimg-min-size',
        'description' => '小[~599px](SP)の高さ(default:70px)',
        'section' => 'size-settings',
    ));

    $wp_customize->add_setting('archive-grid-postimg-max-size', array('default'=>'170px'));
    $wp_customize->add_control( 'archive-grid-postimg-max-size', array(
        'settings' => 'archive-grid-postimg-max-size',
        'label'   => '記事一覧画像の高さ(グリッド)',
        'description' => '大[768px~]の高さ(default:170px)',
        'section' => 'size-settings',
    ));

    $wp_customize->add_setting('archive-grid-postimg-mid-size', array('default'=>'160px'));
    $wp_customize->add_control('archive-grid-postimg-mid-size', array(
        'settings' => 'archive-grid-postimg-mid-size',
        'description' => '中[~767px](SP)の高さ(default:160px)',
        'section' => 'size-settings',
    ));

    $wp_customize->add_setting('archive-grid-postimg-min-size', array('default'=>'100px'));
    $wp_customize->add_control( 'archive-grid-postimg-min-size', array(
        'settings' => 'archive-grid-postimg-min-size',
        'description' => '小[~599px](SP)の高さ(default:100px)',
        'section' => 'size-settings',
    ));

}
add_action('customize_register', 'size_settings');

function diver_customize_size_css(){
    //初期サイズ
    $sidebarwidth = get_theme_mod('sidebar-size','310px');
    $mainmaxsize = get_theme_mod('main-max-size','90%');
    $mainmidsize = get_theme_mod('main-mid-size','96%');

    $archivelistimgmax = get_theme_mod('archive-list-postimg-max-size','180px');
    $archivelistimgmid = get_theme_mod('archive-list-postimg-mid-size','130px');
    $archivelistimgmin = get_theme_mod('archive-list-postimg-min-size','70px');
    $archivegridimgmax = get_theme_mod('archive-grid-postimg-max-size','170px');
    $archivegridimgmid = get_theme_mod('archive-grid-postimg-mid-size','160px');
    $archivegridimgmin = get_theme_mod('archive-grid-postimg-min-size','100px');

    ob_start();

    ?>
    <style>
        .grid_post_thumbnail{
            height: <?php echo $archivegridimgmax; ?>;
        }

        .post_thumbnail{
            height: <?php echo $archivelistimgmax; ?>;
        }

        @media screen and (min-width: 1201px){
            #main-wrap,.header-wrap .header-logo,.header_small_content,.bigfooter_wrap,.footer_content,.containerwidget{
                width: <?php echo $mainmaxsize; ?>;   
            }
        }

        @media screen and (max-width: 1200px){
           #main-wrap,.header-wrap .header-logo,.header_small_content,.bigfooter_wrap,.footer_content,.containerwidget{
                width: <?php echo $mainmidsize; ?>;   
            }
        }

        @media screen and (max-width: 768px){
            #main-wrap,.header-wrap .header-logo,.header_small_content,.bigfooter_wrap,.footer_content,.containerwidget{
                width: 100%;   
            }
        }

        @media screen and (min-width: 960px){
            #sidebar {
                width: <?php echo $sidebarwidth; ?>;
            }
        }

        @media screen and (max-width: 767px){
            .grid_post_thumbnail{
                height: <?php echo $archivegridimgmid; ?>;
            }

            .post_thumbnail{
                height: <?php echo $archivelistimgmid; ?>;
            }
        }

        @media screen and (max-width: 599px){
            .grid_post_thumbnail{
                height: <?php echo $archivegridimgmin; ?>;
            }

            .post_thumbnail{
                height: <?php echo $archivelistimgmin; ?>;
            }
        }
    </style>
    <?php
    if(is_singular()){
        $pagemaxsize = get_theme_mod('main-max-size-page',get_theme_mod('main-max-size','90%'));
        $pagemidsize = get_theme_mod('main-mid-size-page',get_theme_mod('main-mid-size','96%'));
        ?>
        <style>
            @media screen and (min-width: 1201px){
                #main-wrap{
                    width: <?php echo $pagemaxsize; ?>;   
                }
            }

            @media screen and (max-width: 1200px){
               #main-wrap{
                    width: <?php echo $pagemidsize; ?>;   
                }
            }
        </style>
        <?php }

    $size_css = ob_get_contents();
    ob_end_clean();

    echo minify_css($size_css);

}
add_action( 'wp_head', 'diver_customize_size_css');
?>