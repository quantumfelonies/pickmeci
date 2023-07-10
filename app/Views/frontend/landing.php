<html>
    <head>
		<meta charset="UTF-8">
		<!--<meta name="keywords" content="HTML, CSS">
		<meta name="author" content="QuantumF"> -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PickMe Voters Website</title>
        <link rel="stylesheet" href="<?= base_url('css/landing.css'); ?>">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    </head>

    <body> 
		<div class="banner">
			
				<div class="navbar">
					<div class='logo'>
						<a href="landing.php"><img src="logo.png" class="logo"></a>
					</div>
					
					<nav>
						<ul id='MenuItems'>
							<li><a href="login.php">login</a></li>
						</ul>
					</nav> 
				</div>
			
				<div class="row">
					<div class="column1">
					  <h1>
						Get involved in your school leadership! Your vote is your voice!
					  </h1>
					   <a href="http://localhost:8080/login2" class="button"> 
						   Get started </a>
					</div>
					<div class="column2">
					  <img class="fimage" src="colourvotes.jpg"/>
					</div>
				</div>
				
				<div class="row">
					<div class="column1">
						<img class="thumb" src="thumbsup.jpg"/>
					</div>
			
					<div class="column2">
						<div class="content">
							<div class="txt">
								<h1> For Candidates </h1>
								<p>Are you interested in running for student council? Be the catalyst of change:
                   Sign up for candidacy and shape a better future. Your voice matters, so seize 
                   the opportunity to lead, advocate, and make a lasting impact. </p>
                <a href= register.php class="button"> 
						   Sign up here! </a>
							</div>
						</div>
					</div>
				</div>
					
				
			<div class="footer">
				<div class="ftimg">
					<img src="logo.png" >
				</div>
				<br><br>
				<div class="media">
				  <p class="ftxt">For any enquiries, reach us at</p>
				  <ul class="pages">
					<li class="media"><a href="#" target="_blank" title="twitter"><i class="fa fa-twitter"></i></a></li>
					<li class="media"><a href="#" target="_blank" title="facebook"><i class="fa fa-facebook"></i></a></li>
					<li class="media"><a href="#" target="_blank" title="instagram"><i class="fa fa-instagram"></i></a></li>
					<li class="media"><a href="#" target="_blank" title="pinterest"><i class="fa fa-pinterest"></i></a></li>
				  </ul>
				</div>
			</div>
		</div>



    </body>
</html>