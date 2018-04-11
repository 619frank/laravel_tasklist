<?php
use Illuminate\Http\Request;
use App\Task;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $tasks=Task::orderby('created_at','asc')->get();

    return view('task.tasks',[
        'task'=>$tasks,
    ]);
});
Route::post('/task', function (Request $request) {
    $validator = Validator::make($request->all(),[
        'name'=>'required|max:255'
    ]);
    if($validator->fails()){
        return redirect('/')
        ->withInput()
        ->withErrors($validator);
    }
    $task= new Task;
    $task->name=$request->name;
    $task->save();
    return redirect('/');
});

Route::delete('/task/{task}',function (Task $task){
    $task->delete();
    return redirect('/');
}

);