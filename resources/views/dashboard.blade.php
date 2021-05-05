@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="homecontent">
					<div class="title m-b-md">
						@can('isAdmin')
							Dashboard<br>
							<div class="btn btn-success btn-lg">
								You have Admin Access
							</div>
						@elsecan('isManager')
							Dashboard<br>
							<div class="btn btn-primary btn-lg">
								You have Manager Access
							</div>
						@elsecan('isUser')
							Home Page<br>
							<div class="btn btn-primary btn-lg">
								You have User Access
							</div>
						@else
								Home Page<br>
							<div class="btn btn-danger btn-lg">
								You are not logged in
							</div>
						@endcan
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection