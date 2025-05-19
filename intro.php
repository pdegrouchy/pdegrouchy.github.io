<?php
require_once('../../python_settings/auth.php');
$kosmasSessions = array('27918', '27921', '35881', '31965', '31968');
$kostasSessions = array('35835', '35950', '31968');
$philipSessions = array('31965');
$kosmasAndKostasSessions = array('31968');
$kosmasAndPhilipSessions = array('31965');
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
	<body><?php
		$multipleTutors = isset($_SESSION['cid']) && (in_array($_SESSION['cid'], $kosmasAndKostasSessions) || in_array($_SESSION['cid'], $kosmasAndPhilipSessions));
		?><p class="newlogo"><a href="https://moodle.city.ac.uk/<?php if(isset($_SESSION['cid'])) { ?>course/view.php?id=<?php echo $_SESSION['cid']; } ?>"><img border="0" alt="Courses" src="imgs/logo.png"></a></p>
		<div class="reveal">
			<div class="slides">
				<section data-markdown>
                    ## Introduction to programming with Python
                    ### Tutor<?php echo ($makingPDF || $multipleTutors)?'s':''; ?>:
                    <?php
                    $shownTutor = false;
                	if((isset($_SESSION['cid']) && in_array($_SESSION['cid'], $kosmasSessions)) || $makingPDF) {
                        $shownTutor = true;
					?>### Kosmas Kosmopoulos
                    <?php
					} if((isset($_SESSION['cid']) && in_array($_SESSION['cid'], $kostasSessions)) || $makingPDF) {
                        $shownTutor = true;
                    ?>### Kostas Karoudis
                    <?php	
                	} if(!$shownTutor || $makingPDF || (isset($_SESSION['cid']) && in_array($_SESSION['cid'], $philipSessions)) ) {
                    ?>### Philip De Grouchy
                    <?php
                	}
                	?>

                    #### Author: Matthieu Choplin
				</section>
				<section data-markdown>
### Recommended reading
* Books:
 * How to Think Like a Computer Scientist by Allen B. Downey
 * Introduction to programming using Python by Daniel Liang
* Website:
 * The official python tutorial: https://docs.python.org/3/tutorial/
* See links for the websites and free Python e-books on Moodle.
				</section>
				<section data-markdown>
### Tools
* IDE: Pycharm
* Online tools: <a href='http://pythontutor.com/'>pythontutor.com</a>
				</section>
				<section data-markdown>
					### Handouts
					* No handouts will be given.
					* You can find the handouts online on <a href='http://moodle.city.ac.uk/'>Moodle</a>.

					* Printing
					* You can print handouts after you purchase credit from the computer shop (Room: E101 Drysdale Building) or by topping up online

					* More info: <a href='https://mps.city.ac.uk/user'>https://mps.city.ac.uk/user</a>

				</section>
				<section data-markdown>
### Objectives
* Think like a programmer.
* Introduction to Python. Variables. Loops. Main method. Conditional structures. Data structure.
* Debugging in Python (using pdb, Pycharm). How to read a program.
* File manipulation: Reading and writing files.
* Object Oriented programming in Python: classes, objects, inheritance, polymorphism, encapsulation. How to build a modular python program.
* Introduction to the Python standard library.
* Testing in Python. Presentation of doctest and unittest.
* Error handling: exceptions.
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
