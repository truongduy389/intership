@extends('layout/server')
@section('title', 'My Store')
@section('add')
    <a href="{{ route('san-pham') }}" style="background-color:#29ab51" class="mr-2 btn btn-sm btn-success float-end">Add
        product</a>
@endsection
@section('server')
    <div class="container mt-4">

        <form action="">
            <div class="wrap mb-4">
                <div class="search">
                    <input type="text" class="searchTerm" placeholder="Tìm kiếm sản phẩm?">
                    <button type="submit" class="searchButton">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </button>
                </div>
            </div>
        </form>
        @if ($dataMyStore == null)
            <div class="text-center ">
                <img src="{{ asset('uploads/icon') }}/Store.png" class="rounded" width="100" height="100" alt="...">
                <h4>You have no products created.</h4>
                <small>Why not add some?</small>
            </div>
            <div class="text-center">
                <a href="{{ route('san-pham') }}" style="background-color:#29ab51"
                    class=" mt-2 btn btn-sm btn-success">Create product</a>
            </div>
        @else
            <table class="table">
                <tbody>
                    @foreach ($dataMyStore as $item)
                        <tr>
                            <td><img src="https://phamxuanduc.000webhostapp.com/image/{{ $item['front'] }}" alt=""
                                    class="image-1">
                            </td>
                            <td>
                                <div class="name_table_mystore">
                                    <h4>{{ $item['name'] }}</h4>
                                    <h6> Màu: {{ $item['color'] }} </h6>
                                    <h6> Size: {{ $item['size'] }} </h6>

                                    @if ($item['status'] === 0)
                                        <span class="text-success"> All in stock </span>
                                    @else
                                        <span class="text-danger"> All in stock </span>
                                    @endif

                                </div>
                            </td>

                            <td>
                                <div class="box_btn">
                                    <button class="btn btn-primary mr-4">
                                        Public
                                    </button>
                                    <a href="{{ route('details', $item['id']) }}">
                                        <button class="btn btn-success ml-4">
                                            Edit listing
                                        </button>
                                    </a>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('details', $item['id']) }}">
                                    <button class="btn_all pen">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                        </svg>
                                    </button>
                                </a>
                            </td>
                            <td>
                                <button class="btn_all cpoy">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-clipboard-check" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                        <path
                                            d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                        <path
                                            d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                                    </svg>
                                </button>
                            </td>
                            <td>
                                <div class="dropdown btn_function">
                                    <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                            class="bi bi-three-dots" viewBox="0 0 16 16">
                                            <path
                                                d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                        </svg>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li>
                                            <form action="{{ route('delete', $item['id']) }}" method="post">
                                                @csrf
                                                <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                            </form>

                                        </li>

                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
