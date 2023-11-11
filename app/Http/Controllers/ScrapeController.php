<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;

class ScrapeController extends Controller
{
    //
    function Tin(Request $request)
    { 
        $articleUrl = $request->input('url');
        $client = new Client();
        $crawler = $client->request('GET', $articleUrl);

        return view('qltintuc.tintuc',[
            'tin'=>$crawler
        ]);
    }
    function TinDanhMuc(Request $request)
    { 
        $articleUrl = $request->input('url');
        $articleTheContent =$request->input('content');
        dump($articleTheContent);
        $client = new Client();
        $crawler = $client->request('GET', $articleUrl);
        return view('qltintuc.tintucdanhmuc',[
            'tin'=>$articleUrl,
            'thecontent'=>$articleTheContent,
        ]);
    }
    
    function scrapeArticle(Request $request)
    {
        // $articleUrl = 'https://tuoitre.vn/so-van-hoa-se-lam-viec-voi-quoc-co-quoc-nghiep-ve-y-thuc-viec-tuan-thu-phap-luat-cua-nguoi-dan-20231026200646435.htm'; // Thay thế bằng URL của bài báo bạn muốn lấy nội dung
        $articleUrl = $request->input('url');
        // Tạo một đối tượng Goutte Client
        $client = new Client();
        $articleTheContent =$request->input('thecontent');
        $tenthe = $articleTheContent;
        //dump($tenthe);
        // Gửi yêu cầu HTTP đến URL của bài báo
        $crawler = $client->request('GET', $articleUrl);

        // Lấy nội dung của bài báo, ví dụ lấy nội dung của thẻ có class "article-content"
        $articleContent = $crawler->filter($tenthe)->html();
        $articleTitle = $crawler->filter('title')->html();
        $read=$crawler->filter('p')->html();
        
        $paragraphs = $crawler->filter('p'); // Lấy tất cả thẻ <p>

        $allParagraphs = [];
        $paragraphs->each(function ($paragraph) use (&$allParagraphs) {
            $allParagraphs[] = $paragraph->text();
        });


        // return view('scraped')->with('content','title', $articleContent,$articleTitle);
        return view('scraped',[
            'content'=> $articleContent,
            'title'=>$articleTitle,
            'read'=>$read,
            'readall'=>$allParagraphs,
            'link'=>$articleUrl
        ]);
    }
    
