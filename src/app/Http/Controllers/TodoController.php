<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Category;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::with('category')->get();
        $categories = Category::all();

        return view('index', compact('todos', 'categories'));     //compact('todos')は['todos' => $todos]
    }

    public function store(TodoRequest $request)
    {

        // リクエストの内容をダンプして終了
        // dd($request->all());

        $todo = $request->only(['category_id', 'content']);     //リクエストから'content'キーに対応するデータだけを取り出して配列として返す
        Todo::create($todo);

        return redirect('/')->with('message', 'Todoを作成しました');    //withメソッドは、リダイレクト先のセッションに一時的なデータを保存するために使われる。保存したデータは次のページリクエストで一度だけ利用できる
    }

    public function update(TodoRequest $request)
    {
        // dd($request->all());

        $todo = $request->only(['content']);
        Todo::find($request->id)->update($todo);

        return redirect('/')->with('message', 'Todoを更新しました');
    }

    public function destroy(Request $request)
    {
        $todo = Todo::find($request->id);

        if ($todo) {
            $todo->delete();
            return redirect('/')->with('message', 'Todoを削除しました');
        } else {
            return redirect('/')->with('error', 'Todoが見つかりませんでした');
        }
    }

    public function search(Request $request)
    {
        $todos = Todo::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->get();
        $categories = Category::all();

        return view('index', compact('todos', 'categories'));
    }


}