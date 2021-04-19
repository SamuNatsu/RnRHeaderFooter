<?php

/**
 * Rainiar's Toolkit for Typecho - Custom Header & Footer
 * 
 * @package RnRHeaderFooter
 * @author Rainiar
 * @version 1.1.0
 * @link https://rainiar.top
 */
class RnRHeaderFooter_Plugin implements Typecho_Plugin_Interface {
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     * 
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate() {
        Typecho_Plugin::factory('Widget_Archive')->header_527026065 = array('RnRHeaderFooter_Plugin', 'header');
        Typecho_Plugin::factory('Widget_Archive')->footer_1734442741 = array('RnRHeaderFooter_Plugin', 'footer');
    }
    
    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * 
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate() {}
    
    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form) {
        $cHeader = new Typecho_Widget_Helper_Form_Element_Textarea('cHeader', NULL, NULL, _t('自定义Header'), NULL);
        $form->addInput($cHeader);
        $cFooter = new Typecho_Widget_Helper_Form_Element_Textarea('cFooter', NULL, NULL, _t('自定义Footer'), NULL);
        $form->addInput($cFooter);
    }
    
    /**
     * 个人用户的配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form) {}
    
    public static function header() {
        $settings = Helper::options()->plugin('RnRHeaderFooter');
        echo $settings->cHeader;
    }
    
    public static function footer() {
        $settings = Helper::options()->plugin('RnRHeaderFooter');
        echo $settings->cFooter;
    }
}
