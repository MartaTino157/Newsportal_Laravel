@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="pull-left">
				<h2>News Portal</h2>
			</div>
			<div class="pull-right">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 margin-tb">
				<div class="col-sm-2">
					<div class="row">
						<div class="form-group">
							<a href="{{url('news/')}}" title="edit">
								Все новости
							</a>
						</div>
						@foreach ($categories as $category)
							<div class="form-group">
								<a href="{{url('categorynews/' . $category->id)}}" title="edit">
									{{$category->name}}
								</a>
							</div>
						@endforeach
					</div>
				</div>
				<div class="col-sm-10">
					<?php 
						$tasks = App\Models\Task::orderBy('updated_at', 'desc')->get();
					?>
					@foreach ($tasks as $task)
					<?php 
						$categoryOne = App\Models\Category::find($task->categoryId);
					?>
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="col-sm-5">
								@if($task->image!="")
									<img src="{{asset('images/' . $task->image)}}" class="img-thumnail" alt="{{$task->title}}" width="300">
								@else
									<p>No poster</p>
								@endif
							</div>
							<div class="col-sm-7">
								<div class="form-group">
									<h3>{{$task->title}}</h3>
								</div>
								<div class="form-group" style="font-size: 12px">
									<i><strong>Category: </strong> {{$categoryOne->name}}</i>
									<br>
									<i><strong>Date update: </strong>{{$task->updated_at->format('d.m.Y')}}</i>
								</div>
								<a href="{{url('detail/' . $task->id)}}" type="button" class="btn btn-default">Подробнее</a>
								<?php 
									$commentsNews=App\Http\Controllers\CommentsController::commentsCount($task->id);
								?>
								<p class="commentscount"><span class="spancomment">Comments count: </span>{{$commentsNews}}</p>
							</div>
						</div>
					</div>
					@endforeach
					<p><strong>Всего новостей: </strong>{{count($tasks)}}</p>
				</div>
			</div>
		</div>
	</div>
@endsection