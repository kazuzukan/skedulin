    <?php
// Create connection
$conn = new mysqli('localhost','root','', 'skedulindb');


        $username = $this->session->userdata("name");
        $query = "SELECT * FROM person WHERE Person_nama='$username'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        $display = $row['displayname'];
        $Person_Id = $row['Person_Id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, intial-scale=1">
	
	<title>Skedulin</title>
	
	<!-- icon on title -->
    <link rel="shorcut icon" href="<?php echo base_url() ?>assets/img/HomePage/Logo.png">
    
    <!-- google fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i">
    
    <!-- bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap/bootstrap.min.css">
    
    <!-- style CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/animate/animate.css">
</head>        
<body>
	
	<div class="home">
	    <div class="row">
            <div class="profile-pic-container col-2 col-sm-1 text-center">
                <img class="profile-pic " src="<?php echo base_url() ?>assets/img/HomePage/Component%204.png" alt="" onclick="openHome()">
                
                <a class="" href="<?php echo base_url('index.php/Home') ?>">Home</a>
            </div>
            <div class="name-container col-1">
            	<h5><?php echo $display;?></h5>
            	<a href="<?php echo base_url('index.php/login/logout'); ?>">Logout</a>
            </div>
	        <div class="col-6 col-sm-8 text-center">
                <img class="home-title" src="<?php echo base_url() ?>assets/img/HomePage/Logo.png" alt="">
                <img class="home-title" src="<?php echo base_url() ?>assets/img/HomePage/Header.png" alt="">
            </div>
            <div class="col-1"></div>
            <div class="notif-button-container col-2 col-sm-1">
	            <img class="notification-button" src="<?php echo base_url() ?>assets/img/HomePage/Component%203.png" alt="">
	        </div>
	   </div>
	   
        <div class="home-inner row">
          
           <div class="home-side-container col-7 col-md-2 col-sm-3">
              
               <div class="home-side-bar1 row wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                   <img class="icon-newevent" src="<?php echo base_url() ?>assets/img/HomePage/icon-newevent.png" alt="" id="newEvent" >
               </div>
               
               <div class="home-side-bar row wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="1.3s">
                   <img class="icon-friends" src="<?php echo base_url() ?>assets/img/HomePage/icon-friends.png" alt="" onclick="openFriends()">
               </div>
               
               <div class="home-side-bar row wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="1.7s">
                   <img class="icon-myschedule" src="<?php echo base_url() ?>assets/img/HomePage/icon-myschedule.png" alt="" onclick="openMySchedule()">
               </div>
           </div>

           <div class="main-text-container text-center col-12 col-md-8 col-sm-6 row justify-content-center"> 

            <form action="<?php echo base_url('index.php/register/editUser/' .$user->Person_Id); ?>" class="reg-content" method="post">
              <div class="content-box row">
                <div class="img-box col-2 col-sm-1">
                <img style="width: 35px; height: 35px;"class="img-icon" src="<?php echo base_url() ?>assets/img/LoginPage/name.png">  
              </div>
              <input class="col-8 col-sm-5" type="hidden" name="id" value="<?php echo $user->Person_Id ?>">
           <p> Name : <input type="text" id="Regn-name" name="upnama" placeholder="name" value="<?php echo $user->displayname ?>"></p>

          </div>
          <div class="content-box row">
              <div class="img-box col-2 col-sm-1">
                <img class="img-icon" src="<?php echo base_url() ?>assets/img/LoginPage/person-icon.png">  
              </div>
           <p> Username : <input type="text" id="Regn-username" name="upuser" placeholder="username"  value="<?php echo $user->Person_nama ?>" readonly> </p>
                
          </div>
          <div style="margin-bottom: 10px;"class="content-box row">
            <div class="img-box col-2 col-sm-1">
                          <img class="img-icon" src="<?php echo base_url() ?>assets/img/LoginPage/img_131108.png">  
                        </div>
                      <p>Password : <input type="password" id="Regn-passwd" name="uppass" placeholder="password" value="<?php echo $user->password ?>"> </p>
                          
          </div>
            

            <!-- input -->
 
              <div class="col-2 col-md-4 col-sm-4"> </div>
              <div class=" col-8 col-sm-6">
                <input class = "button" type="submit" value="Edit "> 
              </div>

            </form>
           </div>
           
           <div class="col-8 col-md-2 col-sm-3"></div>
           
        </div>
    </div>


  <!-- modal for Add New Event -->
	 <!-- the modal -->
  <div id="myModal" class="modal">
    <div>
      <div class="row">
        <div class=" col-8 col-md-3"> </div>
        <div class=" col-8 col-md-6">
          <!-- Modal Content -->
          <div class="modal-content"> 
          <!-- close modal -->
          <span class="close">&times;</span>
          <div class="inside-modal">
                        <center>
            <h4> Create Your Schedule <br> </h4>  
            <!-- form 1 -->
            
            <form class="reg-content" method="post" action="<?php echo base_url('index.php/Home/addEvent'); ?>" >
                        <p>Event : </p> <input type="text"  name="Event_nama" placeholder="Name Of Event">
                        <p>Date :</p> <input type="date" name="Event_tanggal" placeholder="Date">
                        <div class="">
                        <p>Time : </p>  <input type="time" name="Event_start" placeholder="Start"> To 
                        <input type="time" name="Event_stop" placeholder="stop">
                        </div>

                        <input type="submit" class="button" value="Create!">
            </form>
            <!-- <button class="button"> Create! </button>  -->
            </center>
                    </div>
                
        </div>

        <div class=" col-8 col-md-3"> </div>
      </div>
      </div>
    </div>
  </div>

	<!-- JQuery -->
    <script src="<?php echo base_url() ?>assets/js/jquery.js"></script>
    
    <!-- bootstrap JS -->
    <script src="<?php echo base_url() ?>assets/js/bootstrap/bootstrap.min.js"></script>
    
    <!-- wow JS -->
    <script src="<?php echo base_url() ?>assets/js/wow/wow.min.js"></script>

    <!-- custom JS -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/custom.js"></script>

    <!-- modal script  -->
	<script>
		// get modal
		var modal = document.getElementById('myModal');
		//get open modal
		var btn = document.getElementById("newEvent");
		//get span element that close
		var span = document.getElementsByClassName("close")[0];
		// open modal
		btn.onclick = function() {
   			 modal.style.display = "block";
		}
		//To close the modal
		span.onclick = function(){
			modal.style.display = "none";
		}

		//click anywhere close moda
		window.onclick = function(event){
			if (event.target == modal){
				modal.style.display = "none";
			}
		}

    //Open Myschedule Page
    function openMySchedule(){
      window.location.href = "<?php echo base_url('index.php/MySchedule/index/'.$Person_Id); ?>";
    }

    //Open FriendsList Page
    function openFriends(){
      window.location.href = "<?php echo base_url('index.php/Friends'); ?>";
    }

   //Open Home Page
    function openHome() {
      window.location.href = "<?php echo base_url('index.php/Home') ?>";
    }
        
	</script>

</body>
</html>