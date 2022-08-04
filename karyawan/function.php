<?php

  function dbConnect(){
    $db = new mysqli('localhost', 'root', '', 'db_karyawan');
    return $db;
  }

  function footer(){
    ?>
      <section>
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  <div class="copyright">
                      <p>Copyright © Kelompok 9 Basis Data. All rights reserved.</p>
                  </div>
              </div>
          </div>
      </div>
  </section>
    <?php
  }

?>