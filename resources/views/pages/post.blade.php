@extends('layout.app')
@section('content')
<form method="post" action="#">
	<input name="title" placeholder="titel" type="text"><br>
	<textarea name="content" placeholder="content" rows="20" cols="30" ></textarea>
	<input name="submit" value="verzend" type="submit">
</form>

@endsection