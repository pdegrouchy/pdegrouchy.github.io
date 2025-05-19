<?php
require_once('../../python_settings/auth.php');
$pdfClass = isset($_GET['pdfCreation'])?'pdf':'';
?><!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>Session 6-1</title>

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
					<h3>Session 6-1</h3>
				</section>
				<section>
					<h3>Objectives</h3>
					<ul>
						<li>To use tuples as immutable lists</li>
                        <li>To use sets for storing and fast accessing unique elements</li>
                        <li>To understand performance differences between sets and lists</li>
                        <li>To store key/value pairs in a dictionary and access values using keys</li>
					</ul>
				</section>
				<section>
					<h3>Tuples</h3>
					<ul>
						<li>Tuples are like lists except they are <strong>immutable</strong>. Once they are created, their
contents cannot be changed.</li>
						<li>If the contents of a list in your application do not change, you should use a tuple
to prevent data from being modified accidentally. Furthermore, tuples are more
efficient than lists.</li>
					</ul>
				</section>
                <section>
                    <h3>Creating Tuples</h3>
                    <ul>
                        <li>With brackets <strong>(</strong> and <strong>)</strong></li>
                        <div><pre class="solution-content python"><code>t1 = () # Create an empty tuple
t2 = (1, 3, 5)</code></pre></div>
                        <li>By converting a list (in this case <a href="session400.php#/28">comprehension</a>) into a tuple</li>
                        <div><pre class="solution-content python"><code>t3 = tuple([2 * x for x in range(1, 5)])
</code></pre></div>
                        <li>By converting a string into a tuple</li>
                        <div><pre class="solution-content python"><code>t4 = tuple("abac")</code></pre></div>
                    </ul>
                </section>

                <section>
                    <h3>Tuples -- len(), max(), min(), [] index</h3>
                    <ul>
                        <li>Tuples can be used like lists except they are immutable</li>
                        <!-- <div class="tryTrinket"><a href="https://trinket.io/python3/5b24c4d7ac" target="trinket">Try this in <img width="100" src="imgs/trinket-logo.png" /> <img class="externalLink" src="imgs/External.svg" title="opens in new window"/></a></div> -->
                        <div><pre class="solution-content python"><code># Create a tuple from a list
tuple2 = tuple([7, 1, 2, 23, 4, 5])
print(tuple2)

print("length is", len(tuple2)) # Use function len
print("max is", max(tuple2)) # Use max
print("min is", min(tuple2)) # Use min
print("sum is", sum(tuple2)) # Use sum

# Use indexer
print("The first element is", tuple2[0])</code></pre></div>
                    </ul>
                </section>

                <section>
                    <h3>Tuples -- +, *, [:] slice, in</h3>
                    <ul>
                        <!-- <iframe class="stretch" data-src="https://trinket.io/embed/python3/607b0d5ca5" width="100%" height="356" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe> -->
                        <!-- <div class="tryTrinket"><a href="https://trinket.io/python3/607b0d5ca5" target="trinket">Try this in <img width="100" src="imgs/trinket-logo.png" /> <img class="externalLink" src="imgs/External.svg" title="opens in new window"/></a></div> -->
                        <div><pre class="solution-content python"><code>tuple1 = ("green", "red", "blue") # Create a tuple
tuple2 = tuple([7, 1, 2, 23, 4, 5]) # Create a tuple from a list
tuple3 = tuple1 + tuple2 # Combine 2 tuples
print(tuple3)
tuple3 = 2 * tuple1 # Multiply a tuple
print(tuple3)
print(tuple2[2 : 4]) # Slicing operator
print(tuple1[-1])
print(2 in tuple2) # in operator
for v in tuple1:
    print(v, end = " ")
print()</code></pre></div>
                    </ul>
                </section>

<section>
                    <h3>Tuples -- +, *, [:] slice, in</h3>
                    <ul>
                        <!-- <iframe class="stretch" data-src="https://trinket.io/embed/python3/2f4cdc68f6" width="100%" height="356" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe> -->
                        <!-- <div class="tryTrinket"><a href="https://trinket.io/python3/2f4cdc68f6" target="trinket">Try this in <img width="100" src="imgs/trinket-logo.png" /> <img class="externalLink" src="imgs/External.svg" title="opens in new window"/></a></div> -->
                        <div><pre class="solution-content python"><code>tuple1 = ("green", "red", "blue")
