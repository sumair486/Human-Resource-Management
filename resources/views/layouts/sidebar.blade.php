<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar" style="font-family: 'Inter', san-serif;">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        {{-- {{route('dashboard.index')}} --}}
        <a href="#"><img src="{{asset('img/loader.png')}}" width="75%" alt="Tenet"><span class="m-l-10"></span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a href="#" class="image">
                        @if (Auth::user()->role_id == 1)
                        <img src="{{asset('img/no_image.png')}}" alt="Profile-Photo" />
                        @elseif (Auth::user()->role_id == 2 && Auth::user()->employee->profile_image)
                        <img src="{{asset('storage/profile_images/'.Auth::user()->employee->profile_image)}}" alt="Profile-Photo" width="" />
                        @elseif (Auth::user()->role_id == 3 && Auth::user()->employee->profile_image)
                        <img src="{{asset('storage/profile_images/'.Auth::user()->employee->profile_image)}}" alt="Profile-Photo" width="" />
                        @elseif (Auth::user()->role_id == 4 && Auth::user()->employee->profile_image)
                        <img src="{{asset('storage/profile_images/'.Auth::user()->employee->profile_image)}}" alt="Profile-Photo" width="" />
                        @else
                        <img src="{{asset('img/no_image.png')}}" alt="Profile-Photo" />
                        @endif
                    </a>
                    <div class="detail" style="text-align:left;">
                        <?php
                            $employee = Auth::user()->employee;
                        ?>
                        @if (Auth::user()->role_id == 2)
                            <h5 style="font-size:13px;margin-bottom:0;">{{$employee->first_name.' '.$employee->middle_name.' '.$employee->last_name}}</h5>
                            <small>Employee</small>
                        @endif

                        @if (Auth::user()->role_id == 3)
                        <h5 style="font-size:13px;margin-bottom:0;">{{$employee->first_name.' '.$employee->middle_name.' '.$employee->last_name}}</h5>
                        <small>Project Manager</small>
                        @endif

                        @if (Auth::user()->role_id == 4)
                        <h5 style="font-size:13px;margin-bottom:0;">{{$employee->first_name.' '.$employee->middle_name.' '.$employee->last_name}}</h5>
                        <small>HR</small>
                        @endif

                        <small>{{Auth::user()->role_id == 1 ? 'Admin' : null }}</small>
                    </div>
                </div>
            </li>

            @can('admin-dashboard')
                <li class="{{ request()->is('admin/dashboard') ? 'active open' : null }}"><a href="{{url('admin/dashboard')}}"><i class="fas fa-home"></i><span>Dashboard</span></a></li>
            @endcan
            @can('employee-dashboard')
                <li class="{{ request()->is('emp/dashboard') ? 'active open' : null }}"><a href="{{url('emp/dashboard')}}"><i class="fas fa-home"></i><span>Dashboard</span></a></li>
            @endcan
            @can('manager-dashboard')
                <li class="{{ request()->is('manager/dashboard') ? 'active open' : null }}"><a href="{{url('manager/dashboard')}}"><i class="fas fa-home"></i><span>Dashboard</span></a></li>
            @endcan
            @can('hr-dashboard')
                <li class="{{ request()->is('hr/dashboard') ? 'active open' : null }}"><a href="{{url('hr/dashboard')}}"><i class="fas fa-home"></i><span>Dashboard</span></a></li>
            @endcan

            @can('employee')
            <li class="{{ request()->is('employee') || request()->is('department/create') || request()->is('employee/create')? 'active open' : null }}">
                <a href="javascript:void(0)" class="menu-toggle"><i class="fas fa-users"></i> <span>Employee</span></a>
                <ul class="ml-menu">
                    <li class="{{ request()->is('employee') ? 'active' : null }}"><a href="{{url('employee')}}">All Employees</a></li>
                    <li class="{{ request()->is('employee/create') ? 'active' : null }}"><a href="{{url('employee/create')}}">Add Employee</a></li>
                        <li class="{{ request()->is('payslip') ? 'active' : null }}"><a href="{{url('payslip')}}">All Payslips</a></li>
                        <li class="{{ request()->is('payslip/create') ? 'active' : null }}"><a href="{{url('payslip/create')}}">Add Payslip</a></li>
                       <li class="{{ request()->is('training') ? 'active' : null }}"><a href="{{url('training')}}">Training / Reward and Punishment</a></li>
                       <li class="{{ request()->is('equipment/show') ? 'active' : null }}"><a href="{{url('equipment/show')}}">All Equipment</a></li>

                       <li class="{{ request()->is('equipment') ? 'active' : null }}"><a href="{{url('equipment')}}">Add Equipment</a></li>


                        <!--changes-->
                       <li class="{{ request()->is('department/create') ? 'active' : null }}"><a href="{{url('department/create')}}">Departments</a></li>
                       
               
                </ul>
            </li>
            @endcan

            {{-- report --}}

            @can('report')
            <li class="{{ request()->is('report') || request()->is('employee_status') || request()->is('employee/create')? 'active open' : null }}">
                <a href="javascript:void(0)" class="menu-toggle"><i class="fas fa-file"></i> <span>Report</span></a>
                <ul class="ml-menu">
                    <li class="{{ request()->is('employee_status') ? 'active' : null }}"><a href="{{ url('employee_status') }}">Employee Status Report</a></li>
                    <li class="{{ request()->is('employee_allowance') ? 'active' : null }}"><a href="{{ url('employee_allowance') }}">Employee Allowance Report</a></li>
                    <li class="{{ request()->is('employee_document') ? 'active' : null }}"><a href="{{ url('employee_document') }}">Employee Document Report</a></li>
                    <li class="{{ request()->is('employee_absent') ? 'active' : null }}"><a href="{{ url('employee_absent') }}">Employee Absent Report</a></li>
                    <li class="{{ request()->is('employee_loan') ? 'active' : null }}"><a href="{{ url('employee_loan') }}">Employee Loan Report</a></li>
                    <li class="{{ request()->is('employee_payroll') ? 'active' : null }}"><a href="{{ url('employee_payroll') }}">Employee Payroll Report</a></li>
                    <li class="{{ request()->is('employee_monthly_accural') ? 'active' : null }}"><a href="{{ url('employee_monthly_accural') }}">Employee Monthly Accurals</a></li>
                    <li class="{{ request()->is('employee_account') ? 'active' : null }}"><a href="{{ url('employee_account') }}">Employee Account Report</a></li>







                    {{-- <li class="{{ request()->is('loan') ? 'active' : null }}"><a href="{{ url('loan') }}"></a></li> --}}

                   
               
                </ul>
            </li>
            @endcan

            {{-- loan --}}

            @can('loan')
            <li class="{{ request()->is('loan') || request()->is('department/create') || request()->is('employee/create')? 'active open' : null }}">
                <a href="javascript:void(0)" class="menu-toggle"><i class="fas fa-money-bill"></i> <span>Loan</span></a>
                <ul class="ml-menu">
                    <li class="{{ request()->is('show') ? 'active' : null }}"><a href="{{ url('show') }}">All Loan</a></li>
                    <li class="{{ request()->is('loan') ? 'active' : null }}"><a href="{{ url('loan') }}">Add Loan</a></li>

                   
               
                </ul>
            </li>
            @endcan

            @can('vacation')
            <li class="{{ request()->is('vacation') || request()->is('department/create') || request()->is('employee/create')? 'active open' : null }}">
                <a href="javascript:void(0)" class="menu-toggle"><i class="fas fa-plane"></i> <span>Vacation</span></a>
                <ul class="ml-menu">
                    <li class="{{ request()->is('vacation_entry') ? 'active' : null }}"><a href="{{ url('vacation_entry') }}">Vacation Entry</a></li>
                    <li class="{{ request()->is('vacation_inquiry') ? 'active' : null }}"><a href="{{ url('vacation_inquiry') }}">Vacation Inquiry</a></li>
                    <li class="{{ request()->is('vacation_salary') ? 'active' : null }}"><a href="{{ url('vacation_salary') }}">Vacation Salary</a></li>
                </ul>
            </li>
            @endcan

            @can('government')
            <li class="{{ request()->is('government') || request()->is('department/create') || request()->is('employee/create')? 'active open' : null }}">
                <a href="javascript:void(0)" class="menu-toggle"><i class="fas fa-balance-scale"></i> <span>Government</span></a>
                <ul class="ml-menu">
                    <li class="{{ request()->is('government') ? 'active' : null }}"><a href="{{ url('government') }}">Government Form</a></li>
                    {{-- <li class="{{ request()->is('vacation_inquiry') ? 'active' : null }}"><a href="{{ url('vacation_inquiry') }}">Vacation Inquiry</a></li>
                    <li class="{{ request()->is('vacation_salary') ? 'active' : null }}"><a href="{{ url('vacation_salary') }}">Vacation Salary</a></li> --}}


                   
               
                </ul>
            </li>
            @endcan

            {{-- end loan --}}

            @can('client')
                <li class="{{ request()->is('client') || request()->is('client/create') || request()->is('client-invoice') || request()->is('client-invoice/create')? 'active open' : null }}">
                    <a href="javascript:void(0)" class="menu-toggle"><i class="fas fa-user-tie"></i> <span>Client</span></a>
                    <ul class="ml-menu">
                        <li class="{{ request()->is('client') ? 'active' : null }}"><a href="{{url('client')}}">All Clients</a></li>
                        <li class="{{ request()->is('client/create') ? 'active' : null }}"><a href="{{url('client/create')}}">Add Client</a></li>
                        <li class="{{ request()->is('client-invoice') ? 'active' : null }}"><a href="{{url('client-invoice')}}">All Invoices</a></li>
                        <li class="{{ request()->is('client-invoice/create') ? 'active' : null }}"><a href="{{url('client-invoice/create')}}">Add Invoice</a></li>
                    </ul>
                </li>
            @endcan

            @can('project')
                <li class="{{ request()->is('project') || request()->is('project/create')? 'active open' : null }}">
                    <a href="javascript:void(0)" class="menu-toggle"><i class="fas fa-project-diagram"></i> <span>Project</span></a>
                    <ul class="ml-menu">
                        <li class="{{ request()->is('project') ? 'active' : null }}"><a href="{{url('project')}}">All Projects</a></li>
                        <li class="{{ request()->is('project/create') ? 'active' : null }}"><a href="{{url('project/create')}}">Add Project</a></li>
                    </ul>
                </li>
            @endcan

            @can('tasktracker')
                <li class="{{ request()->is('task-tracker') || request()->is('task-tracker/create') || request()->is('task-report') || request()->is('task-module') ? 'active open' : null }}">
                    <a href="javascript:void(0)" class="menu-toggle"><i class="fas fa-tasks"></i> <span>Task Tracker</span></a>
                    <ul class="ml-menu">
                        <li class="{{ request()->is('task-tracker') ? 'active' : null }}"><a href="{{url('task-tracker')}}">All Tasks</a></li>
                        <li class="{{ request()->is('task-tracker/create') ? 'active' : null }}"><a href="{{url('task-tracker/create')}}">Add Task</a></li>
                        <li class="{{ request()->is('task-report') ? 'active' : null }}"><a href="{{url('task-report')}}">Task hourly Report</a></li>
                        <li class="{{ request()->is('task-module') ? 'active' : null }}"><a href="{{url('task-module')}}">Task Module</a></li>
                    </ul>
                </li>
            @endcan

            @can('timetracker')
                <li class="{{ request()->is('time-tracker')? 'active open' : null }}">
                    <a href="javascript:void(0)" class="menu-toggle"><i class="fas fa-calendar-alt"></i> <span>Attendance</span></a>
                    <ul class="ml-menu">
                        <li class="{{ request()->is('time-tracker') ? 'active' : null }}"><a href="{{url('time-tracker')}}">Time Tracker</a></li>
                    </ul>
                </li>
            @endcan

            @can('leave-list')
                <li class="{{ request()->is('leave-list')? 'active open' : null }}">
                    <a href="javascript:void(0)" class="menu-toggle"><i class="fas fa-file-alt"></i> <span>Leave 
                    @if($count = App\Models\Leave::where('viewed',0)->count())
                    
                   
                  
                   @endif
                    </span></a>
                    <ul class="ml-menu">
                        <li class="{{ request()->is('leave-list') ? 'active' : null }}"><a href="{{url('leave-list')}}">All Leaves</a></li>
                    </ul>
                </li>
            @endcan

            @can('payslip')
                <li class="{{ request()->is('add-payable') || request()->is('all-payable') || request()->is('add-recivable') || request()->is('all-recivable') ? 'active open' : null }}">
                    <a href="javascript:void(0)" class="menu-toggle"><i class="fas fa-receipt"></i> <span>Expense</span></a>
                    <ul class="ml-menu">
                    
                        
                        
                        <li class="{{ request()->is('add-payable') ? 'active' : null }}"><a href="{{route('add.payble')}}">Payable</a></li>
                        <li class="{{ request()->is('all-payable') ? 'active' : null }}"><a href="{{route('all.payable')}}">All Payable</a></li>
                        <li class="{{ request()->is('add-recivable') ? 'active' : null }}"><a href="{{route('add.recivable')}}">Receivable</a></li>
                        <li class="{{ request()->is('all-recivable') ? 'active' : null }}"><a href="{{route('all.reciveable')}}">All Receivable</a></li>
                    </ul>
                </li>
            @endcan

            <!--@can('department')-->
            <!--    <li class="{{request()->is('department/create') ? 'active open' : null }}">-->
            <!--        <a href="javascript:void(0)" class="menu-toggle"><i class="fas fa-building"></i> <span>Department</span></a>-->
                    <!--<ul class="ml-menu">-->
                    <!--    <li class="{{ request()->is('department/create') ? 'active' : null }}"><a href="{{url('department/create')}}">Add Department</a></li>-->
                    <!--</ul>-->
            <!--    </li>-->
            <!--@endcan-->

            @can('users')
                <li class="{{ request()->is('user') || request()->is('user/create') ? 'active open' : null }}">
                    <a href="javascript:void(0)" class="menu-toggle"><i class="fas fa-user"></i> <span>Users</span></a>
                    <ul class="ml-menu">
                        <li class="{{ request()->is('user') ? 'active' : null }}"><a href="{{url('user')}}">All Users</a></li>
                        <li class="{{ request()->is('user/create') ? 'active' : null }}"><a href="{{url('user/create')}}">Add User</a></li>
                    </ul>
                </li>
            @endcan
          	@can('blogs')
			<li class="{{ request()->is('blogs') || request()->is('blogs/create') ? 'active open' : null }}">
                   <a href="javascript:void(0)" class="menu-toggle"><i class="fas fa-blog"></i> <span>Blogs</span></a>
                   <ul class="ml-menu">
                       <li class="{{ request()->is('blogs') ? 'active' : null }}"><a href="{{url('blogs')}}">All Blogs</a></li>
                       <li class="{{ request()->is('blogs/create') ? 'active' : null }}"><a href="{{url('blogs/create')}}">Add Blogs</a></li>
                   </ul>
            </li>
          	@endcan
          
            @can('contacts')
          	<li class="{{ request()->is('contacts') || request()->is('careers') ? 'active open' : null }}">
                   <a href="javascript:void(0)" class="menu-toggle"><i class="fas fa-address-book"></i> <span>Contacts</span></a>
                   <ul class="ml-menu">
                       <li class="{{ request()->is('contacts') ? 'active' : null }}"><a href="{{url('contacts')}}">Contact us</a></li>
                       <li class="{{ request()->is('careers') ? 'active' : null }}"><a href="{{url('careers')}}">Career</a></li>
                   </ul>
            </li>
          	@endcan


            @can('company')
          	<li class="{{ request()->is('company') || request()->is('branches') || request()->is('departments') ? 'active open' : null }}">
                   <a href="javascript:void(0)" class="menu-toggle"><i class="fas fa-address-book"></i> <span>Setting</span></a>
                   <ul class="ml-menu">
                       <li class="{{ request()->is('company') ? 'active' : null }}"><a href="{{url('company')}}">Company</a></li>
                       <li class="{{ request()->is('branches') ? 'active' : null }}"><a href="{{url('branches')}}">Branch</a></li>
                       <li style="border-bottom: 1px solid black;" class="{{ request()->is('departments') ? 'active' : null }}"><a href="{{url('departments')}}">Department</a></li>
                       <li  class="{{ request()->is('nationality') ? 'active' : null }}"><a href="{{url('nationality')}}">Nationality</a></li>
                       <li  class="{{ request()->is('religion') ? 'active' : null }}"><a href="{{url('religion')}}">Religion</a></li>
                       <li  class="{{ request()->is('qualification') ? 'active' : null }}"><a href="{{url('qualification')}}">Qualification</a></li>
                       <li  class="{{ request()->is('position') ? 'active' : null }}"><a href="{{url('position')}}">Position (Job Title)</a></li>
                       <li  class="{{ request()->is('professions') ? 'active' : null }}"><a href="{{url('professions')}}">Professions</a></li>
                       <li style="border-bottom: 1px solid black;"  class="{{ request()->is('category') ? 'active' : null }}"><a href="{{url('category')}}">Category</a></li>

                       <li style="border-bottom: 1px solid black;" class="{{ request()->is('sponsortype') ? 'active' : null }}"><a href="{{url('sponsortype')}}">Sponsor Type</a></li>
                       <li  class="{{ request()->is('martial') ? 'active' : null }}"><a href="{{url('martial')}}">Marital Status</a></li>
                       <li  class="{{ request()->is('loan_type') ? 'active' : null }}"><a href="{{url('loan_type')}}">Loan Type</a></li>
                       <li  class="{{ request()->is('termination') ? 'active' : null }}"><a href="{{url('termination')}}">Termination Type</a></li>
                       <li  class="{{ request()->is('vacation_type') ? 'active' : null }}"><a href="{{url('vacation_type')}}">Vacation Type</a></li>
                       <li  class="{{ request()->is('bank') ? 'active' : null }}"><a href="{{url('bank')}}">Bank Type</a></li>










                       {{-- <li class="{{ request()->is('careers') ? 'active' : null }}"><a href="{{url('careers')}}">Career</a></li> --}}
                   </ul>
            </li>
          	@endcan


              @can('insurance')
          	<li class="{{ request()->is('insurance') ? 'active open' : null }}">
                   <a href="javascript:void(0)" class="menu-toggle"><i class="fas fa-address-book"></i> <span>Setup</span></a>
                   <ul class="ml-menu">
                       <li class="{{ request()->is('insurance') ? 'active' : null }}"><a href="{{url('insurance')}}">Insurance</a></li>
                       <li class="{{ request()->is('service') ? 'active' : null }}"><a href="{{url('service')}}">Service</a></li>
                       <li class="{{ request()->is('vacations') ? 'active' : null }}"><a href="{{url('vacations')}}">Vacations</a></li>
                       <li style="border-bottom: 1px solid black;" class="{{ request()->is('ticket') ? 'active' : null }}"><a href="{{url('ticket')}}">Ticket</a></li>                      
                       <li class="{{ request()->is('overtime') ? 'active' : null }}"><a href="{{url('overtime')}}">Over Time</a></li>                      
                       <li class="{{ request()->is('absent') ? 'active' : null }}"><a href="{{url('absent')}}">Absent</a></li>
                       <li class="{{ request()->is('latededuction') ? 'active' : null }}"><a href="{{url('latededuction')}}">Late Deduction</a></li>



                       



                       {{-- <li class="{{ request()->is('careers') ? 'active' : null }}"><a href="{{url('careers')}}">Career</a></li> --}}
                   </ul>
            </li>
          	@endcan



            

            @can('reports')
            <li class="{{ request()->is('reports') ? 'active open' : null }}">
                <a href="javascript:void(0)" class="menu-toggle"><i class="fas fa-user"></i> <span>Reports</span></a>
                <ul class="ml-menu">
                    <li class="{{ request()->is('user') ? 'active' : null }}"><a href="{{url('report')}}">All Reports</a></li>
                    {{-- <li class="{{ request()->is('user/create') ? 'active' : null }}"><a href="{{url('user/create')}}">Add User</a></li> --}}
                </ul>
            </li>
            @endcan

            @can('leave')
                <li class="{{request()->is('leave') || request()->is('leave/create') ? 'active' : null}}">
                    <a href="javascript:void(0)" class="menu-toggle"><i class="fas fa-file-alt"></i> <span>My Leaves</span></a>
                    <ul class="ml-menu">
                        <li class="{{request()->is('leave') ? 'active' : null}}"><a href="{{url('leave')}}">All Leave</a></li>
                        <li class="{{request()->is('leave/create') ? 'active' : null}}"><a href="{{url('leave/create')}}">Apply Leave</a></li>
                    </ul>
                </li>
            @endcan

            @can('task')
                <li class="{{request()->is('task') ? 'active' : null}}">
                    <a href="javascript:void(0)" class="menu-toggle"><i class="fas fa-tasks"></i> <span>My Tasks</span></a>
                    <ul class="ml-menu">
                        <li class="{{request()->is('task') ? 'active' : null}}"><a href="{{url('task')}}">All Task</a></li>
                    </ul>
                </li>
                
            @endcan
            
            <!--@if (Auth::user()->employee_id == 16)-->
            
            <!-- <li class="">-->
            <!--        <a href="javascript:void(0)" class="menu-toggle"><i class="fas fa-tasks"></i> <span>My Reports</span></a>-->
            <!--        <ul class="ml-menu">-->
            <!--            <li class=""><a href="{{url('/monthly_report')}}">All Reports</a></li>-->
            <!--        </ul>-->
            <!--    </li>-->
            
            <!--@endif-->

        </ul>
    </div>
</aside>
