<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Frequently Asked Questions</title>
        <link rel="stylesheet" href="year.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

        <style>
            .container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background: #f5f8ff;
}

.h2_1 {
  text-align: center;
  margin-top: 30px;
}

.btn-special-2 {
  padding: 12px 24px;
  background-color: white;
  color: hsl(243, 80%, 62%);
  border-radius: 6px;
  border: 2px hsl(243, 80%, 62%) solid;
  transition: transform 250ms ease-in-out;
  margin-top: 50px;
}

.btn-special-2:hover {
  transform: scale(1.1);
}

.btn-special-2:active {
  transform: scale(0.9);
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


    </style>
    </head>
    
<body>
<div class="container">
        <div class="row">
            <div class="col-md-12">
            <h2 class="h2_1">VOTING FORM</h2>
            <a href="candidate"><button style="margin-top:50px;" class="btn-special-2">President </button></a>
            </div>
            <div class="col-md-12">
            <a href="2nd_cand.php"><button style="margin-top:60px;" class="btn-special-2">Financial Representative </button></a>
            </div>
            <div class="col-md-12">
            <a href="3rd_cand.php"><button style="margin-top:60px; " class="btn-special-2">Academic Representative </button></a>
            </div>
        </div>
    </div>

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
</body>
</html>