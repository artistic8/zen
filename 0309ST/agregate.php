<?php

return [
	'1' => [
		/**
		Race 1
		*/
		'favorites' => '(F) 2, 6, 7, 10',
		'unions($10)' => '1, 2, 5, 6, 7, 10, 11',
		'union + favorites' => '1, 2, 5, 6, 7, 10, 11',
		'count union + favorites' => '7',
		'qin(union 1)' => '2, 6, 7, 10',
		'qin(union 1093)' => '1, 5, 7, 10',
	],
	'2' => [
		/**
		Race 2
		*/
		'favorites' => '(F) 4, 6, 7, 12',
		'qin(union )' => '4, 6, 7, 12',
		'unions($10)' => '2, 4, 6, 7, 9, 10, 12',
		'union + favorites' => '2, 4, 6, 7, 9, 10, 12',
		'count union + favorites' => '7',
	],
	'3' => [
		/**
		Race 3
		*/
		'favorites' => '(F) 2, 4, 6, 8, 9',
		'unions($10)' => '2, 6, 7, 8, 10',
		'union + favorites' => '2, 4, 6, 7, 8, 9, 10',
		'count union + favorites' => '7',
	],
	'4' => [
		/**
		Race 4
		*/
		'favorites' => '(F) 2, 5, 12, 13',
		'unions($10)' => '1, 2, 4, 5',
		'union + favorites' => '1, 2, 4, 5, 12, 13',
		'count union + favorites' => '6',
	],
	'5' => [
		/**
		Race 5
		*/
		'favorites' => '(F) 1, 5, 10',
		'qin(union )' => '1, 3, 5, 10',
		'unions($10)' => '1, 2, 3, 5, 10',
		'union + favorites' => '1, 2, 3, 5, 10',
		'count union + favorites' => '5',
	],
	'6' => [
		/**
		Race 6
		*/
		'favorites' => '(F) 2, 3, 5, 12',
		'unions($10)' => '2, 3, 5, 6, 9, 11, 12',
		'union + favorites' => '2, 3, 5, 6, 9, 11, 12',
		'count union + favorites' => '7',
		'qin(union 1)' => '2, 3, 5, 12',
	],
	'7' => [
		/**
		Race 7
		*/
		'favorites' => '(F) 1, 3, 5, 7',
		'unions($10)' => '1, 3, 5, 7',
		'union + favorites' => '1, 3, 5, 7',
		'count union + favorites' => '4',
		'sevens($10)' => '1, 2, 3, 5, 6, 7, 8, 10',
		'count sevens' => '8',
		'inter sevens unions' => '1, 3, 5, 7',
		'count inter sevens unions' => '4',
	],
	'8' => [
		/**
		Race 8
		*/
		'favorites' => '(F) 1, 2, 6, 7',
		'unions($10)' => '1, 4, 5, 6, 7',
		'union + favorites' => '1, 2, 4, 5, 6, 7',
		'count union + favorites' => '6',
	],
	'9' => [
		/**
		Race 9
		*/
		'favorites' => '(F) 1, 10, 11',
		'qin(union )' => '1, 3, 10, 11',
		'unions($10)' => '1, 2, 3, 5, 10, 11',
		'union + favorites' => '1, 2, 3, 5, 10, 11',
		'count union + favorites' => '6',
		'qin(union 1000)' => '1, 2, 10, 11',
		'qin(union 1001)' => '1, 5, 10, 11',
	],
	'10' => [
		/**
		Race 10
		*/
		'favorites' => '(F) 1, 4, 5, 7, 10, 11, 13',
		'unions($10)' => '3, 4, 5, 10, 13',
		'union + favorites' => '1, 3, 4, 5, 7, 10, 11, 13',
		'count union + favorites' => '8',
	],
	'11' => [
		/**
		Race 11
		*/
		'favorites' => '(F) 4, 6, 9, 11, 14',
	],
];
