P5-OC-Blog

This blog is the 5th project done as part of my training (« Développeur d’applications-spécialité PHP/Symfony » OC).

An exemple is available on http://blog.caroleguardiola.com.

Instructions for this project :
The website must be developped in PHP without using a framework or a CMS.
This website must be collaborative : anyone can read, create or update a post. 
There must not be admin dashboard with authentication required.
There must be a homepage with a contactform.

This project was developed with the MVC design pattern and in object oriented for the posts.
A Bootstrap theme was included and customized.
Mailtrap.io was used for mails.

Librairies :
-	SwiftMailer
There are included by Composer.

Installing :
1.	Clone or Download this repository on your local machine.
2.	Install composer : https://getcomposer.org/
3.	In project folder open a new terminal window and execute command line composer init.
4.	Define the dependencies (SwiftMailer used in this project).
5.	Execute command line composer install to download dependencies.
6.	Create your database or use the file config/posts.sql (created wtih MySQL).
7.	If you change the name of the database, update the file model/PostManager.php with the new name.
8.	For the connexion to the database : Edit the file model/DBConnexion.php and use your parameters to connect your database (dbname, login, password).
9.	For the contactform : Edit the file controller/ContactFormController.php and use your parameters to create your transport (mailtrap.io was used for this project) and create your message.
10.	Open the website with index.php.

Contributing
1.	Fork it
2.	Create your feature branch (git checkout -b my-new-feature)
3.	Commit your changes (git commit -am 'Add some feature')
4.	Push to the branch (git push origin my-new-feature)
5.	Create new Pull Request
