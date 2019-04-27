<?php
function defaultFor(&$param, $default = NULL){
	return (isset($param)) ? $param : $default;
}