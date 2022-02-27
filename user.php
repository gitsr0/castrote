<?php 
$page = "Kullanıcı ayarları";
$pageid = "1";
include './include/header.php';
if(isset($_POST) && !empty($_POST)){
  if($_POST['id'] !== ""){
    if((empty($_POST['telefonno']) || $_POST['telefonno'] == "") || empty($_POST['operator'])){
      $_POST['telefonno'] = "<p style='text-decoration: underline'>Bilinmiyo</p>";
      $_POST['operator'] = "<p style='text-decoration: underline'>Bilinmiyo</p>";
    }
    $query = $db->prepare("DELETE FROM veriler WHERE id = :id");
    $delete = $query->execute(array(
      'id' => $_GET['userid']
    ));
    $query = $db->prepare("INSERT INTO veriler SET
    id = ?,
    isim = ?,
    soyisim = ?,
    bakiye = ?,
    borsa = ?,
    telefon = ?,
    operator = ?,
    gonderi = ?,
    aciklama = ?"
    );
    $insert = $query->execute(array(
      $_GET['userid'], $_POST['isim'], $_POST['soyisim'], $_POST['bakiye'],json_encode($_POST['borsa']),$_POST['telefonno'],$_POST['operator'],$_POST['gonderi'],$_POST['not']
    ));
    if ( $insert ){
      $last_id = $db->lastInsertId();
      echo $swal = "<script>Swal.fire({
        title: 'Başarılı!',
        text: 'Girdiğiniz bilgiler başarıyla düzenlendi.',
        icon: 'success',
        confirmButtonText: 'Tamam'
      })</script>";
      header("Refresh:2; url=user.php");
    }
  }else{
    if((empty($_POST['telefonno']) || $_POST['telefonno'] == "") || empty($_POST['operator'])){
      $_POST['telefonno'] = "<p style='text-decoration: underline'>Bilinmiyo</p>";
      $_POST['operator'] = "<p style='text-decoration: underline'>Bilinmiyo</p>";
    }
    $query = $db->prepare("INSERT INTO veriler SET
    isim = ?,
    soyisim = ?,
    bakiye = ?,
    borsa = ?,
    telefon = ?,
    operator = ?,
    gonderi = ?,
    aciklama = ?"
    );
    $insert = $query->execute(array(
      $_POST['isim'], $_POST['soyisim'], $_POST['bakiye'],json_encode($_POST['borsa']),$_POST['telefonno'],$_POST['operator'],$_POST['gonderi'],$_POST['not']
    ));
    if ( $insert ){
      $last_id = $db->lastInsertId();
      echo $swal = "<script>Swal.fire({
        title: 'Başarılı!',
        text: 'Girdiğiniz bilgiler kayıt edildi.',
        icon: 'success',
        confirmButtonText: 'Tamam'
      })</script>";
      header("Refresh:2; url=user.php");
    }
  }
}
include './include/sidebar.php';
$formtitle = "Kullanıcı ekle";
$isim="";
$soyisim="";
$bakiye="";
$borsa=array(); 
$tel="";
$operator="";
$gonderi="";
$aciklama="";

