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
<hr>
@if(Auth::check())
	<div class="container">
		<div class="col-sm-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Add comments</h4>
				</div>
				<div class="panel-body">
					<form action="{{url('comments')}}" method="POST">
					{{ csrf_field() }}
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<strong>Comment text <i>(1000 symbols)</i></strong>
									<textarea class="form-control" style="height: 50px" name="body" required=""></textarea>
								</div>
							</div>
							<input type="hidden" name="newsId" value="{{ $task->id }}" class="form-control" placeholder="newsId" readonly>
							<div class="col-md-12 text-center">
								<button type="submit" class="btn btn-primary">Send comment</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endif
<div class="container">
	<hr>
	<h4>Comments list</h4>
	@forelse ($task->comments as $comment)
		<p>
			<b>Author </b>{{$comment->user->name}}<br>
			<b>Date created </b> {{ date('d-m-Y', strtotime($comment->created_at))}}
		</p>
		<p>
			<span class="spanclass">Comment </span>
			{{$comment->body}}
		</p>
		<hr>
	@empty
		<p>This post has no comments</p>
	@endforelse
</div>
@endsection