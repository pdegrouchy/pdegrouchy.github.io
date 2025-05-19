<?php
require_once('../../python_settings/auth.php');
?><!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>Session 3</title>

		<link rel="stylesheet" href="css/reveal.css">
		<link rel="stylesheet" href="css/theme/simple.css" id="theme">
		<!-- Custom css -->
        <link rel="stylesheet" href="css/custom.css">

		<!-- Theme used for syntax highlighting of code -->
		<link rel="stylesheet" href="lib/css/zenburn.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<?php if($pdfClass!=='') {
            ?>
	    	<link rel="stylesheet" href="lib/css/default.css">
	        <?php
	        } else {?>
	        <link rel="stylesheet" href="lib/css/zenburn.css"> <?php
	        }?>

			<!-- City specific fixes -->
			<link rel="stylesheet" href="css/city.css" />
	        <?php
	        if($pdfClass!=='') {
	            ?>
	            <link rel="stylesheet" href="css/cityhandouts.css"><?php
	        }
	    ?>
		<!-- Printing and PDF exports -->
		<script>
			var link = document.createElement( 'link' );
			link.rel = 'stylesheet';
			link.type = 'text/css';
			link.href = window.location.search.match( /print-pdf/gi ) ? 'css/print/pdf.css' : 'css/print/paper.css';
			document.getElementsByTagName( 'head' )[0].appendChild( link );
		</script>
	</head>
	<body<?php if($pdfClass!=='') echo ' id="pdf"';?>>
	<p class="newlogo"><a href="https://moodle.city.ac.uk/<?php if(isset($_SESSION['cid'])) { ?>course/view.php?id=<?php echo $_SESSION['cid']; } ?>"><img border="0" alt="Courses" src="imgs/logo.png"></a></p>
		<div class="reveal">
			<div class="slides">
				<section>
					<h2>Introduction to programming with Python</h2>
					<h3>Session 3</h3>
                </section>
				<section>
                    <h3>Objectives</h3>
					<ul>
                        <li>Looping with while</li>
                        <li>Looping with for</li>
					</ul>
				</section>
				<section>
                    <h3>Motivation</h3>
					<p>On one of our previous programs, we asked the user to enter a password.</p>
					<ul>
						<li>If the password was correct, we printed "Access Granted"</li>
						<li>If it was incorrect, we printed "Forbidden"</li>
					</ul>
					<div ><pre style="margin-bottom: 0px; font-size: 22px;"><code>PASSWORD = 'super_password123'
password_entered = input("Enter the password: ")
if password_entered == PASSWORD:
    print("Access Granted")
else:
    print("Forbidden")</code></pre></div>
				</section>
				<section>
                    <h3>Motivation</h3>
					<p>However, the user only had <em>one chance</em> to enter a correct password.
						Even if the password was incorrect, the program would stop after only one try.</p>
					<p>What if we want to make the user be able to try more than once to enter a correct password?</p>
				</section>
				<section>
                    <h3>Structure of the while loop</h3>
					<div ><pre ><code>while condition:
    # statement</code></pre></div>
					<p>Where:</p>
					<ul>
						<li>The <strong>condition</strong> is an expression that takes the value True or False (boolean)</li>
						<li>The <strong>statement</strong> does something (mind the <strong>indentation</strong>)</li>
						<li><strong>While</strong> the condition is True, the <strong>statement</strong> or <strong>body</strong> of the <strong>loop</strong> is executed</li>
						<li>Each time the body of the loop is executed is an <strong>iteration</strong></li>
					</ul>
				</section>
				<section>
                    <h3 style="margin-bottom: 0px;">Structure of the while loop, flow chart</h3>
					<img data-src="imgs/flow_chart_loop.png" style="background:none; border:none; box-shadow:none;">
				</section>
				<section>
                    <h3>The while loop applied to our problem</h3>
					<div ><pre ><code>PASSWORD = 'super_password123'
password_entered = ''
while password_entered!=PASSWORD:
    password_entered = input("Enter the password: ")
    if password_entered == PASSWORD:
        print("Access Granted")
    else:
        print("Forbidden")</code></pre></div>
					<p>Where:</p>
					<ul>
						<li>The <strong>condition</strong> is the boolean value given by the comparison of the password_entered compared to PASSWORD</li>
					</ul>
				</section>
				<section>
                    <h3 style="margin-bottom: 0px;">Structure of the while loop, flow chart</h3>
					<img data-src="imgs/flow_chart_loop_ex.png" style="background:none; border:none; box-shadow:none;">
				</section>
				<section>
                    <h3>Reminder: using variables</h3>
					<p>You cannot use a variable that has not been declared</p>
					<div ><pre ><code>PASSWORD = 'super_password123'
