<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\Region\Region;


class ApiController extends Controller
{
    private $region;
	/**
     * ApiController constructor.
     * @param Repository 
     */
    public function __construct
    (
        Region $region

    )
    {
        $this->region             = $region;

        // $this->middleware('jwt.auth', ['only' => ['index']]);
    }


//     Content-Type:application/x-www-form-urlencoded
// x-api-key:MYfuCdTGzrdCTSI59jK8fW8HUkL1Euxx
// Authorization:Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6Ly9sb2NhbGhvc3QvUHJvamVjdHMvbGFyYXZlbC1ib2lsZXJwbGF0ZS9wdWJsaWMvYXBpL3YxL2F1dGhlbnRpY2F0ZSIsImlhdCI6MTUxMTI0MTI0OSwiZXhwIjoxNTExMjQ0ODQ5LCJuYmYiOjE1MTEyNDEyNDksImp0aSI6Ill0eTV4d2FjcXRGNEgxSTEifQ.B_IOQc3BhfLCPIv7w_nmgHDy9RikAAry0Wl8TXdPqLY
// Accept:application/json
// x-api-secret:nEwICunEHYHU6paKMAdf09naqquMn73E

    public function index()
    {
        $member = JWTAuth::parseToken()->toUser();
        return response()->json($member, 200);
    }

    public function tokenrefresh()
    {
        try {
            // verify the credentials and create a token for the user
            if (!$token = JWTAuth::refresh($_GET['token'])) {
                return response()->json(['error' => 'Invalid User Name. or Password !'], 401);
            }

        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => $e], 401);
        }

        return response()->json(compact('token'), 200);
    }

    /**
     * Return a JWT
     *
     * @param Request $request
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('first_name', 'password');

        try {
            // verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Invalid User Name. or Password !'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'Something went wrong!'], 401);
        }

        $user = JWTAuth::toUser($token);

        if ($user->confirmed == 0) {
            return response()->json(['error' => trans('exceptions.frontend.auth.confirmation.resend', ['user_id' => $user->id])], 401);
        } else {
            return response()->json(compact('token'));    
        }
    }

    public function locations()
    {
        $regions = $this->region->get();
        return response()->json(['result' => $regions], 200);
    }
}
