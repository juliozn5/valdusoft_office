<?php

namespace App\Exports;

use App\Models\PayrollEmployee;
use App\Models\Payrolls;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class PayrollsEmployeeExport implements FromView
{
    protected $payroll_id;
    
    public function __construct($payroll_id = null)
    {
        $this->payroll_id = $payroll_id;
    }
    
    public function view(): View
    {
        $payroll = Payrolls::find($this->payroll_id);

        $payroll_employees = PayrollEmployee::where('payroll_id', '=', $this->payroll_id)
        ->with('user:id,name,last_name,tron_wallet', 'bond', 'financing', 'financing_payment')
        ->get();
     
        return view('admin.payrolls.excelExport', [
            'payroll_employees' => $payroll_employees,
            'payroll' => $payroll
        ]);
    }
    
}
