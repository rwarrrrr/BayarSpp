<section>
	

	<div class="content">
		
		<h1>Petugas</h1>
		<hr><br>
		<form action="{{url('admin/forgot',@$petugas->id_petugas)}}" method="post">
			@csrf

			<div>
				<label for="password">new password</label>
				<input type="password" id="password" name="password">
			</div>
			<div>
				<label for="cpassword">confirm password</label>
				<input type="password" id="cpassword" name="cpassword" >
			</div>
			<div>
				<button type="submit">kirim</button>
			</div>
		</form>



	</div>


</section>