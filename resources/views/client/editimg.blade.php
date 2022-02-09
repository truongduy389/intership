@extends('layout/server')
@section('title', 'Sửa sản phẩm')
@section('css')
    <style>
        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #fff;
            background-color: #6c757d;
        }

    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
@endsection
@section('server')
    <div class="card-body">
        <div class="row mb-5 ">
            <div class="col-md-6 col-sm-6 col-6"><a href="#"><i class="fas fa-arrow-left"></i> Back to Dashboard</a></div>
            <div class="col-md-3 col-sm-6 col-6">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-edit-tab" data-toggle="pill" href="#pills-edit" role="tab"
                            aria-controls="pills-eidt" aria-selected="true">Edit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                            aria-controls="pills-profile" aria-selected="false">Review</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter">
                    Price & Variant
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="size">Size</label>
                                    <select multiple class="form-control" name="size" id="size">
                                        @foreach ($sizeDetail as $size)
                                            <option value="{{ $size['name'] }}">{{ $size['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="color">Color</label>
                                    <select multiple class="form-control" name="color" id="color">
                                        @foreach ($colorDetail as $color)
                                            <option value="{{ $color['name'] }}">{{ $color['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content col-md-12" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-edit" role="tabpanel" aria-labelledby="pills-edit-tab">
                    <div class="row">
                        <div class="col-md-5 offset-md-1">
                            <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-front-tab" data-toggle="pill" href="#pills-front"
                                        role="tab" aria-controls="pills-front" aria-selected="true">Front</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-back-tab" data-toggle="pill" href="#pills-back"
                                        role="tab" aria-controls="pills-back" aria-selected="false">Back</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-front" role="tabpanel"
                                    aria-labelledby="pills-front-tab">
                                    <img id="Ftshirt" src="{{ asset('uploads/product') }}/{{ $data->image_before }}"
                                        class="card-img-top" alt="..." style="height: 250px; display:none">
                                    <canvas id="front" class="front"></canvas>
                                </div>

                                <div class="tab-pane fade" id="pills-back" role="tabpanel"
                                    aria-labelledby="pills-back-tab">
                                    <img id="Btshirt" src="{{ asset('uploads/product') }}/{{ $data->image_after }}"
                                        class="card-img-top" alt="..." style="height: 250px; display:none">
                                    <canvas id="back" class="back"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div id="color_edit"  class="col-md-12">
                                <div class="card">
                                    <small class="mt-3 ml-3">Colors</small>
                                        <div class="row">
                                            <div class="col  ml-3">
                                                <a class="text-decoration-none m-3" style="width:20px" href="#">
                                                    <div style="border-radius: 50px !important; -moz-border-radius 10px; -webkit-border-radius 10px; width: 40px; height: 40px; background: black; border: solid black 1px;">&nbsp;</div>
                                                </a>
                                            </div>
                                            <div class="col  ml-3">
                                                <a class="text-decoration-none m-3" style="width:20px" href="#">
                                                    <div style="border-radius: 50px !important; -moz-border-radius 10px; -webkit-border-radius 10px; width: 40px; height: 40px; background: black; border: solid black 1px;">&nbsp;</div>
                                                </a>
                                            </div><div class="col  ml-3">
                                                <a class="text-decoration-none m-3" style="width:20px" href="#">
                                                    <div style="border-radius: 50px !important; -moz-border-radius 10px; -webkit-border-radius 10px; width: 40px; height: 40px; background: black; border: solid black 1px;">&nbsp;</div>
                                                </a>
                                            </div>
                                            <div class="col  ml-3">
                                                <a class="text-decoration-none m-3" style="width:20px" href="#">
                                                    <div style="border-radius: 50px !important; -moz-border-radius 10px; -webkit-border-radius 10px; width: 40px; height: 40px; background: black; border: solid black 1px;">&nbsp;</div>
                                                </a>
                                            </div>
                                            <div class="col  ml-3">
                                                <a class="text-decoration-none m-3" style="width:20px" href="#">
                                                    <div style="border-radius: 50px !important; -moz-border-radius 10px; -webkit-border-radius 10px; width: 40px; height: 40px; background: black; border: solid black 1px;">&nbsp;</div>
                                                </a>
                                            </div>
                                            <div class="col  ml-3">
                                                <a class="text-decoration-none m-3" style="width:20px" href="#">
                                                    <div style="border-radius: 50px !important; -moz-border-radius 10px; -webkit-border-radius 10px; width: 40px; height: 40px; background: black; border: solid black 1px;">&nbsp;</div>
                                                </a>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div id="edit_img" style="display: none" class="col-md-12">
                                <div class="card">
                                    <h5 class="mt-3 ml-3">Your Design</h5>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <span> Size</span>
                                            </div>
                                            <div class="col-md-5 input-group mb-3">

                                                <div class="col-md-5 input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" style="width: 70px">Dài</span>
                                                    </div>
                                                    <input type="number" id="s-width" class="form-control"
                                                        aria-label="Amount (to the nearest dollar)">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Cm</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-5 input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-center"
                                                            style="width: 70px">Rộng</span>
                                                    </div>
                                                    <input type="number" id="s-height" class="form-control"
                                                        aria-label="Amount (to the nearest dollar)">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Cm</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <Span> Transform</span>
                                                </div>
                                                <div class="col-md-5 input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" style="width: 70px">Rotate</span>
                                                    </div>
                                                    <input type="number" class="form-control" name="rotate" id="rotate"
                                                        aria-label="Amount (to the nearest dollar)">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Deg</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-5 input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" style="width: 70px">Tỉ lệ</span>
                                                    </div>
                                                    <input type="number" id="scale" min="0" max="50" class="form-control"
                                                        aria-label="Amount (to the nearest dollar)">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <Span> Positioning</span>
                                                </div>
                                                <div class="col-md-5 input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" style="width: 70px">Trái</span>
                                                    </div>
                                                    <input type="number" id="pleft" class="form-control"
                                                        aria-label="Amount (to the nearest dollar)">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-5 input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" style="width: 70px">Trên</span>
                                                    </div>
                                                    <input type="number" id="ptop" class="form-control"
                                                        aria-label="Amount (to the nearest dollar)">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <Span> Align</span>
                                                </div>
                                                <div class="col-md-5 input-group mb-3">
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <button type="button" id="goLeft" class="btn btn-secondary"><i
                                                                class="bi bi-arrow-bar-left"></i></button>
                                                        <button type="button" id="goCenter" class="btn btn-secondary"><i
                                                                class="bi bi-align-center"></i></button>
                                                        <button type="button" id="goRight" class="btn btn-secondary"><i
                                                                class="bi bi-arrow-bar-right"></i></button>
                                                    </div>
                                                </div>
                                                <div class="col-md-5 input-group mb-3">
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <button type="button" id="goTop" class="btn btn-secondary"><i
                                                                class="bi bi-arrow-bar-up"></i></button>
                                                        <button type="button" id="goMiddle" class="btn btn-secondary"><i
                                                                class="bi bi-align-middle"></i></button>
                                                        <button type="button" id="goBot" class="btn btn-secondary"><i
                                                                class="bi bi-arrow-bar-down"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="edit_img_back" style="display: none" class="col-md-12">
                                <div class="card">
                                    <h5>Your Design</h5>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <span> Size</span>
                                            </div>
                                            <div class="col-md-5 input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" style="width: 70px">Dài</span>
                                                </div>
                                                <input type="number" id="s-width-back" class="form-control"
                                                    aria-label="Amount (to the nearest dollar)">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Cm</span>
                                                </div>
                                            </div>
                                            <div class="col-md-5 input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-center"
                                                        style="width: 70px">Rộng</span>
                                                </div>
                                                <input type="number" id="s-height-back" class="form-control"
                                                    aria-label="Amount (to the nearest dollar)">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Cm</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <Span> Transform</span>
                                            </div>
                                            <div class="col-md-5 input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" style="width: 70px">Rotate</span>
                                                </div>
                                                <input type="number" class="form-control" name="rotate" id="rotate-back"
                                                    aria-label="Amount (to the nearest dollar)">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Deg</span>
                                                </div>
                                            </div>
                                            <div class="col-md-5 input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" style="width: 70px">Tỉ lệ</span>
                                                </div>
                                                <input type="number" id="scale-back" min="0" max="50"
                                                    class="form-control" aria-label="Amount (to the nearest dollar)">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <Span> Positioning</span>
                                            </div>
                                            <div class="col-md-5 input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" style="width: 70px">Trái</span>
                                                </div>
                                                <input type="number" id="pleft-back" class="form-control"
                                                    aria-label="Amount (to the nearest dollar)">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </div>
                                            <div class="col-md-5 input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" style="width: 70px">Trên</span>
                                                </div>
                                                <input type="number" id="ptop-back" class="form-control"
                                                    aria-label="Amount (to the nearest dollar)">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <Span> Align</span>
                                            </div>
                                            <div class="col-md-5 input-group mb-3">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button type="button" id="goLeft-back" class="btn btn-secondary"><i
                                                            class="bi bi-arrow-bar-left"></i></button>
                                                    <button type="button" id="goCenter-back" class="btn btn-secondary"><i
                                                            class="bi bi-align-center"></i></button>
                                                    <button type="button" id="goRight-back" class="btn btn-secondary"><i
                                                            class="bi bi-arrow-bar-right"></i></button>
                                                </div>
                                            </div>
                                            <div class="col-md-5 input-group mb-3">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button type="button" id="goTop-back" class="btn btn-secondary"><i
                                                            class="bi bi-arrow-bar-up"></i></button>
                                                    <button type="button" id="goMiddle-back" class="btn btn-secondary"><i
                                                            class="bi bi-align-middle"></i></button>
                                                    <button type="button" id="goBot-back" class="btn btn-secondary"><i
                                                            class="bi bi-arrow-bar-down"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="row">
                        <div class="col-md-5">
                            <a href="#"><img id="done-product" class=""
                                    src="{{ asset('uploads/product') }}/{{ $data->image_before }}" height="400px"
                                    width="400px" alt="" srcset=""> </a>
                        </div>
                        <div class="col-md-5">
                            <a href="#"><img id="done-product1" class=""
                                    src="{{ asset('uploads/product') }}/{{ $data->image_after }}" height="400px"
                                    width="400px" alt="" srcset=""> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form id="upimg" action="" method="post" enctype="multipart/form-data">
            @csrf
            <div id="insert_img" class="col-md-12">
                <div class="fileUploadInput" style="display: block">
                    <label>✨ Add design from..</label>
                    <input type="file" name="imgs" id="file">
                    <input type="text" name="idcate" style="display: none" value="{{ $data->cate_id }}" id="idcate">
                    <button><i class="bi bi-cloud-arrow-up"></i></button>
                </div>
            </div>
            <div id="insert_img1" style="display: none" class="col-md-12">
                <div class="fileUploadInput">
                    <label>✨ Add design from..</label>
                    <input type="file" name="imgs1" id="fileback">
                    <input type="text" name="idcate" style="display: none" value="{{ $data->cate_id }}" id="idcate">
                    <button><i class="bi bi-cloud-arrow-up"></i></button>
                </div>
            </div>
        </form>
        <input type="text" name="name" id="name" style="display: none" value="{{ $data->name }}">
        <input type="text" id="imgEdited" hidden name="front">
        <input type="text" id="imgEditeds" hidden name="back">
        <input type="text" name="status" style="display: none" value="0">
        <button style="width: 30%;margin-top:50px" onclick="uphost()" type="submit"
            class="btn btn-success btnUpdates mr-4 float-right">Save
            Product</button>
    </div>

@endsection
@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/460/fabric.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/javascript-canvas-to-blob/3.29.0/js/canvas-to-blob.js"></script>
    <script src="{{ asset('server') }}/newAdd/editImg.js"></script>
    <script src="{{ asset('server') }}/newAdd/uphost.js"></script>
    {{-- <scrip>
        function dataURLtoFile(dataurl, filename) {
        var arr = dataurl.split(','),
        mime = arr[0].match(/:(.*?);/)[1],
        bstr = atob(arr[1]),
        n = bstr.length,
        u8arr = new Uint8Array(n);

        while (n--) {
        u8arr[n] = bstr.charCodeAt(n);
        }

        return new File([u8arr], filename, {
        type: mime
        });
        }
        $(document).ready(function(e) {
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
    </script> --}}
@endsection
