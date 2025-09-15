<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
   <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
      <i class="fe fe-x"><span class="sr-only"></span></i>
   </a>
   <nav class="vertnav navbar navbar-light">
      <!-- nav bar -->
      <div class="w-100 mb-4 d-flex">
         <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="javascript:void(0)">
            <img src="{{asset('companylogo/logomain.png')}}" alt="" width="100%" >
         </a>
      </div>
      <ul class="navbar-nav flex-fill w-100 mb-2">
         <li class="nav-item ">
            <a href="{{ route('admin.dashboard') }}" aria-expanded="true" class="nav-link">
            <i class="fe fe-home fe-16"></i>
            <span class="ml-3 item-text">Dashboard</span>
            </a>
         </li>
      </ul>
      <p class="text-muted nav-heading mt-4 mb-1">
         <span>Product</span>
      </p>
      <ul class="navbar-nav flex-fill w-100 mb-2">
         <li class="nav-item ">
            <a href="{{ route('admin.product.add') }}" aria-expanded="true" class="nav-link">
            <i class="fe fe-plus-circle fe-16"></i>
            <span class="ml-3 item-text">Add</span>
            </a>
            <a href="{{ route('admin.product.master.report') }}" aria-expanded="true" class="nav-link">
            <i class="fe fe-plus-circle fe-16"></i>
            <span class="ml-3 item-text">Master Report</span>
            </a>
            <a href="{{ route('admin.product.categroy.form') }}" aria-expanded="true" class="nav-link">
            <i class="fe fe-plus-circle fe-16"></i>
            <span class="ml-3 item-text">Category</span>
            </a>
            <a href="{{ route('admin.product.categroy.report') }}" aria-expanded="true" class="nav-link">
            <i class="fe fe-plus-circle fe-16"></i>
            <span class="ml-3 item-text">Category Report</span>
            </a>
         </li>
      </ul>
      <p class="text-muted nav-heading mt-4 mb-1">
         <span>Stock</span>
      </p>
      <ul class="navbar-nav flex-fill w-100 mb-2">
         <li class="nav-item ">
            <a href="{{ route('admin.stock.report') }}" aria-expanded="true" class="nav-link">
            <i class="fe fe-plus-circle fe-16"></i>
            <span class="ml-3 item-text">Stock Report</span>
            </a>            
         </li>
      </ul>
      <p class="text-muted nav-heading mt-4 mb-1">
         <span>Orders</span>
      </p>
      <ul class="navbar-nav flex-fill w-100 mb-2">
         <li class="nav-item ">
            <a href="{{ route('admin.orders.report', '1') }}" aria-expanded="true" class="nav-link">
            <i class="fe fe-plus-circle fe-16"></i>
            <span class="ml-3 item-text">Pending Orders Report</span>
            </a>            
         </li>
         <li class="nav-item ">
            <a href="{{ route('admin.orders.report', '4') }}" aria-expanded="true" class="nav-link">
            <i class="fe fe-plus-circle fe-16"></i>
            <span class="ml-3 item-text">Dispatch Orders Report</span>
            </a>            
         </li>
         <li class="nav-item ">
            <a href="{{ route('admin.orders.report', '5') }}" aria-expanded="true" class="nav-link">
            <i class="fe fe-plus-circle fe-16"></i>
            <span class="ml-3 item-text">Delivered Orders Report</span>
            </a>            
         </li>
      </ul>
   </nav>
</aside>