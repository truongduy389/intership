@extends('layout/server')
@section('title', 'Thêm mới sản phẩm')
@section('server')
    <form action="{{ route('tao-san-pham') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="table-left col-8">
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" name="name" class="form-control" placeholder="tên sản phẩm...">
                    @error('name')
                        <small class="help-block ml-2 text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Mã Sku</label>
                    <input type="text" name="sku" class="form-control" placeholder="Mã sản phẩm..">
                    @error('name')
                        <small class="help-block ml-2 text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="table-right col-4">
                {{-- <div class="form-group">
                    <label for="">Danh mục sản phẩm</label>
                    <select name="id_cate" class="form-control" id="">
                        <option>---Chọn danh mục của sản phẩm---</option>
                        @foreach ($data as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('id_cate')
                        <small class="help-block ml-2 text-danger">{{ $message }}</small>
                    @enderror
                </div> --}}
                <div class="form-group">
                    <label for="">Giá tiền</label>
                    <input type="number" min ="0" name="price" class="form-control" placeholder="Giá tiền sản phẩm...">
                    @error('price')
                        <small class="help-block ml-2 text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Số lượng</label>
                    <input type="number" min="0"name="quantity" class="form-control" placeholder="số lượng sản phẩm...">
                    @error('quantity')
                        <small class="help-block ml-2 text-danger">{{ $message }}</small>xx
                    @enderror
                </div>
                <div class="form-group">
                    <select class="form-select" name="cate_id" aria-label="Default select example "    >
                    <option selected>Select Category</option>
                    <option value="1">Áo</option>
                    <option value="2">Tranh</option>
                </select>
                </div>
                <div class="form-group">
                    <select class="form-select" name="idSize" aria-label="Default select example "    >
                    <option selected>Select Size</option>
                    @foreach($dataSize as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                </div>
                <select class="form-select" name="idColor" aria-label="Default select example "    >
                    <option selected>Select color</option>
                    @foreach($dataColor as $item )
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                    <hr>
                

                <div class="form-group">
                    <label for="">Hình ảnh mặt trước</label>
                    <input type="file" name="before" class="form-control">
                    @error('file_image')
                        <small class="help-block ml-2 text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Hình ảnh mặt sau</label>
                    <input type="file" name="after" class="form-control">
                    @error('file_image')
                        <small class="help-block ml-2 text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="functionServer pr">
            <a href="{{ route('san-pham') }}" class="btn btn-primary mr-4"><i class="fas fa-undo"></i> Quay về
                danh
                sách</a>
            <button type="submit" class="btn btn-success ml-2">Thêm <i class="fas fa-check-circle"></i></button>
        </div>

    </form>
@endsection
