<?php 
$page = "Kullanıcı Listesi";
$pageid = "2";
include './include/header.php';
include './include/sidebar.php';

?>
 
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title"> Tüm Veriler</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                      <tr>
                        <th>
                          isim soyisim
                        </th>
                        <th>
                          bakiye
                        </th>
                        <th>
                          borsa(lar)
                        </th>
                        <th>
                          telefon
                        </th>
                        <th>
                          operator
                        </th>
                        <th>
                          gonderildi mi
                        </th>
                        <th>
                          not
                        </th>
                        <th class="text-center">
                          düzenle
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      
                      $query = $db->query("SELECT * FROM veriler", PDO::FETCH_ASSOC);
                      if ( $query->rowCount() ){
                        foreach( $query as $row ){
                          echo "<tr>";
                          echo "<td>";
                          print $row['isim']." ".$row['soyisim'];
                          echo "</td>";
                          echo "<td>";
                          print $row['bakiye'];
                          echo "</td>";
                          echo "<td>";
                          $borsa = json_decode($row['borsa']);
                         if(count($borsa) > 0){
                          foreach ($borsa as $val) {
                            echo $val;
                            if (next($borsa)) {
                                echo ', '; // Add comma for all elements instead of last
                            }
                        }
                         }
                          echo "</td>";
                          echo "<td>";
                          print $row['telefon'];
                          echo "</td>";
                          echo "<td>";
                          print $row['operator'];
                          echo "</td>";
                          echo "<td>";
                          print $row['gonderi'];
                          echo "</td>";
                          echo "<td>";
                          print $row['aciklama'];
                          echo "</td>";
                          echo '<td class="text-center">';
                          print '<a href="./user.php?userid='.$row['id'].'"><button type="submit" class="btn btn-fill btn-warning">Düzenle</button></a>';
                          echo "</td>";
                          echo "</tr>";
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
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