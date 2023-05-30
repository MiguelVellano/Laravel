<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function dashboard(){
        $news=News::paginate(5);
        return view('dashboard',['news'=>$news]);
    }
    public function welcome(){
        $news=News::paginate(5);
        return view('welcome',['news'=>$news]);
    }
    public function edit(){
        $news=News::paginate(5);
        return view('news.edit',['news'=>$news]);
    }
    public function store(Request $request){
        $news = new News;
        $news->id = $request->id;
        $news->title = $request->title;
        $news->description = $request->description;
        $news->author = $request->author;
        $news->city = $request->city;
        $news->date_published = $request->date_published;

        //Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $request->image->move(public_path('images/news'), $imageName);
            $news->image = $imageName;
        }

        $news->save();

        return redirect('dashboard')->with('msg','Notícia criada com sucesso!');
    }
    public function show($id){
        $news = News::findOrFail($id);
        return view('news.show',['news' => $news]);
    }
    public function destroy($id){
        News::findOrFail($id)->delete();
        return redirect('edit')->with('msg','Notícia excluido com sucesso!');
    }   
    public function alter($id){
        $news=News::findOrFail($id);
        return view('news.alter',['news' => $news]);
    }
    public function update(Request $request){
        $data = $request->all();
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $request->image->move(public_path('images/news'), $imageName);
            $data['image'] = $imageName;
        }
        News::findOrFail($request->id)->update($data);
        return redirect('dashboard')->with('msg','Notícia editada com sucesso!');
    }
}
