# BSIT2102_EcoSustainable_Product_Marketplace
BSIT 2102<br>

CS 121 Final Project <br>

**Project Title : Eco and Sustainable Product Marketplace.**<br>
Leader : Ralph Joedel Fonte.<br>
Members :  Roice Panes, Arron Catapang.<br>


How to clone and commit change this repository to vscode.<br>
https://code.visualstudio.com/docs/sourcecontrol/intro-to-git#:~:text=To%20clone%20a%20repository%2C%20run,to%20clone%20to%20your%20machine.


# Objectives

Objectives--<br>
    > (Note: Ask leader for clarifications, this is transparency for better to understand structure of program code, 
    <br>it will add later some variable names<br> 
    - Note: (!!!!) = the human is thingking what to add)<br> 

How to handle user data?<br>
----Database User parameters----<br>

--User Personal Info<br>
*dbid                               //id for database<br>
*userid                             //usercontact for platform like UID in some games--<br> 
                                    public if and only account is user approved and for searching-- note: same role as <br>userdisplayname but unique value<br>
*Name (First, Middle I., Last)      //Note- Do not Forget Normalization and apply single value only<br>;
*Age                                //Restricted to 16 years old and below<br>
*userdisplayname                    //this is protected and for account display name instead of username and name<br>
*username                           //this and password is for credentials only == protected <br>
*password                           //private only and accessible only if have a username--(thinking what to add)<br>
*email                              //unique but it only access username but not usename<br>
*number                             //optional when creating account but need for ordering 
                                    <br>i mean same value in order contact number<br>
*(!!!!)

--Miselanous User Data(this is like cookies but for login verification and some user data for use like, saving user fingerprint--we have 2 choices and will apply both in different security level)<br> 

*(These 2 has cos and pros so be careful in using)<br> 
1. Using IP address and cookies //The use is if user login in same browser and no need to log-in again(!!!!)<br> 
2. User fingerprint //by getting the user System info like OS version, what os, ram, proccessor, <br> and systemid for user recognition or modifying data (Note: Useful for admministrator log-in)(!!!!)<br> 

*last login<br> 
*login duration<br> 
*(!!!! thinkinggg)<br> 

(Note to discuss!!<br> 
    1. Our project is marketplace so need to add parameters for product and what product to sell.<br>
    2. We need to think IF what blueprint we need for marketplace like we have a<br> delivery services or same facebook marketplace that serve as a platform<br> for Farmers/Sellers to Customers.<br>
    3. As Project in PHP what we need to prioritize is how we use our learned <br>especially in the coordination of PHP and database, the use of objects <br>and how we handle data.<br>
    4.  
    )
Thats all for now!!
