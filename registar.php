<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<head>
<title>CATÁLOGO DE PRODUTOS TÉCNICOS | Agrupamento de Escolas da Batalha</title>
<link rel="shorcut icon" href="images/LOGOAEB.jpg">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
</head>
<body>
  <div class="wrap">
	<div class="header">
		<div class="headertop_desc">
			<div class="call">
				 <h3>CATÁLOGO DE PRODUTOS TÉCNICOS</h3>
			</div>
			<div class="account_desc">
				<ul>
					<li><a href="registar.php">Registar</a></li>
					<li><a href="login.php">Login</a></li>
					<li><a href="#">Delivery</a></li>
					<li><a href="#">Checkout</a></li>
					<li><a href="#">My Account</a></li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/aeblogo.png" alt="" /></a>
			</div>
			  <div class="cart">
			  	   <p><span><a href="listarequisitar.php"><img src="images/shopping-cart.png" alt="Cart"></a></span><div id="dd" class="wrapper-dropdown-2"> 0 Produto(s)
				   <ul class="dropdown">
							<li>Não tem qualquer produto no seu carrinho.</li>
					</ul></div></p>
			  </div>
			  <script type="text/javascript">
			function DropDown(el) {
				this.dd = el;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						event.stopPropagation();
					});	
				}
			}

			$(function() {

				var dd = new DropDown( $('#dd') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown-2').removeClass('active');
				});

			});

		</script>
	 <div class="clear"></div>
  </div>
	<div class="header_bottom">
	     	<div class="menu">
	     		<ul>
			    	<li class="active"><a href="index.php">Home</a></li>
			    	<li><a href="about.html">Sobre</a></li>
			    	<li><a href="delivery.html">Requisitar</a></li>
			    	<li><a href="contacto.php">Contacto</a></li>
			    	<div class="clear"></div>
     			</ul>
	     	</div>
	     	<div class="search_box">
	     		<form>
	     			<input type="text" value="Procurar" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}"><input type="submit" value="">
	     		</form>
	     	</div>
	     	<div class="clear"></div>
	     </div>	     	
   </div>
   
 
   
<script>
//verificar se as passwords são iguais 
   function validate(){

            var a = document.getElementById("senha").value;
            var b = document.getElementById("resenha").value;
            if (a!=b) {
               alert("Senhas não correspondem!");
               return false;
            }
    }
    </script>   
   
 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="col span_2_of_3">
				  <div class="signup">
				  <center><img src="images/user100.png" alt="Avatar"></center>
				  	<h2><center>Registo de novo utilizador</center></h2>
					    <form name="form_login" method="POST" action="processarRegistar.php" onSubmit="return validate()">
						
					    	<div>
						    	<span><label>Utilizador / Nº Cartão</label></span>
						    	<span><input type="text" name="login" id="login" placeholder="Insira nome de utilizador" required></span>
						    </div>
					    	<div>
						    	<span><label>Nome e Apelido</label></span>
						    	<span><input type="text" name="nome" id="nome" placeholder="Insira nome próprio e apelido" required></span>
						    </div>
					    	<div>
						    	<span><label>Email</label></span>
						    	<span><input type="email" name="email" id="email" placeholder="Insira o seu e-mail" required></span>
						    </div>
						    <div>
						    	<span><label>Palavra-passe</label></span>
						    	<span><input type="password" name="senha" id="senha" placeholder="Insira a sua senha" required></span>
						    </div>
						    <div>
						    	<span><label>Repetir Palavra-passe</label></span>
						    	<span><input type="password" name="resenha" id="resenha" placeholder="Confirme a sua senha" required></span>
						    </div>

						  <div>
							<span><label>Ao criar uma conta está de acordo com a nossa <a href="#">Privacidade &amp; Termos de Utilização</a>.</label></span>
						  </div>
						  
						  <div>
							<span><input type="reset" value="Cancelar" class="myButton">
							<input type="submit" value="Registar" class="myButton"></span>
						  </div>
						  
					    </form>
				  </div>
  				</div>
				<div class="col span_1_of_3">
					<div class="contact_info">
    	 				<h3>Find Us Here</h3>

      				</div>
      			<div class="company_address">
				     	<h3>Company Information :</h3>
						    	<p>500 Lorem Ipsum Dolor Sit,</p>
						   		<p>22-56-2-9 Sit Amet, Lorem,</p>
						   		<p>USA</p>
				   		<p>Phone:(00) 222 666 444</p>
				   		<p>Fax: (000) 000 00 00 0</p>
				 	 	<p>Email: <span><a href="mailto:@example.com">info@mycompany.com</a></span></p>
				   		<p>Follow on: <span>Facebook</span>, <span>Twitter</span></p>
				   </div>
				 </div>
			  </div>		
         </div> 
    </div>
 </div>
   <div class="footer">
   	  <div class="wrap">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>Information</h4>
						<ul>
						<li><a href="about.html">About Us</a></li>
						<li><a href="contact.html">Customer Service</a></li>
						<li><a href="#">Advanced Search</a></li>
						<li><a href="delivery.html">Orders and Returns</a></li>
						<li><a href="contact.html">Contact Us</a></li>
						</ul>
					</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Why buy from us</h4>
						<ul>
						<li><a href="about.html">About Us</a></li>
						<li><a href="contact.html">Customer Service</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="contact.html">Site Map</a></li>
						<li><a href="#">Search Terms</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>My account</h4>
						<ul>
							<li><a href="contact.html">Sign In</a></li>
							<li><a href="index.html">View Cart</a></li>
							<li><a href="#">My Wishlist</a></li>
							<li><a href="#">Track My Order</a></li>
							<li><a href="contact.html">Help</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Contact</h4>
						<ul>
							<li><span>+91-123-456789</span></li>
							<li><span>+00-123-000000</span></li>
						</ul>
						<div class="social-icons">
							<h4>Follow Us</h4>
					   		  <ul>
							      <li><a href="#" target="_blank"><img src="images/facebook.png" alt="" /></a></li>
							      <li><a href="#" target="_blank"><img src="images/twitter.png" alt="" /></a></li>
							      <li><a href="#" target="_blank"><img src="images/skype.png" alt="" /> </a></li>
							      <li><a href="#" target="_blank"> <img src="images/dribbble.png" alt="" /></a></li>
							      <li><a href="#" target="_blank"> <img src="images/linkedin.png" alt="" /></a></li>
							      <div class="clear"></div>
						     </ul>
   	 					</div>
				</div>
			</div>			
        </div>
        <div class="copy_right">
				<p>&copy; 2013 home_shoppe. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
		   </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function() {			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>
</body>
</html>

