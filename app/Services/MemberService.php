<?php

namespace App\Services;

use App\Repositories\ClubRepository;
use App\Repositories\MemberRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class MemberService
{
    private $memberRepository;

    public function __construct(MemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    /**
     * @return mixed
     */
    public function getAllClubMember()
    {
        return $this->memberRepository->getAllMembers();
    }

    /**
     * @param int $id
     * @return object|null
     */
    public function getClubMemberDetail(int $id)
    {
        return $this->memberRepository->getClubMemberDetail($id);
    }

    /**
     * @param $phoneNumber
     * @return object|null
     */
    public function getMemberByPhoneNumber($phoneNumber)
    {
        return $this->memberRepository->getMemberByPhoneNumber($phoneNumber);
    }
}
