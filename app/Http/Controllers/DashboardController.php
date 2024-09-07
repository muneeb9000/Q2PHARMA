<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Purchases;
use App\Models\Sales;
use App\Models\Customers;
use App\Models\Employee;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user(); 
        $totalSales = Sales::sum('total_amount');
        $totalPurchases = Purchases::sum('total_amount');
        $totalCustomers = Customers::count();
        // $totalEmployees = Employee::count();
      // Fetch previous total sales, purchases, customers, and employees (e.g., from the previous month)
    $previousMonth = now()->subMonth()->startOfMonth();
    $previousTotalSales = Sales::whereDate('created_at', '>=', $previousMonth)
        ->whereDate('created_at', '<', now()->startOfMonth())
        ->sum('total_amount');
    $previousTotalPurchases = Purchases::whereDate('created_at', '>=', $previousMonth)
        ->whereDate('created_at', '<', now()->startOfMonth())
        ->sum('total_amount');
    $previousTotalCustomers = Customers::whereDate('created_at', '>=', $previousMonth)
        ->whereDate('created_at', '<', now()->startOfMonth())
        ->count();
    // $previousTotalEmployees = Employee::whereDate('created_at', '>=', $previousMonth)
    //     ->whereDate('created_at', '<', now()->startOfMonth())
    //     ->count();

    // Calculate change percentages
    $salesChangePercentage = $previousTotalSales > 0
        ? (($totalSales - $previousTotalSales) / $previousTotalSales) * 100
        : 0;
    $purchasesChangePercentage = $previousTotalPurchases > 0
        ? (($totalPurchases - $previousTotalPurchases) / $previousTotalPurchases) * 100
        : 0;
    $customersChangePercentage = $previousTotalCustomers > 0
        ? (($totalCustomers - $previousTotalCustomers) / $previousTotalCustomers) * 100
        : 0;
    // $employeesChangePercentage = $previousTotalEmployees > 0
    //     ? (($totalEmployees - $previousTotalEmployees) / $previousTotalEmployees) * 100
    //     : 0;

    // Format percentages with 2 decimal places and append a percentage sign
    $formattedSalesChangePercentage = number_format($salesChangePercentage, 2) . '%';
    $formattedPurchasesChangePercentage = number_format($purchasesChangePercentage, 2) . '%';
    $formattedCustomersChangePercentage = number_format($customersChangePercentage, 2) . '%';
    // $formattedEmployeesChangePercentage = number_format($employeesChangePercentage, 2) . '%';

    return view('dashboard.index', compact(
        'totalSales',
        'totalPurchases',
        'totalCustomers',
        'formattedSalesChangePercentage',
        'formattedPurchasesChangePercentage',
        'formattedCustomersChangePercentage'
      
    ));
    }

    public function chart(Request $request)
    {
        $period = $request->query('period', 'this-year'); 
        switch ($period) {
            case 'this-week':
                $startDate = now()->startOfWeek();
                $endDate = now()->endOfWeek();
                break;
            case 'last-week':
                $startDate = now()->subWeek()->startOfWeek();
                $endDate = now()->subWeek()->endOfWeek();
                break;
            case 'today':
                $startDate = now()->startOfDay();
                $endDate = now()->endOfDay();
                break;
            case 'this-year':
            default:
                $startDate = now()->startOfYear();
                $endDate = now()->endOfYear();
                break;
        }
        $totalSales = Sales::whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('SUM(total_amount) as total, MONTH(created_at) as month')
            ->groupBy('month')
            ->pluck('total', 'month');
        $totalPurchases = Purchases::whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('SUM(total_amount) as total, MONTH(created_at) as month')
            ->groupBy('month')
            ->pluck('total', 'month');
        $salesData = [];
        $purchasesData = [];
        $categories = [];
        for ($month = 1; $month <= 12; $month++) {
            $salesData[] = $totalSales->get($month, 0);
            $purchasesData[] = $totalPurchases->get($month, 0);
            $categories[] = date('M', mktime(0, 0, 0, $month, 1)); 
        }
        return response()->json([
            'salesData' => $salesData,
            'purchasesData' => $purchasesData,
            'categories' => $categories
        ]);
    }
    


}
