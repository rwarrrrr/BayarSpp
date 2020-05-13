<section>
	<div class="content">
		<h1>CRUD KELAS</h1>

		<br>
		<a href="{{url('admin/home')}}">home</a>
		<a href="{{url('admin/tambah/kelas')}}">tambah</a>

		<table>
			<tr>
				<th>Id Kelas</th>
				<th>Nama Kelas</th>
				<th>Kompetensi Keahlian</th>
				<th>aksi</th>
			</tr>
			@foreach($kelas as $row)
			<tr>
				<td>{{$row->id_kelas}}</td>
				<td>{{$row->nama_kelas}}</td>
				<td>{{$row->kompetensi_keahlian}}</td>
				<td>					
					<a href="{{url('admin/edit/kelas/'.$row->id_kelas)}}">edit</a>
					<form action="{{url('admin/delete/kelas'.$row->id_kelas)}}" method="post">
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