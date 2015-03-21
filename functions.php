<?php 

if( !isset($content_width)){
    $content_width = 600;
}

function my_scripts(){
    if(is_single()){
        wp_enqueue_script('comment-reply');
    }
}
function my_length($length){
    if(is_smartphone()){
        return 50;
    }
    return 200;
}

function my_more($more) {
    return ' <a href="'. get_permalink( get_the_ID() ) . '">(続きを読む)</a>';
}

function is_smartphone(){
    $ua = $_SERVER['HTTP_USER_AGENT'];
    if ((preg_match('/Android/', $ua) && preg_match('/Mobile/', $ua))
        || preg_match('/(iPhone|Windows Phone)/', $ua)
    ) {
        return true;
    } else {
        return false;
    }
}


add_action('wp_enqueue_scripts', 'my_scripts');

add_filter('excerpt_mblength', 'my_length');
//add_filter('excerpt_more', 'my_more');

add_theme_support('post-thumbnails');
set_post_thumbnail_size(250,180, true);


register_sidebar( array(
    'id' => 'column01',
    'name' => 'footer-column01',
    'description' => '1段目に表示するウィジットを指定',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h1 class="widgettitle">',
    'after_title' => '</h1>'
));
register_sidebar( array(
    'id' => 'column02',
    'name' => 'footer-column02',
    'description' => '2段目に表示するウィジットを指定',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h1 class="widgettitle">',
    'after_title' => '</h1>'
));
register_sidebar( array(
    'id' => 'column03',
    'name' => 'footer-column03',
    'description' => '3段目に表示するウィジットを指定',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h1 class="widgettitle">',
    'after_title' => '</h1>'
));

add_theme_support('html5', array('search-form'));



class Small_Archive_Widget extends WP_Widget{
    /**
     * Widgetを登録する
     */
    function __construct() {
        parent::__construct(
            'small_archive', // Base ID
            'シンプルアーカイブ', // Name
            array( 'description' => '間延びしないシンプルなアーカイブ', ) // Args
        );
    }
 
    /**
     * 表側の Widget を出力する
     *
     * @param array $args      'register_sidebar'で設定した「before_title, after_title, before_widget, after_widget」が入る
     * @param array $instance  Widgetの設定項目
     */
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        echo $args['before_title'];
        echo "アーカイブ";
        echo $args['after_title'];
        echo $this->get_archives_arr();
        echo $args['after_widget'];
    }

    private function get_archives_arr(){
      $archives = wp_get_archives('echo=0'); 
      $ret = array();
      if(preg_match_all('|/([0-9]{4})/([0-9]{2})/|m', $archives, $m)){
          for($i=0 ; $i < count($m[0]); $i++){
              $ret[$m[1][$i]][] = $m[2][$i];
          }
      }
      $html="";
      foreach($ret as $year => $v){
          $html .= "<ul>$year\n";
          asort($v);
          foreach($v as $month){
              $html .="<li><a href='/$year/$month'>$month</a></li>\n";
              $html .="<span class='delimiter'>|</span>\n";
          }
          $html .= "</ul>\n";
      }
      return $html; 
    }
 
    /** Widget管理画面を出力する
     *
     * @param array $instance 設定項目
     * @return string|void
     */
    public function form( $instance ){
    }
 
    /** 新しい設定データが適切なデータかどうかをチェックする。
     * 必ず$instanceを返す。さもなければ設定データは保存（更新）されない。
     *
     * @param array $new_instance  form()から入力された新しい設定データ
     * @param array $old_instance  前回の設定データ
     * @return array               保存（更新）する設定データ。falseを返すと更新しない。
     */
    function update($new_instance, $old_instance) {
        return $new_instance;
    }
}
 
add_action( 'widgets_init', function () {
    register_widget( 'Small_Archive_Widget' );  //WidgetをWordPressに登録する
} );
