<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function index()
    {
        try {
            $article = Article::all();
            if (count($article) > 0) {
                return response()->json(
                    [
                        "status" => "200",
                        "message" => "show data is successfull",
                        "data" => $article,
                    ],
                    200
                );
            } else {
                return response()->json(
                    [
                        "status" => "404",
                        "message" => "Not found"
                    ],
                    404
                );
            }
        } catch (\Exceptiom $exception) {
            return response()->json(
                [
                    "message" => $exception->getMessage(),
                    "status" => "No data",
                ],
                Response::HTTP_NOT_FOUND
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $article = Article::find($id);
            if ($article != null) {
                return response()->json(
                    [
                        "status" => "200",
                        "message" => "Show data is successful",
                        "data" => $article,
                    ],
                200
                );
            } else {
                return response()->json(
                    [
                        "status" => "404",
                        "message" => "Does not exits"
                    ],
                    404
                );
            }
        } catch (\Exception $exception) {
            return response()->json(
                [
                    'message' => $exception->getMessage(),
                    "status" => "No data"
                ],
                Response::HTTP_NOT_FOUND
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            if ($request->input("title") != null && $request->input("body") != null) {
                $article = Article::create($request->all());

                return response()->json(
                    [
                        "status" => "200",
                        "message" => "Create successful",
                        "data" => $article,
                    ],
                    200
                );
            } else {
                return response()->json(
                    [
                        "status" => "400",
                        "message" => "Create article not success"
                    ],
                    400
                );
            }
        } catch (\Exception $exception) {
            return response()->json(
                [
                    "message" => $exception->getMessage(),
                    "status" => "No data connection"
                ],
                Respose::HTTP_NOT_FOUND
            );
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $article = Article::find($id);
            if ($article != null) {
                $article->update($request->all());
                return response()->json(
                    [
                        "status" => "200",
                        "message" => "Update article success",
                        "data" => $article
                    ],
                    200
                );
            } else {
                return response()->json(
                    [
                        "status" => "404",
                        "message" => "Article not exist."
                    ],
                    404
                );
            }
        } catch (\Exception $exception) {
            return response()->json(
                [
                    'message' => $exception->getMessage(),
                    'status' => "Not connected to database",
                ],
                Response::HTTP_NOT_FOUND
            );
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        try {
            $article = Article::find($id);
            if ($article != null) {
                $article->delete();
                return response()-json(
                    [
                        "status" => "200",
                        "message" => "Delete success",
                        "data" =>$article
                    ],
                        200
                    );
            } else {
                return response()->json(
                    [
                        "status" => "404",
                        "message" => "Article do not exist."
                    ],
                    404
                );
            }
        } catch (\Exception $exception) {
            return response()-json(
            [
                'message' => $exception->getMessage(),
                'status' => "Not connected to database"
            ],
                Response::HTTP_NOT_FOUND
            );
        }
    }
}
