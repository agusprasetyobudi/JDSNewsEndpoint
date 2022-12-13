<?php

namespace App\Repository;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsRepository extends BaseRepository
{

    public function __construct(News $model)
    {
        $this->model = $model;
    }

    public function paginate($page)
    {
        $paginate = $this->model->paginate($page);
        $paginate->setPath(env('PAGINATION_URL')."/news");
        return $paginate;
    }

    public function find($id)
    {
        $paginate = $this->model->findOrFail($id);
        return $paginate;
    }

    /**
     * slug function
     * get slug by resource on db or redis
     *
     * @param [type] $slug
     * @return collection news by slug
     */
    public function slug($slug)
    {
        if($cache = $this->redis_get("news:slug:$slug")){
            return $cache;
        }
        $model = $this->model->where('slug','like',"%$slug%")->first();

        $model->author = $model->authors->first(['name','created_at']);
        $this->redis_store("news:slug:".$slug,$model);
        return $model;
    }


    /**
     * create news function
     *
     * @param [type] $request
     * @return void
     */
    public function create($request)
    {
        $model = $this->model->create($this->payloads($request));
        $this->redis_store("news:slug:$model->slug",$model);
        return $model;
    }

    public function update($id, Request $request)
    {
        $model = $this->model->find($id);
        $model->fill($this->payloads($request));
        $model->save();
        $this->redis_store('news:slug:'.$model->slug,$model);
        return $model;
    }

    /**
     * Payloadsfunction
     * Set Payload function before stored to resource
     *
     * @param Request $request
     * @return void
     */
    public function payloads(Request $request)
    {
        // dd([
        //     'name'      => $request->name,
        //     'slug'      => Str::slug($request->name),
        //     'images'    => $request->image,
        //     'is_post'   => $request->is_post,
        //     'post'      => $request->post,
        //     'author'    => auth()->user()->id,
        // ]);
        return [
            'name'      => $request->name,
            'slug'      => Str::slug($request->name),
            'images'    => $request->image,
            'is_post'   => $request->is_post,
            'post'      => $request->post,
            'author'    => auth()->user()->id,
        ];
    }
}
