<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    
    public function index()
    {
        $customers = customer::all();
        return view ('customers.index')->with('customers', $customers);
    }
    
    public function create()
    {
        return view('customers.create');
    }
  
    public function store(Request $request)
    {
        $input = $request->all();
        customer::create($input);
        return redirect('customers')->with('flash_message', 'customer Addedd!');  
    }
    
    public function show($id)
    {
        $customer = customer::find($id);
        return view('customers.show')->with('customers', $customer);
    }
    
    public function edit($id)
    {
        $customer = customer::find($id);
        return view('customers.edit')->with('customers', $customer);
    }
  
    public function update(Request $request, $id)
    {
        $customer = customer::find($id);
        $input = $request->all();
        $customer->update($input);
        return redirect('customers')->with('flash_message', 'customer Updated!');  
    }
  
    public function destroy($id)
    {
        customer::destroy($id);
        return redirect('customers')->with('flash_message', 'customer deleted!');  
    }

    public function search(Request $request)
    {
        $output="";

        $customer=Customer::where('name','Like','%'.$request->search. '%')->orWhere('email','Like','%'.$request->search. '%')->get();

       foreach($customer as $customer)
       {
        $output.=
        '<tr>
        <td></td>
        <td>'.$customer->name.'</td>
        <td>'.$customer->address.'</td>
        <td>'.$customer->email.'</td>
        <td>'.'
        <a href="/customers/'.$customer->id.'" class= "btn btn-info">'.'View</a>
        <a href="/customers/'.$customer->id.'/edit" class= "btn btn-primary">'.'Edit</a>
        
        <form method="POST" action="/customers/' .$customer->id.'"  style="display:inline">
                                                '.method_field('DELETE').'
                                                '.csrf_field().'
                                                <a  class="btn btn-danger btn-sm"   onclick="return confirm(&quot;Confirm delete?&quot;)"> Delete</a>
                                            </form>
        '.'</td>
        </tr>';
       }
       return response($output);
    }
}
