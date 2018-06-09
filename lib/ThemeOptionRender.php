<?php
/**
 * Typecho MDUI 主题设置
 * 
 * @author 黎明余光 <i@emiria.moe>
 * @version 2.1.0 (180405)
 */

class Render {
    public $form;

    public function __construct ($form) {
        $this->form = $form;
    }

    public function panel($type = "item", $title = "", $summary = "", $content = "", $open = false, $gapless = true) {
        $open = ($open) ? " mdui-panel-item-open" : NULL;
        $gapless = ($gapless) ? " mdui-panel-gapless" : NULL;
        switch ($type) {
            case "main": 
                echo "<style>body{background-color:#F5F5F5}@media screen and (min-device-width:1024px){::-webkit-scrollbar-track{background-color:rgba(255,255,255,0)}::-webkit-scrollbar{width:6px;background-color:rgba(255,255,255,0)}::-webkit-scrollbar-thumb{border-radius:3px;background-color:rgba(193,193,193,1)}}.typecho-head-nav{background-color:#673AB7}#typecho-nav-list .focus .parent a,#typecho-nav-list .parent a:hover,#typecho-nav-list .root:hover .parent a{background:RGBA(255,255,255,0)}#typecho-nav-list{display:none}.typecho-head-nav .operate a{border:0;color:rgba(255,255,255,.6)}.typecho-head-nav .operate a:focus,.typecho-head-nav .operate a:hover{color:rgba(255,255,255,.8);background-color:#673AB7;outline:0}.body.container{min-width:100%!important;padding:0}.row{margin:0}.col-mb-12{padding:0!important}.typecho-page-title{height:100px;padding:10px 40px 20px 40px;background-color:#673AB7;color:#FFF;font-size:24px}.typecho-option-tabs{padding:0;margin:0;height:60px;background-color:#512DA8;margin-bottom:40px!important;padding-left:25px}.typecho-option-tabs li{margin:0;border:none;float:left;position:relative;display:block;text-align:center;font-weight:500;font-size:14px;text-transform:uppercase}.typecho-option-tabs a{height:auto;border:0;color:rgba(255,255,255,.6);background-color:rgba(255,255,255,0)!important;padding:17px 24px}.typecho-option-tabs a:hover{color:rgba(255,255,255,.8)}.message{background-color:#673AB7!important;color:#fff}.success{background-color:#673AB7;color:#fff}.current{background-color:#FFF;height:4px;padding:0!important;bottom:0}.current a{color:#FFF}input[type=text],textarea{border:none;border-bottom:1px solid rgba(0,0,0,.6);outline:0;border-radius:0}.typecho-option span{margin-right:0}.typecho-option-submit{position:fixed;right:32px;bottom:32px}.typecho-option-submit button{float:right;background:#00BCD4;box-shadow:0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);color:#FFF}.typecho-page-main .typecho-option textarea{height:149px}.typecho-option label.typecho-label{font-weight:500;margin-bottom:20px;margin-top:10px;font-size:16px;padding-bottom:5px;border-bottom:1px solid rgba(0,0,0,.2)}#use-intro{box-shadow:0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);background-color:#fff;margin:8px;padding:8px;padding-left:20px;margin-bottom:40px}.typecho-foot{padding:16px 40px;color:#9e9e9e;margin-top:80px}botton,form{display:none}</style>";
                echo '<link href="https://cdnjs.loli.net/ajax/libs/mdui/0.4.1/css/mdui.min.css" rel="stylesheet">' . 
                     '<script src="https://cdnjs.loli.net/ajax/libs/mdui/0.4.1/js/mdui.min.js"></script>';
                echo "<script>mdui.JQ(function () { mdui.JQ('form').eq(0).attr('action', mdui.JQ('form').eq(1).attr('action')); });</script>";
                echo '<form action="" method="post" enctype="application/x-www-form-urlencoded" style="display: block!important">';
                echo $content;
                echo '<button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-deep-purple-accent" style="display: block!important; position: fixed; right: 32px; bottom: 32px;">保存</button></form>';
                return true;
                break;
            case "item": 
                return '<div class="mdui-panel' . $gapless . '" mdui-panel><div class="mdui-panel-item'.$open.'"><div class="mdui-panel-item-header"><div class="mdui-panel-item-title">'
                . $title . '</div><div class="mdui-panel-item-summary">'
                . $summary . '</div><i class="mdui-panel-item-arrow mdui-icon material-icons">keyboard_arrow_down</i></div><div class="mdui-panel-item-body">'
                . $content . '</div></div></div>';
                break;
            default: 
                return "";
        }
    }

