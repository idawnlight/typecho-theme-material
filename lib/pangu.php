<?php
/**
 * pangu.php
 * https://github.com/kunr/pangu.php
 *
 * Copyright (c) 2015 Rakume Hayashi
 * Licensed under the MIT License
 */

function doPangu($text) {
  $cjk = '' .
         '\x{2e80}-\x{2eff}' .
         '\x{2f00}-\x{2fdf}' .
         '\x{3040}-\x{309f}' .
         '\x{30a0}-\x{30ff}' .
         '\x{3100}-\x{312f}' .
         '\x{3200}-\x{32ff}' .
         '\x{3400}-\x{4dbf}' .
         '\x{4e00}-\x{9fff}' .
         '\x{f900}-\x{faff}';

  $patterns = array(
    'cjk_quote' => array(
      '([' . $cjk . '])(["\'])',
      '$1 $2'
    ),

    'quote_cjk' => array(
      '(["\'])([' . $cjk . '])',
      '$1 $2'
    ),

    'fix_quote' => array(
      '(["\']+)(\s*)(.+?)(\s*)(["\']+)',
      '$1$3$5'
    ),

    'cjk_hash' => array(
      '([' . $cjk . '])(#(\S+))',
      '$1 $2'
    ),

    'hash_cjk' => array(
      '((\S+)#)([' . $cjk . '])',
      '$1 $3'
    ),

    'cjk_operator_ans' => array(
      '([' . $cjk . '])([A-Za-z0-9])([\+\-\*\/=&\\|<>])',
      '$1 $2 $3'
    ),

    'ans_operator_cjk' => array(
      '([\+\-\*\/=&\\|<>])([A-Za-z0-9])([' . $cjk . '])',
      '$1 $2 $3'
    ),

    'bracket' => array(
      array(
        '([' . $cjk . '])([<\[\{\(]+(.*?)[>\]\}\)]+)([' . $cjk . '])',
        '$1 $2 $4'
      ),

      array(
        'cjk_bracket' => array(
          '([' . $cjk . '])([<>\[\]\{\}\(\)])',
          '$1 $2'
        ),

        'bracket_cjk' => array(
          '([<>\[\]\{\}\(\)])([' . $cjk . '])',
          '$1 $2'
        )
      )
    ),

    'fix_bracket' => array(
      '([<\[\{\(]+)(\s*)(.+?)(\s*)([>\]\}\)]+)',
      '$1$3$5'
    ),

    'cjk_ans' => array(
      '([' . $cjk . '])([A-Za-z0-9`@&%\=\$\^\*\-\+\\/|\\\])',
      '$1 $2'
    ),

    'ans_cjk' => array(
      '([A-Za-z0-9`~!%&=;\|\,\.\:\?\$\^\*\-\+\/\\\])([' . $cjk . '])',
      '$1 $2'
    )
  );

  foreach ($patterns as $key => $value) {
    if ($key === 'bracket') {
      $old = $text;
      $new = preg_replace('/' . $value[0][0] . '/iu', $value[0][1], $text);
      $text = $new;

      if ($old === $new) {
        foreach ($value[1] as $value) {
          $text = preg_replace('/' . $value[0] . '/iu', $value[1], $text);
        }
      }

      continue;
    }

    $text = preg_replace('/' . $value[0] . '/iu', $value[1], $text);
  }

  return $text;
}
