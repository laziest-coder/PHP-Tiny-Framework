# PHP-Tiny-Framework
This is a tiny php framework collected through Symfony components and other libraries.

This framework is in MVC pattern, using different libraries for different purposes:

1. Let's start with Model. For this purpose, Doctrine ORM have been used. In the config directory of root, 
you can edit config.php to connect your app to database.
You can find documentation of Doctrine ORM using this link: 
  https://www.doctrine-project.org/projects/doctrine-orm/en/2.6/index.html
The documentation is really well-structured, I would recommend to have a look at there.

2. For templating, a component of Laravel framework, Blade has been used. It is quite easy to work with Blade.
In the BaseController, an instance of Blade class has been initialized, therefore, other controllers extending BaseController
can use it.

3. For manipulating images, library called ImageIntervention has been used.
Documentation is here: http://image.intervention.io/

  There are other libraries used, like for pagination and validation, but they are quite easy to handle.
You can use this framework however you want as well as modifying it.
