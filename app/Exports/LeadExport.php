<?php
namespace App\Exports;
use App\Lead;
use App\User;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
class LeadExport implements FromCollection
{
  public function collection()
  {
    
     
    if (@Auth::user()->permissionsGroup->view_status) {
        return Lead::where('user_id', '=', Auth::user()->id)->orderby('id',
            'asc');
         } else {
        return  Lead::orderby('id', 'asc');
 
    }
  }
}