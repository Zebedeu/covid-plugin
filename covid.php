<?php

/**
 * Plugin Name: Covid
 * Description: Changing the date format for the NewUp Theme
 * Plugin URI: http://#
 * Author: Marcio Zebedeu
 * Author URI: http://marciozebedeu.com
 * Version: 1.0.0
 * License: GPL2
 * Text Domain: covid
 * Domain Path: covid
 */

/*
    Copyright (C) Year  Author  Email

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');

define('PLUGIN_URL', plugin_dir_url(dirname(__FILE__)) );
require_once(dirname(__FILE__) . '/enqueue/enqueue.php');
require_once(dirname(__FILE__) . '/api/init.php');

function convid_header_section()
{
?>
<div class="mg-head-detail hidden-xs">
    <div class="container-fluid">
        <div class="row">
            <?php
            $header_data_enable = esc_attr(get_theme_mod('header_data_enable','true'));
            $header_time_enable = esc_attr(get_theme_mod('header_time_enable','true'));
            $header_social_icon_enable = esc_attr(get_theme_mod('header_social_icon_enable','true'));
            $newsup_header_fb_link = get_theme_mod('newsup_header_fb_link');
            $newsup_header_fb_target = esc_attr(get_theme_mod('newsup_header_fb_target','true'));
            $newsup_header_twt_link = get_theme_mod('newsup_header_twt_link');
            $newsup_header_twt_target = esc_attr(get_theme_mod('newsup_header_twt_target','true'));
            $newsup_header_lnkd_link = get_theme_mod('newsup_header_lnkd_link');
            $newsup_header_lnkd_target = esc_attr(get_theme_mod('newsup_header_lnkd_target','true'));
            $newsup_header_insta_link = get_theme_mod('newsup_header_insta_link');
            $newsup_insta_insta_target = esc_attr(get_theme_mod('newsup_insta_insta_target','true'));
            $newsup_header_youtube_link = get_theme_mod('newsup_header_youtube_link');
            $newsup_header_youtube_target = esc_attr(get_theme_mod('newsup_header_youtube_target','true'));
            $newsup_header_pintrest_link = get_theme_mod('newsup_header_pintrest_link');
            $newsup_header_pintrest_target = esc_attr(get_theme_mod('newsup_header_pintrest_target','true')); ?>
            <div class="col-md-6 col-xs-12 col-sm-6">
            <?php if($header_data_enable == true)
            { ?>
                <ul class="info-left">
                    <li><?php
                    	$date_format = get_option( 'date_format' );
                        echo date_i18n($date_format, strtotime(current_time("Y-m-d"))); 
                        if($header_time_enable == true) { ?>
                        <span  id="time" class="time"></span>
                      <?php }
                      ?>

                    </li>
                    <?php  do_action('covid_tracking_hook'); ?>

                </ul>
            <?php } ?>  
            </div>
            <?php 
            if($header_social_icon_enable == true)
            {
            ?>
            <div class="col-md-6 col-xs-12">
                <ul class="mg-social info-right">
                    
                      <?php if($newsup_header_fb_link !=''){?>
                      <li><span class="icon-soci facebook"><a <?php if($newsup_header_fb_target) { ?> target="_blank" <?php } ?>href="<?php echo esc_url($newsup_header_fb_link); ?>"><i class="fa fa-facebook"></i></a></span> </li>
                      <?php } if($newsup_header_twt_link !=''){ ?>
                      <li><span class="icon-soci twitter"><a <?php if($newsup_header_twt_target) { ?>target="_blank" <?php } ?>href="<?php echo esc_url($newsup_header_twt_link);?>"><i class="fa fa-twitter"></i></a></span></li>
                      <?php } if($newsup_header_lnkd_link !=''){ ?>
                      <li><span class="icon-soci linkedin"><a <?php if($newsup_header_lnkd_target) { ?>target="_blank" <?php } ?> href="<?php echo esc_url($newsup_header_lnkd_link); ?>"><i class="fa fa-linkedin"></i></a></span></li>
                      <?php } 
                      if($newsup_header_insta_link !=''){ ?>
                      <li><span class="icon-soci instagram"><a <?php if($newsup_insta_insta_target) { ?>target="_blank" <?php } ?> href="<?php echo esc_url($newsup_header_insta_link); ?>"><i class="fa fa-instagram"></i></a></span></li>
                      <?php }
                      if($newsup_header_youtube_link !=''){ ?>
                      <li><span class="icon-soci youtube"><a <?php if($newsup_header_youtube_target) { ?>target="_blank" <?php } ?> href="<?php echo esc_url($newsup_header_youtube_link); ?>"><i class="fa fa-youtube"></i></a></span></li>
                      <?php }  if($newsup_header_pintrest_link !=''){ ?>
                      <li><span class="icon-soci pinterest"><a <?php if($newsup_header_pintrest_target) { ?>target="_blank" <?php } ?> href="<?php echo esc_url($newsup_header_pintrest_link); ?>"><i class="fa fa-pinterest-p"></i></a></span></li>
                      <?php } ?>
                </ul>
            </div>
            <?php }?>
        </div>
    </div>
</div>
<?php 
}
add_action( 'after_setup_theme', 'convid_remove_parent_theme_date', 0 );

function convid_remove_parent_theme_date() {

remove_action('newsup_action_header_section', 'newsup_header_section', 5);
}

add_action('newsup_action_header_section', 'convid_header_section', 5);


