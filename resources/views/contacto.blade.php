@extends('master')
@section('content')
	<div class="container-fluid">

		<div class="mapa" id="googleMap">

		</div>

		<div class="contacto">
			<div class="arrow-before"></div>

			<div class="container">
			<div class="col-md-5">
				<form role="form" method="POST" action="/contacto">
					{!! csrf_field() !!}
					<div class="form-group">
				    	<input type="text" name="name" class="form-control" id="nombre"
				           placeholder="Nombre">
				  	</div>
				  	<div class="form-group">
				    	<input type="email" name="email" class="form-control" id="email"
				           placeholder="Email">
				  	</div>
						<div class="form-group">
					    	<input type="text" name="subject" class="form-control" id="asunto"
					           placeholder="Asunto">
					  	</div>
				  	<div class="form-group">
				    	<textarea class="form-control" name="mensaje" placeholder="Mensaje" rows="10"></textarea>
				  	</div>
				  <button type="submit" class="btn btn-default">Enviar</button>
				</form>
			</div>
			<div class="col-md-7 tel">
				<div class="">
					<h1 class="text-center">Dirección de Contacto</h1>
				<p>Valle de la Pascua Edo. Guárico - Calle Real salida hacia Tucupido Galpón S/N al lado de E/S Los Gallegos</p>
				</div>
				<div class="col-sm-6">
						<h3 class="">Teléfonos Locales</h3>
						<h4 class="">0235-3422025</h4>
						<h4 class="">0235-3413496</h4>
						<h4 class="">0235-3417080</h4>

				</div>
				<div class="col-sm-6">
						<h3 class="">Correos</h4>
						<h4 class="">administracion.mariela@diluga.com.ve</h4>
						<h4 class="">cobranza.raul@diluga.com.ve</h4>
						<h4 class="">facturacion.consejo@diluga.com.ve</h4>
						<h4 class="sinmargen">facturacion.arnardo@diluga.com.ve</h4>
				</div>
				<span class="clearfix"></span>
			</div>
		</div>
		</div>
	</div>
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
	function initialize() {
	  var mapProp = {
	    center:new google.maps.LatLng(9.2128538,-65.996232),
	    zoom:18,
	    scrollwheel: false,
	    mapTypeId:google.maps.MapTypeId.ROADMAP
	  };
	  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
	}
	google.maps.event.addDomListener(window, 'load', initialize);
</script>

@stop
