<?php

function CreateInput($label, $name, $type = "text" , $value = null, $additional=null)
{
	echo '<div class="form-group">';
        
	echo '<label for="'.$name.'">'.$label.'</label><br>';

	echo '<input ';
	if($type != "checkbox"){ echo 'class="form-control"'; }
	echo 'type="'.$type.'" name="'.$name.'" id="'.$name.'"'.$additional.'';
	
	if($value !== null)
	{
		if($type != "checkbox")
		{
			echo ' value="'. $value. '"';
		}
		else
		if($value)
		{
			echo ' checked';
		}
	}
	
	echo '>';
	echo '</div>';
}

function AdminNavBarContent($pic, $href, $name)
{
	echo '<li><img src="icons/'.$pic.'" style="height: 50px;"><a href="?func='.$href.'">'.$name.'</a></li>';
	
}

function CreateSelect($label, $name, $options, $value = null)
{
	echo '<div class="form-group">';
	
	echo '<label for="'.$name.'">'.$label.'</label><br>';
	echo '<select class="form-control" name="'.$name.'" id="'.$name.'">';
	
	foreach($options as $val => $text)
	{
		echo '<option value="'. $val .'"';
		if($value !== null && $value == $val){ echo ' selected'; }
		echo '>'. $text .'</option>';
	}
	
	echo '</select>';
	echo '</div>';
}

function LoginHandler()
{

	if(!isset($_SESSION['login']))
	{

		$_SESSION['login'] = false;
	}
	if(isset($_POST['loginSend']))
	{
	    $username = $_POST['user'];
	    $password = $_POST['pass'];
	    $data = DbQuery("SELECT * FROM ote__users where username='$username' and password = '$password'");
	    foreach($data as $login){
            if( $login['username']== $username &&  $login['password']==$password)
            {
                $_SESSION['login'] = true;
            }
        }
	}
	else

	if(GetFunc() == "logout")
	{

		$_SESSION['login'] = false;
	}
}

function GetFunc()
{

	$func = "articlelist";
	
	if(isset($_GET['func']))
	{
		$func = $_GET['func'];
	}
    return $func;
}