<div class="row">
    <div class="col-md-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Arahkan Kode QR Ke Kamera!</h3>
            </div>
        </div>
        <div class="card-body">
            <div class="text-center">
                <div id="reader" width="900px"></div>
            </div>
        </div>

        <div class="panel-footer">
            <center><a class="btn btn-danger" href="<?= site_url('dashboard') ?>">Kembali</a></center>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
function onScanSuccess(decodedText, decodedResult) {
    // handle the scanned code as you like, for example:
    console.log(`Code matched = ${decodedText}`, decodedResult);
    window.location.href = `<?= site_url('dashboard/add_absen_berangkat/') ?>${decodedText}`;
}

function onScanFailure(error) {
    // handle scan failure, usually better to ignore and keep scanning.
    // for example:
    console.warn(`Code scan error = ${error}`);
}

let html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", {
        fps: 10,
        qrbox: 250
    }, /* verbose= */ false);
html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>