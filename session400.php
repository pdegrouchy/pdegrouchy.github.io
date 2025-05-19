<?php
require_once('../../python_settings/auth.php');
$pdfClass = isset($_GET['pdfCreation'])?'pdf':'';
?><!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>Session 4</title>

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
		<script language="JavaScript" type="text/javascript">
		  function step(id) {
			var pjs = Processing.getInstanceById(id);
			var key = document.getElementById('key').value.trim();

			var index = pjs.step(key);
			if (index == -2) {
			  alert("Key " + pjs.getKey() + " is not in the list\nClick Reset to start over" );
			}
			else if (index >= 0) {
			  alert("Key " + pjs.getKey() + " is at index " + index + "\nClick Reset to start over");
			};
		  }

		  function reset(id) {
			var pjs = Processing.getInstanceById(id);
			var key = document.getElementById('key').value.trim();
			pjs.reset();
			pjs.draw();
		  }
		</script>
	</head>
	<body<?php if($pdfClass!=='') echo ' id="pdf"';?>>
	<p class="newlogo"><a href="https://moodle.city.ac.uk/<?php if(isset($_SESSION['cid'])) { ?>course/view.php?id=<?php echo $_SESSION['cid']; } ?>"><img border="0" alt="Courses" src="imgs/logo.png"></a></p>
		<div class="reveal">
			<div class="slides">
				<section>
					<h2>Introduction to programming with Python</h2>
					<h3>Session 4</h3>
				</section>
				<section>
					<h3>Objectives</h3>
					<ul style="font-size: 26px;">
						<li>To come back on the notion of object and type.</li>
						<li>To introduce to the type "List" and its methods.</li>
						<li>To use the len, min/max, sum, and random.shuffle functions for a list.</li>
						<li>To develop and invoke functions with list arguments and return value.</li>
						<li>To access list elements using indexed variables.</li>
						<li>To obtain a sublist using the slicing operator [start:end].</li>
						<li>To use +, *, and in/not in operators on lists.</li>
						<li>To traverse elements in a list using a for-each loop.</li>
						<li>To create lists using list comprehension.</li>
						<li>To split a string to a list using the str’s split method.</li>
						<li>To copy contents from one list to another.</li>
					</ul>
				</section>
				<section>
					<h3>What is the difference between an object and a type?</h3>
					<p>We use objects and types every day. Let's try to understand the difference with an every day example.</p>
					<p class="fragment">If I tell you: "Today I bought a pen. What colour is it?".<br>Is it <strong>possible</strong> to answer this question?</p>
					<div class="fragment">
						<p>You already know what a pen is. It has specific properties:</p>
						<ul>
							<li>Colour</li>
							<li>Amount of ink</li>
							<li>Type (ballpoint, white board etc.)</li>
						</ul>
					</div>
				</section>
				<section>
					<h3>What is the difference between an object and a type?</h3>
					<p>You also know that you can <strong>write</strong> with a pen.</p>
					<p>So the question is not wrong. <strong>Every</strong> pen has a colour.</p> 
					<p>We have information about all pens, but we don't have information about the specific pen bought.<br>
						<span class="fragment">What <strong>colour</strong> is it?</span> <span class="fragment">What <strong>type</strong> of pen is it?</span></p>
					<div class="fragment">
						<p>If we see the pen all these questions are immediately solved. It is clearly a blue, ballpoint pen.</p>
						<p><img src="imgs/blueBallpoint.jpg"></p>
					</div>
				</section>
				<section>
					<h3>What is the difference between an object and a type?</h3>
					<p>Every pen has these properties:</p>
					<ul>
						<li>Colour</li>
						<li>Amount of ink</li>
						<li>Type</li>
					</ul>
					<p>and there is an action we can do:</p>
					<ul>
						<li>Write</li>
					</ul>
					<p>This set of properties and actions describes the <strong>idea</strong> of a pen.</p>
				</section>
				<section>
					<p><img src="imgs/blueBallpoint.jpg"></p>
					<p>This pen has specific values for each of the properties that every pen has:</p>
					<ul>
						<li>Colour: <strong>Blue</strong></li>
						<li>Amount of ink: <strong>100%</strong></li>
						<li>Type: <strong>Ballpoint pen</strong></li>
					</ul>
					<p>Each real life pen <strong>object</strong> has different values for each of the properties.</p>
				</section>
				<section>
					<h3>What is the difference between an object and a type?</h3>
					<p>In Python, an idea is called a <strong>type</strong> or a <strong>class</strong>.</p>
					<p>Exactly like in real life, it is possible to create <strong>object</strong>s from a type. 
					You can create an infinite amount of objects from each type.</p>
					<p>Type and objects seen so far:</p>
					<table>
						<th>
							Types
						</th>
						<th>
							Objects
						</th>
						<th>
							Constructor
						</th>
						<tr>
							<td>Integer</td>
							<td>1, 3, 4, 5, 999, -3, -4</td>
							<td>int()</td>
						</tr>
						<tr>
							<td>Float</td>
							<td>1.333, -0.5, 0.001</td>
							<td>float()</td>
						</tr>
						<tr>
							<td>String</td>
							<td>"Foo", 'bar', ""</td>
							<td>str()</td>
						</tr>
					</table>
				</section>
				<section>
					<h3>An object has methods</h3>
					<p>You can find the method of an object with the function <strong>dir()</strong>, which returns the attributes of an object.</p>
					<div ><pre ><code>>>> dir("abc")
