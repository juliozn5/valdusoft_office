@extends('layouts.app')

@push('body-atribute')
class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
@endpush

@section('content')

@include('layouts.partials.navbar')

@include('layouts.partials.sidebar')

<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">List View</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Data List</a>
                                    </li>
                                    <li class="breadcrumb-item active">List View
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle waves-effect waves-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Data list view starts -->
                <section id="data-list-view" class="data-list-view-header">
                    <div class="action-btns d-none">
                        <div class="btn-dropdown mr-1 mb-1">
                            
                        </div>
                    </div>

                    <!-- DataTable starts -->
                    <div class="table-responsive">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="top"><div class="actions action-btns"><div class="btn-group dropdown actions-dropodown">
                                <button type="button" class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Actions
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#"><i class="feather icon-trash"></i>Delete</a>
                                    <a class="dropdown-item" href="#"><i class="feather icon-archive"></i>Archive</a>
                                    <a class="dropdown-item" href="#"><i class="feather icon-file"></i>Print</a>
                                    <a class="dropdown-item" href="#"><i class="feather icon-save"></i>Another Action</a>
                                </div>
                            </div><div class="dt-buttons btn-group"><button class="btn btn-outline-primary" tabindex="0" aria-controls="DataTables_Table_0"><span><i class="feather icon-plus"></i> Add New</span></button> </div></div><div class="action-filters"><div class="dataTables_length" id="DataTables_Table_0_length"><label><select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="custom-select custom-select-sm form-control form-control-sm"><option value="4">4</option><option value="10">10</option><option value="15">15</option><option value="20">20</option></select></label></div><div id="DataTables_Table_0_filter" class="dataTables_filter"><label><input type="search" class="form-control form-control-sm" placeholder="" aria-controls="DataTables_Table_0"></label></div></div></div><div class="clear"></div><table class="table data-list-view dataTable no-footer dt-checkboxes-select" id="DataTables_Table_0" role="grid">
                            <thead>
                                <tr role="row"><th class="dt-checkboxes-cell dt-checkboxes-select-all sorting_disabled" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 33px;" data-col="0" aria-label=""><input type="checkbox"></th><th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="NAME: activate to sort column descending" style="width: 362.016px;">NAME</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CATEGORY: activate to sort column ascending" style="width: 93.0156px;">CATEGORY</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="POPULARITY: activate to sort column ascending" style="width: 82.0156px;">POPULARITY</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="ORDER STATUS: activate to sort column ascending" style="width: 88.0156px;">ORDER STATUS</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="PRICE: activate to sort column ascending" style="width: 68.0156px;">PRICE</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="ACTION: activate to sort column ascending" style="width: 49.0156px;">ACTION</th></tr>
                            </thead>
                            <tbody>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                            <tr role="row" class="odd">
                                    <td class="dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes"></td>
                                    <td class="product-name sorting_1">Altec Lansing - Bluetooth Speaker</td>
                                    <td class="product-category">Audio</td>
                                    <td>
                                        <div class="progress progress-bar-warning">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:57%"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="chip chip-danger">
                                            <div class="chip-body">
                                                <div class="chip-text">canceled</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-price">$199.99</td>
                                    <td class="product-action">
                                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                                    </td>
                                </tr><tr role="row" class="even" style="display: none;">
                                    <td class="dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes"></td>
                                    <td class="product-name sorting_1">Altec Lansing - Mini H2O Bluetooth Speaker</td>
                                    <td class="product-category">Fitness</td>
                                    <td>
                                        <div class="progress progress-bar-success">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:87%"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="chip chip-success">
                                            <div class="chip-body">
                                                <div class="chip-text">delivered</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-price">$199.99</td>
                                    <td class="product-action">
                                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                                    </td>
                                </tr><tr role="row" class="odd">
                                    <td class="dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes"></td>
                                    <td class="product-name sorting_1">Aluratek - Bluetooth Audio Receiver</td>
                                    <td class="product-category">Computers</td>
                                    <td>
                                        <div class="progress progress-bar-warning">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:65%"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="chip chip-warning">
                                            <div class="chip-body">
                                                <div class="chip-text">on hold</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-price">$29.99</td>
                                    <td class="product-action">
                                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                                    </td>
                                </tr><tr role="row" class="even">
                                    <td class="dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes"></td>
                                    <td class="product-name sorting_1">Aluratek - Bluetooth Audio Transmitter</td>
                                    <td class="product-category">Audio</td>
                                    <td>
                                        <div class="progress progress-bar-warning">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:87%"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="chip chip-danger">
                                            <div class="chip-body">
                                                <div class="chip-text">canceled</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-price">$199.99</td>
                                    <td class="product-action">
                                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                                    </td>
                                </tr></tbody>
                        </table><div class="bottom"><div class="actions"></div><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div>
                    </div>
                    <!-- DataTable ends -->

                    <!-- add new sidebar starts -->
                    <div class="add-new-data-sidebar">
                        <div class="overlay-bg"></div>
                        <div class="add-new-data">
                            <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                                <div>
                                    <h4 class="text-uppercase">List View Data</h4>
                                </div>
                                <div class="hide-data-sidebar">
                                    <i class="feather icon-x"></i>
                                </div>
                            </div>
                            <div class="data-items pb-3 ps ps--active-y">
                                <div class="data-fields px-2 mt-3">
                                    <div class="row">
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-name">Name</label>
                                            <input type="text" class="form-control" id="data-name">
                                        </div>
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-category"> Category </label>
                                            <select class="form-control" id="data-category">
                                                <option>Audio</option>
                                                <option>Computers</option>
                                                <option>Fitness</option>
                                                <option>Appliance</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-status">Order Status</label>
                                            <select class="form-control" id="data-status">
                                                <option>Pending</option>
                                                <option>Canceled</option>
                                                <option>Delivered</option>
                                                <option>On Hold</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-price">Price</label>
                                            <input type="text" class="form-control" id="data-price">
                                        </div>
                                        <div class="col-sm-12 data-field-col data-list-upload">
                                            <form action="#" class="dropzone dropzone-area dz-clickable" id="dataListUpload">
                                                <div class="dz-message">Upload Image</div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 555px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 503px;"></div></div></div>
                            <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                <div class="add-data-btn">
                                    <button class="btn btn-primary waves-effect waves-light">Add Data</button>
                                </div>
                                <div class="cancel-data-btn">
                                    <button class="btn btn-outline-danger waves-effect waves-light">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- add new sidebar ends -->
                </section>
                <!-- Data list view end -->

            </div>
        </div>
    </div>

        <!-- END: Content-->

        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>

        <!-- BEGIN: Footer-->
        <footer class="footer footer-static footer-dark">
            <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a class="text-bold-800 grey darken-2" href="https://valdusoft.com" target="_blank">Valdusoft,</a>All rights Reserved</span>
                <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
            </p>
        </footer>
        <!-- END: Footer-->
@endsection