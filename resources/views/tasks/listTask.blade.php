@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>News List CRUD </h2>
			</div>
			<div class="pull-right">
				<a class="btn btn-success" href="addtask" title="Create a task"><i class="fa fa-btn fa-plus"></i></a>
			</div>
		</div>
	</div>
	@if (count($tasks ?? '') > 0)
	<table class="table table-bordered table-responsive-lg">
		<tr>
			<th>No-#</th>
			<th>Title</th>
			<th>Description</th>
			<th>CategoryId</th>
			<th>Date Updated</th>
			<th>Actions</th>
		</tr>
		@foreach ($tasks as $task)
		<?php 
			$singleCategory = App\Models\Category::find($task->categoryId);
			$categoryname = $singleCategory->name;
		?>
		<tr>
			<td>{{ $task->id }}</td>
			<td>{{ $task->title }}</td>
			<td>{{ $task->description }}</td>
			<td>{{ $task->categoryId }} - <?php echo $categoryname; ?></td>
			<td>{{ $task->updated_at->format('d.m.Y') }}</td>
			<td>
				<a href="{{url('detail/' . $task->id)}}" title="show"><i class="fa fa-btn fa-eye text-success"></i></a>
				<a href="{{url('edittask/' . $task->id)}}" title="edit"><i class="fa fa-btn fa-edit"></i></a>
				<a href="{{url('delete/' . $task->id)}}" title="delete"><i class="fa fa-btn fa-trash"></i></a>
			</td>
		</tr>
		@endforeach
	</table>
		{!! $tasks->links() !!}
	@else
		<p>Data no found</p>
	@endif
</div>
@endsection