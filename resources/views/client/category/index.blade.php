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
        <div class="col-sm-4">
          <div class="card" style="max-width: 340px;">
            <a class="text-decoration-none" href="/index">
              <div class="row">
                <div class="col-md-4 p-0">
                  <img src="{{ asset('uploads/categories') }}/aothunnam.jpeg" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8 mt-4">
                  <div class="card-body">
                    <h4 class="card-text">Men's Clothing</h4>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
    </div>

    <form action="" method="post" id="formDelete">
        {{ csrf_field() }}
        @method('DELETE')
    </form>
@endsection
