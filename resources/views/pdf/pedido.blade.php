<html lang="es">
    <head>
        <meta charset="utf-8">
    </head>

<body>
    <style type="text/css">
        body {
          font-family: Helvetica;
          margin:20px;
        }
        .content {
          position:relative;
        }
        .header {
          overflow:hidden;
        }
        .dateOrder {
          display:inline-block;
          text-align: right;

        }

        .logo-img {
          width:900px;
          display:inline-block;
        }

        .title {

          font-size:16px;
        }

        .empresa {
            font-size:14px;
        }

        .title>h2 {
          margin-bottom: 0px;
        }

        .title h3 {
          margin-top: 3px;
        }

        table {
          width:100%;
          border-collapse: collapse;
          font-size:12;
        }
        .table>td, th {
          padding:10px;
          line-height: .4;
          vertical-align: middle;
          border: 1px solid black;
        }

        .totals {
          text-align: right;
        }

        .unit {
          width:150px;
        }

        .hidden {
          border:none !important;
        }

        .center {
          text-align:center;
        }

        .right {
          text-align: right;
        }

        .bold {
          font-weight: bold;
        }

        .cliente {
            width:10%;
            text-align: left;
        }

        .vendedor {
            width:50%;
            text-align: left;
        }
    </style>
  <div class="header">
    <div style="display:inline-block" class="logo">
      <img  class="logo-img" src="http://i64.tinypic.com/erfjvs.png" alt="" />
    </div>


  </div>


  <div class="dateOrder">
  <p>
    Fecha: {{$order->date}} <br />
    N° Pedido: {{$order->id}}
  </p>
  </div>

    <table class="table" style="width:auto" style="border: 0px solid black">

      <tr style="text-align:left">
        <td style="width:50%; font-size:14;" class="cliente left bold" colspan="2">Cliente</td>
        <td style="width:50%; font-size:14;" class="vendedor left bold" colspan="2">Vendedor</td>
      </tr>

      <tr>
        <td class="bold">Razón Social:</td>
        <td>{{$order->client->name}}</td>
        <td class="bold">Nombre:</td>
        <td>{{$order->salesman->name}}</td>
      </tr>
      <tr>
        <td class="bold">RIF:</td>
        <td>{{$order->client->rif}}</td>
        <td class="bold">Teléfono:</td>
        <td>{{$order->salesman->phone}}</td>
      </tr>

      <tr>
        <td class="bold">Código:</td>
        <td>{{$order->client->code}}</td>
        <td class="bold">Correo:</td>
        <td>{{$order->salesman->email}}</td>
      </tr>
    </table>

  <h2 class="center">PEDIDO</h2>

  <div class="table">
    <table>

      <tr>
        <th>Código</th>
        <th>Descripción</th>
        <th>Cantidad</th>
        <th class="unit">Precio Unitario</th>
        <th style="width:15%;">Subtotal</th>
      </tr>
      @foreach($order->detail as $detail)
      <tr>
        <td class="center">{{$detail->product_code}}</td>
        <td>{{$detail->product_desc}}</td>
        <td class="center">{{$detail->qty}}</td>
        <td class="right">{{$detail->unitario}}</td>
        <td class="right">{{$detail->subtotal}}</td>
      </tr>
       @endforeach

      <tr>
          <td colspan="5" style="padding-top:30px"></td>
      </tr>
      <tr class="hidden">
        <td colspan="3" rowspan="4"></td>
      </tr>

      <tr class="totals">
        <td class="bold">Base Imponible(G)</td>
        <td class="right">523.45,34</td>
      </tr>

      <tr class="totals">
        <td class="bold">I.V.A. (12%)</td>
        <td class="right">23.542,12</td>
      </tr>

      <tr class="totals">
        <td class="bold">Total a Pagar</td>
        <td class="right">642.318,47</td>
      </tr>
    </table>
  </div>


</body>
</html>
