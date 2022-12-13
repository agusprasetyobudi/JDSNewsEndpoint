<?php
namespace App\Interfaces;

use Illuminate\Http\Request;

interface INewsServices
{
    public function StoreNews(Request $request);
    public function GetNews(Request $request);
    public function UpdateNews(Request $request);
    // public function DeleteNews(Request $request);
}