['__add__', '__class__', '__contains__', '__delattr__', '__dir__', '__doc__', '__eq__', '__format__', '__ge__', '__getattribute__', '__getitem__', '__getnewargs__', '__gt__', '__hash__', '__init__', '__iter__', '__le__', '__len__', '__lt__', '__mod__', '__mul__', '__ne__', '__new__', '__reduce__', '__reduce_ex__', '__repr__', '__rmod__', '__rmul__', '__setattr__', '__sizeof__', '__str__', '__subclasshook__', 'capitalize', 'casefold', 'center', 'count', 'encode', 'endswith', 'expandtabs', 'find', 'format', 'format_map', 'index', 'isalnum', 'isalpha', 'isdecimal', 'isdigit', 'isidentifier', 'islower', 'isnumeric', 'isprintable', 'isspace', 'istitle', 'isupper', 'join', 'ljust', 'lower', 'lstrip', 'maketrans', 'partition', 'replace', 'rfind', 'rindex', 'rjust', 'rpartition', 'rsplit', 'rstrip', 'split', 'splitlines', 'startswith', 'strip', 'swapcase', 'title', 'translate', 'upper', 'zfill']</code></pre></div>
					<p>NB: the dunder methods (with double underscore), are "special methods" in python that can be overridden. We will come back on that later.</p>
				</section>
				<section>
					<h3>Difference between methods of objects and <a href="https://docs.python.org/3.5/library/functions.html">builtin functions</a></h3>
					<p>The methods of an object can <strong>only be called on an object</strong>, using values of its properties to produce a result.</p>
					<div><pre class="solution-content python"><code>>>> "speak louder".upper()
'SPEAK LOUDER'</code></pre></div>
					<p>A <strong>builtin function</strong> does not need an object to be called.</p>
					<div><pre class="solution-content python"><code>>>> len("number of character")
19</code></pre></div>
					<p>NB: <strong>len()</strong> give the number of element in a sequence</p>
				</section>
				<section>
					<h3>The type List</h3>
					<p>Creating a list object using the list constructor</p>
					<div><pre class="solution-content python"><code>list1 = list() # Create an empty list
list4 = list(range(3, 6)) # Create a list with elements 3, 4, 5
list5 = list("abcd") # Create a list with characters a, b, c</code></pre></div>
					<p>Manually create a list:</p>
					<div><pre class="solution-content python"><code>list1 = [] # Same as list()
list2 = [2, 3, 4]
list3 = ["red", "green"]</code></pre></div>
				</section>
				<section>
					<h3>The List methods</h3>
					<p>You can find the different methods of a list thanks to the function <strong>dir()</strong></p>
					<div><pre class="solution-content python"><code>>>> dir([])
