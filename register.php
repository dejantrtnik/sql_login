<!DOCTYPE html>
<html>
<body>
  <div class="">
      <div class=""> REGISTRACIJA </div>
  		<form method="POST" action="signup.php">               <!-- sprememba -->
    		<div>
    			<label>ime</label><br>
    			<input type="text" name="name" class="form-control" required>
    		</div><br>
    		<div>
    			<label>Uporabniško ime</label><br>
    			<input type="text" name="username" class="form-control" required>
    		</div><br>
    		<div>
    			<label>Geslo</label><br>
    			<input type="password" name="password" class="form-control" required>
    		</div>
  			<p></p>
  			<button type="submit" class="btn btn-primary">Potrdi</button> <a href="index.php"> Nazaj na Prijavo</a>
  		</form>
    </div>
</body>
</html>
