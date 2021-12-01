<div class="modal fade" id="hapus-produk-<?php echo $id_produk; ?>">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" style="font-size: 13pt; color: black;">Hapus Produk</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<b class="col-form-label">Apakah Anda yakin ingin menghapus produk ini?</b>
				<input type="hidden" name="id_foto" value="<?php echo $id_ft_p; ?>">
				<input type="hidden" name="id_produk" value="<?php echo $id_produk; ?>">
			</div>
			<div class="modal-footer justify-content-between">
				<a href="modal/phapus-produk.php?id=<?php echo $id_produk; ?>&idt=<?php echo $id_toko; ?>" class="btn btn-danger" name="btn-del-foto-prod">Hapus</a>
			</div>
		</div>
	</div>
</div>