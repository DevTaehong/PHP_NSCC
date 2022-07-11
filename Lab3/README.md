<img width="150px" src="https://w0244079.github.io/nscc/nscc-jpeg.jpg" >

# INET 2005 - Lab 3

#### Preliminary Steps

1. Ensure that both your `webserver` and `database` Docker containers are running.
2. Refer to the MySQL sections of the Powerpoint slides used in the lectures for reference.
3. Make sure that you can view the required databases in either your IDEs, DataGrip, MySQL Workbench, or the MySQL terminal as demonstrated in class.
4. Create a new folder in your Lab3 repo and call it `PartA`. Perform all of the following steps inside your new folder.

## Part A – Displaying MySQL Database Data in PHP

### Instructions

#### Step 1: Show a result set from a database in PHP
1. Look at the slides from the presentation on how to connect to a MySQL Database in PHP using MySQLi, how to select which database to use, and how to execute Select Statements to capture an array of results from the database and display them. Make sure to close the database connection at the end of the PHP code block.
2. See if you can put these together to get the first 10 rows of the film table in an HTML table in a new PHP file called something like `films.php`.
3. You are shooting for something like the figure below.
4. Let the instructor know if you run into problems.
<figure>
  <figcaption><i>Figure 1 – Selecting the First 10 Rows of the Sakila Film Table</i></figcaption>  
  <img src="https://w0244079.github.io/nscc/courses/inet2005/labs/lab3/Lab3-PartA-Step1-1.png" />
</figure>

#### Step 2: Use a Select + Where Statement

1. First, let’s add a new page that lets us search for films based on a string typed in a textbox searched in the film’s description.
2. You can do this with a single-page PHP from that POSTs back to itself (like the GuessingGame from Lab 1) or a two-part page with a static HTML POSTing to a separate PHP to display the results. It is up to you. It might be easier with a two-part form.
3.	Here is an example using a single-page form:
<figure>
  <figcaption><i>Figure 2 - Select with Search</i></figcaption>
  <img src="https://w0244079.github.io/nscc/courses/inet2005/labs/lab3/Lab3-PartA-Step2-1.png" />
</figure>

#### Step 3: Use a central DB Include File

1. 1.	Create a new PHP page in your site to hold the DB Connection/Close functions so that the connection string to attach to MySQL is only stored in one place. Include the file into the two existing pages and have them use the functions in the central file.


## Part B – Inserting/Updating/Deleting MySQL Data in PHP

#### Preliminary Steps

1. Create a new folder in your Lab3 repo and call it `PartB`. Perform all of the following steps inside your new folder.

### Inserting a new Actor into the MySQL Database Using HTML Forms and PHP

#### Step 1: Create a Form to Insert Records into the Actor table
1. Add a new HTML file to your site and build a simple form with two textboxes: one for the first name and one for the last name.
2. Add a Submit button.
3. Add an action to your form to submit the form data to a PHP page via POST.

#### Step 2: Insert a Record into the Actor table
1. Add a PHP page to your site to do the following:
  * Connect to the database.
  * Insert a new field into the actor table with the first name and last supplied from the HTML form via `POST`.
  * Display all records in the actor table so you can see the new record at the bottom.
  * Close the database connection.
<figure>
  <figcaption><i>Figure 3 - Table showing New Entry</i></figcaption>
  <img width="500px" src="https://w0244079.github.io/nscc/courses/inet2005/labs/lab3/Lab3-PartB-Step2-1.png" />
</figure>

#### Step 3: Get only the last 10 rows from the Actors Table
1. Modify the select statement that populates your table of actors to show only the last 10 rows added by:
  * `ORDER BY actor_id DESC` 
    * which orders the result set in reverse order of actor_id.
  * `LIMIT 10` 
    * to get only the top ten which is the last ten
  * You should see something like:
<figure>
  <figcaption><i>Figure 4 – Only getting the Last 10 Rows Added</i></figcaption>
  <img src="https://w0244079.github.io/nscc/courses/inet2005/labs/lab3/Lab3-PartB-Step3-1.png" />
</figure>
 
### Deleting Records in a MySQL Database 

> NOTE: You can add the textbox and buttont to select actor records to delete and later update to the same PHP page you have listing the Actors table already or start a new page if that is too confusing. Sometimes we cannot delete records from a database due to integrity constraints in other tables, however new records that you add should be deletable.

#### Step 4: Delete an Actor 