while password_entered!=PASSWORD:
    password_entered = input("Enter the password: ")
    if password_entered == PASSWORD:
        print("Access Granted")
    else:
        print("Forbidden")</code></pre></div>
					<p>Can you see why this is wrong? Try to run this program. See the error and explain what you need to correct.</p>
				</section>
				<section>
                    <h3>Reminder: using variables</h3>
					<p>You need to declare the variable <em>password_entered</em> before using it. If you don't you get an error:</p>
					<pre>NameError: name 'password_entered' is not defined</pre>
					<div ><pre ><code>PASSWORD = 'super_password123'
password_entered = ''
while password_entered!=PASSWORD:
    password_entered = input("Enter the password: ")
    if password_entered == PASSWORD:
        print("Access Granted")
    else:
        print("Forbidden")</code></pre></div>
				</section>
				<section>
                    <h3>Reminder: conditions</h3>
					<p>Conditions are expressions, they return a value that can only be True or False.</p>
					<p>A condition that is always True, if used in a while loop, produces an <strong>infinite loop.</strong> An infinite loop is always a bug!</p>
					<div ><pre style="margin-bottom: 0px; font-size: 22px;"><code>while True: #do NOT do this! This is an example of what NOT to do.
    print('test infinite loop')</code></pre></div>
					<table>
						<tr>
							<td style="width: 40%;text-align: justify; vertical-align: top;">NB: to stop the infinite loop in Pycharm, click on the little red square:</td>
							<td style="width: 60%; border-image-width: 0px;"><img data-src="imgs/stop_program.png" style="background:none; border:none; box-shadow:none;"></td>
						</tr>
					</table>
				</section>
				<section>
                    <h3>How to avoid an infinite loop</h3>
					<p>Make sure that the condition changes to False at some point during the execution of the loop.</p>
					<p>You can implement a counter, to limit the number of <strong>iterations</strong>:</p>
					<div ><pre style="margin-bottom: 0px; font-size: 22px;"><code>counter=0
while counter < 5:
    counter = counter + 1 # that you can also write counter+=1
    print('test infinite loop')</code></pre></div>
					<p style="margin-bottom: 0px; font-size: 28px;">NB: <code>counter = counter + 1</code> is equivalent to <code>counter += 1</code></p>
					<p>We say that we <strong>increment</strong> the counter at each <strong>iteration</strong></p>
				</section>
				<section>
                    <h3>Exercise: Guess Number</h3>
					<p>Make a program to ask the user to guess the number that has been randomly generated.</p>
					<p>Start from this file: <a href="exercises/GuessNumber.py">GuessNumber.py</a> </p>
					<ul>
						<li>The user will be able to try continuously until she finds the correct number.</li>
						<li>The program will stop as soon as the number is found, i.e. as soon as the random number matches the entered number</li>
						<li>At each iteration, i.e. each time the user tries a number and presses enter, the program will say if the number is too high, too low or correct</li>
					</ul>
				</section>
				<section>
                    <h3>Solution: Guess Number</h3>
					<div ><pre style="margin-bottom: 0px; font-size: 22px;"><code>import random

# Generate a random number to be guessed
number = random.randint(1, 100)
print("Guess a magic number between 0 and 100")
guess = -1
while guess != number:
    guess = int(input("Enter your guess: "))
    if guess == number:
        print("Yes, the number is", number)
    elif guess > number:
        print("Your guess is too high")
    else:
        print("Your guess is too low")
