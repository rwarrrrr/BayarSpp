<section>
	<div class="content">
		<h1>login Siswa</h1>
		<hr><br>
		<form action="{{url('login/siswa')}}" method="post">
			@csrf
			<div>
				<label for="nisn">nisn</label>
				<input type="text" id="nisn" name="nisn">
			</div>
			<button type="submit">login</button>
		</form>
	</div>
</section>