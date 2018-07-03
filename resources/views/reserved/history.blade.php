@extends('layouts.app')
@section('title', 'Historial')
@section('content')
<div class="section pt-5 pb-10">
                    <div class="container">
                        
                        <div class="row">
                            <div data-wow-delay="0.3s" class="single-page-title text-center mb-6 wow fadeInUp" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                                    <h1 class="os-font">Historial</h1>
                                    <p class="dark-color">Aqui puedes ver el historial de tus productos reservados</p>
                                    <div class="heading-line"></div>
                                </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-12">                                
                                <table class="shop-table cart">
                                    <thead>
                                        <tr>  
                                            <th class="product-name">id</th>                                          
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Productos</th>
                                            <th class="product-price">Precio</th>                                  
                                            <th class="product-quantity">Status</th>                                            
                                            <th class="product-subtotal">Total</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($reserved_products as $product)
                                        <tr>
                                            <td>{{$product->created_at->format('Ymd')}}-{{$product->id}}</td>
                                            <td class="product-thumbnail">
                                                <a target="_blanck" href="{{route('product',[$product->product->category->slug,$product->slug])}}">
                                                    <img src="{{$product->img}}" alt="">
                                                </a>
                                            </td>
                                            <td class="product-name">
                                                <a href="{{route('product',[$product->product->category->slug,$product->slug])}}">{{$product->title}}</a>
                                            </td>
                                            <td class="product-price">
                                                {{number_format($product->price,2)}}€
                                            </td>                                           
                                            
                                            <td class="product-name">
                                                @if($product->status==0)
                                                    <span class="label label-default">SIN RESERVAR</span>
                                                @elseif($product->status==1)
                                                    <span class="label label-primary">RESERVADO</span>
                                                @elseif($product->status==2)
                                                    <span class="label label-success">ENTREGADO</span>
                                                @else
                                                    <span class="label label-danger">RECHAZADO</span>
                                                @endif
                                            </td>
                                            <td class="product-subtotal">
                                                {{number_format($product->price,2)}}€
                                            </td>                                            
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12"  >
                                <label style="margin-top: 10px;color: #f44336;">Las reservas tendrá validez durante 5 días. En caso de no hacerse efectiva, el producto se pondrá automáticamente a la venta de nuevo</label>
                            </div>

                        </div>
                        
                    </div>
                </div>
@endsection
@section('css')
<link href="{{ asset('/segade/datatables/DataTables-1.10.16/css/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('js')
<script src="{{ asset('/segade/datatables/DataTables-1.10.16/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('/segade/datatables/DataTables-1.10.16/js/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.shop-table').DataTable({
             "order":[[ 0, 'desc' ]],
            "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
    });
</script>
@endsection