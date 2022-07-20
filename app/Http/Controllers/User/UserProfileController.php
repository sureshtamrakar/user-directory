<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;


class UserProfileController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = User::findorfail(Auth::id());
        return view('front.user.detail', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = User::findorfail(Auth::id());
        return view('front.user.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'state' => ['string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'numeric', 'digits:10'],
            'dob' => ['required', 'date_format:Y-m-d'],
            'gender' => ['required']
        ]);
        $user = User::findorfail(Auth::id());
        $user->name = $request->name;
        $user->country = $request->country;
        $user->state = $request->state ?? null;
        $user->address = $request->address;
        $user->mobile = $request->mobile;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->image = $request->image;
        $user->update();
        return redirect()->action([UserProfileController::class, 'show'])
            ->with('status', 'Your profile has bee updated!');
    }
}