['__add__', '__class__', '__contains__', '__delattr__', '__delitem__', '__dir__', '__doc__', '__eq__', '__format__', '__ge__', '__getattribute__', '__getitem__', '__gt__', '__hash__', '__iadd__', '__imul__', '__init__', '__iter__', '__le__', '__len__', '__lt__', '__mul__', '__ne__', '__new__', '__reduce__', '__reduce_ex__', '__repr__', '__reversed__', '__rmul__', '__setattr__', '__setitem__', '__sizeof__', '__str__', '__subclasshook__', 'append', 'clear', 'copy', 'count', 'extend', 'index', 'insert', 'pop', 'remove', 'reverse', 'sort']</code></pre></div>
					<p>We are going to look at: 'append', 'clear', 'copy', 'count', 'extend', 'index', 'insert', 'pop', 'remove', 'reverse', 'sort'</p>
				</section>
				<section>
					<h3>How to see what a method can do</h3>
					<p>Look at the builtin help:</p>
					<div><pre class="solution-content python"><code>>>> help([].append)
Help on built-in function append:

append(...) method of builtins.list instance
    L.append(object) -> None -- append object to end</code></pre></div>
				<p>Experiment in the interpreter:</p>
				<iframe class="stretch" data-src="https://trinket.io/embed/python3/1c67a8cf6a" width="100%" height="150" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
				</section>
				<section>
					<h3>Summary of the list methods</h3>
					<table style="font-size: 24px">
						<tr>
							<td style="width: 30%;"><strong>append</strong>(x: object): None</td>
							<td>Add an item x to the end of the list.</td>
						</tr>
						<tr>
							<td><strong>insert</strong>(index: int, x: object): None</td>
							<td>Insert an item x at a given index. Note that the first element in the list has index 0.</td>
						</tr>
						<tr>
							<td><strong>remove</strong>(x: object): None</td>
							<td>Remove the first occurrence of the item x from the list.</td>
						</tr>
						<tr>
							<td><strong>index</strong>(x: object): int</td>
							<td>Return the index of the item x in the list.</td>
						</tr>
						<tr>
							<td><strong>count</strong>(x: object): int</td>
							<td>Return the number of times item x appears in the list.</td>
						</tr>
						<tr>
							<td><strong>sort</strong>(): None</td>
							<td>Sort the items in the list.</td>
						</tr>
						<tr>
							<td><strong>reverse</strong>(): None</td>
							<td>Reverse the items in the list.</td>
						</tr>
						<tr>
							<td><strong>extend</strong>(L: list): None</td>
							<td>Append all the items in list L to the list.</td>
						</tr>
						<tr>
							<td><strong>pop</strong>([i]): object</td>
							<td>Remove the item at the given position and return it. The square bracket denotes that parameter is optional. If no index is specified, list.pop() removes and returns the last item in the list.</td>
						</tr>
					</table>
				</section>
				<section>
					<h3>Exercise 1</h3>
					<p style="font-size: 26px">Write a program that reads integers from the user and stores them in a list (use input() and append()). Your program should continue reading values until the user enters 'q' (the sentinel value).
						Then it should display all of the values entered by the user in order from smallest to largest, with one value appearing on each line. Use either the <a href="https://docs.python.org/3/library/stdtypes.html?highlight=list%20sort#list.sort" target="pythonAPI">sort method</a> or the <a href="https://docs.python.org/3/library/functions.html#sorted" target="pythonAPI">sorted</a> built-in function to sort the list.</p>
					<div class="solution">
						<p class="show-solution"><i class="fa fa-eye" aria-hidden="true"></i>Solution</p>
						<p class="hide-solution" style="margin-top: 0px; margin-bottom: 0px;"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide solution</p>
						<pre class="solution-content python"><code data-trim data-noescape style="line-height: 100%;font-size: 24px;margin-top: 0px; margin-bottom: 0px;">data = []
num = input("Enter an integer ('q' to quit): ")
while num != 'q':
    data.append(int(num))
    num = input("Enter an integer ('q' to quit): ")
data.sort()
print("The values, sorted into ascending order are:")
for element in data:
    print(element)</code></pre></div>
				</section>
				<section>
					<h3>Built-in functions for list or sequences</h3>
					<div><pre class="solution-content python"><code>>>> list1 = [2, 3, 4, 1, 32]
