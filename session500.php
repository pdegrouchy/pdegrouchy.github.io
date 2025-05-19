<?php
require_once('../../python_settings/auth.php');
$pdfClass = isset($_GET['pdfCreation'])?'pdf':'';
?><!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>Session 5:  Subroutines</title>

		<link rel="stylesheet" href="css/reveal.css">
		<link rel="stylesheet" href="css/theme/simple.css" id="theme">
		<!-- Custom css -->
        <link rel="stylesheet" href="css/custom.css">

		<!-- Theme used for syntax highlighting of code -->
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
					<h3>Session 5:  
Subroutines    </h3>
				</section>
				<section>
					<h3>Objectives</h3>
					<ul style="font-size: 26px;">
						<li>To revise function definitions</li>
                        <li>To invoke value-returning functions</li>
                        <li>To invoke functions that does not return a value</li>
                        <li>To pass arguments by value</li>
                        <li>To develop reusable code that is modular, easy to read, easy to debug, and
                        easy to maintain</li>
                        <li>To create modules for reusing functions</li>
                        <li>To determine the scope of variables</li>
                        <li>To define functions with default arguments</li>
                        <li>To return multiple values from a function</li>
                        <li>To apply the concept of function abstraction in software development</li>
                        <li>To design and implement functions using stepwise refinement</li>
					</ul>
				</section>

                <section>
                    <h3>Defining and Calling Functions</h3>
                    <p>A function is a collection of statements that are grouped together to perform an operation.</p>
                    <img src="imgs/function_def.png" style="background:none; border:none; box-shadow:none; margin-top:0px;" />
				</section>

                <section>
                    <h3>How a function gets called</h3>
                    <iframe width=100% height="500" frameborder="0" data-src="https://pythontutor.com/iframe-embed.html#code=def+max(num1,+num2%29%3A%0D%0A++++%23+Return+the+max+between+two+numbers+%0D%0A++++if+num1+%3E+num2%3A%0D%0A++++++++result+%3D+num1%0D%0A++++else%3A%0D%0A++++++++result+%3D+num2%0D%0A%0D%0A++++return+result%0D%0A%0D%0Adef+main(%29%3A%0D%0A++++i+%3D+5%0D%0A++++j+%3D+2%0D%0A++++k+%3D+max(i,+j%29+%23+Call+the+max+function%0D%0A++++print(%22The+maximum+between%22,+i,+%22and%22,+j,+%22is%22,+k%29%0D%0A%0D%0Amain(%29+%23+Call+the+main+function%0D%0A&origin=opt-frontend.js&cumulative=false&heapPrimitives=false&textReferences=false&py=3&rawInputLstJSON=%5B%5D&curInstr=0&codeDivWidth=350&codeDivHeight=400"> </iframe>
                </section>

                <section>
                    <h3>Functions With/Without Return Values</h3>
                    <ul>
                        <li>A function with a <strong>return</strong> keyword explicitly written, returns a <strong>value</strong>. For example the function max() in the previous program.</li>
                        <li>A function <strong>does something</strong> but does not return a value. For example the function main() in the previous program.</li>
                    </ul>
                </section>

                <section>
                    <h3>Example of a function that does something without returning a value</h3>
                    <pre class="solution-content python"><code data-trim data-noescape style="line-height: 100%;font-size: 24px;margin-top: 0px; margin-bottom: 0px;">def printGrade(score):
    # Print grade for the score
    if score >= 90.0:
        print('A')
    elif score >= 80.0:
        print('B')
    elif score >= 70.0:
        print('C')
    elif score >= 60.0:
        print('D')
    else:
        print('F')

def main():
    score = eval(input("Enter a score: "))
    print("The grade is ", end = "")
    printGrade(score)

main() # Call the main function</code></pre>
                </section>

                <section>
                    <h3>Example of a function that returns a value</h3>
                    <pre class="solution-content python"><code data-trim data-noescape style="line-height: 100%;font-size: 24px;margin-top: 0px; margin-bottom: 0px;">def getGrade(score):
    # Return the grade for the score
    if score >= 90.0:
        return 'A'
    elif score >= 80.0:
        return 'B'
    elif score >= 70.0:
        return 'C'
    elif score >= 60.0:
        return 'D'
    else:
        return 'F'

