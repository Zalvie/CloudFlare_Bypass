<?php

	$parse = <<<SMD
  var t,r,a,f, GgydmCQ={"FblpsuEanzgG":!+[]+!![]+!![]+!![]+!![]};
        t = document.createElement('div');
        t.innerHTML="<a href='/'>x</a>";
        t = t.firstChild.href;r = t.match(/https?:\/\//)[0];
        t = t.substr(r.length); t = t.substr(0,t.length-1);
        a = document.getElementById('jschl-answer');
        f = document.getElementById('challenge-form');
        ;GgydmCQ.FblpsuEanzgG+=!+[]+!![]+!![]+!![]+!![];GgydmCQ.FblpsuEanzgG-=!+[]+!![]+!![]+!![]+!![];GgydmCQ.FblpsuEanzgG+=!+[]+!![]+!![]+!![]+!![]+!![]+!![]+!![];GgydmCQ.FblpsuEanzgG*=+((!+[]+!![]+!![]+!![]+[])+(!+[]+!![]+!![]+!![]));GgydmCQ.FblpsuEanzgG-=+((!+[]+!![]+[])+(!+[]+!![]+!![]+!![]+!![]+!![]));GgydmCQ.FblpsuEanzgG-=+((!+[]+!![]+!![]+[])+(+[]));GgydmCQ.FblpsuEanzgG-=+((!+[]+!![]+[])+(!+[]+!![]+!![]+!![]+!![]));GgydmCQ.FblpsuEanzgG*=+((!+[]+!![]+!![]+[])+(!+[]+!![]+!![]+!![]+!![]+!![]+!![]+!![]+!![]));GgydmCQ.FblpsuEanzgG+=+((!+[]+!![]+[])+(!+[]+!![]+!![]+!![]+!![]+!![]+!![]+!![]+!![]));
SMD;

	$cat = ['+[]',
		 	'+!![]',
			'!+[]+!![]',
			'!+[]+!![]+!![]',
			'!+[]+!![]+!![]+!![]',
			'!+[]+!![]+!![]+!![]+!![]',
			'!+[]+!![]+!![]+!![]+!![]+!![]',
			'!+[]+!![]+!![]+!![]+!![]+!![]+!![]',
			'!+[]+!![]+!![]+!![]+!![]+!![]+!![]+!![]',
			'!+[]+!![]+!![]+!![]+!![]+!![]+!![]+!![]+!![]'];

	$parse = preg_replace('/[;\s]{1,}[\w][\.\s](.*?);|([^\+\-\/\!\+\*\=\n\;\(\)\[\]])/', '', $parse);

	function calc($s, $output = '') {
		global $cat;

		foreach (explode(PHP_EOL, str_replace(['(', ')', '[]+[]'], [PHP_EOL, PHP_EOL, '[]'], $s)) as $_) {
			if(strpos($_, '[') === FALSE) continue;
			
			$output .= $_ == '!![]' ? 1 : array_search($_, $cat);
		}

		return (int) $output;
	}

	$i = 0;

	foreach (explode(';', $parse) as $_) {
		$_ = explode('=', trim($_));

		if(!empty($_[1]) && in_array($_[0], ['-', '+', '*', '/', '']))
			eval(sprintf('$i %s= %d;', $_[0], calc($_[1])));
	}

	var_dump($i);
