<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, User $user)
    {

        $validation = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4'],
            'city' => ['required']
        ]);

        if ($validation->fails()) {
            $message = $validation->messages()->toArray();
            return response()
                ->json(['error' => $message], 422);
        }

        $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'city_id' => $request->city,
            'password' => bcrypt($request->password)
        ]);

        return response()->json([
            'message' => $user
        ]);
    }


    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user = Auth::user();
            $token = $user->createToken('token-name');

            $favorites = User::where('id', Auth::user()->id)->with('favorites')->get();
            $hidens = User::where('id', Auth::user()->id)->with('hidens')->get();


            return response()->json([
                'message' => 'Login successful',
                'user' => Auth::user(),
                'token' => $token->plainTextToken,
                'favoris' => $favorites[0]->favorites,
                'hidens' => $hidens[0]->hidens
            ], 200);
        } else {
            return response()
                ->json(['message' => 'Bad credentials'], 404);
        }

        //        $token = $user->createToken('token-name');
        //        return $token->plainTextToken;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validation = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $request->id],
            'city_id' => ['required']
        ]);

        if ($validation->fails()) {
            $message = $validation->messages()->toArray();
            return response()
                ->json(['error' => $message], 422);
        }

        $user = User::findOrFail($request->id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'city_id' => $request->city_id,
        ]);

        if ($request->password) {
            $user->update(['password' => bcrypt($request->password)]);
        }

        return response()
                ->json([
                    'user' => $user
                ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
