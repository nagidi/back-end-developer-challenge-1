# Back End Developer Challenge 2020 #

Welcome to the Wise Publishing Back End Developer Challenge!

### Your Goal

#### First Task
Your project is to develop an administration panel using Laravel that allows a user to save quotes from their favourite TV show to a MySQL database.

Your administration panel requires CRUD functionality for three fields: Season, Episode & Quote.

You’re then to build a page to output the information the user has saved to the database.

##### BONUS:
Insert a random photo alongside each quote, accessed via [https://picsum.photos/](https://picsum.photos/) API.


#### Second Task
In the same Laravel project, I want you to write an artisan command to output to console screen, the average prices for each of the food items by state.

I have attached the SQL file for the copi table. I have also attached the SQL for the states table.
You can find the SQL files for copi and states tables in the repo.

I want you to correctly use models for this. Including a one to many relationship. The average query should be one per state. You should make use of selectRaw to make SQL avg() queries for each of the food items, rather than an average line query for each item.

I want the output to look like this (1 line per state):

Alabama: Steak (X), Ground Beef (X), Sausage (X), Fried Chicken (X), Tuna (X)

Where X is the average value by state. So it should be all 50 states output to the terminal screen.

The objective is to do this with the minimum queries to the database.


### Assessment
We’re looking to evaluate the following skills in basic Laravel:
 
 * MVC
 
 * CRUD and Resource Controllers
 
 * Eloquent and Relationships
 
 * Database migrations
 
 * Basic Bootstrap front-end
 
 * Efficient Database queries.


### Hints
Laravel has great [documentation](https://laravel.com/docs/master) that will definitely help you through out this challenge.


### Submissions

* Clone this repository and link us your completed repo on either BitBucket or GitHub


### Finally

Take this seriously! Last year we placed both of our interns in to full time positions!


*GOOD LUCK!!*


