<?php

	$input = fopen("input", "r");

	$str = fgets($input);

	$houses = 1;

	$position = array(
		'x' => 0,
		'y' => 0
	);

	$visited = array(
		array(
			'x' => 0,
			'y' => 0
		)
	);

	for ($i = 0; $i < strlen($str); $i++) {

		if ($str[$i] == '^')
			$position['y']++;
			
		if ($str[$i] == '>')
			$position['x']++;
			
		if ($str[$i] == 'v')
			$position['y']--;
			
		if ($str[$i] == '<')
			$position['x']--;

		$found = false;
		foreach ($visited as $coord)
			if ($coord['x'] == $position['x'] &&
				$coord['y'] == $position['y'])
				$found = true;

		if (!$found){

			$houses++;
			$visited[] = array(
				'x' => $position['x'],
				'y' => $position['y']
			);

		}

	}

	echo "Houses: {$houses}\n";

	fclose($input);
