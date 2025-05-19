<?php
require_once('../../python_settings/auth.php');
$pdfClass = isset($_GET['pdfCreation'])?'pdf':'';
?><!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>Session 2</title>

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
    <!-- for executing the code with SKULPT -->
    <script type="text/javascript">
    // output functions are configurable.  This one just appends some text
    // to a pre element.
    function outf(text) {
        var mypre = document.getElementById("output");
        mypre.innerHTML = mypre.innerHTML + text;
    }
    function builtinRead(x) {
        if (Sk.builtinFiles === undefined || Sk.builtinFiles["files"][x] === undefined)
                throw "File not found: '" + x + "'";
        return Sk.builtinFiles["files"][x];
    }

    // Here's everything you need to run a python program in skulpt
    // grab the code from your textarea
    // get a reference to your pre element for output
    // configure the output function
    // call Sk.importMainWithBody()
    function runit() {
       var prog = document.getElementById("yourcode").value;
       var mypre = document.getElementById("output");
       mypre.innerHTML = '';
       Sk.pre = "output";
       Sk.configure({output:outf, read:builtinRead});
       (Sk.TurtleGraphics || (Sk.TurtleGraphics = {})).target = 'mycanvas';
       var myPromise = Sk.misceval.asyncToPromise(function() {
           return Sk.importMainWithBody("<stdin>", false, prog, true);
       });
       myPromise.then(function(mod) {
           console.log('success');
       },
           function(err) {
           console.log(err.toString());
       });
    }
    </script>
        <!-- begining of the slides with reveal.js -->
		<div class="reveal">
			<div class="slides">
				<section>
					<h2>Introduction to programming with Python</h2>
					<h3>Session 2</h3>
				</section>
				<section>
                    <h3>Objectives</h3>
					<ul>
                    	<li>Review what we have seen in the previous session:</li>
						<ul>
							<li>Variables</li>
							<li>Data types</li>
							<li>Functions</li>
						</ul>
						<li>Controlling the flow of our programs</li>
					</ul>
				</section>
				<section>
                    <h3>Variables 1: dynamic typing</h3>
					<ul>
                    	<li>Python has strong dynamic typing</li>
						<ul>
							<li>No need to declare the type of the variable</li>
							<li>Python recognises the type according to the value of the variable</li>
						</ul>
						<pre class="solution-content python"><code data-trim data-noescape>
my_variable = 100
print(type(my_variable))  # will print &lt;class 'int'&gt;
my_variable="100"  # notice the quote for a string data type
print(type(my_variable))  # will print &lt;class 'str'&gt;
						</code></pre>
					</ul>
				</section>
				<section>
                    <h3>Variables 2: case sensitive</h3>
					<ul>
						<li>Python is case sensitive</li>
						<pre class="solution-content python"><code data-trim data-noescape>
My_variable = 100
print(id(my_variable))
Traceback (most recent call last):
  File "&lt;stdin&gt;", line 1, in &lt;module&gt;
NameError: name 'my_variable' is not defined
						</code></pre>
					</ul>
				</section>
				<section>
                    <h3>Variables 3: where it is stored</h3>
					<ul>
						<li>A variable has an address in memory</li>
						<iframe width="800" height="500" frameborder="1" data-src="https://pythontutor.com/iframe-embed.html#code=my_variable+%3D+%22a+value%22%0Aprint(%22the+address+in+memory+is%22,+id(my_variable%29%29%0Amy_variable+%3D+%22an+other+value%22%0Aprint(%22the+address+in+memory+is%22,+id(my_variable%29%29%0Aan_other_variable+%3D+%22an+other+value%22&origin=opt-frontend.js&cumulative=false&heapPrimitives=false&textReferences=false&py=3&rawInputLstJSON=%5B%5D&curInstr=0&codeDivWidth=500&codeDivHeight=400"> </iframe>
					</ul>
				</section>
				<section>
                    <h3 style="margin-bottom: 0px;">Variables 4: scope</h3>
					<ul>
						<li>A variable has a <strong>scope</strong>: only accessible from where it is defined.</li>
						<li>A variable is wiped out from memory once it stops being used. We say that it is <strong>garbage collected</strong></li>
					</ul>
					<p>We define <em>variable_a</em> in <em>program_a.py</em></p>
					<pre><code>#program_a.py
