<?php
	session_start();

	if(isset($_SESSION['username']))
	{
		// put stored session variables into local PHP variables
		$user = $_SESSION['username'];
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
	<title>BookLover</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="css/images/favicon.ico" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>
</head>

	<!-- Header -->
	<div id="header" class="shell">
		<img src="css/images/mainLogo.png" height=70 widht=80 />
		<!-- Navigation -->
		<div id="navigation">
			<ul>
					<li> </li> <li> </li> <li> </li> <li> </li> <li> </li> <li> </li> <li> </li> <li> </li> 
				<li><a href="#" class="active">Home</a></li>
				<li><a href="#">About Us</a></li>
				<li><a href="#">Help</a></li>
				<li><a href="#">FAQs</a></li>
				<li><a href="#">Contacts</a></li>

			</ul>
		</div>
		<!-- End Navigation -->
		<div class="cl">&nbsp;</div>

		<!-- account-details for Book Seller-->
		<div id="account-details">
			<ul>
				<li><p>Welcome,</p></li>
				<li><a href="#" id="user"><?php echo $user; ?></a>
					<ul>
						<li><a href="php/bookseller/comment.php">Comment/Rate_Books</a></li>
						<li><a href="php/bookseller/account.php">Add_balance</a></li><!-- -->
						<li><a href="php/bookseller/complain_owner.php">File_Owner_Complaint</a></li>
						<li><a href="php/bookseller/return_book.php">Return_Book</a></li> <!--done -->
						<li><a href="php/bookseller/bid.php">Bid_on_Book</a></li> <!-- -->
						<li><a href="php/bookseller/buy.php">Buy_Book</a></li> <!-- -->
						<li><a href="php/bookseller/upgrade.php">Request_Upgrade</a></li> <!-- -->
					</ul>
				</li>
				<li><a href="php/logout.php"> Logout </a></li>
			</ul>
		</div>
		<!-- End account-details -->
	</div>
	<!-- End Header -->

	<!-- The rest is the same as home.html -->

	<!-- Slider -->
	<div id="slider">
		<div class="shell">
			<ul>
				<li>
					<div class="image">
						<img src="css/images/sliderbook1.png" alt="" height=300 width=230/>
					</div>
					<div class="details">
						<h2><font color=red>On Sale!</font></h2>
						<h3>So Good They Can't Ignore You</h3>
						<p class="title">by Call Newport</p>
						<p class="description">In this eye-opening account, Cal Newport debunks the long-held belief that "follow your passion" is good advice ...</p>
						<a href="php/sliderbook1.php" class="read-more-btn">Read More</a>
					</div>
				</li>
				<li>
					<div class="image">
						<img src="css/images/sliderbook2.png" alt="" height=300 width=400 />
					</div>
					<div class="details">
						<h2><font color=red>On Sale!</font></h2>
						<h3>Animal Farm</h3>
						<p class="title">by George Orwell</p>
						<p class="description">A farm is taken over by its overworked, mistreated animals. With flaming idealism and stirring slogans, …</p>
						<a href="php/sliderbook2.php" class="read-more-btn">Read More</a>
					</div>
				</li>
				<li>
					<div class="image">
						<img src="css/images/sliderbook3.png" alt="" height=300 width=230/>
					</div>
					<div class="details">
						<h2><font color=red>On Sale!</font></h2>
						<h3>The Good House</h3>
						<p class="title">by Ann Leary</p>
						<p class="description">Hildy Good is a townie. A lifelong resident of a small community on the rocky coast of Boston’s North Shore, she knows pretty much everything about everyone ...</p>
						<a href="php/sliderbook3.php" class="read-more-btn">Read More</a>
					</div>
				</li>
				<li>
					<div class="image">
						<img src="css/images/sliderbook4.png" alt="" height=300 width=230/>		
					</div>
					<div class="details">
						<h2><font color=red>On Sale!</font></h2>
						<h3>Maestro</h3>
						<p class="title">by Roger Nierenberg</p>
						<p class="description">Roger Nierenberg, a veteran conductor, is the creator of The Music Paradigm, a unique program that invites people to sit …</p>
						<a href="php/sliderbook4.php" class="read-more-btn">Read More</a>
					</div>
				</li>
			</ul>
			<div class="nav">
				<a href="#">1</a>
				<a href="#">2</a>
				<a href="#">3</a>
				<a href="#">4</a>
			</div>
		</div>
	</div>
	<!-- End Slider -->

	<!-- Main -->
	<div id="main" class="shell">

		<!-- SEARCH BAR -->
		<div id="tfheader">
			<form id="tfnewsearch" method="post" action="php/bookDetails.php">
			        <input type="text" class="tftextinput" name="query" size="21" maxlength="120">
			        <input type="submit" value="search" class="tfbutton">
			</form>
			<div class="tfclear"></div>
		</div>
		<!-- Search Bar End -->

		<!-- Sidebar -->
		<div id="sidebar"> 
			<ul class="categories">
				<li>
					<h4>Search by Categories</h4>
					<ul>
						<li><a href="php/All.php">All</a></li>
						<li><a href="php/Action.php">Action</a></li>
						<li><a href="php/Comedy.php">Comedy</a></li>
						<li><a href="php/Finance.php">Finance</a></li>
						<li><a href="php/Horror.php">Horror</a></li>
						<li><a href="php/Musical.php">Musical</a></li>
						<li><a href="php/Mystery.php">Mystery</a></li>
						<li><a href="php/Politics.php">Politics</a></li>
						<li><a href="php/Religious.php">Religious</a></li>
						<li><a href="php/Romance.php">Romance</a></li>
						<li><a href="php/SciFi.php">SciFi</a></li>

					</ul>
				</li>
			</ul>
		</div>
		<!-- End Sidebar -->
		<!-- Content -->
		<div id="content">
			<!-- Products -->
			<div class="products">
				<h3>Featured Books</h3>
				<ul>
					<li>
						<div class="product">
							<a href="php/book1.php" class="info">
								<span class="holder">
									<img src="css/images/image01.jpg" alt="" />
									<span class="book-name">The Devil's Exilir</span>
									<span class="author">Raymond Khoury</span>
									<span class="description">What if there was a drug, previously lost to history in the jungles of Central 		America...</span>
								</span>
							</a>
							<a href="#" class="buy-btn">BUY NOW <span class="price"><span class="low">$</span>14<span class="high">99</span></span></a>
						</div>
					</li>
					<li>
						<div class="product">
							<a href="php/book2.php" class="info">
								<span class="holder">
									<img src="css/images/image02.jpg" alt="" />
									<span class="book-name">The Shepard</span>
									<span class="author">by Ethan Cross</span>
									<span class="description">To stop a monster.<br />Marcus Williams and <br />Francis Ackermen Jr. <br />both have ...</span>
								</span>
							</a>
							<a href="" class="buy-btn">BUY NOW <span class="price"><span class="low">$</span>19<span class="high">99</span></span></a>
						</div>
					</li>
					<li>
						<div class="product">
							<a href="php/book3.php" class="info">
								<span class="holder">
									<img src="css/images/image03.jpg" alt="" />
									<span class="book-name">A Praying Life</span>
									<span class="author">by Paul Miller</span>
									<span class="description">Author Paul Miller<br />shares his insights <br />and conclusion <br />about how ...</span>
								</span>
							</a>
							<a href="#" class="buy-btn">BUY NOW <span class="price"><span class="low">$</span>29<span class="high">99</span></span></a>
						</div>
					</li>
					<li>
						<div class="product">
							<a href="php/book4.php" class="info">
								<span class="holder">
									<img src="css/images/image04.jpg" alt="" />
									<span class="book-name">Strange Case of FJ</span>
									<span class="author">by Kady Cross</span>
									<span class="description">Finley Jayne knows<br />she's not 'normal'.<br />Normal girls<br />don't lose ...</span>
								</span>
							</a>
							<a href="#" class="buy-btn">BUY NOW <span class="price"><span class="low">$</span>34<span class="high">99</span></span></a>
						</div>
					</li>
					<li>
						<div class="product">
							<a href="php/book5.php" class="info">
								<span class="holder">
									<img src="css/images/image05.jpg" alt="" />
									<span class="book-name">007 Carte Blanche</span>
									<span class="author">by Jeffery Deaver</span>
									<span class="description">James Bond as you've<br />never seen him <br />before in the <br /> smashing new ...</span>
								</span>
							</a>
							<a href="#" class="buy-btn">BUY NOW <span class="price"><span class="low">$</span>18<span class="high">99</span></span></a>
						</div>
					</li>
					<li>
						<div class="product">
							<a href="php/book6.php" class="info">
								<span class="holder">
									<img src="css/images/image06.jpg" alt="" />
									<span class="book-name">Trader of Secrets</span>
									<span class="author">by Steven Martini</span>
									<span class="description">The reasons why Steve<br />Martini is one <br />of the most<br /> popular thriller ...</span>
								</span>
							</a>
							<a href="#" class="buy-btn">BUY NOW <span class="price"><span class="low">$</span>9<span class="high">99</span></span></a>
						</div>
					</li>
					<li>
						<div class="product">
							<a href="php/book7.php" class="info">
								<span class="holder">
									<img src="css/images/image07.jpg" alt="" />
									<span class="book-name">The Affair</span>
									<span class="author">by Lee Child</span>
									<span class="description">Evething starts somewhere.<br />For elite militiary<br />cop Jack Reacher, ...</span>
								</span>
							</a>
							<a href="#" class="buy-btn">BUY NOW <span class="price"><span class="low">$</span>13<span class="high">00</span></span></a>
						</div>
					</li>
					<li>
						<div class="product">
							<a href="php/book8.php" class="info">
								<span class="holder">
									<img src="css/images/image08.jpg" alt="" />
									<span class="book-name">The Third Gate</span>
									<span class="author">by Lincoln Child</span>
									<span class="description">Deep in a nearly<br />impossible swamp <br />south of the <br />Egyptian border, an ...</span>
								</span>
							</a>
							<a href="#" class="buy-btn">BUY NOW <span class="price"><span class="low">$</span>22<span class="high">00</span></span></a>
						</div>
					</li>
				</ul>
			<!-- End Products -->
			</div>
			<div class="cl">&nbsp;</div>
			<!-- Best-sellers -->
			<div id="best-sellers">
				<h3>Recently Viewed</h3>
				<ul>
					<li>
						<div class="product">
							<a href="#">
								<img src="css/images/image-best01.jpg" alt="" />
								<span class="book-name">Book Name </span>
								<span class="author">by John Smith</span>
								<span class="price"><span class="low">$</span>35<span class="high">00</span></span>
							</a>
						</div>
					</li>
					<li>
						<div class="product">
							<a href="#">
								<img src="css/images/image-best02.jpg" alt="" />
								<span class="book-name">Book Name </span>
								<span class="author">by John Smith</span>
								<span class="price"><span class="low">$</span>45<span class="high">00</span></span>
							</a>
						</div>
					</li>
					<li>
						<div class="product">
							<a href="#">
								<img src="css/images/image-best03.jpg" alt="" />
								<span class="book-name">Book Name </span>
								<span class="author">by John Smith</span>
								<span class="price"><span class="low">$</span>15<span class="high">00</span></span>
							</a>
						</div>
					</li>
					<li>
						<div class="product">
							<a href="#">
								<img src="css/images/image-best04.jpg" alt="" />
								<span class="book-name">Book Name </span>
								<span class="author">by John Smith</span>
								<span class="price"><span class="low">$</span>27<span class="high">99</span></span>
							</a>
						</div>
					</li>
					<li>
						<div class="product">
							<a href="#">
								<img src="css/images/image-best01.jpg" alt="" />
								<span class="book-name">Book Name </span>
								<span class="author">by John Smith</span>
								<span class="price"><span class="low">$</span>35<span class="high">00</span></span>
							</a>
						</div>
					</li>
					<li>
						<div class="product">
							<a href="#">
								<img src="css/images/image-best02.jpg" alt="" />
								<span class="book-name">Book Name </span>
								<span class="author">by John Smith</span>
								<span class="price"><span class="low">$</span>45<span class="high">00</span></span>
							</a>
						</div>
					</li>
					<li>
						<div class="product">
							<a href="#">
								<img src="css/images/image-best03.jpg" alt="" />
								<span class="book-name">Book Name </span>
								<span class="author">by John Smith</span>
								<span class="price"><span class="low">$</span>15<span class="high">00</span></span>
							</a>
						</div>
					</li>
					<li>
						<div class="product">
							<a href="#">
								<img src="css/images/image-best04.jpg" alt="" />
								<span class="book-name">Book Name </span>
								<span class="author">by John Smith</span>
								<span class="price"><span class="low">$</span>27<span class="high">99</span></span>
							</a>
						</div>
					</li>
				</ul>
			</div>
			<!-- End Best-sellers -->
		</div>
		<!-- End Content -->

		<div class="cl">&nbsp;</div>
	</div>

	<p>
	<!-- End Main -->
	<!-- Footer -->
	<br>
	<center><b><font color=white>&copy;</font>&nbsp;<a href="#"><font color=white>BookLover</font></a></center>
	<br><br><br>

	<!-- End Footer -->
</body>
</html>