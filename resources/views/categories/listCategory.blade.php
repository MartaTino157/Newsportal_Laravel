<!-- Current Tasks -->
@if (count($categories) > 0)
	<div class="panel panel-default">
		<div class="panel-heading">
			Current Categories
		</div>
		<div class="panel-body">
			<table class="table table-striped task-table">
				<thead>
					<th>Category</th>
					<th>&nbsp;</th>
				</thead>
				<tbody>
					@foreach ($categories as $category)
						<tr>
							<td class="table-text"><div>{{ $category->name }}</div></td>
							<!-- Task Delete Button -->
							<td>
								<form action="{{ url('categorylist/'.$category->id) }}" method="POST">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<a href="{{url('editcategory/' . $category->id)}}" title="edit" type="button" class="btn btn-default">
									<i class="fa fa-btn fa-edit"></i> Edit
									</a>
									<button type="submit" class="btn btn-danger" >
										<i class="fa fa-btn fa-trash"></i> Delete
									</button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endif