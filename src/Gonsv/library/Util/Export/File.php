<?php

class Util_Export_File
{
	static public function csv($name, $data = array())
	{
		$timestamp = time();
    	$filesave  = "\\data\\" . $name . '-' . $timestamp . '.csv';
    	$filepath  = "/data/" . $name . '-' . $timestamp . '.csv';
    	
    	// Definindo colunas
    	$cols  = '';
    	foreach ($data[0] as $key => $value) {
    		$cols .= $key . ',';
    	}
    	
    	// Definindo linhas
    	$rows  = '';
    	foreach ($data as $item) {
    		$rows .= "\n";
    		foreach ($item as $key => $value) {
    			$rows .= $value . ',';
    		}
    	}
    	
    	// Definindo dados
    	$dados = '';
    	$dados = $cols . $rows;
    	
    	try {
	    	if(fwrite($file = fopen($filesave, 'w+'), $dados)) {
	    		fclose($file);
	    	}
	    	return $filepath;
    	}
    	catch (Exception $e) {
    		return $e->getMessage();
    	}

    	return $filepath;
	}
}