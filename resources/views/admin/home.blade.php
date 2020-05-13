<section>
	<div class="content">
		<h1>Halo {{Session::get('nama_petugas')}}</h1>
		<a href="{{url('logout')}}">logout</a>
		<br>
		<a href="{{url('admin/crud/siswa')}}">crud siswa</a>
		<a href="{{url('admin/crud/petugas')}}">crud petugas</a>
		<a href="{{url('admin/crud/kelas')}}">crud kelas</a>
		<a href="{{url('admin/crud/spp')}}">crud spp</a>
		<a href="{{url('admin/crud/pembayaran')}}">entri pembayaran pembayaran</a>


	</div>
</section>