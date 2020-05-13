<section>
	

	<div class="content">
		
		<h1>SPP</h1>
		<hr><br>
		<form action="{{url('admin/siswa',@$siswa->nisn)}}" method="post">
			@if(!empty($siswa))
				@method('PATCH')
			@endif
				
			@csrf

			<div>
				<label for="nisn">nisn</label>
				<input type="text" id="nisn" name="nisn" value="{{old('nisn',@$siswa->nisn)}}">
			</div>
			<div>
				<label for="nis">nis</label>
				<input type="text" id="nis" name="nis" value="{{old('nis',@$siswa->nis)}}">
			</div>
			<div>
				<label for="nama">nama</label>
				<input type="text" id="nama" name="nama" value="{{old('nama',@$siswa->nama)}}">
			</div>
			<div>
				<select name="id_kelas" id="id_kelas">
					<option value="">pilih kelas</option>
					@foreach($kelas as $rowk)
					<option value="{{$rowk->id_kelas}}"
				
						{{old('id_kelas')}}

						@if(@$siswa->id_kelas == $rowk->id_kelas)
							selected
						@endif

						>{{$rowk->nama_kelas}}</option>
					@endforeach
				</select>
			</div>
			<div>
				<label for="alamat">alamat</label>
				<input type="text" id="alamat" name="alamat" value="{{old('alamat',@$siswa->alamat)}}">
			</div>
			<div>
				<label for="no_telp">no_telp</label>
				<input type="text" id="no_telp" name="no_telp" value="{{old('no_telp',@$siswa->no_telp)}}">
			</div>
			<div>
				<select name="id_spp" id="id_spp">
					<option value="">pilih SPP</option>
					@foreach($spp as $rows)
					<option value="{{$rows->id_spp}}"
				
						{{old('id_spp')}}

						@if(@$siswa->id_spp == $rows->id_spp)
							selected
						@endif

						>{{$rows->tahun}}</option>
					@endforeach
				</select>
			</div>
			<div>
				<button type="submit">kirim</button>
			</div>
		</form>



	</div>


</section>