# LoginFormUsingPHP
I have created a login form where there are 3 role (admin, user, engineer) and depending upon the respective role they are on their dashboard and admin has the authority to change the role of others.

### HTML Form Structure:

The login form is designed using HTML, comprising input fields for username and password.
It includes a "Submit" button that users can click to submit their login credentials.


### Validation:
Upon submission, PHP validates the entered data, checking for empty fields and potentially implementing additional security measures like sanitization to prevent SQL injection.


### Authentication:

Once the form is submitted, the PHP script processes the entered username and password.
The script checks these credentials against a database that stores user information, including hashed passwords.


### Session Handling:

After successful authentication, a PHP session is initiated to track the user's session throughout their interaction with the website.
This session ensures that the user remains authenticated across different pages of the website until they log out or their session expires due to inactivity.




About
I have created a login form where there are 3 role (admin, user, engineer) and depending upon the respective role they are on their dashboard and admin has the authority to change the role of others.

ishanahmed07.github.io/Login-Form/
