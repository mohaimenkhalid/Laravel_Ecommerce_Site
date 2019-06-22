				@if (session('message'))
                        <div class="alert alert-success" role="alert">
                        	 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ session('message') }}
                        </div>
                    @endif


                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                        	 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ session('error') }}
                        </div>
                    @endif