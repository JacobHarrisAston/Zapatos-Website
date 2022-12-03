# Zapatos-Website
Group 31, Aston University, CS2TP

The folder named ZapatosWeb is the most up to date code that was submitted for this assessment.

This is a website dedicated to selling affordable and trendy shoes to young people - specifically university/college students. The site displays only the most current shoes in trend so users are able to buy mainstream products in one place, for cheaper prices than other fast fashion competitors. There are sections for women, men and kids.
Any user can browse the website, however, only registered users can add items to their basket. Registered users can then check out and will receive confirmation of their order as well as seeing the order history.

The Admin pages are the main pages for the admins to control the website in matters of adding products ,editing and deleting them. Only an admin can access this part of the website as it is separate from the customer side.
 
ASTON SERVER CONNECTION (VirtualMin):
Hosting server:          cs2410-web01pvm.aston.ac.uk

Webmin Credential:
Administration login:    u-220036425
Administration password: 6tReKz4HDrD/rVdQ
Administration URL:      https://cs2410-web01pvm.aston.ac.uk:10000
PHP MyAdmin Credentials (Database Access):
MySQL phpMyAdmin:        https://cs2410-web01pvm.aston.ac.uk/phpmyadmin
MySQL database:          u_220036425_db
MySQL login:             u-220036425
MySQL password:          HwJSeyEaUSOPIbR

Domain name:             220036425.cs2410-web01pvm.aston.ac.uk
Website:                 http://220036425.cs2410-web01pvm.aston.ac.uk

CUSTOMER SIDE ACCESS ON THE SERVER:
url: https://220036425.cs2410-web01pvm.aston.ac.uk/ZapatosWeb/customerSide/home.php
Admin Sign-in (demo details):
Admin Email: customer1@gmail.com
Password: Customer321

ADMIN SIDE ACCESS ON THE SERVER:
url: https://220036425.cs2410-web01pvm.aston.ac.uk/ZapatosWeb/customerSide/home.php
Admin Sign-in (demo details):
Admin Email: admin@gmail.com
Password: admin321


CUSTOMER SIDE WORKING: 
•	Upon accessing the site, the initial screen is the home page which has a discount pop-up promoting an Xmas Sale with a 20% discount. 
•	The home page has three categories: men, women, and kids. 
•	The footer, which is located beneath the homepage, contains all the links, contact details, and social media accounts for the users to follow up.  
•	Customers will be taken to the register page to claim the discount if they click on the claim discount pop up. 
•	When you click on a tab, you are greeted with images of shoes, the user can then select their desired product by clicking “view product.” 
•	This will then direct them to the individual products information page, where they can select their required size and quantity. 

•	They can choose to add this to their personal shopping cart which will be added to the basket page. The customer will have the option to click on the checkout page if they have selected their desired products. All the desired products and their total cost, including any available discounts, will be listed on the checkout page. The customer will have the option of emptying the cart if they want to deselect the products and a payment details box where they can enter their card information and delivery information for the purpose of making a purchase. 

•	The customer will not be able to checkout unless signing in. 
 

 
 ADMIN SIDE WORKING: 
•	When initially accessing the admin site, you will come across a login tab which asks you to sign in with your login credentials. This creates a session.
•	If the admin logs into the admin portal, he will be welcomed with his name at the admin dashboard.
•	The availability page lists all the products stocked on the site – with the edit button linking to an edit form to update in the database. Delete button will remove the stock
•	The order page shows order history of customers.
•	The edit profile page allows admin to change their username on a form and updates to database. 

 
DEPLOYMENT OF THE WEBSITE: 
•	The structure of the website is a folder named Zapatos web which is the project folder. 
•	The folder consists of two files: Customer file and Admin File. 
•	Each folder has the HTML, JS, CSS styling sheets and images for the website. 
•	Apart from the main folder, there is the SQL file of the database structure which contains database contents which you must import on any of the local host server (we use Xampp Apache during the development) or Aston VirtualMin server, the credential for existing host for the website is mentioned in the start of the document. 


