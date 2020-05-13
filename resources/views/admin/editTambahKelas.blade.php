<section>
	

	<div class="content">
		
		<h1>SPP</h1>
		<hr><br>
		<form action="{{url('admin/kelas',@$kelas->id_kelas)}}" method="post">
			@if(!empty($kelas))
				@method('PATCH')
			@endif
				
			@csrf

			<div>
				<label for="nama_kelas">nama kelas</label>
				<input type="text" id="nama_kelas" name="nama_kelas" value="{{old('nama_kelas',@$kelas->nama_kelas)}}">
			</div>
			<div>
				<label for="kompetensi_keahlian">kompetensi keahlian</label>
				<input type="text" id="kompetensi_keahlian" name="kompetensi_keahlian" value="{{old('kompetensi_keahlian',@$kelas->kompetensi_keahlian)}}">
			</div>
			<div>
				<button type="submit">kirim</button>
			</div>
		</form>



	</div>


</section>