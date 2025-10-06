 <!-- sidebar menu area start -->
 @php
     $usr = Auth::user();
 @endphp
 <div class="sidebar-menu">
     <div class="sidebar-header">
         <div class="logo">
          
         </div>
     </div>
     <div class="main-menu">
         <div class="menu-inner">
             <nav>
                 <ul class="metismenu" id="menu">
                     <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
                         <a href="{{ route('admin.dashboard') }}" aria-expanded="true"><i
                                 class="ti-dashboard"></i><span>dashboard</span></a>
                     </li>
                     <li
                         class="">
                         <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-crown"></i><span>
                                 Master
                             </span></a>
                         <ul class="collapse">
                             <li class="{{ Route::is('admin.course_category') ? 'active' : '' }}">
                                 <a href="{{ route('admin.course_category') }}">Course Category</a>
                             </li>
                             <li class="{{ Route::is('admin.course') ? 'active' : '' }}">
                                 <a href="{{ route('admin.course') }}">Course</a>
                             </li>
                         </ul>
                     </li>
                     <li class="{{ Route::is('admin.chapter') ? 'active' : '' }}">
                        <a href="{{ route('admin.chapter') }}" aria-expanded="true">
                            <i class="fa fa-book"></i>
                            <span>Chapter</span>
                        </a>
                    </li>
                    <li class="{{ Route::is('admin.index-test') ? 'active' : '' }}">
                        <a href="{{ route('admin.index-test') }}" aria-expanded="true">
                            <i class="fa fa-clipboard"></i>
                            <span>Tests</span>
                        </a>
                    </li>

                     <li class="{{ Route::is('admin.index-question') ? 'active' : '' }}">
                         <a href="{{ route('admin.index-question') }}" aria-expanded="true"><i class="fa fa-question-circle"></i><span>
                                 Questions
                             </span></a>
                     </li>
                     <li class="">
                         <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-crown"></i><span>
                                 Reports
                             </span></a>
                         <ul class="collapse">
                             <li class="{{ Route::is('admin.subcription') ? 'active' : '' }}">
                                 <a href="{{ route('admin.subcription') }}">Subscription</a>
                             </li>
                             
                         </ul>
                     </li>
                 </ul>
             </nav>
         </div>
     </div>
 </div>
