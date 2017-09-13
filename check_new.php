<?php

$de_csv = fopen('de_DE.csv', 'r');
$phrases_csv = fopen('phrases.csv', 'r');
$de_new_csv = fopen('de_DE_new.csv', 'w');

$old = array();

while (($data = fgetcsv($de_csv, 1000)) !== false) {
	$key = $data[0];
	$old[$key] = true;
}

while (($data = fgetcsv($phrases_csv, 1000)) !== false) {
	$key = $data[0];
	if (array_key_exists($key, $old)) {
		continue;
	}
	$data[1] = '';
	fputcsv($de_new_csv, $data);
}

fclose($de_csv);
fclose($phrases_csv);
fclose($de_new_csv);
