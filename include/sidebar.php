<div class="sidebar" style="background: linear-gradient(0deg,#000000,rgb(193 122 186 / 19%));">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="javascript:void(0)" class="simple-text logo-mini">
            CT
          </a>
          <a href="javascript:void(0)" class="simple-text logo-normal">
            Castrote
          </a>
        </div>
        <ul class="nav">
          <li class="<?=($pageid == "0") ? "active" : ""?>">
            <a href="./">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Anasayfa</p>
            </a>
          </li>
          <li class="<?=($pageid == "1") ? "active" : ""?>">
            <a href="./user.php">
              <i class="tim-icons icon-single-02"></i>
              <p>Kullanıcı ekle</p>
            </a>
          </li>
          <li class="<?=($pageid == "2") ? "active" : ""?>">
            <a href="./userlist.php">
              <i class="tim-icons icon-puzzle-10"></i>
              <p>Kullanıcı listesi</p>
            </a>
          </li>
          <li style="bottom: 10%;position: absolute;" class="<?=($pageid == "3") ? "active" : ""?>">
            <a href="./updates.php">
              <i class="tim-icons icon-alert-circle-exc"></i>
              <p>Güncelleme Notları</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:void(0)"><?=$page?></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
            <li class="dropdown nav-item">
                <a href="javascript:void(0)" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false">
                  <div class="notification d-none d-lg-block d-xl-block"></div>
                  <i class="tim-icons icon-sound-wave"></i>
                  <p class="d-lg-none">
                    Bildirimler
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
                  <li class="nav-link"><a href="#" class="nav-item dropdown-item">27.02.2022 GÜNCELLEME NOTLARI</a></li>
                  <li class="nav-link"><a href="updates.php" target="_blank" class="nav-item dropdown-item"><i class="tim-icons icon-alert-circle-exc"></i> Güncelleme Notları sayfasına göz atın.</a></li>
                </ul>
              </li>
              <li class="search-bar input-group"></li>                
            </ul>
          </div>
        </div>
      </nav>
      <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
      </div>