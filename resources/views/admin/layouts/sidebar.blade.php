  <!--start startbar-menu-->
  <div class="startbar-menu">
      <div class="startbar-collapse" id="startbarCollapse" data-simplebar="">
          <div class="d-flex align-items-start flex-column w-100">
              <!-- Navigation -->
              <ul class="navbar-nav mb-auto w-100">
                  <li class="menu-label pt-0 mt-0">
                      <!-- <small class="label-border">
                                <div class="border_left hidden-xs"></div>
                                <div class="border_right"></div>
                            </small> -->
                      <span>Main Menu</span>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('admin.dashboard') }}">
                          <i class="iconoir-home-simple menu-icon"></i>
                          <span>Dashboard</span>
                      </a>

                  </li><!--end nav-item-->
                  <li class="nav-item">
                      <a class="nav-link" href="#sidebarHotels" data-bs-toggle="collapse" role="button"
                          aria-expanded="false" aria-controls="sidebarHotels">
                          <i class="iconoir-view-grid menu-icon"></i>
                          <span>Hotels</span>
                      </a>
                      <div class="collapse " id="sidebarHotels">
                          <ul class="nav flex-column">
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('hotels.create') }}">Add Hotels</a>
                              </li><!--end nav-item-->
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('hotels.index') }}">Manage Hotels</a>
                              </li><!--end nav-item-->

                          </ul><!--end nav-->
                      </div><!--end startbarApplications-->
                  </li><!--end nav-item-->
                  <li class="nav-item">
                      <a class="nav-link" href="#sidebarRooms" data-bs-toggle="collapse" role="button"
                          aria-expanded="false" aria-controls="sidebarRooms">
                          <i class="iconoir-view-grid menu-icon"></i>
                          <span>Rooms</span>
                      </a>
                      <div class="collapse " id="sidebarRooms">
                          <ul class="nav flex-column">
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('rooms.create') }}">Add Rooms</a>
                              </li><!--end nav-item-->
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('rooms.index') }}">Manage Rooms</a>
                              </li><!--end nav-item-->

                          </ul><!--end nav-->
                      </div><!--end startbarApplications-->
                  </li><!--end nav-item-->
                  <li class="menu-label mt-2">
                      <small class="label-border">
                          <div class="border_left hidden-xs"></div>
                          <div class="border_right"></div>
                      </small>
                      <span>Location</span>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#sidebarElements" data-bs-toggle="collapse" role="button"
                          aria-expanded="false" aria-controls="sidebarElements">
                          <i class="iconoir-map-pin menu-icon"></i>
                          <span>Locations</span>
                      </a>
                      <div class="collapse " id="sidebarElements">
                          <ul class="nav flex-column">

                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('admin.locations') }}">Manage Locations</a>
                              </li>
                          </ul><!--end nav-->
                      </div><!--end startbarElements-->
                  </li><!--end nav-item-->
                  <li class="menu-label mt-2">
                      <small class="label-border">
                          <div class="border_left hidden-xs"></div>
                          <div class="border_right"></div>
                      </small>
                      <span>Settings</span>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('clear.cache') }}">
                          <i class="iconoir-erase menu-icon"></i>
                          <span>Clear Cache</span>
                      </a>

                  </li><!--end nav-item-->

                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('logout') }}">
                          <i class="iconoir-log-out menu-icon"></i>
                          <span>Logout</span>
                      </a>

                  </li><!--end nav-item-->
              </ul><!--end navbar-nav--->

          </div>
      </div><!--end startbar-collapse-->
  </div><!--end startbar-menu-->
