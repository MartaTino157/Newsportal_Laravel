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
				<h3> {{$task->title}}</h3>
			</div>
			<div class="pull-right">
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
				{{$task->description}}
			</div>
			<div class="form-group">
				<i><strong>Category: </strong> <?php echo $categoryname; ?></i>
			</div>
			<div class="form-group">
				<i><strong>Date update: </strong>{{$task->updated_at->format('d.m.Y')}}</i>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-12">
			<a href="{{url('/news')}}" title="Go back" type="button" class="btn btn-default">Back to list</a>
		</div>
	</div>
</div>
@endsection