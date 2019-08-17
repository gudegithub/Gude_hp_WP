<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * MySQL 設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link http://wpdocs.osdn.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define('DB_NAME', 'LAA0988628-fjkelf');

/** MySQL データベースのユーザー名 */
define('DB_USER', 'LAA0988628');

/** MySQL データベースのパスワード */
define('DB_PASSWORD', 'IrmbeRGg');

/** MySQL のホスト名 */
define('DB_HOST', 'mysql133.phy.lolipop.lan');

/** データベースのテーブルを作成する際のデータベースの文字セット */
define('DB_CHARSET', 'utf8');

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define('DB_COLLATE', '');

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '?&~"D"Y"AulcXRT6uI,Mh,}yX**3B#n)NB;;2Ok(y}g:gFm=17D{9ivl{vS&GO=E');
define('SECURE_AUTH_KEY', '`SJP0z+E/vH&:815c}VGbuwcn;G.8Cdm_DyxzVOZvd~WuiO;qP>Lmv~M3qm8V<g*');
define('LOGGED_IN_KEY', '/[M}&7>1(wc9{@)]9f&x1={8Xlv-X|:-m;Qia6c98.B_rdBa~y`[OGmv^x4PE*Tj');
define('NONCE_KEY', 'oxsEW>mjOQZOjhVl;ZvX3BDqq;0}{a1jaB(e&57FJt|/wQzJ-2M-{Y+-OW&{YaS.');
define('AUTH_SALT', 'iJ^Sg..C6mE9U"ybj-H>%TgVt$;}N9]H@]PNrA9X%9}t89kq$GdHP6%6XqcqlOf.');
define('SECURE_AUTH_SALT', 'Kd]&k!i]V,3)H2^wAq?yME-<d^4/d2l?.LJZ)/b??_{Ycg>VP%flT*i5t^#0/r,V');
define('LOGGED_IN_SALT', '"9P~)`4CIUq}RCz."mejn|_c(<JD/(es{Coclt4fK}H)gh[IM05-X%$b~pS,A,Qb');
define('NONCE_SALT', 'v*m+yV~.a5.q;i2*%hxp6O?1m!0@k]hqwgSNLYTvW::Pkc}Q~ScN]6DA@;ey_u)y');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'wp1_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数については Codex をご覧ください。
 *
 * @link http://wpdocs.osdn.jp/WordPress%E3%81%A7%E3%81%AE%E3%83%87%E3%83%90%E3%83%83%E3%82%B0
 */
define('WP_DEBUG', false);

/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
  define('ABSPATH', dirname(__FILE__) . '/');
}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
