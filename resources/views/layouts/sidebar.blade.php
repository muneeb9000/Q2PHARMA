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
                          {{-- SETUP CODING MENU --}}

                                    <li class="slide__category"><span class="category-name">Coding</span></li>
                                    <li class="slide has-sub">
                                     <a href="javascript:void(0);" class="side-menu__item">
                                       <i class="bi bi-gear-wide-connected side-menu__icon"></i>
                                       <span class="side-menu__label">Coding</span>
                                       <i class="fe fe-chevron-right side-menu__angle"></i>
                                   </a>
                                   <ul class="slide-menu child1">
                                    <li class="slide">
                                        <a href="#" class="side-menu__item">Company/Branch Coding</a>
                                    </li>
                                    <li class="slide">
                                     <a href="#" class="side-menu__item">Account Coding</a>
                                    </li>   
                                    <li class="slide">
                                           <a href="#" class="side-menu__item">UOM Coding</a>
                                       </li>
                                       <li class="slide">
                                           <a href="#" class="side-menu__item">Product Group</a>
                                       </li>
                                        <li class="slide">
                                           <a href="#" class="side-menu__item">Product Coding</a>
                                       </li>
                                        <li class="slide">
                                           <a href="#" class="side-menu__item">Product Opening Balance</a>
                                       </li>
                                       <li class="slide">
                                           <a href="#" class="side-menu__item">Route/City Coding</a>
                                       </li>
                                       <li class="slide">
                                           <a href="#" class="side-menu__item">Town/Area Coding</a>
                                       </li>
                                       <li class="slide">
                                           <a href="#" class="side-menu__item">Brick/Sub-Area Coding</a>
                                       </li>
                                       <li class="slide">
                                           <a href="#" class="side-menu__item">Vendor Coding</a>
                                       </li>
                                       <li class="slide">
                                           <a href="#" class="side-menu__item">Customer Coding</a>
                                       </li>
                                       <li class="slide">
                                           <a href="#" class="side-menu__item">Salesman Coding</a>
                                       </li>
                                       <li class="slide">
                                           <a href="#" class="side-menu__item">Sales Rep Coding</a>
                                       </li>
                                        <li class="slide">
                                           <a href="#" class="side-menu__item">Warehouse Coding</a>
                                       </li>
                                    </ul>
                                  <li class="slide__category"><span class="category-name">Invoices</span></li>
                                  <li class="slide has-sub">
                                   <a href="javascript:void(0);" class="side-menu__item">
                                     <i class="bi bi-journal side-menu__icon"></i>
                                     <span class="side-menu__label">Invoices</span>
                                     <i class="fe fe-chevron-right side-menu__angle"></i>
                                 </a>
                                 <ul class="slide-menu child1">
                                    <li class="slide has-sub">
                                        <a href="#" class="side-menu__item">Sales Invoicing
                                            <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                        <ul class="slide-menu child2">
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Auto/Manual Sales</a>
                                            </li>
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Sale Return</a>
                                            </li>
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Sale Receipts</a>
                                            </li>
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Sale Summary</a>
                                            </li>
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Fabric Invoicing</a>
                                            </li>
                                        </ul>
                                        <a href="#" class="side-menu__item">Purchase 
                                            <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                        <ul class="slide-menu child2">
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Purchase Entry</a>
                                            </li>
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Purchase Return</a>
                                            </li>
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Purchase Order</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                  <li class="slide__category"><span class="category-name">Voucher Section</span></li>
                                  <li class="slide has-sub">
                                   <a href="javascript:void(0);" class="side-menu__item">
                                     <i class="bi bi-card-checklist side-menu__icon"></i>
                                     <span class="side-menu__label">Vouchers</span>
                                     <i class="fe fe-chevron-right side-menu__angle"></i>
                                 </a>
                                 <ul class="slide-menu child1">
                                    <li class="slide has-sub">
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Cash Payment Voucher</a>
                                            </li>
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Cash Receipt Voucher</a>
                                            </li>
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Journal Voucher</a>
                                            </li>
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Change Party Name</a>
                                            </li>
                                        </ul>
                                    </li>
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
                                 
                            <li class="slide__category"><span class="category-name">Utilities Section</span></li>
                                  <li class="slide has-sub">
                                   <a href="javascript:void(0);" class="side-menu__item">
                                     <i class="bi bi-card-checklist side-menu__icon"></i>
                                     <span class="side-menu__label">Utilities</span>
                                     <i class="fe fe-chevron-right side-menu__angle"></i>
                                 </a>
                                 <ul class="slide-menu child1">
                                    <li class="slide has-sub">
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">IMS Data Export</a>
                                            </li>
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">SAS Data Export</a>
                                            </li>
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Closing Stock Batchwise</a>
                                            </li>
                                            <li class="slide">
                                                <a href="#" class="side-menu__item">Change Batch Summary No Wise</a>
                                            </li>
                                             <li class="slide">
                                                <a href="#" class="side-menu__item">Update Product Batch & Price</a>
                                            </li>
                                             <li class="slide">
                                                <a href="#" class="side-menu__item">Coding Label Printing</a>
                                            </li>
                                             <li class="slide">
                                                <a href="#" class="side-menu__item">List of Expired License</a>
                                            </li>
                                             <li class="slide">
                                                <a href="#" class="side-menu__item">Email System</a>
                                            </li>
                                             <li class="slide">
                                                <a href="#" class="side-menu__item">Import Data</a>
                                            </li>
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
                                           <a href="{{ route('roles.index') }}" class="side-menu__item">Roles</a>
                                       </li>
                                       <li class="slide">
                                           <a href="#" class="side-menu__item">Permissions</a>
                                       </li>
                                   </ul> 
                           
                                   
                         {{-- @php
                                $user = Auth::user();
                                $isSuperAdmin = $user && $user->role_id == 0;
                                function userHasPermission($permission) {
                                    $user = Auth::user();
                                    if (!$user) return false;
                                    $rolePermissions = DB::table('role_has_permissions')
                                        ->where('role_id', $user->role_id)
                                        ->pluck('permission_id');
                                    $permissionId = DB::table('permissions')
                                        ->where('prefix', $permission)
                                        ->value('id');
                                    return in_array($permissionId, $rolePermissions->toArray());
                                }
                                $permissions = [
                                    'companies_add' => $isSuperAdmin || userHasPermission('companies_add'),
                                    'companies_edit' => $isSuperAdmin || userHasPermission('companies_edit'),
                                    'companies_view' => $isSuperAdmin || userHasPermission('companies_view'),
                                    'companies_delete' => $isSuperAdmin || userHasPermission('companies_delete'),

                                    'customers_add' => $isSuperAdmin || userHasPermission('customers_add'),
                                    'customers_edit' => $isSuperAdmin || userHasPermission('customers_edit'),
                                    'customers_view' => $isSuperAdmin || userHasPermission('customers_view'),
                                    'customers_delete' => $isSuperAdmin || userHasPermission('customers_delete'),

                                    'uom_add' => $isSuperAdmin || userHasPermission('uom_add'),
                                    'uom_edit' => $isSuperAdmin || userHasPermission('uom_edit'),
                                    'uom_view' => $isSuperAdmin || userHasPermission('uom_view'),
                                    'uom_delete' => $isSuperAdmin || userHasPermission('uom_delete'),

                                    'category_add' => $isSuperAdmin || userHasPermission('category_add'),
                                    'category_edit' => $isSuperAdmin || userHasPermission('category_edit'),
                                    'category_view' => $isSuperAdmin || userHasPermission('category_view'),
                                    'category_delete' => $isSuperAdmin || userHasPermission('category_delete'), 

                                    'product_add' => $isSuperAdmin || userHasPermission('product_add'),
                                    'product_edit' => $isSuperAdmin || userHasPermission('product_edit'),
                                    'product_view' => $isSuperAdmin || userHasPermission('product_view'),
                                    'product_delete' => $isSuperAdmin || userHasPermission('product_delete'),

                                    'supplier_add' => $isSuperAdmin || userHasPermission('supplier_add'),
                                    'supplier_edit' => $isSuperAdmin || userHasPermission('supplier_edit'),
                                    'supplier_view' => $isSuperAdmin || userHasPermission('supplier_view'),
                                    'supplier_delete' => $isSuperAdmin || userHasPermission('supplier_delete'),

                                    'warehouse_add' => $isSuperAdmin || userHasPermission('warehouse_add'),
                                    'warehouse_edit' => $isSuperAdmin || userHasPermission('warehouse_edit'),
                                    'warehouse_view' => $isSuperAdmin || userHasPermission('warehouse_view'),
                                    'warehouse_delete' => $isSuperAdmin || userHasPermission('warehouse_delete'),

                                    'purchase_add' => $isSuperAdmin || userHasPermission('purchase_add'),
                                    'purchase_edit' => $isSuperAdmin || userHasPermission('purchase_edit'),
                                    'purchase_view' => $isSuperAdmin || userHasPermission('purchase_view'),
                                    'purchase_delete' => $isSuperAdmin || userHasPermission('purchase_delete'),

                                    'sale_add' => $isSuperAdmin || userHasPermission('sale_add'),
                                    'sale_edit' => $isSuperAdmin || userHasPermission('sale_edit'),
                                    'sale_view' => $isSuperAdmin || userHasPermission('sale_view'),
                                    'sale_delete' => $isSuperAdmin || userHasPermission('sale_delete'),

                                    'city_add' => $isSuperAdmin || userHasPermission('city_add'),
                                    'city_edit' => $isSuperAdmin || userHasPermission('city_edit'),
                                    'city_view' => $isSuperAdmin || userHasPermission('city_view'),
                                    'city_delete' => $isSuperAdmin || userHasPermission('city_delete'),

                                    'area_add' => $isSuperAdmin || userHasPermission('area_add'),
                                    'area_edit' => $isSuperAdmin || userHasPermission('area_edit'),
                                    'area_view' => $isSuperAdmin || userHasPermission('area_view'),
                                    'area_delete' => $isSuperAdmin || userHasPermission('area_delete'),

                                    'subarea_add' => $isSuperAdmin || userHasPermission('subarea_add'),
                                    'subarea_edit' => $isSuperAdmin || userHasPermission('subarea_edit'),
                                    'subarea_view' => $isSuperAdmin || userHasPermission('subarea_view'),
                                    'subarea_delete' => $isSuperAdmin || userHasPermission('subarea_delete'),

                                    'employee_add' => $isSuperAdmin || userHasPermission('employee_add'),
                                    'employee_edit' => $isSuperAdmin || userHasPermission('employee_edit'),
                                    'employee_view' => $isSuperAdmin || userHasPermission('employee_view'),
                                    'employee_delete' => $isSuperAdmin || userHasPermission('employee_delete'),

                                    'sales_invoices' => $isSuperAdmin || userHasPermission('sales_invoices'),
                                    'purchase_invoices' => $isSuperAdmin || userHasPermission('purchase_invoices'),
                                    'sales_invoices_payment' => $isSuperAdmin || userHasPermission('sales_invoices_payment'),
                                    'purchase_invoices_payment' => $isSuperAdmin || userHasPermission('purchase_invoices_payment'),

                                    'transaction_add' => $isSuperAdmin || userHasPermission('transaction_add'),
                                    'transaction_edit' => $isSuperAdmin || userHasPermission('transaction_edit'),
                                    'transaction_view' => $isSuperAdmin || userHasPermission('transaction_view'),
                                    'transaction_delete' => $isSuperAdmin || userHasPermission('transaction_delete'),

                                ]; --}}
                            @endphp
                            {{-- @if ($permissions['companies_view'] ||
                                 $permissions['companies_add'])
                                    <li class="slide__category"><span class="category-name">Company</span></li>
                                    <li class="slide has-sub">
                                        <a href="javascript:void(0);" class="side-menu__item">
                                            <i class="bx bx-file-blank side-menu__icon"></i>
                                            <span class="side-menu__label">Companies</span>
                                            <i class="fe fe-chevron-right side-menu__angle"></i>
                                        </a>
                                        @if ($permissions['companies_view'] || $permissions['companies_add'])
                                            <ul class="slide-menu child1">
                                                @if ($permissions['companies_view'])
                                                    <li class="slide">
                                                        <a href="{{ route('companies.index') }}" class="side-menu__item">Company List</a>
                                                    </li>
                                                @endif
                                                @if ($permissions['companies_add'])
                                                    <li class="slide">
                                                        <a href="{{ route('companies.create') }}" class="side-menu__item">Add Company</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        @endif
                                    </li>
                                @endif
                                  @if ($permissions['customers_view'] || $permissions['customers_add'])
                                    <li class="slide__category"><span class="category-name">Customers</span></li>
                                    <li class="slide has-sub">
                                        <a href="javascript:void(0);" class="side-menu__item">
                                            <i class="bi bi-people side-menu__icon"></i>
                                            <span class="side-menu__label">Customers</span>
                                            <i class="fe fe-chevron-right side-menu__angle"></i>
                                        </a>
                                        <ul class="slide-menu child1">
                                            @if ($permissions['customers_add'])
                                                <li class="slide">
                                                    <a href="{{ route('customers.create') }}" class="side-menu__item">Add Customers</a>
                                                </li>
                                            @endif
                                            @if ($permissions['customers_view'])
                                                <li class="slide">
                                                    <a href="{{ route('customers.index') }}" class="side-menu__item">Customers List</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </li>
                                @endif
                                @if ($permissions['uom_view'] || $permissions['category_view'] || $permissions['product_view'] || 
                                    $permissions['supplier_view'] || $permissions['warehouse_view'] || $permissions['purchase_view'] || 
                                    $permissions['sale_view'])
                                    <li class="slide__category"><span class="category-name">Inventory</span></li>
                                    <li class="slide has-sub">
                                        <a href="javascript:void(0);" class="side-menu__item">
                                            <i class="bi bi-basket side-menu__icon"></i>
                                            <span class="side-menu__label">Inventory</span>
                                            <i class="fe fe-chevron-right side-menu__angle"></i>
                                        </a>
                                        <ul class="slide-menu child1">
                                            @if ($permissions['uom_view'])
                                                <li class="slide">
                                                    <a href="{{ route('units.index') }}" class="side-menu__item">UOM</a>
                                                </li>
                                            @endif
                                            @if ($permissions['category_view'])
                                                <li class="slide">
                                                    <a href="{{ route('category.index') }}" class="side-menu__item">Category</a>
                                                </li>
                                            @endif

                                            @if ($permissions['product_view'] || $permissions['product_add'])
                                                <li class="slide has-sub">
                                                    <a href="#" class="side-menu__item">Products
                                                        <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                                    <ul class="slide-menu child2">
                                                        @if ($permissions['product_add'])
                                                            <li class="slide">
                                                                <a href="{{ route('products.create') }}" class="side-menu__item">Add Product</a>
                                                            </li>
                                                        @endif
                                                        @if ($permissions['product_view'])
                                                            <li class="slide">
                                                                <a href="{{ route('products.index') }}" class="side-menu__item">Product List</a>
                                                            </li>
                                                            <li class="slide">
                                                                <a href="{{ route('products.import') }}" class="side-menu__item">Product Import</a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </li>
                                            @endif

                                            @if ($permissions['supplier_view'] || $permissions['supplier_add'])
                                                <li class="slide has-sub">
                                                    <a href="#" class="side-menu__item">Supplier
                                                        <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                                    <ul class="slide-menu child2">
                                                        @if ($permissions['supplier_add'])
                                                            <li class="slide">
                                                                <a href="{{ route('supplier.create') }}" class="side-menu__item">Add Supplier</a>
                                                            </li>
                                                        @endif
                                                        @if ($permissions['supplier_view'])
                                                            <li class="slide">
                                                                <a href="{{ route('supplier.index') }}" class="side-menu__item">Supplier List</a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </li>
                                            @endif

                                            @if ($permissions['warehouse_view'] || $permissions['warehouse_add'])
                                                <li class="slide has-sub">
                                                    <a href="#" class="side-menu__item">Warehouses
                                                        <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                                    <ul class="slide-menu child2">
                                                        @if ($permissions['warehouse_add'])
                                                            <li class="slide">
                                                                <a href="{{ route('warehouse.create') }}" class="side-menu__item">Add Warehouses</a>
                                                            </li>
                                                        @endif
                                                        @if ($permissions['warehouse_view'])
                                                            <li class="slide">
                                                                <a href="{{ route('warehouse.index') }}" class="side-menu__item">Warehouses List</a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </li>
                                            @endif

                                            @if ($permissions['purchase_view'] || $permissions['purchase_add'])
                                                <li class="slide has-sub">
                                                    <a href="#" class="side-menu__item">Purchases
                                                        <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                                    <ul class="slide-menu child2">
                                                        @if ($permissions['purchase_add'])
                                                            <li class="slide">
                                                                <a href="{{ route('purchases.create') }}" class="side-menu__item">Add Purchase</a>
                                                            </li>
                                                        @endif
                                                        @if ($permissions['purchase_view'])
                                                            <li class="slide">
                                                                <a href="{{ route('purchases.index') }}" class="side-menu__item">Purchase List</a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </li>
                                            @endif

                                            @if ($permissions['sale_view'] || $permissions['sale_add'])
                                                <li class="slide has-sub">
                                                    <a href="#" class="side-menu__item">Sales
                                                        <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                                    <ul class="slide-menu child2">
                                                        @if ($permissions['sale_add'])
                                                            <li class="slide">
                                                                <a href="{{ route('sales.create') }}" class="side-menu__item">New Sale</a>
                                                            </li>
                                                        @endif
                                                        @if ($permissions['sale_view'])
                                                            <li class="slide">
                                                                <a href="{{ route('sales.index') }}" class="side-menu__item">Sales List</a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </li>
                                            @endif
                                        </ul>
                                    </li>
                                @endif
                                @if ($permissions['city_view'] || $permissions['area_view'] || $permissions['subarea_view'])
                                        <li class="slide__category"><span class="category-name">AREA Section</span></li>
                                        <li class="slide has-sub">
                                            <a href="javascript:void(0);" class="side-menu__item">
                                                <i class="bi bi-arrows-move side-menu__icon"></i>
                                                <span class="side-menu__label">Route Manage</span>
                                                <i class="fe fe-chevron-right side-menu__angle"></i>
                                            </a>
                                            <ul class="slide-menu child1">
                                                @if ($permissions['city_view'])
                                                    <li class="slide">
                                                        <a href="{{ route('city.index') }}" class="side-menu__item">City</a>
                                                    </li>
                                                @endif
                                                @if ($permissions['area_view'])
                                                    <li class="slide">
                                                        <a href="{{ route('area.index') }}" class="side-menu__item">Area</a>
                                                    </li>
                                                @endif
                                                @if ($permissions['subarea_view'])
                                                    <li class="slide">
                                                        <a href="{{ route('subarea.index') }}" class="side-menu__item">Sub Area</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </li>
                                    @endif
                                   @if ($permissions['employee_add'] || $permissions['employee_view'])
                                        <li class="slide__category"><span class="category-name">Staff Section</span></li>
                                        <li class="slide has-sub">
                                            <a href="javascript:void(0);" class="side-menu__item">
                                                <i class="bi bi-person-badge side-menu__icon"></i>
                                                <span class="side-menu__label">Employees</span>
                                                <i class="fe fe-chevron-right side-menu__angle"></i>
                                            </a>
                                            <ul class="slide-menu child1">
                                                @if ($permissions['employee_add'])
                                                    <li class="slide">
                                                        <a href="{{ route('employee.create') }}" class="side-menu__item">Add Employee</a>
                                                    </li>
                                                @endif
                                                @if ($permissions['employee_view'])
                                                    <li class="slide">
                                                        <a href="{{ route('employee.index') }}" class="side-menu__item">Employee List</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </li>
                                    @endif
                                  @if ($permissions['sales_invoices'] || $permissions['purchase_invoices'] || $permissions['transaction_add'] || $permissions['transaction_view'])
                                            <li class="slide__category"><span class="category-name">Financial</span></li>
                                            <li class="slide has-sub">
                                                <a href="javascript:void(0);" class="side-menu__item">
                                                    <i class="bi bi-journal side-menu__icon"></i>
                                                    <span class="side-menu__label">Accounts</span>
                                                    <i class="fe fe-chevron-right side-menu__angle"></i>
                                                </a>
                                                <ul class="slide-menu child1">
                                                    @if ($permissions['sales_invoices'])
                                                        <li class="slide">
                                                            <a href="{{ route('sales.invoices') }}" class="side-menu__item">Sales Invoices</a>
                                                        </li>
                                                    @endif
                                                    @if ($permissions['purchase_invoices'])
                                                        <li class="slide">
                                                            <a href="{{ route('purchases.invoices') }}" class="side-menu__item">Purchase Invoices</a>
                                                        </li>
                                                    @endif
                                                    @if ($permissions['transaction_add'])
                                                        <li class="slide">
                                                            <a href="{{ route('accounts.create') }}" class="side-menu__item">Add Transaction</a>
                                                        </li>
                                                    @endif
                                                    @if ($permissions['transaction_view'])
                                                        <li class="slide">
                                                            <a href="{{ route('accounts.index') }}" class="side-menu__item">Transaction List</a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </li>
                                        @endif --}}
                                
                                  
                            </nav>
                        </div>
                    </aside>