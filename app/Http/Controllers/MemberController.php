<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateMemberRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Member;
use App\Models\User;
use App\Services\MemberService;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class MemberController extends Controller
{
    protected $memberService;

    public function __construct(MemberService $memberService)
    {
        $this->memberService = $memberService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showMemberListPage()
    {
        $members = $this->memberService->getAllClubMember();
        if ($members) {
            return view('pages.member.ClubMemberList', compact('members'));
        }

        $empty = "Don't have Club Member";
        return view('pages.EmptyPage',compact($empty))->with('status',404);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function memberDetail(int $id)
    {
        $memberDetail = $this->memberService->getClubMemberDetail($id);
        $carbonDate = Carbon::parse($memberDetail->birth_date);
        $memberDetail->birth_date = $carbonDate->toDateString();
        if ($memberDetail) {
            return view('pages.member.MemberDetail', compact('memberDetail'));
        }

        $empty = "Don't have Member";
        return view('pages.EmptyPage',compact($empty))->with('status',404);
    }


    public function updateMemberDetail(Request $request, int $id)
    {
        $updateMemberRequest = new UpdateMemberRequest();
        $validator = $updateMemberRequest->validation($request);
        if ($validator->fails()) {
            Session::flash('error', 'Update error');
            return Redirect::back()->withErrors($validator->errors())->withInput();
        }
        $member = Member::where('id',$id)->first();
        if ($member){
            $member->phone_number = $request->input('phoneNumber');
            $member->email = $request->input('email');
            $member->full_name = $request->input('fullName');
            $member->birth_date = $request->input('birthDate');
            $member->address = $request->input('address');
            $member->save();
        }
        $user = User::where('id',$member->user_id)->first();
        if($user){
            $user->phone_number = $request->input('phoneNumber');
            $user->email = $request->input('email');
            $user->full_name = $request->input('fullName');
            $user->birth_date = $request->input('birthDate');
            $user->address = $request->input('address');
            $user->save();
        }
        Session::flash('success', 'Update success');
        return back();
    }

    public function getMemberByPhoneNumber(string $phoneNumber)
    {
        $memberDetail = $this->memberService->getMemberByPhoneNumber($phoneNumber);
        return $memberDetail;
    }

}
