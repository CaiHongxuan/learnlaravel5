@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">管理评论</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							{!! implode('<br>', $errors->all()) !!}
						</div>
					@endif

					<table class="table table-striped">
						<tr>
							<th>Content</th>
							<th>User</th>
							<th>Page</th>
							<th>编辑</th>
							<th>删除</th>
						</tr>
						@foreach ($comments as $comment)
							<tr>
								<td>{{ $comment->content }}</td>
								<td>
									@if ($comment->website)
										<a href="{{url($comment->website)}}">
											<h4>{{ $comment->nickname }}</h4>
										</a>
									@else
										<h4>{{ $comment->nickname }}</h4>
									@endif
									{{ $comment->email }}
								</td>
								<td>
									<a href="{{url('article/'.$comment->article_id)}}"><h5>{{ $comment->article_id }}</h5></a>
								</td>
								<td>
									<a href="{{url('admin/comment/'.$comment->id.'/edit')}}" class="btn btn-success">编辑</a>
								</td>
								<td>
									<form action="{{url('admin/comment/'.$comment->id)}}" method="POST" style="display: inline;">
										{{method_field('DELETE')}}
										{{csrf_field()}}
										<button type="submit" class="btn btn-danger">删除</button>
									</form>
								</td>
							</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
