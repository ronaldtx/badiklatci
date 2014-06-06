
      <div class="sidebar fixed" id="sidebar">
        <ul class="nav nav-list">
          <li>
            <a href="<?php echo base_url(); ?>">
              <i class="icon-dashboard"></i>
              <span class="menu-text">Home</span>
            </a>
          </li>
          
          <li>
            <a href="#" class="dropdown-toggle">
              <i class="icon-edit"></i>
              <span class="menu-text"> Surat Masuk </span>

              <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
              <li>
                <a href="<?php echo base_url(); ?>surat/suratmasuk/create">
                  <i class="icon-double-angle-right"></i>
                  Entry Surat Masuk
                </a>
              </li>

              <li>
                <a href="<?php echo base_url(); ?>surat/suratmasuk">
                  <i class="icon-double-angle-right"></i>
                  List Surat Masuk
                </a>
              </li>
            </ul>
          </li>
          
          <li>
            <a href="#" class="dropdown-toggle">
              <i class="icon-edit"></i>
              <span class="menu-text"> Konsep Surat Keluar </span>

              <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
              <li>
                <a href="<?php echo base_url(); ?>surat/konsep/create">
                  <i class="icon-double-angle-right"></i>
                  Entry Konsep
                </a>
              </li>

              <li>
                <a href="<?php echo base_url(); ?>surat/konsep">
                  <i class="icon-double-angle-right"></i>
                  List Konsep
                </a>
              </li>
            </ul>
          </li>

          <li>
            <a href="#" class="dropdown-toggle">
              <i class="icon-edit"></i>
              <span class="menu-text"> Surat Keluar </span>

              <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
              <li>
                <a href="<?php echo base_url(); ?>surat/skkonsep">
                  <i class="icon-double-angle-right"></i>
                  Entry dengan Konsep
                </a>
              </li>

              <li>
                <a href="<?php echo base_url(); ?>surat/suratkeluar/create">
                  <i class="icon-double-angle-right"></i>
                  Entry tanpa Konsep
                </a>
              </li>
              <li>
                <a href="<?php echo base_url(); ?>surat/suratkeluar">
                  <i class="icon-double-angle-right"></i>
                  List Surat Keluar
                </a>
              </li>
            </ul>
          </li>
          
          <li>
            <a href="#" class="dropdown-toggle">
              <i class="icon-edit"></i>
              <span class="menu-text"> User </span>

              <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
              <li>
                <a href="<?php echo base_url(); ?>user">
                  <i class="icon-double-angle-right"></i>
                  List User
                </a>
              </li>
              <li>
                <a href="<?php echo base_url(); ?>user/create">
                  <i class="icon-double-angle-right"></i>
                  Entry User
                </a>
              </li>

              <li>
                <a href="<?php echo base_url(); ?>user/chgpass">
                  <i class="icon-double-angle-right"></i>
                  Ubah Password
                </a>
              </li>
            </ul>
          </li>
          
        </ul><!--/.nav-list-->

        <div class="sidebar-collapse" id="sidebar-collapse">
          <i class="icon-double-angle-left"></i>
        </div>
      </div>
