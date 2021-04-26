@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					Edit Category
				</div>
				<div class="pull-right">
					<a class="btn btn-primary" href="/categorylist" title="Go back"><i class="fa fa-backward "></i> </a>
				</div>
				<div class="panel-body">
					<!-- Display Validation Errors -->
					@include('common.errors')
					<!-- Category EditForm -->
					<form action="{{url('editcategory/' . $category->id)}}" method="POST">
						@csrf
						@method('POST')
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Name:</strong>
									<input type="text" name="name" value="{{ $category->name }}" class="form-control" placeholder="Name">
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 text-center">
								<button type="submit" class="btn btn-primary">Update</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection