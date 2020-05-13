<section>
	

	<div class="content">
		
		<h1>Petugas</h1>
		<hr><br>
		<form action="{{url('admin/petugas',@$petugas->id_petugas)}}" method="post">
			@if(!empty($petugas))
				@method('PATCH')
			@endif
				
			@csrf
			
			<div>
				<label for="nama_petugas">nama petugas</label>
				<input type="text" id="nama_petugas" name="nama_petugas" value="{{old('nama_petugas',@$petugas->nama_petugas)}}">
			</div>
			<div>
				<label for="username">username</label>
				<input type="text" id="username" name="username" value="{{old('username',@$petugas->username)}}">
			</div>
			<div 
				@if(!empty($petugas))
					hidden
				@endif
			>
				<label for="password">password</label>
				<input type="password" id="password" name="password" value="{{old('password',@$petugas->password)}}">
			</div>
			<div>
				<label for="level">level</label>
				<select name="level" id="level">
					<option value="">pilih level</option>
					<option value="admin" {{old('level',(@$petugas->level == 'admin') ? 'selected' : '')}}>admin</option>
					<option value="petugas" {{old('level',(@$petugas->level == 'petugas') ? 'selected' : '')}}>petugas</option>
				</select>
			</div>
			<div>
				<button type="submit">kirim</button>
			</div>
		</form>



	</div>


</section>