variable_a = 42</code></pre>
					<p>We try to use <em>variable_a</em> in <em>program_b.py</em>. What is wrong?
					<pre><code>#program_b.py
print(variable_a)</code></pre>
				</section>
				<section>
                    <h3>Variables 5: naming rules</h3>
					<ul>
						<li>A variable name is a non-empty sequence of characters of any length with:</li>
						<ul>
							<li>The start character can be the underscore "_" or a capital or lower case letter.</li>
							<li>Python keywords are not allowed as identifier names!</li>
						</ul>
					</ul>
				</section>
				<section>
					<h3>Keywords (to not use as variable name)</h3>
					<table style="width:100%">
					  <tr>
						<td> and </td>
						<td> as </td>
						<td> assert </td>
						<td> break </td>
						<td> class </td>
						<td> continue </td>
						<td> def </td>
					  </tr>
					  <tr>
						<td> del </td>
						<td> elif </td>
						<td> else </td>
						<td> except </td>
						<td> exec </td>
						<td> finally </td>
						<td> for </td>
					  </tr>
					  <tr>
						<td> from </td>
						<td> global </td>
						<td> if </td>
						<td> import </td>
						<td> in </td>
						<td> is </td>
						<td> lambda </td>
					  </tr>
					  <tr>
						<td> not </td>
						<td> or </td>
						<td> pass </td>
						<td> print </td>
						<td> raise </td>
						<td> return </td>
						<td> try </td>
					  </tr>
					  <tr>
						<td> while </td>
						<td> with </td>
						<td> yield </td>
					  </tr>
					</table>
				</section>
				<section>
                    <h3>Exercise 1: From algorithm to Python code</h3>
					<ul>
						<li>Translate the following algorithm into Python code:</li>
							<ul>
								<li>Step 1: Use a variable named <em>miles</em> with initial value 100 .</li>
								<li>Step 2: Multiply <em>miles</em> by 1.609 and assign it to a variable named kilometres</li>
								<li>Step 3: Display the value of kilometres with the function print()</li>
							</ul>
					</ul>
					<div class="solution">
						<p class="show-solution"><i class="fa fa-eye" aria-hidden="true"></i>Show solution</p>
						<p class="hide-solution"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide solution</p>
<pre class="solution-content python"><code>miles = 100
kilometres = miles * 1.609
print(kilometres)</code></pre>
					</div>
				</section>
				<section>
                    <h3>Exercise 2.1: Area of a rectangular room</h3>
					<ul>
						<li>Use variables for length, width and area.</li>
						<li>Set length to be 3 and width to be 4</li>
						<li>The multiply operator in Python is the sign<strong>*</strong></li>
						<li>Formulae of the area of a square: length * width</li>
						<li>Use the <strong>print()</strong> function to display the result</li>
					</ul>
					<div class="solution">
						<p class="show-solution"><i class="fa fa-eye" aria-hidden="true"></i>Show solution</p>
						<p class="hide-solution"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide solution</p>
<pre class="solution-content python"><code>length = 3
width = 4
area = length * width  # we are using variables defined above
print("The area of the squared room of length", \
	length, "and width", width, "is", area)</code></pre>
					</div>
				</section>
				<section>
                    <h3 style="margin-bottom: 0px;">Exercise 2.2: Dynamic Area</h3>
					<ul>
						<li>Use the <strong>input()</strong> function to ask values from the user.</li>
						<li>Ask the user to give the <em>length</em> and <em>width</em> required</li>
						<li>Convert the input received into a number with the function <strong>float()</strong></li>
					</ul>
					<div class="solution">
						<p class="show-solution"><i class="fa fa-eye" aria-hidden="true"></i>Show solution</p>
						<p class="hide-solution"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide solution</p>
