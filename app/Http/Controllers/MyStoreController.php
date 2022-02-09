<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codexshaper\WooCommerce\Facades\Product;
use Automattic\WooCommerce\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class MyStoreController extends Controller
{
    public function index()
    {
        $dataMyStore = HTTP::get('https://phamxuanduc.000webhostapp.com/api/image')->json();

        return view('client.mystore.index', compact('dataMyStore'));
    }
    public function details(Request $request, $id)
    {
        $dataDetail = HTTP::get("https://phamxuanduc.000webhostapp.com/api/image/show/" . $id)->json();
        $dataMyStore = HTTP::get('https://phamxuanduc.000webhostapp.com/api/image/parentid/' . $dataDetail['parentId'])->json();
        // $checkproduct = ['249','253'];
        // foreach ($checkproduct as $value) {
        //     $test[] = HTTP::get("https://phamxuanduc.000webhostapp.com/api/image/show/" . $value)->json();
        // }

        return view('client.mystore.detail', compact('dataDetail', 'dataMyStore'));
    }

    public function postWp(Request $request)
    {
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

        if (isset($data['check-id'])) {
            $check = count(collect($request)->get('check-id'));
            if ($check == 1) {
                $getProduct = HTTP::get("https://phamxuanduc.000webhostapp.com/api/image/show/" . $data['check-id'][0])->json();

                $input = [
                    'name' => $data['title'],
                    'type' => 'simple',
                    'sku' => $getProduct['sku'],
                    'regular_price' => (string) $getProduct['price'],
                    'sale_price' => (string) $getProduct['saleprice'],
                    'description' => $data['descript'],
                    'short_description' => 'cc',
                    'categories' => [
                        [
                            'id' => 74
                        ]
                    ],
                    'images' => [
                        [
                            'src' => 'https://phamxuanduc.000webhostapp.com/image/' . $getProduct['front'],
                        ],
                        [
                            'src' => 'https://phamxuanduc.000webhostapp.com/image/' . $getProduct['back'],
                        ]
                    ]
                ];

                $upWp = $woocommerce->post('products', $input);
                if ($upWp) {
                    return redirect()->route('details', ['id' => $data['id']])->with('success', 'Tải lên Woocommerce thành công');
                }
            } else {
                $input = [
                    'name' => $data['title'],
                    'type' => 'variable',
                    'description' => $data['descript'],
                    'short_description' => 'cc',
                    'categories' => [
                        [
                            'id' => 74
                        ]

                    ],
                    'images' => [
                        [
                            'src' => $data['src'],
                            'position' => 0,
                        ],
                    ],

                    'attributes'  => [
                        [
                            'name' => 'Color',
                            'variation' => true,
                            'visible'   => true,
                            'options'   => [
                                'Đen', 'Trắng'
                            ],
                        ],
                        [
                            'name' => 'Size',
                            'variation' => true,
                            'visible'   => true,
                            'options'   => [
                                'S', 'M', 'XL'
                            ],
                        ],
                    ]

                ];

                $postWp = $woocommerce->post('products', $input);
                $product_id = $postWp->id;
                //

                $checkproduct = $data['check-id'];

                foreach ($checkproduct as $value) {
                    $getProduct[] = HTTP::get("https://phamxuanduc.000webhostapp.com/api/image/show/" . $value)->json();
                }

                foreach ($getProduct as $item) {
                    $variant[] = [
                        'regular_price' => $item['price'],
                        'sku' => $item['sku'],
                        'sale_price' => $item['saleprice'],
                        'image'         => [
                            'src' => 'https://phamxuanduc.000webhostapp.com/image/' . $item['front']
                        ],

                        'attributes'    => [
                            [
                                'name'     => 'Color',
                                'option' => $item['color'],
                            ],
                            [
                                'name'     => 'Size',
                                'option' => $item['size'],
                            ],
                        ],
                    ];
                }

                foreach ($variant as $value) {
                    $upWp = $woocommerce->post("products/" . $product_id . "/variations", $value);
                }
                if ($upWp) {
                    return redirect()->route('details', ['id' => $data['id']])->with('success', 'Tải lên Woocommerce thành công');
                }
            }
        } else {
            return redirect()->route('details', ['id' => $data['id']])->with('error', 'Bạn chưa chọn sản phẩm tải lên');
        }
    }
}
