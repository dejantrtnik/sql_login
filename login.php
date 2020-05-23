<?php
	include_once 'db_conn.php';
	function check_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$username=check_input($_POST['username']);

		if (!preg_match("/^[a-zA-Z0-9_]*$/",$username))
		{
			$_SESSION['msg'] = "Uprabniško ime naj ne vsebuje presledka ali specialnih znakov!";
			header('location: index.php');
		}
		else
		{
			$fusername=$username;
			$password = check_input($_POST["password"]);
			$fpassword=sha1($password);
			$query=mysqli_query($conn,"SELECT * FROM `some_table` WHERE uporabnisko_ime='$fusername' AND geslo='$fpassword'");
			if(mysqli_num_rows($query)==0)
			{
				$_SESSION['msg'] = "Prijava neuspešna, poskušaj ponovno!";
				header('location: index.php');
			}
			else
			{
				$row=mysqli_fetch_array($query);
				if ($row['stevilo'] == 0)
				{
					$_SESSION['id']=$row['clanId'];
					?>
					<script>
						window.alert('Prijava uspešna, ADMIN VSTOP!');
						window.location.href='chat_rooms.php';
					</script>
					<?php
				}
				else
				{
					$_SESSION['id']=$row['clanId'];
					?>
					<script>
						window.alert('Prijava uspešna, Dobrodošel uporabnik!');
						window.location.href='chat_rooms_uporabnik.php';
					</script>
<?php
				}
			}
		}
	}
?>