<pre class="solution-content python"><code>length = float(input("What is the length of the room? "))
width = float(input("What is the width of the room? "))
area = length * width  # using variables defined above
print("The area of the squared room of length", \
	length, "and width", width, "is", area)</code></pre>
					</div>
				</section>
				<section>
                    <h3>Common Data Types: definition</h3>
					<ul>
						<li>Numeric types:</li>
						<ul>
                    		<li><strong>Integer</strong>: whole number</li>
							<pre class="solution-content python"><code>type(1)  # &lt;class 'int'&gt;</code></pre>
							<li><strong>Float</strong>: number with decimal</li>
							<pre class="solution-content python"><code>type(1.0)  # &lt;class 'float'&gt;</code></pre>
						</ul>
						<li><strong>String</strong></li>
						<pre class="solution-content python"><code>type("1.0")  # &lt;class 'str'&gt;</code></pre>
					</ul>
				</section>
				<section>
                    <h3>Common Data Types: Examples</h3>
					<table style="width:100%">
					  <tr>
						<th>Data type</th>
						<th>Examples</th>
					  </tr>
					  <tr>
						<td>Integers</td>
						<td>-2, -1, 0, 1, 2, 3, 4, 5</td>
					  </tr>
					  <tr>
						<td>Floats</td>
						<td>-1.25, -1.0, --0.5, 0.0, 0.5, 1.0, 1.25</td>
					  </tr>
					  <tr>
						<td>Strings</td>
						<td>'a', 'aa', 'aaa', 'Hello!', '11 cats'</td>
					  </tr>
					</table>
				</section>
				<section>
                    <h3>Numeric Operators</h3>
					<table style="width:100%">
					  <tr>
						<th>Name</th>
						<th>Meaning</th>
						<th>Example</th>
						<th>Result</th>
					  </tr>
					  <tr>
						<td>+</td>
						<td>Addition</td>
						<td>34 + 1</td>
						<td>35</td>
					  </tr>
					  <tr>
						<td>-</td>
						<td>Subtraction</td>
						<td>34.0 - 0.1</td>
						<td>33.9</td>
					  </tr>
					  <tr>
						<td>*</td>
						<td>Multiplication</td>
						<td>300 * 30</td>
						<td>9000</td>
					  </tr>
					  <tr>
						<td>/</td>
						<td>Float division</td>
						<td>1 / 2</td>
						<td>0.5</td>
					  </tr>
					  <tr>
						<td>//</td>
						<td><strong>Integer Division</strong></td>
						<td>1 // 2</td>
						<td>0</td>
					  </tr>
					  <tr>
						<td>**</td>
						<td><strong>Exponentiation</strong></td>
						<td>4 ** 0.5</td>
						<td>2.0</td>
					  </tr>
					  <tr>
						<td>%</td>
						<td><strong>Remainder</strong></td>
						<td>20 % 3</td>
						<td>2</td>
					  </tr>
					</table>
				</section>
				<section>
                    <h3>The % (modulo or remainder) operator (1/2)</h3>
					<img data-src="imgs/modulo_operator.png" style="background:none; border:none; box-shadow:none;">
				</section>
				<section>
                    <h3>The % (modulo or remainder) operator (2/2)</h3>
					<p><strong>Remainder or Modulo</strong> is very useful in programming. For example, an even number % 2 is always 0 and an
						odd number % 2 is always 1. So you can use this property to determine whether a number is even or odd.</p>
				</section>
				<section>
                    <h3>Arithmetic expressions</h3>
					<img data-src="imgs/arithmetic_expression.png" style="background:none; border:none; box-shadow:none;">
					<p>...is translated to:</p>
					<pre class="solution-content python"><code>(3 + 4 * x) / 5 – 10 * (y - 5) * (a + b + c) / x +\
    9 * (4 / x + (9 + x) / y)</code></pre>
					<p>NB: the sign <strong>\</strong> is an "escaped" character, to break a line for readability</p>
				</section>
				<section>
                    <h3>Exercise: Computing Loan Payments</h3>
					<p>Let the user enter the yearly interest rate, number of years, and loan amount, and
						compute monthly payment and total payment.</p>
                    <ul>
                        <li>Use input()</li>
                        <li>Translate the following arithmetic expression in Python:</li>
                    </ul>
					<img data-src="imgs/montlhy_paiement.png" style="background:none; border:none; box-shadow:none;">
				</section>
				<section>
                    <h3>Solution: Computing Loan Payments</h3>
					<div class="solution">
						<p class="show-solution"><i class="fa fa-eye" aria-hidden="true"></i>Show solution</p>
						<p class="hide-solution"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide solution</p>
