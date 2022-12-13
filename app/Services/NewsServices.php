<?php

namespace App\Services;

use App\Events\NewsLogEvent;
use App\Helper\ResponseHelpers;
use App\Http\Resources\API\News\NewsDetailResource;
use App\Http\Resources\API\News\NewsPaginateResource;
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
                $data = $this->model->paginate($page);
                return ResponseHelpers::successResponse(200,"Get News From Paginate",$data);
            }
            return ResponseHelpers::successResponse(200,"Get News From Paginate",$this->model->paginate(10));
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
                $request->merge(['image'=>'news/'.$nameFile]);
            }
            $data = $this->model->create($request);
            event(new NewsLogEvent('news','create',$data->id));
            return ResponseHelpers::successResponse(200,"News $request->is_post",new NewsDetailResource($data));
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return ResponseHelpers::errorResponse(400,'Store News Error');
        }
    }

    public function UpdateNews(Request $request)
    {
        try {
            if($request->has('images')){
                $file = $request->file('images');
                $nameFile =Str::slug($request->name).'.'.$file->getClientOriginalExtension();
                $file->storeAs('news',$nameFile);
                $request->merge(['image'=>'news/'.$nameFile,'slug'=> Str::slug($request->name)]);
            }
            $data = $this->model->update($request->query('post'),$request);

            event(new NewsLogEvent('news','update',$data->id));
            // $data = $this->model->find($request->query('post'));
            // dd($data->authors->name);
            return ResponseHelpers::successResponse(200,"News $request->is_post",new NewsDetailResource($data));
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return ResponseHelpers::errorResponse(400,'Update News Error');
        }
    }
    public function DeleteNews(Request $request)
    {
        try {
            $data = $this->model->delete($request->post);
            event(new NewsLogEvent('news','delete',$data->id));
            return ResponseHelpers::successResponse(200,"News Deleted",new NewsDetailResource($data));
        } catch (\Throwable $th) {
            return ResponseHelpers::errorResponse(400,'Delete News Error');
        }
    }

}
