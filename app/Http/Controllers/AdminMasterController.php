<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\TenantUpdateRequest;
use App\Http\Requests\WarehouseCategoryStoreRequest;
use App\Http\Requests\WarehouseCategoryUpdateRequest;
use App\Http\Requests\WarehouseStoreRequest;
use App\Http\Requests\WarehouseUpdateRequest;
use App\Models\Tenant;
use App\Models\Warehouse;
use App\Models\WarehouseCategory;
use App\Repositories\AdminRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\TenantRepository;
use App\Repositories\UserRepository;
use App\Repositories\WarehouseCategoryRepository;
use App\Repositories\WarehouseRepository;

class AdminMasterController extends Controller
{
    private $adminRepository, $userRepository, $tenantRepository, $warehouseCategoryRepository, $warehouseRepository;

    public function __construct(AdminRepository $adminRepository, UserRepository $userRepository, TenantRepository $tenantRepository, WarehouseCategoryRepository $warehoseCategoryRepository, WarehouseRepository $warehouseRepository) {
        $this->adminRepository = $adminRepository;
        $this->userRepository = $userRepository;
        $this->tenantRepository = $tenantRepository;
        $this->warehouseCategoryRepository = $warehoseCategoryRepository;
        $this->warehouseRepository = $warehouseRepository;
    }

    public function master_admin_index()
    {
        return view('pages.admin.master.users.admin.index');
    }

    public function master_admin_store(AdminRequest $adminRequest)
    {
        
        if (auth()->user()->attribute == 'none') {
            return redirect()->back()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'You are not allowed!'
            ]);
        }

        if ($adminRequest->validated()) {
            DB::transaction(function () use ($adminRequest) {
                $this->userRepository->createUserAndAdmin($adminRequest);
            });

            return redirect()->back()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Admin has been created!'
            ]);
        }
    }

    public function master_admin_show(Admin $admin)
    {
        return view('pages.admin.master.users.admin.show', compact('admin'));
    }

    public function master_admin_destroy($admin)
    {
        if ($this->adminRepository->destroyAdmin($admin)) {
            return redirect()->back()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Admin has been deleted!'
            ]);
        }
    }

    public function master_admin_update_status(Admin $admin)
    {
        if ($this->adminRepository->changeStatus($admin->id)) {
            return redirect()->back()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Status has been changed!'
            ]);
        }
    }

    public function master_admin_update(AdminUpdateRequest $request, $admin)
    {
        if ($request->validated()) {
            if ($this->adminRepository->updateAdmin($request, $admin)) {
                return redirect()->back()->with([
                    'flash-type' => 'sweetalert',
                    'case' => 'default',
                    'position' => 'center',
                    'type' => 'success',
                    'message' => 'Admin has been updated!'
                ]);
            }
        }
    }

    public function master_admin_update_image(Request $request, $admin)
    {
        if ($this->adminRepository->updateAdminImage($request, $admin)) {
            return redirect()->back()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Image has been updated!'
            ]);
        }
    }

    public function master_admin_update_password(Request $request, Admin $admin)
    {
        if ($this->adminRepository->updateAdminPassword($request, $admin->user_id)) {
            return redirect()->back()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Password has been updated!'
            ]);
        }
    }

    public function master_tenant_index()
    {
        return view('pages.admin.master.users.tenant.index');
    }

    public function master_tenant_update_status($tenant)
    {
        if ($this->tenantRepository->changeStatus($tenant)) {
            return redirect()->back()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Status has been changed!'
            ]);
        }
    }

    public function master_tenant_update(TenantUpdateRequest $request, $tenant)
    {
        if ($request->validated()) {
            if ($this->tenantRepository->updateTenant($request, $tenant)) {
                return redirect()->back()->with([
                    'flash-type' => 'sweetalert',
                    'case' => 'default',
                    'position' => 'center',
                    'type' => 'success',
                    'message' => 'Tenant has been updated!'
                ]);
            }
        }
    }

    public function master_tenant_show(Tenant $tenant)
    {
        return view('pages.admin.master.users.tenant.show', compact('tenant'));
    }

    public function master_tenant_update_image(Request $request, $tenant)
    {
        if ($this->tenantRepository->updateTenantImage($request, $tenant)) {
            return redirect()->back()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Image has been updated!'
            ]);
        }
    }

    public function master_tenant_update_password(Request $request, Tenant $tenant)
    {
        if ($this->tenantRepository->updateTenantPassword($request, $tenant->user_id)) {
            return redirect()->back()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Password has been updated!'
            ]);
        }
    }

    public function master_tenant_destroy($tenant)
    {
        if ($this->tenantRepository->deleteTenant($tenant)) {
            return redirect()->back()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Tenant has been deleted!'
            ]);
        }
    }

    public function master_storage_index()
    {
        return view('pages.admin.master.property.warehouse.index');
    }

    public function master_category_index()
    {
        return view('pages.admin.master.property.category.index');
    }

    public function master_category_store(WarehouseCategoryStoreRequest $request)
    {
        if ($request->validated()) {
            if ($this->warehouseCategoryRepository->createWarehouseCategory($request)) {
                return redirect()->back()->with([
                    'flash-type' => 'sweetalert',
                    'case' => 'default',
                    'position' => 'center',
                    'type' => 'success',
                    'message' => 'Category has been created!'
                ]);
            }
        }
    }

    public function master_category_show(WarehouseCategory $warehouse_category)
    {
        return view('pages.admin.master.property.category.show', compact('warehouse_category'));
    }

    public function master_category_update(WarehouseCategoryUpdateRequest $request, $warehouse_category)
    {
        if ($request->validated()) {
            if ($this->warehouseCategoryRepository->updateWarehouseCategory($request, $warehouse_category)) {
                return redirect()->back()->with([
                    'flash-type' => 'sweetalert',
                    'case' => 'default',
                    'position' => 'center',
                    'type' => 'success',
                    'message' => 'Category has been updated!'
                ]);
            }
        }
    }

    public function master_category_destroy($warehouse_category)
    {
        if ($this->warehouseCategoryRepository->deleteWarehouseCategory($warehouse_category)) {
            return redirect()->back()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Category has been deleted!'
            ]);
        }
    }

    public function master_warehouse_index()
    {
        $warehouse_categories = $this->warehouseCategoryRepository->getAllWarehouseCategories();

        return view('pages.admin.master.property.warehouse.index', compact('warehouse_categories'));
    }

    public function master_warehouse_store(WarehouseStoreRequest $request)
    {
        if ($request->validated()) {
            if ($this->warehouseRepository->createWarehouse($request)) {
                return redirect()->back()->with([
                    'flash-type' => 'sweetalert',
                    'case' => 'default',
                    'position' => 'center',
                    'type' => 'success',
                    'message' => 'Warehouse has been created!'
                ]);
            }
        }
    }

    public function master_warehouse_update(WarehouseUpdateRequest $request, $warehouse)
    {
        if ($request->validated()) {
            if ($this->warehouseRepository->updateWarehouse($request, $warehouse)) {
                return redirect()->back()->with([
                    'flash-type' => 'sweetalert',
                    'case' => 'default',
                    'position' => 'center',
                    'type' => 'success',
                    'message' => 'Warehouse has been updated!'
                ]);
            }
        }
    }

    public function master_warehouse_show(Warehouse $warehouse)
    {
        return view('pages.admin.master.property.warehouse.show', compact('warehouse'));
    }

    public function master_warehouse_destroy($warehouse)
    {
        if ($this->warehouseRepository->deleteWarehouse($warehouse)) {
            return redirect()->back()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Warehouse has been deleted!'
            ]);
        }
    }
}