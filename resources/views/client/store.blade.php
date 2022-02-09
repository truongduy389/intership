@extends('layout/server')
@section('title', 'Publish Product')
@section('css')
@endsection
@section('server')
    <form action="{{ route('postSp') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-2">
                <div class="card mr-3 ml-2">
                    <img id="hats" src="{{ asset('storage') }}/{{ $img->image }}" class="card-img-top" alt="..."
                        style="height: 150px;width:150px">

                </div>
            </div>
            <div class="col-md-10">

                <div class="row">
                    <div class="col-md-6">
                        <h4>{{ $img->name }}</h4>
                        <p>Price: <input type="text" name="priseSp" id="" value=""> $</p>
                        <p>1 Color: White</p>
                        <p>4 size: M, X, XL, XXL </p>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <input type="text" name="nameSp" id="" style="display: none" value="{{ $img->name }}">
                        <input type="text" name="imgSp" id="" style="display: none"
                            value="https://raw.githubusercontent.com/mobpyschi/image/main/public/{{ $img->image }}">
                        <button style="width: 30%" type="submit" class="btn btn-success btnUpdates mr-4 float-right">Save
                            Product</button>
                    </div>
                </div>


            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <label for="">Short Description</label>
                <input type="text" name="shortDes" id="" style="width: 100%">
            </div>
            <div class="col-md-12">
                <label for="">Short Description</label>
                <input type="text" name="Desscript" id="" style="width: 100%; height:70%">
            </div>
        </div>
    </form>
@endsection
