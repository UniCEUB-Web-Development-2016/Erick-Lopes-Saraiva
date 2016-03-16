	<?php

include "/var/www/html/MVC/control/UserController.php";
include "/var/www/html/MVC/view/LayoutManager.php";

class ControlManager{
	public function lmStart(){
		$lm = new LayoutManager();
		$lm->start();
	}	
}
$uc = new UserController();
$uc->registerUser($_POST["name"],$_POST["lastname"],$_POST["email"],$_POST["pass"],$_POST["date"]);