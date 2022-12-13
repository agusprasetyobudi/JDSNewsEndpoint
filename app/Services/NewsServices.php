<?php

namespace App\Services;

use App\Helper\ResponseHelpers;
use App\Http\Resources\API\News\NewsDetailResource;
use App\Http\Resources\API\News\NewsSlugResource;
use App\Interfaces\INewsServices;
use App\Repository\NewsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class NewsServices implements INewsServices {

    private $model;
    public function __construct(NewsRepository $model)
    {
        $this->model = $model;
    }

    public function GetNews(Request $request)
    {
        try {
            if($slug = $request->query('slug')){
                $data = $this->model->slug($slug);
                return ResponseHelpers::successResponse(200,"Get News From Slug",new NewsSlugResource($data));
            }
            if($page = $request->query('page')){

            }
            if($detail = $request->query('news')){

            }
            return $this->model->paginate(10);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function StoreNews(Request $request)
    {
        try {
            if($request->has('images')){
                $file = $request->file('images');
                $nameFile =Str::slug($request->name).'.'.$file->getClientOriginalExtension();
                $file->storeAs('news',$nameFile);
                $request->merge(['image'=>'news/'.$nameFile,'slug'=> Str::slug($request->name)]);
            }
            $data = $this->model->create($request);
            return ResponseHelpers::successResponse(200,"News $request->is_post",new NewsDetailResource($data));
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return ResponseHelpers::errorResponse(400,'Store News Error');
        }
    }

}
