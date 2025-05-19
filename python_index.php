<?php
require_once('../../python_settings/auth.php');
?><!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>Introduction to programming using python</title>

		<link rel="stylesheet" href="css/reveal.css">
		<link rel="stylesheet" href="css/theme/simple.css" id="theme">

		<!-- Theme used for syntax highlighting of code -->
		<link rel="stylesheet" href="lib/css/zenburn.css">

		<!-- City specific fixes -->
		<link rel="stylesheet" href="css/city.css" />

		<!-- Printing and PDF exports -->
		<script>
			var link = document.createElement( 'link' );
			link.rel = 'stylesheet';
			link.type = 'text/css';
			link.href = window.location.search.match( /print-pdf/gi ) ? 'css/print/pdf.css' : 'css/print/paper.css';
			document.getElementsByTagName( 'head' )[0].appendChild( link );
		</script>
	</head>
	<body>
		<p class="newlogo"><a href="https://moodle.city.ac.uk/<?php if(isset($_SESSION['cid'])) { ?>course/view.php?id=<?php echo $_SESSION['cid']; } ?>"><img border="0" alt="Courses" src="imgs/logo.png"></a></p>
		<div class="reveal">
			<div class="slides">
				<section>
					<ul>
						<li><a href='intro.php'>Intro</a><?php /* <a href='pdf/intro.pdf'> (PDF)</a> */?> </li>
						<li><a href='session100.php'>Session 1</a><?php /* <a href='pdf/session1.pdf'> (PDF)</a> */ ?></li>
						<li><a href='session200.php'>Session 2</a><?php /*  <a href='pdf/session2.pdf'> (PDF)</a> */ ?></li>
						<li><a href='session300.php'>Session 3</a><?php /*  <a href='pdf/session3.pdf'> (PDF)</a> */ ?></li>
						<li><a href='session400.php'>Session 4</a><?php /*  <a href='pdf/session4.pdf'> (PDF)</a> */ ?></li>
						<li><a href='session500.php'>Session 5</a><?php /*  <a href='pdf/session5.pdf'> (PDF)</a> */ ?></li>
						<li><a href='session610.php'>Session 6 (Tuples, Sets and Dictionaries)</a><?php /*  <a href='pdf/session610.pdf'> (PDF)</a> */ ?></li>
						<li><a href='session620.php'>Session 6 (Files and Exceptions)</a><?php /*  <a href='pdf/session620.pdf'> (PDF)</a> */ ?></li>
						<li><a href='session700.php'>Session 7</a><?php /*  <a href='pdf/session7.pdf'> (PDF)</a> */ ?></li>
						<li><a href='session800.php'>Session 8</a><?php /*  <a href='pdf/session8.pdf'> (PDF)</a> */ ?></li>
						<li><a href='session900.php'>Session 9</a><?php /*  <a href='pdf/session9.pdf'> (PDF)</a> */ ?></li>
						<li><a href='session1000.php'>Session 10</a><?php /*  <a href='pdf/session10.pdf'> (PDF)</a> */ ?></li>
					</ul>
				</section>
			</div>
		</div>

		<script src="lib/js/head.min.js"></script>
		<script src="js/reveal.js"></script>

		<script>
			// More info https://github.com/hakimel/reveal.js#configuration
			Reveal.initialize({
				history: true,

				// More info https://github.com/hakimel/reveal.js#dependencies
				dependencies: [
					{ src: 'plugin/markdown/marked.js' },
					{ src: 'plugin/markdown/markdown.js' },
					{ src: 'plugin/notes/notes.js', async: true },
					{ src: 'plugin/highlight/highlight.js', async: true, callback: function() { hljs.initHighlightingOnLoad(); } }
				]
			});
		</script>
	</body>
</html>