    function Danhmuc(Request $request)
    {
        $articleUrl = $request->input('url');
        $temp = $articleUrl;
        //dump($articleUrl);
    
        $client = new Client();
        
        $crawler = $client->request('GET', $articleUrl);
    
        $articleTitle = $crawler->filter('title')->html();
        
        $read = $crawler->filter('a')->html();
        
        $paragraphs = $crawler->filter('li');
    
        $allParagraphs = [];    
    
        $paragraphs->each(function ($paragraph) use (&$allParagraphs, $temp) {
            $allParagraphs[] = $paragraph->text();
            $link = $paragraph->filter('a');
            $href = $link->attr('href');
            $text = $link->text();
    
            $allParagraphs[] = [
                'href' => $href,
                'text' => $text,
                'temp' => $temp, // Thêm biến temp vào mảng allParagraphs
            ];
        });
        return view('qltintuc.danhmuc',[
            // 'content'=> $articleContent,
            // 'title'=>$articleTitle,
            //'read'=>$read,
            'readall'=>$allParagraphs
        ]);
    }
    function Danhmuc2(Request $request)
    {
        $articleUrl = $request->input('url');

        $articleTenThe =$request->input('tenthe');
        $tenthe = $articleTenThe;

        $articleLinkThe = $request->input('linkthe');
        $linkthe = $articleLinkThe;

        $articleHrefThe = $request->input('hrefthe');
        $hrefthe = $articleHrefThe;

        $articleLinkNguon = $request->input('linknguon');
        $temp= $articleLinkNguon;
        $conten2 = $request->input('thecontent');
        $content= $conten2;

        $client = new Client();
        
        $crawler = $client->request('GET', $articleUrl);
        $paragraphs = $crawler->filter($tenthe);
        $allParagraphs = [];

            $paragraphs->each(function ($paragraph) use (&$allParagraphs, $temp,$linkthe,$hrefthe,$content) {
                $link = $paragraph->filter($linkthe);
                $href = $link->attr($hrefthe);
                $text = $link->text();
                //dump($href,$text);
                $allParagraphs[] = [
                    'href' => $href,
                    'text' => $text,
                    'temp' => $temp,
                    'content'=>$content,
                ];
            });
            return view('qltintuc.danhmuc', [
                'readall' => $allParagraphs
            ]);
        // // Thực hiện kiểm tra và xử lý trước khi tạo yêu cầu
        // if (strpos($articleUrl, 'thanhnien.vn') !== false) {
        //     $crawler = $client->request('GET', $articleUrl);
            
        //     $articleTitle = $crawler->filter('title')->html();
        //     $read = $crawler->filter('a.title')->html();
        //     $paragraphs = $crawler->filter('li.item');
        //     $allParagraphs = [];

        //     $paragraphs->each(function ($paragraph) use (&$allParagraphs, $temp) {
        //         $link = $paragraph->filter('a');
        //         $href = $link->attr('href');
        //         $text = $link->attr('title');
        //         $href = str_replace('https://thanhnien.vn', '', $href);
        //         $rss = 'RSS'; // Thay 'Chuỗi RSS của bạn' bằng chuỗi RSS thực tế

        //         $text .= $rss;
        //         $allParagraphs[] = [
        //             'href' => $href,
        //             'text' => $text,
        //             'temp' => $temp,
        //         ];
        //     });
        
        //     return view('qltintuc.danhmuc', [
        //         'readall' => $allParagraphs
        //     ]);
        // } elseif (strpos($articleUrl, 'tuoitre.vn') !== false) {
        //     $crawler = $client->request('GET', $articleUrl);
    
        //     $articleTitle = $crawler->filter('title')->html();
        //     $read = $crawler->filter('a')->html();
        //     $paragraphs = $crawler->filter('li');
        //     $allParagraphs = [];
        
        //     $paragraphs->each(function ($paragraph) use (&$allParagraphs, $temp) {
        //         $link = $paragraph->filter('a');
        //         $href = $link->attr('href');
        //         $text = $link->text();
        //         $allParagraphs[] = [
        //             'href' => $href,
        //             'text' => $text,
        //             'temp' => $temp,
        //         ];
        //     });
        
        //     return view('qltintuc.danhmuc', [
        //         'readall' => $allParagraphs
        //     ]);
        // }
        // else{
        //     $crawler = $client->request('GET', $articleUrl);
        //     $paragraphs = $crawler->filter('li');
        //     $allParagraphs = [];
        //     $paragraphs->each(function ($paragraph) use (&$allParagraphs, $temp) {
        //         $link = $paragraph->filter('li');
        //         $href = $link->attr('href');
        //         $text = $link->text();
        //         $allParagraphs[] = [
        //             'href' => $href,
        //             'text' => $text,
        //             'temp' => $temp,
        //         ];
        //     });
        
        //     return view('qltintuc.danhmuc', [
        //         'readall' => $allParagraphs
        //     ]);
        // }
    
        
    }

// $paragraphs = $crawler->filter('.list-rss'); // Lấy tất cả thẻ <p>

// $allData = [];
// $paragraphs->each(function ($paragraph) use (&$allData) {
//     $paragraphHtml = $paragraph->html(); // Lấy nội dung của thẻ
//     $links = $paragraph->filter('a'); // Lọc các thẻ <a> bên trong thẻ

//     $links->each(function ($link) use (&$paragraphHtml) {
//         $href = $link->attr('href'); // Lấy giá trị thuộc tính href
//         $linkHtml = $link->html(); // Lấy nội dung của thẻ <a>

//         // Thêm nội dung của thẻ <a> có href vào nội dung của thẻ mẹ
//        // $paragraphHtml = str_replace($linkHtml, "<a href='$href'>$linkHtml</a>", $paragraphHtml);
//        $paragraphHtml = str_replace($linkHtml, $href, $paragraphHtml);
//     });

//     $allData[] = $paragraphHtml;
// });

// $allData bây giờ chứa nội dung của tất cả thẻ <p> với cả các liên kết (href) bên trong thẻ



        // return view('scraped')->with('content','title', $articleContent,$articleTitle);

    
}
