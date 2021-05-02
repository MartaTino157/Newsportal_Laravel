
@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Edit Tasks</h2>
			</div>
			<div class="pull-right">
				<a class="btn btn-primary" href="/newslist" title="Go back"> <i class="fa fa-backward "></i> </a>
			</div>
		</div>
	</div>
	@if ($errors->any())
		<div class="alert alert-danger">
			<strong>Error!</strong>
			<ul>
				@foreach ($errors->all() as $error)
					<li></li>
				@endforeach
			</ul>
		</div>
	@endif
	<form action="{{url('edittask/' . $task->id)}}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('POST')
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Title:</strong>
					<input type="text" name="title" value="{{ $task->title }}" class="form-control" placeholder="Title">
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Description:</strong>
					<textarea class="form-control" style="height:50px" name="description" >{{ $task->description }}</textarea>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Category:</strong>
					<select name="categoryId" class="form-control" >
						<?php
							$categories=App\Models\Category::get(array('id', 'name'));
							foreach ($categories as $category) {
								echo '<option value="'.$category->id.'" ';
								if ($category->id==$task->categoryId){
									echo 'selected ';
								}
									echo '>'.$category->name.'</option>';
								}
						?>
					</select>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>OldImage:</strong>
					@if($task->image!="")
						<img src="{{asset('images/' . $task->image)}}" class="img-thumbnail" alt="{{ $task->title }}" width="104" height="136" />
					@else
						<p>No image</p>
					@endif
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Image:</strong>
					<input type="file" name="image" id="image" accept="image/*" class="form-control" value="{{ old('image') }}">
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Update</button>
			</div>
		</div>
	</form>
</div>
@endsection