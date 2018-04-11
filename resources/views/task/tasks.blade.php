@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        @include('common.errors')
        <form action="{{url('task')}}" method="post" class="form-horizontal">
            <div class="form-group">
                <label for="name" class="control-lable col-sm-3">Task</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default alert-link">Add Task</button>
                </div>                
            </div>
            {{csrf_field()}}
        </form>
    </div>
</div>
@if(count($task)>0)
  <div class="panel panel-default">
      <div class="panel-heading">
          Tasks
      </div>
      <div class="panel-body">
          <table class="table table-striped">              
              <thead>
                  <th>Task</th>
                  <th>&nbsp;</th>
              </thead>
              <tbody>
              @foreach($task as $tasks)
               <tr>
                   <td>{{$tasks->name}}</td>
                   <td>
                       <form action="{{url('/task/'.$tasks->id)}}" method="POST">
                        <button type="submit" class="btn btn-danger" Value="delete">Delete</button>
                        {{ method_field('DELETE') }}
                        {{csrf_field()}}
                    </form>
               </tr>
              @endforeach          
            </tbody>
        </table>
  </div>
@endif
@endsection