<pre class="solution-content python" style="margin-bottom: 0px; font-size: 22px;line-height: 100%;"><code># Enter yearly interest rate
annualInterestRate = float(input(
  "Enter annual interest rate, e.g., 8.25: "))
monthlyInterestRate = annualInterestRate / 1200
# Enter number of years
numberOfYears = float(input(
  "Enter number of years as an integer, e.g., 5: "))
# Enter loan amount
loanAmount = float(input("Enter loan amount, e.g., 120000.95: "))
# Calculate payment
monthlyPayment = loanAmount * monthlyInterestRate / (1
  - 1 / (1 + monthlyInterestRate) ** (numberOfYears * 12))
totalPayment = monthlyPayment * numberOfYears * 12

# Display results
print("The monthly payment is " +
  str(int(monthlyPayment * 100) / 100))
print("The total payment is " + str(int(totalPayment * 100) /100))</code></pre>
					</div>
				</section>
				<section>
                    <h3>Operations on the String Type (1/2)</h3>
					<h4>Concatenation</h4>
					<p style="margin-bottom: 0px;">The expression concatenating a string returns a new string:</p>
					<pre class="solution-content python" ><code>first_string = "abra"
second_string = "cada"
third_string = "bra"
concatenated_string = first_string + second_string \
    + third_string
print("first_string is", first_string,
    "second_string is", second_string,
    "third_string is ", third_string,
    "concatenated_string is ", concatenated_string)</code></pre>
				</section>
				<section>
					<h3>Operations on the String Type (2/2)</h3>
					<h4>Slicing</h4>
					<p>Remember that the string is a <strong>sequence</strong> of characters</p>
					<p>The items of a sequence can be accessed through indexes</p>
					<table style="width:100%">
					  <tr>
						<th>Items (characters)</th>
						<td>a</td>
						<td>b</td>
						<td>r</td>
						<td>a</td>
						<td>c</td>
						<td>a</td>
						<td>d</td>
						<td>a</td>
						<td>b</td>
						<td>r</td>
						<td>a</td>
					  </tr>
					  <tr>
						<th>Indexes</th>
						<td>0</td>
						<td>1</td>
						<td>2</td>
						<td>3</td>
						<td>4</td>
						<td>5</td>
						<td>6</td>
						<td>7</td>
						<td>8</td>
						<td>9</td>
						<td>10</td>
					  </tr>
					</table>
					<p>Get the first element of the sequence:</p>
					<pre class="solution-content python" ><code>my_string_variable = "abracadabra"
first_elem = my_string_variable[0]</code></pre>
				</section>
				<section>
                    <h3 style="margin-bottom: 0px;">Built in functions seen so far</h3>
					<table style="width:100%">
					  <tr>
						<th>Input/Ouput</th>
						<th>Conversion type:</th>
						<th>Introspection:</th>
					  </tr>
					  <tr>
						<td>input()</td>
						<td>int()</td>
						<td>type()</td>
					  </tr>
					  <tr>
						<td>print()</td>
						<td>float()</td>
						<td>dir()</td>
					  </tr>
					  <tr>
						<td></td>
						<td>str()</td>
						<td>help()</td>
					  </tr>
					  <tr>
						<td></td>
						<td></td>
						<td>id()</td>
					  </tr>
					</table>
					<p>All the built in functions:
						<a target="_blank" href="https://docs.python.org/3.5/library/functions.html">https://docs.python.org/3.5/library/functions.html</a></p>
				</section>
				<section>
                    <h3>Defining our own function</h3>
                    <p>To define a function, we use the keyword <strong>def</strong>, the name of the function, the brackets, and the colon</p>
                    <p>Then the body of the function needs to be indented</p>
                    <pre class="solution-content python"><code data-trim data-noescape>def name_of_the_function():
    # body of the function</code></pre>
                    <p>When we define a function, python saves it in its memory, but doesn't execute it automatically.</p>
                    <iframe data-src="https://trinket.io/embed/python3/5639960462" width="100%" height="356" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
				</section>
				<section>
                    <h3>Calling our own function</h3>
                    <p>To call (or execute or run) a function, we use the name of the function AND the brackets. Without the brackets, the function is not called.</p>
                    <pre class="solution-content python"><code data-trim data-noescape>name_of_the_function()</code></pre>
                    <p>Notice the difference between defining and calling a function</p>
                    <iframe data-src="https://trinket.io/embed/python3/8f7ebe9f2b" width="100%" height="356" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
				</section>
                <section>
                    <h3>Controlling the flow of our programs</h3>
                    <p>We can represent the flow of execution with a flow chart</p>
                    <img data-src="imgs/flow_chart.png" style="background:none; border:none; box-shadow:none;">
                </section>
                <section>
                    <h3>Structure of a simple if statement</h3>
                    <p>Pseudo code:</p>
                    <pre class="solution-content python"><code data-trim data-noescape>if condition:
    # statement (mind the indentation)</code></pre>
                    <p>Example, representation of the flow chart example in python code:</p>
                    <pre class="solution-content python"><code data-trim data-noescape>if name=='Alice':
    print('Hi Alice')</code></pre>
                </section>
                <section>
                    <h3>The two-way if statement</h3>
                    <p>Pseudo code:</p>
                    <pre class="solution-content python"><code data-trim data-noescape>if condition:
    # statement (mind the indentation)
