
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/Customers">CRM</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php
          if(isset($_SESSION['role'])) {
            if($_SESSION['role'] == "admin") {
            echo "<a class='nav-link' href='/PanelAdmin/ManageUser'>
            Quản lý nhân viên
            </a>";

             echo "<a class='nav-link' href='/Networks'>
            Nhà mạng
            </a>";
            }
            else {
            //   echo "<a class='nav-link' href='/Customers/Import'>
            // Insert Data
            // </a>";
            }
          }
        ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo 'Chào, '.$_SESSION['username']; ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="ChangePassword">Đổi mật khẩu</a></li>
            <li><a class="dropdown-item" href="Logout">Đăng xuất</a></li>
          </ul>
        </li>
        <?php
          if(!isset($_SESSION['username'])) {
            echo '<li class="nav-item">
            <a class="nav-link" href="/Login">Đăng nhập</a>
          </li>';
          }
          else {
            if($_SESSION['username'] != "") {
            //   echo "<li class='nav-item'>
            // <a class='nav-link' href='!#'>Welcome, $_SESSION[username]</a>
            // </li>";
            // echo "<li class='nav-item'>
            // <a class='nav-link' href='Logout'>Đăng xuất</a>
            // </li>";
            }
            else {
              echo '<li class="nav-item">
            <a class="nav-link" href="/Login">Đăng nhập</a>
          </li>';
            }
          }
        ?>
      </ul>
      <?php
        // if(isset($_SESSION['role'])) {
        //   if($_SESSION['role'] == "admin") {
        //   echo "<a class='navbar-text' href='/PanelAdmin'>
        //   ADMIN PANEL
        //   </a>";
        //   }
        //   else if($_SESSION['role'] == "nhanvien") {
        //     echo "<a class='navbar-text' href='/StaffData'>
        //     STAFF DATA
        //     </a>";
        //     }
        // }
      ?>
      
    </div>
  </div>
</nav>