<?php include 'landing/layout.php';

?>

<div class="container py-4">
  <h4 class="mb-3">Proses Perhitungan Metode EDAS</h4>

  <div class="accordion" id="perhitunganAccordion">

    <!-- Accordion Item 1 -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
         <button class="accordion-button" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Tahap 1: AV, PDA, dan NDA
         </button>
         </h2>
         <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#perhitunganAccordion">
         <div class="accordion-body">
            <!-- Card AV -->
            <div class="card mb-3 shadow">
               <div class="card-header bg-primary text-white">Rata-Rata Kriteria (AV)</div>
               <div class="card-body">
               <table class="table table-bordered table-striped text-center">
                     <thead class="table-light">
                        <tr>
                           <th>No</th>
                           <th>Nama Kriteria</th>
                           <th>Jenis</th>
                           <th>Rata-Rata (AV)</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        $no = 1;
                        $queryAv = mysqli_query($conn, "SELECT * FROM av_kriteria");
                        while ($row = mysqli_fetch_assoc($queryAv)) :
                        ?>
                           <tr>
                           <td><?= $no++; ?></td>
                           <td><?= $row['nama_kriteria']; ?></td>
                           <td><?= ucfirst($row['jenis']); ?></td>
                           <td><?= number_format($row['rata_rata'], 3); ?></td>
                           </tr>
                        <?php endwhile; ?>
                     </tbody>
                  </table>
               </div>
            </div>

            <!-- Card PDA -->
            <div class="card mb-3 shadow">
               <div class="card-header bg-info text-white">PDA</div>
               <div class="card-body">
               <!-- Tabel PDA -->
                  <table class="table table-bordered table-striped">
                     <thead class="table-light">
                        <tr>
                           <th>Alternatif</th>
                           <?php foreach ($kriteriaList as $k): ?>
                           <th><?= $k['nama_kriteria']; ?></th>
                           <?php endforeach; ?>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($alternatifList as $a): ?>
                           <tr>
                           <td><?= $a['nama_alternatif']; ?></td>
                           <?php foreach ($kriteriaList as $k): ?>
                              <?php
                                 $idAlt = $a['id_alternatif'];
                                 $idKrit = $k['id_kriteria'];
                                 $queryNilai = mysqli_query($conn, "SELECT * FROM view_pda_nda WHERE id_alternatif = $idAlt AND id_kriteria = $idKrit");
                                 $data = mysqli_fetch_assoc($queryNilai);
                                 $nilai = $data ? number_format($data['pda'], 3) : '-';
                              ?>
                              <td><?= $nilai; ?></td>
                           <?php endforeach; ?>
                           </tr>
                        <?php endforeach; ?>
                     </tbody>
                  </table>

               </div>
            </div>

            <!-- Card NDA -->
            <div class="card mb-3 shadow">
               <div class="card-header bg-warning text-dark">NDA</div>
               <div class="card-body">
                  <!-- Tabel NDA -->
                  <table class="table table-bordered table-striped">
                     <thead class="table-light">
                        <tr>
                           <th>Alternatif</th>
                           <?php foreach ($kriteriaList as $k): ?>
                           <th><?= $k['nama_kriteria']; ?></th>
                           <?php endforeach; ?>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($alternatifList as $a): ?>
                           <tr>
                           <td><?= $a['nama_alternatif']; ?></td>
                           <?php foreach ($kriteriaList as $k): ?>
                              <?php
                                 $idAlt = $a['id_alternatif'];
                                 $idKrit = $k['id_kriteria'];
                                 $queryNilai = mysqli_query($conn, "SELECT * FROM view_pda_nda WHERE id_alternatif = $idAlt AND id_kriteria = $idKrit");
                                 $data = mysqli_fetch_assoc($queryNilai);
                                 $nilai = $data ? number_format($data['nda'], 3) : '-';
                              ?>
                              <td><?= $nilai; ?></td>
                           <?php endforeach; ?>
                           </tr>
                        <?php endforeach; ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
    </div>

    <!-- Accordion Item 2 -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Tahap 2: SP dan SN
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#perhitunganAccordion">
        <div class="accordion-body">
          <!-- Card SP -->
          <div class="card mb-3 shadow">
            <div class="card-header bg-success text-white">SP dan SN</div>
            <div class="card-body">
              <!-- Tabel SP -->
               <table class="table table-bordered table-striped">
                  <thead class="table-light">
                     <tr>
                        <th>Alternatif</th>
                        <th>Total SP</th>
                        <th>Total SN</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $query = mysqli_query($conn, "SELECT * FROM view_total_sp_sn");
                     while ($row = mysqli_fetch_assoc($query)) :
                     ?>
                        <tr>
                        <td><?= $row['nama_alternatif']; ?></td>
                        <td><?= number_format($row['total_sp'], 3); ?></td>
                        <td><?= number_format($row['total_sn'], 3); ?></td>
                        </tr>
                     <?php endwhile; ?>
                  </tbody>
               </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Accordion Item 3 -->
    <div class="accordion-item">...</div>

    <!-- Accordion Item 4 -->
    <div class="accordion-item">...</div>

  </div> <!-- ✅ Tutup untuk accordion -->
</div> <!-- ✅ Tutup untuk container -->

<?php include 'footer.php'; ?>