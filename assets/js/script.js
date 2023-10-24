$(document).ready(function () {
	$('#datepicker').datepicker({
		format: "yyyy-mm-dd",
		autoclose: true,
		todayHighlight: true,
	});

	function validasiSaldo(e) {
		let saldo_debit = $('.saldo').val();
		let namaAkun_debit = $('#no_reff').val();
		let saldo_kredit = $('.saldo_kredit').val();
		let namaAkun_kredit = $('#no_reff_kredit').val();

		if (saldo_debit == '') {
			e.preventDefault();
			swal({
				type: 'error',
				title: 'Oops...',
				text: 'Saldo wajib di isi',
			});
		}

		if (namaAkun_debit == '') {
			e.preventDefault();
			swal({
				type: 'error',
				title: 'Oops...',
				text: 'Nama Akun wajib di isi',
			});
		}

		
		if (saldo_kredit == '') {
			e.preventDefault();
			swal({
				type: 'error',
				title: 'Oops...',
				text: 'Saldo wajib di isi',
			});
		}

		if (namaAkun_kredit == '') {
			e.preventDefault();
			swal({
				type: 'error',
				title: 'Oops...',
				text: 'Nama Akun wajib di isi',
			});
		}
	}

	$('#button_jurnal').on('click', function (e) {
		validasiSaldo(e);
	});

	$('#button_akun').on('click', function (e) {
		let noReff = $('#no_reff').val();
		let nama = $('#nama').val();
		let keterangan = $('#keterangan').val();

		if (noReff == '') {
			e.preventDefault();
			swal({
				type: 'error',
				title: 'Oops...',
				text: 'No.Reff wajib di isi',
			});
		} else if (nama == '') {
			e.preventDefault();
			swal({
				type: 'error',
				title: 'Oops...',
				text: 'Nama Reff wajib di isi',
			});
		} else if (keterangan == '') {
			e.preventDefault();
			swal({
				type: 'error',
				title: 'Oops...',
				text: 'Keterangan wajib di isi',
			});
		}
	});

	$('.hapus').on('click', function (e) {
		e.preventDefault();
		let form = $(this).parent();
		console.log(form);
		swal({
			title: 'Apakah data akan di hapus',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus'
		}).then((result) => {
			if (result.value) {
				form.submit();
			} else {
				swal("Aman!", 'Data Tidak Di Hapus', "success");
			}
		})
	});

	$('.tab-nav').eq(0).addClass('active');
	$('.tab-pane').eq(0).addClass('show active');

	$('#no_reff').change(function () {
		let nilai = $(this).val();
		$('#reff').val(nilai);
	});

	$(window).on('load', function () {
		let nilai = $('#no_reff').val();
		$('#reff').val(nilai);
	});

	$('#no_reff_kredit').change(function () {
		let nilai = $(this).val();
		$('#reff_kredit').val(nilai);
	});

	$(window).on('load', function () {
		let nilai = $('#no_reff_kredit').val();
		$('#reff_kredit').val(nilai);
	});
});