</code></pre></div>
				</section>
				<section>
                    <h3>The keyword break</h3>
					<p>Instead of a condition, you can also use the keyword <strong>break</strong> to end the iteration of a loop.</p>
					<p>Please note, this is not recommended. It is only presented here, because it has been used in a lot of legacy code. Remember, using an endless loop is <strong>always</strong> a bug.</p>
					<iframe class="stretch" data-src="https://trinket.io/embed/python3/704e3a69e0" width="100%" height="356" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
				</section>
				<section>
                    <h3>The keyword continue</h3>
					<p>You can use the keyword <strong>continue</strong> to ignore the remaining code in the iteration and jump to the next iteration</p>
					<iframe class="stretch" data-src="https://trinket.io/embed/python3/877b4a74e6" width="100%" height="356" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
				</section>
				<section>
                    <h3>Combining break and continue</h3>
					<iframe class="stretch" data-src="https://trinket.io/embed/python3/266671ebc7" width="100%" height="356" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
				</section>
				<section>
                    <h3>Using break and continue today</h3>
					<p>Both <em>break</em> and <em>continue</em> come from the distant past of computing. They are constructs of non-structured programs; non-structured programming was already <a href="https://dlnext.acm.org/doi/abs/10.1145/362929.362947">considered problematic in 1968</a>!</p>
					<p>Understandably we should be avoiding the use of break and continue today (or simply leave it to the almost retiring software developers who studied how to code in the 60s!).</p>
					<p>Today we should be using structured programming structures such as <strong>if</strong> blocks.</p>
				</section>
				<section>
					<h3>Using <code>if</code> instead of <code>break</code> and <code>continue</code></h3>
					<p>Can you think how you can rewrite the code below using <strong>if</strong> blocks instead of break and continue?</p>
					<iframe class="stretch" data-src="https://trinket.io/embed/python3/266671ebc7" width="100%" height="356" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
				</section>
				<section>
					<h3>Solution: Using <code>if</code> instead of <code>break</code> and <code>continue</code></h3>
					<div ><pre style="margin-bottom: 0px; font-size: 22px;"><code>userIsNotAuthenticated = True
while userIsNotAuthenticated:
  print('Who are you?')
  name = input()
  if name == 'Joe':
    print('Hello, Joe. What is the password? (It is a fish.)')
    password = input()
    if password == 'swordfish':
      userIsNotAuthenticated = False
print('Access granted.')
					</code></pre></div>
				</section>
				<section>
                    <h3>Exercise: quit the program with <strong>Q</strong></h3>
					<p>Enable the use to enter some text and only quit the program if he clicks on "q" or "Q"</p>
					<p>Can you think of two different solutions? One should use the <code>break</code> keyword, the other should only
					use <code>if</code>. Which one is better and why?</p>
					<div class="solution">
						<p class="show-solution"><i class="fa fa-eye" aria-hidden="true"></i>Show solution with break</p>
						<p class="hide-solution"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide solution</p>
<pre class="solution-content python"><code data-trim data-noescape>while True:
    my_input = input('Type "q" or "Q" to quit: ')
    if my_input.upper() == "Q":
        break</code></pre>
					</div>
					<div class="solution">
					<p class="show-solution"><i class="fa fa-eye" aria-hidden="true"></i>Show solution with if</p>
						<p class="hide-solution"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide solution</p>
<pre class="solution-content python"><code data-trim data-noescape>
executionShouldContinue=True
while executionShouldContinue:
    my_input = input('Type "q" or "Q" to quit: ')
    if my_input.upper() == "Q":
        executionShouldContinue=False</code></pre>
					</div>
				</section>
				<section>
                    <h3>Sentinel value</h3>
					<p>This is what you have just used in the previous exercise.</p>
					<p>A sentinel value is a value entered by the user (with input) that will make the program stop. You can put a sentinel value in your loop to decide when you want to <strong>break</strong> it, to stop it.</p>
				</section>
				<section>
                    <h3>Exercise: compute average</h3>
					<p style="margin-bottom: 0px; font-size: 20px;">Count positive and negative numbers and compute the average of numbers</p>
					<p style="margin-bottom: 0px; font-size: 18px;">Write a program that reads an unspecified number of integers, determines how many positive
and negative values have been read, and computes the total and average of the input values
(not counting zeros). Your program ends with the input 0. Display the average as a floating point
number. Here is a sample run:</p>
					<pre style="margin-bottom: 0px; font-size: 18px;">Enter an integer, the input ends if it is 0: 1
Enter an integer, the input ends if it is 0: 2
Enter an integer, the input ends if it is 0: -1
Enter an integer, the input ends if it is 0: 3
Enter an integer, the input ends if it is 0: 0
The number of positives is 3
The number of negatives is 1
The total is 5
The average is 1.25
Enter an integer, the input ends if it is 0: 0
You didn't enter any number</pre>
				</section>
				<section>
                    <h3>Solution: compute average</h3>
					<div class="solution">
						<p class="show-solution"><i class="fa fa-eye" aria-hidden="true"></i>Show solution</p>
						<p class="hide-solution"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide solution</p>
