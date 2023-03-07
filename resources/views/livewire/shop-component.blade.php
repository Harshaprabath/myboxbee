<title>Shop</title>
<div class="container">


	<nav class="breadcrumb" role="navigation" aria-label="breadcrumbs" style="background: none;">
		<a href="/" title="Home">Home</a>

		<span aria-hidden="true" style="width: 15px;margin: 2px 14px;">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
			</svg>
		</span>

		<span>Market Place</span>


	</nav>

</div>

<div class="collection">

	<div class="title">

		<div class="container">

			<div class="row">

				<div class="col">

					<div class="text-center">

						<h1 class="text-xl">

                        Market Place

						</h1>

					</div>

				</div>

			</div>

		</div>

	</div>


	<div class="refine">

		<style>
			.refine .dropdown-menu {

				max-height: 20rem;

				overflow-y: auto;

			}
		</style>
<div class="container px-2 px-lg-4">

<div class="row justify-content-end no-gutters">


    <div class="col-auto px-2">

        <div class="my-2">

            <div class="dropdown">

                <a class="text-muted d-block py-2" data-toggle="dropdown" href="#">

                    By Brand

                    <i class="fas fa-angle-down"></i>

                </a>

                <div class="dropdown-menu dropdown-menu-right">
                @foreach($brand as $br)
                    <a class="dropdown-item" href="{{route('shop',[$br->id])}}" title="Narrow selection to products matching tag 8-oak-lane">{{$br->name}}</a>
                @endforeach

                </div>

            </div>

        </div>

    </div>

    <div class="col-auto px-2">

        <div class="my-2">

            <div class="dropdown">

                <a class="text-muted d-block py-2" data-toggle="dropdown" href="#">

                    Occasion

                    <i class="fas fa-angle-down"></i>

                </a>

                <div class="dropdown-menu dropdown-menu-right">
                @foreach($ocassion as $oc)
                    <a class="dropdown-item" href="{{route('shop',[ $oc->id])}}" title="Narrow selection to products matching tag birthday">{{$oc->occasion}}</a>
                @endforeach
                          </div>

            </div>

        </div>

    </div>

    <div class="col-auto px-2">

        <div class="my-2">

            <div class="dropdown">

                <a class="text-muted d-block py-2" data-toggle="dropdown" href="#">

                    Product Type

                    <i class="fas fa-angle-down"></i>

                </a>

                <div class="dropdown-menu dropdown-menu-right">
                @foreach($category as $cat)
                    <a class="dropdown-item" href="/shop/{{$cat->id}}" title="Narrow selection to products matching tag home-fragrance">{{$cat->name}}</a>
                @endforeach
                </div>

            </div>

        </div>

    </div>

    <div class="col-auto px-2">

        <div class="my-2">

            <div class="dropdown">

                <a class="text-muted d-block py-2" data-toggle="dropdown" href="#">

                    Color

                    <i class="fas fa-angle-down"></i>

                </a>

                <div class="dropdown-menu dropdown-menu-right">
                @foreach($color as $col)
                    <a class="dropdown-item" href="/shop/{{$col->id}}" title="Narrow selection to products matching tag pink">{{$col->color}}</a>
                @endforeach


                </div>

            </div>

        </div>

    </div>

    <div class="col-auto px-2">

        <div class="text-muted py-3">

            |

        </div>

    </div>

    <div class="col-auto px-2">

        <div class="my-2">

            <div class="sort">

                <div class="dropdown">

                    <a class="text-muted d-block py-2" data-toggle="dropdown" href="#sort">

                        Sort :

                        <span class="text-body">

                            Featured

                        </span>

                        <i class="fas fa-angle-down"></i>

                    </a>

                    <div class="dropdown-menu dropdown-menu-right">

                        <a class="dropdown-item active" href="{{URL::current() }}">

                            Featured

                        </a>
                        <a class="dropdown-item " href="{{ URL::current().'?sort=price-ascending' }}">

                            Price: Low to High

                        </a>
                        <a class="dropdown-item " href="{{ URL::current().'?sort=price-descending' }} ">

                            Price: High to Low

                        </a>

                        <a class="dropdown-item " href="{{ URL::current().'?sort=title-ascending'}}">

                            A-Z

                        </a>
                        <a class="dropdown-item " href="{{ URL::current().'?sort=title-descending'}}">

                            Z-A

                        </a>
                        <a class="dropdown-item " href="{{ URL::current().'?sort=created-ascending'}}">

                            Oldest to Newest

                        </a>
                        <a class="dropdown-item " href="{{ URL::current().'?sort=created-descending'}}">

                            Newest to Oldest
                        </a>
                        <a class="dropdown-item " href="{{ URL::current().'?sort=best-selling'}}">

                            Best Selling

                        </a>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<div class="tags text-right mb-10">

