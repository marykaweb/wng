<?php

namespace App\Http\Controllers;

use App\News;
use App\Users;

use Jenssegers\Date\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $countNews = $request['countNews'];

        $news = News::orderBy('id', 'description')->paginate(2 + $countNews);
        $allNews = News::orderBy('id', 'description')->paginate();

        $selectFilter = $allNews;
        $selectFromDate = '';
        $selectUntilDate = '';
        $selectIdNews = '';

        if ( isset($_POST['filterTitle']) && isset($_POST['startDate']) && isset($_POST['endDate']) && $_POST['startDate'] != '' &&  $_POST['endDate'] != '' && $_POST['filterTitle'] != 'all' ) {
            $filterDate = DB::table('news')->whereBetween('news.updated_at', [date('Y-m-d ', strtotime($_POST['startDate'])), date('Y-m-d', strtotime($_POST['endDate']))])->where('news.id', '=', $_POST['filterTitle'])->join('users', 'users.id', '=', 'news.created_by')->select('news.*', 'users.name');
            $news = $filterDate->get();

            $selectFromDate = $_POST['startDate'];
            $selectUntilDate = $_POST['endDate'];
            $selectIdNews = $_POST['filterTitle'];

        } elseif (isset($_POST['filterTitle']) && $_POST['filterTitle'] != 'all') {
                $selectIdNews = $_POST['filterTitle'];
                $news = News::where('id', '=', $_POST['filterTitle'])->paginate(1);
        }  else if ( isset($_POST['startDate']) &&  $_POST['startDate'] != '' && isset($_POST['endDate']) && $_POST['endDate'] != '' ) {

            $filterDate = DB::table('news')->whereBetween('news.updated_at', [date('Y-m-d ', strtotime($_POST['startDate'])), date('Y-m-d', strtotime($_POST['endDate']))])->join('users', 'users.id', '=', 'news.created_by')->select('news.*', 'users.name');
            $news = $filterDate->get();

            $selectFromDate = $_POST['startDate'];
            $selectUntilDate = $_POST['endDate'];
        }

        session_start();
        $_SESSION['filterId'] = $selectIdNews;
        $_SESSION['startDate'] = $selectFromDate;
        $_SESSION['endDate'] = $selectUntilDate;

        if ( isset($_POST['reset']) ) {
            $news = News::orderBy('id', 'description')->paginate($countNews);
            $_SESSION['startDate'] = '';
            $_SESSION['endDate'] = '';
        }

        $countAllNews = count($allNews);
        // echo $countNews;
        return view('blog.allnews', [
            'news' => $news,
            'idTitle' => $selectIdNews,
            'selectFilters' => $selectFilter,
            'selectChoose' => $_SESSION['filterId'],
            'selectFromDate' => $_SESSION['startDate'],
            'selectUntilDate' => $_SESSION['endDate'],
            'countAllNews' => $countAllNews
        ]);

    }
   
}