tuple2 = tuple([7, 1, 2, 23, 4, 5])
list1 = list(tuple2) # Obtain a list from a tuple
list1.sort()
tuple4 = tuple(list1)
tuple5 = tuple(list1)
print(tuple4)
print(tuple4 == tuple5) # Compare two tuples
</code></pre></div>
                    </ul>
                </section>

                <section>
                    <h3>Sets</h3>
                    <ul>
                        <li>Sets are like lists to store a collection of items. Unlike lists, the elements in a set are:</li>
                        <ul>
                            <li><strong>unique</strong></li>
                            <li><strong>not placed in any particular order</strong></li>
                        </ul>
                    <li> If your application does not care about the order of the elements, using a set to store elements is more efficient than using lists.</li>
                    <li> The syntax for sets is braces {}. </li>
                    </ul>
                </section>

                <section>
                    <h3>Creating Sets</h3>
                    <div><pre class="solution-content python"><code>s1 = set() # Create an empty set
s2 = {1, 3, 5} # Create a set with three elements
s3 = set((1, 3, 5)) # Create a set from a tuple
# Create a set from a list (comprehension here)
s4 = set([x * 2 for x in range(1, 10)])
# Create a set from a string
s5 = set("abac") # s5 is {'a', 'b', 'c'}</code></pre></div>
                </section>

                <section>
                    <h3>Manipulating and Accessing Sets</h3>
                    <div><pre class="solution-content python"><code>s1 = {1, 2, 4}
s1.add(6)
print(s1) #  {1, 2, 4, 6}
s1.remove(4)
print(s1) #  {1, 2, 6}</code></pre></div>
                </section>

                <section>
                    <h3>Subset and Superset</h3>
                    <div><pre class="solution-content python"><code>s1 = {1, 2, 4}
s2 = {1, 4, 5, 2, 6}
s1.issubset(s2) # s1 is a subset of s2, prints True
s2.issuperset(s1) # s2 is a superset of s1, prints True</code></pre></div>
                    <img src="imgs/superset.png" style="background:none; border:none; box-shadow:none; margin-top:0px;height: 300px"/>

                </section>

                <section>
                    <h3>Equality Test</h3>
                    <div><pre class="solution-content python"><code>s1 = {1, 2, 4}
s2 = {1, 4, 2}
s1 == s1 #  True
s2 != s1 #  False</code></pre></div>
                </section>

                <section>
                    <h3>Set Operations (union, |)</h3>
                    <div><pre class="solution-content python"><code>s1 = {1, 2, 4}
s2 = {1, 3, 5}
s1.union(s2) #  {1, 2, 3, 4, 5}
s1 | s2 # equivalent of s1.union(s2)</code></pre></div>
                    <img src="imgs/union.png" style="background:none; border:none; box-shadow:none; margin-top:0px;height: 300px"/>
                </section>

                <section>
                    <h3>Set Operations (intersection, &)</h3>
                    <div><pre class="solution-content python"><code>s1 = {1, 2, 4}
s2 = {1, 3, 5}
s1.intersection(s2) # {1}
s1 & s2 #  equivalent of s1.intersection(s2)</code></pre></div>
                    <img src="imgs/interesction.png" style="background:none; border:none; box-shadow:none; margin-top:0px;height: 300px"/>
                </section>

                <section>
                    <h3>Set Operations (difference, -)</h3>
                    <div><pre class="solution-content python"><code>s1 = {1, 2, 4}
s2 = {1, 3, 5}
s1.difference(s2) # {2, 4}
s1 - s2 #  equivalent of s1.difference(s2)</code></pre></div>
                    <img src="imgs/difference.png" style="background:none; border:none; box-shadow:none; margin-top:0px;height: 300px"/>
                </section>

                <section>
                    <h3>Set Operations (symmetric_difference, ^)</h3>
                    <div><pre class="solution-content python"><code>s1 = {1, 2, 4}
s2 = {1, 3, 5}
s1.symmetric_difference(s2) # {2, 3, 4, 5}
s1 ^ s2 #  equivalent of s1.symmetric_difference(s2)</code></pre></div>
                    <img src="imgs/symmetric_difference.png" style="background:none; border:none; box-shadow:none; margin-top:0px;height: 300px"/>
                </section>

                <section>
                    <h3>Examples</h3>
                    <p>Usage of a set <a href="exercises/SetDemo.py">SetDemo.py</a> </p>
                    <p>Set and List performance compared: </p>
                        <ul>
                            <li>using the time library: <a href="exercises/SetListPerformanceTest.py">SetListPerformanceTest.py</a> </li>
                        </ul>
                </section>

                <section>
                    <h3>Dictionary</h3>
                    <ul>
                        <li>Why dictionary?</li>
                        <li>Suppose your program stores a million students and frequently searches for a
