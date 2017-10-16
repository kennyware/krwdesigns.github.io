<?php

	$msg = '';
	$msgClass = '';

	if(filter_has_var(INPUT_POST, 'Submit')){
		$name = htmlspecialchars($_POST['name']);
		$email = htmlspecialchars($_POST['email']);
		$message = htmlspecialchars($_POST['message']);

		if(!empty($name) && !empty($email) && !empty($message)){
			if(filter_var($email, FILTER_VALIDATE_EMAIL)){
				$toEmail = 'kennyware34@gmail.com';
				$subject = 'Contact Request From' .$name;
				$body = '<h2>Contact Request</h2>
					<h4>Name</h4><p>' .$name. '</p>
					<h4>Email</h4><p>' .$email. '</p>
					<h4>Message</h4><p>' .$message. '</p>';

				$headers = "MIME Version: 1.0" . "\r\n";
				$headers .= "Content-Type: text/html; charset: UTF-8" . "\r\n";
				$headers .= "From: " . $name . "<" . $email . ">" . "\r\n";

				if(mail($toEmail, $subject, $body, $headers)){
					//Email Sent
					$msg = 'Your email has been sent';
					$msgClass = 'alert-success';
				}
				else{
					$msg = 'Your email was not sent';
					$msgClass = 'alert-danger';
				}

			}
			else{
				$msg = 'Please use a valid email.';
				$msgClass = 'alert-danger';
			}

		}
		else{
			$msg = 'Please fill in all fields.';
			$msgClass = 'alert-danger';
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=7">
	<!--Import Google Icon Font-->
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Kenny Ware | Official Site</title>
</head>
<body>
	
		<header class="img-wrap">
			<button class="open-btn" href="#" onclick="openSideMenu()"><i class="fa fa-bars" aria-hidden="true"></i></button>
			<div class="container">
				<div class="branding">
					<h2>K</h2>
				</div>
				<nav class="navigation">
					<ul>
						<li><a class="action-link" href="#section-a">About Me</a></li>
						<li><a class="action-link" href="#section-b">Portfolio</a></li>
						<li><a class="action-link" href="#section-c">Contact</a></li>
					</ul>
				</nav>
			</div>
			
			<div class="clear"></div>

			<div id="intro">
				<div class="content">
					<p>Time Is Money So I Won't Waste Yours.</p>
					<a class="action-link" href="#section-a">Learn More</a>
				</div>
			</div>
		</header>
		<div class="divider"></div>

		<section id="section-a">
			<div class="container">
				<div class="header">
					<h1><strong>About Me</strong></h1>
				</div>
				<div class="img-wrapper">
					<img class="profile" src="img/profile-circle.png" alt="">
				</div>
				<div class="content">
					<p class="section">Hey there, are you looking for a web developer that is not only efficient but also effective? Well then look no further.</p><br>

					<p class="section">I love development because it's a challenge. There is always something new to learn and a problem to solve. Where some people quit when faced with a seemingly impossible task, I become motivated. Even when I'm frustrated to the point of pulling my hair out and banging my head on my desk, I can't help but keep trying to find a solution to whatever problem I'm facing. Do you want to know why? It's because after all my struggling and thinking, when I finally solve a problem or create something amazing, I'm overcome with a sense of accomplishment and I feel elated as I throw my hands up and yell, "Yes! Yes yes yes! I finally did it." This has become sort of an addiction that keeps me going.</p><br>

					<p class="section">I special in creating ecommerce sites, landing pages, and personal websites. I'm also continuing to learn new languages, frameworks, and other software to help me to become a better developer. I am very interested in improving my skills as a web developer and hope to one day transition into a full stack role. I have no problems working with a team and always try my best to get along with others and learn from my peers. My preference is to work in an environment condusive to growth and populated with friendly and capable employees. If you are interested in hiring me or would like to know more, then you can get in contact with me by completing the contact form found at the bottom of this page. I look forward to hearing from you.</p><br>
				</div>
			</div>
		</section>

		<div class="divider"></div>

		<section id="section-b">
			<div class="container">
				<div class="header">
					<h1><strong>Projects</strong></h1>
				</div>			
				<div class="content">
					<p class="section"></p>
				</div>
			</div>
		</section>

		<div class="divider"></div>

		<section id="section-c">
			<div class="container">
				<div class="header">
					<h1><strong>Contact</strong></h1>
				</div>
				<div class="content">
					<?php if($msg != '') : ?>
						<div class="<?php echo $msgClass; ?>"> <?php echo $msg; ?> </div>		
					<?php endif; ?>

					<form method="post">
						<div class="form-group">
						<label for="name">Name:</label><br>
						<input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
						</div>

						<div class="form-group">
						<label for="email">Email:</label><br>
						<input type="text" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
						</div>

						<div class="form-group">
						<label for="message">Message:</label><br>
						<textarea name="message" class="form-control"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
						</div>

						<button type="submit" name="Submit" class="submit-btn">Submit</button>
					</form>
				</div>
			</div>
		</section>
		
		<div class="divider"></div>
		
		<footer class="footer">
			<div class="container">
				<p>Made By Kenny Ware &copy; 2017</p>
			</div>
		</footer>

	<div id="side-menu" class="side-nav">
		<div class="">
			<!--Close button-->
			<a href="#" class="close-btn" onclick="closeSideMenu()">&times;</a>
			<ul>
				<li><a href="#">About Me</a></li>
				<li><a href="#">Portfolio</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
		</div>
	

		<script src="scripts/jquery.js"></script>
		<script type="text/javascript">
			function openSideMenu(){
				document.getElementById("side-menu").style.width = "250px";
				document.getElementById("main").style.marginLeft = "250px";
			}

			function closeSideMenu(){
				document.getElementById("side-menu").style.width = "0";
				document.getElementById("main").style.marginLeft = "0";
			}

			$(document).ready(function(){

				$('.action-link').click(function(){
					var hash = this.hash;
					//$('#hidden').show();
					$('html, body').animate({scrollTop:$(hash).offset().top}, 800);

				});

			});

		</script>
</body>
</html>