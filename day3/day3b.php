<?php

	$input = fopen("input", "r");

	$str = fgets($input);

	$houses = 1;

	$position = array(
		'x' => 0,
		'y' => 0
	);

	$position_r = array(
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

		if ($i%2 == 0) {

			if ($str[$i] == '^')
				$position['y']++;
			else if ($str[$i] == '>')
				$position['x']++;
			else if ($str[$i] == 'v')
				$position['y']--;
			else if ($str[$i] == '<')
				$position['x']--;

		} else {

			if ($str[$i] == '^')
				$position_r['y']++;
			else if ($str[$i] == '>')
				$position_r['x']++;
			else if ($str[$i] == 'v')
				$position_r['y']--;
			else if ($str[$i] == '<')
				$position_r['x']--;

		}

		$found = false;
		$found_r = false;
		foreach ($visited as $coord) {

			if (($coord['x'] == $position['x']) &&
				($coord['y'] == $position['y']))
				$found = true;

			if (($coord['x'] == $position_r['x']) &&
				($coord['y'] == $position_r['y']))
				$found_r = true;
		
		}

		if (!$found) {

			$houses++;

			$visited[] = array(
				'x' => $position['x'],
				'y' => $position['y']
			);


		}

		if (!$found_r) {

			$houses++;

			$visited[] = array(
				'x' => $position_r['x'],
				'y' => $position_r['y']
			);

		}

	}

	echo "Houses: {$houses}\n";

	fclose($input);
