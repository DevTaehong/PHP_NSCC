<img width="150px" src="https://w0244079.github.io/nscc/nscc-jpeg.jpg" >

# INET2005 - LAB 2

## PART A - More PHP Basics - Functions

For help with the necessary PHP syntax, either refer to the PowerPoint slides, the main [PHP.net](https://www.php.net) site, the [W3Schools PHP Tutorial](https://www.w3schools.com/php), or the alternate resource of your choice.

### Instructions

> NOTE: For the following steps, please work in one large php file. We want to practice switching between HTML and PHP. Between each of the following steps, make sure to at least jump back to pure HTML long enough to output a heading with the Step number. As an exercise and a good proactice, try to limit the amount of HTML you echo in PHP. Instead, leave it 'outside' of the PHP code.

#### Step 1: Write a PHP function
1.	Write a PHP function that accepts two arguments; a string and a number.
2.	When the function executes, if the number argument value equals 1, then output the text argument value within an `<H1>` tag.
3.	When the function executes, if the number argument value equals 2, then output the text argument value within an `<H2>` tag.
4.	...and so on, until 6.
5.	When the function executes, if the number argument value equals 6, then output the text argument value within an `<H6>` tag.
6.	If the number is something other than 1-6, output an error message. 
7.	Once you've completed the implementation of the function, below it write a loop that calls your function 7 times in order to output the 6 header tags and the error message.

#### Step 2: Pass variables to PHP functions by both Reference and Value
1.	Write a PHP function that accepts a variable by value. It will take the string passed in, append the message “…blah” to it, and store it back in the same variable.
2.	Write another PHP function that accepts a variable by reference. It will also take the string passed in, append the message “…blah” to it, and store it back in the same variable.
3.	Outside of the function, 
  * create a string variable and give it a default message such as “Hello, World”.
  * then print the variable.
  * then pass it into the value function.
  * then print the variable
  * then pass it into the reference function
  * then print the variable

#### Step 3: Use a global variable in a function
1.	Store a person’s age in a global variable.
2.	Write a PHP function that that will print out the age in that global variable with some sort of message such as `“You are 25 years old”` in an `<h1>` header.

> NOTE: For the following step, be sure to create separate pages.
#### Step 4: Use built-in functions
1.	Create a new page in your site to display overall PHP information such as the Xdebug configuration information.
2. Create another new page in your site to print the following information in HTML messages 
   e.g. `<h1> This page was rendered in PHP version 7.x.x.</h1>`:
   * PHP Version
   * ZEND Version
   * The `default_mimetype` value from the php.ini file

## PART B – More PHP Basics – Dynamic Tables

### Instructions

#### Step 1: Fahrenheit to Celsius Converter
1.	Create a new PHP page called FahrenheitConversion.php. Use a loop to display the Celsius equivalents of 0 – 100 degrees Fahrenheit. To convert Fahrenheit to Celsius, subtract 32 from the Fahrenheit temperature and the multiply the result by (5/9). You should see something like the following:

<img width="500px" src="https://w0244079.github.io/nscc/courses/inet2005/labs/lab2/Lab2-PartB-Step1-1.png" >

2. Now get it to output as an HTML table with gridlines. See the following: 

<img width="500px" src="https://w0244079.github.io/nscc/courses/inet2005/labs/lab2/Lab2-PartB-Step1-2.png" >

#### Step 2: Celsius to Farenheit Converter
1. Build off your Fahrenheit conversion table by:
* Adding a second PHP page that has a similar table converting from Celsius to Fahrenheit (the formula requires you to multiply Celsius by 9/5 and then adds 32 – then round to the nearest whole number).
* Placing some sort of selection mechanism on top of the two PHP pages so the visitor can choose which to see (could just be hyperlinks on a separate page).
* Format both tables so that you get something like the following with a border around each table cell and the header row and every second row in the table having a gray background (Hint: think more CSS with just a little help from PHP –or – no help from PHP would be necessary if you used CSS3):

<img width="150px" src="https://w0244079.github.io/nscc/courses/inet2005/labs/lab2/Lab2-PartB-Step2-1.png" >

## PART C – POST/GET

### Instructions

#### Step 1: Create a Two-Part Form Using POST
1.	Create a static HTML page (i.e. an “input.html” page and not an “input.php” page) that contains a form with the following elements:
*	First name textbox.
*	Last name textbox.
*	Height in feet textbox.
*	Height in inches textbox.
2.	Add a PHP File to handle the form submitted via POST:
*	The PHP file will output a message like the following based on the input on the HTML form:

```sh
Your first name is: John
Your last name is:  Doe
Your height in metres is:  1.62
```

> NOTE: Your PHP code will obviously need to contain logic to take an entered height in feet and inches and figure out the height in metres.

#### Step 2: Create a Two-Part Form Using GET

1.	Create a static HTML page that contains a form with the following elements:
*	First name textbox.
* Last name textbox.
*	Birthday month textbox.
*	Birthday day textbox.
2.	Add a PHP File to handle the form submitted via GET:
*	The PHP file will output a message like the following based on the input on the HTML form:

```sh
Hello, John Doe! 
Your zodiac sign is:  Gemini
```

> NOTE: Your PHP code will obviously need to contain logic to take an entered birth month and day and figure out the Zodiac Sign.

#### Step 3: Add a File Uploader to your Two-Part Form Using POST from Step 1

1.	Add a control to your static HTML page from Step 1 to allow the user to select a file to upload to the server (e.g. a picture of themselves).
2.	Modify the  PHP File from Step 1 to handle the posted file :
* The PHP file will output a message like the following based on the file uploaded on the HTML form:
```sh
Tmp: C:\wamp\tmp\php1B9.tmp 
Orig: mikeandadam.JPG 
Size: 1379618 
Error: 0 
```
3.	Copy the uploaded file from its temp location on the web server to a subfolder of your website and print a message if successfully stored.
