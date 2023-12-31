@extends('admin.layout.layout')

@section('content')
<div class="container mt-3">
    <h2>Bảng sản phẩm</h2>
    <a href="{{route('admin.product.create')}}"><button type="button" class="btn btn-primary mb-3 mt-3">Thêm sản phẩm</button> 
    </a>
    <table class="table table-bordered ">
      <thead>
        <tr style="text-align: center">
          <th>STT</th>
          <th>Tên sản phẩm</th>
          <th>Hình ảnh</th>
          <th>Giá tiền</th>
          <th>Giá trị tăng</th>
          <th>Loại</th>
          <th>Số lượng</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $item)
        <tr style="text-align: center">
          <td style="line-height: 5">{{ $loop->iteration }}</td>
          <td style="line-height: 5">{{ $item->name }}</td>
          <td style="line-height: 5"> <img style="width:150px; height:120px" src="{{ $item->imgdefault }}" alt="{{$item->name}}"> </td>
          <td style="line-height: 5">{{ number_format($item->price) }} đ</td>
          <td style="line-height: 5">{{ number_format($item->priceone) }} đ</td>
          <td style="line-height: 5">{{ $item->category->name }}</td>
          <td style="line-height: 5">{{ $item->quantity }}</td>
          <td style="line-height: 5">
            <a href="{{route('admin.product.show',$item->slug)}}"  style="margin-right:20px;text-decoration:none" >
              <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>        
            </a>

           <a href="{{route('admin.category.delete',$item->slug)}}">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
           </a>
          </td>
        </tr>
        @endforeach
      
       
      </tbody>
    </table>
    <div  style="display: flex; justify-content: center;">
      {{ $products->links( "pagination::bootstrap-4") }}

    </div>
  </div>
@endsection