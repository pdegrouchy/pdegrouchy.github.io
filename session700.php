<?php
require_once('../../python_settings/auth.php');
$pdfClass = isset($_GET['pdfCreation'])?'pdf':'';
?><!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>Session 7</title>

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
					<h3>Session 7</h3>
				</section>
				<section>
					<h3>Objectives</h3>
					<ul style="width:100%;font-size: 28px">
						<li>To describe ideas using classes, and use classes to create objects.</li>
                        <li>To define classes</li>
                        <li>To construct an object using a constructor that invokes the initialiser to create and initialise data fields</li>
                        <li>To access object members using the dot operator (.)</li>
                        <li>To reference an object itself with the self parameter</li>
                        <li>To use UML graphical notation to describe classes and objects</li>
                        <li>To hide data fields to prevent data corruption and make classes easy to maintain</li>
                        <li>To apply class abstraction and encapsulation</li>
                        <li>To explore differences between the procedural paradigm and the object oriented paradigm</li>
					</ul>
				</section>

				<section>
					<h3>OO Programming Concepts</h3>
                    <ul>
                        <li>Object-oriented programming (OOP) involves programming using objects. An
object represents an entity in the real world that can be distinctly identified. For
example, a student, a desk, a circle, a button, and even a loan can all be
viewed as objects. </li>
                        <li>An object has a unique <strong>identity</strong>, <strong>state</strong>, and <strong>behaviours</strong>. The state of an object
consists of a set of data fields (also known as properties) with their current
values. The behaviour of an object is defined by a set of methods. </li>
                    </ul>
				</section>

				<section>
					<h3>Objects</h3>
                    <img src="imgs/class_objects.png" style="background:none; border:none; box-shadow:none; margin-top:0px;height: 300px"/>
                    <ul>
                        <li>An object has both state and behaviour. The state defines the object, and the
behaviour defines what the object can do.</li>
                    </ul>
				</section>

				<section>
					<h3>Classes</h3>
                    <ul>
                        <li>A Python class uses variables to store <strong>data fields</strong> and defines <strong>methods</strong> to
perform actions. Additionally, a class provides a special type method, known as
<strong>initialiser</strong>, which is invoked to create a new object. An initialiser can perform any
action. However, the initialiser is designed to perform initialising actions, such as creating
the data fields of objects.</li>
                    </ul>
                    <div><pre class="solution-content python"><code>class ClassName:
 # initialiser
 # methods</code></pre></div>
				</section>

				<section>
					<h3>Defining a class</h3>
                    <div><pre class="solution-content python"><code data-trim data-noescape style="line-height: 100%;font-size: 28px;margin-top: 0px; margin-bottom: 0px;">import math

class Circle:
    # Construct a circle object
    def __init__(self, radius = 1):
        self.radius = radius

    def getPerimeter(self):
        return 2 * self.radius * math.pi

    def getArea(self):
        return self.radius * self.radius * math.pi

    def setRadius(self, radius):
        self.radius = radius</code></pre></div>
				</section>

				<section>
					<h3>Creating objects</h3>
                    <div><pre class="solution-content python"><code data-trim data-noescape style="line-height: 100%;font-size: 18px;margin-top: 0px; margin-bottom: 0px;">from Circle import Circle

def main():
    # Create a circle with radius 1
    circle1 = Circle()
    print("The area of the circle of radius",
        circle1.radius, "is", circle1.getArea())

    # Create a circle with radius 25
    circle2 = Circle(25)
    print("The area of the circle of radius",
        circle2.radius, "is", circle2.getArea())

    # Create a circle with radius 125
    circle3 = Circle(125)
    print("The area of the circle of radius",
        circle3.radius, "is", circle3.getArea())

    # Modify circle radius
    circle2.radius = 100
    print("The area of the circle of radius",
        circle2.radius, "is", circle2.getArea())

