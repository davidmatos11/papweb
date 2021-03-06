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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="js/startstop-slider.js"></script>

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
				<?php 
					//verificar se está autenticado
					//A sessão precisa ser iniciada em cada página diferente
					session_start();
					//verificar nivel
					if (isset($_SESSION['UserNivel'])) {
						if ($_SESSION['UserNivel']<3) {
							header("Location: login.php");
							exit;
						}
					}
					else {
						header("Location: login.php");
						exit;
					}
					
					//Verifica se não há a variável da sessão que identifica o utilizador
					if (!isset($_SESSION['UserID'])) {
						// Destrói a sessão por segurança
						session_destroy();
						//Apresenta os links para Registar ou para Login
						?>
						<li><a href='registar.php'>Registar</a></li>
						<li><a href='login.php'>Login</a></li>
					<?php
					}
					 else {
						//Apresenta os links para Checkout ou para Conta
						?>
						<li><a href='#'>Checkout</a></li>
						<li><a href='logout.php'>Logout</a></li>
						<li><div class='dropdownmenu'>
							<span><a href='#'><?php echo $_SESSION['UserLogin']?></a>&nbsp;<img src='images/user18.png'></span>
							<div class="dropdownmenu-content">
								<p><a href='#'>Editar perfil</a></p>
								<p><hr noshade></p>
								<p><a href='#'>Administração</a></p>
							</div>
						</div></li>
					<?php
					}
				?>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/aeblogo.png" alt="Agrupamento de Escolas da Batalha" /></a>
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
			    	<li><a href="index.php">Home</a></li>
			    	<li><a href="about.html">Sobre</a></li>
			    	<li><a href="delivery.html">Requisitar</a></li>
			    	<li><a href="contacto.php">Contacto</a></li>
					<?php
						//verificar se é administrador
						if (isset($_SESSION['UserNivel'])) {
							if ($_SESSION['UserNivel']>2) {
								echo "<li class='active'><a href='adminpages.php'>Administração</a></li>";
							}
						}
					?>
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

<div class="main">
    <div class="content">
    	<div class="section group">
		
			<div class="col span_1_of_3">
				<h3>Material</h3>
				<img src="images/computer.png" alt="">
				<p>Tarefas disponíveis para gestão do catálogo de material:</p>
				<div class="clear"></div>
				<div class="list">
					<ul>
						<li><a href="adminpagecategories.php">Categorias Técnicas</a></li>
						<li><a href="adminpagefinance.php">Origem / Medidas de Financiamento</a></li>
						<li><a href="adminpagebooks.php">Registos de Material</a></li>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
				
			<div class="col span_2_of_3">
				<h2>Registo de Material</h2>
				<div class="clear"></div>
				<div class="reccord-form">

