<section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Nguyen Khieu</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Sản phẩm</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('sanpham.index') }}"><i class="fa fa-circle-o"></i> Danh sách sản phẩm</a></li>
          </ul>
        </li>

          <li class="treeview">
              <a href="#">
                  <i class="fa fa-files-o"></i>
                  <span>Loại sản phẩm</span>
                  <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="{{ route('loaisanpham.index') }}"><i class="fa fa-circle-o"></i> Danh sách loại sản phẩm</a></li>
              </ul>
          </li>

      </ul>
    </section>
