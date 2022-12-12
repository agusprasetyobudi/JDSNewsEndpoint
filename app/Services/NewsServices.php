<?php

namespace App\Services;

use App\Interfaces\INewsServices;
use App\Repository\NewsRepository;
use Illuminate\Http\Request;

class NewsServices implements INewsServices {

    private $model;
    public function __construct(NewsRepository $model)
    {
        $this->model = $model;
    }

    public function GetNews(Request $request)
    {

    }

}
