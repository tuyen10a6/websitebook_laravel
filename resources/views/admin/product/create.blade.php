@extends('admin.layout.layout')
@section('content')
<h2 class="ml-3 mt-3">THÊM SẢN PHẨM</h2>
<form enctype="multipart/form-data" class="ml-3"  style="padding: 0px 10px; margin:0px auto" action="{{route('admin.product.store')}}" method="post">
  {{  csrf_field()  }}
    <div class="mb-3 mt-3">
      <label for="Name" class="form-label">Tên sản phẩm:</label>
      <input required style="width:70%" type="text" class="form-control" id="name" placeholder="Nhập tên sản phẩm" name="name">
    </div>

    <div class="mb-3">
      <label for="Priority" class="form-label">Hình ảnh:</label>
      <input required style="width:70%" type="file" class="form-control" id="imagedefault"  name="imgdefault">
    </div>

    <div class="mb-3 mt-3">
        <label for="Name" class="form-label">Giá tiền tăng:</label>
        <input required style="width:70%" type="text" class="form-control" id="priceone" placeholder="Nhập giá tiền tăng" name="priceone">
    </div>

      <div class="mb-3 mt-3">
        <label for="Name" class="form-label">Giá tiền:</label>
        <input required style="width:70%" type="text" class="form-control" id="price" placeholder="Nhập giá tiền" name="price">
      </div>
      <div class="mb-3 mt-3">
        <label for="Name" class="form-label">Số trang:</label>
        <input required style="width:70%" type="text" class="form-control" id="page" placeholder="Nhập số trang" name="page">
      </div>
      <div class="mb-3 mt-3">
        <label for="Name" class="form-label">Kích thước:</label>
        <input required style="width:70%" type="text" class="form-control" id="page" placeholder="Nhập kích thước" name="size">
      </div>
      <div class="mb-3 mt-3">
        <label for="Name" class="form-label">Số lượng:</label>
        <input required style="width:70%" type="text" class="form-control" id="quantity" placeholder="Nhập số lượng" name="quantity">
      </div>
      <div class="mb-3 mt-3">
        <label for="Name" class="form-label">Cân nặng:</label>
        <input required style="width:70%" type="text" class="form-control" id="weight" placeholder="Nhập cân nặng" name="weight">
      </div>

      <div class="mb-3 mt-3">
        <label for="Name" class="form-label">Loại sản phẩm:</label>
        <select name ="category_id" style="width:70%" class="form-select" aria-label="Default select example">
           
            @foreach ($categories as $item)
            <option  value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
            
          </select>
      </div>
      <div class="mb-3 mt-3">
        <label for="Name" class="form-label">Loại bìa:</label>
        <select name ="bookcover_id" style="width:70%" class="form-select" aria-label="Default select example">
           
            @foreach ($bookcovers as $item)
            <option  value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
         
          </select>
      </div>
      <div class="mb-3 mt-3">
        <label for="Name" class="form-label">Nhà cung cấp:</label>
        <select name="provider_id" style="width:70%" class="form-select" aria-label="Default select example">
           
           @foreach ($providers as $item)
           <option  value="{{$item->id}}">{{$item->name}}</option>
           @endforeach
          </select>
      </div>
      <div class="mb-3 mt-3">
        <label for="Name" class="form-label">Năm sản xuất:</label>
        <input required style="width:70%" type="text" class="form-control" id="publishingyear" placeholder="Nhập năm sản xuất" name="publishingyear">
      </div>
      <div class="mb-3 mt-3">
        <label for="exampleFormControlTextarea1" class="form-label">Chi tiết sản phẩm</label>
        <textarea style="width:70%" name="describe" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <div class="mb-3 mt-3">
        <label for="Name" class="form-label">Trạng thái:</label>
        <select name="status" style="width:70%" class="form-select" aria-label="Default select example">
           
            <option value="1">Hoạt động</option>
            <option value="0">Không hoạt động</option>
       
          </select>
      </div>
    <button  type="submit" class="btn btn-primary mr-3">Thêm</button>

    <a class="btn btn-danger" href="{{route('admin.product.index')}}"> Quay lại
    </a>
  </form>
   
@if ($errors->any())
<div style="max-width:450px" class="alert alert-danger mt-3 ml-3 mr-3">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@endsection
