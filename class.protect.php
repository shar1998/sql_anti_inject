<?php
/*
	Авторское право 
	URL: https://itsale.kz
	E-mail: alim.itsale@gmail.com
	Разработка: Шолоханов Алимжан 
        Защита от SQL инъекций в PHP
*/

class por_inject{ 

public function check1_text($text) {
	  $arraysql = array('UNION','SELECT','OUTFILE','LOAD_FILE','GROUP BY','ORDER BY','INFORMATION_SCHEMA.TABLES','BENCHMARK','FLOOR','SLEEP','CHAR');
	  $replacesql ='';
	  $text2=$text;
	  $text2=mb_strtoupper($text2);
	  $text2=str_ireplace($arraysql, $replacesql, $text2,$count);
	  if($count!=0){  
	  die('Ошибка, сработала защита.<br>Подозрение на SQL inj или XXS ');
	  exit;
	  }
	  
	  $array_find = array("'",'"','/**/','0x','/*','--');
	  $array_replace ='';
	  $text=str_ireplace($array_find, $array_replace, $text);
	return $text;
}

public function portect_inject($array){
$array=$this->check1_text($array);
return $array;	
}


public function portectf($array){

$meg_array=array();
if(is_array($array)){
foreach ($array as $key => $value){
if(is_array($value)){
$meg_array[$key]=$this->portectf($value);
	
}else{
$meg_array[$key]=$this->portect_inject($value);
}	

}}	
	
return $meg_array;	
	
}

}

?>
