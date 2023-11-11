<!DOCTYPE html>
<html>
<head>
    <title>Scraped Content</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="mt-4">
        {{-- <button class="btn btn-primary" id="read-aloud-button">Đọc Văn Bản</button> --}}
        {{-- <script src="https://code.responsivevoice.org/responsivevoice.js"></script> --}}


        <script src="https://code.responsivevoice.org/responsivevoice.js?key=JmflDwyW"></script>
        <script>
            document.getElementById("read-aloud-button").addEventListener("click", function () {
                var textToRead = document.getElementById("text-to-read").value;
                responsiveVoice.speak(textToRead, "Vietnamese Male", { rate: 1 });
            });
        </script>

        
                {{-- <textarea disabled id="text-to-read" class="form-control mt-4">
                    {!! $title !!} 
                    @foreach ($readall as $item)
                        {{ $item }}        
                    @endforeach    
                </textarea> --}}
    </div>
    {{-- <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v18.0&appId=884092579988564" nonce="bEXT888b"></script>

<button id="read-aloud-button">Đọc Văn Bản</button>
   

    <script src="https://code.responsivevoice.org/responsivevoice.js"></script>
    <script>
    document.getElementById("read-aloud-button").addEventListener("click", function () {
        var textToRead = document.getElementById("text-to-read").value;
        responsiveVoice.speak(textToRead, "Vietnamese Male", { rate: 1 });
    });
    </script>



      <h2>{!! $title !!}</h2>
    <div>     
        {!! $content !!}
    </div> --}}

    <div class="container mt-5">
        <h1 class="mb-4">Tin Tức</h1>
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">{!! $title !!}</h2>
                <div class="card-text">{!! $content !!}</div>
            </div>
        </div>

        <div class="mt-4">
            <button class="btn btn-primary" id="read-aloud-button">Đọc Văn Bản</button>
            <script src="https://code.responsivevoice.org/responsivevoice.js"></script>
            <script>
                document.getElementById("read-aloud-button").addEventListener("click", function () {
                    var textToRead = document.getElementById("text-to-read").value;
                    responsiveVoice.speak(textToRead, "Vietnamese Male", { rate: 1 });
                });
            </script>
        </div>
        {{-- <button class="btn btn-primary" id="read-aloud-button">Đọc Văn Bản</button> --}}
        <div class="mt-4">
            <h5>Bình luận</h5>
            <div class="fb-comments" data-href="{{ request()->url() }}" data-width="" data-numposts="5"></div>
        </div>

        <div class="mt-4">
            <h5>Chia sẻ</h5>
            <div class="fb-share-button" data-href="{!! $link !!}" data-layout="" data-size="">
                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" class="fb-xfbml-parse-ignore">
                    Chia sẻ</a>
            </div>
        </div>
        <textarea disabled id="text-to-read" class="form-control mt-4">
            {!! $title !!} 
            @foreach ($readall as $item)
                {{ $item }}        
            @endforeach    
        </textarea>
    </div>

    <!-- Link to Bootstrap JavaScript (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- Đoạn mã Facebook SDK -->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v18.0&appId=884092579988564" nonce="bEXT888b"></script>
    <!-- ... -->
</body> 

{{-- <div class="fb-comments" data-href="http://127.0.0.1/:8000/" data-width="" data-numposts="5"></div>
<div class="fb-share-button" data-href="{!! $link !!}" data-layout="" data-size="">
    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%3A8000%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">
        Chia sẻ</a>
</div> --}}

    {{-- <textarea disabled id="text-to-read">
    {!! $title !!} 
    @foreach ($readall as $item)
    {{ $item }}        
    @endforeach    
</textarea> --}}
</html>
