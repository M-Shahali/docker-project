the index page in src directory is the first page that you are going to see when press education button in login container.
first of all we checked if the person is authenticated or not by the help of <i>is_authenticated()</i>.in the mentioned function we set two values wich is username and session.
if the function returns true we are allowed to see the page otherwise we can not see the page since our session has been expired.<br>
because of ajax benefits adding a course,deleting a course and watching reserved courses in the index page ajax has been used three times.<br>
is_authentication() functin not only used in index page but aslo it has been used before each request to data base. for instance in add-course file first we check the is_authentiacated() function and after that we insert a data in data base. 
