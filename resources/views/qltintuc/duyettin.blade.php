{{-- <form method="post" action="{{url('qltintuc')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group d-flex">
      <label class="control-label col-sm-2" for="item">Item</label>        
      <input type="text" class="form-control" id="item" name="item">
    </div>
    <div class="form-group d-flex">
      <label class="control-label col-sm-2" for="link">Link</label>       
      <input type="text" class="form-control" id="link" name="link">
    </div>
    <div class="form-group d-flex">
        <label class="control-label col-sm-2" for="description">Description</label>       
        <input type="text" class="form-control" id="description" name="description">
    </div>
    <div class="form-group d-flex">
        <label class="control-label col-sm-2" for="status">Status</label>       
        <input type="text" class="form-control" id="status" name="status">
    </div>
    <div class="form-group d-flex">
        <label class="control-label col-sm-2" for="matheloai">Thể Loại</label>       
        <input type="text" class="form-control" id="matheloai" name="matheloai">
    </div>
    <button type="submit" class="btn btn-primary btn-block">Lưu</button>
  </form> --}}

  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Quản Lý Tin Tức</title>
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
            <li class="nav-item">
              <a href="/" class="nav-link active" aria-current="page">
              <i class="fa-solid fa-house"></i>
                Trang TRủ
              </a>
            </li>
            <li>
              <a href="duyetnguon" class="nav-link link-dark">
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
        <h2 class="text-center">TRANG CHỦ</h2>
    </div>
    <hr>
  </div>
</div>
  @endsection
</body>