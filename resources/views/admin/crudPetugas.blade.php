<section>
	<div class="content">
		<h1>CRUD PETUGAS</h1>

		<br>
		<a href="{{url('admin/home')}}">home</a>
		<a href="{{url('admin/tambah/petugas')}}">tambah</a>

		<table>
			<tr>
				<th>Id Petugas</th>
				<th>Nama Petugas</th>
				<th>Username</th>
				<th>aksi</th>
			</tr>
			@foreach($petugas as $row)
			<tr>
				<td>{{$row->id_petugas}}</td>
				<td>{{$row->nama_petugas}}</td>
				<td>{{$row->username}}</td>
				<td>
					<a href="{{url('admin/forgot/petugas/'.$row->id_petugas)}}">forgot password</a>
					<a href="{{url('admin/edit/petugas/'.$row->id_petugas)}}">edit</a>
					<form action="{{url('admin/delete/petugas'.$row->id_petugas)}}" method="post">
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