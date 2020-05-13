<link rel="stylesheet" type="text/css" href="{{ asset('test.css') }}">
<section>
	<div class="content">
		<h1>login petugas</h1>
		<hr><br>
		<form action="{{url('login/petugas')}}" method="post">
			@csrf
			<div>
				<label for="username">username</label>
				<input type="text" id="username" name="username">
			</div>
			<div>
				<label for="password">password</label>
				<input type="password" id="password" name="password">
			</div>
			<button type="submit">login</button>
		</form>
	</div>
</section>