if(isset($_GET['userid'])){
  $guserid = $_GET['userid'];
  $formtitle = "Kullanıcı düzenle";
  $sorgu = $db->query("SELECT isim,soyisim,bakiye,borsa,telefon,operator,gonderi,aciklama FROM veriler WHERE id = ".$guserid);
  $cikti = $sorgu->fetch(PDO::FETCH_ASSOC);
  if(empty($cikti)){
    header('Location: ./userlist.php');
  }

  $isim = $cikti['isim'];
  $soyisim= $cikti['soyisim'];
  $bakiye = $cikti['bakiye'];
  $borsa = json_decode($cikti['borsa']);
  $tel= $cikti['telefon'];
  $operator= $cikti['operator'];
  $gonderi= $cikti['gonderi'];
  $aciklama = $cikti['aciklama']; 
}
?>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title"><?=$formtitle;?></h5>
              </div>
              <div class="card-body">
                <form action="" method="post">
                  <div class="row">
                    <div class="col-md-5 pr-md-1">
                      <div class="form-group">
                        <input type="hidden" name="id" value="<?=isset($_GET['userid']);?>">
                        <label>İsim</label>
                        <input type="text" name="isim" value="<?=$isim;?>" class="form-control" placeholder="isim">
                      </div>
                    </div>
                    <div class="col-md-5 pl-md-5">
                      <div class="form-group">
                        <label>Soyisim</label>
                        <input type="text" name="soyisim" value="<?=$soyisim;?>" class="form-control" placeholder="soyisim">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-5 pr-md-1">
                      <div class="form-group">
                        <label>Bakiye</label>
                        <input type="number" name="bakiye" value="<?=$bakiye;?>" class="form-control" placeholder="Bakiye">
                      </div>
                    </div>
                    <div class="col-md-5 pl-md-5">
                      <div class="form-group">
                        <label>Borsalar</label><br>
                        <input type="checkbox" id="binance" name="borsa[]" <?= (in_array("binance",$borsa)) ? "checked" : ""; ?> value="binance">
                        <label for="binance">Binance</label>
                        <input type="checkbox" class="ml-2" id="gateio" <?= (in_array("gateio",$borsa)) ? "checked" : ""; ?> name="borsa[]" value="gateio">
                        <label for="gateio">Gate.io</label>
                        <input type="checkbox" class="ml-2" id="btcturk" <?= (in_array("btcturk",$borsa)) ? "checked" : ""; ?> name="borsa[]" value="btcturk">
                        <label for="btcturk">BtcTurk</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-1 pr-md-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Ülke kodu</label>
                        <input type="tel" class="form-control" name="ulkekodu" placeholder="ülke kodu" value="+90" disabled>
                      </div>
                    </div>
                    <div class="col-md-4 pl-md-1 pr-md-1">
                      <div class="form-group">
                        <label>Telefon Numarası</label>
                        <input type="tel" class="form-control" name="telefonno" value="<?php if(@$tel[0] == "<"){echo "";}else{echo $tel;} ?>"  placeholder="545 XXX XX XX">
                      </div>
                    </div>
                    <div class="col-md-3 pl-md-5 pr-1">
                      <div class="form-group">
                        <label>Operatör</label><br>
                        <input type="radio" id="turkcell" name="operator" <?= ($operator == "turkcell") ? "checked" : "" ?>  value="turkcell">
                        <label for="turkcell">Turkcell</label>
                        <input type="radio" id="vodafone" name="operator" <?= ($operator == "vodafone") ? "checked" : "" ?> class="ml-2" value="vodafone">
                        <label for="vodafone">Vodafone</label>
                        <input type="radio" id="turktelekom" class="ml-2" <?= ($operator == "turktelekom") ? "checked" : "" ?> name="operator" value="turktelekom">
                        <label for="turktelekom">Türk Telekom</label>
                      </div>
                    </div>
                    <div class="col-md-2  ">
                      <div class="form-group">
                        <label>Gönderildi mi?</label><br>
                        <input type="radio" id="Evet" name="gonderi" <?= ($gonderi == "Evet") ? "checked" : "" ?> value="Evet">
                        <label for="Evet">Evet</label>
                        <input type="radio" id="gonderildi" class="ml-2" name="gonderi" <?= ($gonderi == "Hayir") ? "checked" : "" ?> value="Hayir">
                        <label for="Hayır">Hayır</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Not</label>
                        <textarea rows="4" cols="80" name="not" class="form-control" placeholder="Not bırakabilirsin buraya"><?=$aciklama?></textarea>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-fill btn-primary">Kaydet</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php  include './include/footer.php'; ?>
    </div>
  </div>
  <script src="./assets/js/core/jquery.min.js"></script>
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="./assets/js/plugins/chartjs.min.js"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/black-dashboard.min.js?v=1.0.0"></script><!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="./assets/demo/demo.js"></script>
</body>

</html>