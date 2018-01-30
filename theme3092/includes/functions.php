<?php 
defined('_JEXEC') or die;

//Wrap Title words with Spans
function wrap_with_span($string){
  if(strpos($string, '||')){
    $string_delim_arr = explode('||', $string);
    $string = $string_delim_arr[0];
  }
  $string_array = explode(" ", $string);
  $string_array_length = count($string_array);
  $string_spans[] = "";
    foreach ($string_array as $key => $value) {
      $class= 'item_title_part' . $key;
      if($key % 2){
        $class.=" item_title_part_even";
      }
      else{
        $class.=" item_title_part_odd";
      }
      if ($key*2<$string_array_length){
        $class.=" item_title_part_first_half";
      }
      else{
        $class.=" item_title_part_second_half";
      }
      if($key == 0){
        $class.=" item_title_part_first";
      }
      if($key == $string_array_length){
        $class.=" item_title_part_last";
      }
      $string_spans[] = '<span class="' . $class . '">'.$value.'</span> ';
    }
  $wrapped_string = implode($string_spans);
  return  $wrapped_string;
}

function wrap_chars_with_span($string){
  $string_array = str_split($string);
  $string_array_length = count($string_array);
  $string_spans[] = "";
    foreach ($string_array as $key => $value) {
      $class= 'item_title_char' . $key;
      if($key % 2){
        $class.=" item_title_char_even";
      }
      else{
        $class.=" item_title_char_odd";
      }
      if ($key*2<$string_array_length){
        $class.=" item_title_char_first_half";
      }
      else{
        $class.=" item_title_char_second_half";
      }
      if($key == 0){
        $class.=" item_title_char_first";
      }
      if($key == $string_array_length-1){
        $class.=" item_title_char_last";
      }
      $string_spans[] = '<span class="' . $class . '">'.$value.'</span>';
    }
  $wrapped_string = implode($string_spans);
  return  $wrapped_string;
}

//Limit words
function limit_words($string, $word_limit){
  $words = explode (" ",strip_tags($string));
  return implode (" ",array_splice ($words,0,$word_limit));
}

//Wrap with tags
function wrap_with_tag($string, $tag){
  $wrapped_string = '<'. $tag .'>'. $string .'</'. $tag .'>';
  return  $wrapped_string;
}

function ezDate($d) {
  $ts = time() - strtotime(str_replace("-","/",$d));
 
  if($ts>31536000) $val = round($ts/31536000,0).' year';
  else if($ts>2419200) $val = round($ts/2419200,0).' month';
  else if($ts>604800) $val = round($ts/604800,0).' week';
  else if($ts>86400) $val = round($ts/86400,0).' day';
  else if($ts>3600) $val = round($ts/3600,0).' hour';
  else if($ts>60) $val = round($ts/60,0).' minute';
  else $val = $ts.' second';
 
  if($val>1) $val .= 's';
  return $val;
}