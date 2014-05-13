Flashy
=======
[![Build Status](https://travis-ci.org/kalkih/Flashy.svg?branch=master)](https://travis-ci.org/kalkih/Flashy)	[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/kalkih/Flashy/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/kalkih/Flashy/?branch=master)	[![Code Coverage](https://scrutinizer-ci.com/g/kalkih/Flashy/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/kalkih/Flashy/?branch=master)

A small PHP flash class to store and get information and messages.

Flashy comes with a simple and minimalistic pre-defined stylesheet.
Flashy supports four different message types (info, success, warning and error).
Flashy does also support Font Awesome. (see instructions below for code examples).

Preview
======
![alt tag](http://i.imgur.com/uOCuyHw.png)


Functions
======
* add('Message type', 'Your message') // Add a new message
* get('Extra parameter') // Get messages as HTML (optionally: parameter)
* clear() // Clear all messages, also called from get()

Valid message types:
------
* 'info'
* 'success'
* 'warning'
* 'error'

Valid get parameters:
------
* 'icons' // Adds Font Awesome icons to the output


Instructions for Anax-MVC
======================================

Add the following to the top of your frotcontroller.

	// Get environment & autoloader, the $di & $app-object.
	require __DIR__.'/config_with_app.php';

	// Services
	$di->setShared('flash', function() {
		$flash = new \kalkih\Flash\Flash();
		return $flash;
	});

	// Other services, modules, controllers here

	// Starts the session (required by the Flashy class)
	$app->session;

If you want to use the bundled flashy stylesheet add following code to the frontcontroller (Note: you have to copy the stylesheet to your css folder for this to work).
    
    // Extra stylesheets
    $app->theme->addStylesheet('css/flashy.css');


You can now use the Flashy class.

	// From a route in the frontcontroller:

	$app->flash->add('info', 'This is a info message');
    $app->flash->add('success', 'This is a success message');
    $app->flash->add('warning', 'This is a warning message');
    $app->flash->add('error', 'This is a error message');
	
	// From a controller:
	
	$this->flash->add('info', 'This is a info message');
    $this->flash->add('success', 'This is a success message');
    $this->flash->add('warning', 'This is a warning message');
    $this->flash->add('error', 'This is a error message');

To get message/messages and print it/them out, just add following code to a view

	$app->flash->get();
	// or if in a view / controller
	$this->flash->get();

The output should look like this

	<div class="flashy_info">
		This is a info message
	</div>
	<div class="flashy_success">
		This is a success message
	</div>
	<div class="flashy_warning">
		This is a warning message
	</div>
	<div class="flashy_error">
		This is a error message
	</div>

If you have support for Font Awesome and want to show related icons with each message use the code below.

	$app->flash->get('icons');
	// or if in a view / controller
	$this->flash->get('icons'); 

The output with icons should look like this:

	<div class="flashy_info">
		<i class="fa fa-info-circle"></i>
		This is a info message
	</div>
	<div class="flashy_success">
		<i class="fa fa-check"></i>
		This is a success message
	</div>
	<div class="flashy_warning">
		<i class="fa fa-warning"></i>
		This is a warning message
	</div>
	<div class="flashy_error">
		<i class="fa fa-times-circle"></i>
		This is a error message
	</div>
