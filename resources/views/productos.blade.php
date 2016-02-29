@extends('master')
@section('content')
	<div class="container-fluid main">
		<div class="col-md-2 hidden-sm hidden-xs">
			<div class="row">
				<div class="menu-vertical col-md-11">
					<ul class="nav nav-pills nav-stacked">
						<h4>CATEGORIAS</h4>
					 	<li><a href="{{url('/productos')}}">Destacados</a></li>
						<li><a href="{{url('/filtros')}}">Filtros</a></li>
						<li><a href="{{url('/drcare')}}">Dr. Care</a></li>
						<li><a href="{{url('/pdv')}}">PDV</a></li>
					</ul>
				<br>
				<br>
				<div class="well">
					<h5><a href="">Como ser Cliente</a></h5>
					<h5><a href="">Como Comprar</a></h5>
				</div>
				</div>
			</div>
		</div>

		<div class="col-md-10">
			<div class="page-header">
			  <h1>Productos Destacado</h1>
			</div>
			<div class="row">
				
				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="producto thumbnail">
						<div class="col-md-6 col-sm-6 col-xs-6">
				    		<a href="#" class="">
				      			<img src="imagenes/productos/drcare/champu-1-litro.jpg" alt="...">
				    		</a>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6 descripcion">
							<h4><a href="">Champú Dr. Care 1 Litro</a></h4>
							<p>Champú para vehículo presentación de 1 litro.</p>
						</div>
					</div>							
				</div>
				<!---->

				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="producto thumbnail">
						<div class="col-md-6 col-sm-6 col-xs-6">
				    		<a href="#" class="">
				      			<img src="imagenes/productos/drcare/profesional-bidon.jpg" alt="...">
				    		</a>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6 descripcion">
							<h4><a href="">Profesional Bidón</a></h4>
							<p>Champú para vehículo presentación en bidón.</p>
						</div>
					</div>							
				</div>
				<!---->

				<div class="col-md-4 col-sm-6  col-xs-12">
					<div class="producto thumbnail">
						<div class="col-md-6 col-sm-6 col-xs-6">
				    		<a href="#" class="">
				      			<img src="imagenes/productos/drcare/galon.jpg" alt="...">
				    		</a>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6 descripcion">
							<h4><a href="">Champú Dr. Care  Galón</a></h4>
							<p>Champú para vehículo presentación en galón.</p>
						</div>
					</div>							
				</div>
				<!---->

				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="producto thumbnail">
						<div class="col-md-6 col-sm-6 col-xs-6">
				    		<a href="#" class="">
				      			<img src="imagenes/productos/filtros/w-3387.jpg" alt="...">
				    		</a>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6 descripcion">
							<h4><a href="">WEB W-3387</a></h4>
							<p>Aceite Full Flow Chevette, Corsica, Impala, Malibú, Corsa.</p>
						</div>
					</div>							
				</div>

				<!---->

				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="producto thumbnail">
						<div class="col-md-6 col-sm-6 col-xs-6">
				    		<a href="#" class="">
				      			<img src="imagenes/productos/filtros/w-3614.jpg" alt="...">
				    		</a>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6 descripcion">
							<h4><a href="">WEB W-3614</a></h4>
							<p>Aceite Full Flow Arauca, Grand Vitara, Neon, EcoSport, Fiesta.</p>
						</div>
					</div>							
				</div>

				<!---->

				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="producto thumbnail">
						<div class="col-md-6 col-sm-6 col-xs-6">
				    		<a href="#" class="">
				      			<img src="imagenes/productos/filtros/w-4967.jpg" alt="...">
				    		</a>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6 descripcion">
							<h4><a href="">WEB W-4967</a></h4>
							<p>Aceite Full Flow Spark, Grand Tiger, Celica, Camry, Corolla, Terios, Yaris.</p>
						</div>
					</div>							
				</div>

				<!---->

				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="producto thumbnail">
						<div class="col-md-6 col-sm-6 col-xs-6">
				    		<a href="#" class="">
				      			<img src="imagenes/productos/pdv/extra-multigrado.jpg" alt="...">
				    		</a>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6 descripcion">
							<h4><a href="">Extra Mutligrado 20W-50</a></h4>
							<p>Aceite de motor mineral.</p>
						</div>
					</div>							
				</div>
				<!--1-->

				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="producto thumbnail">
						<div class="col-md-6 col-sm-6 col-xs-6">
				    		<a href="#" class="">
				      			<img src="imagenes/productos/pdv/supra-mx.jpg" alt="...">
				    		</a>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6 descripcion">
							<h4><a href="">Supra MX 15W-40</a></h4>
							<p>Aceite de motor semi-sintetico.</p>
						</div>
					</div>							
				</div>
				<!--2-->

				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="producto thumbnail">
						<div class="col-md-6 col-sm-6 col-xs-6">
				    		<a href="#" class="">
				      			<img src="imagenes/productos/pdv/supra-premium.jpg" alt="...">
				    		</a>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6 descripcion">
							<h4><a href="">Supra Premium 14W-40 </a></h4>
							<p>Aceite de motor semi-sintetico.</p>
						</div>
					</div>							
				</div>
				<!--3-->

			</div>			
		</div>
	</div>
	</div>
@stop