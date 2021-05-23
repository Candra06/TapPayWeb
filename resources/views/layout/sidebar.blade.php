<!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile" style="background: url({{url('/')}}/assets/images/background/user-info.jpg) no-repeat;">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="{{url('assets/images/users/profile.png')}}"  alt="user" /> </div>
                    <!-- User profile text-->
                    <div class="profile-text"> <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Admin</a>

                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">PERSONAL</li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{ url('/dashboard')}}" aria-expanded="true"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a>

                        </li>

                        <li>
                            <a class="waves-effect waves-dark" href="{{ url('/mitra')}}" aria-expanded="true"><i class="mdi mdi-human-greeting"></i><span class="hide-menu">Mitra </span></a>
                        </li>

                        <li>
                            <a class="waves-effect waves-dark" href="{{ url('/pelanggan')}}" aria-expanded="true"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Pelanggan </span></a>

                        </li>

                        <li>
                            <a class="waves-effect waves-dark" href="{{ url('/tagihan')}}" aria-expanded="true"><i class="mdi mdi-credit-card"></i><span class="hide-menu">Tagihan </span></a>

                        </li>



                        <li class="nav-devider"></li>


                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->

        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