<p class="solution-content python">Download solution here:<a href="exercises/count_positive_negative_num.py">count_positive_negative_num.py</a> (right click and save as)</p>
					</div>
				</section>
				<section>
                    <h3>Structure of the for loop</h3>
					<div ><pre class="solution-content python"><code>for element in sequence:
    # statement</code></pre></div>
					<p>Where:</p>
					<ul>
						<li><strong>element</strong> is a variable that is going to take the value of each element of the sequence</li>
						<li><strong>element</strong> is NOT a keyword, it is a variable name, so you can give it whatever name you want</li>
						<li>the keywords are <strong>for</strong> and <strong>in</strong></li>
						<li>notice the indentation that indicates the <strong>body</strong> of the loop (same as for <strong>while</strong>)</li>
					</ul>
				</section>
				<section>
                    <h3>Example: a string is a sequence</h3>
					<p>A string is a sequence of characters on which we can iterate.</p>
					<p>The value of <strong>element</strong> is going to be the value of each character of the string (each letter of the word) successively</p>
					<iframe class="stretch" data-src="https://trinket.io/embed/python3/1548e510ff" width="100%" height="356" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
				</section>
				<section>
                    <h3>The function range</h3>
					<p>You can create a sequence of numbers with the function <strong>range()</strong></p>
					<div ><pre class="solution-content python"><code>for element in range(initialValue, endValue, step):
    # statement</code></pre></div>
					<p>Where:</p>
					<ul>
						<li><strong>initialValue</strong> and step value are optional arguments</li>
						<li>The default initialValue is 0 and the <strong>endValue</strong> is excluded from the interval</li>
						<li><strong>step</strong> represents the increment and can be positive or negative</li>
					</ul>
				</section>
				<section>
                    <h3>Example: range(initialValue, endValue)</h3>
					<p>Notice how the endValue is excluded</p>
					<iframe class="stretch" data-src="https://trinket.io/embed/python3/8c9818da3a" width="100%" height="356" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
				</section>
				<section>
                    <h3>Example: range(initialValue, endValue, step)</h3>
					<p>Step specifies the increment</p>
					<iframe class="stretch" data-src="https://trinket.io/embed/python3/3e819818a0" width="100%" height="356" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
				</section>
				<section>
                    <h3>Exercise: conversion from miles to kilometres</h3>
					<p>Write a program that displays the following table (note that 1 mile is 1.609 kilometres):</p>
					<pre>Miles Kilometres
1 1.609
2 3.218
...
9 15.481
10 16.090</pre>
				</section>
				<section>
                    <h3>Solution: conversion from miles to kilometres</h3>
					<div class="solution">
						<p class="show-solution"><i class="fa fa-eye" aria-hidden="true"></i>Show solution</p>
						<p class="hide-solution"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide solution</p>
<pre class="solution-content python"><code data-trim data-noescape>print("Miles"+ "   " + "Kilometres")
miles = 1
while miles <= 10:
    print(str(miles) + "   "+  str(miles * 1.609))
    miles += 1
</code></pre>
					</div>
				</section>
				<section>
                    <h3>Exercise: Display leap years</h3>
					<p>Write a program that displays, ten per line, all the leap years in the twenty-first century
(from year 2001 to 2100). The years are separated by exactly one space.</p>
				</section>
				<section>
                    <h3>Solution: Display leap years</h3>
					<div class="solution">
						<p class="show-solution"><i class="fa fa-eye" aria-hidden="true"></i>Show solution</p>
						<p class="hide-solution"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide solution</p>
<pre class="solution-content python"><code data-trim data-noescape>count = 1
for year in range(2001, 2100 + 1):
    if year % 400 == 0 or \
	(year % 4 == 0 and year % 100 != 0):
        if count % 10 == 0:
            print(year)
        else:
            print(year, end = " ")

        count += 1
</code></pre>
					</div>
				</section>

                <section>
                    <h3>Exercise Bonus: find if a string is a Palindrome</h3>
                    <p>A string is a palindrome if it is identical forward and backward. For example “anna”,
