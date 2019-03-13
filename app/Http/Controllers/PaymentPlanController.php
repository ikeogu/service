<?php

namespace App\Http\Controllers;

use Auth;
use App\PaymentPlan;
use App\Repositories\Repository;
use Illuminate\Http\Request;

class PaymentPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $model;

   public function __construct(PaymentPlan $paymentPlan)
   {
       // set the model
       $this->model = new Repository($paymentPlan);
   }
    public function index()
    {
        Auth::check();
        $plans = $this->model->all();
        
        return view('paymentplan.index',['plans'=>$plans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paymentplan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:500',
            'description' => 'required|max:500'
        ]);
            $plan = new PaymentPlan();
            $plan->name = $request->name;
            $plan->description = $request->description;
            $plan->create($request->only($this->model->getModel()->fillable));
            return back()->with('success', 'Successful');

        // create record and pass in only fields that are fillable
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PaymentPlan  $paymentPlan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->model->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaymentPlan  $paymentPlan
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentPlan $paymentPlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaymentPlan  $paymentPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->model->update($request->only($this->model->getModel()->fillable), $id);

       return $this->model->find($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaymentPlan  $paymentPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->model->delete($id);
    }
}