main() # Call the main function</code></pre></div>
				</section>

				<section>
					<h3>Constructing Objects</h3>
                    <ul>
                        <li>Once a class is defined, you can create objects from the class by using the following syntax, called a <strong>constructor</strong>:</li>
                    </ul>
                    <div><pre class="solution-content python"><code>my_new_object = ClassName(optional_arguments)</code></pre></div>
                    <img src="imgs/object_self.png" style="background:none; border:none; box-shadow:none; margin-top:0px;height: 300px"/>
				</section>

				<section>
					<h3>Constructing Objects</h3>
                    <p>The effect of constructing a Circle object with ...</p>
                    <div><pre class="solution-content python"><code>my_new__circle_object = Circle(5)</code></pre></div>
                    <p>... is shown below:</p>
                    <img src="imgs/object_construct.png" style="background:none; border:none; box-shadow:none; margin-top:0px;height: 300px"/>

				</section>

				<section>
					<h3>Instance Methods</h3>
                    <ul>
                        <li>Methods are <strong>functions defined inside a class</strong>. They are <strong>invoked by objects</strong> to
perform actions on the objects. For this reason, the methods are also called
instance methods in Python.</li>
                        <li>You probably noticed that all the methods including the constructor have the
first parameter <strong>self</strong>, which refers to the object that invokes the method. You can
use any name for this parameter. But by convention, self is used. </li>
                    </ul>
				</section>

				<section>
					<h3>Accessing Objects</h3>
                    <ul>
                        <li>After an object is created, you can access its data fields and invoke its methods
using the dot operator (.), also known as the object member access operator.
For example, the following code accesses the radius data field and invokes the
getPerimeter and getArea methods.</li>
                    </ul>
                    <div><pre class="solution-content python"><code>[In 1]from Circle import Circle
[In 2]c = Circle(5)
[In 3]c.getPerimeter()
[Out 3]31.41592653589793
[In 4]c.radius = 10
[In 4]c.getArea()
[Out 4]314.1592653589793</code></pre></div>
				</section>

				<section>
					<h3>Why self?</h3>
                    <ul>
                        <li>Note that the first parameter is special. It is used in the implementation of the
method, but not used when the method is called. So, what is this parameter self
for? Why does Python need it?</li>
                        <li><strong>self is a parameter that represents an object. Using self, you can access
instance variables in an object.</strong> Instance variables are for storing data fields.
Each object is an instance of a class. Instance variables are tied to specific
objects. Each object has its own instance variables. <strong>You can use the syntax
self.x to access the instance variable x for the object self in a method.</strong> </li>
                    </ul>
				</section>

				<section>
					<h3>UML Class Diagram</h3>
                    <img src="imgs/uml.png" style="background:none; border:none; box-shadow:none; margin-top:0px;height: 500px"/>
				</section>

				<section>
					<h3>Example: Defining Classes and Creating Objects</h3>
                    <img src="imgs/example_uml.png" style="background:none; border:none; box-shadow:none; margin-top:0px;height: 450px"/>
				</section>

				<section>
					<h3>Example: Defining Classes and Creating Objects</h3>
                    <ul>
                        <li>See <a href="exercises/TV.py">TV.py</a> </li>
                        <li>See <a href="exercises/TestTV.py">TestTV.py</a> </li>
                    </ul>
				</section>

				<section>
					<h3>Trace execution</h3>
                    <p>See what is happening in memory with <a href="http://pythontutor.com/visualize.html#code=import+math%0A%0Aclass+Circle%3A%0A++++%23+Construct+a+circle+object%0A++++def+__init__(self,+radius+%3D+1%29%3A%0A++++++++self.radius+%3D+radius%0A%0A++++def+getPerimeter(self%29%3A%0A++++++++return+2+*+self.radius+*+math.pi%0A%0A++++def+getArea(self%29%3A%0A++++++++return+self.radius+*+self.radius+*+math.pi%0A%0A++++def+setRadius(self,+radius%29%3A%0A++++++++self.radius+%3D+radius%0A++++++++%0Amy_circle+%3D+Circle(5.0%29%0Ayour_circle+%3D+Circle(%29%0Ayour_circle.radius+%3D+100&mode=display&origin=opt-frontend.js&cumulative=false&heapPrimitives=false&textReferences=false&py=3&rawInputLstJSON=%5B%5D&curInstr=0" target="_blank">Pythontutor</a> (click link)</p>
				</section>

                <section>
                    <h3>Exercise - The Rectangle class</h3>
                    <p style="font-size: 28px">Following the example of the Circle class, design a class named Rectangle to represent a rectangle. The class contains:</p>
                    <ul style="font-size: 28px">
                        <li>Two data fields named width and height.</li>
                        <li>A constructor that creates a rectangle with the specified width and height.