>>> len(list1)
5
>>> max(list1)
32
>>> min(list1)
1
>>> sum(list1)
42
>>> import random
>>> random.shuffle(list1) # Shuffle the items in the list
>>> list1
[4, 1, 2, 32, 3]</code></pre></div>
				</section>
				<section>
					<h3>Iterating on a list</h3>
					<p>The list is a <strong>sequence</strong> on which you can iterate.</p>
					<p>With <strong>for</strong>:</p>
					<iframe data-src="https://trinket.io/embed/python3/1461d22c84" width="100%" height="120" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
					<p>With <strong>while</strong>:</p>
					<iframe data-src="https://trinket.io/embed/python3/9f18c32565" width="100%" height="160" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
				</section>
				<section>
					<h3>Reminder about functions</h3>
					<p>We define a function like this:</p>
					<pre class="solution-content python"><code data-trim data-noescape style="line-height: 100%;">def main():
    print('The function', main.__name__, 'has been called')</code></pre>
					<p>And we call a function like this:</p>
					<pre class="solution-content python"><code data-trim data-noescape style="line-height: 100%;">main()</code></pre>
					<p>NB: notice the brackets: when we define and when we call!</p>
					<p>Try to use functions in the next exercises.</p>
				</section>
				<section>
					<h3>Exercise 2: Chinese Zodiac sign with list</h3>
					<p>Simplify <a href="session200.php#/48" target="exercise">the exercise we saw at the end of session 2</a> by using a list of <code>string</code>s storing all the animals names, instead of using multiple if and elif statements.</p>
					<div class="solution">
						<p class="show-solution"><i class="fa fa-eye" aria-hidden="true"></i>Solution</p>
						<p class="hide-solution" style="margin-top: 0px; margin-bottom: 0px;"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide solution</p>
						<pre class="solution-content python"><code data-trim data-noescape style="line-height: 100%;font-size: 24px;margin-top: 0px; margin-bottom: 0px;">def main():
    year = int(input("Enter a year: "))
    animals = ["monkey", "rooster", "dog", "pig", "rat", "ox",
               "tiger", "rabbit", "dragon", "snake", "horse", "sheep"]
    print(year, "is", animals[year % 12])

main()</code></pre></div>
				</section>
				<section>
					<h3>Passing Lists to Functions</h3>
					<iframe class="stretch" data-src="https://trinket.io/embed/python3/0e7b0b2d6f" width="100%" height="356" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
				</section>
				<section>
					<h3>Returning a List from a Function</h3>
					<p>Example: a function that returns a reversed list</p>
					<iframe data-src="https://trinket.io/embed/python3/fef0183b9c" width="100%" height="356" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
					<p>The <strong><a href="https://docs.python.org/3/library/stdtypes.html?highlight=list%20reverse#typesseq-mutable" target="pythonAPI">reverse</a></strong> method of <code>list</code> works similarly, but only changes list values in place.</p>
				</section>
				<section>
					<h3>Exercise 3:</h3>
					<p>Complete this program to get the minimum number of the list and its index</p>
					<pre class="solution-content python"><code data-trim data-noescape style="line-height: 100%;font-size: 24px;margin-top: 0px; margin-bottom: 0px;">import random
random_list = [random.choice(list(range(1, 100))) for _ in range(10)]
def get_min(random_list):
    # to complete
    pass
get_min(random_list)</code></pre>
				</section>
				<section>
					<h3>Solution without using built-in functions or list methods</h3>
					<div class="solution">
						<p class="show-solution"><i class="fa fa-eye" aria-hidden="true"></i>Solution</p>
						<p class="hide-solution" style="margin-top: 0px; margin-bottom: 0px;"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide solution</p>
						<pre class="solution-content python"><code data-trim data-noescape style="line-height: 100%;font-size: 24px;margin-top: 0px; margin-bottom: 0px;">import random
random_list = [random.choice(list(range(1, 100))) for _ in range(10)]
def get_min_index(any_list):
    min = 100
    index = 0
    for i in any_list:
        if i <= min:
            min = i
            min_index = index
        index += 1
    print("the min is", min)
    print("its index is", min_index)

print(random_list)
get_min_index(random_list)</code></pre></div>
				</section>
				<section>
					<h3>Solution using built-in functions and list methods</h3>
					<div class="solution">
						<p class="show-solution"><i class="fa fa-eye" aria-hidden="true"></i>Solution</p>
						<p class="hide-solution" style="margin-top: 0px; margin-bottom: 0px;"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide solution</p>
						<pre class="solution-content python"><code data-trim data-noescape style="line-height: 100%;font-size: 24px;margin-top: 0px; margin-bottom: 0px;">import random
