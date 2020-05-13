<section>
	

	<div class="content">
		
		<h1>SPP</h1>
		<hr><br>
		<form action="{{url('admin/spp',@$spp->id_spp)}}" method="post">
			@if(!empty($spp))
				@method('PATCH')
			@endif
				
			@csrf

			<div>
				<label for="tahun">tahun</label>
				<input type="text" id="tahun" name="tahun" value="{{old('tahun',@$spp->tahun)}}">
			</div>
			<div>
				<label for="nominal">nominal</label>
				<input type="text" id="nominal" name="nominal" value="{{old('nominal',@$spp->nominal)}}">
			</div>
			<div>
				<button type="submit">kirim</button>
			</div>
		</form>



	</div>


</section>