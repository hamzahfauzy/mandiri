<div class="container">
	<div class="panel transparent">
		<div class="panel-body">
			<h2 align="center">Selamat Datang Di Sistem Penjualan DSS Apotik Mandiri</h2>
			<p align="center">
				Sebelum membeli obat, Silahkan lengkapi form berikut.
				<br>
				<marquee>
					1. Visi : Melakukan Konseling yang baik kepada pasien, menyediakan obat obatan dengan kualitas yang baik,
					Memberikan pelayanan kesehatan yang optimal.
					2. Misi : Membuka hubungan baik antara dokter dengan pasien.

				</marquee>
			</p>
			<br><br><br>
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					
					<form method="post" id="filter" action="<?=URL;?>/auth">
						<div class="main-wrapper">
							<div class="slide active" id="slide1">
								<h3 align="center">Pilih Bagian Penyakit</h3>
								<div class="form-group">
								<input type="radio" name="bagian" value="1" id="opt1" checked="">
								<label for="opt1">Kepala</label>
								</div>
								<div class="form-group">
								<input type="radio" name="bagian" value="2" id="opt2">
								<label for="opt2">Pencernaan</label>
								</div>
								<div class="form-group">
								<input type="radio" name="bagian" value="3" id="opt3">
								<label for="opt3">Mata</label>
								</div>
								<div class="form-group">
								<input type="radio" name="bagian" value="4" id="opt4">
								<label for="opt4">Telinga</label>
								</div>
								<div class="form-group">
								<input type="radio" name="bagian" value="5" id="opt5">
								<label for="opt5">Hidung</label>
								</div>
								<div class="form-group">
								<input type="radio" name="bagian" value="6" id="opt6">
								<label for="opt6">Mulut</label>
								</div>
								<div class="form-group">
								<input type="radio" name="bagian" value="7" id="opt7">
								<label for="opt7">Gigi</label>
								</div>
							</div>
							<div class="slide" id="slide2">
								<h3 align="center">Pilih Usia</h3>
								<div class="form-group">
								<input type="radio" name="usia" value="1" id="opt8" checked="">
								<label for="opt8">0-3 Tahun</label>
								</div>
								<div class="form-group">
								<input type="radio" name="usia" value="2" id="opt9">
								<label for="opt9">4-6 Tahun</label>
								</div>
								<div class="form-group">
								<input type="radio" name="usia" value="3" id="op10">
								<label for="op10">7-11 Tahun</label>
								</div>
								<div class="form-group">
								<input type="radio" name="usia" value="4" id="opt11">
								<label for="opt11">12-20 Tahun</label>
								</div>
								<div class="form-group">
								<input type="radio" name="usia" value="5" id="opt12">
								<label for="opt12">Dewasa</label>
								</div>
							</div>
							<div class="slide" id="slide3"></div>
						</div>
						<div class="form-group">
						<button class="btn btn-success btn-lg btn-block btn-next" type="button">Next</button>
						<p></p>
						<div class="if-next"></div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<style type="text/css">
	.slide {
		display: none;
		transition: opacity 500 ease-in-out;
	}
	.active {
		display: block;
		transition: opacity 500 ease-in-out;
	}
</style>
<script type="text/javascript">
	var n = 1;
	var o = 0;
	$(".btn-next").click(function(){
		
		data = $("#filter").serialize();
		if(n==1){
			if($("input[name=bagian]:checked").val() == "")
				alert(1)
		}
		if(n==2){
			$.get("<?=URL;?>/gejala/get-data?"+data,function(response){
				if(response=="0"){
					$("#slide3").html("<h2 align='center'>Gejala tidak di temukan</h2>");
					$(".btn-next").attr("disabled","disabled");
				}else{
					$("#slide3").html(response);
				}
			});
		}else if(n==3){
			$.post("<?=URL;?>/auth",data,function(response){
				if(response)
					location=location;
			});
			return;
		}
		$("#slide"+n).removeClass("active");
		$("#slide"+(n+1)).addClass("active");
		if(o==0)
			$(".if-next").html('<button class="btn btn-danger btn-block" onclick="btnBack()" type="button">Back</button>');
		o++;
		n++;
	});
	function btnBack(){
		//console.log($(".slide"));
		$("#slide"+n).removeClass("active");
		$("#slide"+(n-1)).addClass("active");
		if(o==1)
			$(".if-next").html('');
		n--;
		o--;
		$(".btn-next").removeAttr("disabled");
	}
</script>