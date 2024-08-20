<aside class="app-sidebar sticky" id="sidebar">
    <div class="main-sidebar-header">
        <a href="{{ url('/') }}" class="header-logo">
            <img src="{{ asset('admin/assets/images/brand-logos/desktop-logo.png') }}" alt="logo" class="desktop-logo">
        </a>
    </div>
    <div class="main-sidebar" id="sidebar-scroll">
                <nav class="main-menu-container nav nav-pills flex-column sub-open">
                    <ul class="main-menu">
                        <li class="slide__category"><span class="category-name">Main</span></li>
                        <li class="slide has-sub">
                            <a href="{{ route('home') }}" class="side-menu__item">
                                <i class="bx bx-home side-menu__icon"></i>
                                <span class="side-menu__label">Dashboard</span>
                            </a>
                            <ul class="slide-menu child1">
                            </ul>
                        </li>
                        <li class="slide__category"><span class="category-name">Company</span></li>
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bx bx-file-blank side-menu__icon"></i>
                                <span class="side-menu__label">Companies</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                               <li class="slide">
                                    <a href="{{ route('companies.index') }}" class="side-menu__item">Company List</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ route('companies.create') }}" class="side-menu__item">Add Company</a>
                                </li>
                         </ul>
                         <li class="slide__category"><span class="category-name">Customers</span></li>
                         <li class="slide has-sub">
                             <a href="javascript:void(0);" class="side-menu__item">
                                 <i class="bi bi-people side-menu__icon"></i>
                                 <span class="side-menu__label">Customers</span>
                                 <i class="fe fe-chevron-right side-menu__angle"></i>
                             </a>
                             <ul class="slide-menu child1">
                                 <li class="slide">
                                     <a href="{{ route('customers.create') }}" class="side-menu__item">Add Customers</a>
                                 </li>
                                 <li class="slide">
                                    <a href="{{ route('customers.index') }}" class="side-menu__item">Customers List</a>
                                </li>
                            </ul>
                         <li class="slide__category"><span class="category-name">Inventory</span></li>
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bi bi-basket side-menu__icon"></i>
                                <span class="side-menu__label">Inventory</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide">
                                    <a href="{{ route('units.index') }}" class="side-menu__item">UOM</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ route('category.index') }}" class="side-menu__item">Category</a>
                                </li>
                                <li class="slide has-sub">
                                    <a href="#" class="side-menu__item">Products
                                        <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                    <ul class="slide-menu child2">
                                        <li class="slide">
                                            <a href="{{ route('products.create') }}" class="side-menu__item">Add Product</a>
                                        </li>
                                        <li class="slide">
                                            <a href="{{ route('products.index') }}" class="side-menu__item">Product List</a>
                                        </li>
                                        <li class="slide">
                                            <a href="{{ route('products.import') }}" class="side-menu__item">Product Import</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="slide has-sub">
                                    <a href="#" class="side-menu__item">Supplier
                                        <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                    <ul class="slide-menu child2">
                                        <li class="slide">
                                            <a href="{{ route('supplier.create') }}" class="side-menu__item">Add Supplier</a>
                                        </li>
                                        <li class="slide">
                                            <a href="{{ route('supplier.index') }}" class="side-menu__item">Supplier List</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="slide has-sub">
                                    <a href="#" class="side-menu__item">Warehouses
                                        <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                    <ul class="slide-menu child2">
                                        <li class="slide">
                                            <a href="{{ route('warehouse.create') }}" class="side-menu__item">Add Warehouses</a>
                                        </li>
                                        <li class="slide">
                                            <a href="{{ route('warehouse.index') }}" class="side-menu__item">Warehouses List</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="slide has-sub">
                                    <a href="#" class="side-menu__item">Purchases
                                        <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                    <ul class="slide-menu child2">
                                        <li class="slide">
                                            <a href="{{ route('purchases.create') }}" class="side-menu__item">Add Purchase</a>
                                        </li>
                                        <li class="slide">
                                            <a href="{{ route('purchases.index') }}" class="side-menu__item">Purchase List</a>
                                        </li>
                                        <li class="slide">
                                            <a href="#" class="side-menu__item">Return Purchase</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="slide has-sub">
                                    <a href="#" class="side-menu__item">Stock
                                        <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                    <ul class="slide-menu child2">
                                        <li class="slide">
                                            <a href="#" class="side-menu__item">Stock Status</a>
                                        </li>
                                        <li class="slide">
                                            <a href="#" class="side-menu__item">Expire Stock</a>
                                        </li>
                                        <li class="slide">
                                            <a href="#" class="side-menu__item">Add Transfer</a>
                                        </li>
                                        <li class="slide">
                                            <a href="#" class="side-menu__item">Transfer List</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="slide has-sub">
                                    <a href="#" class="side-menu__item">Sales
                                        <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                    <ul class="slide-menu child2">
                                        <li class="slide">
                                            <a href="#" class="side-menu__item">New Sale</a>
                                        </li>
                                        <li class="slide">
                                            <a href="#" class="side-menu__item">Sales List</a>
                                        </li>
                                        <li class="slide">
                                            <a href="#" class="side-menu__item">Return Sale</a>
                                        </li>
                                        <li class="slide">
                                            <a href="#" class="side-menu__item">Delivery Note</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="slide has-sub">
                                    <a href="#" class="side-menu__item">Pre Order
                                        <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                    <ul class="slide-menu child2">
                                        <li class="slide">
                                            <a href="#" class="side-menu__item">New Order</a>
                                        </li>
                                        <li class="slide">
                                            <a href="#" class="side-menu__item">Order List</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="slide">
                                    <a href="#" class="side-menu__item">Print Labels</a>
                                </li>
                             </ul>
                                <li class="slide__category"><span class="category-name">AREA Section</span></li>
                                     <li class="slide has-sub">
                                      <a href="javascript:void(0);" class="side-menu__item">
                                        <i class="bi bi-arrows-move side-menu__icon"></i>
                                        <span class="side-menu__label">Route Manage</span>
                                        <i class="fe fe-chevron-right side-menu__angle"></i>
                                    </a>
                                    <ul class="slide-menu child1">
                                        <li class="slide">
                                            <a href="{{ route('city.index') }}" class="side-menu__item">City</a>
                                        </li>
                                        <li class="slide">
                                            <a href="{{ route('area.index') }}" class="side-menu__item">Area</a>
                                        </li>
                                        <li class="slide">
                                            <a href="{{ route('subarea.index') }}" class="side-menu__item">Sub Area</a>
                                        </li>
                                    </ul> 
                                    <li class="slide__category"><span class="category-name">Staff Section</span></li>
                                    <li class="slide has-sub">
                                     <a href="javascript:void(0);" class="side-menu__item">
                                       <i class="bi bi-person-badge side-menu__icon"></i>
                                       <span class="side-menu__label">Employees</span>
                                       <i class="fe fe-chevron-right side-menu__angle"></i>
                                   </a>
                                   <ul class="slide-menu child1">
                                    <li class="slide">
                                        <a href="#" class="side-menu__item">Add Employee</a>
                                    </li>
                                    <li class="slide">
                                     <a href="#" class="side-menu__item">Employee List</a>
                                    </li>   
                                    <li class="slide">
                                           <a href="#" class="side-menu__item">Department</a>
                                       </li>
                                       <li class="slide">
                                           <a href="#" class="side-menu__item">Designation</a>
                                       </li>
                                   </ul>
                                   <li class="slide__category"><span class="category-name">Financial</span></li>
                                   <li class="slide has-sub">
                                    <a href="javascript:void(0);" class="side-menu__item">
                                      <i class="bi bi-journal side-menu__icon"></i>
                                      <span class="side-menu__label">Accounts</span>
                                      <i class="fe fe-chevron-right side-menu__angle"></i>
                                  </a>
                                  <ul class="slide-menu child1">
                                   <li class="slide">
                                       <a href="#" class="side-menu__item">Accounts</a>
                                   </li>
                                   <li class="slide">
                                    <a href="#" class="side-menu__item">Sales Invoices</a>
                                   </li>   
                                   <li class="slide">
                                    <a href="#" class="side-menu__item">Purchase Invoices</a>
                                   </li> 
                                   <li class="slide">
                                    <a href="#" class="side-menu__item">Add Income</a>
                                   </li> 
                                   <li class="slide">
                                    <a href="#" class="side-menu__item">Add Expense</a>
                                   </li>
                                   <li class="slide">
                                    <a href="#" class="side-menu__item">Transaction List</a>
                                   </li>      
                                   <li class="slide">
                                          <a href="#" class="side-menu__item">Voucher Heads</a>
                                      </li>
                                      <li class="slide">
                                          <a href="#" class="side-menu__item">Account Types</a>
                                      </li>
                                  </ul>
                                  <li class="slide__category"><span class="category-name">Reports Section</span></li>
                                  <li class="slide has-sub">
                                   <a href="javascript:void(0);" class="side-menu__item">
                                     <i class="bi bi-card-checklist side-menu__icon"></i>
                                     <span class="side-menu__label">Reports</span>
                                     <i class="fe fe-chevron-right side-menu__angle"></i>
                                 </a>
                                 <ul class="slide-menu child1">
                                    <li class="slide has-sub">
                                        <a href="#" class="side-menu__item">Customer Reports
                                            <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                        <ul class="slide-menu child2">
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">License Status</a>
                                            </li>
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Defaulter Report</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="slide has-sub">
                                        <a href="#" class="side-menu__item">Sales Reports
                                            <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                        <ul class="slide-menu child2">
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Sales Summary</a>
                                            </li>
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Sale by Item</a>
                                            </li>
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Sale by Customer</a>
                                            </li>
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Sale by Area</a>
                                            </li>
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Sale by Salesman</a>
                                            </li>
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Returns Report</a>
                                            </li>
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Pending For DC</a>
                                            </li>
                                        </ul>
                                    </li>  
                                    <li class="slide has-sub">
                                        <a href="#" class="side-menu__item">Purchase Reports
                                            <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                        <ul class="slide-menu child2">
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Purchase Summary</a>
                                            </li>
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Purchase by Item</a>
                                            </li>
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Purchase by Supplier</a>
                                            </li>
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Purchase by Vendor</a>
                                            </li>
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Returns Report</a>
                                            </li>
                                        </ul>
                                    </li> 
                                    <li class="slide has-sub">
                                        <a href="#" class="side-menu__item">Inventory Reports
                                            <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                        <ul class="slide-menu child2">
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Stock Report</a>
                                            </li>
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Purchase Report</a>
                                            </li>
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Stock Valuation Report</a>
                                            </li>
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Expire Stock Report</a>
                                            </li>
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Transfer Reports</a>
                                            </li>
                                        </ul>
                                    </li> 
                                    <li class="slide has-sub">
                                        <a href="#" class="side-menu__item">Accounts Reports
                                            <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                        <ul class="slide-menu child2">
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Account Statment</a>
                                            </li>
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Income Report</a>
                                            </li>
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Expense Report</a>
                                            </li>
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Transactions Report</a>
                                            </li>
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Balance Sheet</a>
                                            </li>
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Profit Forcasting</a>
                                            </li>
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Payable Report</a>
                                            </li>
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Receivable Report</a>
                                            </li>
                                        </ul>
                                    </li> 
                                 </ul>
                                  <li class="slide__category"><span class="category-name">Setting</span></li>
                                    <li class="slide has-sub">
                                     <a href="javascript:void(0);" class="side-menu__item">
                                       <i class="bi bi-gear-wide-connected side-menu__icon"></i>
                                       <span class="side-menu__label">General Setting</span>
                                       <i class="fe fe-chevron-right side-menu__angle"></i>
                                   </a>
                                   <ul class="slide-menu child1">
                                    <li class="slide">
                                        <a href="#" class="side-menu__item">System Setup</a>
                                    </li>
                                    <li class="slide">
                                     <a href="#" class="side-menu__item">Email Setup</a>
                                    </li>   
                                    <li class="slide">
                                           <a href="#" class="side-menu__item">Roles</a>
                                       </li>
                                       <li class="slide">
                                           <a href="#" class="side-menu__item">Permissions</a>
                                       </li>
                                   </ul>
                            </nav>
                        </div>
                    </aside>