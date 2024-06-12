<!DOCTYPE html>

<html>
   <head>
     <meta charset="utf-8">
      <title>Telefonski imenik</title>
      <link rel="stylesheet" href="CSS/stil.css">
   </head>
   <body>
<center>
	<div class="navigacija">
		<a href="index.php">Imenik</a>
		<a href="uputstvo.html">Uputstvo</a>
		<a href="telefoni.html">Važni telefoni</a>
	</div>
</center>
   

<form method="post">

  <div id="forma">
      <label>Ime: </label><br>
		<input type="text" name="ime"> 
     <br>
      <label>Prezime: </label><br>
		<input type="text" name="prezime">
	  <br>
      <label>Adresa:</label><br>
		<input type="text" name="adresa">
	  <br>
	  <label>Mesto:</label><br>
		<select name="mesto">
			<option>Beograd</option>
			<option>Pančevo</option>
			<option>Sombor</option>
			<option>Subotica</option>
			<option>Kragujevac</option>
			<option>Niš</option>
			<option>Čačak</option>
		</select>
		<br>
	  <label>Telefon</label><br>
		<input type="text" name="telefon">
		<br>
	  <label>Email:</label><br>
		<input type="email" name="email">
		<br>

      <input type="submit" name="dugme" value="Pretraži">
</div>

</form>
  <?php
       if(isset($_POST["dugme"])){

           $datoteka=fopen("imenik.txt","r") or die("Pokušajte ponovo!");

           echo "<table>
					<tr>
						<td>ŠIFRA</td>
						<td>IME</td>
						<td>PREZIME</td>
						<td>ADRESA</td>
						<td>TELEFON</td>
						<td>MESTO</td>
						<td>EMAIL</td>
					</tr>";
           while (!feof($datoteka)) {
           $red = fgets($datoteka);
           $niz = explode("|", $red);
           $sifra=$niz[0];
		   $ime=$niz[1];
		   $prezime=$niz[2];
		   $adresa=$niz[3];
		   $mesto=$niz[4];
		   $telefon=$niz[5];
		   $email=$niz[6];
			$greska=0;
					if($_POST["ime"]=="" || $_POST["prezime"]=="" || $_POST["mesto"]=="" ){
						
						$greska=1;
					}
					
                       if($_POST["ime"] == $ime && $_POST["prezime"]==$prezime && $_POST["mesto"]==$mesto){
                          echo "<tr>
								<td>".$sifra."</td>
								<td>".$ime."</td>
								<td>".$prezime."</td>
								<td>".$adresa."</td>
								<td>".$telefon."</td>
								<td>".$mesto."</td>
								<td>".$email."</td>
								</tr>";
                       }
                   }

                  echo "</table>";
				  if($greska==1){
						echo "<p>Morate popuniti polja za ime, prezime i mesto</p>";
					}
        }
	   
   ?>
   </body>
</html>