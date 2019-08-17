<?php
$p3EMB= new DiverGetPost();

class DiverGetPost
{
    public function __construct(){
        add_filter( 'media_buttons_context' , array( &$this, 'diver_media_buttons_context' ) );
        //ポップアップウィンドウ
        //media_upload_{ $type }
        add_action('media_upload_diverType', array( &$this,'diver_wp_iframe' ) );
        //クラス内のメソッドを呼び出す場合はこんな感じ。
        add_action('admin_head-media-upload-popup', array( &$this, 'diver_head' ) );

        if( is_admin() ){
			//*ログインユーザ   
			add_action('wp_ajax_paka3_pgp_action',array($this,'diver_action_callback'));
		}
    }

    public function diver_head(){ ?>
            <script type="text/javascript">
            jQuery(function($) {
                $(document).ready(function() {

                    if($('#editer_diver_kiji_title').length){
                        var str = "";
                        var id = "";

                        $(document).on('click','#pgp_chk_link', function(event){
                            event.preventDefault();
                            target = $(this).attr("class");

                            var link_array = []

                            link_array.push( target );
                            obj_title = $(this).text();
                            obj_link = $(this).attr("href");
                            obj_id = target;
                            id += obj_id+',';
                            str += "<li>"
                            str += "<a href ='" + obj_link + "' title='" + obj_title + "'>" + obj_title + "</a>";
                            str += "</li>";

                             $(".diver_rel_kiji").html(str);
                             $(".postid").html(str);
                             $(".postid_id").html(id);
                        });

                        //OKクリックされたら
                        $('#diver_ei_btn_yes').on('click', function() {
                            var str = $("#preview").html();
                            var title = $('#editer_diver_kiji_title').val();
                            var id =  $(".postid_id").html();

                           var types = document.getElementsByName('editer_diver_getpost_type');
                           for (i = 0; i < types.length; i++) {
                                if (types[i].checked) {
                                    type = types[i].value;
                                }
                            }

                            var blank = ""
                            if($('#editer_diver_getpost_blank').prop('checked')){
                                blank = ' target="_blank"';
                            }

                            if(type=='card'){
                                var resArray = id.split(",");
                                var mhtml = '';
                                $.each(resArray,function(){
                                    if(this!=''){
                                        mhtml += '[getpost id="'+this+'"';
                                        if(title){
                                            mhtml += ' title="'+title+'" '+blank+']';
                                        }else{
                                            mhtml += blank+']';
                                        }
                                    }

                                });
                            }else if(type=='title'){
                               var mhtml = '<div class="editer_diver_kiji">';
                                if(title){
                                    mhtml += '<div class="editer_diver_kiji_title">'+title+'</div>';
                                }
                                mhtml += str;
                                mhtml += '</div>';
                            }else{
                                var resArray = id.split(",");
                                var mhtml = '';
                                mhtml += '[article id="'+id+'" cat_name="1" layout="'+type+'" '+blank+']';
                            }

                            //inlineのときはwindow
                            top.send_to_editor(mhtml);
                            top.tb_remove(); 
                        });
                    }

                });
            })
            </script>

        <script>
        jQuery(function($) {
            $(document).ready(function() {
                $('#diver_ei_btn_no').on('click', function() {
                    top.tb_remove(); 
                });
                
                //Enterキーが入力されたとき
                $('#editer_diver_kutikomi_title').on('keypress',function () {
                    if(event.which == 13) {
                        $('#diver_ei_btn_yes').trigger("click");
                    }
                    //Form内のエンター：サブミット回避
                    return event.which !== 13;
                });
            });
        });
        </script>
<?php
    }

    public function diver_media_buttons_context ( $context ) {
        $link = "media-upload.php?tab=kiji&type=diverType&TB_iframe=true&width=800&height=550";
        $context .= <<<EOS
    <a href='{$link}' class='thickbox button' title='関連記事'>関連記事</a>
EOS;
        return $context;
    }

