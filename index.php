<?php
	$accept = strtolower(str_replace(' ', '', $_SERVER['HTTP_ACCEPT']));
    $accept = explode(',', $accept);

	$dh  = opendir("img");
	$files = array();
	while (false !== ($filename = readdir($dh))) {
		if (!in_array($filename, array('.', '..'))) {
	    	$files[] = $filename;
	    }
	}

	$random_image = $files[array_rand($files)];

    if (in_array('application/json', $accept)) {
    	print json_encode(array('image' => $random_image));
    } else {
    	?><!doctype html>
		<html>
			<head>
				<style>
					body {
						padding: 0;
						margin: 0;
						background-color: black;
					}

					div.stuff {
						position: fixed;
						left: 0;
						top: 0;
						width: 100%;
						height: 100%;
						min-height: 100%;
						background-image: url('img/<?= $random_image ?>');
						background-repeat: no-repeat;
						background-attachment: fixed;
						background-position: center; 
						background-size: cover;
					}
				</style>
				<script src="js/jquery-2.0.2.min.js"></script>
			</head>
			<body>
				<div class="stuff">&nbsp;</div>
				<script>
					$(function() {
						setInterval(function() {
							$.getJSON('http://www.eng.uwaterloo.ca/~englcdtv/', function(data) {
								var thing = $('div.stuff');
								thing.fadeOut(500, function() {
									thing.css('background-image', 'url(img/' + data['image'] + ')');
									thing.fadeIn(500);
								});
							});
						}, 20 * 1000);
					});
				</script>
			</body>
		</html><?php
    }
?>