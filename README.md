# BSIT2102_EcoSustainable_Product_Marketplace

### CS 121 Final Project

**Project Title:** Eco and Sustainable Product Marketplace  
**Leader:** Ralph Joedel Fonte  
**Members:** Roice Panes, Arron Catapang

**How to clone and commit changes to this repository using VSCode:**  
[Cloning and Committing Changes](https://code.visualstudio.com/docs/sourcecontrol/intro-to-git#:~:text=To%20clone%20a%20repository%2C%20run,to%20clone%20to%20your%20machine.)

### Table of Contents 
1. [Objectives](#objectives) 
2. [How to handle user data](#how-to-handle-user-data)
   - [Database User Parameters](#database-user-parameters)
   - [Miscellaneous User Data](#miscellaneous-user-data)
4. [To-Do List](#to-do-list)
5. [How PHP communicates with the database](#how-php-communicates-with-the-database)
6. [How PHP responds to different user privileges](#how-php-responds-to-different-user-privileges)

### Objectives
(Note: Ask leader for clarifications, this is for better understanding the structure of the program code. Additional variable names will be added later.)  
(Note: (!!!!) = the human is thinking what to add)

### How to handle user data

#### Database User Parameters
**User Personal Info**

- **DatabaseId:** id for database

- **userid:** usercontact for platform like UID in some games public if and only account is user approved and for searching  
  _Note:_ same role as userdisplayname but unique value

- **Name:** (First, Middle I., Last)  
  _Note:_ Do not Forget Normalization and apply single value only.

- **Age:** Restricted to 16 years old and below

- **userdisplayname:** this is protected and for account display name instead of username and name

- **username:** this and password is for credentials only == protected

- **password:** private only and accessible only if have a username--(thinking what to add)

- **email:** unique but it only access username but not usename

- **number:** optional when creating account but needed for ordering (same value in order contact number)

(!!!!)

**Miselanous User Data**

- This is like cookies but for login verification and some user data for use, like, saving user fingerprint--we have 2 choices and will apply both at different security levels  
  *(These 2 have pros and cons so be careful in using)*

- **Using IP address and cookies:**  
  The use is if user login in the same browser and no need to log-in again(!!!!)

- **User fingerprint:**  
  By getting the user's system info like OS version, what OS, RAM, processor, and systemid for user recognition or modifying data  
  _(Note: Useful for administrator log-in)(!!!!)_

- **last login/login data**  
- **login duration**  
  (!!!! thinkinggg)

_(Note to discuss:_
1. Our project is a marketplace so we need to add parameters for products and what products to sell.
2. We need to decide on a blueprint for the marketplace, e.g., whether we have a delivery service or just serve as a platform like Facebook Marketplace for Farmers/Sellers and Customers.
3. As a project in PHP, we need to prioritize the coordination of PHP and the database, the use of objects, and how we handle data.
4. )

That’s all for now!  
The 'test' branch is for testing some ideas.  
If you want to save your changes to GitHub, just push to the UPLOAD branch or create a branch and ask the leader to pull it to the main branch.  
That’s all for now!

### To-Do List:

- Create Database with the following tables:
  - User
  - Product
  - Cart
  - Different Access Accounts
  - Shop
  - Product

**How PHP communicates with the database:**

Using object-oriented programming. The parent is only the following and used to verify first before releasing other info:

- username
- password
- UID
- DatabaseID
- Authority - (Private -- what privileges have same as parent)
- Status (Before accessing account to verify if BAN, Deleted, or any possible restriction for account)

**Main Child/like eldest child and parent**

- UID, (Protected)
- DatabaseId - (Hidden or private and accessible for Database Engineer)
- Username - (private)
- UserDisplayName - (Protected (optional)-- can be same as username)
- Authority - (Private -- what privileges have same as parent)
- User Fingerprint (Private) (to be added)

### How PHP responds to different user privileges:

- **Admin:** Have access to all
- **Database Engineer / Manager:** Data manipulation or Database Privileges
- **Store Owner:** For Editing Goods Inside its authority
- **User or Buyer:** Basic Privileges
- **Delivery Account:** (optional on final situation)(Authority to view basic goods information according to given number)

_(to be added)._
