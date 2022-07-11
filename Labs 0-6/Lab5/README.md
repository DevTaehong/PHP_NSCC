<img width="150px" src="https://w0244079.github.io/nscc/nscc-jpeg.jpg" >

# INET 2005 - Lab 5

#### Preliminary Steps

1. Ensure that both your `webserver` and `database` Docker containers are running.
2. Refer to any Powerpoint slides used in the lectures for reference.
3. Copy your completed `Assignment` files and folders from your assignment repository and paste them into the root of this repository (Lab 5)

## Part A – Secure your Application in preparation for deployment to the Cloud.

### Instructions

#### Step 1: In your local database, create a new MySQL Least-Privilege user account to replace the 'root' account that you are currently using and restrict the account to only allow execution of `SELECT`, `INSERT`, `UPDATE`, and `DELETE` of data, as well as the ability to `execute Stored Procedures`.
1. 1.	Ensure that your new account is not able to perform Data Definition Language statements such as `DROP` and `ALTER` and can only perform actions on the `employees` database and no other.
2. You will show this account in MySql and demonstrate how you are connecting to the Employees DB by using this account instead of root.

#### Step 2: Create a new page in your application that allows the creation of new users.

1. The page could be called `register.php`. Make this page publically accessible along with the login page…you will of course have to make sure that the user doesn’t already exist and notify the user if the username is already in use.
2. Your application currently accepts any string as a valid password. Create a function that implements the sample snippet at https://www.codexworld.com/how-to/validate-password-strength-in-php/ to enforce strong passwords. Call the function `checkIsStrongPassword` and have it return `true` or `false` based on whether or not it meets the requirements outlined in the sample code.
3. Use the built-in bcrypt `password_hash` function to ensure that your passwords are hashed before saving to your users database table.

#### Step 3: Ensure your SQL statements are SQL Injection-Proof by replacing your current mysqli code with PDO prepared statements

1. Reference this W3 Schools article https://www.w3schools.com/php/php_mysql_prepared_statements.asp
2. Replace all of your database calls for all functionality with `prepared statements` that will receive parameters instead of building your SQL calls from scratch. In addition, one of your calls to the database, of your choosing, should be migrated to the database as a Stored Procedure and executed in your application. Refer to the in-class lectures and this article (http://php.net/manual/en/pdo.prepared-statements.php) for further details.

## Part B – Deployment and configuration of your Assignment site to a Production/Cloud environment.

#### Preliminary Steps

1. Ensure that you have signed up for the AWS Academy program as communicated in a previous announcement via an email invite. Contact your instructor if you did not receive this email invite.
2. Enrure that you have signed up for a free account on Heroku Cloud. https://signup.heroku.com/

### You will be given step-by-step instructions by your instructor for this part of the Lab. Refer to the in class direction and the resulting in-class Video Recording. Refer to the recording for all of the following deployment steps.

#### Step 1: Migration of the `employees` database to production environment.
#### Step 2: Introduction of Environment Variables into your application to accommodate both runtime environments.
#### Step 3: Adding of reCaptcha V2 to your registration and login pages.
#### Step 4: Deployment of your Assignment source code to production. (Hosted on Heroku)
