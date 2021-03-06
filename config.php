<?php
return array (
  'db_type' => 'mysql',
  'db_host' => '103.231.69.228',
  'db_name' => 'fxcms',
  'db_user' => 'root',
  'db_pwd' => 'fanson888',
  'db_port' => '3306',
  'db_prefix' => 'fxsmph_',
  'default_theme' => 'default',
  'web_name' => '多媒体管理系统',
  'web_url' => 'http://103.231.69.228/',
  'web_path' => '/video/',
  'mserver_url' => '127.0.0.1/',
  'mserver_username' => 'admin',
  'mserver_pwd' => 'admin888',
  'web_hotkey' => '',
  'web_keywords' => 'FXCMS,方讯CMS,方讯多媒体管理系统',
  'web_description' => '欢迎使用方讯视频系统。',
  'web_email' => 'XXXXXXXX',
  'web_qq' => 'XXXXXXXX',
  'web_copyright' => '本系统版权归所属公司所有。',
  'web_tongji' => '<script language=',
  'web_icp' => '',
  'web_adsensepath' => 'temp/Banner',
  'web_admin_pagenum' => 20,
  'web_home_pagenum' => '5',
  'web_admin_hits' => 500,
  'web_hits_way' => '0',
  'web_hits_time' => 5,
  'web_admin_updown' => 100,
  'web_admin_score' => 9,
  'web_collect_num' => 3,
  'web_admin_edittime' => true,
  'web_admin_ordertype' => 'addtime',
  'web_admin_language' => '国语,粤语,英语,韩语,日语,法语,中文字幕,英文字幕',
  'web_admin_area' => '中国,内地,香港,台湾,韩国,日本,美国,英国,法国,意大利,德国,西班牙,泰国',
  'web_admin_nav' => 
  array (
    '网站信息配置' => '?s=Admin/Config/Conf/id/web',
    '视频数据管理' => '?s=Admin/Video/Show',
    '影片采集中心' => '?s=Admin/Collect/Show',
    '网站栏目管理' => '?s=Admin/Channel/Show',
    '网站广告管理' => '?s=Admin/Adsense/Show',
    '快捷菜单设置' => '?s=Admin/Config/Conf/id/nav',
  ),
  'upload_path' => 'uploads',
  'upload_style' => 'Y-m-d',
  'upload_thumb' => '0',
  'upload_thumb_w' => 120,
  'upload_thumb_h' => 168,
  'upload_water' => '0',
  'upload_water_img' => 'views/images/water.gif',
  'upload_water_pct' => 80,
  'upload_water_pos' => 9,
  'upload_http_down' => 10,
  'upload_http' => '0',
  'upload_ftp' => '0',
  'upload_ftp_host' => '255.255.255.255',
  'upload_ftp_user' => 'username',
  'upload_ftp_pass' => 'userpwd',
  'upload_ftp_port' => 21,
  'upload_ftp_dir' => '/',
  'upload_ftp_url' => '',
  'tmpl_cache_on' => false,
  'html_cache_on' => false,
  'html_cache_time' => 0,
  'html_read_type' => 0,
  'html_cache_index' => 1,
  'html_cache_list' => 24,
  'html_cache_content' => 5,
  'html_cache_play' => 24,
  'html_cache_mytpl' => '1',
  'url_html_suffix' => '.html',
  'html_file_suffix' => '.html',
  'url_rewrite' => '0',
  'url_html' => '0',
  'url_html_rule' => '2',
  'url_html_channel' => '1',
  'url_html_play' => '1',
  'url_create_time' => 2,
  'url_create_num' => 50,
  'url_dir_video' => 'vodlist',
  'url_dir_videoread' => 'detail',
  'url_dir_videoplay' => 'play',
  'url_dir_info' => 'infolist',
  'url_dir_inforead' => 'detail-n',
  'url_dir_special' => 'special',
  'url_dir_maps' => 'maps',
  'url_dir_all' => '',
  'user_register' => '1',
  'user_comment' => '1',
  'user_check' => '0',
  'user_pay' => '0',
  'user_post' => '0',
  'user_paycid' => 
  array (
    0 => '8',
    1 => '9',
    2 => '10',
    3 => '11',
    4 => '12',
    5 => '13',
    6 => '14',
    7 => '15',
    8 => '16',
    9 => '17',
    10 => '18',
    11 => '19',
    12 => '20',
    13 => '21',
    14 => '3',
    15 => '5',
    16 => '6',
  ),
  'user_money_play' => 1,
  'user_money_change' => 100,
  'user_money_add' => 20,
  'user_check_time' => 60,
  'user_page_cm' => 8,
  'user_page_gb' => 10,
  'user_replace' => '脏话|法轮功|枪械|A片|三级|伦理',
  '_htmls_' => 
  array (
    'home:index:index' => 
    array (
      0 => '{:action}',
      1 => 3600,
    ),
    'home:video:lists' => 
    array (
      0 => '{:module}_{:action}/{$_SERVER.REQUEST_URI|md5}',
      1 => 86400,
    ),
    'home:info:lists' => 
    array (
      0 => '{:module}_{:action}/{$_SERVER.REQUEST_URI|md5}',
      1 => 86400,
    ),
    'home:video:detail' => 
    array (
      0 => '{:module}_{:action}/{id}/{id|md5}',
      1 => 18000,
    ),
    'home:info:detail' => 
    array (
      0 => '{:module}_{:action}/{$_SERVER.REQUEST_URI|md5}',
      1 => 18000,
    ),
    'home:video:play' => 
    array (
      0 => '{:module}_{:action}/{ids}/{id}',
      1 => 86400,
    ),
    'home:my:show' => 
    array (
      0 => '{:module}_{:action}/{$_SERVER.REQUEST_URI|md5}',
      1 => 3600,
    ),
  ),
  'player_width' => 680,
  'player_height' => 458,
  'player_down' => 'http://union.keatv.com/baidu.html',
  'player_buffer' => 'http://union.keatv.com/ad.html',
  'player_pause' => 'http://union.keatv.com/app/pause.html',
  'player_time' => '8',
  'ckplayer_f_ad' => '',
  'ckplayer_f_ad_s' => '6',
  'ckplayer_f_ad_l' => 'http://www.fanson.cc/',
  'ckplayer_f_p' => 'http://img.411c.com/slide/2012-12-25/50d925e456720.gif',
  'ckplayer_f_p_l' => 'http://www.fanson.cc/',
  'ckplayer_first_pic' => 'http://img.411c.com/slide/2012-12-25/50d925e456720.gif',
  'ckplayer_buffer_ad' => 'http://img.411c.com/slide/2012-12-25/50d925e456720.gif',
  'player_list' => 
  array (
    'baidu' => '百度影音',
    'qvod' => '快播',
    'sohu' => '搜狐',
    'tudou' => '土豆',
    'youku' => '优酷',
    'qiyi' => '奇艺',
    'letv' => '乐视',
    'ck' => 'ckplayer',
    'sina' => '新浪视频',
  ),
  'player_web_url' => 'http://103.231.69.228/',
  'url_create_list_time' => '3',
  'url_create_list_num' => '2',
  'index_hdp_show' => '1',
  'rewrite_videolist' => '/list/p/$page/id/$id',
  'rewrite_videodetail' => '/detail/$id',
  'rewrite_videosearch' => '/video/search/p/$page',
  'rewrite_videotag' => '/vod-show-id-$id-p-$page',
  'rewrite_newslist' => '/news/show/id/$id',
  'rewrite_newsinfo' => '/news/read/id/$id',
  'rewrite_newssearch' => '/news/search/wd/$wd/page/$page',
  'rewrite_newstag' => '/vod-show-id-$id-p-$page',
  'rewrite_speciallist' => '/zt/list/p/$page',
  'rewrite_specialdetail' => '/zt/show/$id',
  'rewrite_guestbook' => '/guestbook/$page',
  'rewrite_map' => '/map/show/id/$id/limit/$limit',
  'rewrite_videoplay' => '/play/$id',
  'seo_movie_title' => '$movietitle在线观看_$movietitle高清下载_$movietitle百度影音_$sysname',
  'seo_movie_keywords' => '$movietitle在线观看_$movietitle高清下载_$movietitle百度影音',
  'seo_movie_desc' => '',
  'qvod_player_down' => 'http://union.keatv.com/qvod.html',
  'rewrite_top10' => '',
  'temp_con_name' => 'Home',
  'youyan_id' => '2085014',
  'dvr_status' => '1',
  'dvr_path' => '/var/www/media',
  'dvr_tv' => 'tv',
  'dvr_format' => 'flv;hls',
  'aws_format' => 'flv;hls',
  'aws_video_bitrate' => '500',
  'aws_video_rate' => '25',
  'aws_video_width' => '320',
  'aws_video_height' => '240',
  'aws_audio_format' => 'aac',
  'aws_audio_bitrate' => '56',
  'aws_audio_sample_rate' => '4410',
);
?>