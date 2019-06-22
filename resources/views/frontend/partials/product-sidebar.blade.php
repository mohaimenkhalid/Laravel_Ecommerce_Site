

		<div class="list-group ml-3">

			<a  style="background-color: #44b5ae; color:white;" class="list-group-item list-group-item-action ">
				  	<h5 >Category</h5>
				  </a>

			@foreach(App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)

				 <!-- Collapse  main category -->
				  <a href="#main-{{ $parent->id }}" class="list-group-item list-group-item-action" data-toggle ="collapse">
				  	 <img src="{{ asset('images/categories/'. $parent->image ) }}" width="40"  height="40">
				  	{{ $parent->name }} 
				  </a>

				  <!-- sub category -->
					  <div class="collapse ml-4 

					  @if (Route::is('categories.show'))
						  		@if (App\Models\Category::parentorNotCategory($parent->id, $category->id))
						  			show
						  		@endif
						  	@endif


					  " id="main-{{ $parent->id }}" >

						  @foreach(App\Models\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child)
						  <a href="{{ route('categories.show', $child->id) }}" class="list-group-item list-group-item-action

						  	@if (Route::is('categories.show'))
						  		@if ($child->id == $category->id)
						  			active
						  		@endif
						  	@endif
						  	" style="background-color: #44b5ae; border-color: #44b5ae;" >
							  <img src="{{ asset('images/categories/'. $child->image ) }}" width="20" height="20">
							  	{{ $child->name }}
						 </a>
						  @endforeach
					  </div>


			@endforeach
				</div>