The default values are 1 and 2 for the width and height, respectively.</li>
                        <li>A method named getArea() that returns the area of this rectangle</li>
                        <li>A method named getPerimeter() that returns the perimeter</li>
                    </ul>
                    <p style="font-size: 28px">Draw the UML diagram for the class, and then implement the class. Write a test program that
creates two Rectangle objects—one with width 4 and height 40 and the other with width 3.5 and
height 35.7. Display the width, height, area, and perimeter of each rectangle in this order.</p>
                </section>

				<section>
					<h3>Data Field Encapsulation</h3>
                    <ul>
                        <li>To protect data.</li>
                        <li>To make classes easy to maintain. </li>
                        <li>To prevent direct modifications of data fields, don’t let the client directly access
data fields. This is known as data field encapsulation. This can be done by
defining private data fields. In Python, the private data fields are defined with
two leading underscores. You can also define a private method named with
two leading underscores.</li>
                    </ul>
				</section>

				<section>
					<h3>Example for making fields private</h3>
                    <div><pre class="solution-content python"><code data-trim data-noescape style="margin-top: 0px; margin-bottom: 0px;height: 450px">import math

class Circle:
    # Construct a circle object
    def __init__(self, radius = 1):
        self.__radius = radius

    def getRadius(self):
        return self.__radius

    def getPerimeter(self):
        return 2 * self.__radius * math.pi

    def getArea(self):
        return self.__radius * self.__radius * math.pi</code></pre></div>
				</section>

				<section>
					<h3>Data Field Encapsulation</h3>
                    <div><pre class="solution-content python"><code>>>> from CircleWithPrivateRadius import Circle
>>> c = Circle(5)
>>> c.__radius
AttributeError: 'Circle' object has no attribute '__radius'
>>> c.getRadius()
 5</code></pre></div>
				</section>

				<section>
					<h3>Design Guide</h3>
                    <ul>
                        <li>If a class is designed for other programs to use, to prevent data from being
tampered with and to make the class easy to maintain, define data fields
private.</li>
                        <li>If a class is only used internally by your own program, there is no need to
encapsulate the data fields.</li>
                    </ul>
				</section>

				<section>
					<h3>Class Abstraction and Encapsulation</h3>
                    <ul>
                        <li>Class abstraction means to separate class implementation from the use of the
class. The creator of the class provides a description of the class and let the
user know how the class can be used. The user of the class does not need to
know how the class is implemented. The detail of implementation is
encapsulated and hidden from the user. </li>
                    </ul>
                    <img src="imgs/encapsulation.png" style="background:none; border:none; box-shadow:none; margin-top:0px;height: 300px"/>
				</section>

                <section>
                    <h3>The Loan Class example</h3>
                    <p>A specific loan can be viewed as an object of a Loan class.
                        The interest rate, loan amount, and loan period are its data properties, and
                        computing monthly payment and total payment are its methods.
                        When you buy a car, a loan object is created by instantiating the class with your loan interest
                        rate, loan amount, and loan period. You can then use the methods to find the monthly payment and
                        total payment of your loan. As a user of the Loan class, you don’t need to know how these methods
                        are implemented.</p>
                </section>

				<section>
					<h3>Designing the Loan Class</h3>
                    <img src="imgs/uml_loan_class.png" style="background:none; border:none; box-shadow:none; margin-top:0px;height: 500px"/>
				</section>

				<section>
					<h3></h3>
                    <ul>
                        <li>See the program <a href="exercises/Loan.py">Loan.py</a></li>
                        <li>See the program <a href="exercises/TestLoanClass.py">TestLoanClass.py</a></li>
                    </ul>
				</section>

                <section>
                    <h3>Exercise - Stock Price</h3>
                    <p style="font-size: 22px">Design a class named Stock to represent a company’s stock that contains:</p>
                    <ul style="font-size: 22px">
                        <li>A private string data field named symbol for the stock’s symbol.</li>
                        <li>A private string data field named name for the stock’s name.</li>
                        <li>A private float data field named previousClosingPrice that stores the stock price for the previous day</li>
                        <li>A private float data field named currentPrice that stores the stock price for the current time.</li>
                        <li>A constructor that creates a stock with the specified symbol, name, previous
