<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Block;
use App\Models\State;
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
        $data = State::all();
        return response()->json($data);
    }
}
