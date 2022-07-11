<img width="150px" src="https://w0244079.github.io/nscc/nscc-jpeg.jpg" >

# INET2005 - LAB 1

## PART A - DEBUGGING PHP
### Instructions

In the `PartA` folder that you cloned to your system, you should see three files (`GuessingGame.php`, `KiloPoundConverter.php`, and `KiloPoundForm.html`)

1. In the `PartA` folder, add a file called `index.php` and add to it the following code:
```php
<?php
    $number1 = 5;
    $number2 = 8;
    $sum = $number1 + $number2;
    echo "<h1>The sum is: ";
    echo $sum;
    echo "</h1>";
?>
```        
2. Set a break point and debug the file to make sure that debugging is working in your development environment. Refer to the in-class recordings to see an example of using the debugger.
3. Step through the code and watch the variables window.
4. Now that you know you can debug a file in your IDE, use your newfound ability to see if you can find the problems with the code in the GuessingGame.php file. It should be a simple number guessing game with a random number between 1 and 100 set and the user prompted to guess the number with prompts to guess higher and lower. We are very new to PHP, but if we utilize the debugger and see what is happening on each line, we should be able to figure it out. If you get stuck, contact your instructor.
5. Now see if you can find the problems with the code in the KiloPoundConverter.php file (you will also need the KiloPoundForm.html file as well and it should be your start page). Again, we are still new to PHP, but try to figure it out. Once you have it fixed or, if you get stuck, contact your instructor.

> NOTE: When getting the lab checked, you may be asked to show the fixed files by executing them with the debugger and stepping through the code.

## PART B - PHP BASICS
### Instructions

At the same level as your `PartA` folder, create a new folder called `PartB`

For help with the necessary PHP syntax, either refer to the PowerPoint slides, the main [PHP.net](https://www.php.net) site, the [W3Schools PHP Tutorial](https://www.w3schools.com/php), or the alternate resource of your choice.

#### Step 1: Mixing PHP and HTML
1.	Create a new PHP page in the folder with HTML and PHP mixed.
2.	Enter PHP between the <body></body> tags to echo the following message in Heading 1 format – “Greetings from Lab1.”
3.	Preview it in a browser.
4.	Then add a simple HTML tag and some text after the close of the PHP block (e.g. “?>”) that you entered above. You could add a simple paragraph in HTML.
5.	Then add another PHP block and echo another tag – perhaps an H3 this time.
6.	Preview this in a browser. 
7.	Do a view source and see what the browser is “seeing”.

> NOTE: For the following remaining steps, keep working in the same file you created in Step 1. We want to practice switching between HTML and PHP. Between each of the following steps, make sure to at least jump back to pure html long enough to output a heading with the next Step Number. As an exercise and a good practice that we will discuss later, you can try to limit the amount of HTML you echo in PHP and leave it "outside" of the PHP code.

#### Step 2: Using a String Variable
1.	Now, add a new example (PHP block) working with variables.
2.	Declare a new variable to hold the string of your name.
3.	You will then add an echo statement to output that variable.
4.	Preview it and make sure it works.
#### Step 3: Using the Concatenation Operator
1.	Now, add a new example working with the concatenation operator.
2.	Add a few smaller strings together using the concatenation operator and save it to a variable.
3.	Echo the variable.
4.	Make sure it works.
#### Step 4: Using the Arithmetic Operators
1.	Using variables and the arithmetic operators, write PHP code to calculate and echo the following:
* (32 * 14) + 83
* (1024 / 128) - 7
* the remainder of 769 divided by 6
#### Step 5: Use a loop
1.	Use a loop to output the following: 
```10…9…8…7…6…5…4…3…2…1…Blast Off```
#### Step 6: Use an Array  
1.	Create an array to hold seven(7) colour names of your choosing.
2.	Output the values of the array using:
* A `for` loop
* A `foreach` loop
* One other way of your choosing.