random_list = [random.choice(list(range(1, 100))) for _ in range(10)]
def get_min_index(any_list):
    print("the min is", min(any_list))  # using the min builtin
    print("its index is", random_list.index(min(random_list))) # using the index method

print(random_list)
get_min_index(random_list)</code></pre></div>
				</section>
				<section>
					<h3>Reminder</h3>
					<p>A string is a <strong>sequence</strong></p>
					<p>The items of a sequence can be <strong>accessed</strong> using indices</p>
					<table class="stretch">
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
					<h3>Manipulate List elements with indices</h3>
					<p>You can <strong>access</strong> and <strong>modify</strong> list elements using indices:</p>
					<iframe data-src="https://trinket.io/embed/python3/1c5817ee59" width="100%" height="120" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
					<p>You cannot modify a string using indices.</p>
					<iframe data-src="https://trinket.io/embed/python3/d6fa9f127e" width="100%" height="120" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
				</section>
				<section>
					<h3>Difference between mutable and immutable objects</h3>
					<ul>
						<li>You cannot modify an <strong>immutable</strong> object such as a string.</li>
						<li>You can modify a <strong>mutable</strong> object such as a list.</li>
					</ul>
				</section>
				<section>
					<h3>The +, *, [ : ], and in Operators (1/2)</h3>
					<p><strong>+</strong> is for concatenating list</p>
					<p><strong>*</strong> is for repeating a list</p>
					<p><strong>[ : ]</strong> is the slice operator, for extracting a sublist from a list</p>
					<pre class="solution-content python"><code data-trim data-noescape style="line-height: 100%;font-size: 24px;margin-top: 0px; margin-bottom: 0px;">>>> list1 = [2, 3]
>>> list2 = [1, 9]
>>> list3 = list1 + list2
>>> list3
[2, 3, 1, 9]
>>> list3 = 2 * list1
>>> list3
[2, 3, 2, 3]
>>> list4 = list3[2:4]
>>> list4
[2, 3]</code></pre>
				</section>
				<section>
					<h3>The +, *, [ : ], and in Operators (2/2)</h3>
					<ul>
						<li>Get the last element of a list with a negative index</li>
						<li>Check if an element is in a list with the <strong>in</strong> operator</li>
					</ul>
					<pre class="solution-content python"><code data-trim data-noescape style="line-height: 100%;font-size: 24px;margin-top: 0px; margin-bottom: 0px;">>>> list1 = [2, 3, 5, 2, 33, 21]
>>> list1[-1]
21
>>> list1[-3]
2
>>> list1 = [2, 3, 5, 2, 33, 21]
>>> 2 in list1
True
>>> list1 = [2, 3, 5, 2, 33, 21]
>>> 2.5 in list1
False</code></pre>
				</section>
				<section>
					<h3>List comprehensions</h3>
					<ul>
						<li>List comprehensions provide a concise way to create lists</li>
						<ul>
							<li>Transforming a list with operation on each element</li>
							<li>Filtering a list, keeping only elements that satisfy a condition</li>
						</ul>
					</ul>
					<pre class="solution-content python"><code data-trim data-noescape style="line-height: 100%;font-size: 24px;margin-top: 0px; margin-bottom: 0px;">>>> list1 = [x for x in range(0, 5)]
>>> list1
[0, 1, 2, 3, 4]
>>> list2 = [0.5 * x for x in list1]
>>> list2
[0.0, 0.5, 1.0, 1.5, 2.0]
>>> list3 = [x for x in list2 if x < 1.5]
>>> list3
[0.0, 0.5, 1.0]</code></pre>
				</section>
				<section>
					<h3>Splitting a String to a List</h3>
					<p>You can convert a string to a list with the <strong>split</strong> function on string.</p>
					<pre class="solution-content python"><code data-trim data-noescape style="line-height: 100%;font-size: 24px;margin-top: 0px; margin-bottom: 0px;">>>> items = "Welcome to the Python course".split()
