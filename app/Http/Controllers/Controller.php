<?php

namespace App\Http\Controllers;
/* controller.php 役割
　ModelとViewにそれぞれ指示を出して、プログラムの制御を行う。
https://ic-solution.jp/blog/mvc-framework#:~:text=Controller%E3%81%AE%E6%8B%85%E5%BD%93%E3%81%AF%E3%80%81.php,%E5%87%BA%E3%81%99%E3%81%A8%E3%81%84%E3%81%86%E5%BD%B9%E5%89%B2%E3%81%8C%E3%81%82%E3%82%8A%E3%81%BE%E3%81%99%E3%80%82
*/ 
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
