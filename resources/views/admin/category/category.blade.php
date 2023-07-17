@extends('admin.layout.layout')

@section('content')
<div class="container mt-3">
    <h2>Bảng danh mục</h2>
    <a href="{{route('admin.category.create')}}"><button type="button" class="btn btn-primary mb-3 mt-3">Thêm danh mục</button> 
    </a>
    <table class="table">
      <thead>
        <tr>
          <th>STT</th>
          <th>Tên danh mục</th>
          <th>Độ ưu tiên</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $item)
        <tr>
          <td>{{ $item->id }}</td>
          <td>{{ $item->name }}</td>
          <td>{{ $item->priority }}</td>
        </tr>
        @endforeach
      
       
      </tbody>
    </table>
  </div>
@endsection