<?php

namespace App\Http\Controllers;

use App\Models\TodoModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TodoController extends Controller
{

    /**
     * Базовый метод получения всех заданий
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): \Illuminate\Http\Response
    {
        return response()->view('todo');
    }

    /**
     * Метод работы с формой добавления задач
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): \Illuminate\Http\Response
    {
        return response()->view('todo-form');
    }

    /**
     * Метод сохранения в БД.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): \Illuminate\Http\Response
    {
        $rules = array(
            'title'       => 'required|max:255',
            'author'      => 'required|max:255'
        );
        $request->validate($rules);
        $todo = new TodoModel();
        $todo->title = $request->title;
        $todo->author = $request->author;
        if($request->status !== '-') {
            $todo->status = $request->status;
        }
        $todo->save();
        return response()->view('todo');
    }

    /**
     * Удаление записи из таблицы
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        TodoModel::destroy($id);
    }

    /**
     * Метод ля работы с таблицей Datatables
     * @param Request $request
     * @return mixed
     * @throws \Exception
     */
    public function getTodos(Request $request)
    {
        if ($request->ajax()) {
            $data = TodoModel::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a id="delete_'.$row->todo_id.'" onclick="deleteTodo('.$row->todo_id.')" class="delete btn btn-danger btn-sm" >X</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

}
