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
						<li><a href='logout.php'>Logout</a></li>
						<li><div class='dropdownmenu'>
							<span><a href='#'><?php echo $_SESSION['UserLogin']?></a>&nbsp;<img src='images/user18.png'></span>
							<div class="dropdownmenu-content">
								<p><a href='#'>Editar perfil</a></p>
								<p><hr noshade></p>
								<p><a href='adminpages.php'>Administração</a></p>
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
					<p><span><a href="listarequisitar.php"><img src="images/shopping-cart.png" alt="Carrinho"></a></span>
					<?php 
				   	//abrir ligação à bd
					include("ligar_db.php");
					mysqli_set_charset($ligacao, "utf8");
					
					// prepara sessão de requisição
					$sessao = session_id();
					
					// seleciona os livros requisitados temporariamente 	
					$sql0 = "SELECT COUNT(idLivro) AS itens FROM temprequisicao WHERE sessao = '".$sessao."'";
					$consulta0 = mysqli_query($ligacao, $sql0);
					$resultado0 = mysqli_fetch_assoc($consulta0);

					// se houver livros já requisitados, extrai o valor da contagem
					if (mysqli_num_rows($consulta0) > 0) { 
							$itens = $resultado0['itens']; 
							$msg = "Tem ".$itens." produto(s) no seu carrinho.";
					} else {
							$itens = 0;
							$msg = "Não tem qualquer produto no seu carrinho.";
					}
					
					echo $itens ?> Produto(s)
						<div id="dd" class="wrapper-dropdown-2">
							<ul class="dropdown">
								<li><?php echo $msg ?></li>
						</ul>
						</div>
					</p>
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
			    	<li><a href="sobre.php">Sobre</a></li>
			    	<li><a href="livroscatalogo.php">Requisitar</a></li>
			    	<li><a href="contacto.php">Contacto</a></li>
					<?php
						//verificar se é administrador
						if (isset($_SESSION['UserNivel'])) {
							if ($_SESSION['UserNivel']>2) {
								echo "<li><a href='adminpages.php'>Administração</a></li>";
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
	<div class="header_slide">
			<div class="header_bottom_left">				
				<div class="categories">
				  <ul>
				  	<h3>Categorias</h3>
<?php
	////connect to database
	//include("ligar_db.php");
	//mysqli_set_charset($ligacao, "utf8");
	
	$campo1="idCat";
	$campo2="categoria";
	
	# Verificar se o registo existe
	$consulta = "SELECT idCat, categoria FROM categorias ORDER BY 2 ASC";
	$resultado = mysqli_query($ligacao, $consulta);
	
	if($resultado){
		while($linha = mysqli_fetch_array($resultado)){
			$id = $linha["$campo1"];
			$nome = $linha["$campo2"];
			echo "<li><a href='livroscatalogo.php?id=" .$id. "'>".$nome."</a></li>";
		}
	}
?>
				  </ul>
				</div>					
	  	     </div>
					 <div class="header_bottom_right">					 
					 	 <div class="slider">					     
							 <div id="slider">
			                    <div id="mover">
			                    	<div id="slide-1" class="slide">			                    
									 <div class="slider-img">
									     <a href="preview.html"><img src="images/slide-1-image.png" alt="learn more" /></a>									    
									  </div>
						             	<div class="slider-text">
		                                 <h1>Clearance<br><span>SALE</span></h1>
		                                 <h2>UPTo 20% OFF</h2>
									   <div class="features_list">
									   	<h4>Get to Know More About Our Memorable Services Lorem Ipsum is simply dummy text</h4>							               
							            </div>
							             <a href="preview.html" class="button">Shop Now</a>
					                   </div>			               
									  <div class="clear"></div>				
				                  </div>	
						             	<div class="slide">
						             		<div class="slider-text">
		                                 <h1>Clearance<br><span>SALE</span></h1>
		                                 <h2>UPTo 40% OFF</h2>
									   <div class="features_list">
									   	<h4>Get to Know More About Our Memorable Services</h4>							               
							            </div>
							             <a href="preview.html" class="button">Shop Now</a>
					                   </div>		
						             	 <div class="slider-img">
									     <a href="preview.html"><img src="images/slide-3-image.jpg" alt="learn more" /></a>
									  </div>						             					                 
									  <div class="clear"></div>				
				                  </div>
				                  <div class="slide">						             	
					                  <div class="slider-img">
									     <a href="preview.html"><img src="images/slide-2-image.jpg" alt="learn more" /></a>
									  </div>
									  <div class="slider-text">
		                                 <h1>Clearance<br><span>SALE</span></h1>
		                                 <h2>UPTo 10% OFF</h2>
									   <div class="features_list">
									   	<h4>Get to Know More About Our Memorable Services Lorem Ipsum is simply dummy text</h4>							               
							            </div>
							             <a href="preview.html" class="button">Shop Now</a>
					                   </div>	
									  <div class="clear"></div>				
				                  </div>												
			                 </div>		
		                </div>
					 <div class="clear"></div>					       
		         </div>
		      </div>
		   <div class="clear"></div>
		</div>
   </div>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Novidades</h3>
    		</div>
    		<div class="see">
    			<p><a href="livroscatalogo.php">Ver todo o catálogo</a></p>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	<?php
		//exibir os 4 livros registados mais recentemente
		$consulta="SELECT * FROM livros ORDER BY DataReg DESC LIMIT 4";
		$resultado = mysqli_query($ligacao, $consulta);
		
		while ($linha = mysqli_fetch_array($resultado)){
			$id = $linha["idLivro"];
			$nome = $linha["titulo"];
			$categoriaID = $linha["idCat"];
			$editoraID = $linha["idEditora"];
			$obterCat = mysqli_query($ligacao, "SELECT * FROM categorias WHERE idCat='$categoriaID'");
			$categoria = mysqli_fetch_array($obterCat);
			$obterEdit = mysqli_query($ligacao, "SELECT * FROM editoras WHERE idEditora='$editoraID'");
			$editora = mysqli_fetch_array($obterEdit);
			$autor = $linha["autor"];
			$capa = $linha["imgCapa"];
			$pastaCapas = "images/capas/";
			$ano = $linha["anoEdicao"];
			
	?>
					<div class="grid_1_of_4 images_1_of_4">
					 <?php 	echo "<a href='preview.php?id=".$id."'>";
							echo "<img src='".$pastaCapas.$capa."' border='0'></a>"; ?>
					 <h2><?php echo $nome; ?></h2>
					 <h3><?php echo $autor; ?></h3>
					 <h4><?php echo $categoria[1]; ?></h4> 
					<div class="price-details">
				       <div class="price-number">
							<p><span class="rupees">
							</span></p>
					    </div>
					       		<div class="add-cart">								
							<h4><?php echo "<a href='preview.php?id=".$id."'>"; ?>
								<img src="images/shopping-cart3.png" alt="Carrinho"></a></h4>
							     </div>
							 <div class="clear"></div>
					</div>
				</div>
			<?php
			//fim do ciclo
			}
			?>
				
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>Destaques</h3>
    		</div>
    		<div class="see">
    			<p><a href="livroscatalogo.php">Ver todo o catálogo</a></p>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
	<?php
		//procurar 4 livros aleatoriamente para exibir aqui
		$consulta="SELECT * FROM livros ORDER BY RAND() LIMIT 4";
		$resultado = mysqli_query($ligacao, $consulta);
		
		while ($linha = mysqli_fetch_array($resultado)){
			$id = $linha["idLivro"];
			$nome = $linha["titulo"];
			$categoriaID = $linha["idCat"];
			$obterCat = mysqli_query($ligacao, "SELECT * FROM categorias WHERE idCat='$categoriaID'");
			$categoria = mysqli_fetch_array($obterCat);
			$autor = $linha["autor"];
			$capa = $linha["imgCapa"];
			$pastaCapas = "images/capas/";
			$ano = $linha["anoEdicao"];
			
	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <?php 	echo "<a href='preview.php?id=".$id."'>";
							echo "<img src='".$pastaCapas.$capa."' border='0'></a>"; ?>
					 <h2><?php echo str_pad($nome, 100, ' '); ?></h2>
					 <h3><?php echo str_pad($autor, 60, ' '); ?></h3>
					<div class="price-details">
				       <div class="price-number">
							<p><span class="rupees">
								</span></p>
					    </div>
					       		<div class="add-cart">								
							<h4><?php echo "<a href='preview.php?id=".$id."'>"; ?>
								<img src="images/shopping-cart3.png" alt="Carrinho"></a></h4>
							    </div>
							 <div class="clear"></div>
					</div>
				</div>
			<?php
			//fim do ciclo
			}
			?>
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
						<li><a href="sobre.php">Sobre</a></li>
						<li><a href="policy.php">Privacidade & Termos de Utilização</a></li>
						<li><a href="regulamento.php">Regulamento de Requisição de Livros</a></li>
						</ul>
					</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>A sua Conta</h4>
						<ul>
						<li><a href="login.php">Login</a></li>
						<li><a href="perfil.php">Perfil de utilizador</a></li>
						<li><a href="requisicoes.php">Requisições</a></li>
						<li><a href="devolucoes.php">Devoluções</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Rede Social</h4>
						<div class="social-icons">
					   		  <ul>
							      <li><a href="http://facebook.com/aebatalha" target="_blank"><img src="images/facebook.png" alt="Facebook" /></a></li>
							      <li><a href="http://esbatalha.ccems.pt/" target="_blank"><img src="images/www.png" alt="Página Web" /></a></li>
							      <li><a href="http://esbat-m.ccems.pt" target="_blank"><img src="images/moodle.png" alt="Moodle" /> </a></li>
								  <li><a href="http://www.alfabetoaeb.pt" target="_blank"><img src="images/alfabeto.png" alt="Jornal Alfabeto" /> </a></li>
							      <div class="clear"></div>
						     </ul>
   	 					</div>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Contacto</h4>
						<ul>
							<li><span><img src="images/location.png"> Rua da Freiria<br />2440-062 Batalha</span></li>
							<li><span><img src="images/telefone.png"> 244 769 290</span></li>
							<li><span><img src="images/email.png"> es3batalha@gmail.com</span></li>
						</ul>
				</div>
			</div>			
        </div>
        <div class="copy_right">
				<p>&copy; 2018 All rights reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> adaptado para o AEB.</p>
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