1. Under your list of Actors, add a new HTML Form as in the following image.<figure><figcaption><i>Figure 5 – Delete Form</i></figcaption><img src="https://w0244079.github.io/nscc/courses/inet2005/labs/lab3/Lab3-PartB-Step4-1.png" /></figure>
2. Add a new PHP page to accept the ID of the actor to delete via `POST`.
3. Have the PHP page delete the record from the database with that actor_id.
4. If the delete command is successful, use the `mysqli_affected_rows()` method to report how many records were affected. This method takes a single parameter (the Database connection variable) and reports how many records were affected by the last `INSERT`, `UPDATE`, or `DELETE` that was run. It only gives the count so you need to write the rest of the HTML yourself. See example below:
5. Have a link to go back to the list of actors to see if our record is gone:
  <figure>
    <figcaption><i>Figure 6 – Delete Reported via PHP</i></figcaption>
    <img src="https://w0244079.github.io/nscc/courses/inet2005/labs/lab3/Lab3-PartB-Step4-2.png" />
  </figure>

### Updating Records in a MySQL Database

> NOTE: This may be a little more tricky. Ask your instructor for help if you get stuck.

#### Step 5: Update an Actor 

1. Under your list of Actors, add a new HTML Form as in the following image.<br/><figure><figcaption><i>Figure 7 – Update Form</i></figcaption><br/><img src="https://w0244079.github.io/nscc/courses/inet2005/labs/lab3/Lab3-PartB-Step5-1.png" /></figure>
2. Add a new PHP page to accept the ID of the actor to Update via `POST`.
3. Have this page select the record from the database and pre-fill the textboxes of an HTML form to update this record. See below:<br/><figure><figcaption><i>Figure 8 – Update Form with Original Values Filled In</i></figcaption><br/><img src="https://w0244079.github.io/nscc/courses/inet2005/labs/lab3/Lab3-PartB-Step5-2.png" /></figure><br/><figure><figcaption><i>Figure 9 – Update Form with New Values Typed In</i></figcaption><br/><img src="https://w0244079.github.io/nscc/courses/inet2005/labs/lab3/Lab3-PartB-Step5-3.png" /></figure>
4. Have the form submit to another PHP page to properly update the record from the database with that actor_id with the changed values from the textboxes.
5. If the update command is successful, use the `mysqli_affected_rows()` method to report how many records were affected. See example below:
6.	Have a link to go back to the list of actors to see if our record is updated:<br/><figure><figcaption><i>Figure 10 – Successful Update Report</i></figcaption><br/><img src="https://w0244079.github.io/nscc/courses/inet2005/labs/lab3/Lab3-PartB-Step5-4.png" /></figure>

## Part C – JavaScript Form Validation

### Inserting a new Actor into the MySQL Database Using HTML Forms and PHP

#### Preliminary Steps

1. Create a new folder in your Lab3 repo and call it `PartC`. Add a blank HTML page to the forler and name it `index.html`. Perform all of the following steps inside your `PartC` folder.

### Create a Web Form

#### Step 1: Create a Web Form on your index.html page.
1. Create a simple Web Form on your page with the following items:
* Five text boxes for:
  * First Name
  * Last Name
  * Address 1
  * Address 2
  * Email
Wrap your textboxes as follows:
```html
<label>First name <input type="text" name="fName" id="fName"/></label>
```
* A single checkbox to `“Accept Terms and Conditions”`.
* A `Submit` button.

### JavaScript
#### Step 2: Add JavaScript functionality to the Form.

> NOTE: Refer to tutorial on JavaScript on W3Schools for hints on how to do the following steps. It's up to you as to where you put the script to accomplish these steps but putting it in an external `.js` file is usually the best way to go.
> Don't forget you can use your browser's debugger as demonstrated in class if you run into issues.

1. Set the background colour of any of the 5 textboxes actively being typed in to a yellow colour and set the text being typed to be in italics. Set the Text in the label to be <ins>underlined</ins>. For example:<br/><img width="250px" src="https://w0244079.github.io/nscc/courses/inet2005/labs/lab3/Lab3-PartC-Step2-1.png" />
2. When the user finishes entering in that textbox and either clicks on another form control or hits TAB to leave that textbox, have the background return to the usual colour of the form items, remove the italics on the text, and the underline on the label.<br/><img width="250px" src="https://w0244079.github.io/nscc/courses/inet2005/labs/lab3/Lab3-PartC-Step2-2.png" />
3. When the user clicks the Submit button, call a validateForm function to do the following:
* Make sure all textboxes have at least some text (i.e. at least 1 character)
  * If not, make the border of the textbox red – see below<br/><img width="250px" src="https://w0244079.github.io/nscc/courses/inet2005/labs/lab3/Lab3-PartC-Step2-3.png" />
* Make sure the checkbox is checked
  * If not display red text in a hidden <span> next to the checkbox. See below:<br/><img width="500px" src="https://w0244079.github.io/nscc/courses/inet2005/labs/lab3/Lab3-PartC-Step2-4.png" />

