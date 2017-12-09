<?php

/**
 * Typecho MDUI 主题设置
 * @author 黎明余光 <i@emiria.moe>
 * @version 1.0.0
 */

class themeOptions {

    public function checkbox($name, $options, $type, $extra = "") {
        echo '
        <div class="mdui-panel" mdui-panel>
          <div class="mdui-panel-item">
            <div class="mdui-panel-item-header">'.$name.'</div>
            <div class="mdui-panel-item-body">';
            $userOptions = getThemeOptions()[$type];
            echo '<ul style="list-style: none!important">';
            foreach ($options as $option => $describe) {
                $check = "";
                if (in_array($option, $userOptions)) $check = "checked";
                echo '<li>
                <label class="mdui-checkbox">
                    <input type="checkbox" name="' . $type . '[]" value="' . $option . '" ' . $check . '/>
                    <i class="mdui-checkbox-icon"></i>
                    ' . $describe . '
                </label>
                </li>';
            }
        echo ($extra !== "") ? "<br>" . $extra : "";
        echo '</ul></div></div></div>';
    }

    public function radio($name, $options, $type, $extra = "") {
        echo '
        <div class="mdui-panel" mdui-panel>
          <div class="mdui-panel-item">
            <div class="mdui-panel-item-header">'.$name.'</div>
            <div class="mdui-panel-item-body">';
            $userOption = getThemeOptions()[$type];
            echo '<ul style="list-style: none!important">';
            foreach ($options as $option => $describe) {
                $check = "";
                if ($option == $userOption) $check = "checked";
                echo '<li>
                <label class="mdui-radio">
                    <input type="radio" name="' . $type . '" value="' . $option . '" ' . $check . '/>
                    <i class="mdui-radio-icon"></i>
                    ' . $describe . '
                </label>
                </li>';
            }
        echo ($extra !== "") ? "<br>" . $extra : "";
        echo '</ul></div></div></div>';
    }

    public function input($name, $type, $extra = "") {
        echo '
        <div class="mdui-panel" mdui-panel>
          <div class="mdui-panel-item">
            <div class="mdui-panel-item-header">'.$name.'</div>
            <div class="mdui-panel-item-body">';
            $userOption = getThemeOptions()[$type];
            echo '<ul style="list-style: none!important">';
            echo '<div class="mdui-textfield">
            <label class="mdui-textfield-label">' . $name .'</label>
            <input class="mdui-textfield-input" type="text" name="' . $type . '" value="' . $userOption . '"/>
          </div>';
        echo ($extra !== "") ? "<br>" . $extra : "";
        echo '</ul></div></div></div>';
    }

    public function multiInput($name, $types, $extra = "") {
        echo '
        <div class="mdui-panel" mdui-panel>
          <div class="mdui-panel-item">
            <div class="mdui-panel-item-header">'.$name.'</div>
            <div class="mdui-panel-item-body">';
            $userOptions = getThemeOptions();
            echo '<ul style="list-style: none!important">';
            foreach ($types as $type => $describe) {
                echo '<div class="mdui-textfield">
                <label class="mdui-textfield-label">' . $describe .'</label>
                <input class="mdui-textfield-input" type="text" name="' . $type . '" value="' . $userOptions[$type] . '"/>
              </div>';
            }
        echo ($extra !== "") ? "<br>" . $extra : "";
        echo '</ul></div></div></div>';
    }

    public function textarea($name, $type, $extra = "") {
        echo '
        <div class="mdui-panel" mdui-panel>
          <div class="mdui-panel-item">
            <div class="mdui-panel-item-header">'.$name.'</div>
            <div class="mdui-panel-item-body">';
            $userOption = getThemeOptions()[$type];
            echo '<ul style="list-style: none!important">';
            echo '<div class="mdui-textfield">
            <label class="mdui-textfield-label">' . $name .'</label>
            <textarea class="mdui-textfield-input" type="text" name="' . $type . '"/>' . $userOption . '</textarea>
          </div>';
        echo ($extra !== "") ? "<br>" . $extra : "";
        echo '</ul></div></div></div>';
    }

    public function printThemeOptions() {
        echo "<pre>";
        print_r(getThemeOptions());
        echo "</pre>";
    }
}