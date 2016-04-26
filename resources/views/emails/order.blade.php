@extends('emails.email_master')

@section('title', 'Notificación de Pedido')

@section('content')
    <h3>Su pedido bajo el número: {{$order->id}} ha sido creado, puede detallarlo en el archivo adjunto a este correo</h3>
@stop
