<?php

namespace App\Http\Controllers;
use App\Models\article;
use Illuminate\Http\Request;

class articleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = article::where('user_id', auth()->id())->get();
        return view('list', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $article = new article([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => auth()->id()
        ]);
        $article->save();

        return response()->json($article);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
  

    /**
     * Remove the specified resource from storage.
     */
    public function isOwnbyuser($user)
    {
        return $this->user_id === $user->$id;
    }



    public function destroy(article $article)
    {

        $user =auth()->user();

        if(!$article->isOwnbyuser($user)){
            return response('Unauthorized', 401);
        }
        $article->delete();
        return response('Unauthorized', 401);

    }
}
