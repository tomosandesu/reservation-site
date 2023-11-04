<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;

class PlanController extends Controller
{
    public function index()
    {
        $plans=Plan::all();
        return view('employee.plan_index', compact('plans'));
    }
    public function create()
    {
        return view('employee.plan_create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'=>'required|max:50',
            'body'=>'required|max:400',
            'add_price'=>'required|',
        ]);
        $plan = Plan::create($validated);
        $request->session()->flash('message', '保存できました');
        return redirect()->route('plan.index', compact('plan'));
    }
    public function edit(Plan $plan)
    {
        return view('employee.plan_edit', compact('plan'));
    }
    public function update(Request $request, Plan $plan)
    {
        $validated = $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:400',
            'add_price'=>'required|',
        ]);
    
        $plan->update($validated);
        $request->session()->flash('massage', '更新しました');
        return redirect()->route('plan.index', compact('plan'));
    }

    public function destroy(Request $request, Plan $plan)
    {
        $plan->delete();
        $request->session()->flash('massage', '削除しました');
        return redirect()->route('plan.index');
    }
    public function show(Request $request)
    {
        $query=Plan::query();

        if($request->title) {
            $query->where('title', $request->title);
        }
        $plans=$query->get();
        return view('guests.plan_show', compact('plans'));
    }
    public function detail($id)
    {
        $plan=Plan::find($id);
        return view('guests.plan_detail', compact('plan'));
    }
}
