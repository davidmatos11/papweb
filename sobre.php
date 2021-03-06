<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<head>
<title>CATÁLOGO DE PRODUTOS ELETRÓNICOS | Agrupamento de Escolas da Batalha</title>
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
				 <h3>CATÁLOGO DE PRODUTOS ELETRÓNICOS</h3>
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
				<a href="index.php"><img src="images/aeblogo.png" alt="" /></a>
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
			    	<li><a href="index.php">Home</a></li>
			    	<li class="active"><a href="sobre.php">Sobre</a></li>
			    	<li><a href="listarequisitar.php">Requisitar</a></li>
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

	<div class="main">
		<div class="content">
			<div class="section group">
				<div class="col_1_of_3 span_1_of_3">
					<h4>CATÁLOGO DE PRODUTOS ELETRÓNICOS</h4>
					<p>O CATÁLOGO DE PRODUTOS ELETRÓNICOS é uma plataforma de inventariação dos produtos de âmbito técnico disponíveis para apoio aos Cursos Profissionais de Informática do Agrupamento de Escolas da Batalha.</p>
					<p>Como plataforma pretende fazer o registo de produtos ELETRÓNICOS, mantendo um inventário permamente e facilmente acessível através de métodos de pesquisa e ordenação dos títulos existentes.</p>
					<p>Possibilita ainda a gestão das requisição de produtos por alunos e professores desta instituição de ensino.</p>
				</div>
				
				<div class="col_1_of_3 span_1_of_3">
					<h4>COMO USAR ESTA PLATAFORMA?</h4>
					<p>Os conteúdos existentes no CATÁLOGO DE PRODUTOS ELETRÓNICOS são produzidos internamente no Agrupamento de Escolas da Batalha, sendo o Grupo 550 - Informática o responsável pela atualização da informação aqui constante.</p>
					<p>O acervo de produtos existente nesta plataforma está disponível a qualquer visitante para consulta informativa (título, editora, ano de edição, ISBN, sinopse).</p>
					<p>Para aceder às funcionalidade de requisição e consultas avançadas é necessário um registo de utilizador. Registar-se é simples, só precisa de um endereço de email e uma password.</p>
				    <div class="list">
					     <ul>
							<li><a href="#">Privacidade & Termos de Utilização</a></li>
							<li><a href="#">Regulamento de Requisição de Produtos</a></li>
					     	<li><a href="registar.php">Registo de novo utilizador</a></li>
					     	<li><a href="login.php">Autenticação de utilizador</a></li>
					     </ul>
					 </div>
					 <p>Ao registar-se ficará com acesso à sua área de utilizador onde poderá gerir os seus dados pessoais, requisitar produtos, validar a devolução dos mesmos.</p>
				</div>
				
			
				<div class="col_1_of_3 span_1_of_3">
					<h4>COMO REQUISITAR OS PRODUTOS?</h4>
					<div class="history-desc">
						<div class="year"><p>UTENTES</p></div>
						<p class="history">Os produtos do CATÁLOGO DE PRODUTOS ELETRÓNICOS podem ser requisitados por qualquer aluno ou professor do Agrupamento de Escolas da Batalha, respeitando o disposto no Regulamento desta iniciativa.</p>
						<div class="clear"></div>
					</div>
					<div class="history-desc">
						<div class="year"><p>REQUISIÇÃO</p></div>
						<p class="history">Para requisitar um livro o interessado terá que:</p>
						<div class="clear"></div>
					</div>
					<div class="list2">
						<ul>
							<li>Estar devidamente autenticado na plataforma.</li>
							<li>Selecionar o livro e adicionar ao carrinho de compras.</b>
							<li>Finalizar a operação de requisição.</b>
							<li>Concordar com a declaração de empréstimo.</b>
						</ul>
					</div>
					<div class="history-desc">
						<div class="year"><p>ENTREGA E DEVOLUÇÃO</p></div>
						<p class="history">A entrega do livro ao interessado será feita por um professsor responsável do Grupo 550.</p>
						<p class="history">A devolução do livro será feita a um professsor responsável do Grupo 550.</p>
						<div class="clear"></div>
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
						<h4>Informação</h4>
						<ul>
						<li><a href="sobre.php">Sobre...</a></li>
						<li><a href="policy.php">Privacidade & Termos de Utilização</a></li>
						<li><a href="regulamento.php">Regulamento de Requisição de Produtos</a></li>
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
							      <li><a href="www.facebook.com/aebatalha" target="_blank"><img src="images/facebook.png" alt="Facebook" /></a></li>
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
							<li><span>Rua da Freiria<br />2440-062 Batalha</span></li>
							<li><span><img src="images/telefone.png">244 769 290</span></li>
							<li><span><img src="images/email.png">es3batalha@gmail.com</span></li>
						</ul>
				</div>
			</div>				
        </div>
        <div class="copy_right">
				<p>&copy; 2018 All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a> adaptado para o AEB.</p>
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

