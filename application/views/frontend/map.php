<div class="m-4">
    <div class="card">
        <div class="card-body">
            <div class="p-2"><b>Nama Tim:</b> <?php echo htmlspecialchars($_SESSION['user']['name']); ?> (<a class="text-danger" onclick="return confirm('Apakah anda yakin?')" href="<?php echo site_url('frontend/logout'); ?>">Logout</a>)</div>
        </div>
    </div>
</div>
<div class="m-4">
    <div style="position: relative; overflow: auto;">
        <img src="<?php echo base_url('public/tour/img/BGR.jpg'); ?>" style="width: 100%">
        <?php foreach ($places as $place):  ?>
            <div class="d-none d-md-block" style="position: absolute; left: <?php echo $place['center_x']; ?>%; top: <?php echo $place['center_y']; ?>%; transform: translate(-50%, -50%)">
                <button class="btn btn-primary placebtn" data-place="<?php echo md5($place['place_id']); ?>">KEMUDI <?php echo $place['place_id']; ?></button>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="m-4 d-block d-md-none">
    <ul class="list-group">
        <?php foreach ($places as $place):  ?>
            <li class="list-group-item">
                <a href="#!" class="placebtn" data-place="<?php echo md5($place['place_id']); ?>">KEMUDI <?php echo $place['place_id']; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<div class="modal fade" id="startup">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Background</h5>
            </div>
            <div class="modal-body">
                <p>
                    Setelah P!NGWIN berjuang melawan musuh untuk mendapatkan kapalnya, akhirnya
                    P!NGWIN pun langsung bergegas mengarungi lautan untuk mengumpulkan semua harta karun.
                    Dalam lautan yang abstrak ini, lokasi harta karun digambarkan oleh sebuah roda
                    kemudi ajaib. Jika P!NGWIN berhasil menemukan cara memutar roda kemudi ajaib,
                    kapal P!NGWIN akan langsung otomatis tertuju ke lokasi harta karun tersebut.
                    Bisakah P!NGWIN mendapatkan semua harta karun yang ada di lautan yang luas ini?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Mulai Petualangan!</button>
            </div>
        </div>
    </div>
</div>
<?php foreach ($places as $place): ?>
    <div class="modal fade" id="place-<?php echo md5($place['place_id']); ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">1.. 2.. 3.. GO!!!</h5>
                </div>
                <div class="modal-body">
                    <p>Setelah turun dari kapal dan menelusuri jejak, P!NGWIN akhirnya menemukan harta karun berupa <b><?php echo htmlspecialchars($place['title']); ?></b></p>
                    <p class="place-description"><?php echo htmlspecialchars($place['description']); ?></p>
                </div>
                <div class="modal-footer">
                    <?php if (!empty($place['location'])): ?>
                        <a class="btn btn-success" href="<?php echo $place['location']; ?>" target="_blank">Ambil Harta Karun!</a>
                    <?php endif; ?>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali ke Kapal</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<script>
$(document).ready(function() {
    var startupModal = new bootstrap.Modal(document.getElementById('startup'));
    startupModal.show();

    $('.place-description').html(function(index, description) {
        return marked(description);
    });

    $('.placebtn').on('click', function(e) {
        var placeModal = new bootstrap.Modal(document.getElementById('place-' + $(e.target).data('place')));
        placeModal.show();
    });
});
</script>