@if($url == 'box')
    <span class="px-2 py-1 bg-gray-100 mr-2 text-xs"><a href="/shop/all" class="inline-flex items-center" title="Remove tag pink">All &nbsp;<span class="text-lg leading-tight">×</span></a></span>


    @else
    <span class="px-2 py-1 bg-gray-100 mr-2 text-xs"><a href="/shop/all" class="inline-flex items-center" title="Remove tag pink">All &nbsp;<span class="text-lg leading-tight">×</span></a></span>
@endif

</div>


	</div>




	<div class="products">

		<div class="container">

			<div class="row">

            @foreach($products as $product)

				<div class="col-6 col-lg-3">
					<div class="product">

						<div class="pb-4">

							<div class="image" data-transition="entrance" style="transform: none; transition: transform 1200ms cubic-bezier(0.2, 0.7, 0.5, 1) 0s;">

								<div class="mb-4">

									<a href="{{ route('product.details',['id'=> $product->id])}}" title="{{$product ->name}}">

										<div class="card border-0">

											<div class="card-img">

												<div class="bg-white">
													<div class="image">

														<div class="embed-responsive embed-responsive-1by1">

															<div class="embed-responsive-item text-center">

																<img class="w-100 lazyloaded" src="{{asset('upload')}}/{{$product ->pimage}}" alt="{{$product ->name}}" data-expand="-50">

																<noscript>

																	<img class="w-100" src="{{asset('upload')}}/{{$product ->pimage}}" alt="nest-wild-mint-eucalyptus-hand-sanitizer-travel">

																</noscript>

															</div>

														</div>

													</div>


												</div>

											</div>



											<div class="hover">

												<style>
													.hover {

														display: none;

													}

													.product:hover .hover {

														display: block;

													}
												</style>

												<div class="d-none d-lg-block">

													<div class="card-img-overlay p-0">



														<div class="image">


															<div class="embed-responsive embed-responsive-1by1">

																<div class="embed-responsive-item text-center">

																	<img class="w-100 lazyloaded" data-srcset="{{asset('upload')}}/{{$product ->pimage}}" src="{{asset('upload')}}/{{$product ->pimage}}" alt="{{$product ->name}}" data-expand="-50">

																	<noscript>

																		<img class="w-100" src="{{asset('upload')}}/{{$product ->pimage}}" alt="nest-wild-mint-eucalyptus-hand-sanitizer-travel">

																	</noscript>

																</div>

															</div>

														</div>


													</div>

												</div>

											</div>


										</div>

									</a>

								</div>

							</div>

							<a href="{{ route('product.details',['id'=> $product->id])}}" title="{{$product ->name}}">

								<div class="vendor" data-transition="entrance" style="transform: none; transition: transform 1200ms cubic-bezier(0.2, 0.7, 0.5, 1) 0s;">

									<div class="text-center">

										<h6 class="text-dark m-0">

										{{$product ->name}}

										</h6>

									</div>

								</div>

								<div class="title" data-transition="entrance" style="transform: none; transition: transform 1200ms cubic-bezier(0.2, 0.7, 0.5, 1) 0s;">

									<div class="text-center">

                                    {{$product ->short_description}}

									</div>

								</div>

							</a>

							<div class="price" data-transition="entrance" style="transform: none; transition: transform 1200ms cubic-bezier(0.2, 0.7, 0.5, 1) 0s;">

								<div class="text-center mb-2">
                                {{$product ->regular_price}}

								</div>

							</div>

							<div class="variants p-2 text-center" data-transition="entrance" style="transform: none; transition: transform 1200ms cubic-bezier(0.2, 0.7, 0.5, 1) 0s;">
								<div class="collection-product-swatches">




								</div>
							</div>

						</div>

					</div>


				</div>
            @endforeach


			</div>

		</div>

	</div>





	<div class="pagination">

		<div class="container">

			<div class="row">

				<div class="col">

					<div class="text-center mb-5">


					</div>

				</div>

			</div>

		</div>

	</div>






</div>
