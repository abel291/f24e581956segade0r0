@extends('layouts.app')
@section('title', 'Apartado')
@section('content')
<div class="section pt-5 pb-10">
                    <div class="container">
                        
                        <div class="row">
                            <div data-wow-delay="0.3s" class="single-page-title text-center mb-6 wow fadeInUp" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                                    <h1 class="os-font">Productos a apartar</h1>
                                    <p class="dark-color">Por favor revisa tu orden cuidadosamente</p>
                                    <div class="heading-line"></div>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                @if(count($reserved_products)>0)
                                <table class="shop-table cart">
                                    <thead>
                                        <tr>                                     
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Productos</th>
                                            <th class="product-price">Precio</th>
                                            <th class="product-quantity">Cantidad</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($reserved_products as $product)
                                        <tr>
                                            
                                            <td class="product-thumbnail">
                                                <a target="_blanck" href="{{route('product',[$product->category,$product->slug])}}">
                                                    <img src="{{$product->img}}" alt="">
                                                </a>
                                            </td>
                                            <td class="product-name">
                                                <a href="{{route('product',[$product->category,$product->slug])}}l">{{$product->title}}
                                                </a>
                                            </td>
                                            <td class="product-price">
                                               €{{number_format($product->price,2)}}
                                            </td>
                                            <td class="product-quantity">
                                              {{$product->quantity}}
                                                
                                            </td>
                                            <td class="product-subtotal">
                                                €{{number_format($product->quantity*$product->price,2)}}
                                                
                                            </td>
                                            <td class="product-remove">
                                                <a href="{{route('remove',$product->id)}}" class="remove">×</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="6" class="actions">                                                
                                                <a href="{{route('checkout')}}" class="btn btn-color update-cart" name="update_cart">
                                                    Apartar orden
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                @else
                                <div class="padding-100"></div>
                                NO hay productos
                                
                                @endif
                                <div class="padding-100"></div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