else:
    # statement executed when the condition is False
                    </code></pre>
                    <p>Example, representation of the flow chart example in python code with an else statement:</p>
                    <pre class="solution-content python"><code data-trim data-noescape>if name=='Alice':
    print('Hi Alice')
else:
    print('Hi')</code></pre>
                </section>
                <section>
                    <h3>Multiple Alternative if Statements</h3>
                    <p>The naive way</p>
                    <pre class="solution-content python"><code data-trim data-noescape>if condition:
    # statement (mind the indentation)
else:
    if condition:
        # statement executed when
        # the previous condition is False
    else:
        # statement executed when none of
        # the previous condition is verified
                    </code></pre>
                </section>
                <section>
                    <h3>Multiple Alternative if Statements</h3>
                    <p>The better way, the pythonic way</p>
                    <pre class="solution-content python"><code data-trim data-noescape>if condition:
    # statement (mind the indentation)
elif condition:
    # statement executed when
    # the previous condition is False
elif condition:
    # statement executed when none of
    # the previous condition is verified
else:
    # executed when all conditions are False</code></pre>
                </section>
				<section>
                    <h3>Value of the condition</h3>
                    <p>The program will execute the statement(s) only if the condition is True.</p>
                    <p>The condition is actually a <strong>boolean</strong> type.</p>
				</section>
				<section>
                    <h3>The Boolean Type</h3>
                    <ul>
                        <li>Has only 2 possible values: <strong>True</strong> or <strong>False</strong>.
                            Notice that they are both capitalized, which is important because Python is case sensitive</li>
                        <li>It is obtained as a result of a comparison expression.</li>
                    </ul>
				</section>
				<section>
                    <h3>Comparison Operators</h3>
					<table style="width:100%">
					  <tr>
						<th>Operator</th>
						<th>Meaning</th>
					  </tr>
					  <tr>
						<td>&lt;</td>
						<td>less than</td>
					  </tr>
					  <tr>
						<td><=</td>
						<td>less than or equal</td>
					  </tr>
					  <tr>
						<td>&gt;</td>
						<td>greater than</td>
					  </tr>
					  <tr>
						<td>&gt;=</td>
						<td>greater than or equal</td>
					  </tr>
					  <tr>
						<td>==</td>
						<td>equal to</td>
					  </tr>
					  <tr>
						<td>!=</td>
						<td>not equal to</td>
					  </tr>
					</table>
				</section>
                <section>
                    <h3>Examples</h3>
                    <iframe data-src="https://trinket.io/embed/python3/d37009e282?runMode=console" width="100%" height="356" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
                </section>
                <section>
                    <h3>Difference between '==' and '='</h3>
                    <ul>
                        <li>The sign <strong>=</strong> is the sign of <strong>assignment</strong>, it is used for assigning a value to a variable</li>
                        <li>The sign <strong>==</strong> is the sign of <strong>comparison</strong>, it compares 2 values and returns a boolean (True or False)</li>
                    </ul>
                </section>
                <section>
                    <h3>Exercise: password</h3>
                    <p>Create a program that asks the user for a password.</p>
                    <ul>
                        <li>Have the password defined in your program, in a variable called "PASSWORD"</li>
                        <li>Use input() to receive the password entered by the user</li>
                        <li>If the word entered by the user matches the password, display "Access Granted", otherwise "Forbidden"</li>
                    </ul>
                </section>
                <section>
                    <h3>Solution: password</h3>
					<div class="solution">
						<p class="show-solution"><i class="fa fa-eye" aria-hidden="true"></i>Show solution</p>
						<p class="hide-solution"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide solution</p>
