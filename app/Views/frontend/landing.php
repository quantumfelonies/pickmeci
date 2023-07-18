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
							<li><a href="auth/login">login</a></li>
						</ul>
					</nav> 
				</div>
			
				<div class="row">
					<div class="column1">
					  <h1>
						Get involved in your school leadership today! <br>
						 Your vote is your voice!
					  </h1>
					   <a href="auth/login" class="button"> 
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
								<h1> Want to know who's in the lead?</h1>
								<p>We have pride in our high security in the voting process. You can follow the results as they mill in here. </p>
                <a href= user/validation class="button"> 
						   View Results </a>
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
				  <p class="ftxt">For any enquiries, reach us at aelection269@gmail.com</p>
				  <ul class="pages">
					<li class="footerlink"><a href="frontend/help">Frequently Asked Questions</a></li>
					<li class="footerlink"><a href="admin/login"> Admin Login </a></li>
				  </ul>
				</div>
			</div>
		</div>



    </body>
</html>