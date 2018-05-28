@extends('layouts.app')
@section('title', 'Historial')
@section('content')
<div class="section pt-5 pb-10">
                    <div class="container">
                        
                        <div class="row">
                            <div data-wow-delay="0.3s" class="single-page-title text-center mb-6 wow fadeInUp" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                                    <h1 class="os-font">Historial</h1>
                                    <p class="dark-color">Aqui puede ver el historial de products apartados</p>
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
                                            <th class="product-quantity">Cantidad</th>
                                            <th class="product-quantity">Fecha de entrega</th>
                                            <th class="product-quantity">Status</th>                                            
                                            <th class="product-subtotal">Total</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($reserved_products as $product)
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td class="product-thumbnail">
                                                <a target="_blanck" href="{{route('product',[$product->category,$product->slug])}}">
                                                    <img src="{{url('/segade/img/'.$product->img)}}" alt="">
                                                </a>
                                            </td>
                                            <td class="product-name">
                                                <a href="{{route('product',[$product->category,$product->slug])}}">{{$product->title}}</a>
                                            </td>
                                            <td class="product-price">
                                                $&nbsp;{{$product->price}}
                                            </td>
                                            <td class="product-quantity">
                                              {{$product->quantity}}
                                                
                                            </td>
                                            <td class="product-name">
                                              {{$product->date_arrival}} 
                                              {{$product->hour}}
                                                
                                            </td>
                                            <td class="product-name">
                                                @if($product->status==0)
                                                    <span class="label label-default">SIN APARTAR</span>
                                                @elseif($product->status==1)
                                                    <span class="label label-primary">APARTADO</span>
                                                @else
                                                    <span class="label label-success">ENTREGADO</span>
                                                @endif

                                            </td>
                                            <td class="product-subtotal">
                                                $&nbsp;{{$product->quantity*$product->price}}
                                            </td>                                            
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
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