# Restaurant template website

The website includes features for the **customers** and for the **admins** as well. The customers are able to reserve tables at the restaurant or order menu items if logged in. Payment is developed using Stripe (currently test account).
The admin user can access the admin dashboard where these can be managed (add new, edit, delete): Categories, Menu Items, Tables, Reservations, Orders.

**Deployed through fly.io:** <a href="https://gustavo-pizzeria.fly.dev/">**Gustavo Pizzeria**</a>

## Features for the customer
- customers have the opportunity to register or login
- browse the categories, menus and specials
- reserve a table at the restaurant
- order food for delivery

    ### Table reservation
    - After clicking on the ***Make Reservation*** button the customer will be directed to to the first step of the reservation process
    - Step 1:
        - customer provides basic info needed for the reservation (name, email, phone number, date, number of guests)
        - all info is required and validated
        - dates can be only chosen for a week in advance and within the business hours
    - Step 2:
        - the reason for a two step verification is for the process to be fool proof
        - at this step only the tables that are available on the date and can fit the provided number of guests will be available to choose from
    - After these steps the customer will receive an email with the information about their reservation and the reservation gets stored in the database

    ### Order takeout
    - the customer **has to create or login** to an account to be able to use this feature (top left *Register Login* buttons)
    - Every menu item has an ***Add to Cart*** button below them, clicking them will add them to the customers cart
    - in the shopping cart (top *navigation menu* or *shopping cart icon* on the left side) the customer can:
        - remove items
        - increase / decrease quantity of items
        - go back to shopping
        - proceed to checkout
    - in the order confirmation page the customer has to fill in a form with necessary data for the delivery (all fields are required and validated except the extra info)
    - in the next page there is a last chance to confirm if the order is right
    - clicking the ***Pay Now*** button the customer is redirected to the **Stripe checkout page**
    - at this point the order is saved in the database but the status is set to *unpaid*
    - after a successful checkout the customer receives an email about their order info and the order status is changed to *paid* in the database
    At this point of the development the checkout should **only be made with a dummy card** (e.g.: 4242 4242 4242 4242, the other info can be anything)

    ### Contact management
    At the bottom of the page in the footer section there are a couple menu points such as *Contact*
    After filling out the form and click on the ***Send Message*** button an email will be sent to the management with the filled out info.
    
## Features for admin users
The admin username and password can be set trough a seeder in the backend code. The dashboard can be accessed trough *localhost:8000/admin* after logging in with the admin user.

Categories, Menus, Tables and Reservations menu points serve basically the same purpose.
- Add new, Edit, Delete

Any of these actions will take effect in the database directly

Orders menu point is different in the sense that not all properties can be changed about an order such as the total.
Looking at the orders table there is a ***Items*** column where the admin can take a look at the ordered items. The admin can delete an item or change the ordered quantity. These actions take effect on the orders total accordingly.
