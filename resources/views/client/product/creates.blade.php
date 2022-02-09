@extends('layout/server')
@section('title', 'Thêm mới sản phẩm')
@section('server')
    <form action="{{ route('themSp') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="table-left col-8">


            </div>
            <div class="table-right col-4">

            </div>
            Select size &nbsp;&nbsp;&nbsp;
            {{-- <select class="form-select" name="name" aria-label="Default select example "    >
                    <option selected>Open this select menu</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                    <option value="32">32</option>
                    <option value="33">33</option>
                </select> --}}
            <hr>
            Select Color &nbsp;&nbsp;&nbsp;
            <select class="form-select" name="name" aria-label="Default select example ">
                <option selected>Open this select menu</option>
                <option value="red">RED</option>
                <option value="blue">BLUE</option>
                <option value="white">WHITE</option>
                <option value="white">Black</option>
            </select>
            <hr>
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
