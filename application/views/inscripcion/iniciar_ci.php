<?= form_open('', array('id' => 'form_buscar_ci', 'enctype' => 'multipart/form-data')); ?>
<div class="card">
    <img class="card-img-top" src="<?= base_url('assets/images/background/profile-bg.jpg'); ?>" alt="Card image cap">
    <div class="card-body little-profile text-center">
        <div class="pro-img">
            <img src="<?= base_url('assets/images/personas/persona.jpg'); ?>" alt="user">
        </div>
        <h3 class="m-b-0 text-bold">Escriba su CI, DNI o PASAPORTE</h3>
        <input id="ci" type="text" class="form-control" required autocomplete="on" />
        <button id="ci_btn" class="m-t-10 waves-effect waves-dark btn btn-info btn-md btn-rounded">Buscar</button>
    </div>
</div>
</form>