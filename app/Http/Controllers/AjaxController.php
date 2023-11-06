<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Block;
use App\Models\State;
use App\Models\City;
use App\Models\VillageCouncilDevelopmentCommittee;


class AjaxController extends Controller
{
    public function getAllDistricts()
    {
        $data = District::all();
        return response()->json($data);
    }

    public function getBlocks($districtId)
    {
        $data = Block::where('district_id',$districtId)->get();
        return response()->json($data);
    }

    public function getVcdcs($blockId)
    {
        $data = VillageCouncilDevelopmentCommittee::where('block_id', $blockId)->get();
        return response()->json($data);
    }

    public function getAllStates()
    {
        $data = State::where('id', 1)->get();
        return response()->json($data);
    }

    public function getStatesForRegistration()
    {
        $data = State::all();
        return response()->json($data);
    }

    public function getCitiesByStateId($id)
    {
        $data = City::where('state_id',$id)->get();
        return response()->json($data);
    }
}
