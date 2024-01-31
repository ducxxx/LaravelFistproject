<?php

namespace App\Repositories;

use App\Models\Club;
use Illuminate\Support\Facades\DB;

class MemberRepository
{
    const PER_PAGE = 10;
    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllMembers()
    {
        return DB::table('member')->paginate(self::PER_PAGE);
    }

    /**
     * @param int $id
     * @return object|null
     */
    public function getClubMemberDetail(int $id)
    {
        return DB::table('member')
            ->select('member.*') // TODO: liệt kê những column được dùng
            ->where('member.id', $id)
            ->first();
    }

    /**
     * @param $phoneNumber
     * @return object|null
     */
    public function getMemberByPhoneNumber($phoneNumber)
    {
        return DB::table('member')
            ->select(
                'member.phone_number',
                'member.full_name',
                'member.address'
            )
            ->where('member.phone_number', $phoneNumber)
            ->first();
    }
}
