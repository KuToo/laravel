<?php
/**
 * 将json字符串转化成php数组
 * @param  $json_str
 * @return $json_arr
 */
public function json_to_array($json_str){
    
    if(is_array($json_str) || is_object($json_str)){
        $json_str = $json_str;
    }else if(is_null(json_decode($json_str))){
        $json_str = $json_str;
    }else{
        $json_str =  strval($json_str);
        $json_str = json_decode($json_str,true);
    }
    $json_arr=array();
    foreach($json_str as $k=>$w){
        if(is_object($w)){
            $json_arr[$k]= $this->json_to_array($w); //判断类型是不是object
        }else if(is_array($w)){
            $json_arr[$k]= $this->json_to_array($w);
        }else{
            $json_arr[$k]= $w;
        }
    }
    return $json_arr;
}