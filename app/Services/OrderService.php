<?php
// app/Services/OrderService.php
namespace App\Services;

use App\Models\Book;
use App\Models\Member;
use App\Models\User;
use App\Repositories\OrderRepository;
use App\Repositories\OrderDetailRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class OrderService
{
    private $orderRepository;
    private $orderDetailRepository;
    const BOOK_MAX_BORROW = 3;

    /**
     * OrderService constructor.
     * @param OrderRepository $orderRepository
     * @param OrderDetailRepository $orderDetailRepository
     */
    public function __construct(OrderRepository $orderRepository, OrderDetailRepository $orderDetailRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->orderDetailRepository = $orderDetailRepository;
    }

//    /**
//     * @param $request
//     * @param $user
//     * @return array|int
//     */
//    public function createOrder($request, $user)
//    {
//        $clubBookIds = json_decode($request->clubBook);
//        $response = ['isBorrow' => false, 'message' => ''];
//
//        // validation can't borrow
//        if (count($clubBookIds) > self::BOOK_MAX_BORROW) {
//            $response['message'] = 'Can Not Borrow, You Borrowing Max 3 books';
//            return $response;
//        }
//
//        if ($user->is_active == User::ACTIVE) {
//            $memberId = $this->orderRepository->checkUserMember($user->id);
//            if (!$memberId) {
//                $memberId = $this->orderRepository->createNewMemberForOrderOnline($request->all(), $user);
//            }
//            $memberId = $memberId->id;
//            $countBookBorrowing = $this->orderRepository->countBookBorrowing($memberId);
//            if ($countBookBorrowing < self::BOOK_MAX_BORROW) {
//                if (count($clubBookIds) + $countBookBorrowing <= self::BOOK_MAX_BORROW) {
//                    $checkBook = $this->checkCurrentCountBookOnline($clubBookIds);
//                    if ($checkBook['isBorrow'] == true) {
//                        $this->orderRepository->orderOnlineCreate($request->all(), $memberId);
//                        Mail::to('ducnmhe@gmail.com')->send(new \App\Mail\NewOrderCreate());
//                        $response['isBorrow'] = true;
//                        $response['message'] = 'Borrowing success';
//                    } else {
//                        $response['isBorrow'] = $checkBook['isBorrow'];
//                        $response['message'] = $checkBook['message'];
//                    }
//                } else {
//                    $response['message'] = 'Can Not Borrow ' .
//                        count($clubBookIds) . ' Book, You Borrow Max 3 books but Now you are borrowing ' .
//                        $countBookBorrowing . ' books';
//                }
//            } else {
//                $response['message'] = 'Can Not Borrow, You Borrowing 3 books';
//            }
//        } else {
//            $response['message'] = 'You must verify account';
//        }
//        return $response;
//    }

    public function createOrder($request, $user)
    {
        $clubBookIds = json_decode($request->clubBook);
        $response = ['isBorrow' => false, 'message' => ''];

        // validation can't borrow
        if (count($clubBookIds) > self::BOOK_MAX_BORROW) {
            $response['message'] = 'Can Not Borrow, You Borrowing Max 3 books';
            return $response;
        }

        // check verify account
        if ($user->is_active != User::ACTIVE) {
            $response['message'] = 'You must verify account';
            return $response;
        }

        $memberId = $this->orderRepository->checkUserMember($user->id);
        if (!$memberId) {
            $memberId = $this->orderRepository->createNewMemberForOrderOnline($request->all(), $user);
        }

        $memberId = $memberId->id;
        $countBookBorrowing = $this->orderRepository->countBookBorrowing($memberId);
        if ($countBookBorrowing >= self::BOOK_MAX_BORROW) {
            $response['message'] = 'Can Not Borrow, You Borrowing 3 books';
            return $response;
        }

        if (count($clubBookIds) + $countBookBorrowing > self::BOOK_MAX_BORROW) {
            $response['message'] = 'Can Not Borrow ' . count($clubBookIds) . ' Book, You Borrow Max 3 books but Now you are borrowing ' . $countBookBorrowing . ' books';
            return $response;
        }

        $checkBook = $this->checkCurrentCountBookOnline($clubBookIds);
        if ($checkBook['isBorrow']) {
            $this->orderRepository->orderOnlineCreate($request->all(), $memberId);
            // TODO : đang hardcode email
            Mail::to('ducnmhe@gmail.com')->send(new \App\Mail\NewOrderCreate());
            $response['isBorrow'] = true;
            $response['message'] = 'Borrowing success';
        } else {
            $response['isBorrow'] = $checkBook['isBorrow'];
            $response['message'] = $checkBook['message'];
        }

        return $response;
    }


//    public function checkOrderOnline($request, $user){
//        $clubBookIds = $request->input('orders');
//        $response = ['isBorrow' => false, 'message' => ''];
//
//        // validation can't borrow
//        if (count($clubBookIds) > self::BOOK_MAX_BORROW) {
//            $response['message'] = 'Can Not Borrow, You Borrowing Max 3 books';
//            return $response;
//        }
//        $memberId = $this->orderRepository->checkUserMember($user->id);
//        if ($user->is_active == User::ACTIVE) {
//            if (!$memberId) {
//                $response['isBorrow'] = true;
//                return $response;
//            }
//            $memberId = $memberId->id;
//            $countBookBorrowing = $this->orderRepository->countBookBorrowing($memberId);
//            if ($countBookBorrowing < self::BOOK_MAX_BORROW) {
//                if (count($clubBookIds) + $countBookBorrowing <= self::BOOK_MAX_BORROW) {
//                    $checkBook = $this->checkCurrentCountBook($clubBookIds);
//                    if ($checkBook['isBorrow'] == true) {
//                        $response['isBorrow'] = true;
//                        return $response;
//                    } else {
//                        $response['isBorrow'] = $checkBook['isBorrow'];
//                        $response['message'] = $checkBook['message'];
//                    }
//                } else {
//                    $response['message'] = 'Can Not Borrow ' .
//                        count($clubBookIds) . ' Book, You Borrow Max 3 books but Now you are borrowing ' .
//                        $countBookBorrowing . ' books';
//                }
//            } else {
//                $response['message'] = 'Can Not Borrow, You Borrowing 3 books';
//            }
//        } else {
//            $response['message'] = 'You must verify account';
//        }
//        return $response;
//    }

    /**
     * @param $request
     * @param $user
     * @return array
     */
    public function checkOrderOnline($request, $user)
    {
        // TODO: chuyển request input sang controller
        $clubBookIds = $request->input('orders');
        $response = ['isBorrow' => false, 'message' => ''];

        // Validation can't borrow
        if (count($clubBookIds) > self::BOOK_MAX_BORROW) {
            $response['message'] = 'Can Not Borrow, You Borrowing Max 3 books';
            return $response;
        }

        if ($user->is_active != User::ACTIVE) {
            $response['message'] = 'You must verify account';
            return $response;
        }

        $member = $this->orderRepository->checkUserMember($user->id);
        if (!$member) {
            $response['isBorrow'] = true;
            return $response;
        }

        $memberId = $member->id;
        $countBookBorrowing = $this->orderRepository->countBookBorrowing($memberId);
        if ($countBookBorrowing >= self::BOOK_MAX_BORROW) {
            $response['message'] = 'Can Not Borrow, You Borrowing 3 books';
            return $response;
        }

        if (count($clubBookIds) + $countBookBorrowing > self::BOOK_MAX_BORROW) {
            $response['message'] = 'Can Not Borrow ' .
                count($clubBookIds) . ' Book, You Borrow Max 3 books but Now you are borrowing ' .
                $countBookBorrowing . ' books';
            return $response;
        }

        $checkBook = $this->checkCurrentCountBook($clubBookIds);
        if ($checkBook['isBorrow']) {
            $response['isBorrow'] = true;
        } else {
            $response['isBorrow'] = $checkBook['isBorrow'];
            $response['message'] = $checkBook['message'];
        }

        return $response;
    }

    /**
     * @param $clubBookId
     * @return \Illuminate\Support\Collection
     */
    public function getClubBookName($clubBookId)
    {
        return $this->orderRepository->getClubBookName($clubBookId);
    }

    /**
     * @param $userId
     * @return \Illuminate\Support\Collection
     */
    public function getOrderByUserId($userId)
    {
        return $this->orderRepository->getOrderByUserId($userId);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getOrderList()
    {
        return $this->orderRepository->getOrderList();
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function orderConfirm(int $id)
    {
        return $this->orderRepository->orderConfirm($id);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function orderReturn(int $id)
    {
        return $this->orderRepository->orderReturn($id);
    }

    /**
     * @param $userId
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|object|null
     */
    public function getUser($userId)
    {
        return $this->orderRepository->getUser($userId);
    }

//    /**
//     * @param $request
//     * @return array
//     */
//    public function orderOfflineCreate($request)
//    {
//        $clubBookIds = $request->input('club_book_ids');
//        $phoneNumber = $request->input('phone_number');
//        $response = ['isBorrow' => false, 'message' => ''];
//
//        // validation can't borrow
//        if (count($clubBookIds) > self::BOOK_MAX_BORROW) {
//            $response['message'] = 'Can Not Borrow, You Borrowing Max 3 books';
//            return $response;
//        }
//
//        $checkExistPhoneNumber = $this->orderRepository->checkNewMember($phoneNumber);
//        // check new member
//        if ($checkExistPhoneNumber) {
//            $countBookBorrowing = $this->orderRepository->countBookBorrowing($checkExistPhoneNumber->id);
//            if ($countBookBorrowing < self::BOOK_MAX_BORROW) {
//                if (count($clubBookIds) + $countBookBorrowing <= self::BOOK_MAX_BORROW) {
//                    $checkBook = $this->checkCurrentCountBook($clubBookIds);
//                    if ($checkBook['isBorrow'] == true) {
//                        $this->orderRepository->orderOfflineCreate($request->all(), $checkExistPhoneNumber->id);
//                        $response['isBorrow'] = true;
//                        $response['message'] = 'Borrowing success';
//                    } else {
//                        $response['isBorrow'] = $checkBook['isBorrow'];
//                        $response['message'] = $checkBook['message'];
//                    }
//                } else {
//                    $response['message'] = 'Can Not Borrow ' .
//                        count($clubBookIds) . ' Book, You Borrow Max 3 books but Now you are borrowing ' .
//                        $countBookBorrowing . ' books';
//                }
//            } else {
//                $response['message'] = 'Can Not Borrow, You Borrowing 3 books';
//            }
//
//        } else {
//            $newMember = $this->orderRepository->createNewMember($request->all());
//            $checkBook = $this->checkCurrentCountBook($clubBookIds);
//            if ($checkBook['isBorrow'] == true) {
//                $this->orderRepository->orderOfflineCreate($request->all(), $newMember->id);
//                $response['isBorrow'] = true;
//                $response['message'] = 'Borrowing success';
//            } else {
//                $response['isBorrow'] = $checkBook['isBorrow'];
//                $response['message'] = $checkBook['message'];
//            }
//        }
//
//        return $response;
//    }

    /**
     * @param $request
     * @return array
     */
    public function orderOfflineCreate($request)
    {
        // TODO: chuyển request input sang controller
        $clubBookIds = $request->input('club_book_ids');
        $phoneNumber = $request->input('phone_number');
        $response = ['isBorrow' => false, 'message' => ''];

        // Validation can't borrow
        if (count($clubBookIds) > self::BOOK_MAX_BORROW) {
            $response['message'] = 'Can Not Borrow, You Borrowing Max 3 books';
            return $response;
        }

        $checkExistPhoneNumber = $this->orderRepository->checkNewMember($phoneNumber);
        // Check new member
        if ($checkExistPhoneNumber) {
            $countBookBorrowing = $this->orderRepository->countBookBorrowing($checkExistPhoneNumber->id);
            if ($countBookBorrowing >= self::BOOK_MAX_BORROW) {
                $response['message'] = 'Can Not Borrow, You Borrowing 3 books';
            } elseif (count($clubBookIds) + $countBookBorrowing > self::BOOK_MAX_BORROW) {
                $response['message'] = 'Can Not Borrow ' .
                    count($clubBookIds) . ' Book, You Borrow Max 3 books but Now you are borrowing ' .
                    $countBookBorrowing . ' books';
            } else {
                $checkBook = $this->checkCurrentCountBook($clubBookIds);
                if ($checkBook['isBorrow']) {
                    $this->orderRepository->orderOfflineCreate($request->all(), $checkExistPhoneNumber->id);
                    $response['isBorrow'] = true;
                    $response['message'] = 'Borrowing success';
                } else {
                    $response['isBorrow'] = $checkBook['isBorrow'];
                    $response['message'] = $checkBook['message'];
                }
            }
        } else {
            $newMember = $this->orderRepository->createNewMember($request->all());
            $checkBook = $this->checkCurrentCountBook($clubBookIds);
            if ($checkBook['isBorrow']) {
                $this->orderRepository->orderOfflineCreate($request->all(), $newMember->id);
                $response['isBorrow'] = true;
                $response['message'] = 'Borrowing success';
            } else {
                $response['isBorrow'] = $checkBook['isBorrow'];
                $response['message'] = $checkBook['message'];
            }
        }

        return $response;
    }


//    /**
//     * @param $request
//     * @return array
//     */
//    public function checkOrderOffline($request){
//        $clubBookIds = $request->input('club_book_ids');
//        $phoneNumber = $request->input('phone_number');
//        $response = ['isBorrow' => false, 'message' => ''];
//
//        // validation can't borrow
//        if (count($clubBookIds) > self::BOOK_MAX_BORROW) {
//            $response['message'] = 'Can Not Borrow, You Borrowing Max 3 books';
//            return $response;
//        }
//
//        $checkExistPhoneNumber = $this->orderRepository->checkNewMember($phoneNumber);
//        // check new member
//        if ($checkExistPhoneNumber) {
//            $countBookBorrowing = $this->orderRepository->countBookBorrowing($checkExistPhoneNumber->id);
//            if ($countBookBorrowing < self::BOOK_MAX_BORROW) {
//                if (count($clubBookIds) + $countBookBorrowing <= self::BOOK_MAX_BORROW) {
//                    $checkBook = $this->checkCurrentCountBook($clubBookIds);
//                    if ($checkBook['isBorrow'] == true) {
//                        $response['isBorrow'] = true;
//                        return $response;
//                    } else {
//                        $response['isBorrow'] = $checkBook['isBorrow'];
//                        $response['message'] = $checkBook['message'];
//                    }
//                } else {
//                    $response['message'] = 'Can Not Borrow ' .
//                        count($clubBookIds) . ' Book, You Borrow Max 3 books but Now you are borrowing ' .
//                        $countBookBorrowing . ' books';
//                }
//            } else {
//                $response['message'] = 'Can Not Borrow, You Borrowing 3 books';
//            }
//            return $response;
//        } else {
//            $checkBook = $this->checkCurrentCountBook($clubBookIds);
//            if ($checkBook['isBorrow'] == true) {
//                $response['isBorrow'] = true;
//                return $response;
//            } else {
//                $response['isBorrow'] = $checkBook['isBorrow'];
//                $response['message'] = $checkBook['message'];
//            }
//        }
//        return $response;
//    }

    /**
     * @param $request
     * @return array
     */
    public function checkOrderOffline($request)
    {
        // TODO: chuyển request input sang controller
        $clubBookIds = $request->input('club_book_ids');
        $phoneNumber = $request->input('phone_number');
        $response = ['isBorrow' => false, 'message' => ''];

        // Validation can't borrow
        if (count($clubBookIds) > self::BOOK_MAX_BORROW) {
            $response['message'] = 'Can Not Borrow, You Borrowing Max 3 books';
            return $response;
        }

        $checkExistPhoneNumber = $this->orderRepository->checkNewMember($phoneNumber);
        // Check new member
        if ($checkExistPhoneNumber) {
            $countBookBorrowing = $this->orderRepository->countBookBorrowing($checkExistPhoneNumber->id);
            if ($countBookBorrowing >= self::BOOK_MAX_BORROW) {
                $response['message'] = 'Can Not Borrow, You Borrowing 3 books';
            } elseif (count($clubBookIds) + $countBookBorrowing > self::BOOK_MAX_BORROW) {
                $response['message'] = 'Can Not Borrow ' .
                    count($clubBookIds) . ' Book, You Borrow Max 3 books but Now you are borrowing ' .
                    $countBookBorrowing . ' books';
            } else {
                $checkBook = $this->checkCurrentCountBook($clubBookIds);
                if ($checkBook['isBorrow']) {
                    $response['isBorrow'] = true;
                } else {
                    $response['isBorrow'] = $checkBook['isBorrow'];
                    $response['message'] = $checkBook['message'];
                }
            }
        } else {
            $checkBook = $this->checkCurrentCountBook($clubBookIds);
            if ($checkBook['isBorrow']) {
                $response['isBorrow'] = true;
            } else {
                $response['isBorrow'] = $checkBook['isBorrow'];
                $response['message'] = $checkBook['message'];
            }
        }

        return $response;
    }

    /**
     * @param $bookIds
     * @return array
     */
    private function checkCurrentCountBook($bookIds)
    {
        $message = '';
        foreach ($bookIds as $bookId) {
            $current_count = $this->orderRepository->currentCountBook($bookId);
            if ($current_count->current_count <= 0) {
                $message = $message . ' ' . $current_count->book_name . ',';
            }
        }
        if ($message == '') {
            return ['isBorrow' => true, 'message' => $message];
        } else {
            $message = $message . ' do not have in club';
            return ['isBorrow' => false,
                'message' => $message];
        }
    }

    /**
     * @param $clubBookIds
     * @return array
     */
    public function getClubBookId($clubBookIds)
    {
        $clubBookIds = json_decode($clubBookIds);
        $listClubBookIds = [];
        foreach ($clubBookIds as $bookId) {
            $listClubBookIds[] = $bookId->id;
        }
        return $listClubBookIds;
    }

    /**
     * @param $bookIds
     * @return array
     */
    private function checkCurrentCountBookOnline($bookIds)
    {
        $message = '';
        foreach ($bookIds as $bookId) {
            $current_count = $this->orderRepository->currentCountBook($bookId->id);
            if ($current_count->current_count <= 0) {
                $message = $message . ' ' . $current_count->book_name . ',';
            }
        }
        if ($message == '') {
            return ['isBorrow' => true, 'message' => $message];
        } else {
            $message = $message . ' do not have in club';
            return ['isBorrow' => false,
                'message' => $message];
        }
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getListBookCalendar()
    {
        return $this->orderRepository->getListBookCalendar();
    }

    /**
     * @return array
     */
    public function getDailyMemberOutOfDate()
    {
        return $this->orderRepository->getDailyMemberOutOfDate();
    }
}
