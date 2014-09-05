<!DOCTYPE HTML>

<html>
	<head>
		<title>Philadelphia Game Lab</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.poptrox.min.js"></script>
		<script src="js/jquery.scrolly.min.js"></script>
		<script src="js/jquery.scrollgress.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>

		<?php
			$mysqli = new mysqli("localhost", "root", "", "pgl");
			/* check connection */
			if ($mysqli->connect_errno) {
			  printf("Connect failed: %s\n", $mysqli->connect_error);
			  exit();
			}
			$query = "SELECT * FROM content";
			if ($result = $mysqli->query($query)) {
			  /* fetch associative array */
			  while ($row = $result->fetch_assoc()) {
			   	$content[$row['field_name']] = $row['field_value'];
			  }
			  /* free result set */
			  $result->free();
			}
		?>

		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
			<link rel="stylesheet" href="css/style-normal.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
		<link rel="icon" href="images/favicon.png" type="image/png"/>
	</head>

	<body>

		<!-- Header -->
		<header id="header">
			<!-- Logo -->
			<h1 id="logo">Philadelphia Game Lab</h1>
			<!-- Nav -->
			<nav id="nav">
				<ul>
					<li><a href="#home">Home</a></li>
					<li><a href="#projects">Projects</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#departments">Departments</a></li>
					<li><a href="#community">Community</a></li>
				</ul>
			</nav>
		</header>

		<!-- Home -->
		<section id="home" class="main style1 dark fullscreen">
			<div class="content container small">
				<header>
					<h2 style="color:black"> <?php echo $content['home_header']; ?> </h2>
				</header>
				<p style="color:black"> <?php echo $content['home_intro']; ?> </p>
				<footer>
					<a href="#projects" class="button style2 down">More</a>
				</footer>
			</div>
		</section>

		<!-- Projects -->
		<section id="projects" class="main style3 primary">
			<div class="content container">
				<header>
					<h2> <?php echo $content['project_header']; ?> </h2>
					<p> <?php echo $content['project_intro']; ?> </p>
				</header>
				<!-- Lightbox Gallery  -->
				<div class="container small gallery">

					<?php
						$query = "SELECT * FROM projects";
						if ($result = $mysqli->query($query)) {
					    /* fetch associative array */
							$count = 0;
					    while ($row = $result->fetch_assoc()) {
								if($count%2 == 0) {
									echo "<div class='row flush images'>";
								}
								echo "<div class='6u'><a href='php/project.php?";
								echo 
									"projectTitle=".$row['project_title'].
									"&projectTagline=".$row['project_tagline'].
									"&projectBody=".$row['project_body'].
									"&projectLink=".$row['project_link']."'";
								echo "data-poptrox='ajax,600x400' class='image fit from-left' >";
								echo "<img src='css/images/new/lux.png' title='click to exit' alt='' /></a>";
								echo "</div>";
								if($count%2 == 1) {
									echo "<div class='row flush images'>";
								}
								$count++;
					    }
					    /* free result set */
					    $result->free();
						}
					?>
					
				</div>
			</div>
		</section>

		<!-- About -->
		<section id="about" class="main style2 right dark fullscreen">
			<div class="content box style2 gallery">
				<header>
					<h2> <?php echo $content['about_header']; ?> </h2>
				</header>
				<p> <?php echo $content['about_intro']; ?> </p>
				<a href="php/about.php?
					<?php echo 
					"oneTitle=".$content['about_main_sectionOne_title'].
					"&oneBody=".$content['about_main_sectionOne_body'].
					"&twoTitle=".$content['about_main_sectionTwo_title'].
					"&twoBody=".$content['about_main_sectionTwo_body'].
					"&threeTitle=".$content['about_main_sectionThree_title'].
					"&threeBody=".$content['about_main_sectionThree_body']; ?>" 
					data-poptrox="ajax,950x450" style="color:black" class="fit from-left">Read More</a>
			</div>
			<a href="#pgs" class="button style2 down anchored">Next</a>
		</section>
		
		<!-- Pennsylvania Game Studio -->
		<section id="pgs" class="main style2 left dark fullscreen">
			<div class="content box style2 gallery">
				<header>
					<h2> <?php echo $content['pgs_header']; ?> </h2>
				</header>
				<p> <?php echo $content['pgs_intro']; ?> </p>
				<a href="php/pgs.php?
					<?php echo 
					"oneTitle=".$content['pgs_main_sectionOne_title'].
					"&oneBody=".$content['pgs_main_sectionOne_body'].
					"&twoTitle=".$content['pgs_main_sectionTwo_title'].
					"&twoBody=".$content['pgs_main_sectionTwo_body'].
					"&threeTitle=".$content['pgs_main_sectionThree_title'].
					"&threeBody=".$content['pgs_main_sectionThree_body']; ?>" 
					data-poptrox="ajax,950x450" style="color:black" class="fit from-left">Read More</a>
			</div>
			<a href="#departments" class="button style2 down anchored">Next</a>
		</section>

		<!-- Departments -->
		<section id="departments" class="main style3 primary">
			<div class="content container">
				<header>
					<h2><?php echo $content['dept_header']; ?> </h2>
					<p> <?php echo $content['dept_intro']; ?> </p>
				</header>

				<div class="container small gallery">
					<div>
						<a href="php/dept.php?
							<?php echo
							"oneTitle=".$content['dept_sectionOne_main_title'].
							"&oneBody=".$content['dept_sectionOne_main_body']; ?>"
							data-poptrox="ajax,600x400"><font size="40" title="click to exit" alt="exit"> <?php echo $content['dept_sectionOne']; ?> </font></a>
					</div>
					<br>
					<div>
						<a href="php/dept.php?
							<?php echo
							"twoTitle=".$content['dept_sectionTwo_main_title'].
							"&twoBody=".$content['dept_sectionTwo_main_body']; ?>" 
						data-poptrox="ajax,600x400"><font size="40" title="click to exit" alt="exit"> <?php echo $content['dept_sectionTwo']; ?> </font></a>
					</div>
					<br>
					<div>
						<a href="php/dept.php?
							<?php echo
							"threeTitle=".$content['dept_sectionThree_main_title'].
							"&threeBody=".$content['dept_sectionThree_main_body']; ?>" 
						data-poptrox="ajax,600x400"><font size="40" title="click to exit" alt="exit"> <?php echo $content['dept_sectionThree']; ?> </font></a>
					</div>
					<br>
					<div>
						<a href="php/dept.php?
							<?php echo
							"fourTitle=".$content['dept_sectionFour_main_title'].
							"&fourBody=".$content['dept_sectionFour_main_body']; ?>" 
						data-poptrox="ajax,600x400"><font size="40" title="click to exit" alt="exit"> <?php echo $content['dept_sectionFour']; ?> </font></a>
					</div>
				</div>
			</div>
		</section>
		
		<!-- Community -->
		<section id="community" class="main style2 left dark fullscreen">
			<div class="content box style2 gallery">
				<header>
					<h2> <?php echo $content['community_header']; ?> </h2>
				</header>
				<p> <?php echo $content['community_intro']; ?> </p>
				<a href="pgs.php?text=
						<?php echo '<br/><b>Friends of the PGL</b><br><p>potentially you :)</p>'; ?>" 
						data-poptrox="ajax,950x450" style="color:black" class="fit from-right">Our Friends</a>
			</div>
			<a href="#contact" class="button style2 down anchored">Next</a>
		</section>

		
		<!-- Contact -->
		<section id="contact" class="main style3 secondary">
			<div class="content container">
				<header>
					<h2>Say hello.</h2>
					<p>Whatever the reason, don't hesitate to reach out!</p>
				</header>
				<div class="box container small">
					<!-- Contact Form -->
					<form method="post" action="#">
						<div class="row half">
							<div class="6u"><input type="text" name="name" placeholder="Name" /></div>
							<div class="6u"><input type="email" name="email" placeholder="Email" /></div>
						</div>
						<div class="row half">
							<div class="12u"><textarea name="message" placeholder="Message" rows="6"></textarea></div>
						</div>
						<div class="row">
							<div class="12u">
								<ul class="actions">
									<li><input type="submit" value="Send Message" /></li>
								</ul>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
			
		<!-- Footer -->
		<footer id="footer">
			<!-- Social Media Icons -->
			<ul class="actions">
				<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
				<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
				<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
				<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
			</ul>
			<!-- Menu -->
			<ul class="menu">
				<li>&copy; Philadelphia Game Lab 2014</li>
				<li>We are an approved 501c3 entity. Our EIN number: 45-3538298.</li>
			</ul>
		</footer>

	</body>
</html>





