  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Quan Lý Nguồn</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>
          .link-dark {
              color: #212529;
          }
      </style>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

  <body>
    @extends('qltintuc.app')
  @section('content')
  <div style="display: flex; padding-bottom: 100px">
    <form method="" action="" enctype="">
      @csrf
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
            <ul class="nav nav-pills flex-column mb-auto">
              <li>
                <a href="/" class="nav-link link-dark" aria-current="page">
                <i class="fa-solid fa-house"></i>
                  Trang Chủ
                </a>
              </li>
              <li class="nav-item">
                <a href="duyetnguon" class="nav-link active" aria-current="page" >
                <i class="fa-solid fa-list-check"></i>
                Quản Lý Nguồn
                </a>
              </li>
              <li>
                <a href="tintuc" class="nav-link link-dark">
                <i class="fa-solid fa-check"></i>
                  Tin Tức
                </a>
              </li>
              <li>
                <a href="chitiettin" class="nav-link link-dark">
                <i class="fa-solid fa-user"></i>
                  Chi Tiết Tin
                </a>
              </li>
              <li>
                <a href="#" class="nav-link link-dark">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                  Thoát
                </a>
              </li>
            </ul>
        </div>
    </form>
  <div class="container">
    <div class="d-flex justify-content-between align-items-center p-2">
        <h2 class="text-center">Thêm Nguồn</h2>
    </div>

<form method="post" action="{{url('duyetnguon')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group d-flex">
      <label class="control-label col-sm-2" for="tennguon">Tên Nguồn</label>        
      <input type="text" class="form-control" id="tennguon" name="tennguon">
    </div>
    <div class="form-group d-flex">
      <label class="control-label col-sm-2" for="linknguon">Link Nguồn</label>       
      <input type="text" class="form-control" id="linknguon" name="linknguon">
    </div>
    <div class="form-group d-flex">
      <label class="control-label col-sm-2" for="linkrss">Link Rss</label>       
      <input type="text" class="form-control" id="linkrss" name="linkrss">
    </div>
    <div class="form-group d-flex">
      <label class="control-label col-sm-2" for="tenthe">Tên thẻ cần lấy</label>       
      <input type="text" class="form-control" id="tenthe" name="tenthe">
    </div>
    <div class="form-group d-flex">
      <label class="control-label col-sm-2" for="linkthe">Tên thẻ Link cần lọc</label>       
      <input type="text" class="form-control" id="linkthe" name="linkthe">
    </div>
    <div class="form-group d-flex">
      <label class="control-label col-sm-2" for="hrefthe">Href thẻ cần lọc</label>       
      <input type="text" class="form-control" id="hrefthe" name="hrefthe">
    </div>
    <div class="form-group d-flex">
      <label class="control-label col-sm-2" for="thecontent">Thẻ content</label>       
      <input type="text" class="form-control" id="thecontent" name="thecontent">
    </div>
    <button type="submit" class="btn btn-primary btn-block">Lưu</button>
  </form>

    <hr>
    <h2 class="text-center">Danh Sách Nguồn</h2>
    <form method="get" action="{{url('duyetnguon')}}" enctype="multipart/form-data">
    @csrf
    <table class="table">
        <thead class="table-primary">
          <tr>
            <th scope="col">Tên Nguồn</th>
            <th scope="col">Link Nguồn</th>
            <th scope="col">Link RSS</th>
            <th scope="col">Tên Thẻ lấy</th>
            <th scope="col">Thẻ Link Lọc</th>
            <th scope="col">Href thẻ đọc</th>
            <th scope="col">Thẻ Content</th>
            {{-- <th scope="col">Tên Thể Loại</th>
            <th scope="col">Link Thể Loại</th> --}}
            <th scope="col">Xem</th>
            <th scope="col">Xóa</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($formnguon as $cd)
            <tr class="cd-row">
              <td>{{ $cd->TenNguon }}</td>
              <td>{{ $cd->LinkNguon }}</td>
              <td>{{ $cd->linkrss }}</td>
              <td>{{ $cd->tenthe }}</td>
              <td>{{ $cd->linkthe }}</td>
              <td>{{ $cd->hrefthe }}</td>
              <td>{{ $cd->thecontent }}</td>
              {{-- <td>{{ $cd->TenTheLoai }}</td>
              <td>{{ $cd->LinkTheLoai }}</td> --}}
              <td>
                <a href="danhmuc?url={{ $cd->LinkNguon . $cd->linkrss }}&tenthe={{ $cd->tenthe }}&linkthe={{ $cd->linkthe }}&hrefthe={{ $cd->hrefthe }}&linknguon={{ $cd->LinkNguon }}&thecontent={{ $cd->thecontent }}" class="btn btn-primary" target="_blank">Xem</a>
              </td>
              <td>
                <a href="xoa?MaNguon={{ $cd->MaNguon }}rss" class="btn btn-danger" target="_blank">Xóa</a>
            </td>
            </tr>
            @endforeach
        </tbody>
      </table> 
    </form>
  </div>
  </div>
  @endsection
  
</body>

