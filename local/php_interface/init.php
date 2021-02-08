<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

function dump(...$data)
{
	if($data === false) {
		echo "FALSE";
	} 
	elseif ($data === null) {
		echo "NULL";	
	} 
	else {
		echo "<pre>" . print_r($data, 1) . "</pre>";
	}
}