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
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class OrderService
{
    private $orderRepository;
    private $orderDetailRepository;
    const BOOK_MAX_BORROW = 3;

    public function __construct(OrderRepository $orderRepository, OrderDetailRepository $orderDetailRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->orderDetailRepository = $orderDetailRepository;
    }

    /**
     * @param $request
     * @param $user
     * @return array|int
     */
    public function createOrder($request, $user)
    {
        $clubBookIds = json_decode($request->clubBook);
        $response = ['isBorrow' => false, 'message' => ''];

        // validation can't borrow
        if (count($clubBookIds) > self::BOOK_MAX_BORROW) {
            $response['message'] = 'Can Not Borrow, You Borrowing Max 3 books';
            return $response;
        }
        $memberId = $this->orderRepository->checkUserMember($user->id);
        if ($user->is_active == User::ACTIVE) {
            if (!$memberId) {
                $memberId = $this->orderRepository->createNewMemberForOrderOnline($request, $user);
            }
            $memberId = $memberId->id;
            $countBookBorrowing = $this->orderRepository->countBookBorrowing($memberId);
            if ($countBookBorrowing < self::BOOK_MAX_BORROW) {
                if (count($clubBookIds) + $countBookBorrowing <= self::BOOK_MAX_BORROW) {
                    $checkBook = $this->checkCurrentCountBookOnline($clubBookIds);
                    if ($checkBook['isBorrow'] == true) {
                        $this->orderRepository->orderOnlineCreate($request, $memberId);
                        $response['isBorrow'] = true;
                        $response['message'] = 'Borrowing success';
                    } else {
                        $response['isBorrow'] = $checkBook['isBorrow'];
                        $response['message'] = $checkBook['message'];
                    }
                } else {
                    $response['message'] = 'Can Not Borrow ' .
                        count($clubBookIds) . ' Book, You Borrow Max 3 books but Now you are borrowing ' .
                        $countBookBorrowing . ' books';
                }
            } else {
                $response['message'] = 'Can Not Borrow, You Borrowing 3 books';
            }
        } else {
            $response['message'] = 'You must verify account';
        }
        return $response;
    }

    public function getClubBookName($clubBookId)
    {
        return $this->orderRepository->getClubBookName($clubBookId);
    }

    public function getOrderByUserId($userId)
    {
        return $this->orderRepository->getOrderByUserId($userId);
    }

    public function getOrderList()
    {
        return $this->orderRepository->getOrderList();
    }

    public function orderConfirm(int $id)
    {
        return $this->orderRepository->orderConfirm($id);
    }

    public function orderReturn(int $id)
    {
        return $this->orderRepository->orderReturn($id);
    }

    public function getUser()
    {
        return $this->orderRepository->getUser();
    }

    /**
     * @param $request
     * @return array
     */
    public function orderOfflineCreate($request)
    {
        $clubBookIds = $request->input('club_book_ids');
        $phoneNumber = $request->input('phone_number');
        $response = ['isBorrow' => false, 'message' => ''];

        // validation can't borrow
        if (count($clubBookIds) > self::BOOK_MAX_BORROW) {
            $response['message'] = 'Can Not Borrow, You Borrowing Max 3 books';
            return $response;
        }

        $checkExistPhoneNumber = $this->orderRepository->checkNewMember($phoneNumber);
        // check new member
        if ($checkExistPhoneNumber) {
            $countBookBorrowing = $this->orderRepository->countBookBorrowing($checkExistPhoneNumber->id);
            if ($countBookBorrowing < self::BOOK_MAX_BORROW) {
                if (count($clubBookIds) + $countBookBorrowing <= self::BOOK_MAX_BORROW) {
                    $checkBook = $this->checkCurrentCountBook($clubBookIds);
                    if ($checkBook['isBorrow'] == true) {
                        $this->orderRepository->orderOfflineCreate($request, $checkExistPhoneNumber->id);
                        $response['isBorrow'] = true;
                        $response['message'] = 'Borrowing success';
                    } else {
                        $response['isBorrow'] = $checkBook['isBorrow'];
                        $response['message'] = $checkBook['message'];
                    }
                } else {
                    $response['message'] = 'Can Not Borrow ' .
                        count($clubBookIds) . ' Book, You Borrow Max 3 books but Now you are borrowing ' .
                        $countBookBorrowing . ' books';
                }
            } else {
                $response['message'] = 'Can Not Borrow, You Borrowing 3 books';
            }

        } else {
            $newMember = $this->orderRepository->createNewMember($request);
            $checkBook = $this->checkCurrentCountBook($clubBookIds);
            if ($checkBook['isBorrow'] == true) {
                $this->orderRepository->orderOfflineCreate($request, $newMember->id);
                $response['isBorrow'] = true;
                $response['message'] = 'Borrowing success';
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

    public function getListBookCalendar()
    {
        return $this->orderRepository->getListBookCalendar();
    }
}
