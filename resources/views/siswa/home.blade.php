<section>
	<div class="content">
		<h1>Halo {{Session::get('nama')}}</h1>
		<br>
		<a href="{{url('logout')}}">logout</a>
		
		

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
			</tr>
			@endforeach


		</table>
		

		<br>
	</div>
</section>