def main():
    score = eval(input("Enter a score: "))
    print("The grade is", getGrade(score))

main() # Call the main function
</code></pre>
                </section>

                <section>
                    <h3>The None Value</h3>
                    <p>A function that does not return a value is known as a void function.  In Python, such function returns a special value, called None.</p>
                    <iframe class="stretch" data-src="https://trinket.io/embed/python3/453540a05f" width="100%" height="356" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
                </section>

                <section>
                    <h3>Passing Arguments by Position</h3>
                    <p>Suppose you have the following function:</p>
                    <pre class="solution-content python"><code data-trim data-noescape style="line-height: 100%;font-size: 24px;margin-top: 0px; margin-bottom: 0px;">def nPrintln(message, n):
    for i in range(0, n):
        print(message)</code></pre>
                    <p>What is the ouput of <strong>nPrintln("Welcome to Python", 5)</strong>?</p>
                    <p>What is the ouput of <strong>nPrintln(15, "Computer Science")</strong>?</p>
                    <p>What is wrong? How to fix?</p>
                </section>

                <section>
                    <h3>Keyword Arguments</h3>
                    <p>With the same function:</p>
                    <pre class="solution-content python"><code data-trim data-noescape style="line-height: 100%;font-size: 24px;margin-top: 0px; margin-bottom: 0px;">def nPrintln(message, n):
    for i in range(0, n):
        print(message)</code></pre>
                    <p>What is the ouput of <strong>nPrintln(message="Welcome to Python", n=5)</strong></p>
                    <p>What is the ouput of <strong>nPrintln(n = 4, message = "Computer Science")</strong></p>
                    <p>What is wrong? How to fix?</p>
                </section>

                <section>
                    <h3>Pass by Value</h3>
                    <p>In Python, all data are objects. A variable for an object is actually a reference to
the object. When you invoke a function with a parameter, the reference value of
the argument is passed to the parameter. This is referred to as pass-by-value. For
simplicity, we say that the value of an argument is passed to a parameter when
invoking a function. Precisely, the value is actually a reference value to the object.</p>
                    <p>If the argument is a number or a string, the argument is not affected, regardless of
the changes made to the parameter inside the function.</p>
                </section>

                <section>
                    <h3>Example</h3>
                    <iframe width="800" height="500" frameborder="0" data-src="https://pythontutor.com/iframe-embed.html#code=def+main(%29%3A%0D%0A++++x+%3D+1%0D%0A++++print(%22Before+the+call,+x+is%22,+x%29%0D%0A++++increment(x%29%0D%0A++++print(%22After+the+call,+x+is%22,+x%29%0D%0A%0D%0Adef+increment(n%29%3A+%0D%0A++++n+%2B%3D+1%0D%0A++++print(%22n+inside+the+function+is%22,+n%29%0D%0A%0D%0Amain(%29+%23+Call+the+main+function&origin=opt-frontend.js&cumulative=false&heapPrimitives=false&textReferences=false&py=3&rawInputLstJSON=%5B%5D&curInstr=0&codeDivWidth=350&codeDivHeight=400"> </iframe>
                </section>

                <section>
                    <h3>Modularising Code</h3>
                    <p>Functions can be used to reduce redundant coding and enable code reuse. Functions can also be used to modularise code and improve the quality of the program.</p>
										<p><strong>Examples</strong></p>
										<p>Download the following files and put them in the current Pycharm project (right click and save as): </p>
                    <ul>
                        <li><a href="exercises/GCDFunction.py">GCDFunction.py</a></li>
                        <li><a href="exercises/TestGCDFunction.py">TestGCDFunction.py</a></li>
                    </ul>
                </section>

                <section>
                    <h3>Exercise: Use the isPrime Function</h3>
                    <p>The program <a href="exercises/PrimeNumberFunction.py">PrimeNumberFunction.py</a> (right click and save as) provides the isPrime(number) function for testing whether a number is prime.</p>
                    <p>Use this function to find the number of prime numbers less than 10,000.</p>
                    <ul>
                        <li>Reuse the function in the same file</li>
                        <li>Import the function in an other file</li>
                    </ul>
                </section>

                <section>
                    <p>Using the function in the same file</p>
                    <div class="solution">
						<p class="show-solution"><i class="fa fa-eye" aria-hidden="true"></i>Solution</p>
						<p class="hide-solution" style="margin-top: 0px; margin-bottom: 0px;"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide solution</p>
						<pre class="solution-content python"><code data-trim data-noescape>def main():
    count = 0
    N = 10000
    for number in range(2, N):
        if isPrime(number):
            count += 1
    print("The number of prime number <", 10000, "is", count)

