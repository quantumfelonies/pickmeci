<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Voters Dashboard</title>
  <link rel="stylesheet" href="voter.css" />
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

  <style>
    .team-info {
      text-align: center;
    }

    .single-team {
      display: inline-block;
      width: 200px;
      margin: 10px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
*{
  margin: 0;
  padding: 0;
  border: none;
  outline: none;
  text-decoration: none;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body{
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;
    background:#f5f8ff;
}


nav{
    background: white;
    position:absolute;
    top:0;
    bottom:0;
    height:100%;
    left:0;
    background:#fff;
    width:90px;
    overflow:hidden;
    transition:width 0.2s linear;
    box-shadow:0 20px 35px rgba(0,0,0,0.1)
  }
  
  /*-----------------------------------Sidebar---------------------------------------------*/
  .nav{
      position:absolute;
      top:0;
      bottom:0;
      height:100%;
      left:0;
      background:#fff;
      width:90px;
      overflow:hidden;
      transition:width 0.2s linear;
      box-shadow:0 20px 35px rgba(0,0,0,0.1)
  }
  a{
      position:relative;
      color:rgb(85,83,83);
      font-size:14px;
      display:table;
      width:300px;
      padding:10px;
  }
  .fas{
      position:relative;
      width:70px;
      height:40px;
      top:14px;
      font-size:20px;
      text-align:center;
  }
  .nav-item{
      position:relative;
      top:12px;
      margin-left:10px;
  }
  a:hover{
      background:#eee;
  }
  nav:hover{
      width:280px;
      transition: all 0.5s ease;
  }
  .logout{
     position:absolute;
     bottom:0 
  }

  /*our team css*/
  .team.area {
    background-color: #f7f7f7;
    padding: 80px 0;
  }
  
  .section-title-text-container {
    text-align: center;
    margin-bottom: 30px;
  }
  
  .section-title-text-container h2 {
    text-transform: uppercase;
    font-size: 36px;
    margin-bottom: 10px;
  }
  
  .section-title-text-container p {
    text-transform: uppercase;
    font-weight: bold;
    font-size: 14px;
    margin-bottom: 30px;
  }
  
  .row {
    display: flex;
    justify-content: center;
  }
  
  .col-md-4 {
    flex-basis: 33.33%;
    padding: 0 15px;
    box-sizing: border-box;
  }
  
  .single-team {
    position: relative;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    background-color: #ffffff;
    padding-bottom: 20px;
    margin-bottom: 30px;
  }
  
  .team-img img {
    width: 20%;
    height: auto;
    display: block;
    transition: transform 0.3s ease;
  }
  
  .single-team:hover .team-img img {
    transform: scale(1.1);
  }
  
  .team-info {
    padding: 20px;
    text-align: center;
  }
  
  .team-info h3 {
    text-transform: uppercase;
    font-size: 20px;
    margin-bottom: 10px;
  }
  
  .team-info p {
    color: #888888;
    font-size: 14px;
    margin-bottom: 10px;
  }
  
  .team-text {
    color: #333333;
    padding: 0 20px;
    margin-bottom: 20px;
    text-align: center;
  }
  </style>
</head>
<body>
  
  <nav>
   
      <ul>
        <li>
          
          <a href="voter">
            <i class="fas fa-home"></i>
            <span class="nav-item">Home</span>
          </a>
        </li>
        <li>
          <a href="profile">
            <i class="fas fa-user"></i>
            <span class="nav-item">Candidate Information</span>
          </a>
        </li>
        <li>
          <a href="year">
            <i class="fas fa-chart-bar"></i>
            <span class="nav-item">Vote</span>
          </a>
        </li>
        <li>
          <a href="help">
            <i class="fas fa-question-circle"></i>
            <span class="nav-item">Help</span>
          </a>
        </li>
        <li>
          <a href="#" class="logout">
            <i class="fas fa-sign-out-alt"></i>
            <span class="nav-item">Log out</span>
          </a>
        </li>
      </ul>
   
  </nav>
  
  <div class="team area">
  <div class="container">
    <div class="section-title-text-container">
      <h2>HELLO! WELCOME TO YOUR HOMEPAGE</h2>
      <p>Cast your vote in just three easy steps</p>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="single-team">
          <div class="team-img">
          <img src="https://static.vecteezy.com/system/resources/previews/002/458/772/original/navigate-location-icon-vector.jpg" alt="Team Member 1">
          </div>
          <div class="team-info">
            <h3>STEP 1</h3>
            <p>Navigate to the vote icon on the sidebar</p>
          </div>
          <p class="team-text">On the sidebar, locate the third symbol and click on it</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="single-team">
          <div class="team-img">
           <img src="data:image/png;base64,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" alt="Team Member 2">
          </div>
          <div class="team-info">
            <h3>STEP 2</h3>
            <p>Carefully analyze the candidates</p>
          </div>
          <p class="team-text">Go through the candidates list carefully and think about your vote</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="single-team">
          <div class="team-img">
            <img src="data:image/png;base64,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" alt="Team Member 3">

          </div>
          <div class="team-info">
            <h3>STEP 3</h3>
            <p>Cast your vote</p>
          </div>
          <p class="team-text">Click on the candidates you would like and submit your vote by clicking on the vote button</p>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>`