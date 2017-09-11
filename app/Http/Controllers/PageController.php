<?php

namespace App\Http\Controllers;


use App\Page;

class PageController extends Controller{

    public function show($id){
        $data['page'] = Page::where('id',$id)->with('categories')->first();

        return view('layout',[
            'title' => $data['page']->title,
            'content' => view('pages/show', $data)
        ]);
    }

}