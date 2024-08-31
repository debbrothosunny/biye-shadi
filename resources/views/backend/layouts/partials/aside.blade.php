<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo text-white ml-2" href="">Biya Shady</a>
        <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="{{asset('assets/img/face1.jpg')}}"
                alt="logo" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle " src="{{asset('assets/img/face1.jpg')}}"
                            alt="Hexa's">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">Biya Shady</h5>
                        <span>Admin</span>
                    </div>
                </div>
                <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                    aria-labelledby="profile-dropdown">
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-settings text-primary"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-onepassword  text-info"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-calendar-today text-success"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                        </div>
                    </a>
                </div>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{!! route('Admin.dashboard') !!}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
    
        @php 
            use  App\Models\Payment;
            $personal_data = Payment::where('status','Free')->count();
        @endphp
        <li class="nav-item menu-items">
            <a class="nav-link  {{ request()->is('admin/payment') ? 'active' : '' }}" href="{!! route('payment') !!}">
                <span class="menu-icon">
                    <i class=" mdi mdi-arrow-up "></i>
                </span>
                <span class="menu-title"> Upgradation Rq ({{ $personal_data}})</span>
            </a>
        </li>
        <!-- Users Information -->

        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#User_Information" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-icon">
                    <i class="mdi mdi-book-open-page-variant"></i>
                </span>
                <span class="menu-title">User Information</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="User_Information">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/user_register_page') ? 'active' : '' }}" href="{!! route('user_register_page') !!}">
                            <span class="menu-icon">
                                <i class=" mdi mdi-pencil-lock "></i>
                            </span>
                            <span class="menu-title">User Info</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <!-- Home PaGE -->
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-home" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-icon">
                    <i class="mdi mdi-bank"></i>
                </span>
                <span class="menu-title">Website</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-home">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/home') ? 'active' : '' }}" href="{!! route('home') !!}">
                            <span class="menu-icon">
                                <i class=" mdi mdi-pencil-lock "></i>
                            </span>
                            <span class="menu-title">Home Page</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/happy_client') ? 'active' : '' }}" href="{!! route('happy_client') !!}">
                            <span class="menu-icon">
                                <i class=" mdi mdi-pencil-lock "></i>
                            </span>
                            <span class="menu-title">Happy Client</span>
                        </a>
                    </li>
               
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/about_us') ? 'active' : '' }}" href="{!! route('about_us') !!}">
                            <span class="menu-icon">
                                <i class=" mdi mdi-pencil-lock "></i>
                            </span>
                            <span class="menu-title">About us</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

         <!-- Message -->
         @php 
            use  App\Models\Message;
            $message = Message::orderBy('id', 'ASC')->count();
        @endphp
         <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#Message" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-icon">
                    <i class="mdi mdi-book-open-page-variant"></i>
                </span>
                <span class="menu-title">Message ({{ $message}})</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Message">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/message') ? '' : '' }}" href="{!! route('message') !!}">
                            <span class="menu-icon">
                                <i class=" mdi mdi-pencil-lock "></i>
                            </span>
                            <span class="menu-title">Message</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
      
        <!-- Site Setting -->
        <li class="nav-item nav-category">
            <span class="nav-link">Setting</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#Site_Setting " aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-icon">
                    <i class="mdi mdi-account-card-details"></i>
                </span>
                <span class="menu-title">Site Setting </span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Site_Setting">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/site_setting') ? '' : '' }}" href="{!! route('site_setting') !!}">
                            <span class="menu-icon">
                                <i class=" mdi mdi-pencil-lock "></i>
                            </span>
                            <span class="menu-title">Site Setting</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>


        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#Location " aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-icon">
                    <i class="mdi mdi-account-card-details"></i>
                </span>
                <span class="menu-title">Form Setting</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Location">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/country') ? '' : '' }}" href="{!! route('country') !!}">
                            <span class="menu-icon">
                                <i class=" mdi mdi-pencil-lock "></i>
                            </span>
                            <span class="menu-title">Country</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/city') ? '' : '' }}" href="{!! route('city') !!}">
                            <span class="menu-icon">
                                <i class=" mdi mdi-pencil-lock "></i>
                            </span>
                            <span class="menu-title">City</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>


         <!-- Subscriber-->
         <li class="nav-item nav-category">
            <span class="nav-link">Subscriber</span>
         </li>
       
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#Subs" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-icon">
                    <i class="mdi mdi-book-open-page-variant"></i>
                </span>
                <span class="menu-title">Subscriber</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Subs">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/subs') ? '' : '' }}" href="{!! route('subs') !!}">
                            <span class="menu-icon">
                                <i class=" mdi mdi-pencil-lock "></i>
                            </span>
                            <span class="menu-title">Subscriber</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>


         <!-- Upgradation Fee-->
         <li class="nav-item nav-category">
            <span class="nav-link">Upgradation</span>
         </li>
       
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#Upgradation" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-icon">
                    <i class="mdi mdi-cards-playing-outline"></i>
                </span>
                <span class="menu-title">Upgradation Fee</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Upgradation">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/upgradation_fee') ? '' : '' }}" href="{!! route('upgradation_fee') !!}">
                            <span class="menu-icon">
                                <i class=" mdi mdi-pencil-lock "></i>
                            </span>
                            <span class="menu-title">Fee</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
