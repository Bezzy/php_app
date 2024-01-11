## No MVC pattern
MVC pattern allows for better code management and is well suited for web application.
There nothing here guiding the flow of data.

## No dependencies injections
The code relies a lot on getting the instance of an object to pass data. 
This contredict the principle of encapsulation.

## No Autoloading
Not having Autoloading can be tedious and leads to many mistakes.

## Too many global constant
Global constants can lead to coupling issues. It  better to encapsulate in a class when possible or using dependencies injection to pass a variable between objects.

## Too many Singleton
Instead using App as the only singleton and factory to make it like the crossroad of the application.

## No Clear Class Responsability
NewsManager is too flaw and we can put anything in it. Better to have clear responsabilities. One class per responsability.

For exemple:

- Table class is responsible of all the queries of the database.
- View only handle the ui.
- Controller Class is responsible for bridging models and views and have the business logic code.
- Entity class is responsible to manage a single entity of our model our more abstractly an single abstract entity.
- Database class manage the all the databases
- Config is responsible to manage the application config like the credentials...
- ...

## Querying directly the database
Direct database querying can be really dangerous and violate the principle of Dependency inversion principle. The is to inject the database object in an ORM (No time to create one).

## No config file
All credentials should be external to the application business logic.

## No proper error handling

## Don't Repeat yourself
The code for creating News and Comment objects is duplicated in both NewsManager and CommentManager. It should have a Manager class.  NewsManager and CommentManager should extends from it. This case is handle in the Entity class and Elsewhere.

## Object Data not well encapsulated
Some variables in news and comments should be private or protected so the data are well encapsulated.

## No use of Table Class
Table names like news and comment are hardcoded in SQL queries. This is bad and we should have a class providing the right Table for the right operation.

## Lack of helper Class

It's alway nice to have helpers to handle input forms and so on.