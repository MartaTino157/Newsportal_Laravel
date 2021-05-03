@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<h2>Welcome News Portal Laravel </h2>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 margin-tb">
			@foreach ($tasks as $task)
			<?php 
				$singleCategory = App\Models\Category::find($task->categoryId);
				$categoryname = $singleCategory->name;
			?>
			<div class="col-sm-4">
				<div class="form-group">
					<h4> {{ $task->title }} </h4>
				</div>
				@if($task->image!="")
					<img src=" {{asset('images/' . $task->image)}}" class="img-thumbnail" alt="{{$task->title}}"  width="300">
				@else
					<p>No poster</p>
				@endif
				<div class="form-group">
					<strong>Category: </strong> <?php echo $categoryname; ?>
				</div>
				<div class="form-group">
					<i>Date update: {{$task->updated_at->format('d.m.Y')}}</i>
				</div>
				<a href="{{url('detail/' . $task->id)}}">Подробнее</a>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endsection