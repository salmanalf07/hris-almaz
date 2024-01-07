<div>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="sidebar-user-panel active">
                    <div class="user-panel">
                        <div class=" image">
                            <img src="assets/images/usrbig.jpg" class="user-img-style" alt="User Image" />
                        </div>
                    </div>
                    <div class="profile-usertitle">
                        <div class="sidebar-userpic-name"> Emily Smith </div>
                        <div class="profile-usertitle-job ">Manager </div>
                    </div>
                </li>
                <li class="header">-- Main</li>
                <li class=" {{ request()->is('dashboard') ? 'active' : '' }}">
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="monitor"></i>
                        <span>Dashboard</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                            <a href="/dashboard">Dashboard 1</a>
                        </li>
                        <li>
                            <a href="/admin">Admin</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="users"></i>
                        <span>Employees</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="pages/employee/all-employees.html">All Employee</a>
                        </li>
                        <li>
                            <a href="pages/employee/add-employee.html">Add Employee</a>
                        </li>
                        <li>
                            <a href="pages/employee/edit-employee.html">Edit Employee</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="briefcase"></i>
                        <span>Projects</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="pages/projects/all-projects.html">All Projects</a>
                        </li>
                        <li>
                            <a href="pages/projects/add-project.html">Add Project</a>
                        </li>
                        <li>
                            <a href="pages/projects/edit-project.html">Edit Project</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="book-open"></i>
                        <span>Attendance</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="pages/attendance/today-attend.html">Today Attendance</a>
                        </li>
                        <li>
                            <a href="pages/attendance/emp-attend.html">Employee Attendance</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="user"></i>
                        <span>Clients</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="pages/clients/all-clients.html">All Clients</a>
                        </li>
                        <li>
                            <a href="pages/clients/add-client.html">Add Client</a>
                        </li>
                        <li>
                            <a href="pages/clients/edit-client.html">Edit Client</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="clipboard"></i>
                        <span>Leave Management</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="pages/leave/all-leave.html">All Leave Request</a>
                        </li>
                        <li>
                            <a href="pages/leave/leave-balance.html">Leave Balance</a>
                        </li>
                        <li>
                            <a href="pages/leave/add-leave.html">New Leave Request</a>
                        </li>
                        <li>
                            <a href="pages/leave/edit-leave.html">Edit Leave Request</a>
                        </li>
                        <li>
                            <a href="pages/leave/leave-type.html">Leave Types</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="headphones"></i>
                        <span>Holidays</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="pages/holiday/all-holidays.html">All Holidays</a>
                        </li>
                        <li>
                            <a href="pages/holiday/add-holiday.html">Add Holiday</a>
                        </li>
                        <li>
                            <a href="pages/holiday/edit-holiday.html">Edit Holiday</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="book"></i>
                        <span>Accounts</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="pages/accounts/income.html">Income</a>
                        </li>
                        <li>
                            <a href="pages/accounts/expense.html">Expenses</a>
                        </li>
                        <li>
                            <a href="pages/accounts/invoice.html">Invoices</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="trello"></i>
                        <span>Departments</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="pages/departments/all-departments.html">All Departments</a>
                        </li>
                        <li>
                            <a href="pages/departments/add-department.html">Add Department</a>
                        </li>
                        <li>
                            <a href="pages/departments/edit-department.html">Edit Departments</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="dollar-sign"></i>
                        <span>Payroll</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="pages/payroll/payslip.html">Payslip</a>
                        </li>
                        <li>
                            <a href="pages/payroll/employee-salary.html">Employee Salary</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="command"></i>
                        <span>Job</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="pages/job/add-job.html">Add Job</a>
                        </li>
                        <li>
                            <a href="pages/job/requirement-list.html">Requirements</a>
                        </li>
                        <li>
                            <a href="pages/job/applicant-list.html">Applicant List</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="package"></i>
                        <span>Consultancy</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="pages/consultancy/all-consultancy.html">All Consultancy</a>
                        </li>
                        <li>
                            <a href="pages/consultancy/add-consultancy.html">Add Consultancy</a>
                        </li>
                        <li>
                            <a href="pages/consultancy/edit-consultancy.html">Edit Consultancy</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="feather"></i>
                        <span>Widgets</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="pages/widgets/chart-widget.html">Chart Widget</a>
                        </li>
                        <li>
                            <a href="pages/widgets/data-widget.html">Data Widget</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="copy"></i>
                        <span>User Interface (UI)</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="pages/ui/alerts.html">Alerts</a>
                        </li>
                        <li>
                            <a href="pages/ui/badges.html">Badges</a>
                        </li>
                        <li>
                            <a href="pages/ui/modal.html">Modal</a>
                        </li>
                        <li>
                            <a href="pages/ui/buttons.html">Buttons</a>
                        </li>
                        <li>
                            <a href="pages/ui/collapse.html">Collapse</a>
                        </li>
                        <li>
                            <a href="pages/ui/dialogs.html">Dialogs</a>
                        </li>
                        <li>
                            <a href="pages/ui/cards.html">Cards</a>
                        </li>
                        <li>
                            <a href="pages/ui/labels.html">Labels</a>
                        </li>
                        <li>
                            <a href="pages/ui/list-group.html">List Group</a>
                        </li>
                        <li>
                            <a href="pages/ui/notifications.html">Notifications</a>
                        </li>
                        <li>
                            <a href="pages/ui/preloaders.html">Preloaders</a>
                        </li>
                        <li>
                            <a href="pages/ui/progressbars.html">Progress Bars</a>
                        </li>
                        <li>
                            <a href="pages/ui/range-sliders.html">Range Sliders</a>
                        </li>
                        <li>
                            <a href="pages/ui/tabs.html">Tabs</a>
                        </li>
                        <li>
                            <a href="pages/ui/typography.html">Typography</a>
                        </li>
                        <li>
                            <a href="pages/ui/helper-classes.html">Helper Classes</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="triangle"></i>
                        <span>Icons</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="pages/icons/material-icons.html">Material Icons</a>
                        </li>
                        <li>
                            <a href="pages/icons/font-awesome.html">Font Awesome</a>
                        </li>
                        <li>
                            <a href="pages/icons/simple-line-icons.html">Simple Line Icons</a>
                        </li>
                        <li>
                            <a href="pages/icons/themify.html">Themify Icons</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="layout"></i>
                        <span>Forms</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="pages/forms/basic-form-elements.html">Basic Form</a>
                        </li>
                        <li>
                            <a href="pages/forms/advanced-form-elements.html">Advanced Form</a>
                        </li>
                        <li>
                            <a href="pages/forms/form-examples.html">Form Examples</a>
                        </li>
                        <li>
                            <a href="pages/forms/form-validation.html">Form Validation</a>
                        </li>
                        <li>
                            <a href="pages/forms/form-wizard.html">Form Wizard</a>
                        </li>
                        <li>
                            <a href="pages/forms/editors.html">Editors</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="grid"></i>
                        <span>Tables</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="pages/tables/normal-tables.html">Normal Tables</a>
                        </li>
                        <li>
                            <a href="pages/tables/advance-tables.html">Advance Datatables</a>
                        </li>
                        <li>
                            <a href="pages/tables/export-table.html">Export Table</a>
                        </li>
                        <li>
                            <a href="pages/tables/child-row-table.html">Child Row Table</a>
                        </li>
                        <li>
                            <a href="pages/tables/group-table.html">Grouping</a>
                        </li>
                    </ul>
                </li>
                <li class="header">-- Apps</li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="mail"></i>
                        <span>Email</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="pages/email/inbox.html">Inbox</a>
                        </li>
                        <li>
                            <a href="pages/email/compose.html">Compose</a>
                        </li>
                        <li>
                            <a href="pages/email/view-mail.html">Read Email</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="pages/apps/chat.html">
                        <i data-feather="message-circle"></i>
                        <span>Chat</span>
                    </a>
                </li>
                <li>
                    <a href="pages/apps/calendar.html">
                        <i data-feather="calendar"></i>
                        <span>Calendar</span>
                    </a>
                </li>
                <li>
                    <a href="pages/apps/task.html">
                        <i data-feather="check-circle"></i>
                        <span>Task Bar</span>
                    </a>
                </li>
                <li>
                    <a href="pages/apps/portfolio.html">
                        <i data-feather="wind"></i>
                        <span>Portfolio</span>
                    </a>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="server"></i>
                        <span>Others</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="pages/apps/dragdrop.html">Drag &amp; Drop</a>
                        </li>
                        <li>
                            <a href="pages/apps/contact_list.html">Contact List</a>
                        </li>
                        <li>
                            <a href="pages/apps/contact_grid.html">Contact Grid</a>
                        </li>
                        <li>
                            <a href="pages/apps/support.html">Support</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="pie-chart"></i>
                        <span>Charts</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="pages/charts/amchart.html">amChart</a>
                        </li>
                        <li>
                            <a href="pages/charts/echart.html">Echart</a>
                        </li>
                        <li>
                            <a href="pages/charts/apexcharts.html">ApexCharts</a>
                        </li>
                        <li>
                            <a href="pages/charts/morris.html">Morris</a>
                        </li>
                        <li>
                            <a href="pages/charts/chartjs.html">ChartJS</a>
                        </li>
                        <li>
                            <a href="pages/charts/sparkline.html">Sparkline</a>
                        </li>
                        <li>
                            <a href="pages/charts/jquery-knob.html">Jquery Knob</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="map"></i>
                        <span>Maps</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="pages/maps/google.html">Google Map</a>
                        </li>
                        <li>
                            <a href="pages/maps/jqvmap.html">Vector Map</a>
                        </li>
                        <li>
                            <a href="pages/maps/datamap.html">Data Map</a>
                        </li>
                    </ul>
                </li>
                <li class="header">-- Extra</li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="sliders"></i>
                        <span>Timeline</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="pages/timeline/horizontal-timeline.html">Horizontal</a>
                        </li>
                        <li>
                            <a href="pages/timeline/vertical-timeline.html">Vertical</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="image"></i>
                        <span>Medias</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="pages/medias/image-gallery.html">Image Gallery</a>
                        </li>
                        <li>
                            <a href="pages/medias/carousel.html">Carousel</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="user-check"></i>
                        <span>Authentication</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="pages/examples/login-register.html">Login &amp; Register</a>
                        </li>
                        <li>
                            <a href="pages/examples/sign-in.html">Sign In</a>
                        </li>
                        <li>
                            <a href="pages/examples/sign-up.html">Sign Up</a>
                        </li>
                        <li>
                            <a href="pages/examples/forgot-password.html">Forgot Password</a>
                        </li>
                        <li>
                            <a href="pages/examples/locked.html">Locked</a>
                        </li>
                        <li>
                            <a href="pages/examples/404.html">404 - Not Found</a>
                        </li>
                        <li>
                            <a href="pages/examples/500.html">500 - Server Error</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="anchor"></i>
                        <span>Extra Pages</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="pages/examples/profile.html">Profile</a>
                        </li>
                        <li>
                            <a href="pages/examples/pricing.html">Pricing</a>
                        </li>
                        <li>
                            <a href="pages/examples/faqs.html">Faqs</a>
                        </li>
                        <li>
                            <a href="pages/examples/blank.html">Blank Page</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="chevrons-down"></i>
                        <span>Multi Level Menu</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="#" onClick="return false;">
                                <span>Menu Item</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" onClick="return false;">
                                <span>Menu Item - 2</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" onClick="return false;" class="menu-toggle">
                                <span>Level - 2</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="#" onClick="return false;">
                                        <span>Menu Item</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onClick="return false;" class="menu-toggle">
                                        <span>Level - 3</span>
                                    </a>
                                    <ul class="ml-menu">
                                        <li>
                                            <a href="#" onClick="return false;">
                                                <span>Level - 4</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
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