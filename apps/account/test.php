<?php
function generateToken($id)
{
	$idSize=strlen($id);
	
	$string=substr(hash('sha256',mt_rand()),0,mt_rand(0,99999999999));
	$stringSize=strlen($string);
	
	$location=rand(0,$stringSize);
	
	$bitOne=substr($string,0,$location);
	$bitTwo=substr($string,$location,$stringSize);
	
	$product=$bitOne.$id.$bitTwo;
	
	return $array=['id'=>$id,'product'=>$product,'location'=>$location];
}

print_r(generateToken(rand(0,99999999999)));
?>