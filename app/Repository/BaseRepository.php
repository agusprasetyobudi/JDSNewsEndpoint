<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BaseRepository
{

    protected $model;



    /**
     * construct function
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * all function
     *
     * @return Illuminate/Database/Eloquent/Collection
     */
    public function all() : Collection
    {
        return $this->model->get();
    }
    /**
     * Find function
     *
     * @param Type|null $var
     * @return void
     */
    public function find($id)
    {
        return $this->model->find($id);
    }
    /**
     * Undocumented function
     *
     * @param Illuminate\Http\Request
     * @return void
     */
    public function paginate(Request $request): Request
    {
        return $this->model->paginate($request->page,10);
    }

    public function store(Request $request)
    {
        $data = $this->payloads($request);
        $model = $this->model;
        $model->fill($data);
        $model->save();
        return $model;
    }

    /**
     * Update function
     * Function from eloquent
     *
     * @param [type] $id
     * @param Request $request
     * @return void
     */
    public function update($id, Request $request)
    {
        $data = $this->payloads($request);
        $model = $this->model;
        $model->where('id',$id)->fill($data);
        $model->save();
        return $model;
    }

    /**
     * delete function
     * The function for deleting data
     * if you activated the soft delete, your data not completely destroy on storage, you cn completely delete on storage
     * if you not activated soft delete, your data completely destroy on storage
     *
     * @param [type] $id
     * @return void
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * force deleted function
     *  The function can activated if you use soft deleteing and this function for destroy selected data on storage
     *
     * @param [type] $id
     * @return void
     */
    public function forceDelete($id)
    {
        return $this->model->find($id)->forceDelete();
    }

    /**
     * Restore Delete function
     * The function can activated if you use soft deleteing and this function for restoring your selected data
     *
     * @param [type] $id
     * @return void
     */
    public function restoreDelete($id)
    {
        return $this->model->find($id)->restore();
    }

    /**
     * Payload function
     * Setting up the payload if your request body not like same as database parameter
     *
     * @param Request $request
     * @return array
     */
    public function payloads(Request $request)
    {
        return $request->all();
    }
}
