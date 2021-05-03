<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('title', 'asc')->latest()->paginate(5);
        return view('tasks.listTask', compact('tasks'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'categoryId' => 'required'
        ]);
        $data = $request->all(); //данные переданы формой
        $filename = $request->file('image')->getClientOriginalName(); //имя файла картинки
        $data['image'] = $filename; //запись имени для бд
        Task::create($data); // добавление данных в базу (вместо INSERT)
        $file = $request->file('image'); //путь исходной картинки
        if($filename){
            $file->move('../public/images/', $filename); //загрузка изображений
        }
        return redirect('/newslist');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'categoryId' => 'required'
        ]);
        $data = $request->all(); //данные переданы формой
        if($request->file('image')){
            $filename = $request->file('image')->getClientOriginalName(); //имя файла картинки
            $data['image'] = $filename; //запись имени для бд
            $file = $request->file('image'); //путь исходной картинки
            if($filename){
                $file->move('../public/images/', $filename); //загрузка изображений
            } 
        }
        $task->update($data);
        return redirect('/newslist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/newslist');
    }
    public function listLimit()
    {
        $tasks = Task::orderBy('created_at', 'desc')->take(3)->get();
        return view('start', compact('tasks'));
    }
    public function detail(Task $task)
    {
        return view('tasks.detail', compact('task'));
    }
}
