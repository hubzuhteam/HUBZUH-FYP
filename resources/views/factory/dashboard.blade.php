

{{-- Factory Dashboard  --}}
@section('content')
@extends('layouts.factoryLayout.factory_design')

    {{--  START OF SIDE BAR  --}}

    {{--  END OF SIDE BAR  --}}
    <main class="admin-main">
        <!--site header begins-->
        

        <!--site header End-->
        <!-- Modal -->
        
        <!--site header ends -->
        <section class="admin-content">
            <div class="container-fluid bg-dark m-b-30">
                <div class="row">

                    <div class="col-12 text-white p-t-40 p-b-90">

                        <h4 class="  "><span class="btn btn-white-translucent"><i
                                    class="mdi mdi-shape-circle-plus "></i></span> <span class="js-greeting"></span>,
                        John!</h4>
                        <p class="opacity-75 ">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad corporis dolores
                            <br> doloribus esse et iste laboriosam maiores maxime, mollitia nisi numquam omnis praesentium provident quam quasi quia quisquam recusandae vel.
                        </p>
                        <a href="#" class="btn btn-white-translucent">View Reports</a>

                    </div>
                </div>
            </div>
            <div class="container-fluid pull-up">
                <div class="row">
                    <div class="col m-b-30">
                        <div class="card ">
                            <div class="   text-center card-body">
                                <div class="text-success   ">
                                    <div class="avatar avatar-sm ">
                                        <span class="avatar-title rounded-circle badge-soft-success"><i
                                                class="mdi mdi-arrow-up-bold mdi-18px"></i> </span>

                                    </div>
                                    <h6 class="m-t-5 m-b-0"> 19%</h6>
                                </div>

                                <div class=" text-center">
                                    <h3>$199,580 </h3>
                                </div>
                                <div class="text-overline ">
                                    CURRENT FISCAL
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col m-b-30">
                        <div class="card ">
                            <div class="   text-center card-body">
                                <div class="text-danger   ">
                                    <div class="avatar avatar-sm ">
                                        <span class="avatar-title rounded-circle badge-soft-danger"><i
                                                class="mdi mdi-arrow-down-bold mdi-18px"></i> </span>
                                    </div>
                                    <h6 class="m-t-5 m-b-0"> 32%</h6>
                                </div>

                                <div class=" text-center">
                                    <h3>$65,055 </h3>
                                </div>
                                <div class="text-overline ">
                                    Returning AVG
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col m-b-30">
                        <div class="card ">
                            <div class="   text-center card-body">
                                <div class="text-warning   ">
                                    <div class="avatar avatar-sm ">
                                        <span class="avatar-title rounded-circle badge-soft-warning"><i
                                                class="mdi mdi-arrange-send-to-back mdi-18px"></i> </span>

                                    </div>
                                    <h6 class="m-t-5 m-b-0"> 74%</h6>
                                </div>

                                <div class=" text-center">
                                    <h3> 35 </h3>
                                </div>
                                <div class="text-overline ">
                                    on-going Projects
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col m-b-30">
                        <div class="card ">
                            <div class="   text-center card-body">
                                <div class="text-info   ">
                                    <div class="avatar avatar-sm ">
                                        <span class="avatar-title rounded-circle badge-soft-info"><i
                                                class="mdi mdi-account-convert mdi-18px"></i> </span>

                                    </div>
                                    <h6 class="m-t-5 m-b-0"> 36%</h6>
                                </div>

                                <div class=" text-center">
                                    <h3>$899,580 </h3>
                                </div>
                                <div class="text-overline ">
                                    Recurring bills
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col d-lg-block d-none m-b-30">
                        <div class="card ">
                            <div class="   text-center card-body">
                                <div class="text-danger   ">
                                    <div class="avatar avatar-sm ">
                                        <span class="avatar-title rounded-circle badge-soft-danger"><i
                                                class="mdi mdi-arrow-up-bold mdi-18px"></i> </span>

                                    </div>
                                    <h6 class="m-t-5 m-b-0"> 49%</h6>
                                </div>

                                <div class=" text-center">
                                    <h3>$19,124 </h3>
                                </div>
                                <div class="text-overline ">
                                    server cost
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col visible-xlg m-b-30">
                        <div class="card">
                            <div class="   text-center card-body">
                                <div class="text-success   ">
                                    <div class="avatar avatar-sm ">
                                        <span class="avatar-title rounded-circle badge-soft-success"><i
                                                class="mdi mdi-arrow-up-bold mdi-18px"></i> </span>

                                    </div>
                                    <h6 class="m-t-5 m-b-0"> 85%</h6>
                                </div>

                                <div class=" text-center">
                                    <h3>$82,580 </h3>
                                </div>
                                <div class="text-overline ">
                                    mobile ads
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </section>
    </main>

    <div class="modal modal-slide-left  fade" id="siteSearchModal" tabindex="-1" role="dialog" aria-labelledby="siteSearchModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body p-all-0" id="site-search">
                    <button type="button" class="close light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="form-dark bg-dark text-white p-t-60 p-b-20 bg-dots">
                        <h3 class="text-uppercase    text-center  fw-300 "> Search</h3>

                        <div class="container-fluid">
                            <div class="col-md-10 p-t-10 m-auto">
                                <input type="search" placeholder="Search Something" class=" search form-control form-control-lg">

                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="bg-dark text-muted container-fluid p-b-10 text-center text-overline">
                            results
                        </div>
                        <div class="list-group list  ">

                            <div class="list-group-item d-flex  align-items-center">
                                <div class="m-r-20">
                                    <div class="avatar avatar-sm "><img class="avatar-img rounded-circle" src="assets/img/users/user-3.jpg" alt="user-image"></div>
                                </div>
                                <div class="">
                                    <div class="name">Eric Chen</div>
                                    <div class="text-muted">Developer</div>
                                </div>

                            </div>
                            <div class="list-group-item d-flex  align-items-center">
                                <div class="m-r-20">
                                    <div class="avatar avatar-sm "><img class="avatar-img rounded-circle" src="assets/img/users/user-4.jpg" alt="user-image"></div>
                                </div>
                                <div class="">
                                    <div class="name">Sean Valdez</div>
                                    <div class="text-muted">Marketing</div>
                                </div>

                            </div>
                            <div class="list-group-item d-flex  align-items-center">
                                <div class="m-r-20">
                                    <div class="avatar avatar-sm "><img class="avatar-img rounded-circle" src="assets/img/users/user-8.jpg" alt="user-image"></div>
                                </div>
                                <div class="">
                                    <div class="name">Marie Arnold</div>
                                    <div class="text-muted">Developer</div>
                                </div>

                            </div>
                            <div class="list-group-item d-flex  align-items-center">
                                <div class="m-r-20">
                                    <div class="avatar avatar-sm ">
                                        <div class="avatar-title bg-dark rounded"><i class="mdi mdi-24px mdi-file-pdf"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="name">SRS Document</div>
                                    <div class="text-muted">25.5 Mb</div>
                                </div>

                            </div>
                            <div class="list-group-item d-flex  align-items-center">
                                <div class="m-r-20">
                                    <div class="avatar avatar-sm ">
                                        <div class="avatar-title bg-dark rounded"><i class="mdi mdi-24px mdi-file-document-box"></i></div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="name">Design Guide.pdf</div>
                                    <div class="text-muted">9 Mb</div>
                                </div>

                            </div>
                            <div class="list-group-item d-flex  align-items-center">
                                <div class="m-r-20">
                                    <div class="avatar avatar-sm ">
                                        <div class="avatar avatar-sm  ">
                                            <div class="avatar-title bg-primary rounded"><i class="mdi mdi-24px mdi-code-braces"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="name">response.json</div>
                                    <div class="text-muted">15 Kb</div>
                                </div>

                            </div>
                            <div class="list-group-item d-flex  align-items-center">
                                <div class="m-r-20">
                                    <div class="avatar avatar-sm ">
                                        <div class="avatar avatar-sm ">
                                            <div class="avatar-title bg-info rounded"><i class="mdi mdi-24px mdi-file-excel"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="name">June Accounts.xls</div>
                                    <div class="text-muted">6 Mb</div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
