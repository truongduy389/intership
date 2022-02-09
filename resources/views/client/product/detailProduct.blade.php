@extends('layout/server')
@section('title', 'Detail Product')
@section('server')
    <style>
        .product-title,
        .price,
        .sizes,
        .colors {
            text-transform: UPPERCASE;

        }

        .size {
            margin-right: 10px;

        }

        .size:first-of-type {
            margin-left: 40px;
        }

    </style>
    <div class="container">
        <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">
                        <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-1"><img class="ml-5" width="50%" id="changeimg"
                                    onclick="changeImage()"
                                    src="{{ asset('uploads/product') }}/{{ $productDetail->image_before }}" /></div>
                        </div>
                    </div>
                    <div class=" details col-md-6">
                        <h3 class="product-title">{{ $productDetail->name }}</h3>
                        <p class="product-description">decript.</p>
                        <h4 class="price">Current price: <span>{{ $productDetail->price }}</span>
                        </h4>
                        <h5 class="sizes">sizes:
                            @foreach ($sizeDetail as $size)
                                <span class="size border rounded-lg " data-toggle="tooltip" value="{{ $size['idSize'] }}"
                                    title="small"> {{ $size['name'] }}</span>
                            @endforeach
                        </h5>
                        <h5 class="sizes">Color:
                            @foreach ($colorDetail as $color)
                                <span class="size border rounded-lg" data-toggle="tooltip" value="{{ $color['idColor'] }}"
                                    title="small"> {{ $color['name'] }}</span>
                            @endforeach
                        </h5>

                        <a href="/edit/{{ $productDetail->id }}" class="btn btn-success">Start</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function changeImage() {

            if (document.getElementById("changeimg").src ==
                "{{ asset('uploads/product') }}/{{ $productDetail->image_before }}") {
                document.getElementById("changeimg").src =
                    "{{ asset('uploads/product') }}/{{ $productDetail->image_after }}";
            } else {
                document.getElementById("changeimg").
                src = "{{ asset('uploads/product') }}/{{ $productDetail->image_before }}";
            }
        }
    </script>
@endsection
