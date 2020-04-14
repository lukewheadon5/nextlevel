<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Team;

class TasksController extends Controller
{


    public function calendar($id)
    {
        $team = Team::findOrFail($id);
        $exists = $team->admins()->where('user_id', auth()->id())->exists();
        $exists2 = $team->coaches()->where('user_id', auth()->id())->exists();
        if($exists == true || $exists2 == true){
        return view('calendar.calendarA' , ['team'=>$team]);
        }else{
            return view('calendar.calendar' , ['team'=>$team]);
        }
    }

  
    

    public function create($id)
    {
        $team = Team::findOrFail($id);
        return view('tasks.create' , ['team'=>$team]);
    }

    
    public function store(Request $request)
    {   $validatedData = $request->validate([
            'name'=>'required|max:100',
            'description'=>'required|max:255',
            'start'=>'required',
            'end'=>'required',
            'color'=>'required',
        ]);

        $team = Team::findOrFail($request->id);
        $task = new Task;
        $task->team_id = $team->id;
        $task->name = $request->name;
        $task->description = $request->description;
        $task->start = $request->start;
        $task->end = $request->end;
        $task->color = $request->color;
        $task->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);
        $team = $task->team;
        $exists = $team->admins()->where('user_id', auth()->id())->exists();
        $exists2 = $team->coaches()->where('user_id', auth()->id())->exists();
        if($exists == true || $exists2 == true){
            return view('tasks.showA' , ['task'=>$task]);
        }else{
            return view('tasks.showA' , ['task'=>$task]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit' , ['task'=>$task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'=>'required|max:100',
            'description'=>'required|max:255',
            'color'=>'required',
        ]);

        $task = Task::findOrFail($id);
        $team = $task->team;
        $task->name=$request->input('name');
        if($request->start == NULL){

        }
        else{
            $task->start=$request->input('start');
        }
        if($request->end == NULL){

        }
        else{
            $task->end=$request->input('end');
        }  
            $task->color=$request->input('color');
            $task->description=$request->input('description');
            $task->save();

        return view('calendar.calendarA' , ['team'=>$team]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $team = $task->team;
        $task->delete();
        return view('calendar.calendarA' , ['team'=>$team]);
    }
}
