<?php session_start();
require_once('connectiondb.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Thakurdwara Hotel - Luxury Hotel in Bardiya</title>
  <meta name="Author" >
  <meta description="Thakurdwara Hotel is a newly luxury establishment located in Bardiya. This  luxury hotel offers a wide range of services to its guests.">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,600;1,400&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <div class="navbarPerso">
        <div class="logo-navbar">
          
         
        </div>
        <div class="menuList">
          
          
            
          <nav class="navbar">
            <form class="container-fluid justify-content-start">
              <button class="blue-button" type="button" onclick="window.location.href='index.php'"><li class="fa fa-bars">MENU</li> </button>
              <?php 
            
              if(isset($_SESSION['loggedIn'] ) )
              { 
                
                $username = $_SESSION['username'];
                $getAdmin = mysqli_query($conn,"SELECT role FROM users WHERE username='$username'");
                $user = mysqli_fetch_assoc($getAdmin);
                if ($user['role'] == '1') {
                  ?>
                <button class="blue-button" type="button" onclick="window.location.href='dashHome.php'">Dashboard</button>
                <?php
            }
                ?>
                
                <button class="blue-button" type="button" onclick="window.location.href='logout.php'">Log Out</button>
                <button class="blue-button" type="button" > <i class="fa fa-user"></i>
                    <?php echo $username; ?></button>

                
              <?php }else{ ?>
                <button class="blue-button" type="button" onclick="window.location.href='login.html'">LogIn</button>
              <button class="blue-button" type="button" onclick="window.location.href='signup.html'">Register</button>
             <?php }
              ?>
              
            </form>
          </nav>
          
         
          
        </div>
      </div>
    <!-- Display mobile -->
    <div class="navbarPersoSmall">

    </div>
    <!-- Display mobile -->

    <nav class="slideBarMenu">

    </nav>


  <div class="banner">
    <div class="containerBanner">
      
      <h3>Discover our range of <strong>high-end</strong> hotel services. <br>Our expertise at your service for your well-being with:</h3>

      <div class="new">
      <ul class="bannerList">
        <li><a href="#roomService">ROOMS</a></li>
        <li><a href="#restaurantService">Restaurant-Service</a></li>
        <li><a href="#nearby">Near-By</a></li>
        
      </ul>
      
    </div>
    
    </div>
    <div id="myCarousel" class="carouselslide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="item active">
          <img src="img/1.jpg" alt="Luxury room" class="imgCarousel">
        </div>

        <div class="item">
          <img src="img/3.jpg" alt="Restaurant" class="imgCarousel">
        </div>
        
      </div>
    </div>
    
  </div>

    <!-- Display mobile -->

  <div class="bannerDisplaySmall">
    <div class="container verticalMiddle">
      <div class="cardBanner">
        <div class="logo"> <strong>Thakurdwara Guest House</strong> 
        <a href="index.html">
          
        </a>
        </div>
        <p>luxury hotel in Thakurdwara</p>
      </div>
    </div>
  </div>
  
  
 

  

</header>
    <!-- Display mobile -->
<main>
  <div class="container">
    <section id="aboutUs">
      <article id="firstParaRenew">
        <div class="row">
          <div class="col-xs-12 col-sm-6">
            <h3>Renewal in Thakurbaba</h3>
            <hr class="trait">
            <p style="font-weight: bold; font-size: large;" > <i style="font-size: xx-large; color:blue; " >W</i>ELCOME <br> Greetings from Thakurdwara GuestHouse, where luxury and warmth converge to create an unforgettable experience in the heart of Bardiya,
                 Host your special events, meetings, or weddings in our versatile and well-equipped event spaces. Our professional team is dedicated to ensuring every detail is perfected, creating memorable experiences for you and your guests.</p>
            </div>
            <div class="col-xs-12 col-sm-6">
            <video width="640" height="360" controls>
    <source src="img/SampleVideo_1280x720_1mb.mp4" type="video/mp4">
    
</video>
            </div>
          </div>
      </article>
      <hr>
      <article id="secondParaRenew">
        <div class="row">
          <div class="col-xs-12 col-sm-6">
            
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d274089.1634112767!2d81.25018619414627!3d28.449979555019357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDAyLTI2JzA0LjciTiA4McKwMTUnMDEuNyJF!5e0!3m2!1sen!2sus!4v1634475201545!5m2!1sen!2sus" width="100%" height="300" frameborder="0" style="border:5px solid #F3C466; margin:2em 0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>



          </div>
          <div class="col-xs-12 col-sm-6">
            <h3>Access Map</h3>
            <hr class="trait">
            <p>In the Heart of Bardiya National park,easily accessible and close to monuments</p>
            </div>
          </div>
      </article>
    </section>
    <hr>
    <section id="roomService">
      <h2>Our Rooms</h2>
      <p> A selection of varied rooms according to your budget, but always in comfort and luxury.</p>
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4">
          <a href="#" style="text-decoration: none">
            <div class="card-room">
              <img src="img/classique.jpg" alt="Classic room">
              <div class="card-room-infos">
                <div>
                  <h2>Classic Room</h2>
                  <p>Luxury at a lower price</p>
                </div>
                <h4 class="card-room-pricing">from Rs 1400</h2>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4">
          <a href="#" style="text-decoration: none">
            <div class="card-room">
              <img src="img/confort.jpg" alt="Comfort room">
              <div class="card-room-infos">
                  <div>
                    <h2>Comfort Room</h2>
                    <p>Cozy Queen-size bed</p>
                  </div>
                <h4 class="card-room-pricing">from 2500</h2>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4">
          <a href="#" style="text-decoration: none">
            <div class="card-room">
              <img src="img/deluxe.gif" alt="Deluxe room">
              <div class="card-room-infos">
                  <div>
                    <h2>Deluxe Room</h2>
                    <p>Double Kingsize bed</p>
                  </div>
                <h4 class="card-room-pricing">from 5000</h2>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4">
          <a href="#" style="text-decoration: none">
            <div class="card-room">
              <img src="img/suite.jpg">
              <div class="card-room-infos">
                  <div>
                    <h2>Suite</h2>
                    <p>A 5-star studio</p>
                  </div>
                <h4 class="card-room-pricing">from 10000</h2>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4">
            <a href="#" style="text-decoration: none">
              <div class="card-room">
                <img src="img/suite1.jpg" alt="Suite room">
                <div class="card-room-infos">
                    <div>
                      <h2>Suite</h2>
                      <p>A 5-star studio</p>
                    </div>
                  <h4 class="card-room-pricing">from 10000</h2>
                </div>
              </div>
            </a>
          </div>
      </div>
      <div >
      <button id="button">Booking</button>
      <div id="bookingForm" style="display: none;">
        <form action="booking.php" method="post" enctype="multipart/form-data">
          <input type="text" name="roomtype" placeholder="Roomname" required>
          <label for="photo">Insert your Picture:</label>
          <input type="file" id="photo" name="photo" accept="image/*" >

        <label for="check-in-date">Check-In Date:</label>
        <input type="date" id="check-in-date" name="check_in_date">
        <br>
        <label for="check-out-date">Check-Out Date:</label>
        <input type="date" id="check-out-date" name="check_out_date">
        <br>
        
        <button id="submitBooking" type="submit" name='bookNow'>Submit Booking</button>
      </form>
      </div>
    </div>

    </section>
    <hr>
    <hr>
    <section id="restaurantService">
      <h2>Our Restaurant</h2>
      <h4>A gastronomic Restaurant with a starred <strong>Chefs</strong></h4>
      <h4>3 different dish menus according to the day:</h4>
      <ul>
        <li><h4>-Morning Menu !!</h4></li>
        <li><h4>-Lunch Menu  !! </h4></li>
        <li><h4>-Evening Menu !!</h4></li>
      </ul>
      <div id="slider" >
        <figure>
          <img src="img/cuisine3.jpg" alt="">
          <img src="img/cuisine1.jpg" alt="">
          <img src="img/cuisine2.jpg" alt="">
          <img src="img/cuisine4.jpg" alt="">
        
        </figure>
      </div>
      <h4><a href="restaurant.html">More details on our menus</a></h4>

    </section>
    <section id="nearby">
      <br>
      <br>
        <h1 style="text-decoration: underline;" >  Things to do Nearby: </h1>
        <hr>
        <br>
        <p style="font-weight: 700; font-size: large; " > Find <strong>inspiration</strong> for your next adventure, whether trekking through the jungle with an elephant or trekking through the hills . Let your imagination run wild.</p>
    </section>
    <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
    
            <a href="#" style="text-decoration: none">
              <div class="card-room">
                <img src="img/Tigers-in-Bardia.jpg" alt="">
                <div class="card-room-infos">
                    <div>
                      <h2> <strong>TIGER Tracking IN Bardiya Natoinal Park</strong></h2>
                      <p>Discovering the Wonders of Bardiya National Park: Tracking Tigers Ethically Nestled in the heart of Nepal, Bardiya National Park stands as a sanctuary for diverse wildlife, including the elusive and majestic Bengal tigers</p>
                    </div>
                 
                </div>
              </div>
            </a>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
    
            <a href="#" style="text-decoration: none">
              <div class="card-room">
                <img src="img/elephant.jpeg" alt="">
                <div class="card-room-infos">
                    <div>
                      <h2> <strong>ELEPHANT SAFARI</strong></h2>
                      <p>The elephant is the world's largest land mammal and also one of the most intelligent, so it is a wonderful experience to ride one in its natural environment. Elephants take you to those regions of the park, which are inaccessible on foot and can bring you very close to large mammals, such as rhinos, without disturbing them. The longer you spend on elephant back, the better you chances of observing animals, so on a 2-3 hour ride, you are virtually guaranteed to discover wildlife at close hand.</p>
                    </div>
                 
                </div>
              </div>
            </a>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
    
            <a href="#" style="text-decoration: none">
              <div class="card-room">
                <img src="img/junglewalk.jpg" alt="">
                <div class="card-room-infos">
                    <div>
                      <h2> <strong>JUNGLE WALK</strong></h2>
                      <p>Bardia national park is one of the most diverse in Nepal for flora and fauna and a walk in the jungle here is one of the best way to experience it first hand. Our leisurely, guided, 3-5 hour walk begins in the cool, early morning, as this is the best time to view wildlife. It may be extended to longer, for those who wish. Remember that this is not a zoo, so seeing animals will depend upon the time of year you visit, the weather and your luck. Of course, the experience of our guides will greatly increase your chances of seeing animal</p>
                    </div>
                 
                </div>
              </div>
            </a>
          </div>
   </div>
    
  </div>
</main>

<footer>
  <div class="footer">
    
    <p class="address"> Thakurdwara guest house, thakurbaba-9, Bardiya</p>
    <div class="footer-links">
      <a href="tel:9848250915"><i class="fas fa-phone-square"></i></i></a>
      <a href="mailto:.com"><i class="fas fa-envelope"></i></a>
    </div>
    <div class="footer-links">
      <a href="#"><i class="fab fa-instagram"></i></a>
      <a href="https://www.facebook.com/netraraj.acharya.1"><i class="fab fa-facebook"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
    </div>
    <div class="copyright">
      <p>&copy;2020 Guest House - Contact:+977 98123447819 - Terms and Conditions - Legal Notices - </p>
    </div>
  </div>
</footer>
<script src="indexscript.js"></script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/7555007718.js" crossorigin="anonymous"></script>

</body>
</html>