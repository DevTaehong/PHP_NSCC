<img width="150px" src="https://w0244079.github.io/nscc/nscc-jpeg.jpg" >

# INET 2005 - Lab 4

## PHP OOP

#### Preliminary Steps

1. Ensure that both your `webserver` and `database` Docker containers are running.
2. Refer to the class recordings and any Powerpoint slides used in the lectures for reference.

### Instructions

#### Step 1: Create a Shape Area Calculator that uses Inheritance
1.	Using inheritance create three classes in PHP derived from a common abstract **`Shape`** class: **`Circle`**, **`Rectangle`**, and **`Triangle`**. 
2.	The `Shape` parent class can store the shape **`name`** and should have an abstract function called **`CalculateArea`** that all derived classes must implement.
3.	Have each derived class construct itself with the appropriate parameters to calculate its area.
4.	Have each derived class implement the **`CalculateArea`** function in the correct way for that shape.
5.	Now build  an **`index.php`** web page on top of the classes that might look a bit like the following example (I used the fieldset and legend tags to make my form look better).

<figure>
  <figcaption><i>Figure 1 - Basic Shape Calculator Page (<b>Note: Should be Rectangle, not Square</b>)</i></figcaption>
  <img width="750px" src="https://w0244079.github.io/nscc/courses/inet2005/labs/lab4/fig1.png" />
</figure>

#### Step 2: Add an interface and implement it in your Shape Area Calculator

1.	Add an interface to your application called **`iResizable`** that has a **`Resize`** function that allows you to grow an object’s area by a defined percentage passed is as an argument (e.g. “200%”) or to shrink an object’s area by the defined percentage passed is as an argument (e.g. “50%”). .
2.	Implement the interface in the **`Circle`** object so that it will modify the area and the radius for the object correctly when resized.
3.	Add a textbox for the Percent to grow/shrink and buttons to perform both actions to your Form. 
4.	Have that button change the area/radius output for the **`Circle`** object appropriately.
5.	Do the same to implement it for the Triangle by only changing the height (keep the base the same as previously entered).
6.	Rectangles will be a Shape but will <b>not</b> be resizable.
