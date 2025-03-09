<?php

return [
	'1' => [
		/**
		Race 1
		*/
		'favorites' => '(F) 1, 4',
		'unions($10)' => '1, 3, 4, 5',
		'union + favorites' => '1, 3, 4, 5',
		'count union + favorites' => '4',
	],
	'2' => [
		/**
		Race 2
		*/
		'favorites' => '(F) 1, 6',
		'unions($10)' => '1, 2, 6, 10',
		'union + favorites' => '1, 2, 6, 10',
		'count union + favorites' => '4',
	],
	'3' => [
		/**
		Race 3
		*/
		'favorites' => '(F) 5, 6, 10, 12, 15',
		'unions($10)' => '1, 4, 5, 6, 8',
		'union + favorites' => '1, 4, 5, 6, 8, 10, 12, 15',
		'count union + favorites' => '8',
	],
];
