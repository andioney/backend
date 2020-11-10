	<?php
		if (isset($title))
		{
	?>



	<nav class="navbar navbar-default ">
		<div class="container-fluid">
			<!-- La marca y la palanca se agrupan para una mejor visualización móvil -->

			<div class="navbar-header">

				<a class="navbar-brand"></a>
				<!--<a href="stock.php"> <img src="/img/ryzenf.png" width="70" height="55"></a>-->



			</div>

			<head>
				<title>Menu Desplegable</title>
				<style type="text/css">
					{
						margin: 0px;
						padding: 0px;
					}

					#header {
						background: #96281B;
						list-style: none;
						height: 45px;
						float: left;
						padding: 0px 0px;
					}

					ul,
					ol {
						list-style: none;
					}

					.nav>li {
						float: left;
					}

					.nav li a {
						width: 110px;
						height: 3px;
						line-height: 52px;
						/*border-bottom: 4px solid #636393;*/
						padding: 0px;
						color: #000;
						font-style: normal;
						font-variant-numeric: normal font-size:18px;
						font-weight: inherit;
						text-align: center;
						align-items: center;
						text-decoration: none;
						display: block;
						/*-webkit-transition: .2s all linear;
				-moz-transition: .2s all linear;
				-o-transition: .2s all linear;
				transition: .2s all linear;*/
					}

					.nav li a:hover {
						background-color: floralwhite;
					}


					/*	.nav li ul {
				display:none;
				position:absolute;
				min-width:140px;
			}
			
			.nav li:hover > ul {
				display:block;
			}
			
			.nav li ul li {
				position:relative;
			}
			
			.nav li ul li ul {
				right:-140px;
				top:0px;
			}*/
					/*li:nth-child(1) a {
        border-color: #636393;
        }
        li:nth-child(2) a {
        border-color: #1A9B11;
        }
        li:nth-child(3) a {
        border-color: #D4953C;
        }
        li:nth-child(4) a {
        border-color: #609491;
        }
        li:nth-child(5) a {
        border-color: #87A248;
        }
        li:nth-child(1) a:hover {
        border-bottom: 35px solid #636393;
        height: 9px;
        }
        li:nth-child(2) a:hover {
        border-bottom: 35px solid #1A9B11;
        height: 9px;
        }
        li:nth-child(3) a:hover {
        border-bottom: 35px solid #D4953C;
        height: 9px;
        }
        li:nth-child(4) a:hover {
        border-bottom: 35px solid #609491;
        height: 9px;
        }
        li:nth-child(5) a:hover {
        border-bottom: 35px solid #87A248;
        height: 9px;
        }*/

				</style>
			</head>

			<body>
				<div id="header">
					<ul class="nav">
                        <li><a href="menuproductos.php">RYZEN</a></li>
						<li><a href="menuproductos.php">Productos</a></li>
						<li><a href="categorias.php">Categorías</a></li>
						<li><a href="usuarios.php">Usuarios</a></li>
					</ul>

				</div>
			</body>

			<!--
			<ul text-align:center; class="btn btn-default btn-lg block  navbar-right"> Salir 
				

-->


			<ul>
				<div id="header-right">

					<ul class="nav navbar-right">
						<li><a href="login.php?logout"><i class='glyphicon glyphicon-off'></i> Salir</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->

	</nav>
	<?php
		}
	?>
