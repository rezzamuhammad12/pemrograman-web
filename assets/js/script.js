// scroll pada saat di click 
$('.page-scroll').on('click', function(e){

	// ambil isi href
	var tujuan = $(this).attr('href');
	// tangkap elemen ybs
	var elementujuan = $(tujuan);
	
	// pindahkan scroll
	$('html').animate({
		scrollTop: elementujuan.offset().top - 50 
	},1000,'swing');


	e.preventDefault();
});


// ajax search

$('.tombol-cari').hide();
$('.keyword').on('keyup', function() {
	// $('.container').load('ajax-cari.php?keyword=' + $('.keyword').val());
	$.ajax({
		url: 'ajax-cari.php',
		type: 'get',
		data: { keyword: $('.keyword').val() },
		success: function(hasil) {
			$('.container').html(hasil);
		}
	})
});
