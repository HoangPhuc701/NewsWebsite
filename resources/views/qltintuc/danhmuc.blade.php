{{-- <!DOCTYPE html>
<html>
<head>
    
    <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>DANH MUC</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>
          .link-dark {
              color: #212529;
          }
      </style>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
        <form method="get" action="{{url('duyettin')}}" enctype="multipart/form-data">
            @csrf
            <tbody>
                <div class="d-flex justify-content-left align-items-left" style="min-height: 100vh;">
                    <div class="bg-light p-3" style="max-width: 280px;">
                        @foreach ($readall as $item)
                            @if (is_array($item) && array_key_exists('href', $item) && Str::endsWith($item['href'], 'rss') && Str::endsWith($item['text'], 'RSS'))
                                <div class="mb-3">
                                    <a href="javascript:void(0);" data-url="tintucdanhmuc?url={{substr($item['temp'], 0, -4)}}{{$item['href'] }}" class="list-group-item list-group-item-action category-link">
                                        <i class="fa-solid fa-house"></i>
                                        {{ substr($item['text'], 0, -3) }}
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>   
            </tbody>
        </table>
    </form>
    <div id="siteloader"></div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Handle category link clicks
            $('.category-link').on('click', function () {
                var url = $(this).data('url');
                loadCategoryNews(url);
            });

            // Function to load category news and display it
            function loadCategoryNews(url) {
                $.get(url, function (data) {
                    $('#siteloader').html(data);
                });
            }
        });
    </script>
</body> 
</html> --}}



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DANH MUC</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .link-dark {
            color: #212529;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="d-flex justify-content-left align-items-left" style="min-height: 100vh;">
        <div class="bg-light p-3" style="max-width: 280px;">
            @foreach ($readall as $item)
                @if ((is_array($item) && array_key_exists('href', $item) && Str::endsWith($item['href'], 'rss') ))
                    <div class="mb-3">
                        <a href="javascript:void(0);" data-url="tintucdanhmuc?url={{$item['temp']}}{{substr($item['href'], 1) }}&content={{ $item['content']}}" class="list-group-item list-group-item-action category-link">
                            <i class="fa fa-home"></i>
                            {{ $item['text']}}
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
        <div id="siteloader"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Handle category link clicks
            $('.category-link').on('click', function () {
                var url = $(this).data('url');
                loadCategoryNews(url);
            });

            // Function to load category news and display it
            function loadCategoryNews(url) {
                $.get(url, function (data) {
                    $('#siteloader').html(data);
                });
            }
        });
    </script>
</body>
</html>
