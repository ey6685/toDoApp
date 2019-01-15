# TODO Application

This is a simple README to guide you through setting up this application locally.

## Introduction

The objective of this exercise is to practice your software engineering skills by developing and documenting a simple web-based ToDo Application. The exercise is a condensed, simplified version of all the Software Development tasks you will need to complete throughout the semester.

## Requirements

* [XAMPP](https://www.apachefriends.org/download.html)
* [Google Chrome](https://www.google.com/chrome/ss)
* [ToDoApp Directory](https://github.com/ey6685/toDoApp)

## Installation

* Install XAMPP as you normally would on your local machine. Directions can be found [here](https://www.apachefriends.org/faq_windows.html).

## Configuration

* XAMPP requires certain ports to be available
  * Ports 80 & 443 for Apache
  * Port 3306 for MySQL
* For this configuration make sure the default MySQL password is used
  * Username: root
  * Password: **LEAVE BLANK**
* Copy the ToDoApp Directory to C:\ ...\xampp\htdocs

Once you've completed the configuration you should be able to navigate to [here](localhost/toDoApp/index.php)
  * (localhost/toDoApp/index.php)

This is the home page of the Application. Once you click "Initialize Database" the database and tables will be created in MySQL, afterwards you'll be redirected to the "Your Tasks" page.

From here you will be able to view your tasks, add new tasks, and delete tasks once they are completed.