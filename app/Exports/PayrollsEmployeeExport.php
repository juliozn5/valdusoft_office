<?php

namespace App\Exports;

use App\Models\PayrollEmployee;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PayrollsEmployeeExport implements FromView
{
    protected $payroll_id;
    
    public function __construct(int $payroll_id)
    {
        $this->payroll_id = $payroll_id;
    }

    public function view(): View
    {
        return view('admin.payrolls.excelExport', [
            'payroll_employees' => PayrollEmployee::where('payroll_id', '=', $this->payroll_id)
                                                    ->with('user:id,name,last_name', 'bond', 'financing', 'financing_payment')
                                                    ->get()
        ]);
    }
}
