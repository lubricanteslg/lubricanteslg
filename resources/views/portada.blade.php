@extends('master')
@section('content')
	<div class="container-fluid portada">
		<div class="w1">
			<div class="container">
				<h1	class="mainTitle">Mayorista en Productos Automotrices e Industriales</h1	>
				<div class="col-md-6">
					<img class="" src="imagenes/camion1.jpg" alt="">
				</div>
				<div class="col-md-6">
					<img class="" src="imagenes/cajas.jpg" alt="">
				</div>
			</div>
		</div>

		<div class="w2">
			<a href="{{url('/filtros')}}"><h1 class="text-hide center-block">Filtros Web</h1></a>
		</div>

		<div class="container vspray">
			<div class="col-sm-4 col-sm-offset-4">
				<a href="{{url('/filtros')}}"><img src="imagenes/w-8-sld.jpg" alt="" class="img-thumbnail"></a>
			</div>
		</div>

		<div class="w3">
			<a href="{{url('/drcare')}}"><h1 class="text-hide center-block">Dr care...</h1></a>
		</div>
		<div class="container vspray">
			<div class="col-sm-4 col-sm-offset-4">
				<a href="{{url('/drcare')}}"><img src="imagenes/drcareproductos.png" alt=""  class="img-thumbnail"></a>
			</div>
		</div>

		<div class="w4">
			<a href="{{url('/pdv')}}"><h1 class="text-hide center-block">PDV</h1></a>
		</div>
		<div class="container vspray">
			<div class="col-sm-4 col-sm-offset-4">
				<a href="{{url('/pdv')}}"><img src="imagenes/aceitespdv.jpg" alt=""  class="img-thumbnail"></a>
			</div>
		</div>
	</div>
@stop
