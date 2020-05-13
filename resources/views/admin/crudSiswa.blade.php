<section>
	<div class="content">
		<h1>CRUD SISWA</h1>

		<br>
		<a href="{{url('admin/home')}}">home</a>
		<a href="{{url('admin/tambah/siswa')}}">tambah</a>

		<table>
			<tr>
				<th>NISN</th>
				<th>NIS</th>
				<th>Nama</th>
				<th>Nama Kelas</th>
				<th>Alamat</th>
				<th>No Telp</th>
				<th>Tahun</th>
				<th>aksi</th>
			</tr>
			@foreach($siswa as $row)
			<tr>
				<td>{{$row->nisn}}</td>
				<td>{{$row->nis}}</td>
				<td>{{$row->nama}}</td>
				<td>{{$row->kelas->nama_kelas}}</td>
				<td>{{$row->alamat}}</td>
				<td>{{$row->no_telp}}</td>
				<td>{{$row->spp->tahun}}</td>
				<td>					
					<a href="{{url('admin/edit/siswa/'.$row->nisn)}}">edit</a>
					<form action="{{url('admin/delete/siswa'.$row->nisn)}}" method="post">
						@csrf
						@method('DELETE')
						<button>delete</button>
					</form>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</section>