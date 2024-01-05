<?php

namespace App\Repositories;

use App\Models\Club;
use Illuminate\Support\Facades\DB;

class MemberRepository
{

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllMembers()
    {
        return DB::table('member')->paginate(10);
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|object|null
     */
    public function getClubMemberDetail(int $id)
    {
        $clubMemberDetail = DB::table('member')
            ->where('member.id', $id)
            ->select('member.*')
            ->first();
        return $clubMemberDetail;
    }

    public function getMemberByPhoneNumber($phoneNumber)
    {
        $clubMemberDetail = DB::table('member')
            ->where('member.phone_number', $phoneNumber)
            ->select('member.*')
            ->first();
        return $clubMemberDetail;
    }
}
