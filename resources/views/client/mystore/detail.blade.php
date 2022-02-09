@extends('layout/server')
@section('title', '')
@section('server')
    <form action="{{route('postSp')}}" method="post">
        @csrf
        <div class="container">

            <div class="product-detail">
                <div class="product-header">
                    <div class="product-header-left">
                        <a href="{{ route('mystore') }}">
                            <div class="back-to-my-store">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-arrow-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                                </svg>
                                <span>Back to my store</span>
                            </div>
                        </a>
                        <div class="product-name-wrapper">
                            <h3 class="product-name-text">{{ $dataDetail['name'] }}</h3>
                        </div>
                        @if (Session::has('success'))
                            <div class="col-md-12">
                                <div class="alert alert-success">
                                {{ session('success') }}
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="product-header-right">
                        <div class="product-created-at">
                            <small>Last modified 10, Jan, 2022, 02:32 PM</small>
                            <small>Created 10, Jan, 2022, 02:32 PM</small>
                        </div>
                    </div>
                </div>
            </div>
            {{-- body product --}}
            <div class="section">
                <div class="product-mockups">
                    <div class="header">
                        <h4 class="title-1">Mockups</h4>
                    </div>
                    <div class="content-product">
                        <div class="selected-mockup-zoom">
                            <img src="https://phamxuanduc.000webhostapp.com/image/{{ $dataDetail['front'] }}"
                                class="initial-preview" alt="">
                        </div>
                        <div class="cameras-previews">
                            <h5>Select title image view</h5>
                            <div class="active-cameras">
    
                                <div class="mockup-preview">
                                    <img src="https://phamxuanduc.000webhostapp.com/image/{{ $dataDetail['front'] }}" alt=""
                                        class="front">
                                    <br>
    
                                    <div class="title-name">Front</div>
                                </div>
                                <div class="product-image-right">
                                    <div class="mockup-preview">
                                        <img src="https://phamxuanduc.000webhostapp.com/image/{{ $dataDetail['back'] }}"
                                            alt="" class="front">
                                        <br>
                                        <div class="title-name">Back</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- description --}}
            <div class="section">
                <div class="product-description">
                    <div class="header">
                        <div class="title-1">Description</div>
                    </div>
                    <div class="content">
                        <div class="title-2">
                            Product description
                        </div>
                        <p class="small-text">
                            <span class="small-text--black">Title*</span>
                        </p>
                        <div class="input-product-title">
                            <div class="input-group flex-nowrap">
                                <input type="text" name="title" class="form-control" placeholder="Username"
                                    value="{{ $dataDetail['name'] }}" aria-describedby="addon-wrapping">
                            </div>
                        </div>
                        <p class="small-text label-description">
                            <span class="small-text--black">Description</span>
                        </p>
                        <div class="text-editor-wrapper">
                            <textarea  id="" name="descript"  cols="124" rows="10"
                                class="form-controls-text">{{ $dataDetail['description'] }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                <div class="variants-table">
                    <h4 class="header">Variants</h4>
                    <div class="content">
                        <div class="content-header">
                            @if (Session::has('error'))
                                <div class="col-md-12">
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                </div>
                            @endif
                        </div>
                        <h5 class="title-2">Pricing</h5>
                        <div class="table-content-wrapper">
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Sku</th>
                                        <th scope="col">Size</th>
                                        <th scope="col">Color</th>
                                        <th scope="col">Inventory</th>
                                        <th scope="col">Cost</th>
                                        <th scope="col">Retail Price</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($dataMyStore as $item)
                                        @if( $item['id'] == $dataDetail['id'])
                                        <tr style="background-color: mistyrose;">
                                            <td >
                                                <div class="form-check">
                                                <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" name="check-id[]" value="{{$item['id']}}" aria-label="...">
                                              </div>
                                            </td>
                                            <th scope="row"><input type="text" name="sale-price" value="{{$item['sku']}}" id="sku{{$item['id']}}"></th>
                                            <th scope="row">{{$item['size']}}</th>
                                            <td>{{$item['color']}}</td>
                                            <td>All in stock</td>
                                            <td>{{$item['price']}}</td>
                                            <td><input type="text" name="sale-price" value="{{$item['saleprice']}}" id="sale-price{{$item['id']}}"></td>
                                            <input type="text" name="id" value="{{$item['id']}}" id="id" hidden>
                                            <td><a class="btn btn-danger"  onclick="updateAttr({{$item['id']}})">Cập nhật</a></td>
                                        </tr>
                                        @else
                                        <tr >
                                            <td >
                                                <div class="form-check">
                                                <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" name="check-id[]" value="{{$item['id']}}" aria-label="...">
                                              </div>
                                            </td>
                                            <th scope="row"><input type="text" name="sale-price" value="{{$item['sku']}}" id="sku{{$item['id']}}"></th>
                                            <th scope="row">{{$item['size']}}</th>
                                            <td>{{$item['color']}}</td>
                                            <td>All in stock</td>
                                            <td>{{$item['price']}}</td>
                                            <td><input type="text" name="sale-price" value="{{$item['saleprice']}}" id="sale-price{{$item['id']}}"></td>
                                            <input type="text" name="id" value="{{$item['id']}}" id="id" hidden>
                                            <td><a class="btn btn-danger"  onclick="updateAttr({{$item['id']}})">Cập nhật</a></td>
                                        </tr>
                                        @endif
                                    @endforeach
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                    <input type="text" name="src" value="https://phamxuanduc.000webhostapp.com/image/{{ $dataDetail['front'] }}" id="" hidden>
                    <input type="text" name="type" value="variable" id="" hidden>
                    <button type="submit" class=" btn btn-success text-right">
                        save
                    </button>
                
            </div>
    
        </div>
    </form>
    
@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="{{ asset('server') }}/newAdd/uphost.js"></script>
@endsection