>>> print(items)
['Welcome', 'to', 'the', 'Python', 'course']
>>> items = "34#13#78#45".split("#")
>>> print(items)
['34', '13', '78', '45']</code></pre>
					<p>You can convert back a list to a string with the <strong>join</strong> function  on string</p>
					<pre class="solution-content python"><code data-trim data-noescape style="line-height: 100%;font-size: 24px;margin-top: 0px; margin-bottom: 0px;">>>> print(items)
['Welcome', 'to', 'the', 'Python', 'course']
>>> print(" ".join(items))
'Welcome to the Python course'
</code></pre>
				</section>
				<section>
				<p>
					<h3>Exercise 4 - Eliminate duplicates</h3>
					<p>Write a function that returns a new list by eliminating the duplicate values in the list. Use the following function header:
<pre class="solution-content python"><code>def eliminateDuplicates(lst):</code></pre></p>
<p>Write a test program that reads in a list of integers, invokes the function, and displays the result. Here is the sample run of the program:</p>
<pre>Enter ten numbers: 1 2 3 2 1 6 3 4 5 2
The distinct numbers are: 1 2 3 6 4 5</pre>
				</section>
				<section>
					<h3>Solution</h3>
					<div class="solution">
						<p class="show-solution"><i class="fa fa-eye" aria-hidden="true"></i>Solution</p>
						<p class="hide-solution" style="margin-top: 0px; margin-bottom: 0px;"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide solution</p>
				<pre class="solution-content python"><code data-trim data-noescape style="line-height: 100%;font-size: 24px;margin-top: 0px; margin-bottom: 0px;">def main():
    # Read numbers as a string from the console
    s = input("Enter numbers: ")
    items = s.split() # Extracts items from the string
    numbers = [ int(x) for x in items ] # Convert items to numbers

    print("The distinct numbers are:", eliminateDuplicates(numbers))

def eliminateDuplicates(list):
    result = []
    for element in list:
        if not (element in result):
            result.append(element)

    return result

main()</code></pre></div>
				</section>
				<section>
					<h3>Exercise 5: Anagrams</h3>
					<p>Write a function that checks whether two words are anagrams. Two words are anagrams if they contain the same letters. For example, silent and listen are anagrams. The header of the function is:
<pre class="solution-content python"><code>def isAnagram(s1, s2):</code></pre></p>
<p>(Hint: Obtain two lists for the two strings. Sort the lists and check if the two lists
are identical.)</p>
<p>Write a test program that prompts the user to enter two strings and, if they are anagrams, displays <q>is an anagram</q>; otherwise, it displays <q>is not an anagram</q>.</p>
				</section>
				<section>
					<h3>Solution</h3>
					<div class="solution">
					<p class="show-solution"><i class="fa fa-eye" aria-hidden="true"></i>Solution</p>
					<p class="hide-solution" style="margin-top: 0px; margin-bottom: 0px;"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide solution</p>
					<pre class="solution-content python"><code data-trim data-noescape style="line-height: 90%;font-size: 20px;margin-top: 0px; margin-bottom: 0px;">def main():
    s1 = input("Enter the first string: ").strip()
    s2 = input("Enter the second string: ").strip()

    print(s1, "and", s2, "are",
      ("anagram." if isAnagram(s1, s2) else "not anagram."))

def isAnagram(s1, s2):
    if len(s1) != len(s2):
        return False

    newS1 = sort(s1);
    newS2 = sort(s2);

    return newS1 == newS2

def sort(s):
    r = list(s)
    r.sort()

    result = ""
    for ch in r:
        result += ch

    return result

main()</code></pre></div>
				</section>
				<section>
					<h3>Copying Lists</h3>
					<p>Often, in a program, you need to duplicate a list or a part of a list. In such cases you could attempt to use the assignment statement (=):</p>
					<pre class="solution-content python"><code data-trim data-noescape style="line-height: 100%;font-size: 24px;margin-top: 0px; margin-bottom: 0px;">list1 = [1, 2, 3]
