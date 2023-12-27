<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Selamat Datang <?= $this->session->name ?></h5>
                <br>
                Log Debug :<br>
                <p class="card-text"><?= print_r($this->session->userdata) ?></p>
            </div>
        </div>
    </div>

</div>