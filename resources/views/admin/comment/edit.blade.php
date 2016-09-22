@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">编辑评论</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>编辑失败</strong>输入不符合要求<br><br>
							{!! implode('<br>', $errors->all()) !!}
						</div>
					@endif

					<form action="{{url('admin/comment/'.$comment->id)}}" method="POST">
						{{method_field('PATCH')}}
						{{csrf_field()}}
						<div class="form-group">
							<label>Nickname</label>
							<input type="text" name="nickname" class="form-control" required="required" value="{{$comment->nickname}}">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" value="{{$comment->email}}">
						</div>
						<div class="form-group">
							<label>Website</label>
							<input type="text" name="website" class="form-control" value="{{$comment->website}}">
						</div>
						<div class="form-group">
							<label>Content</label>
							<textarea name="content" rows="10" class="form-control" required="required">{{$comment->content}}</textarea>
						</div>
						<button class="btn btn-lg btn-info">提交修改</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