list2=list1</code></pre>
					<p><strong>But you are not copying the list here! You are copying its reference.</strong><p></p>
				</section>
				<section>
					<h3>What is happening in memory</h3>
					<iframe width="800" height="500" frameborder="0" data-src="https://pythontutor.com/iframe-embed.html#code=list1+%3D+%5B1,+2,+3%5D%0Alist2+%3D+list1%0Alist2.append('four'%29%0Aprint(list1%29%0Aprint(list2%29&origin=opt-frontend.js&cumulative=false&heapPrimitives=false&textReferences=false&py=3&rawInputLstJSON=%5B%5D&curInstr=5&codeDivWidth=350&codeDivHeight=400"> </iframe>
				</section>
				<section>
					<h3>Correctly copying a list</h3>
					<pre class="solution-content python"><code data-trim data-noescape style="line-height: 100%;font-size: 24px;margin-top: 0px; margin-bottom: 0px;">>>> list2 = [x for x in list1]
>>> list2 = list1[:]
>>> list2 = list(list1)
>>> list2 = list(list1)
>>> import copy
>>> list2 = copy.copy(list1)
>>> list2 = copy.deepcopy(list1) # will copy the object as well</code></pre>
				</section>
				<section>
					<h3>What is happening in memory for a real copy</h3>
					<iframe width="800" height="500" frameborder="0" data-src="https://pythontutor.com/iframe-embed.html#code=list1+%3D+%5B1,+2,+3%5D%0Alist2+%3D+list1%5B%3A%5D%0Alist1.append('four'%29%0Aprint(list1%29%0Aprint(list2%29&origin=opt-frontend.js&cumulative=false&heapPrimitives=false&textReferences=false&py=3&rawInputLstJSON=%5B%5D&curInstr=5&codeDivWidth=350&codeDivHeight=400"> </iframe>
				</section>
				<section>
					<h3>Pass By Value</h3>
					<p>There are important differences between passing immutable or mutable objects as arguments to a function.</p>
					<p>String and numeric values (integer and float) are <strong>immutable</strong>, they do not get changed</p>
					<p>Lists are <strong>mutable</strong>, they can be changed</p>
				</section>
				<section>
					<h3>Example</h3>
					<iframe width="800" height="500" frameborder="0" data-src="https://pythontutor.com/iframe-embed.html#code=def+m(number,+list_of_numbers%29%3A%0A++++number+%3D+1001%0A++++list_of_numbers%5B0%5D+%3D+5555%0A%0Adef+main(%29%3A%0A++++x+%3D+1%0A++++y+%3D+%5B1,+2,+3%5D%0A++++m(x,+y%29%0A++++print(%22x+is+%22,+str(x%29%29%0A++++print(%22y%5B0%5D+is%22,+str(y%5B0%5D%29%29%0A+++%0Amain(%29&origin=opt-frontend.js&cumulative=false&heapPrimitives=false&textReferences=false&py=3&rawInputLstJSON=%5B%5D&curInstr=14&codeDivWidth=350&codeDivHeight=400"> </iframe>
				</section>
				<section>
					<h3>Exercise 6: Hangman</h3>
					<p style="font-size: 20px">Write a hangman game that randomly generates a word and prompts the user to guess one letter at a time, as shown in the sample run.</p>
					<p style="font-size: 20px">Each letter in the word is displayed as an asterisk. When the user makes a correct guess, the actual letter is then displayed. When the user finishes a word, display the number of misses and ask the user whether to continue playing. Create a list to store the words, as follows:</p>
					<pre class="solution-content python"><code style="font-size: 16px">words = ["write", "that", "program", ...]</code></pre>
					<pre style="line-height: 100%;font-size: 16px">(Guess) Enter a letter in word ******* > p
(Guess) Enter a letter in word p****** > r
(Guess) Enter a letter in word pr**r** > p
    p is already in the word
(Guess) Enter a letter in word pr**r** > o
(Guess) Enter a letter in word pro*r** > g
(Guess) Enter a letter in word progr** > n
    n is not in the word
(Guess) Enter a letter in word progr** > m
(Guess) Enter a letter in word progr*m > a
The word is program. You missed 1 time
Do you want to guess another word? Enter y or n></pre>
				</section>
				<section>
					<div class="solution">
						<p class="show-solution" style="font-size: 20px"><i class="fa fa-eye" aria-hidden="true"></i>Solution</p>
						<p class="hide-solution" style="margin-top: 0px; margin-bottom: 0px;"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide solution</p>
						<pre class="solution-content python"><code data-trim data-noescape style="line-height: 95%;font-size: 16px;margin-top: 0px; margin-bottom: 0px;">import random

