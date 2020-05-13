<section>
	<div class="content">
		<h1>Halo {{Session::get('nama_petugas')}}</h1>
		<a href="{{url('logout')}}">logout</a>
		<br>
		
		
		<a href="{{url('petugas/tambah/pembayaran')}}">entri transaksi pembayaran</a>
		

		<table>

			<tr>
				<th>No</th>
				<th>Id Pembayaran</th>
				<th>Tanggal</th>
				<th>Petugas</th>
				<th>Nama Siswa</th>
				<th>Kelas</th>
				<th>bulan dibayar</th>
				<th>tahun dibayar</th>
				<th>Jumlah Bayar</th>
				<th>Tahun</th>
				<th>Aksi</th>
			</tr>
			

			@foreach($pembayaran as $row)
			<tr>
				<td>{{isset($i)? ++$i : $i = 1 }}</td>
				<td>{{$row->id_pembayaran}}</td>
				<td>{{$row->tgl_bayar}}</td>
				<td>{{$row->petugas->nama_petugas}}</td>
				<td>{{$row->siswa->nama}}</td>
				<td>{{$row->siswa->kelas->nama_kelas}}</td>
				<td>{{$row->bulan_dibayar}}</td>
				<td>{{$row->tahun_dibayar}}</td>
				<td>{{$row->jumlah_bayar}}</td>
				<td>{{$row->spp->tahun}}</td>
				<td>
					<a href="{{url('petugas/edit/pembayaran/'.$row->id_pembayaran)}}">edit</a>

					<form action="{{url('petugas/pembayaran'.$row->id_pembayaran)}}" method="post">
						@csrf
						@method('DELETE')
						<button type="submit">delete</button>
					</form>
				</td>
			</tr>
			@endforeach


		</table>
		

		<br>
	</div>
</section>