# Check whether number is prime
def isPrime(number):
    for divisor in range(2, number // 2 + 1):
        if number % divisor == 0: # If true, number is not prime
            return False # number is not a prime
    return True # number is prime

main()</code></pre></div>
                </section>

                <section>
                    <p>Import the function from an other file</p>
                    <div class="solution">
						<p class="show-solution"><i class="fa fa-eye" aria-hidden="true"></i>Solution</p>
						<p class="hide-solution" style="margin-top: 0px; margin-bottom: 0px;"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide solution</p>
						<pre class="solution-content python"><code data-trim data-noescape>from PrimeNumberFunction import isPrime

def main():
    count = 0
    N = 10000
    for number in range(2, N):
        if isPrime(number):
            count += 1

    print("The number of prime number <", 10000, "is", count)

main()
</code></pre></div>
                </section>

                <section>
                    <h3>Scope of Variables</h3>
                    <p>Scope: the part of the program where the variable can be referenced.</p>
                    <p>A variable created inside a function is referred to as a <strong>local variable</strong>. Local variables can only be accessed inside a function. The scope of a local variable starts from its creation and continues to the end of the function that contains the variable.</p>
                    <p>In Python, you can also use <strong>global variables</strong>. They are created outside all functions and are accessible to all functions in their scope.</p>
                </section>

                <section>
                    <h3>Example 1</h3>
                    <iframe class="stretch" data-src="https://trinket.io/embed/python3/7ba726683e" width="100%" height="356" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
                </section>

                <section>
                    <h3>Example 2</h3>
                    <iframe class="stretch" data-src="https://trinket.io/embed/python3/4719a9bdd9" width="100%" height="356" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
                </section>

                <section>
                    <h3>Example 3</h3>
                    <iframe class="stretch" data-src="https://trinket.io/embed/python3/89a29f72a1" width="100%" height="356" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
                </section>

                <section>
                    <h3>Example 4</h3>
                    <iframe class="stretch" data-src="https://trinket.io/embed/python3/96f45830fe" width="100%" height="356" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
                </section>

                <section>
                    <h3>Example 5</h3>
                    <iframe class="stretch" data-src="https://trinket.io/embed/python3/a1f7b3d129" width="100%" height="356" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
                </section>

                <section>
                    <h3>Default Arguments</h3>
                    <p>Python allows you to define functions with default argument values. The default values are passed to the parameters when a function is invoked without the arguments.</p>
                    <iframe class="stretch" data-src="https://trinket.io/embed/python3/a5890b9bff" width="100%" height="356" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
                </section>

                <section>
                    <h3>Returning Multiple Values</h3>
                    <p>Python allows a function to return multiple values. The following program defines a function that takes two numbers and returns them in non-descending order.</p>
                    <iframe class="stretch" data-src="https://trinket.io/embed/python3/8f9b5e2c05" width="100%" height="356" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
                </section>

                <section>
                    <h3>Function Abstraction</h3>
                    <p>You can think of the function body as a black box that contains the detailed implementation for the function.</p>
                    <img src="imgs/function_black_box.png" style="background:none; border:none; box-shadow:none; margin-top:0px;" >
                </section>

                <section>
                    <h3>Benefits of Functions</h3>
                    <ul>
                        <li>Write a function once and reuse it anywhere.</li>
                        <li>Information hiding. Hide the implementation from the user.</li>
                        <li>Reduce complexity.</li>
                    </ul>
                </section>

                <section>
                    <h3>Stepwise Refinement</h3>
                    <p>The concept of function abstraction can be applied to the process of developing programs. When writing a large program, you can use the <strong>"divide and conquer" strategy</strong>, also known as stepwise refinement, to decompose it into subproblems. The subproblems can be further decomposed into smaller, more manageable problems.</p>
                </section>

                <section>
                    <h3>PrintCalendar Case Study</h3>
                    <p>Let us use the PrintCalendar example to demonstrate the stepwise (or divide-and-conquer) refinement approach.
Suppose you write a program that displays the calendar for a given month of the year. The program prompts the user to enter the year and the month, and then it displays the entire calendar for the month, as shown in the following sample run:</p>
                    <pre class="solution-content python"><code data-trim data-noescape style="line-height: 95%;font-size: 16px;margin-top: 0px; margin-bottom: 0px;">Enter full year (e.g., 2001): 2019
Enter month as number between 1 and 12: 8

        August 2019
———————————————————————————
Sun Mon Tue Wed Thu Fri Sat
                1   2   3
4   5   6   7   8   9   10
11  12  13  14  15  16  17
18  19  20  21  22  23  24
25  26  27  28  29  30  31 </code></pre>
                </section>

                <section>
                    <h3>Design Diagram 1</h3>
                    <img src="imgs/diagram1.png" style="background:none; border:none; box-shadow:none; margin-top:0px;" />
                </section>

                <section>
                    <h3>Design Diagram 2</h3>
                    <img src="imgs/diagram2.png" style="background:none; border:none; box-shadow:none; margin-top:0px;" />
                </section>

                <section>
                    <h3>Design Diagram 3</h3>
                    <img src="imgs/diagram3.png" style="background:none; border:none; box-shadow:none; margin-top:0px;" />
                </section>

                <section>
                    <h3>Design Diagram 4</h3>
                    <img src="imgs/diagram4.png" style="background:none; border:none; box-shadow:none; margin-top:0px;" />
                </section>

                <section>
                    <h3>Design Diagram 5</h3>
                    <img src="imgs/diagram5.png" style="background:none; border:none; box-shadow:none; margin-top:0px;" />
                </section>

                <section>
                    <h3>Design Diagram 6</h3>
                    <img src="imgs/diagram6.png" style="background:none; border:none; box-shadow:none; margin-top:0px;height: 550px" />
                </section>

                <section>
                    <h3>Implementation: Top-Down</h3>
                    <p>Top-down approach is to implement one function in the structure chart at a time from the top to the bottom.</p>
                    <p><strong>Stubs</strong> can be used for the functions waiting to be implemented. A stub is a simple but incomplete version of a function. The use of stubs enables you to test invoking the function from a caller. Implement the main function first and then use a stub for the printMonth function. For example, let printMonth display the year and the month in the stub. Thus, your program may begin like this:</p>
                    <p><a href="exercises/PrintCalendarSkeleton.py">PrintCalendarSkeleton.py</a></p>
                </section>

                <section>
                    <h3>Implementation: Bottom-Up</h3>
                    <p>Bottom-up approach is to implement one function in the structure chart at a time from the bottom to the top. For each function implemented, write a test program to test it. Both top-down and bottom-up functions are fine. Both approaches implement the functions incrementally and help to isolate programming errors and makes debugging easy. Sometimes, they can be used together.</p>
                </section>

                <section>
                    <h3>Implementation: Bottom-Up cont. (1)</h3>
                    <p>The isLeapYear(year) function can be implemented using the following code:</p>
                    <pre class="solution-content python"><code data-trim data-noescape style="line-height: 100%;font-size: 24px;margin-top: 0px; margin-bottom: 0px;">return year % 400 == 0 or (year % 4 == 0 and year % 100 != 0)
</code></pre>
                </section>

                <section>
                    <h3>Implementation: Bottom-Up cont. (2)</h3>
                    <p style="font-size: 28px">Use the following facts to implement getTotalNumberOfDaysInMonth(year, month):</p>
                    <ul style="font-size: 28px">
                        <li>January, March, May, July, August, October, and December have 31 days</li>
                        <li>April, June, September, and November have 30 days.</li>
                        <li>February has 28 days during a regular year and 29 days during a leap year. A regular year, therefore, has 365 days, and a leap year has 366 days.</li>
                        <li>To implement getTotalNumberOfDays(year, month), you need to compute the total number of days (totalNumberOfDays) between January 1, 1800, and the first day of the calendar month. You could find the total number of days between the year 1800 and the calendar year and then figure out the total number of days prior to the calendar month in the calendar year. The sum of these two totals is totalNumberOfDays.</li>
                        <li>To print the calendar’s body, first pad some space before the start day and then print the lines for every week.</li>
                    </ul>
                </section>

                <section>
                <div class="solution">
						<p class="show-solution"><i class="fa fa-eye" aria-hidden="true"></i>Solution</p>
						<p class="hide-solution" style="margin-top: 0px; margin-bottom: 0px;"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide solution</p>
						<p class="solution-content python">You can download a solution here: <a href="exercises/PrintCalendar.py"/>PrintCalendar.py</a></p>
                </div>
                </section>

                <section>
                    <h3>Benefit of stepwise refinement</h3>
                    <p>This approach makes the program easier to write, reuse, debug, test, modify, and maintain.</p>
                    <ul>
                        <li>Simpler Program</li>
                        <li>Reusing function</li>
                        <li>Easier Developing, Debugging and Testing</li>
                        <li>Better facilitating Teamwork</li>
                    </ul>
                </section>

                <section>
                    <h3>Exercise: credit card number validation (1)</h3>
                    <p>Credit card numbers follow certain patterns: They must have between 13 and 16 digits, and the number must start with:</p>
                    <ul>
                        <li>4 for Visa cards</li>
                        <li>5 for MasterCard credit cards</li>
                        <li>37 for American Express cards</li>
                        <li>6 for Discover cards</li>
                    </ul>
                </section>

                <section>
                    <h3>Exercise: credit card number validation (2)</h3>
                    <p>In 1954, Hans Luhn of IBM proposed an algorithm for validating credit card numbers. The
algorithm is useful to <strong>determine whether a card number is entered correctly</strong>.</p>
                    <p>Credit card numbers are generated following this validity
check, commonly known as the Luhn check or the Mod 10 check, which can be described as
follows (for illustration, consider the card number 4388576018402626):</p>

                </section>

                <section>
                    <h3>Exercise: credit card number validation (3)</h3>
                    <ol>
                        <li>Double every second digit from right to left. If doubling of a digit results in a two­digit number,
add up the two digits to get a single­digit number</li>
                        <img src="imgs/credit_card_number.png" style="background:none; border:none; box-shadow:none; margin-top:0px;height: 350px"></ul>

                    </ol>

                </section>

                <section>
                    <h3>Exercise: credit card number validation(4)</h3>
                    <ol start="2">
                        <li>Now add all single­digit numbers from Step 1. <br/>
4 + 4 + 8 + 2 + 3 + 1 + 7 + 8 = 37</li>
                        <li>Add all digits in the odd places from right to left in the card number.<br/>
6 + 6 + 0 + 8 + 0 + 7 + 8 + 3 = 38</li>
                        <li>Sum the results from Steps 2 and 3. <br/>
37 + 38 = 75</li>
                        <li>If the result from Step 4 is divisible by 10, the card number is valid; otherwise, it is invalid. For
example, the number 4388576018402626 is invalid, but the number 4388576018410707 is
valid.</li>

                    </ul>
                </section>

                <section>
                    <h3>Exercise: credit card number validation (5)</h3>
                    <p>Write a program that prompts the user to enter a credit card number as an integer.
Display whether the number is valid or invalid. Design your program to use the following
functions:</p>
                    <pre class="solution-content python"><code data-trim data-noescape style="line-height: 100%;font-size: 18px;margin-top: 0px; margin-bottom: 0px;">#Return true if the card number is valid
def isValid(number):
#Get the result from Step2
def sumOfDoubleEvenPlace(number):
#Return this number if it is a single digit, otherwise,return
#the sum of the two digits
def getDigit(number):
#Return sum of odd place digits in number
def sumOfOddPlace(number):
#Return true if the digit d is a prefix for number
def prefixMatched(number,d):
#Return the number of digits in d
def getSize(d):
#Return the first k number of digits from number.If the
#number of digits in number is less than k, return number.
def getPrefix(number,k):</code></pre>
                </section>

                <section>
                <div class="solution">
						<p class="show-solution"><i class="fa fa-eye" aria-hidden="true"></i>Solution</p>
						<p class="hide-solution" style="margin-top: 0px; margin-bottom: 0px;"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide solution</p>
						<p class="solution-content python">You can download a solution here: <a href="exercises/credit_card_number_validation.py"/>credit_card_number_validation.py</a></p>
                </div>
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
