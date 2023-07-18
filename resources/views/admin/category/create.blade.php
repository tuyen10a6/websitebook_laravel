@extends('admin.layout.layout')
@section('content')
<form  style="padding: 0px 10px; margin:0px auto" action="{{route('admin.category.add')}}" method="post">
    @csrf
    <div class="mb-3 mt-3">
      <label for="Name" class="form-label">Tên danh mục:</label>
      <input required style="width:70%" type="text" class="form-control" id="name" placeholder="Nhập danh mục" name="name">
    </div>
    <div class="mb-3">
      <label for="Priority" class="form-label">Độ ưu tiên:</label>
      <input required style="width:70%" type="number" class="form-control" id="priority" placeholder="Nhập độ ưu tiên" name="priority">
    </div>
    <button  type="submit" class="btn btn-primary mr-3">Thêm</button>

    <a class="btn btn-danger" href="{{route('admin.category.index')}}"> Quay lại
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
