<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codexshaper\WooCommerce\Facades\Product;
use Automattic\WooCommerce\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class CreateProductController extends Controller
{
    public function postSp(Request $request, $id)
    {

        $woocommerce = new Client(
            'http://devahitcorp.pw/food/', 
            'ck_e0144ec180726f568dfe16408832d2b398a51555', 
            'cs_97f9bddba5cc1fc69ccaf23bd87e3f69c4465ffe',
            [
                'version' => 'wc/v3',
                'timeout' => 400
            ]
        );

        $attributes = $woocommerce->get('products/attributes');
        $attr = collect($attributes);
        foreach($attr as $value){
            $terms[$value->name]= $woocommerce->get('products/attributes/'.$value->id.'/terms');
        }
        $img = Http::get("https://phamxuanduc.000webhostapp.com/api/image/show/".$id);
        $imgDone = json_decode($img);

        return view('client.store', compact('imgDone','terms'));
    }

// ======================================================================= //
// ======================================================================= //
// ======================================================================= //


    public function postWp(Request $request){
        $data = $request->all();
        
        $woocommerce = new Client(
            'http://devahitcorp.pw/food/', 
            'ck_e0144ec180726f568dfe16408832d2b398a51555', 
            'cs_97f9bddba5cc1fc69ccaf23bd87e3f69c4465ffe',
            [
                'version' => 'wc/v3',
                'timeout' => 4000
            ]
        );
        
        if($data['type'] == 'simple'){
            $input = [
                'name' => $data['name'],
                'type' => 'simple',
                'regular_price' =>(string) $data['price'],
                'description' => $data['description'],
                'short_description' => $data['short_description'],
                'categories' => [
                    [
                        'id' => 9
                    ],
                    [
                        'id' => 14
                    ]
                ],
                'images' => [
                    [
                        'src' => $data['imageSP'],
                    ],
                   
                ]
            ];
            
            $upWp = $woocommerce->post('products', $input);
            if($upWp){
                return redirect()->route('san-pham')->with('success','Upload Wordpress to successful');
            }
            
        }
        else{
            if($data['type'] == 'variable'){
                
                $input = [
                    'name' => $data['name'] ,
                    'type' => 'variable',
                    'description' => $data['description'],
                    'short_description' => 'cc',
                    'categories' => [
                        [
                            'id' => 2
                        ]
                        
                    ],
                    'images' => [
                        [
                            'src' => $data['imageSP'],
                            'position' => 0,
                        ]
                       
                    ],
                    
                    'attributes'  => [
                        [
                        'name' => 'Color',
                        'variation' => true,
                        'visible'   => true,
                        'options'   =>[
                            'Đỏ','Tím','Xanh','Xám'
                            ],
                        ],
                        [
                            'name' => 'Size',
                            'variation' => true,
                            'visible'   => true,
                            'options'   =>[
                                'S','5XL','XL','XXL'
                                ],
                        ],
                    ]
                    
                ];
                
                foreach((object)$data['attribute'] as $key => $value){
                    $attr[]= [
                        'name' => $key,
                        'variation' => true,
                        'visible'   => true,
                        'options'   =>$value,
                    ];
                };
                
                $postWp = $woocommerce->post('products', $input);
                $product_id = $postWp->id;
                $product_price = $postWp->price;
                $product_img = $postWp->images;
                $img_product = [];
                foreach($product_img as $value){
                    $img_product = $value->src;
                }

                
                $variation_data = [
                    
                    [
                        'regular_price' =>'1356.00',
                        'sku' => '1',
                        'sale_price' => '1233.00',
                        'image'         => [
                            'src' => $img_product,
                        ],
                        
                        'attributes'    => [
                            [
                                'name'     => 'Color',
                                'option' => 'Đen',
                            ],
                            [
                                'name'     => 'Size',
                                'option' => 'X'
                            ],
                        ],
                    ]
                    ,
                    [
                        'regular_price' =>'1356.00',
                        'sku' => '2',
                        'sale_price' => '1000.00',
                        'image'         => [
                            'src' => $img_product,
                        ],
                        
                        'attributes'    => [
                            [
                                'name'     => 'Color',
                                'option' => 'Tím',
                            ],
                            [
                                'name'     => 'Size',
                                'option' => 'XL'
                            ],
                        ],
                    ],
                    [
                        'regular_price' =>'1356.00',
                        'sku' => '4',
                        'sale_price' => '536.00',
                        'image'         => [
                            'src' => $img_product,
                        ],
                        
                        'attributes'    => [
                            [
                                'name'     => 'Color',
                                'option' => 'Tím',
                            ],
                            [
                                'name'     => 'Size',
                                'option' => '5XL'
                            ],
                        ],
                    ]
                ];
                foreach($variation_data as $value){
                    $upWp = $woocommerce->post( "products/".$product_id."/variations", $value);
                }
                
                
                
                // if($upWp){
                //     return redirect()->route('san-pham')->with('success','Upload Wordpress to successful');
                // }
    
            }
            
        }  
    }
 

    
}
