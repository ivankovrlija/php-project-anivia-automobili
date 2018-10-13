<header class="header">
			<div class="akcije">
				<div class="buttons">
					<?php if(isset($_SESSION["user"])){ ?>
								<a href="profil.php" id="oglas">PROFIL</a>
								<a href="oglas.php" id="oglas">POSTAVI OGLAS</a>
                                <a href="pregled_oglasa.php" id="oglas">PREGLED OGLASA</a>
  								<a href="logout.php">ODJAVI SE</a>
					<?php }else{ ?>
  								<a href="login.php">PRIJAVI SE</a>
  								<a href="register.php">REGISTRUJ SE</a>
  								<a href="login.php" id="oglas">POSTAVI OGLAS</a>
					<?php } ?>
				</div>
			</div>
			<div class="logo">
				<a href="index.php"><img src="images/logo.jpg" alt="logo"></a>
			</div>
			<div class="nav">
                	<ul>
                		<li><a href="index.php">POCETNA</a></li>
                    	<li>
                    		<a href="#">PRETRAGA</a>
                    		<ul>
                    			<li>Novi oglasi u 24h</li>
                    			<li>Najtrazeniji modeli</li>
                    			<li>Najskuplji modeli</li>
                    			<li>Najjeftiniji modeli</li>
                    		</ul>
                    	</li>
                    	<li>
                    		<a href="#">OSIGURANJE</a>
							<ul>
								<li>Osiguranje o autoodgovornosti</li>
                    			<li>Kasko osiguranje</li>
                    			<li>Pomoc na putu</li>
							</ul>
                    	</li>
                    	<li>
                    		<a href="#">VESTI</a>
							<ul>
								<li>Aktuelno</li>
                    			<li>Opsti saveti</li>
                    			<li>Finansijski saveti</li>
                    			<li>Zanimljivosti</li>
							</ul>
                    	</li>
                    	<li>
                    		<a href="#">ZA KORISNIKE</a>
							<ul>
								<li>Pomoc kod odrzavanja vozila</li>
                    			<li>Oglasavanje putem banera?</li>
                    			<li>Pogodnosti oglasavanja</li>
							</ul>
                    	</li>
                    </ul>
			</div>
		</header>
