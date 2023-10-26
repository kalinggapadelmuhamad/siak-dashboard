  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">Laba Rugi</a>
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
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-8 mb-5 mb-xl-0">
        </div>
      </div>
      <div class="row mt-5">
        <div class="col mb-5 mb-xl-0">
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
                            <tr class="bg-danger">
																<td colspan="2" class="text-white" style="font-weight:bolder;font-size:19px">Laba/Rugi</td>
																<td></td>
																<td class="text-white" style="font-weight:bolder;font-size:19px"><?= 'Rp. ' . number_format(abs($totalKredit) - $totalDebit, 0, ',', '.') ?></td>
														</tr>
                            <?php }else {?>
														<tr class="bg-success">
																<td colspan="2" class="text-white" style="font-weight:bolder;font-size:19px">Laba/Rugi</td>
																<td></td>
																<td class="text-white" style="font-weight:bolder;font-size:19px"><?= 'Rp. ' . number_format(abs($totalKredit) - $totalDebit, 0, ',', '.') ?></td>
														</tr>
                            <?php } ?>
												</tbody>
											</table>
          </div>
        </div>
      </div>
