<?php
//login_form_test.php
include_once 'includes/settings.php';
require_once 'simpletest/autorun.php';
require_once 'simpletest/web_tester.php';

class LoginForm extends WebTestCase {

	  function testCorrectPassword() {
		$this->get(VIRTUAL_PATH . '/login.php');
		$this->assertResponse(200);

    $this->setField("hours", "1.5");
		$this->setField("rate", "50");
		$this->clickSubmi("Show pay");

		$this->assertResponse(200);
		$this->assertText("Welcome, John");
	}
	
 	 function testFailedPassword() {
		$this->get(VIRTUAL_PATH . '/login.php');
		$this->assertResponse(200);

		$this->setField("name", "John");
		$this->setField("password", "XYZXYZ");//incorrect password
		$this->clickSubmit("Login");

		$this->assertResponse(200);
		$this->assertText("Login and/or password is incorrect");
	}

}


© 2021 GitHub, Inc.
