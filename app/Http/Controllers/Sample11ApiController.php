<?php

namespace App\Http\Controllers;

use App\Http\Resources\SampleResource;
use App\Models\Sample;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Libs\JsonConvert;

class Sample11ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $samples = Sample::orderBy('created_at', 'desc')->get();

        $samples = Sample::orderBy("created_at", "desc")->get();
        $convert = new JsonConvert();
        if ($samples) {
            $samples = SampleResource::collection($samples);
            $status = Response::HTTP_OK;
        } else {
            $status = Response::HTTP_NOT_FOUND;
        }
        return $convert->toJson($samples, $status);

        // if ($samples) {
        //     return response()->json(
        //         [
        //             'data' => SampleResource::collection($samples),
        //         ],
        //         Response::HTTP_OK,
        //         [
        //             'Content-Type' => 'application/json;charset=UTF-8',
        //             'Charset' => 'utf-8'
        //         ],
        //         JSON_UNESCAPED_UNICODE
        //     );
        // } else {
        //     return response()->json(
        //         [
        //             'data' => [
        //                 'status' => 'error',
        //                 'message' => 'データが存在しません。',
        //             ],
        //         ],
        //         Response::HTTP_NOT_FOUND,
        //         [
        //             'Content-Type' => 'application/json;charset=UTF-8',
        //             'Charset' => 'utf-8'
        //         ],
        //         JSON_UNESCAPED_UNICODE
        //     );
        // }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sample = Sample::find($id);

        $convert = new JsonConvert();
        if ($sample) {
            $sample = new SampleResource($sample);
            $status = Response::HTTP_OK;
        } else {
            $status = Response::HTTP_NOT_FOUND;
        }
        return $convert->toJson($sample, $status);

        // if ($sample) {
        //     return response()->json(
        //         [
        //             'data' => new SampleResource($sample),
        //         ],
        //         Response::HTTP_OK,
        //         ['Content-Type' => 'application/json;charset=UTF-8',
        //             'Charset' => 'utf-8'],
        //         JSON_UNESCAPED_UNICODE
        //     );
        // } else {
        //     return response()->json(
        //         [
        //             'data' => [
        //                 'status' => 'error',
        //                 'message' => 'データが存在しません。',
        //             ],
        //         ],
        //         Response::HTTP_NOT_FOUND,
        //         ['Content-Type' => 'application/json;charset=UTF-8',
        //             'Charset' => 'utf-8'],
        //         JSON_UNESCAPED_UNICODE
        //     );
        // }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
