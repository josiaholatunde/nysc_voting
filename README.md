# nysc_voting
This is a basic electronic voting application. I registered voters with a unique mode of identification in the database. 
The application shuts out voters that are not registered and voters that have voted previously. The application does this by comparing the 
identification number of voters with that in the result table in the MYSQL database. The different positions(offices) 
are displayed using bootstrap's accordion. The user clicks on either the candidate's image or the appropriate radio button.
After voting, the user gets re-directed to the index page with a message signifying successful voting. The Administrator can access results 
immediately through the index file in the Admin folder. The Administrator can then navigate back to the index page through the use of links. 
