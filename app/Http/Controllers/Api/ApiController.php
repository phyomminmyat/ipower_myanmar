<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\Region\Region;
use App\Models\Meter\Meter;
use App\Models\Lamp\Lamp;
use App\Models\Record\Record;
use App\Repositories\Backend\Meter\MeterRepository;
use App\Repositories\Backend\Lamp\LampRepository;
use App\Repositories\Backend\Street\StreetRepository;
use App\Repositories\Backend\MeterOwner\MeterOwnerRepository;
use App\Repositories\Backend\Township\TownshipRepository;
use App\Repositories\Backend\District\DistrictRepository;
use App\Repositories\Backend\VillageTract\VillageTractRepository;
use App\Repositories\Backend\Community\CommunityRepository;

class ApiController extends Controller
{
    private $region;
    private $meter;
    private $meter_repo;
    private $lamp_post_repo;
    private $street;
    private $owner;
    private $township;
    private $district;
    private $village;
    private $community;
	/**
     * ApiController constructor.
     * @param Repository 
     */
    public function __construct
    (
        Region $region,
        Meter $meter,
        MeterRepository $meter_repo,
        LampRepository $lamp_post_repo,
        StreetRepository $street,
        MeterOwnerRepository $owner,
        TownshipRepository $township,
        DistrictRepository $district,
        VillageTractRepository $village,
        CommunityRepository $community
    )
    {
        $this->region             = $region;
        $this->meter              = $meter;
        $this->meter_repo         = $meter_repo;
        $this->lamp_post_repo     = $lamp_post_repo;
        $this->street             = $street;
        $this->owner              = $owner;
        $this->township           = $township;
        $this->district           = $district;
        $this->village            = $village;
        $this->community          = $community;

        // $this->middleware('jwt.auth', ['only' => ['index']]);
    }

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
        }
        else if($user->status == 0 && $user->is_meter_owner == 0 && $user->is_civil_servant == 0){ // 
            return response()->json(['error' => 'Invalid Account Type !'], 401);
        }
        else if($user->status == 0) {
            return response()->json(['error' => 'Your account has been banned by system admin!'], 401);
        }

        else {
            return response()->json(compact('token'));    
        }
    }

    public function locations()
    {
        $regions = $this->region->select('id','region_name','region_code','description','latitude','longitude','image1','image2')->get();
        $regions = json_decode($regions,true);
        return response()->json(['message' => $regions], 200);
    }

    public function saveMeter(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'owner_id'        => 'required',
            'meter_no'        => 'required',
            'qrcode'          => 'required|unique:meters',
            'meter_type'      => 'required',
            'register_date'   => 'required',
            'region_id'       => 'required',
            'township_id'     => 'required',
            'district_id'     => 'required',
            'village_tract_id'=> 'required',
            'community_id'    => 'required',
            'street_id'       => 'required',
            'address'         => 'required',
            'latitude'        => 'required',
            'longitude'       => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json(['errors'=>$validator->errors()]);
        } else {

            $data  = $request->all();

            $member = JWTAuth::parseToken()->toUser();

            $meter = $this->meter_repo->saveMeterApi($data,$member);

            if ($meter->save()) {
                \Log::info('Meter '.$meter->id.' was created by ' . $member->name );
                return response()->json(['message' => 'Successfully saved your meter.'], 200);
            }
        }
        
       return response()->json(['message' => 'Can\'t save your meter ! '], 404);
    }

    public function editMeter($id)
    {
        $meter = $this->meter_repo->getMeter($id);

        $meter = json_decode($meter,true);

        return response()->json(['message' => $meter], 200);
    }


    public function updateMeter(Request $request,$id)
    {
        $validator = \Validator::make($request->all(), [
            'owner_id'        => 'required',
            'meter_no'        => 'required',
            'qrcode'          => 'sometimes|required|unique:meters,id',
            'meter_type'      => 'required',
            'register_date'   => 'required',
            'region_id'       => 'required',
            'township_id'     => 'required',
            'district_id'     => 'required',
            'village_tract_id'=> 'required',
            'community_id'    => 'required',
            'street_id'       => 'required',
            'address'         => 'required',
            'latitude'        => 'required',
            'longitude'       => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json(['errors'=>$validator->errors()]);

        } else {

            $data  = $request->all();

            $member = JWTAuth::parseToken()->toUser();

            $meter = $this->meter_repo->updateMeterApi($id,$data,$member);

            if ($meter->save()) {
                \Log::info('Meter '.$meter->id.' was updated by ' . $member->name );
                return response()->json(['message' => 'Successfully updated your meter.'], 200);
            }
        }
        
       return response()->json(['message' => 'Can\'t update your meter ! '], 404);
       
    }

    public function saveLampPost(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'street_id'       => 'required',
            'lamp_post_name'  => 'required',
            'qrcode'          => 'required|unique:lamp_posts',
            'latitude'        => 'required',
            'longitude'       => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json(['errors'=>$validator->errors()]);
            
        } else {

            $data  = $request->all();

            $member = JWTAuth::parseToken()->toUser();

            $lamp_post = $this->lamp_post_repo->saveLampPostApi($data,$member);

            if ($lamp_post->save()) {
                \Log::info('Lamp Post '.$lamp_post->id.' was created by ' . $member->name );
                return response()->json(['message' => 'Successfully saved your lamp post.'], 200);
            }
        }
        
       return response()->json(['message' => 'Can\'t save your lamp post! '], 404);
       
    }

    public function editLampPost($id)
    {
        $lamp_post = $this->lamp_post_repo->getLampPost($id);

        $lamp_post = json_decode($lamp_post,true);

        return response()->json(['message' => $lamp_post], 200);
    }

    public function updateLampPost(Request $request,$id)
    {
        $validator = \Validator::make($request->all(), [
            'street_id'       => 'required',
            'lamp_post_name'  => 'required',
            'qrcode'          => 'sometimes|required|unique:lamp_posts,id',
            'latitude'        => 'required',
            'longitude'       => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json(['errors'=>$validator->errors()]);
            
        } else {

            $data  = $request->all();

            $member = JWTAuth::parseToken()->toUser();

            $lamp_post = $this->lamp_post_repo->updateLampPostApi($id,$data,$member);

            if ($lamp_post->save()) {
                \Log::info('Lamp Post '.$lamp_post->id.' was updated by ' . $member->name );
                return response()->json(['message' => 'Successfully updated your lamp post.'], 200);
            }
        }
        
       return response()->json(['message' => 'Can\'t update your lamp post ! '], 404);
       
    }
    
    public function get_civil_servent_profile()
    {
        $member = JWTAuth::parseToken()->toUser();

        $member = $member->where('id',$member->id)->where('is_civil_servant',1)->select('first_name','last_name','department_id','email','dob','contact_no','fax_no','nric_code','gender','martial_status','nationality','address','position')->first();

        $member = json_decode($member,true);

        return response()->json(['message' => $member], 200);
    }

    public function get_meter_owner_profile()
    {
        $member = JWTAuth::parseToken()->toUser();

        $member = $member->where('id',$member->id)->where('is_meter_owner',1)->select('first_name','last_name','department_id','email','dob','contact_no','fax_no','nric_code','gender','martial_status','nationality','address','position')->first();

        $member = json_decode($member,true);

        return response()->json(['message' => $member], 200);
    }

    public function getMeterList()
    {
        $member = JWTAuth::parseToken()->toUser();

        if($member->is_meter_owner){

            $meter = $this->meter_repo->getOwnersMeterList($member->id);

        } else {

            $meter = $this->meter_repo->getCivilServantMeter($member->department_id);
        }

        $meter = json_decode($meter,true);

        return response()->json(['message' => $meter], 200);
    }

    public function getStreetList()
    {
        $street_list = $this->street->getStreetList();

        $street = json_decode($street_list,true);

        return response()->json(['message' => $street], 200);
    }

    public function getOwnerList()
    {
        $owner_list = $this->owner->getOwnerRepoList();

        $owner = json_decode($owner_list,true);

        return response()->json(['message' => $owner], 200);
    }

    public function getTownshipList()
    {
        $township_list = $this->township->getTownshipRepoList();

        $township = json_decode($township_list,true);

        return response()->json(['message' => $township], 200);
    } 

    public function getDistrictList()
    {
        $district_list = $this->district->getDistrictRepoList();

        $district = json_decode($district_list,true);

        return response()->json(['message' => $district], 200);
    }

    public function getVillageList()
    {
        $village_list = $this->village->getVillageRepoList();

        $village = json_decode($village_list,true);

        return response()->json(['message' => $village], 200);
    }

    public function getCommunityList()
    {
        $community_list = $this->community->getCommunityRepoList();

        $community = json_decode($community_list,true);

        return response()->json(['message' => $community], 200);
    }

    public function saveImei(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'imei_no' => 'required',
            'locations_id' => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json(['errors'=>$validator->errors()]);
        } else {

            $data  = $request->all();

            $record = Record::where('imei_no',$data['imei_no']);

            if($record->first())
            {
                $record = $record->update(array('locations_id' => $data['locations_id'] ));
            }
            else {
              $record =  new Record;
              $record->imei_no = $data['imei_no'];   
              $record->locations_id = $data['locations_id']; 
              $record->save();  
            }

            \Log::info('Record '.$record->id.' was saved');
            return response()->json(['message' => 'Successfully saved your record.'], 200);
           
        }
        return response()->json(['message' => 'Can\'t save your record ! '], 404);
    }
}
