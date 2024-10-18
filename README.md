# BSIT2102_EcoSustainable_Product_Marketplace
BSIT 2102<br>

CS 121 Final Project <br>

**Project Title : Eco and Sustainable Product Marketplace.**<br>
Leader : Ralph Joedel Fonte.<br>
Members :  Roice Panes, Arron Catapang.<br>


> How to clone and commit change this repository to vscode.<br>
https://code.visualstudio.com/docs/sourcecontrol/intro-to-git#:~:text=To%20clone%20a%20repository%2C%20run,to%20clone%20to%20your%20machine.

# Objectives

> (Note: Ask leader for clarifications, this is transparency for better to understand structure of program code,<br>
>it will add later some variable names<br> 
>Note: (!!!!) = the human is thinking what to add)<br> 

How to handle user data?<br>

Database User parameters<br>
--User Personal Info--<br>

DatabaseId<br>
> id for database

userid                             
>usercontact for platform like UID in some games
>public if and only account is user approved and for searching <br>
>note: same role as userdisplayname but unique value<br>

Name (First, Middle I., Last)
>Note- Do not Forget Normalization and apply single value only.<br>

Age                                
>Restricted to 16 years old and below<br>

userdisplayname                    
>this is protected and for account display name instead of username and name<br>

username
>this and password is for credentials only == protected<br>

password 
>private only and accessible only if have a username--(thinking what to add)<br>

email
>unique but it only access username but not usename<br><br>

9. number
>optional when creating account but need for ordering <br>
>i mean same value in order contact number<br>

10. (!!!!)

---Miselanous User Data---
>This is like cookies but for login verification and some user data for use,<br>
>like, saving user fingerprint--we have 2 choices and will apply both in different security level<br> 

*(These 2 has cos and pros so be careful in using)<br> 
1. Using IP address and cookies 
>The use is if user login in same browser and no need to log-in again(!!!!)

2. User fingerprint 
> by getting the user System info like OS version, what os, ram, proccessor, <br> and systemid for user recognition or modifying data<br> 
>(Note: Useful for admministrator log-in)(!!!!)<br>

last login/login data<br> 
login duration<br> 
(!!!! thinkinggg)<br> 

>(Note to discuss!!<br> 
    1. Our project is marketplace so need to add parameters for product and what product to sell.<br>
    2. We need to think IF what blueprint we need for marketplace like we have a<br> delivery services or same facebook marketplace that serve as a platform<br> for Farmers/Sellers to Customers.<br>
    3. As Project in PHP what we need to prioritize is how we use our learned <br>especially in the coordination of PHP and database, the use of objects <br>and how we handle data.<br>
    4.  )

Thats all for now!!<br>
ohh the 'test' branch is for testing some of my ideas <br>
and if you want to save your changes to github just push to UPLOAD branch or create the branch,<br>
or ask for leader to pull branch to main<br>
Thats all now!<br>

To DO List: <br>
1. Create  Database with the ff.<br>
    1. User<br>
    2. Product<br>
    3. Cart<br>
    4. Different Access Account<br>
    5. Shop<br>
    6. Product<br>

2. How php communicate with the database<br>
    1. Using object 
    > the parent is only the FF. the use like to verify first before releasing other info<br>
        > username<br>
        > password<br>
        > UID<br>
        > DatabaseID<br>
        > Authority - (Private -- what privilage have same as parent) <br>  
        > Status (Before Accesing account to verify if BAN, Deleted, or any possible restriction for account)<br>

    2. Main Child/like eldest child and parent  <br>
        > UID, (Protected) <br>
        > DatabaseId - (Hidden or private and accesible for Database Engineer)<br>
        > Username - (private)<br>
        > UserDisplayName -  (Protected (optional)-- can be same as username)<br>
        > Authority - (Private -- what privilage have same as parent)
        > User Fingerprint (Private)
        > (to be added)<br>

3. how php respond to different user privilage<br>
    1. Admin (Have access to all)<br>
    2. Database Engineer / Manager (Data manipulation or Database Privilage)<br>
    3. Store Owner (For Editing Goods Inside its authority)<br>
    4. User or buyer (basic Privlage)<br>
    5. Delivery Account (optional on final situation)(Autority to view basic goods information according to given number)<br>
    6. (to be added)<br>