<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class categoria extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();
        DB::table('categories')->insert([
        	[ 
        		'name'    => 'Anillos',
    	        'slug'    =>'anillos',
                'activo'  => 0,	                
        	],
            [ 
                'name'    =>'Pulseras',
                'slug'    =>'pulseras',
                'activo'  => 0,                  
            ],
            [ 
                'name'    =>'Collares',
                'slug'    =>'collares',
                'activo'  => 0,                  
            ],
            [ 
                'name'    =>'Cadenas',
                'slug'    =>'cadenas',
                'activo'  => 0,                  
            ],
            [ 
                'name'    =>'Colgantes',
                'slug'    =>'colgantes',
                'activo'  => 0,                  
            ],
            [ 
                'name'    =>'Pendientes',
                'slug'    =>'pendientes',
                'activo'  => 0,                  
            ],
            [ 
                'name'    =>'Joyas con diamantes',
                'slug'    =>'joyas',
                'activo'  => 0,                  
            ]
        ]);


        DB::table('images')->truncate();
        $products=\App\Product::get();          
        foreach ($products as $product) { 
            

            $product->img='https://segadeoro.s3.us-east-2.amazonaws.com/segadeoro/thum/p'.rand(1,8).'.jpg';
            $product->save();
            
            DB::table('images')->insert([
                [ 
                    'img' => 'https://segadeoro.s3.us-east-2.amazonaws.com/segadeoro/thum/p'.rand(1,8).'.jpg',
                    'thum' => $product->img,
                    'activo' => 1,
                    'so_products_id'=>$product->id                  
                ],
                [ 
                    'img' => 'https://segadeoro.s3.us-east-2.amazonaws.com/segadeoro/img/p'.rand(1,8).'.jpg',
                    'thum' => 'https://segadeoro.s3.us-east-2.amazonaws.com/segadeoro/thum/p'.rand(1,8).'.jpg',
                    'activo' => 0,
                    'so_products_id'=>$product->id                  
                ],
                [ 
                    'img' => 'https://segadeoro.s3.us-east-2.amazonaws.com/segadeoro/img/p'.rand(1,8).'.jpg',
                    'thum' => 'https://segadeoro.s3.us-east-2.amazonaws.com/segadeoro/thum/p'.rand(1,8).'.jpg',
                    'activo' => 0,
                    'so_products_id'=>$product->id                  
                ],
                [ 
                    'img' => 'https://segadeoro.s3.us-east-2.amazonaws.com/segadeoro/img/p'.rand(1,8).'.jpg',
                    'thum' => 'https://segadeoro.s3.us-east-2.amazonaws.com/segadeoro/thum/p'.rand(1,8).'.jpg',
                    'activo' => 0,
                    'so_products_id'=>$product->id                  
                ],
                [ 
                    'img' => 'https://segadeoro.s3.us-east-2.amazonaws.com/segadeoro/img/p'.rand(1,8).'.jpg',
                    'thum' => 'https://segadeoro.s3.us-east-2.amazonaws.com/segadeoro/thum/p'.rand(1,8).'.jpg',
                    'activo' => 0,
                    'so_products_id'=>$product->id                  
                ]            
            ]);
            echo $product->img."\n";
        }

        DB::table('sliders')->truncate();
        DB::table('sliders')->insert([
            
            'tipo'=>1,
            'img'=>'https://segadeoro.s3.us-east-2.amazonaws.com/segadeoro/img/55b0debdb8641f_descuento-anillos.jpg',
            'content'=>nl2br('ANILLO 
            SHIRE TENNESSEE 
            EN DESCUENTO'),
            'text_color'=>'#d2e30e',
            'href'=>'http://localhost/segade_oro/public/anillos/pulseras-ton-new-york-shire-tennessee',
            'activo'=>1,
            'created_at'=>'2018-05-30 03:41:01',
            'updated_at'=>'2018-05-31 00:24:51'
        ] );

        DB::table('sliders')->insert([
            
            'tipo'=>1,
            'img'=>'https://segadeoro.s3.us-east-2.amazonaws.com/segadeoro/img/55b0de71fd42e0_anillo-tun-en-descuento.jpg',
            'content'=>nl2br('ANILLO 
            DE 
            DIAMANTE 
            OFERTON DEL DIA'),
            'text_color'=>'#e00000',
            'href'=>'http://localhost/segade_oro/public/colgantes/cadenas-town-connecticut-view-vermont',
            'activo'=>1,
            'created_at'=>'2018-05-30 03:49:54',
            'updated_at'=>'2018-05-31 00:24:36'
        ] );

        DB::table('sliders')->insert([
            
            'tipo'=>0,
            'img'=>'https://segadeoro.s3.us-east-2.amazonaws.com/segadeoro/img/55b0eeed877eed_dawdadawddawddawdd.jpg',
            'content'=>nl2br('dawda
            dawddd'),
            'text_color'=>'#eb0e0e',
            'href'=>'https://www.google.co.ve',
            'activo'=>1,
            'created_at'=>'2018-05-30 22:35:10',
            'updated_at'=>'2018-05-31 00:34:05'
        ] );

        DB::table('sliders')->insert([
            
            'tipo'=>0,
            'img'=>'https://segadeoro.s3.us-east-2.amazonaws.com/segadeoro/img/55b0ef49bac189_slider-pequeno-prueba.jpg',
            'content'=>nl2br('slider 
            pequeño 
            pruebad'),
            'text_color'=>'#ffffff',
            'href'=>'https://www.google.co.ve',
            'activo'=>0,
            'created_at'=>'2018-05-30 22:59:45',
            'updated_at'=>'2018-05-31 00:34:05'
        ]);

        DB::table('sliders')->insert([
            
            'tipo'=>0,
            'img'=>'https://segadeoro.s3.us-east-2.amazonaws.com/segadeoro/img/55b0f066b64116_asd.jpg',
            'content'=>nl2br('asd'),
            'text_color'=>'#0dfa16',
            'href'=>'asd',
            'activo'=>1,
            'created_at'=>'2018-05-31 00:15:46',
            'updated_at'=>'2018-05-31 00:22:28'
        ] );

        DB::table('pages')->truncate();
        DB::table('pages')->insert([            
            
            'title'=>'Quienes somos',     
            'slug'=>str_slug('Quienes somos'),
            'entry'=>'Sed aperiam iste nisi laudantium ut placeat nisi. Quae temporibus dolor quidem.',
            'content'=>
            '<h4 style="font-size: 1.2em; line-height: 1.3; text-align: justify;"></h4><h5 style="line-height: 2;"><span style="font-weight: bold;">Quiénes Somos</span><br>Segade oro es una empresa especializada en la compra venta de oro y plata y servicios financieros.<br>La empresa Segade oronace de la asociación y la experiencia de unos profesionales especializados en el sector de la joyería y la inversión.<br>Esta unión ha conseguido profesionalizar la actividad de la compra y venta de oro y plata, dando lugar a una nueva imagen del sector con unos valores de;<br><span style="font-weight: bold;">Seriedad, Seguridad y Confianza.</span><br>Los clientes que tratan con <span style="text-align: start;">Segade oro</span><span style="text-align: start;">se sienten seguros y confiados de nuestra profesionalidad y agradecen la transparencia con la que les atendemos en nuestras agencias, algo indispensable para el presente y futuro de nuestra marca.<br></span><span style="text-align: start;">La imagen y los servicios que ofrecemos van más allá de un “compra venta de oro” o “compro oro”.<br></span>Nos identifican como una agencia nacional dedicada al oro gracias a nuestro proyecto sólido y serio.</h5><h4 style="line-height: 2; text-align: justify;"></h4><h4 style="line-height: 2; text-align: justify;"></h4><p class="pGeneral" align="center" style="line-height: 1.3; text-align: center;"></p>',

            'main_img'=>'https://segadeoro.s3.us-east-2.amazonaws.com/segadeoro/img/55b0debdb8641f_descuento-anillos.jpg',
        ] );
        DB::table('pages')->insert([            
            
            'title'=>'Compra de oro',     
            'slug'=>str_slug('Compra de oro'),
            'entry'=>'Sed aperiam iste nisi laudantium ut placeat nisi. Quae temporibus dolor quidem.',

            'content'=>
            '<div><h5 style="line-height: 2; margin: 0px 0px 5px;"><span style="color: rgb(231, 148, 57); background-color: rgb(255, 255, 255); font-weight: bold;">¿QUÉ COMPRAMOS?</span></h5></div><ul><li style="line-height: 2;">Compramos <span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px; font-weight: 700; margin-bottom: 0px;">relojes</span><span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px;"> </span><span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px;">de primeras marcas como Patek Philippe, Audemars Piguet, Rolex, Panerai, IWC, Richard Mille, Hublot y muchas más. Destacamos modelos de relojes como Rolex GMT MASTER II, Rolex Deepsea, Patek Philippe Calatrava, Audemars Piguet Royal Oak Offshore, Panerai Radiomir, IWC TOP GUN, Hublot King Power, Omega Seamaster Aqua Terra, Tag Heuer Aquaracer…</span><br></li><li style="line-height: 2;">Compramos<span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px;"> </span><span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px; font-weight: 700; margin-bottom: 0px;">joyas de oro al peso</span><span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px;">: chatarra de oro, anillos de oro, pendientes de oro, cadenas de oro, pulsera de oro, colgantes de oro… Todo lo que no sea de una firma prestigiosa.</span><br></li><li style="line-height: 2;">Compra de<span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px; font-weight: 700; margin-bottom: 0px;"> Joyas de oro de firma</span><span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px;">: anillos Bulgari Bzero, anillos Cartier Love, pulseras Cartier Love, anillos de diamantes Tiffany & CO, anillos Bulgari Serpenti, pendientes Bulgari Serpenti….</span><br></li><li style="line-height: 2;">Compramos<span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px; font-weight: 700; margin-bottom: 0px;"> diamantes</span><span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px;"> </span><span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px;">tallados y certificados.</span><br></li><li style="line-height: 2;">Compramos<span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px;"> </span><span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px; font-weight: 700;">plumas</span><span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px;"> </span><span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px; font-weight: 700; margin-bottom: 0px;">estilográficas Montblanc</span><span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px;"> </span><span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px;">de ediciones limitadas: compra de plumas Montblanc Leonardo Da Vinci, plumas Montblanc Lorenzo de Medici, plumas Montblanc FP Dragon, plumas William Shakespeare…</span><br></li><li style="line-height: 2;">Compramos<span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px;"> </span><span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px; font-weight: 700; margin-bottom: 0px;">bolsos Hermes</span><span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px;"> </span><span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px;">entre los que destacamos los modelos: Hermes Birkin, Hermes Kelly y Hermes Jypsiere.</span><br></li></ul><div style="line-height: 2;"><span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px;"><br></span></div><div style="line-height: 2;"><h5 style="line-height: 2; margin: 0px 0px 5px;"><span style="color: rgb(231, 148, 57); font-weight: bold;">¿QUÉ VENDEMOS?</span></h5></div><div style="line-height: 2;"><ul><li style="line-height: 2;">Vendemos<span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px; font-weight: 700; margin-bottom: 0px;"> Relojes</span><span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px;"> </span><span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px;">de primeras marcas como Audemars Piguet, Rolex, Panerai, IWC, Richard Mille, Hublot… Destacamos modelos como: Rolex Submariner, Rolex Daytona, Audemars Piguet Royal Oak, Panerai Luminor, IWC Portuguese, Hublot Big Bang, Omega Speedmaster, Tag Heuer Carrera…</span><br></li><li style="line-height: 2;">Vendemos<span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px; font-weight: 700;"> Joyas de oro: </span><span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px;">anillos de oro,</span><span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px;"> </span><a href="https://www.pawnshop.es/bulgari-segunda-mano-relojes-joyas-pendientes-anillos/" style="text-align: justify; font-family: Raleway; font-size: 15px; background-color: rgb(255, 255, 255); background-position: 0px 0px; color: rgb(132, 132, 132); transition: all 0.4s ease 0s; margin-bottom: 0px;">pendientes de oro de segundamano</a><span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px;">, cadenas de oro, pulseras de oro…. Todo lo que no sea de una firma prestigiosa.</span><br></li><li style="line-height: 2;">Vendemos<span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px;"> </span><span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px; font-weight: 700; margin-bottom: 0px;">Joyas de oro de firma</span><span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px;">:anillo Bulgari Bzero, anillo Cartier Love, pulsera Cartier Love, anillo de diamantes Tiffany & CO , anillo Bulgari Serpenti, pendientes Bulgari Serpenti…</span><br></li><li style="line-height: 2;">Vendemos<span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px;"> </span><span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px; font-weight: 700; margin-bottom: 0px;">diamantes</span><span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px;"> </span><span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px;">tallados y certificados: diamantes talla brillante, diamantes talla pera, diamantes talla oval…</span><br></li><li style="line-height: 2;">Vendemos <a href="https://www.pawnshop.es/compraventa-plumas-estilograficas-comprar-vender-madrid/" target="_blank" style="text-align: justify; font-family: Raleway; font-size: 15px; background-color: rgb(255, 255, 255); background-position: 0px 0px; color: rgb(132, 132, 132); transition: all 0.4s ease 0s; margin-bottom: 0px;"><span style="font-weight: 700; margin-bottom: 0px;">Plumas estilográficas</span> </a><span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px;"> Montblanc de ediciones limitadas: venta de plumas Montblanc Leonardo Da Vinci, plumas Montblanc Lorenzo de Medici, plumas Montblanc FP Dragon…</span><br></li><li style="line-height: 2;">Vendemos<span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px; font-weight: 700; margin-bottom: 0px;"> bolsos Hermes </span><span style="text-align: justify; color: rgb(37, 37, 37); font-family: Raleway; font-size: 15px;">entre los que destacamos los modelo Hermes Birkin, Hermes Kelly y Hermes Jypsiere.</span><br></li></ul></div>',

            'main_img'=>'https://segadeoro.s3.us-east-2.amazonaws.com/segadeoro/img/55b0debdb8641f_descuento-anillos.jpg',
        ] );

        DB::table('pages')->insert([            
            
            'title'=>'Empeño',     
            'slug'=>str_slug('Empeño'),
            'entry'=>'Sed aperiam iste nisi laudantium ut placeat nisi. Quae temporibus dolor quidem.',

            'content'=>
            '<div class="vc_row wpb_row vc_row-fluid" style="margin-left: -15px; margin-right: -15px;"><div class="row-container" style=""><div class="wpb_column vc_column_container vc_col-sm-12" style="width: 1200px; position: relative; min-height: 1px; padding-left: 0px; padding-right: 0px; float: left;"><div class="vc_column-inner " style="padding-left: 15px; padding-right: 15px; width: 1200px;"><div class="wpb_wrapper" style=""><div class="wpb_text_column wpb_content_element " style="margin-bottom: 35px;"><div class="wpb_wrapper" style="margin-bottom: 0px;"><h5 style="line-height: 2;"><span style="color: rgb(0, 0, 0);">Lo definido como “empeño” es la venta con opción a recompra. Consiste en dejar sus artículos custodiados en nuestras instalaciones por los cuales obtiene una liquidez instantánea, previa tasación por parte de nuestro personal. Se pactan unas condiciones en las cuales se especifica la cuota a pagar mensualmente por el almacenamiento y custodia de sus productos y el tiempo pactado para su posible recuperación.<br></span><span style="color: rgb(0, 0, 0);">Nuestra empresa dispone de un seguro total en caso de robo, por lo que sus artículos quedan totalmente asegurados.<br></span><span style="color: rgb(0, 0, 0);">¿QUÉ EMPEÑAMOS?<br></span>Empeñamos <span style="color: rgb(0, 0, 0); margin-bottom: 0px;">relojes de primeras marcas</span><span style="color: rgb(0, 0, 0);"> como Patek Philippe, Audemars Piguet, Rolex, Panerai, IWC, Richard Mille, Hublot y muchas más. Destacamos modelo como: Rolex Daytona Paul Newman, Rolex Milgauss, Audemars Piguet Royal Oak, Patek Philippe Nautilus, Panerai Luminor Marina, IWC Portuguese Yatch Club, Hublot Big Bang Capuccino, Omega Constellation Double Eagle, Tag Heuer Carrera Calibre 16, etc<br></span>Joyas de oro <span style="color: rgb(0, 0, 0); margin-bottom: 0px;">al peso</span><span style="color: rgb(0, 0, 0);">: anillos de oro, pendientes de oro, cadenas de oro, pulsera de oro, chatarra de oro…. Todo lo que no sea de una firma prestigiosa.<br></span>Empeñamos <span style="color: rgb(0, 0, 0); margin-bottom: 0px;">Joyas de oro de firma</span><span style="color: rgb(0, 0, 0);">: anillos Bulgari Bzero, anillos Cartier Love, pulseras Cartier Love, anillo de diamantes Tiffany & CO, anillos Bulgari Serpenti, pendientes Bulgari Serpenti….<br></span>Empeñamos<span style="color: rgb(0, 0, 0); margin-bottom: 0px;"> diamantes</span><span style="color: rgb(0, 0, 0);"> tallados y certificados.<br></span>Empeñamos plumas estilográficas <span style="color: rgb(0, 0, 0); margin-bottom: 0px;">Montblanc</span><span style="color: rgb(0, 0, 0);"> de ediciones limitadas: plumas Montblanc Leonardo Da Vinci, plumas Montblanc Lorenzo de Medici, plumas Montblanc FP Dragon…<br></span>Empeñamos <span style="color: rgb(0, 0, 0); margin-bottom: 0px;">bolsos Hermes</span><span style="color: rgb(0, 0, 0);"> entre los que destacamos los modelos Hermes Birkin, Hermes Kelly y Hermes Jypsiere.</span></h5></div></div></div></div></div></div></div>',

            'main_img'=>'https://segadeoro.s3.us-east-2.amazonaws.com/segadeoro/img/55b0debdb8641f_descuento-anillos.jpg',
        ] );


        
    }
}