“civic”, “level” and “hannah” are all examples of palindromic words. Write a program
that reads a string from the user and uses a loop to determine whether or not it is a
palindrome. Display the result, including a meaningful output message.</p>
                </section>

                <section>
                    <h3>Solution: Palindrome</h3>
                    <div class="solution">
						<p class="show-solution"><i class="fa fa-eye" aria-hidden="true"></i>Show solution</p>
						<p class="hide-solution"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide solution</p>
<pre class="solution-content python"><code data-trim data-noescape>line = input('Enter a string: ')

is_palindrome = True

for i in range(0, len(line) // 2):
    if line[i] != line[len(line) - 1 - i]:
        is_palindrome = False
        break

if is_palindrome:
    print(line, "is a palindrome")
else:
    print(line, "is not a palindrome")
</code></pre>
					</div>
                </section>

				<section>
                    <h3>Bonus Exercise: Caesar Cipher</h3>
<p>The idea behind this cipher is simple. Each letter in the original message is
shifted by 3 places. As a result, A becomes D, B becomes E, C becomes F, D
becomes G, etc. The last three letters in the alphabet are wrapped around to the
beginning: X becomes A, Y becomes B and Z becomes C. Non-letter characters are
not modified by the cipher.</p>
<p>Write a program that implements a Caesar cipher. Allow the user to supply the
message and the shift amount, and then display the shifted message. Your program should
also support negative shift values so that it can be used both to encode messages and
decode messages.</p>
				</section>
				<section>
                    <h3>Solution: Caesar Cipher, Ciphering</h3>
					<div class="solution">
						<p class="show-solution"><i class="fa fa-eye" aria-hidden="true"></i>Show solution</p>
						<p class="hide-solution"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide solution</p>
<p class="solution-content ">Download this file: <a href="exercises/caesar_cipher.py">caesar_cipher.py</a> (right click and save as)</p>
					</div>
				</section>

				<section>
                    <h3>Solution: Caesar Cipher, Deciphering</h3>
					<div class="solution">
						<p class="show-solution"><i class="fa fa-eye" aria-hidden="true"></i>Show solution</p>
						<p class="hide-solution"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide solution</p>
						<p class="solution-content ">Download this file: <a href="exercises/caesar_decipher.py">caesar_decipher.py</a> (right click and save as)</p>
					</div>
				</section>

				<section>
                    <h3>Exercise: Refactoring Caesar Cipher</h3>
					<p>At this point we have one script for ciphering and an other for deciphering a message.</p>
					<p>But we can notice that the scripts are very similar, and parts of the code are repeated.</p>
					<p>We do not want that in programming, we want to try to respect the <string>DRY</string> principle (Don't Repeat Yourself)</p>
					<p>Refactor the 2 previous scripts to make it one so that when we run it, we ask the user if he wants to cipher or decipher the entered message</p>
				</section>

				<section>
					<h3>Sequences: check point</h3>
					<ul>
						<li>Sequences are objects on which we can <strong>iterate</strong> (by using a while or a for loop)</li>
						<li>For each element you have one iteration</li>
						<li>At this point we have seen two types of sequences:</li>
							<ul>
								<li>string: sequences of characters (letters)</li>
								<li>range object: sequences of integer (numbers)</li>
							</ul>
						<li>NB: sequences are containers, they contain objects</li>
					</ul>
				</section>
				<section>
					<h3>Sequences: what is next?</h3>
					<ul>
						<li>You will find and use sequences a lot in python</li>
						<li>We will see other built in python sequences</li>
							<ul>
								<li>List</li>
								<li>Tuple</li>
								<li>Set</li>
							</ul>
						<li>Note that when we read a file in python, we also use iteration where each element of the loop is a line. We will revisit that when dealing with files.</li>
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
				slideNumber: true,
				center: false,

				// More info https://github.com/hakimel/reveal.js#dependencies
				dependencies: [
					{ src: 'plugin/markdown/marked.js' },
					{ src: 'plugin/markdown/markdown.js' },
					{ src: 'plugin/notes/notes.js', async: true },
					{ src: 'plugin/highlight/highlight.js', async: true, callback: function() { hljs.initHighlightingOnLoad(); } },
					{ src: 'plugin/menu/menu.js' },
					{ src: 'plugin/jquery-2.0.0.min.js' },
					{ src: 'plugin/custom.js' },

				]
			});
		</script>
	</body>
</html>