student using the student number. An efficient data structure for this
task is a dictionary. A dictionary is a collection that stores keys associated with elements.</li>
<li>The key works similarly to an indexer. In order to get the element associated, you need to provide the key.</li>
                    </ul>
                </section>

                <section>
                    <h3>Key/value pairs</h3>
                    <img src="imgs/dictionary.png" style="background:none; border:none; box-shadow:none; margin-top:0px;height: 500px"/>
                </section>

                <section>
                    <h3>Creating a dictionary</h3>
                    <div><pre class="solution-content python"><code>dictionary = {} # Create an empty dictionary
dictionary = {"john":40, "peter":45}</code></pre></div>
                    <p>Equivalent to:</p>
                    <div><pre class="solution-content python"><code>dictionary = dict()
dictionary =dict(john=40, peter=45)</code></pre></div>
                </section>

                <section>
                    <h3>Adding/Modifying Entries</h3>
                    <p>To add an entry to a dictionary, use <strong>dictionary[key] = value</strong></p>
                    <div><pre class="solution-content python"><code>>>> dictionary["susan"] = 50
>>> print(dictionary)
{'john': 40, 'susan': 50, 'peter': 45}</code></pre></div>
                </section>

                <section>
                    <h3>Deleting Entries</h3>
                    <p>To delete an entry from a dictionary, use <strong>del dictionary[key]</strong> </p>
                    <div><pre class="solution-content python"><code>>>> del dictionary["susan"]
>>> print(dictionary)
{'john': 40, 'peter': 45}</code></pre></div>
                </section>

                <section>
                    <h3>Looping Entries</h3>
                    <div><pre class="solution-content python"><code>for key in dictionary:
 print(key + ":" + str(dictionary[key]))</code></pre></div>
                </section>

                <section>
                    <h3>The len and in operators</h3>
                    <p><strong>len(dictionary)</strong> returns the number of elements in the dictionary.</p>
										<p><strong>in</strong> operator checks whether the key on the left exists in the dictionary on the right.</p>
                    <div><pre class="solution-content python"><code>>>> dictionary = {"john":40, "peter":45}
>>> "john" in dictionary
True
>>> "johnson" in dictionary
False
>>> len(dictionary)
2</code></pre></div>
                </section>

                <section>
                    <h3>The dictionary methods</h3>
					<table style="width:100%;font-size: 24px" >
					  <tr>
						<th style="width:30%">Methods</th>
						<th>Meaning</th>
					  </tr>
					  <tr>
						<td>list(dictionary.keys()): list</td>
						<td>Returns a dict_keys type of object, that you can convert in a sequence of values with list(dictionary.keys())</td>
					  </tr>
					  <tr>
						<td>list(dictionary.values()): list</td>
						<td>Returns a dict_values type of object, that you can convert with list(dictionary.values())</td>
					  </tr>
					  <tr>
						<td>list(dictionary.items()): tuple</td>
						<td>Returns a dict_items type of object, that you can convert in a sequence of tuples (key, value) with list(dictionary.items()).</td>
					  </tr>
					  <tr>
						<td>clear(): None</td>
						<td>Deletes all entries.</td>
					  </tr>
					  <tr>
						<td>get(key): value</td>
						<td>Returns the value for the key.</td>
					  </tr>
					  <tr>
						<td>pop(key): value</td>
						<td>Removes the entry for the key and returns its value.</td>
					  </tr>
					  <tr>
						<td>popitem(): tuple</td>
						<td>Returns a randomly-selected key/value pair as a tuple and
removes the selected entry</td>
					  </tr>
					</table>
				</section>
                <section>
                    <h3>Exercise: Guess the capital</h3>
                    <ul>
                        <li>Write a program that prompts the user to enter the capital of a random country.</li>
                        <li>Upon receiving user input, the program reports whether the answer is correct.</li>
                        <li>The countries and their capitals are stored in a dictionary in <a href="exercises/list_of_countries.py">this file</a> (import it to use).</li>
                        <li>The user’s answer is not case sensitive.</li>
                    </ul>
                </section>

                <section>
                    <div class="solution">
						<p class="show-solution"><i class="fa fa-eye" aria-hidden="true"></i>Solution</p>
						<p class="hide-solution" style="margin-top: 0px; margin-bottom: 0px;"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide solution</p>
						<pre class="solution-content python"><code data-trim data-noescape>import random

from list_of_countries import COUNTRIES

def main():
    countries = list(COUNTRIES.keys())
    country_to_guess = random.choice(countries)
    capital = input("What is the capital of "
                    + country_to_guess + "? ").strip()

    if capital.lower() == COUNTRIES[country_to_guess]\
            .lower():
        print("Your answer is correct")
    else:
        print("The correct answer should be "
              + COUNTRIES[country_to_guess])

main()</code></pre></div>
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