price, and current price</li>
                        <li> A get method for returning the stock name</li>
                        <li>A get method for returning the stock symbol</li>
                        <li>Get and set methods for getting/setting the stock’s previous price.</li>
                        <li>Get and set methods for getting/setting the stock’s current price.</li>
                        <li>A method named getChangePercent() that returns the percentage changed
from previousClosingPrice to currentPrice</li>
                    </ul>
                    <p style="font-size: 22px">Draw the UML diagram for the class, and then implement the class. Write a test program that
creates a Stock object with the stock symbol INTC, the name Intel Corporation, the previous
closing price of 20.5, and the new current price of 20.35, and display the price­ change percentage.</p>
                </section>

                <section>
                    <h3>See the difference between procedural and OO thinking</h3>
                    <p>Write a program that prompts the user to enter a weight in pounds and height in inches and then displays the BMI. Note that one pound is 0.45359237 kilograms and one inch is 0.0254 meters.</p>
                    <ul>
                        <li>See the program <a href="exercises/BMI_procedural.py">BMI_procedural.py</a> </li>
                    </ul>
                    <p>But we could also write this program using classes</p>
                </section>

				<section>
					<h3>The BMI Class</h3>
                    <img src="imgs/bmi_class.png" style="background:none; border:none; box-shadow:none; margin-top:0px;height: 500px"/>
				</section>

				<section>
					<h3>The BMI Class</h3>
                    <ul>
                        <li>See the program <a href="exercises/BMI.py">BMI.py</a></li>
                        <li>See the program <a href="exercises/UseBMIClass.py">UseBMIClass.py</a></li>
                    </ul>
				</section>

				<section>
					<h3>Procedural vs. Object-Oriented (1)</h3>
                    <ul>
                        <li>In procedural programming, data and operations on the data are separate,
and this methodology requires sending data to methods. Object-oriented
programming places data and the operations that pertain to them in an object.
This approach solves many of the problems inherent in procedural
programming.</li>
                    </ul>
				</section>

				<section>
					<h3>Procedural vs. Object-Oriented (2)</h3>
                    <ul>
                        <li>The object-oriented programming approach organises programs in a way that
mirrors the real world, in which all objects are associated with both attributes
and activities. Using objects improves software reusability and makes
programs easier to develop and easier to maintain. Programming in Python
involves thinking in terms of objects; a Python program can be viewed as a
collection of cooperating objects.</li>
                    </ul>
				</section>

                <section>
                    <h3>Exercise - Stopwatch</h3>
                    <p style="font-size: 22px">Design a class named StopWatch. The class contains:</p>
                    <ul style="font-size: 22px">
                        <li>The private data fields startTime and endTime with get methods.</li>
                        <li>A constructor that initialises startTime with the current time.</li>
                        <li>A method named start() that resets the startTime to the current time.</li>
                        <li>A method named stop() that sets the endTime to the current time.</li>
                        <li>A method named getElapsedTime() that returns the elapsed time for the stop watch in milliseconds.</li>
                    </ul>
                    <p style="font-size: 22px">Draw the UML diagram for the class, and then implement the class. Write a test program that
measures the execution time of adding numbers from 1 to 1,000,000.</p>
                </section>

                <section>
                    <h3>Solution</h3>
                    <ul>
                        <li><a href="exercises/rectangle.py">rectangle.py</a> </li>
                        <li><a href="exercises/stock.py">stock.py</a> </li>
                        <li><a href="exercises/stopwatch.py">stopwatch.py</a> </li>
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