    public function radio($name, $display = NULL, $description = NULL, $options, $default = NULL) {
        $string = "";
        $string .= ($description !== NULL) ? $description . "<br>" : NULL;
        $userOption = getThemeOptions($name);
        if ($userOption === NULL) {
            $userOption = $default;
        }
        $string .= '<ul style="list-style: none!important">';
        foreach ($options as $id => $value) {
            $check = ($id == $userOption) ? "checked" : NULL;
            $string .= '<li><label class="mdui-radio">
            <input type="radio" name="' . $name . '" value="' . $id . '" ' . $check . '/><i class="mdui-radio-icon"></i>' . $value . '</label></li>';
            $options[$id] = _t($value);
        }
        $string .= "</ul>";
        $$name = new Typecho_Widget_Helper_Form_Element_Radio($name, $options, $default, _t($display), _t($description));
        $this->form->addInput($$name);
        return $string;
    }

    public function input($name, $display = NULL, $description = NULL, $default = NULL) {
        $string = "";
        $userOption = getThemeOptions($name);
        $floatingLabel = ($userOption == "") ? " mdui-textfield-floating-label" : NULL;
        $string .= '<div class="mdui-textfield"><label class="mdui-textfield-label">' . $display .'</label><input class="mdui-textfield-input" type="text" name="' . $name . '" value="' . htmlspecialchars($userOption) . '"/></div>';
        $string .= ($description !== NULL) ? $description . "<br>" : NULL;
        $$name = new Typecho_Widget_Helper_Form_Element_Text($name, null, $default, $display, $description);
        $this->form->addInput($$name);
        return $string;
    }

    public function textarea($name, $display = NULL, $description = NULL, $default = NULL) {
        $string = "";
        $userOption = getThemeOptions($name);
        $floatingLabel = ($userOption == "") ? " mdui-textfield-floating-label" : NULL;
        $string .= '<div class="mdui-textfield"><label class="mdui-textfield-label">' . $display .'</label><textarea class="mdui-textfield-input" type="text" name="' . $name . '"/>' . $userOption . '</textarea></div>';
        $string .= ($description !== NULL) ? $description . "<br>" : NULL;
        $$name = new Typecho_Widget_Helper_Form_Element_Text($name, null, _t($default), _t($display), _t($description));
        $this->form->addInput($$name);
        return $string;
    }

    public function checkbox($name, $display = NULL, $description = NULL, $options, $default = NULL) {
        $string = "";
        $userOptions = getThemeOptions($name);
        $string .= '<ul style="list-style: none!important">';
        foreach ($options as $option => $value) {
            $checked = "";
            if (in_array($option, $userOptions)) $checked = "checked";
            $string .= '<li><label class="mdui-checkbox"><input type="checkbox" name="' . $name . '[]" value="' . $option . '" ' . $checked . '/><i class="mdui-checkbox-icon"></i>' . $value . '</label></li>';
            $options[$id] = _t($value);
        }
        $string .= "</ul>";
        $$name = new Typecho_Widget_Helper_Form_Element_Checkbox($name, $options, $default, _t($display), _t($description));
        $this->form->addInput($$name->multiMode());
        return $string;
    }

}