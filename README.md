<img width="150px" src="https://w0244079.github.io/nscc/nscc-jpeg.jpg" >

# INET 2005 - Lab 6
## MVC Architecture

#### Preliminary Steps

1. Ensure that both your `webserver` and `database` Docker containers are running.
2. Refer to the class recordings and any Powerpoint slides used in the lectures for reference.

### Instructions

#### Step 1: Add functionality for Display, Search, Update and Delete of Sakila Actors (8 points)
1.	Using the starter code as a guide and reference, implement all CRUD functionality as well as search on the Actors table in the Sakila database using the MVC architecture in the starter code.
2.	The starter code only shows display and update of customers, you'll need to add the other actions as well for Actors.
3.	Use PDO (not MySqli) as your data access library in order to communicate with the MySQL database.

#### Step 2: Implement a second Data Layer for SQLite (2 points)

1.	Using PDO, add a second DataLayer which will communicate with an SQLite database.
2.	Create a table for Actors in the new SQLite database with a similar structure to the one in the Sakila database. Populate it with a few sample actor records.
3.	In the SQLite Data Layer, implement the same CRUD and search functionality to work against the SQLite database. 
4.	You should be able to switch databases by altering one line of code which should determine whether you're application is communicating with the MySQL database or the SQLite database.
