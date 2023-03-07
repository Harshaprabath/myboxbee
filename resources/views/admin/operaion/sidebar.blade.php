<?php

use App\Models\slider;

$logo = slider::where('type', '=', 'logo')->get();
?>
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
        <div class="sidebar-brand-icon">
            @if($logo->isEmpty())
            <p>Logo</p>
            @else
            <img src="{{asset('upload/frontend')}}/{{$logo[0]->image}}" alt="">
            @endif
        </div>
        <!-- <div class="sidebar-brand-text mx-3">RuangAdmin</div> -->
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="/admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap" aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Product Master</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Product</h6>
                <a class="collapse-item" href="/admin/addproduct">Add Product</a>
                <a class="collapse-item" href="/admin/product">Product</a>

            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true" aria-controls="collapseForm">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Category Master</span>
        </a>
        <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"> Category</h6>
                <a class="collapse-item" href="/admin/category-add"> Add Category / Brand</a>
                <a class="collapse-item" href="/admin/category">Category</a>
                <a class="collapse-item" href="/admin/subcategory">Sub Category</a>
                <a class="collapse-item" href="/admin/seconsub">Second Sub</a>
                <a class="collapse-item" href="/admin/brand">Brand</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true" aria-controls="collapseTable">
            <i class="fas fa-fw fa-box"></i>
            <span>Box</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Box</h6>
                <a class="collapse-item" href="/admin/boxcreate">Create Box</a>
                <a class="collapse-item" href="/admin/box">Box</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable1" aria-expanded="true" aria-controls="collapseTable1">
            <i class="fas fa-fw fa-id-card-alt"></i>
            <span>Card</span>
        </a>
        <div id="collapseTable1" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Card</h6>
                <a class="collapse-item" href="/admin/cardcreate">Create Card</a>
                <a class="collapse-item" href="/admin/card">Card</a>
                <a class="collapse-item" href="/admin/category-cards">Category Card</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable2" aria-expanded="true" aria-controls="collapseTable2">
            <i class="fas fa-fw fa-sticky-note"></i>
            <span>Sticker</span>
        </a>
        <div id="collapseTable2" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Sticker</h6>
                <a class="collapse-item" href="/admin/stickercreate">Create Sticker</a>
                <a class="collapse-item" href="/admin/sticker">Sticker</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable6" aria-expanded="true" aria-controls="collapseTable2">
            <i class="fas fa-fw fa-shipping-fast"></i>
            <span>Ready to ship</span>
        </a>
        <div id="collapseTable6" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Ready to ship</h6>
                <a class="collapse-item" href="/admin/addready-to-ship">Add Ready to ship</a>
                <a class="collapse-item" href="/admin/addready-to-ship/box"> Ready to ship box</a>
                <a class="collapse-item" href="/admin/ready-to-ship">List Ready to ship</a>
                <a class="collapse-item" href="/admin/ready-to-ship-box">List Ready to ship box</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable9" aria-expanded="true" aria-controls="collapseTable2">
            <i class="fas fa-fw fa-gifts"></i>
            <span>Gift Vouchr</span>
        </a>
        <div id="collapseTable9" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gift Vouchr</h6>
                <a class="collapse-item" href="/admin/gift-voucher">Gift Voucher</a>
                <a class="collapse-item" href="/admin/gift-voucher-price">Gift Voucher Price</a>
                <a class="collapse-item" href="/admin/gift-voucherprice-list">List Gift Voucher Price</a>
                <a class="collapse-item" href="/admin/gift-voucher-list">List Gift Voucher</a>

            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable12" aria-expanded="true" aria-controls="collapseTable2">
            <i class="fas fa-fw fa-gifts"></i>
            <span>Orders</span>
        </a>
        <div id="collapseTable12" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Orders</h6>
                <a class="collapse-item" href="/admin/orders">Orders</a>
                <a class="collapse-item" href="/admin/coparte-orders">Coparete Orders</a>

            </div>
        </div>
    </li>
    <hr class="sidebar-divider">



    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable8" aria-expanded="true" aria-controls="collapseTable2">
            <i class="fas fa-fw fa-quidditch"></i>
            <span>Frontend</span>
        </a>
        <div id="collapseTable8" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Frontend</h6>
                <a class="collapse-item" href="/admin/add-home">Home slider</a>
                <a class="collapse-item" href="/admin/add-home-middle">Home middle image</a>
                <a class="collapse-item" href="/admin/add-fetuers">Fetuers Section</a>
                <a class="collapse-item" href="/admin/partner">Partner Section</a>
                <a class="collapse-item" href="/admin/coparate">Coparete Gifting</a>
                <a class="collapse-item" href="/admin/about">About Us</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable10" aria-expanded="true" aria-controls="collapseTable2">
            <i class="fas fa-fw fa-user"></i>
            <span>Users</span>
        </a>
        <div id="collapseTable10" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Users</h6>
                <a class="collapse-item" href="/admin/users">All User</a>

            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable11" aria-expanded="true" aria-controls="collapseTable2">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Genaral Setting</span>
        </a>
        <div id="collapseTable11" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Genaral Setting</h6>
                <a class="collapse-item" href="/admin/generlseting">Genaral Setting</a>

            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable15" aria-expanded="true" aria-controls="collapseTable2">
            <i class="fas fa-fw fa-book"></i>
            <span>Reports</span>
        </a>
        <div id="collapseTable15" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Reports</h6>
                <a class="collapse-item" href="/admin/completeorder">Complete order reports</a>
                <a class="collapse-item" href="/admin/cancelorder">Cancel order reports</a>
            </div>
        </div>
    </li>

</ul>
