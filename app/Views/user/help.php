<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Frequently Asked Questions</title>
        <link rel="stylesheet" href="css\help.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
        <style>
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
.container{
    margin:0 40px;
    max-width:600px;
    display:flex;
    flex-direction:column;
    gap:20px
}
.container h1{
    color:#333;
}
.container .tab{
    position:relative;
    background:#fff;
    padding:0, 20px 20px;
    box-shadow:0 15px 25px rgba(0,0,0,0.05);
    border-radius:5px;
    overflow:hidden;
}
.container .tab input{
    appearance:none;
}
.container .tab label{
    display:flex;
    align-items:center;
    cursor:pointer;
}
.container .tab label::after{
    content:'+';
    position:absolute;
    right:20px;
    font-size:2em;
    color:rgba(0,0,0,0.1);
    transition:transform 1s;
}
.container .tab:hover label::after{
    color:#333;
}
.container .tab input:checked label::after{
    transform:rotate(135deg);
}
.container .tab label h2{
    width:40px;
    height:40px;
    background:#333;
    display:flex;
    justify-content:center;
    align-items:center;
    color:#fff;
    font-size:1.25em;
    border-radius:5px;
    margin-right:10px;
}
.container .tab:nth-child(2) label h2{
    background:linear-gradient(135deg,#70f570,#49c628);
}
.container .tab:nth-child(3) label h2{
    background:linear-gradient(135deg,#3c8ce7,#00eaff);
}
.container .tab:nth-child(4) label h2{
    background:linear-gradient(135deg,#ff96f9,#c32bac);
}
.container .tab:nth-child(5) label h2{
    background:linear-gradient(135deg,#fd6e6a,#ffc600);
}
.container .tab label h3{
    position:relative;
    font-weight:500;
    color:#333;
    z-index:10;
}
.container .tab .content{
    max-height:0;
    transition:1s;
    overflow:hidden;
}
.container .tab input:checked ~ .content{
    max-height:100vh;
}
.container .tab .content p{
    position:relative;
    padding:10px;
    color:#333;
    z-index:10;
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
       <a href="#">
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
    <div class="container">
        <h1>Frequently Asked Questions?</h1>
        <div class="tab">
            <input type="radio" name="acc" id="acc1">
            <label for="acc1">
                <h2>01</h2>
                <h3>What is PickMe?</h3>
            </label>
            <div class="content"><p> It is ann e-voting system, also known as electronic voting system that allows eligible voters to cast their votes electronically, typically through computers.</p></div>

        </div>
            
            <div class="tab">
                <input type="radio" name="acc" id="acc2">
                <label for="acc2">
                <h2>02</h2>
                <h3>Can my vote be traced back to me in this system?</h3>
                </label>
                <div class="content"><p>No, PickMe is designed to ensure voter privacy and anonymity. The system separates voter identification from the cast vote, using encryption and anonymization techniques. This ensures that votes cannot be linked back to individual voters.</p></div>
    
            </div>
            <div class="tab">
                <input type="radio" name="acc" id="acc3">
                <label for="acc3">
                <h2>03</h2>
                <h3> Is e-voting secure?</h3>
                </label>
                <div class="content"><p>Yes, e-voting systems employ various security measures to ensure the integrity and confidentiality of the voting process. This includes encryption techniques, authentication mechanisms, and auditing procedures. Additionally, regular security audits and testing are conducted to identify and address vulnerabilities.</p></div>
    
            </div>
            <div class="tab">
                <input type="radio" name="acc" id="acc4">
                <label for="acc4">
                <h2>04</h2>
                <h3>can i vote more than once?</h3>
                </label>
                <div class="content"><p>no once you have cast your vote and you can view the results you cannot go back to the website .</p></div>
    
            </div>
    </div>
</body>
</html>