def main():
    words = ["write", "program", "that", "receive", "positive", "change", "study", "excellent", "nice"]
    gameFinished = False
    while not gameFinished:
        index = random.randint(0, len(words) - 1)
        hiddenWord = words[index]
        guessedWord = len(hiddenWord) * ['*']
        numberOfCorrectLettersGuessed = 0
        numberOfMisses = 0
        while numberOfCorrectLettersGuessed < len(hiddenWord):
            letter = input("(Guess) Enter a letter in word " + toString(guessedWord) + " > ").strip()
            if letter in guessedWord:
                print("\t", letter, "is already in the word")
            elif hiddenWord.find(letter) < 0:
                print("\t", letter, "is not in the word")
                numberOfMisses += 1
            else:
                k = hiddenWord.find(letter)
                while k >= 0:
                    guessedWord[k] = letter
                    numberOfCorrectLettersGuessed += 1
                    k = hiddenWord.find(letter, k + 1)
        print("The word is " + hiddenWord + ". You missed "
                + str(numberOfMisses) + (" time" if (numberOfMisses <= 1) else " times"))
        anotherGame = input("Do you want to guess for another word? Enter y or n> ").strip()
        if anotherGame == 'n':
            print("Finished")
            gameFinished = True

def toString(list):
    s = ""
    for e in list:
        s += e
    return s

main()</code></pre></div>
				</section>
				<!--
				<section>
                    <h3>Linear Search</h3>
    <canvas id="LinearSearch" data-processing-sources="pde/LinearSearch.pde" style="border-style:solid"></canvas>
    <p style="text-align: center">Key: <input type="text" value="8" id="key" style="text-align: right"/>
    <button type="button" class="button" onclick="step('LinearSearch')">Step</button>
    <button type="button" class="button" onclick="reset('LinearSearch')">Reset</button></p>
				</section>
				<section>
					<h3>Linear Search</h3>
					<p class="usage">Usage: Enter a key as a number. Click the Step button to perform one comparison. Click the Reset button to start over with a new random list of integers. You may enter a new key for a new search.</p>
					<iframe width="100%" height="500" frameborder="0" src="embedded/linear_search.html"
        sandbox="allow-same-origin allow-scripts allow-popups allow-forms"></iframe>
				</section>
				<section>
					<h3>Binary Search</h3>
	<canvas id="BinarySearch" data-processing-sources="pde/BinarySearch.pde" style="border-style:solid"></canvas>
    <p style="text-align: center">Key: <input type="text" value="8" id="key" style="text-align: right"/>
    <button type="button" class = "button" onclick="step('BinarySearch')">Step</button>
    <button type="button" class = "button" onclick="reset('BinarySearch')">Reset</button></p>

				</section>
				<section>
					<h3>Binary Search</h3>
					<p class = "usage">Usage: Enter a key as a number. Click the Step button to perform one comparison. Click the Reset button to start over with a new random list of integers. You may enter a new key for a new search.</p>
					<iframe width="800" height="500" frameborder="0" src="embedded/binary_search.html"
        sandbox="allow-same-origin allow-scripts allow-popups allow-forms"></iframe>
				</section>
				<section>
					<h3>Selection Sort</h3>
					<p class = "usage">Usage: Perform selection sort for a list of integers. Click the Step button to find the smallest element (highlighted in red) and swap this element with the first element (highlighted in orange) in the the unsorted sublist. The elements that are already sorted are highlighted in green.
      Click the Reset button to start over with a new random list.</p>
					<iframe width="800" height="500" frameborder="0" src="embedded/selection_sort.html"
        sandbox="allow-same-origin allow-scripts allow-popups allow-forms"></iframe>
				</section>
				<section>
					<h3>Insertion Sort</h3>
					<p class = "usage">Usage: Perform insertion sort for a list of integers.
      click the Step button to insert the current element to a sorted sublist.
      Click the Reset button to start over with a new random list.</p>
					<iframe width="800" height="500" frameborder="0" src="embedded/insertion_sort.html"
        sandbox="allow-same-origin allow-scripts allow-popups allow-forms"></iframe>
				</section>
				-->

			</div>
		</div>
		<script src="lib/js/head.min.js"></script>
		<script src="js/reveal.js"></script>
		<!--<script src="js/processing-1.4.1.js"></script>-->

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
