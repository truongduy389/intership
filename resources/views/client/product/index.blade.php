@extends('layout/server')
@section('title', 'Category')
@section('server')
    {{-- <form action="" class="form-inline">
        <div class="form-group">
            <input type="text" name="key" class="form-control" placeholder="tìm kiếm...">
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
    </form> --}}

    <div class="mt-4">
        <a href="{{ route('them-san-pham') }}">Thêm mới <i class="fas fa-plus"></i></a>
    </div>
    <hr>
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="row ml-4">

        @foreach ($data as $item)
            @if ($item->default == 1)
                <div class="col-md-3">
                    <div class="card mr-3 ml-2" style="width: 18rem;">
                        <a href="{{ route('chi-tiet-san-pham', $item->id) }}"> <img
                                src="{{ asset('uploads/product') }}/{{ $item->image_before }}" class="card-img-top"
                                alt="..." style="height: 250px">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title mb-3">{{ $item->name }}</h5><br>
                            <div class="row">
                                <h5 class="card-title mb-0"> Giá tiền : {{ $item->price }} $</h5>
                            </div>
                            <div class="row ">
                                <h5 class="card-title mb-0"> Tổng màu : {{ $countColor }}</h5>
                                <h5 class="card-title mb-0"> Tổng size : {{ $countSize }}</h5>
                            </div>


                            <p class="card-text"></p>
                            {{-- <a href="{{ route('sua-san-pham', $item->id) }}" class="btn btn-primary">edit</a> --}}
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

    </div>

    <form action="" method="post" id="formDelete">
        {{ csrf_field() }}
        @method('DELETE')
    </form>
@endsection
