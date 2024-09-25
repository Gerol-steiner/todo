<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();

            return view('category', compact('categories'));
            //compact('categories')は['categories' => $categories]
        }

    public function store(CategoryRequest $request)
    {
        // リクエストの内容をダンプして終了
        //dd($request->all());

        $category = $request->only(['name']);
        Category::create($category);

        return redirect('/categories')->with('message', 'カテゴリを作成しました');
    }

        public function update(CategoryRequest $request)
    {
        // dd($request->all());

        $category = $request->only(['name']);

        // $categoryの内容を確認
        // dd($category);

        Category::find($request->id)->update($category);

        return redirect('/categories')->with('message', 'Categoryを更新しました');
    }

        public function destroy(Request $request)
    {
        //dd($request->all());
        Category::find($request->id)->delete();
        return redirect('/categories')->with('message', 'Categoryを削除しました');
    }
}
