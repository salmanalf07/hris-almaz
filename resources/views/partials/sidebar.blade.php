<div>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="sidebar-user-panel active">
                    <div class="user-panel">
                        <div class=" image">
                            <img src="{{asset('assets/images/blank-profile.png')}}" class="user-img-style" alt="User Image" />
                        </div>
                    </div>
                    <div class="profile-usertitle">
                        <div class="sidebar-userpic-name">{{Auth::user()->name}}</div>
                        <div class="profile-usertitle-job ">Manager </div>
                    </div>
                </li>
                <li class=" {{ request()->is('dashboard') ? 'active' : '' }}">
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="monitor"></i>
                        <span>Dashboard</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                            <a href="{{route('dashboard')}}">Dashboard</a>
                        </li>
                    </ul>
                </li>
                <li class=" {{ request()->is('employee*') ? 'active' : '' }}">
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="users"></i>
                        <span>Employees</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{ request()->is('employee/dashboard') ? 'active' : '' }}">
                            <a href="{{route('employeeDashboard')}}">All Employee</a>
                        </li>
                    </ul>
                </li>
                @role(['SuperAdmin'])
                <li class=" {{ request()->is('typeEmployee*','level*','department*','user*') ? 'active' : '' }}">
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i class="fas fa-atom"></i>
                        <span>Master Data</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{ request()->is('typeEmployee/dashboard') ? 'active' : '' }}">
                            <a href="{{route('typeEmployeeDashboard')}}">Type Employee</a>
                        </li>
                        <li class="{{ request()->is('level/dashboard') ? 'active' : '' }}">
                            <a href="{{route('levelDashboard')}}">Level</a>
                        </li>
                        <li class="{{ request()->is('department/dashboard') ? 'active' : '' }}">
                            <a href="{{route('departmentDashboard')}}">Department</a>
                        </li>
                        <li class="{{ request()->is('user/dashboard') ? 'active' : '' }}">
                            <a href="{{route('userDashboard')}}">User</a>
                        </li>
                    </ul>
                </li>
                @endrole
            </ul>
        </div>
        <!-- #Menu -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation">
                <a href="#skins" data-bs-toggle="tab" class="active">SKINS</a>
            </li>
            <li role="presentation">
            </li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane in active in active stretchLeft" id="skins">
                <div class="demo-skin">
                    <div class="rightSetting">
                        <p>SIDEBAR COLOR</p>
                        <div class="selectgroup selectgroup-pills sidebar-color mt-3">
                            <label class="selectgroup-item">
                                <input type="radio" name="icon-input" value="1" class="btn-check selectgroup-input select-sidebar" checked>
                                <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip" data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="icon-input" value="2" class="btn-check selectgroup-input select-sidebar">
                                <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip" data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                            </label>
                        </div>
                    </div>
                    <div class="rightSetting">
                        <p>THEME COLORS</p>
                        <div class="btn-group theme-color mt-3" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="btnradio" value="1" id="btnradio1" autocomplete="off" checked>
                            <label class="radio-toggle btn btn-outline-primary" for="btnradio1">Light</label>
                            <input type="radio" class="btn-check" name="btnradio" value="2" id="btnradio2" autocomplete="off">
                            <label class="radio-toggle btn btn-outline-primary " for="btnradio2">Dark</label>
                        </div>
                    </div>
                    <div class="rightSetting">
                        <p>SKINS</p>
                        <ul class="demo-choose-skin choose-theme list-unstyled">
                            <li data-theme="black">
                                <div class="black-theme"></div>
                            </li>
                            <li data-theme="white">
                                <div class="white-theme white-theme-border"></div>
                            </li>
                            <li data-theme="purple">
                                <div class="purple-theme"></div>
                            </li>
                            <li data-theme="blue">
                                <div class="blue-theme"></div>
                            </li>
                            <li data-theme="cyan">
                                <div class="cyan-theme"></div>
                            </li>
                            <li data-theme="green">
                                <div class="green-theme"></div>
                            </li>
                            <li data-theme="orange">
                                <div class="orange-theme"></div>
                            </li>
                        </ul>
                    </div>
                    <div class="rightSetting">
                        <p>RTL Layout</p>
                        <div class="switch mt-3">
                            <label>
                                <input type="checkbox" class="layout-change">
                                <span class="lever switch-col-red layout-switch"></span>
                            </label>
                        </div>
                    </div>
                    <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                        <button type="button" class="btn btn-outline-primary btn-border-radius btn-restore-theme">Restore
                            Default</button>
                    </div>
                </div>
            </div>
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</div>