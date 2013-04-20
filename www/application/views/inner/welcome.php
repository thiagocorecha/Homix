<div id="header">
    <p class="salutare">Hi, <strong><?php echo $username; ?></strong>!</p>
    <p class="logout"><?php echo anchor('/auth/logout/', 'Logout'); ?></p>
</div>
<div class="clear"></div>




<input type="checkbox" id="bec3" onClick="schimbabec(3,255)" /><label for="bec3">Bec1</label>
<input type="checkbox" id="bec5"  onClick="schimbabec(5,255)" /><label for="bec5">Bec5</label>
<input type="checkbox" id="bec6"  onClick="schimbabec(6,255)" /><label for="bec6">Bec6</label>
<br />
<p>
<input type="text" id="valintensitatebec3" style="width:300px;border: 0; color: #f6931f; font-weight: bold; cursor:pointer; background:#fff !important;" disabled="disabled" />
</p>
<div id="intensitatebec3"></div>
<br clear="all">

<p>
<input type="text" id="valintensitatebec5" style="width:300px;border: 0; color: #f6931f; font-weight: bold; cursor:pointer; background:#fff !important;" disabled="disabled" />
</p>
<div id="intensitatebec5"></div>
<br clear="all">


<p>
<input type="text" id="valintensitatebec6" style="width:300px;border: 0; color: #f6931f; font-weight: bold; cursor:pointer; background:#fff !important;" disabled="disabled" />
</p>
<div id="intensitatebec6"></div>
<br clear="all">

<a class="webcam" href="<?= site_url('homix/webcam'); ?>">Vezi web</a> sau <a href="<?= site_url('homix/webcamail'); ?>">Trimite streaming pe mail</a>
<br />


<a href="<?= site_url('homix/3/100') ?>">Aprinde bec3</a> | <a href="<?= site_url('homix/5/100') ?>">Aprinde bec5</a> | <a href="<?= site_url('homix/6/100') ?>">Aprinde bec6</a>

<br /><br />
<a href="<?= site_url('homix/3/0') ?>">Stinge bec3</a> | <a href="<?= site_url('homix/5/0') ?>">Stinge bec5</a> | <a href="<?= site_url('homix/6/0') ?>">Stinge bec6</a>