<pre class="solution-content python"><code data-trim data-noescape>PASSWORD = 'super_password123'
password_entered = input("Enter the password: ")
if password_entered == PASSWORD:
    print("Access Granted")
else:
    print("Forbidden")
                    </code></pre>
					</div>
                </section>
                <section>
                    <h3>Truth tables</h3>
                    <p>Show every possible result of a Boolean operator.</p>
                    <h4>The <strong>and</strong> Operator’s Truth Table</h4>
                    <table>
                    <tr>
                        <th>Expression</th>
                        <th>Evaluates to...</th>
                    </tr>


                    <tr>
                        <td>True and True</td>
                        <td>True</td>
                    </tr>
                    <tr>
                        <td>True and False</td>
                        <td>False</td>
                    </tr>
                    <tr>
                        <td>False and True</td>
                        <td>False</td>
                    </tr>
                    <tr>
                        <td>False and False</td>
                        <td>False</td>
                    </tr>
                    </table>
                </section>
                <section>
                    <h4>The <strong>or</strong> Operator’s Truth Table</h4>
                    <table>
                    <tr>
                        <th>Expression</th>
                        <th>Evaluates to...</th>
                    </tr>
                    <tr>
                        <td>True or True</td>
                        <td>True</td>
                    </tr>
                    <tr>
                        <td>True or False</td>
                        <td>True</td>
                    </tr>
                    <tr>
                        <td>False or True</td>
                        <td>True</td>
                    </tr>
                    <tr>
                        <td>False or False</td>
                        <td>False</td>
                    </tr>
                    </table>
                </section>
                <section>
                    <h4>The <strong>not</strong> Operator</h4>
                    <p>It operates on only one Boolean value (or expression).
                        The not operator simply evaluates to the opposite Boolean value.</p>
                    <iframe src="https://trinket.io/embed/python3/fec9e65f1f?runMode=console" width="100%" height="356" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
                </section>
                <section>
                    <h3>Exercise: password and login</h3>
                    <p>Create a program that ask the user for a login and password.</p>
                    <ul>
                        <li>Have the password "PASSWORD" AND login "LOGIN" defined in your program, in corresponding variables</li>
                        <li>Use input() to receive the password and login entered by the user</li>
                        <li>If login and password match the values of your PASSWORD and LOGIN, display "Access Granted", else, "Forbidden"</li>
                    </ul>
                </section>
                <section>
                    <h3>Solution: password and login</h3>
					<div class="solution">
						<p class="show-solution"><i class="fa fa-eye" aria-hidden="true"></i>Show solution</p>
						<p class="hide-solution"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide solution</p>
<pre class="solution-content python"><code data-trim data-noescape>PASSWORD = 'super_password123'
LOGIN = 'superadmin'
login_entered = input("Enter the login: ")
password_entered = input("Enter the password: ")
if password_entered == PASSWORD \
    and login_entered == LOGIN:
    print("Access Granted")
