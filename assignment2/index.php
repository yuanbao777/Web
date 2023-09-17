<?php
session_start();

$server_name = "localhost";
$user_name = "root";
$password = "";
$database_name = "assignment2";

// Establish connection
$conn = new mysqli($server_name, $user_name, $password, $database_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM blog ORDER BY Time DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $latestBlog = $result->fetch_assoc();
} else {
    echo "No blog posts found.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>
<link rel="stylesheet" href="css/index.css">
<script src="js/index.js" defer></script>
</head>
<body>
<div class="container">
	<nav class="nav">
	  <div class="nav__logo"> <span>MY</span><span>TRAVEL</span><span>PLACES</span></div>
	  <div class="nav__links">
		<div class="nav__item active"><a href="index.php">Home</a></div>
		<div class="nav__item"><a href="blog.php">My Blog</a></div>
		<div class="nav__item"><a href="form.html?action=login" id="loginBtn">Log in</a></div>
        <div class="nav__item"><a href="form.html?action=signup" id="signupBtn">Sign Up</a></div>

	  </div>
	</nav>
	  <div class="hero"><img src="image/woman-travels.jpg" alt="Woman Traveler"/>
	  <div class="hero__search">
		<h1>🌿Travel guides all over the world.</h1>
		<form onsubmit="event.preventDefault(); searchAndFilterFunction();">
		  <div class="form__wrapper">
			<input type="text" id="searchInput" placeholder="Search articles"/>
			<select id="regionFilter">
                    <option value="">All Regions</option>
                    <option value="asia">Asia</option>
                    <option value="europe">Europe</option>
                    <option value="north-america">North America</option>
                    <option value="south-america">South America</option>
                    <option value="africa">Africa</option>
                    <option value="australia">Oceania</option>
                </select>
			<button class="button">Search</button>
		  </div>
		</form>
	  </div>
	</div>
	<section class="categories">
	  <div class="categories__title">
		<h3>Popular Countries</h3>
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 145.66 83.26"> <path d="M.48,3.59c28.77,38.47,78.2,58.53,125.65,51,3.16-.5,1.82-5.32-1.33-4.82-45,7.17-92.7-12.18-120-48.67C2.9-1.48-1.45,1,.48,3.59Z"/><path d="M117,82.52l20.79-21.07c4.06-4.11,9.74-9,7.24-15.47-2.38-6.16-10.46-9-15.76-11.83l-26-13.73c-2.85-1.51-5.38,2.81-2.53,4.31L119.83,34.8c5.86,3.1,13.15,5.75,18.2,10.11,6.86,6-4.44,13.7-8.6,17.92L113.49,79c-2.26,2.29,1.27,5.83,3.53,3.54Z"/></svg>
	  </div>
	  <div class="categories__choices">
		<div class="categories__item"><img class="sepia" src="image/Literary-tour-of-France.png" alt="Eiffel"/>
		  <h5>France</h5>
		</div>
		<div class="categories__item"><img class="sepia" src="image/us.jpg" alt="US"/>
		  <h5>USA</h5>
		</div>
		<div class="categories__item"><img class="sepia" src="image/spain-hero.jpg" alt="spain"/>
		  <h5>Spain</h5>
		</div>
	  </div>
	</section>
	<section class="articles">
	  <h3>Latest Articles</h3>
	  <div class="articles__items" id="articles">

		<div class="articles__item"><img class="articles__photo" src="image/gg-kyoto.jpeg"/>
		  <div class="articles__info"> 
			<p>No Stupid Questions: Everything You Need To Know About Japan</p><span class="tag">Japan</span><span class="tag continent">Asia</span>
		  </div>
		</div>
		<div class="articles__item"><img class="articles__photo" src="image/gg-mexico.jpg"/>
		  <div class="articles__info"> 
			<p>Guide: Getting From Cancun to Chichen Itza</p><span class="tag">Mexico</span><span class="tag continent">North America</span>
		  </div>
		</div>
		<div class="articles__item"><img class="articles__photo" src="image/gg-austria.jpeg"/>
		  <div class="articles__info"> 
			<p>Should You Visit Halstatt? A Quick Guide and Other Lovely Alternatives in Austria</p><span class="tag">Austria</span><span class="tag continent">Europe</span>
		  </div>
		</div>
		<div class="articles__item"><img class="articles__photo" src="image/gg-budapest.jpg"/>
		  <div class="articles__info"> 
			<p>10 Dishes You Should Try When You're in Hungary</p><span class="tag">Hungary</span><span class="tag continent">Europe</span>
		  </div>
		</div>
		<div class="articles__item"><img class="articles__photo" src="image/gg-bali2.jpeg"/>
		  <div class="articles__info"> 
			<p>I spent a day as an Instagram influencer. It was pretty dope, but also pretty exhausting.</p><span class="tag">Indonesia</span><span class="tag continent">Asia</span>
		  </div>
		</div>
		<div class="articles__item"><img class="articles__photo" src="image/gg-osaka.jpeg"/>
		  <div class="articles__info"> 
			<p>6 Stunning Day Trips You Can Take from Osaka</p><span class="tag">Japan</span><span class="tag continent">Asia</span>
		  </div>
		</div>
	  </div>
	  <div class="center">
		<button class="big">Load More...</button>
	  </div>
	</section>
	<div class="more-info">
	 
	</div>
  </div>
  </body>