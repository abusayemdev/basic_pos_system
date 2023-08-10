<x-app-layout>


<div class="page-wrapper">
         

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
         <div class="logo">
            <?php
            $logo = DB::table('settings')->first()->company_logo ?? '';

            ?>
                 
                <a href="{{url('/dashboard')}}">
                <img src="{{URL::to($logo)}}"> 
                    
                
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li >
                            <a  href="{{url('/dashboard')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard </a>
                            
                        </li>

                        <li >
                            <a  href="{{url('/pos')}}">
                            <i class="fas fa-cart-arrow-down"></i> POS </a>
                            
                        </li>


                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="	fas fa fa-folder"></i>Customer </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{url('/add-customer')}}"><i class="	fas fa fa-plus"></i> Add Customer </a>
                                </li>

                                <li>
                                    <a href="{{url('/all-customer')}}"><i class="	fas fa fa-database"></i> All Customers </a>
                                </li>
                               
                            </ul>
                        </li>


                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="	fas fa fa-folder"></i>Supplier </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{url('/add-supplier')}}"><i class="	fas fa fa-plus"></i> Add Supplier </a>
                                </li>

                                <li>
                                    <a href="{{url('/all-supplier')}}"><i class="	fas fa fa-database"></i> All Suppliers </a>
                                </li>
                               
                            </ul>
                        </li>


 

                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="	fas fa fa-folder"></i>Category </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{url('/add-category')}}"><i class="	fas fa fa-plus"></i> Add Category </a>
                                </li>

                                <li>
                                    <a href="{{url('/all-category')}}"><i class="	fas fa fa-database"></i> All Categorys </a>
                                </li>
                               
                            </ul>
                        </li>


                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="	fas fa fa-folder"></i>Product </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{url('/add-product')}}"><i class="	fas fa fa-plus"></i> Add Product </a>
                                </li>

                                <li>
                                    <a href="{{url('/all-product')}}"><i class="	fas fa fa-database"></i> All Products </a>
                                </li>

                                <li>
                                    <a href="{{url('/import-product')}}"><i class="fas fa-upload"></i> Import Products </a>
                                </li>
                               
                            </ul>
                        </li> 


                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="	fas fa fa-folder"></i>Order </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{url('/pending-order')}}"><i class="fas fa-list"></i> Pending Orders </a>
                                </li>

                                <li>
                                    <a href="{{url('/success-order')}}"><i class="	fas fa fa-database"></i> Success Orders </a>
                                </li>
                               
                            </ul>
                        </li> 


                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="	fas fa fa-folder"></i>Expense </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{url('/add-expense')}}"><i class="	fas fa fa-plus"></i> Add Expense </a>
                                </li>

                                <li>
                                    <a href="{{url('/today-expense')}}"><i class="fas fa-dollar-sign"></i> Today Expenses </a>
                                </li>

                                <li>
                                    <a href="{{url('/monthly-expense')}}"><i class="fas fa-dollar-sign"></i> Monthly Expenses </a>
                                </li>

                                <li>
                                    <a href="{{url('/yearly-expense')}}"><i class="fas fa-dollar-sign"></i> Yearly Expenses </a>
                                </li>
                               
                            </ul>
                        </li>


                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="	fas fa fa-folder"></i>Employee </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{url('/add-employee')}}"><i class="	fas fa fa-plus"></i> Add Employee </a>
                                </li>

                                <li>
                                    <a href="{{url('/all-employee')}}"><i class="	fas fa fa-database"></i> All Employee </a>
                                </li>
                               
                            </ul>
                        </li> 


                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="	fas fa fa-folder"></i>Attendence </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{url('/take-attendence')}}"><i class="	fas fa fa-plus"></i> Take Attendence </a>
                                </li>

                                <li>
                                    <a href="{{url('/all-attendence')}}"><i class="	fas fa fa-database"></i> All Attendences </a>
                                </li>
                               
                            </ul>
                        </li>

                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="	fas fa fa-folder"></i>Salary </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{url('/add-advanced_salary')}}"><i class="	fas fa fa-plus"></i> Add Advance  </a>
                                </li>

                                <li>
                                    <a href="{{url('/all-advanced_salary')}}"><i class="	fas fa fa-database"></i> All Advance  </a>
                                </li>

                                <li>
                                    <a href="{{url('/pay-salary')}}"><i class="fas fa-dollar-sign"></i>Pay Salary </a>
                                </li>

                                <li>
                                    <a href="{{url('/all-salary')}}"><i class="	fas fa fa-database"></i>All Salaries </a>
                                </li>

                         
                               
                            </ul>
                        </li> 


 


                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="	fas fa fa-folder"></i>Settings </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{url('/website-settings')}}"><i class="fas fa-cog"></i> Settings </a>
                                </li>

                               
                               
                            </ul>
                        </li> 


                    </ul>
                </nav>
            </div>
        </aside>
		<!-- END MENU SIDEBAR-->
		
	

			<!-- PAGE CONTAINER-->
		<div class="page-container">


            <!-- HEADER MOBILE-->
            <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        
            <nav class="navbar-mobile">
                <div class="container-fluid p-3">
                    <ul class="navbar-mobile__list list-unstyled">
						
					    <li >
                            <a class="js-arrow" href="">
                                <i class="fas fa-tachometer-alt"></i>Dashboard </a>
                            
                        </li>

                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="	fas fa fa-folder"></i>Category </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href=""><i class="	fas fa fa-plus"></i> Add Category </a>
                                </li>

                                <li>
                                    <a href=""><i class="	fas fa fa-database"></i> All Category </a>
                                </li>
                               
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
            
        </header>
        <!-- END HEADER MOBILE-->

       
				
			<!-- MAIN CONTENT-->
			<div class="main-content">
                <div class="section__content  px-3">
			


<!-- yield CONTENT-->

@yield('content')
        



<!--end yeild CONTENT-->

                </div>

            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
</x-app-layout>