else:
    print("Forbidden")
                    </code></pre>
					</div>
                </section>
                <section>
                    <h3>Exercise: check number divisor</h3>
                    <p>Write a program that prompts the user to enter an integer. If the number is a multiple of 5, print HiFive.
                        If the number is divisible by 2, print HiEven.</p>
                    <ul>
                        <li>Use input() take the user input</li>
                        <li>Use int() to convert the value return by input into an integer</li>
                        <li>Use % to see if a number x is divisible by an other number y, if x%y returns 0, then x is divisible by y</li>
                        <li>Use print()</li>
                    </ul>
                </section>
                <section>
                    <h3>Solution: control flow</h3>
					<div class="solution">
						<p class="show-solution"><i class="fa fa-eye" aria-hidden="true"></i>Show solution</p>
						<p class="hide-solution"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide solution</p>
<pre class="solution-content python"><code data-trim data-noescape>number_x = int(input("Enter an integer: "))
if number_x % 5 == 0:
    print("HiFive")
if number_x % 2 == 0:
    print("HiEven")
                    </code></pre>
					</div>
                </section>
                <section>
                    <h3>Exercise: grading students</h3>
                    <p>Write a program that is going to give the grade of a student according to the score obtained.</p>
                    <ul>
                        <li>Display 'A' if the score is greater than 90</li>
                        <li>Display 'B' if the score is between 80 and 90</li>
                        <li>Display 'C' if the score is between 70 and 80</li>
                        <li>Display 'D' if the score is between 60 and 70</li>
                        <li>Display 'F' if the score is lower than 60</li>
                    </ul>
                </section>
                <section>
                    <h3>Solution: grading students</h3>
					<div class="solution">
						<p class="show-solution"><i class="fa fa-eye" aria-hidden="true"></i>Show solution</p>
						<p class="hide-solution"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide solution</p>
<pre class="solution-content python"><code data-trim data-noescape>score = int(input("Enter the score: "))
if score >= 90.0:
    grade = 'A'
elif score >= 80.0:
    grade = 'B'
elif score >= 70.0:
    grade = 'C'
elif score >= 60.0:
    grade = 'D'
else:
    grade = 'F'
print('The grade is ', grade)
</code></pre>
					</div>
                </section>
                <section>
                    <h3>Exercise: determining a leap year</h3>
                    <p>This program first prompts the user to enter a year as an int value and checks if it is a leap year.</p>
                    <p>A year is a leap year if it is divisible by 4 but not by 100, or it is divisible by 400.</p>
                    <ul>
                        <li>Use input() to take the user input (the year, i.e. 2016) and convert it with int()</li>
                        <li>Use % to see if a number x is divisible by an other number y, if x%y returns 0, then x is divisible by y</li>
                        <li>Check if the year is divisible by 4 AND not divisible by 100</li>
                        <li>OR check if the year is divisible by 400.</li>
                        <li>Use print()</li>
                    </ul>
                </section>
                <section>
                    <h3>Solution: determining a leap year</h3>
					<div class="solution">
						<p class="show-solution"><i class="fa fa-eye" aria-hidden="true"></i>Complete solution</p>
						<p class="hide-solution"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide solution</p>
<pre class="solution-content python"><code data-trim data-noescape style="margin-bottom: 0px; font-size: 16px;">
year = input("Enter a year : ")
year = int(year)
leap_year = False # boolean value saying if
                  # the year is a leap_year or not
if year % 400 == 0:
    leap_year = True
elif year % 4 == 0:
	if year % 100 != 0:
    	leap_year = True
else:
    leap_year = False
if leap_year:
    print("The year entered is a leap year.")
else:
    print("The year entered is not a leap year.")
</code></pre>
					</div>
                </section>
                <section>
                    <h3>Solution optimized: determining a leap year</h3>
					<div class="solution">
						<p class="show-solution"><i class="fa fa-eye" aria-hidden="true"></i>Condition to use</p>
						<p class="hide-solution"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide hint</p>
<pre class="solution-content python"><code data-trim data-noescape>(year % 4 == 0 and year % 100 != 0) or (year % 400 == 0)</code></pre>
					</div>
					<div class="solution">
						<p class="show-solution"><i class="fa fa-eye" aria-hidden="true"></i>Complete solution</p>
						<p class="hide-solution"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide solution</p>
<pre class="solution-content python"><code data-trim data-noescape>year = int(input("Enter a year: "))
if (year % 4 == 0 and year % 100 != 0) or (year % 400 == 0):
    print("The year is a leap year")