<?php
	//verificar qual o id e o mode
	$botao = "";
	if(!isset($_GET['id']) AND !isset($_GET['mode'])) {
		//não existe id nem mode
		header("Location: adminpagebooks.php");
		exit;
	}
	else {
		if(!isset($_GET['id'])) {
			//não existe id
			header("Location: adminpagebooks.php");
			exit;
			}
		else {
			$idLivro = $_GET['id'];
			$modo = $_GET['mode'];
			if ($modo == 'edit') { $botao = "Atualizar"; }
			if ($modo == 'delete') { $botao = "Eliminar"; }
		}
	}

	//Connect To Database
	$servidor="localhost";
	$utilizador="root";
	$password="";
	$basedados="aeblivros";
		
	$ligacao = mysqli_connect($servidor,$utilizador,$password,$basedados) or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)</script></html>");
	mysqli_select_db($ligacao, $basedados);
	//mysqli_set_charset($ligacao, "utf8");
	
	$consultaCategorias = "SELECT idCat, categoria FROM categorias ORDER BY 1 ASC";
	$resultadoCategorias = mysqli_query($ligacao, $consultaCategorias);
		
	$consultaEditoras = "SELECT idEditora, editora FROM editoras ORDER BY 1 ASC";
	$resultadoEditoras = mysqli_query($ligacao, $consultaEditoras);
		
	$consultaIdiomas = "SELECT idIdioma, Idioma FROM idiomas ORDER BY 1 ASC";
	$resultadoIdiomas = mysqli_query($ligacao, $consultaIdiomas);
		
	$consultaOrigem = "SELECT idOrigem, origem FROM origem ORDER BY 1 ASC";
	$resultadoOrigem = mysqli_query($ligacao, $consultaOrigem);
	
	# Verificar se o registo existe
	$consulta = "SELECT idLivro, idCat, idEditora, titulo, autor, isbn, anoEdicao, idIdioma, idOrigem, exemplares FROM livros WHERE idLivro=" .$idLivro;
	$resultado = mysqli_query($ligacao, $consulta);
	
	if($resultado){
		//existe o registo
		while($linha = mysqli_fetch_array($resultado)){
			$campo1= $linha["idLivro"];
			$campo2 = $linha["idCat"];
			$campo3 = $linha["idEditora"];
			$campo4 = $linha["titulo"];
			$campo5 = $linha["autor"];
			$campo9 = $linha["idOrigem"];
			$campo10 = $linha["exemplares"];
		}
		?>
			<p><?php echo $botao. " registo de definições do produto." ?></p>
			<div class="clear"></div>
			<form id="form_registo" method="POST" 
			action="processarRegistoLivro.php?id=<?php echo $campo1 ?>&mode=<?php echo $modo ?>">
				<div>
					<span><label>ID:</label></span>
					<span><input type="text" class="short inactive" value="<?php echo $campo1 ?>" readonly></span>
				</div>
				<div>
					<span><label>Designação:</label></span>
					<span>
					<?php 
						if ($modo=='edit') {
							echo "<input type='text' class='textbox' name='livroNome' value='$campo4'>";
						}
						else {
							$botao = "Eliminar";
							echo "<input type='text' class='inactive2' name='livroNome' value='$campo4' readonly>";
						}
					?>
					</span>
				</div>
				
				<div>
					<span><label>Descrição:</label></span>
					<span>
					<?php 
						if ($modo=='edit') {
							echo "<input type='text' class='textbox' name='autorNome' value='$campo5'>";
						}
						else {
							echo "<input type='text' class='inactive2' name='autorNome' value='$campo5' readonly>";
						}
					?>
					</span>
				</div>
				
				<div>
					<span><label>Categoria:</label></span>
					<span>
					<?php 
						if ($modo=='edit') {
							echo "<select name='categoriaId'>";
						}
						else {
							echo "<select disabled class='inactive' name='categoriaId'>";
						}
						while ($row = mysqli_fetch_array($resultadoCategorias, MYSQLI_ASSOC)) {
								if ($row["idCat"] == $campo2) {
									echo "<option selected value=".$row['idCat'].">".$row['categoria']."</option>";
								}
								else {
									echo "<option value=".$row['idCat'].">".$row['categoria']."</option>";
								}
						}
						echo "</select>";
					?>
					</span>
				</div>
	
				<div>
					<span><label>Origem / Medida de Financiamento:</label></span>
					<span>
					<?php 
						if ($modo=='edit') {
							echo "<select name='origemId'>";
						}
						else {
							echo "<select disabled class='inactive' name='origemId'>";
						}
						while ($row = mysqli_fetch_array($resultadoOrigem, MYSQLI_ASSOC)) {
								if ($row["idOrigem"] == $campo9) {
									echo "<option selected value=".$row['idOrigem'].">".$row['origem']."</option>";
								}
								else {
									echo "<option value=".$row['idOrigem'].">".$row['origem']."</option>";
								}
						}
						echo "</select>";
					?>
					</span>
				</div>
				
				<div>
					<span><label>Stock:</label></span>
					<span>
					<?php 
						if ($modo=='edit') {
							echo "<input type='text' class='short' name='exemplarNrs' value='$campo10'>";
						}
						else {
							echo "<input type='text' class='short inactive' name='exemplarNrs' value='$campo10' readonly>";
						}
					?>
					</span>
				</div>
				

				<div class="clear"></div>
				<span><input type="submit" name="doit" value="<?php echo $botao ?>">
							<input type="submit" name="cancel" value="Cancelar" ></span>
				
	<?php
	}
	else {
			//caso não existam registos
			echo "Não foi encontrado o registo.";
	}
	?>
			</form>
				</div>
			</div>
    </div>
</div>

</div>

   <div class="footer">
   	  <div class="wrap">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>Informação</h4>
						<ul>
						<li><a href="about.html">Sobre</a></li>
						<li><a href="contact.html">Customer Service</a></li>
						<li><a href="#">Advanced Search</a></li>
						<li><a href="delivery.html">Orders and Returns</a></li>
						<li><a href="contacto.html">Contact Us</a></li>
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
					<h4>A minha conta</h4>
						<ul>
							<li><a href="contact.html">Sign In</a></li>
							<li><a href="index.html">View Cart</a></li>
							<li><a href="#">My Wishlist</a></li>
							<li><a href="#">Track My Order</a></li>
							<li><a href="contact.html">Help</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Contacto</h4>
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
				<p>&copy; 2018 All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a> adaptado para o AEB</p>
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

