<section>
	<div class="content">
		<h1>CRUD SPP</h1>

		<br>
		<a href="{{url('admin/home')}}">home</a>
		<a href="{{url('admin/tambah/spp')}}">tambah</a>

		<table>
			<tr>
				<th>Id Spp</th>
				<th>Tahun</th>
				<th>Nominal</th>
				<th>aksi</th>
			</tr>
			@foreach($spp as $row)
			<tr>
				<td>{{$row->id_spp}}</td>
				<td>{{$row->tahun}}</td>
				<td>{{$row->nominal}}</td>
				<td>					
					<a href="{{url('admin/edit/spp/'.$row->id_spp)}}">edit</a>
					<form action="{{url('admin/delete/spp'.$row->id_spp)}}" method="post">
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