else:
    print("The year is not a leap year")
</code></pre>
					</div>
                </section>
                <section>
                    <h3>Exercise: Chinese Zodiac sign</h3>
                    <p>Now let us write a program to find out the Chinese Zodiac sign
                        for a given year. The Chinese Zodiac sign is based on a <strong>12-year cycle</strong>,
                        each year being represented by an animal: rat, ox, tiger, rabbit, dragon,
                        snake, horse, sheep, monkey, rooster, dog, and pig, in this cycle</p>
					<div class="solution">
						<p class="show-solution"><i class="fa fa-eye" aria-hidden="true"></i>Hint 1</p>
						<p class="hide-solution"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide hint 1</p>
                        <p class="solution-content python">Use the modulo (%).</p>
					</div>
					<div class="solution">
						<p class="show-solution"><i class="fa fa-eye" aria-hidden="true"></i>Hint 2</p>
						<p class="hide-solution"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide hint 2</p>
                        <p class="solution-content python">2019 is the year of the pig and 2019 % 12 equals 3</p>
					</div>
                </section>
                <section>
                    <h3>Exercise: Chinese Zodiac sign</h3>

                    <table style="margin-bottom: 0px; font-size: 22px;">
                        <tr>
                            <th>Year</th>
                            <th>Zodiac sign</th>
                        </tr>
                        <tr>
                            <th>0</th>
                            <th>monkey</th>
                        </tr>
                        <tr>
                            <th>1</th>
                            <th>rooster</th>
                        </tr>
                        <tr>
                            <th>2</th>
                            <th>dog</th>
                        </tr>
                        <tr>
                            <th>3</th>
                            <th>pig</th>
                        </tr>
                        <tr>
                            <th>4</th>
                            <th>rat</th>
                        </tr>
                        <tr>
                            <th>5</th>
                            <th>ox</th>
                        </tr>
                        <tr>
                            <th>6</th>
                            <th>tiger</th>
                        </tr>
                        <tr>
                            <th>7</th>
                            <th>rabbit</th>
                        </tr>
                        <tr>
                            <th>8</th>
                            <th>dragon</th>
                        </tr>
                        <tr>
                            <th>9</th>
                            <th>snake</th>
                        </tr>
                        <tr>
                            <th>10</th>
                            <th>horse</th>
                        </tr>
                        <tr>
                            <th>11</th>
                            <th>sheep</th>
                        </tr>
                    </table>
                </section>
				<section>
					<div class="solution">
						<p class="show-solution"><i class="fa fa-eye" aria-hidden="true"></i>Complete solution</p>
						<p class="hide-solution" style="margin-top: 0px; margin-bottom: 0px;"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide solution</p>
						<pre class="solution-content python"><code data-trim data-noescape style="line-height: 100%;font-size: 18px;margin-top: 0px; margin-bottom: 0px;">year = eval(input("Enter a year: "))
zodiacYear = year % 12
if zodiacYear == 0:
    print("monkey")
elif zodiacYear == 1:
    print("rooster")
elif zodiacYear == 2:
    print("dog")
elif zodiacYear == 3:
    print("pig")
elif zodiacYear == 4:
    print("rat")
elif zodiacYear == 5:
    print("ox")
elif zodiacYear == 6:
    print("tiger")
elif zodiacYear == 7:
    print("rabbit")
elif zodiacYear == 8:
    print("dragon")
elif zodiacYear == 9:
    print("snake")
elif zodiacYear == 10:
    print("horse")
else:
    print("sheep")</code></pre></div>

				</section>
                <!-- EXPERIMENT WITH SKULPT
                <section>
                    <h3>Try This</h3>
                    <form>
                        <textarea id="yourcode" cols="40" rows="10">import this</textarea><br />
                        <button type="button" class="btn btn-primary large" onclick="runit()">Run</button>
                    </form>
                    <pre id="output" ></pre>
                    <div id="mycanvas"></div>
                </section>
                -->
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
					{ src: 'plugin/skulpt.min.js' },
					{ src: 'plugin/skulpt-stdlib.js' },
					{ src: 'plugin/custom.js' },

				]
			});
		</script>
	</body>
</html>
