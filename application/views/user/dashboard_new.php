  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="">Dashboard</a>
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            
          </div>
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="<?= base_url('assets/img/theme/team-4-800x800.jpg') ?>">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?= ucwords($this->session->userdata('username')) ?></span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <a href="<?= base_url('logout') ?>" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Header -->
   <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
						<a href="<?= base_url('data_akun') ?>">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Data Akun</h5>
                      <span class="h2 font-weight-bold mb-0"><?=  count($dataAkun)?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
											<i class="fas fa-list"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fas fa-list"></i> <?=  count($dataAkun)?> </span>
                    <span class="text-nowrap"> Total Data Akun</span>
                  </p>
                </div>
              </div>
						</a>
            </div>
            <div class="col-xl-3 col-lg-6">
						<a href="<?= base_url('jurnal_umum') ?>">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Jurnal Umum</h5>
                      <span class="h2 font-weight-bold mb-0"> <?= count($listJurnal) ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
											<i class="fas fa-journal-whills"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fas fa-journal-whills"></i> <?= count($listJurnal) ?></span>
                    <span class="text-nowrap">Total Jurnal Umum</span>
                  </p>
                </div>
              </div>
						</a>
            </div>
            <div class="col-xl-3 col-lg-6">
						<a href="<?= base_url('neraca_saldo') ?>">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Neraca Saldo</h5>
											<?php 
												$a=0;
												$debit = 0;
												$kredit = 0;
                        $totalDebit=0;
                        $totalKredit=0;
                        for($i=0;$i<$jumlah;$i++) :                          
                            $a++;
                            $s=0;
                            $deb = $saldo[$i];
                    
                            for($j=0;$j<count($data[$i]);$j++):
                                if($deb[$j]->jenis_saldo=="debit"){
                                    $debit = $debit + $deb[$j]->saldo;
                                }else{
                                    $kredit = $kredit + $deb[$j]->saldo;
                                }
                                $hasil = $debit-$kredit;
															endfor;

                            if($hasil>=0){ 
                                
                            $totalDebit += $hasil;
                        }else{
                                
                                $totalKredit += $hasil;
                        }
                        
                            $debit = 0;
                            $kredit = 0;
                        
                    		endfor 
											?>
                      <span class="h5 font-weight-bold mb-0 text-success"><?= 'Rp. '.number_format($totalDebit,0,',','.') ?> | </span>
											<span class="h5 font-weight-bold mb-0 text-primary"><?= 'Rp. '.number_format(abs($totalKredit),0,',','.') ?></span>
										</div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
											<i class="fas fa-book"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
										<?php 
											if($totalDebit != abs($totalKredit)){ ?>
                				<span class="bg-danger p-2 rounded text-white">Tidak Seimbang</span>
											<?php }else{ ?>
                    		<span class="bg-success p-2 rounded text-white">Seimbang</span>
										<?php } ?>
                  </p>
                </div>
              </div>
						</a>
            </div>
            <div class="col-xl-3 col-lg-6">
						<a href="<?= base_url('laba_rugi') ?>">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Laba Rugi</h5>
											<?php 
												$a=0;
												$debit = 0;
												$kredit = 0;
                        $totalDebit=0;
                        $totalKredit=0;
                        for($i=0;$i<$jumlah;$i++) :                          
                            $a++;
                            $s=0;
                            $deb = $saldo[$i];
                    
                            for($j=0;$j<count($data[$i]);$j++):
                                if($deb[$j]->jenis_saldo=="debit"){
                                    $debit = $debit + $deb[$j]->saldo;
                                }else{
                                    $kredit = $kredit + $deb[$j]->saldo;
                                }
                                $hasil = $debit-$kredit;
															endfor;

                            if($hasil>=0){ 
                                
                            $totalDebit += $hasil;
                        }else{
                                
                                $totalKredit += $hasil;
                        }
                        
                            $debit = 0;
                            $kredit = 0;
                        
                    		endfor 
											?>
                      <span class="h5 font-weight-bold mb-0 text-success"><?= 'Rp. '.number_format($totalDebit,0,',','.') ?> | </span>
											<span class="h5 font-weight-bold mb-0 text-primary"><?= 'Rp. '.number_format(abs($totalKredit),0,',','.') ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-percent"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0  text-sm">
										<?php 
												if($totalDebit != abs($totalKredit)){ ?>
													<span class="bg-light p-2 rounded text-black font-weight-bold"><?= 'Rp. ' . number_format(abs($totalKredit) - $totalDebit, 0, ',', '.') ?></span>
												<?php }else{ ?>
													<span class="bg-light p-2 rounded text-black font-weight-bold"><?= 'Rp. ' . number_format(abs($totalKredit) - $totalDebit, 0, ',', '.') ?></span>
											<?php } ?>
                  </p>
                </div>
              </div>
						</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7">
      <div class="row mb-4">
        <div class="col-xl-6 mb-5 mb-xl-0">
				<div class="card shadow">
						<div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Buku Besar</h3>
                </div>
              </div>
            </div>
						<div class="nav-wrapper mx-3">
                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                    <?php 
                      $i = 0;
                      foreach($dataAkunTransaksi as $row):
                      $i++;
                    ?>
                    <li class="nav-item mb-4">
                        <a class="nav-link mb-sm-3 mb-md-0 tab-nav" id="tabs-icons-text-<?=$i?>-tab" data-toggle="tab" href="#tabs-icons-text-<?=$i?>" role="tab" aria-controls="tabs-icons-text-<?=$i?>" aria-selected="true"><?= $row->nama_reff ?></a>
                    </li>
                    <?php endforeach ?>
                </ul>
            </div>
						<div class="card" style="border-top: 2px solid white">
						<div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <?php 
                          $a=0;
                          $debit = 0;
                          $kredit = 0;
                          
                          for($i=0;$i<$jumlah;$i++) :                          
                          $a++;
                          $s=0;
                          $deb = $saldo[$i];
                        ?>
                        <div class="tab-pane fade" id="tabs-icons-text-<?= $a ?>" role="tabpanel" aria-labelledby="tabs-icons-text-<?= $a ?>-tab">
                            <div class="row">
                              <div class="col">
                                <b><?= $data[$i][$s]->nama_reff ?></b>
                              </div>
                              <div class="col text-right">
                                <b>No. <?= $data[$i][$s]->no_reff ?></b>
                              </div>
                            </div>
                            <p class="description">
                              <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                  <tr>
                                    <th rowspan="2">Tanggal</th>
                                    <th rowspan="2">Keterangan </th>
                                    <th rowspan="2">Debit</th>
                                    <th rowspan="2">Kredit</th>
                                    <th colspan="2" class="text-center">Saldo</th>
                                  </tr>
                                  <tr>
                                    <th>Debit</th>
                                    <th>Kredit</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    for($j=0;$j<count($data[$i]);$j++):
                                      $timeStampt = strtotime($data[$i][$j]->tgl_transaksi);
                                      $bulan = date('m',$timeStampt);

                                      $tahun = date('Y',$timeStampt);
                                      $tgl = date('d',$timeStampt);
                                      $bulan = medium_bulan($bulan);
                                  ?>
                                  <tr>
                                      <td><?= $tgl.' '.$bulan.' '.$tahun ?></td>
                                      <td><?= $data[$i][$j]->nama_reff ?></td>
                                      <?php 
                                        if($data[$i][$j]->jenis_saldo=='debit'){
                                      ?>
                                        <td>
                                          <?= 'Rp. '.number_format($data[$i][$j]->saldo,0,',','.') ?>
                                        </td>
                                        <td>Rp. 0</td>
                                      <?php 
                                        }else{
                                      ?>
                                        <td>Rp. 0</td>
                                        <td>
                                          <?= 'Rp. '.number_format($data[$i][$j]->saldo,0,',','.') ?>
                                        </td>
                                      <?php } ?>
                                      <?php
                                        if($deb[$j]->jenis_saldo=="debit"){
                                          $debit = $debit + $deb[$j]->saldo;
                                        }else{
                                          $kredit = $kredit + $deb[$j]->saldo;
                                        }
  
                                        $hasil = $debit-$kredit;
                                      ?>
                                      <?php if($hasil>=0){ ?>
                                        <td><?= 'Rp. '.number_format($hasil,0,',','.') ?></td>
                                        <td> - </td>
                                      <?php }else{ ?>
                                        <td> - </td>
                                        <td><?= 'Rp. '.number_format(abs($hasil),0,',','.') ?></td>
                                      <?php } ?>
                                  </tr>
                                  <?php endfor ?>
                                  <?php
                                    $debit = 0;
                                    $kredit = 0;
                                  ?>
                                  <td class="text-center" colspan="4"><b>Total</b></td>
                                  <?php if($hasil>=0){ ?>
                                    <td class="text-success"><?= 'Rp. '.number_format($hasil,0,',','.') ?></td>
                                    <td> - </td>
                                  <?php }else{ ?>
                                    <td> - </td>
                                    <td class="text-danger"><?= 'Rp. '.number_format(abs($hasil),0,',','.') ?></td>
                                  <?php } ?>
                                </tbody>
                              </table>
                        </div>
                        <?php endfor ?>
                      </div>
                    </div>												
						</div>
				</div>
        </div>
        <div class="col-xl-6">
				<div class="card shadow">
					<div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Neraca Saldo</h3>
              </div>
            </div>
          </div>
					<div class="table-responsive">
            <?php 
                $a=0;
                $debit = 0;
                $kredit = 0;
            ?>
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No. Akun</th>
                    <th scope="col">Nama Akun</th>
                    <th scope="col">Debit</th>
                    <th scope="col">Kredit</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                        $totalDebit=0;
                        $totalKredit=0;
                        for($i=0;$i<$jumlah;$i++) :                          
                            $a++;
                            $s=0;
                            $deb = $saldo[$i];
                    ?>
                    <tr>
                        <td>
                            <?= $data[$i][$s]->no_reff ?>
                        </td>
                        <td>
                            <?= $data[$i][$s]->nama_reff ?>
                        </td>
                        <?php 
                            for($j=0;$j<count($data[$i]);$j++):
                                if($deb[$j]->jenis_saldo=="debit"){
                                    $debit = $debit + $deb[$j]->saldo;
                                }else{
                                    $kredit = $kredit + $deb[$j]->saldo;
                                }
                                $hasil = $debit-$kredit;
                            endfor 
                        ?>
                        <?php 
                            if($hasil>=0){ ?>
                                <td><?= 'Rp. '.number_format($hasil,0,',','.') ?></td>
                                <td> - </td>
                            <?php $totalDebit += $hasil; ?>
                        <?php }else{ ?>
                                <td> - </td>
                                <td><?= 'Rp. '.number_format(abs($hasil),0,',','.') ?></td>
                                <?php $totalKredit += $hasil; ?>
                        <?php } ?>
                        <?php
                            $debit = 0;
                            $kredit = 0;
                        ?>
                    </tr>
                    <?php endfor ?>
                    <?php if($totalDebit != abs($totalKredit)){ ?>
                    <tr>
                        <td class="text-center" colspan="2"><b>Total</b></td>
                        <td class="text-danger"><?= 'Rp. '.number_format($totalDebit,0,',','.') ?></td>
                        <td class="text-danger"><?= 'Rp. '.number_format(abs($totalKredit),0,',','.') ?></td>
                    </tr>
                    <tr class="bg-danger text-center">
                        <td colspan="6" class="text-white" style="font-weight:bolder;font-size:19px">TIDAK SEIMBANG</td>
                    </tr>
                    <?php }else{ ?>
                      <tr>
                        <td class="text-center" colspan="2"><b>Total</b></td>
                        <td class="text-success"><?= 'Rp. '.number_format($totalDebit,0,',','.') ?></td>
                        <td class="text-success"><?= 'Rp. '.number_format(abs($totalKredit),0,',','.') ?></td>
                    </tr>
                    <tr class="bg-success text-center">
                        <td colspan="6" class="text-white" style="font-weight:bolder;font-size:19px">SEIMBANG</td>
                    </tr>
                    <?php } ?>  
                </tbody>
              </table>
            </div>
				</div>
        </div>
      </div>
			<div class="row">
        <div class="col-xl-12 mb-5 mb-xl-0">
					<div class="card shadow">
          	<div class="card-header border-0">
              <div class="row align-items-center">
                  <div class="col">
										<h3 class="mb-0">Laba Rugi</h3>
                  </div>
              </div>
            </div>
						<div class="table-responsive">
					<?php 
													$a=0;
													$debit = 0;
													$kredit = 0;
											?>
											<table class="table align-items-center table-flush">
												<thead class="">
													<td class="" colspan="4"><b>Pendapatan</b></td>
												</thead>
												<thead class="thead-light">
													<tr>
														<th scope="col">No. Akun</th>
														<th scope="col">Nama Akun</th>
														<th scope="col">Debit</th>
														<th scope="col">Kredit</th>
													</tr>
												</thead>
												<tbody>
														<?php
																$totalKredit=0;
																for($i=0;$i<$jumlah;$i++) :                          
																		$a++;
																		$s=0;
																		$deb = $saldo[$i];
																		
																		for($j=0;$j<count($data[$i]);$j++):
																				if($deb[$j]->jenis_saldo=="debit"){
																						$debit = $debit + $deb[$j]->saldo;
																				}else{
																						$kredit = $kredit + $deb[$j]->saldo;
																				}
																				$hasil = $debit-$kredit;
																			endfor;

																		if($hasil>=0){ 

																		}else{ ?>
																			<tr>
																				<td>
																						<?= $data[$i][$s]->no_reff ?>
																				</td>
																				<td>
																						<?= $data[$i][$s]->nama_reff ?>
																				</td>
																				<td> - </td>
																				<td><?= 'Rp. '.number_format(abs($hasil),0,',','.') ?></td>
																			</tr>
																				<?php $totalKredit += $hasil; ?>
														<?php 
																		} 
																		$debit = 0;
																		$kredit = 0;
																endfor;
															?>
														<tr class="bg-light">
															<td class="" colspan="3"><b>Total Pendapatan</b></td>
															<td class=""><b><?= 'Rp. ' . number_format(abs($totalKredit), 0, ',', '.') ?></b></td>
														</tr>
												</tbody>
											</table>
											<table class="table align-items-center table-flush">
												<thead class="">
													<td class="" colspan="4"><b>Biaya</b></td>
												</thead>
												<thead class="thead-light">
													<tr>
														<th scope="col">No. Akun</th>
														<th scope="col">Nama Akun</th>
														<th scope="col">Debit</th>
														<th scope="col">Kredit</th>
													</tr>
												</thead>
												<tbody>
														<?php
																$totalDebit=0;
																for($i=0;$i<$jumlah;$i++) :                          
																		$a++;
																		$s=0;
																		$deb = $saldo[$i];
																		
																		for($j=0;$j<count($data[$i]);$j++):
																				if($deb[$j]->jenis_saldo=="debit"){
																						$debit = $debit + $deb[$j]->saldo;
																				}else{
																						$kredit = $kredit + $deb[$j]->saldo;
																				}
																				$hasil = $debit-$kredit;
																		endfor;

																		if($hasil>=0){ ?>
																			<tr>
																				<td>
																						<?= $data[$i][$s]->no_reff ?>
																				</td>
																				<td>
																						<?= $data[$i][$s]->nama_reff ?>
																				</td>
																				<td><?= 'Rp. '.number_format($hasil,0,',','.') ?></td>
																				<td> - </td>
																			</tr>
																		<?php $totalDebit += $hasil; ?>
																		<?php 
																		} 
																		$debit = 0;
																		$kredit = 0;
																endfor;
															?>
														<tr class="bg-light">
															<td class="" colspan="3"><b>Total Biaya</b></td>
															<td class=""><b><?= 'Rp. ' . number_format(abs($totalDebit), 0, ',', '.') ?></b></td>
														</tr>
														<?php 
                            if($totalDebit != abs($totalKredit)){ ?>
                            <tr class="bg-light">
																<td colspan="2" class="text-black" style="font-weight:bolder;font-size:19px">Laba/Rugi</td>
																<td></td>
																<td class="text-black" style="font-weight:bolder;font-size:19px"><?= 'Rp. ' . number_format(abs($totalKredit) - $totalDebit, 0, ',', '.') ?></td>
														</tr>
                            <?php }else {?>
														<tr class="bg-light">
																<td colspan="2" class="text-black" style="font-weight:bolder;font-size:19px">Laba/Rugi</td>
																<td></td>
																<td class="text-black" style="font-weight:bolder;font-size:19px"><?= 'Rp. ' . number_format(abs($totalKredit) - $totalDebit, 0, ',', '.') ?></td>
														</tr>
                            <?php } ?>
												</tbody>
											</table>
										</div>
					</div>
        </div>
      </div>