    function diver_wp_iframe() {
        wp_iframe(array( $this , 'media_upload_diver_form' ) );
    }
    function media_upload_diver_form() {
        // add_filter( "media_upload_tabs", array( &$this, "diver_upload_tabs" ) ,1000);
        global $type;
        global $tab;
        if($tab == "kiji"): ?>
        <style>
            #diver_editor_popup .harf{
                width: 47%;
                display: inline-block;
                vertical-align: top;
            }
            #diver_editor_popup .harf+.harf{
                margin-left: 3%;
            }

            #diver_editor_popup .tri{
                width: 32%;
                display: inline-block;
                vertical-align: top;
            }
            #diver_editor_popup .tri+.tri{
                margin-left: 1%;
            }
        </style>
			<div id="diver_editor_popup">

            <div class="harf">
                <label class="auxiliary_label">挿入タイプ</label>
                <label><input type="radio" id="editer_diver_getpost_type" name="editer_diver_getpost_type" value="title">タイトル　</label>
                <label><input type="radio" id="editer_diver_getpost_type" name="editer_diver_getpost_type" value="card" checked="checked">カード　</label>
                <label><input type="radio" id="editer_diver_getpost_type" name="editer_diver_getpost_type" value="grid">グリッド　</label>
                <label><input type="radio" id="editer_diver_getpost_type" name="editer_diver_getpost_type" value="list">リスト</label>
            </div>
            <div class="harf">
                <label class="auxiliary_label">リンクオプション</label>
                <label><input type="checkbox" id="editer_diver_getpost_blank" name="editer_diver_getpost_blank">別タブで開く　</label>
            </div>
            <br><br>

            <label>タイトル</label><input type="text" id="editer_diver_kiji_title" style="width:100%" required="required"/><br><br>
            <label>選択中記事</label>
			<form  action="" id="diver_relpost_form">
				<p>
				<div id="preview"><ul class='diver_rel_kiji'></ul></div>
                <div class="postid" style="display: none;"></div>
                <div class="postid_id" style="display: none;"></div>
				</p>

            <div style="text-align: right;margin: 5px 0;">
            <?php
            $args = array(
            'orderby' => 'order',
            'order' => 'ASC',
            'exclude' => '0',
            'hide_empty' => false,
                    );
            $cat_all = get_categories($args);

            echo '<select name="ajaxpost_search_category" style="width:120px">';
            echo '<option value="none">未設定</option>';
            foreach($cat_all as $value):
            echo '<option value="'.$value->term_id.'">'.$value->name.'</option>';
            endforeach;
            echo '</select>';
            ?>
            <input type="search" id="ajaxpost_search_keyword" size="60" placeholder="検索テキスト"> <button type="button" class="button" id="re_getPostsSubmit">検索</button></div>
			<div class="resblock">
				<ul id="res"></ul>
				<input type=hidden id=paka3getpost_count value = "0" />
				<!-- このポイントで読み込み -->
				<div id=loadingmessage><img src="<?php echo get_template_directory_uri() ?>/images/bx_loader.gif" /></div>
				<div class="diver_kiji_trigger"></div>
			</div>

			</form>
			<div class="submitbox">
                <div id="wp-link-cancel">
                    <button type="button" class="button" id="diver_ei_btn_no">キャンセル</button>
                    <button type="button" class="button" id="getPostsSubmit">続きを読み込む</button>
					<button type="button" class="button" id="re_getPostsSubmit">再読み込み</button>
                </div>
                <div id="wp-link-update">
                    <input type="submit" value="選択したリンクを挿入する" class="button button-primary" id="diver_ei_btn_yes">
                </div>
            </div>
    <?php endif;
    }

    function diver_upload_tabs( $tabs )
    {
        $tabs = array();
        $tabs[ "kiji" ] = "関連記事" ;
        return $tabs;
    }

    public function diver_action_callback(){
        if(isset($_POST['paka3getpost_count'])){
            if($_POST['ajaxpost_search_keyword']){
        		$this->args = array(
                                's'=>'"'.$_POST['ajaxpost_search_keyword'].'"',
        						'numberposts'   => 15,
        						'offset'           => $_POST['paka3getpost_count'] * 10 ,
        						'category'         => $_POST['ajaxpost_search_category'],
        						'orderby'          => 'post_date',
        						'order'            => 'DESC',
        						'post_type'        => 'post',
        						'post_status'      => 'publish'); 
                }else{
                    $this->args = array(
                                'numberposts'   => 15,
                                'offset'           => $_POST['paka3getpost_count'] * 10 ,
                                'category'         => $_POST['ajaxpost_search_category'],
                                'orderby'          => 'post_date',
                                'order'            => 'DESC',
                                'post_type'        => 'post',
                                'post_status'      => 'publish'); 
                }

        		//記事の取得
        		$posts_array = get_posts( $this->args );
        		$a = array();
        		//記事データの整形
        		foreach ( $posts_array as $akey => $aval) {
        			$a[ $akey ] = $aval ; 
        			//静的リンクを追加する。
        			$a[ $akey ]->post_href = get_permalink( $aval->ID );
        			$a[ $akey ]->post_edit_href = get_edit_post_link( $aval->ID );
        		}
        		//JSON出力
        		$response = json_encode( $a );
        		header( "Content-Type: application/json" );
        		echo $response;
        		exit;
        }else{
        	die("エラー");
        }
    }
}
?>