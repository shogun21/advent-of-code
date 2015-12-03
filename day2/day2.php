<?php

	$input = fopen("input", "r");

	$total = 0;
	$ribbon = 0;

	while (($line = fgets($input)) !== false) {

		$parts = explode('x', $line);

		$l = $parts[0];
		$w = $parts[1];
		$h = $parts[2];

		$sides[0] = $l*$w;
		$sides[1] = $w*$h;
		$sides[2] = $h*$l;

		$_sides[0] = $l+$w;
		$_sides[1] = $w+$h;
		$_sides[2] = $h+$l;

		$min = min($sides);
		$_min = min($_sides);

		$area = 2*$sides[0] + 2*$sides[1] + 2*$sides[2] + $min;
		$ribbonArea = 2*$_min+ $l*$w*$h;

		$total += $area;
		$ribbon += $ribbonArea;

	}

	echo "Part 1: {$total}\n";
	echo "Part 2: {$ribbon}\n";

	fclose($input);

