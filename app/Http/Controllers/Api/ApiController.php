<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\Region\Region;
use App\Models\Meter\Meter;
use App\Models\Lamp\Lamp;
use App\Repositories\Backend\Meter\MeterRepository;
use App\Repositories\Backend\Lamp\LampRepository;

class ApiController extends Controller
{
    private $region;
	/**
     * ApiController constructor.
     * @param Repository 
     */
    public function __construct
    (
        Region $region,
        Meter $meter,
        MeterRepository $meter_repo,
        LampRepository $lamp_post_repo

    )
    {
        $this->region             = $region;
        $this->meter              = $meter;
        $this->meter_repo         = $meter_repo;
        $this->lamp_post_repo     = $lamp_post_repo;

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
        $regions = $this->region->select('id','region_name','region_code','description','latitude','longitude','image1','image2')->get();
        $regions = json_decode($regions,true);
        return response()->json(['result' => $regions], 200);
    }

    public function saveMeter(Request $request)
    {
        $data  = $request->all();

        $member = JWTAuth::parseToken()->toUser();

        $meter = $this->meter_repo->saveMeterApi($data,$member);

        if ($meter->save()) {
            \Log::info('Meter '.$meter->id.' was created by ' . $member->name );
            return response()->json(['message' => 'Successfully saved your meter.'], 200);
        }
        
       return response()->json(['message' => 'Can\'t save your meter ! '], 404);
    }

    public function editMeter($id)
    {
        $meter = $this->meter_repo->getMeter($id);

        $meter = json_decode($meter,true);

        return response()->json(['result' => $meter], 200);
    }


    public function updateMeter(Request $request,$id)
    {
        $data  = $request->all();

        $member = JWTAuth::parseToken()->toUser();

        $meter = $this->meter_repo->updateMeterApi($id,$data,$member);

        if ($meter->save()) {
            \Log::info('Meter '.$meter->id.' was updated by ' . $member->name );
            return response()->json(['message' => 'Successfully updated your meter.'], 200);
        }
        
       return response()->json(['message' => 'Can\'t update your meter ! '], 404);
       
    }

    public function saveLampPost(Request $request)
    {
        $data  = $request->all();

        $member = JWTAuth::parseToken()->toUser();

        $lamp_post = $this->lamp_post_repo->saveLampPostApi($data,$member);

        if ($lamp_post->save()) {
            \Log::info('Lamp Post '.$lamp_post->id.' was created by ' . $member->name );
            return response()->json(['message' => 'Successfully saved your lamp post.'], 200);
        }
        
       return response()->json(['message' => 'Can\'t save your lamp post! '], 404);
       
    }

    public function editLampPost($id)
    {
        $lamp_post = $this->lamp_post_repo->getLampPost($id);

        $lamp_post = json_decode($lamp_post,true);

        return response()->json(['result' => $lamp_post], 200);
    }

    public function updateLampPost(Request $request,$id)
    {
        $data  = $request->all();

        $member = JWTAuth::parseToken()->toUser();

        $lamp_post = $this->lamp_post_repo->updateLampPostApi($id,$data,$member);

        if ($lamp_post->save()) {
            \Log::info('Lamp Post '.$lamp_post->id.' was updated by ' . $member->name );
            return response()->json(['message' => 'Successfully updated your lamp post.'], 200);
        }
        
       return response()->json(['message' => 'Can\'t update your lamp post ! '], 404);
       
    }
    
}
