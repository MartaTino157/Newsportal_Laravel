@extends('layouts.app')

@section('content')
<div class="container">
	<div class="rowstyle" >
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Add New Task</h2>
			</div>
			<div class="pull-right">
				<a class="btn btn-primary" href="newslist" title="Go back"> <i class="fa fa-backward "></i> </a>
			</div>
		</div>
	</div>
	<div class="rowstyle">
		<div class="col-lg-12 margin-tb">
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
			<form action="" method="POST" enctype="multipart/form-data">
			@csrf
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>Title:</strong>
							<input type="text" name="title" class="form-control" placeholder="Title" required>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>Description:</strong>
							<textarea class="form-control" style="height:50px" name="description" placeholder="description" required></textarea>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>Category:</strong>
							<select name="categoryId" class="form-control" required>
								<?php
									$categories=App\Models\Category::get(array('id', 'name'));
									foreach ($categories as $category) {
										echo '<option value="'.$category->id.'" ';
										echo '>'.$category->name.'</option>';
									}
								?>
							</select>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>Poster:</strong>
							<input type="file" name="image" id="image" accept="image/*" class="form-control" value="{{ old('image') }}">
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 text-center">
						<button type="submit" class="btn btn-primary">Save task</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection