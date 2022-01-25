<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Repositories\testRepository;
use App\Models\Test;
use App\Http\Requests\test\Createtest;
use App\Http\Requests\test\Updatetest;
use App\Http\Requests\LimitRequest;

class testController extends Controller
{
    private $testRepository;
    public function __construct()
    {
        $this->testRepository = new testRepository(new Test());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LimitRequest $request)
    {
        return $this->testRepository->index($request->take, $request->skip);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Createtest $request)
    {
        $data = $request->validated();
        return $this->testRepository->store($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\\$name  $name
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->testRepository->show($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\\$name  $name
     * @return \Illuminate\Http\Response
     */
    public function update(Updatetest $request, $id)
    {
        $data = $request->validated();
        return $this->testRepository->update($id, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\\$name  $name
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->testRepository->destroy($id);
    }

}
