<!DOCTYPE html>
<html>
<head>
    
    <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>DANH MUC TEST</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>
          .link-dark {
              color: #212529;
          }
      </style>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
{{--     
      <h2>{!! $title !!}</h2>
    <div>     
        {!! $content !!}
    </div> --}}
    {{-- <div>
        {{ $readall }}</div> --}}
        {{-- @foreach ($readall as $item)
        {{ $item['href'] }}   <br>
        @endforeach  --}}
        <form method="get" action="{{url('test')}}" enctype="multipart/form-data">
            @csrf
            <tbody>
                <div class="d-flex justify-content-left align-items-left" style="min-height: 100vh;">
                    <div class="bg-light p-3" style="max-width: 280px;">
                        @foreach ($readall as $item)
                            @if (is_array($item) && array_key_exists('href', $item) && Str::endsWith($item['href'], 'rss') && Str::endsWith($item['text'], 'RSS'))
                                <div class="mb-3">
                                    <a href="tintucdanhmuc?url={{substr($item['temp'], 0, -4)}}{{$item['href'] }}" class="list-group-item list-group-item-action">
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
</body> 
</html>
