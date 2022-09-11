<?php

namespace App\Http\Controllers;

use App\Models\Todolists;
use Illuminate\Http\Request;

class TodolistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Todolists::all();
        return view('todolists.index')
            ->with([
                'data' => $data,
                'done' => $data
            ]);
            // return view('todolists.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('todolists.register');
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
            'to_do' => 'required',
            'desc' => 'required',
        ]);

        Todolists::create($request->all());

        return redirect()->route('todolists.index')
                        ->with('success','Product created successfully.');
    }

     //update to complete
    public function getUpdate_task(Request $request){
        $id = $request->id;
        // $newsts = $request->sts;
        $task = Todolists::find($id);
            $task->status = $request->sts;
            $query = $task->save();

            if($query){
                return response()->json(['code'=>1, 'msg'=>'have Been updated']);
            }else{
                return response()->json(['code'=>0, 'msg'=>'Something went wrong']);
            }
    }

     //GET TASK DETAILS
    public function getTodoDetails(Request $request){
        $task_id = $request->task_id;
        // $newsts = $request->sts;
        $details = Todolists::find($task_id);
        // $date = $details->updated_at;
        // $date= date("Y/m/d", strtotime($date) );
        // return response()->json(['details'=>$details,'date'=>$date]);
        return response()->json(['details'=>$details]);
    }

    //UPDATE TASK DETAILS
    public function updateTodoDetails(Request $request){
        $id = $request->task_id;
        $validator = $request->validate([
            'to_do' => 'required',
            'desc' => 'required',
        ]);

        if(!$validator){
               return response()->json(['code'=>0,'msg'=>'validator error!']);
        }else{

            $tart_date = $request->start_date;
            $due_date = $request->due_date;
            if($due_date){
                if($tart_date <= $due_date){
                
                    $task = Todolists::find($id);
                    $task->to_do = $request->to_do;
                    $task->desc = $request->desc;
                    $task->start_date = $request->start_date;
                    $task->due_date = $request->due_date;
                    $query = $task->save();

                    if($query){
                        return response()->json(['code'=>1, 'msg'=>'Details have Been updated']);
                    }else{
                        return response()->json(['code'=>0, 'msg'=>'Something went wrong']);
                    }
                }else{
                    return response()->json(['code'=>0, 'msg'=>'Due date must be greater than start date']);
                }
            }else{
                $task = Todolists::find($id);
                $task->to_do = $request->to_do;
                $task->desc = $request->desc;
                $task->start_date = $request->start_date;
                $task->due_date = $request->due_date;
                $query = $task->save();

                if($query){
                    return response()->json(['code'=>1, 'msg'=>'Details have Been updated']);
                }else{
                    return response()->json(['code'=>0, 'msg'=>'Something went wrong']);
                }
            }
        }
    }

    // DELETE TASK RECORD
    public function deleteTodo(Request $request){
        $id = $request->id;
        $query = Todolists::find($id)->delete();

        if($query){
            return response()->json(['code'=>1, 'msg'=>'Task has been deleted from database']);
        }else{
            return response()->json(['code'=>0, 'msg'=>'Something went wrong']);
        }
    }
}
