



<div class="sidebar">

  <div class="user-panel mt-3 pb-3 mb-3">
    <div style="d-block padding: 5px 0 5px 0; white-space: wrap; text-align: center;">
      <a href="#" class="d-block admin_name text-uppercase font-weight-bold h2"> {{ Auth::user()->fullname }} </a>
    </div>
  </div>


  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item">
        <a href="{{ route('dashboard') }}" 
          class="nav-link {{ request()->is('dashboard') ? 'active': ''}}">
          <i class="nav-icon fas fa-home"></i>
          <p> @lang('index.Dashboard') </p>
        </a>
      </li>


      @if(Auth()->user()->role->view_permission == 1)
      <li class="nav-item {{ (request()->is('branch/*')) ? 'menu-open': ''}}">
        <a href="#" class="nav-link {{ (request()->is('branch/*')) ? 'active': ''}}">
          <i class="nav-icon fas fa-building"></i>
          <p> @lang('index.Branch') <i class="right fas fa-angle-left"></i></p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('AddBranchView') }}" 
              class="nav-link {{ (request()->is('branch/add-branch')) ? 'active': ''}}">
              <i class="fas fa-angle-right nav-icon"></i>
              <p> @lang('index.Add Branch') </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('BranchesList') }}" 
              class="nav-link {{ (request()->is('branch/all-branches')) ? 'active': ''}}">
              <i class="fas fa-angle-right nav-icon"></i>
              <p> @lang('index.All Branches') </p>
            </a>
          </li>
        </ul>
      </li>
      
      <li class="nav-item {{ (request()->is('staff/*')) ? 'menu-open': ''}}">
        <a href="#" class="nav-link {{ (request()->is('admin/staff/*')) ? 'active': ''}}">
          <i class="nav-icon fas fa-users"></i>
          <p> @lang('index.Staff') <i class="right fas fa-angle-left"></i></p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('AddStaffView') }}" 
              class="nav-link {{ (request()->is('staff/add-staff')) ? 'active': ''}}">
              <i class="fas fa-angle-right nav-icon"></i>
              <p> @lang('index.Add Staff') </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('StaffList') }}" 
              class="nav-link {{ (request()->is('staff/staff-list')) ? 'active': ''}}">
              <i class="fas fa-angle-right nav-icon"></i>
              <p> @lang('index.Staff List') </p>
            </a>
          </li>
        </ul>
      </li>
      @endif


      <li class="nav-item {{ (request()->is('parcel/*')) ? 'menu-open': ''}}">
        <a href="#" class="nav-link {{ (request()->is('parcel/*')) ? 'active': ''}}">
          <i class="nav-icon fas fa-boxes"></i>
          <p> @lang('index.Parcels') <i class="right fas fa-angle-left"></i></p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('AddParcelView') }}" 
              class="nav-link {{ (request()->is('parcel/add-parcel')) ? 'active': ''}}">
              <i class="fas fa-angle-right nav-icon"></i>
              <p> @lang('index.Add Parcel') </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('ParcelsList') }}" 
              class="nav-link {{ (request()->is('parcel/all-parcels')) ? 'active': ''}}">
              <i class="fas fa-angle-right nav-icon"></i>
              <p> @lang('index.All Parcels') </p>
            </a>
          </li>

          
          <li class="nav-item">
            <a href="{{ route('AcceptedByCourier') }}" class="nav-link 
              {{ (request()->is('parcel/accepted-by-courier')) ? 'active': ''}}">
              <i class="fas fa-angle-right nav-icon"></i>
              <p> @lang('index.Item Accepted by Courier') </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('ReadyForCollection') }}" class="nav-link 
              {{ (request()->is('parcel/ready-for-collection')) ? 'active': ''}}">
              <i class="fas fa-angle-right nav-icon"></i>
              <p> @lang('index.Ready for Collection')</p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ route('ParcelsCollected') }}" class="nav-link 
              {{ (request()->is('parcel/parcels-collected')) ? 'active': ''}}">
              <i class="fas fa-angle-right nav-icon"></i>
              <p> @lang('index.Collected') </p>
            </a>
          </li>

          @if(Auth()->user()->role->view_permission == 1)
            <li class="nav-item">
            <a href="./index.php?page=parcel_list&amp;s=9" class="nav-link nav-parcel_list_9 tree-item">
              <i class="fas fa-angle-right nav-icon"></i>
              <p> @lang('index.Unsuccessful Delivery Attempt') </p>
            </a>
          </li>
          @endif

          <li class="nav-item">
            <a href="{{ route('TrackParcelView') }}" class="nav-link 
              {{ (request()->is('parcel/track-parcel')) ? 'active': ''}}">
              <i class="fas fa-angle-right nav-icon"></i>
              <p> @lang('index.Track Parcel')</p>
            </a>
          </li>
                    
        </ul>
      </li>

    
    </ul>
  </nav>

</div>