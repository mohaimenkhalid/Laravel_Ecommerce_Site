
			<!-- Start Navbar -->

				<nav class="navbar navbar-expand-lg navbar-light  nav-block nav-bg-color ">

			<div class="container-fluid">

				  <a class="navbar-brand" href="{{ route('index')  }}">Ecommerce Shop</a>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
				  </button>

				  <div class="collapse navbar-collapse" id="navbarSupportedContent">
				    <ul class="navbar-nav mr-auto mt-2">
				      <li class="nav-item {{ Route::is('index') ? 'active' : '' }}">
				        <a class="nav-link ml-5" href="{{ route('index')  }}"><b>Home</b> <span class="sr-only">(current)</span></a>
				      </li>
				     
				     <!-- <li class="nav-item dropdown">
				        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				          Dropdown
				        </a>
				        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
				          <a class="dropdown-item" href="#">Action</a>
				          <a class="dropdown-item" href="#">Another action</a>
				          <div class="dropdown-divider"></div>
				          <a class="dropdown-item" href="#">Something else here</a>
				        </div>
				      </li>

				  -->
				      <li class="nav-item {{ Route::is('products') ? 'active' : '' }}">
				        <a class="nav-link " href="{{ route('products')  }}"><b>Products</b></a>
				      </li> 

				      <li class="nav-item {{ Route::is('contact') ? 'active' : '' }}">
				        <a class="nav-link " href="{{ route('products')  }}"><b>Contact Us</b></a>
				      </li> 

				      <li class="nav-item ml-5">
				        <form class="form-inline my-2 my-lg-0" action="{{ route('search') }}" method="get">
				     		<div class="input-group mb-3">
								  <input size="60" type="text" class="form-control pt-1 pb-1" name="search" placeholder="Search Product . . ." aria-label="Recipient's username" aria-describedby="basic-addon2">
								  
							</div>
				    </form>
				      </li>
				    </ul>

				     <ul class="navbar-nav ml-auto">

			     	 	<li class="nav-item ">
                                <a class="nav-link btn-cart-nav" href="{{ route('carts') }}">

                                	<p class="btn btn-warning " style=" border-radius: 1.50rem;"><i class="fas fa-question-circle"></i></i>  Need Help

                                	</p>
                                </a>
                           </li>


                           <li class="nav-item">
                                <a class="nav-link btn-cart-nav" href="{{ route('carts') }}">

                                	<p class="btn btn-warning" style=" border-radius: 1.50rem;"><i  class="fas fa-shopping-cart"></i> <strong> Cart </strong>

                                		 <span id="totalItems" class="badge badge-danger" style=" border-radius: 1.25rem;">
                                		
                                		{{ App\Models\Cart::totalItems() }}
                                	</span>

                                	</p>
                                </a>
                           </li>
				     	
				     	@guest
                            <li class="nav-item">
                                <a class="nav-link btn-cart-nav" href="{{ route('login') }}">

                               <p class="btn btn-warning" style=" border-radius: 1.50rem;"><i class="fas fa-user-tie"></i>  {{ __('Sign In') }}
                               </p>

                               </a>
                            </li>
                            @if (Route::has('register'))
                               <!--  <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li> -->
                            @endif
                        @else

                         <li class="nav-item">
                         	


                         </li>


                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                	
                                   <img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" class="img rounded-circle" style="width: 42px;" > 
                                     <span class="caret"></span>
                                </a>

                                <div style="min-width: 20rem;" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                	<div class="row ml-1 mr-1" style="padding: 7px; background-color: #EEEEEE;" >
                                		<div class="col-md-3">
                                			<img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" class="img rounded-circle" style="width: 50px;" >
                                		</div>
                                		<div class="col-md-9 ">
                                			<b>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</b> <br>
                                			{{ Auth::user()->email }}
                                		</div>
                                	</div>
                                	
                                	<hr>

                                	<a class="dropdown-item" href="{{ route('user.dashboard') }}"><i class="fas fa-chart-line"></i> {{ __('My Dashboard') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fas fa-sign-out-alt"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>


                            </li>
                        @endguest
				     </ul>

				    

				  </div>
			</div>
				</nav>


			<!-- End Navbar -->
