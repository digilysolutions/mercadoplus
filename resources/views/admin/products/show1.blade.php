@extends('layouts.app-admin')
@section('content-admin')
    <div class="card card-block card-stretch card-height">
        <div class="card-header d-flex align-items-center justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Top Products</h4>
            </div>
            <div class="card-header-toolbar d-flex align-items-center">
                <div class="dropdown">
                    <span class="dropdown-toggle dropdown-bg btn" id="dropdownMenuButton006"
                        data-toggle="dropdown">
                        This Month<i class="ri-arrow-down-s-line ml-1"></i>
                    </span>
                    <div class="dropdown-menu dropdown-menu-right shadow-none"
                        aria-labelledby="dropdownMenuButton006">
                        <a class="dropdown-item" href="#">Year</a>
                        <a class="dropdown-item" href="#">Month</a>
                        <a class="dropdown-item" href="#">Week</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <ul class="list-unstyled row top-product mb-0">
                <li class="col-lg-3">
                    <div class="card card-block card-stretch card-height mb-0">
                        <div class="card-body">
                            <div class="bg-warning-light rounded">
                                <img src="../assets/images/product/01.png" class="style-img img-fluid m-auto p-3" alt="image">
                            </div>
                            <div class="style-text text-left mt-3">
                                <h5 class="mb-1">Organic Cream</h5>
                                <p class="mb-0">789 Item</p>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="col-lg-3">
                    <div class="card card-block card-stretch card-height mb-0">
                        <div class="card-body">
                            <div class="bg-danger-light rounded">
                                <img src="../assets/images/product/02.png" class="style-img img-fluid m-auto p-3" alt="image">
                            </div>
                            <div class="style-text text-left mt-3">
                                <h5 class="mb-1">Rain Umbrella</h5>
                                <p class="mb-0">657 Item</p>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="col-lg-3">
                    <div class="card card-block card-stretch card-height mb-0">
                        <div class="card-body">
                            <div class="bg-info-light rounded">
                                <img src="../assets/images/product/03.png" class="style-img img-fluid m-auto p-3" alt="image">
                            </div>
                            <div class="style-text text-left mt-3">
                                <h5 class="mb-1">Serum Bottle</h5>
                                <p class="mb-0">489 Item</p>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="col-lg-3">
                    <div class="card card-block card-stretch card-height mb-0">
                        <div class="card-body">
                            <div class="bg-success-light rounded">
                                <img src="../assets/images/product/02.png" class="style-img img-fluid m-auto p-3" alt="image">
                            </div>
                            <div class="style-text text-left mt-3">
                                <h5 class="mb-1">Organic Cream</h5>
                                <p class="mb-0">468 Item</p>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
  @endsection