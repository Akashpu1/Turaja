<?php
/**
 * File Helper
 *
 * @author       omie vailsun
 * @purpose      File Helper
 */

if(! function_exists("getFileInfo")) {

  function getFileInfo($filename = '') {
    if (file_exists($filename)) {
      $file = array();
      $file['status'] = 1;
      $file = pathinfo($filename);
      $file['last_modified'] = date ("F d Y H:i:s.", filemtime($filename));
      $file['size'] = filesize($filename);
      if (getimagesize($filename)) {
        $file['dime'] = getimagesize($filename);
      }
      return $file;
    }else{
      return array('status' => 0, 'msg' => "File Not Found");
    }
  }
}

if(! function_exists("getDuration")) {
  function getDuration($file){
      if (file_exists($file)){
        $filedata = array();
        $handle = fopen($file, "r");
        ## read video file size
        $contents = fread($handle, filesize($file));
        fclose($handle);
        $make_hexa = hexdec(bin2hex(substr($contents,strlen($contents)-3)));
        if (strlen($contents) > $make_hexa){
        $pre_duration = hexdec(bin2hex(substr($contents,strlen($contents)-$make_hexa,3))) ;
        $post_duration = $pre_duration/1000;
        $timehours = $post_duration/3600;
        $timeminutes =($post_duration % 3600)/60;
        $timeseconds = ($post_duration % 3600) % 60;
        $timehours = explode(".", $timehours);
        $timeminutes = explode(".", $timeminutes);
        $timeseconds = explode(".", $timeseconds);
        $filedata['duration'] = $timehours[0]. ":" . $timeminutes[0]. ":" . $timeseconds[0];}
        return $filedata;
      } else {
        return false;
      }
  }
}

if(! function_exists("convertToReadableSize")) {
  function convertToReadableSize($size){
    $base = log($size) / log(1024);
    $suffix = array("", "KB", "MB", "GB", "TB");
    $f_base = floor($base);
    return round(pow(1024, $base - floor($base)), 1) . $suffix[$f_base];
  }
}
