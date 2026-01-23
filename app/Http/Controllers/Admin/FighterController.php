<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fighter;
use Illuminate\Http\Request;

class FighterController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.fighters.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "nickname" => "nullable|string|max:255",
            "weight_class" => "required|string|max:255",
            "wins" => "required|integer|min:0",
            "losses" => "required|integer|min:0",
            "image_url" => "nullable|string|max:255",
        ]);

        Fighter::create($request->all());

        return redirect()
            ->route("admin.dashboard")
            ->with("success", "Fighter created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Fighter $fighter)
    {
        // This view is not created, so we redirect to edit
        return redirect()->route("admin.fighters.edit", $fighter);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fighter $fighter)
    {
        return view("admin.fighters.edit", compact("fighter"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fighter $fighter)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "nickname" => "nullable|string|max:255",
            "weight_class" => "required|string|max:255",
            "wins" => "required|integer|min:0",
            "losses" => "required|integer|min:0",
            "image_url" => "nullable|string|max:255",
        ]);

        $fighter->update($request->all());

        return redirect()
            ->route("admin.dashboard")
            ->with("success", "Fighter updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fighter $fighter)
    {
        $fighter->delete();
        return redirect()
            ->route("admin.dashboard")
            ->with("success", "Fighter deleted successfully.");
    }
}
