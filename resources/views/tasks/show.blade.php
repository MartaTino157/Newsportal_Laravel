@extends('layouts.app')

@section('content')
<?php 
	$singleCategory = App\Models\Category::find($task->categoryId);
	$categoryname = $singleCategory->name;
?>
<div class="container">
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>
					
				</h2>
			</div>
			<div class="pull-right">
				<a class="btn btn-primary" href="/newslist" title="Go back"><i class="fa fa-backward"></i></a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4">
			@if($task->image!="")
				<img src="{{asset('images/' . $task->image)}}" class="img-thumnail" alt="{{$task->title}}" width="300">
			@else
				<p>No poster</p>
			@endif
		</div>
		<div class="col-sm-8">
			<div class="form-group">
				<strong>Title: </strong> {{$task->title}}
			</div>
			<div class="form-group">
				<strong>Description: </strong> {{$task->description}}
			</div>
			<div class="form-group">
				<strong>Category: </strong> <?php echo $categoryname; ?>
			</div>
			<div class="form-group">
				<i>Date update: {{$task->updated_at->format('d.m.Y')}}
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-12">
			<form action="{{url('delete/' . $task->id)}}" method="POST">
				<a href="{{url('edittask/' . $task->id)}}" title="edit" type="button" class="btn btn-default">
					<i class="fa fa-btn fa-edit"></i>Edit
				</a>
				{{ csrf_field() }}
				{{ method_field('DELETE') }}
				<button type="submit" title="delete" class="btn btn-default">
					<i class="fa fa-btn fa-trash"></i>Delete
				</button>
			</form>
		</div>
	</div>
</div>
@endsection