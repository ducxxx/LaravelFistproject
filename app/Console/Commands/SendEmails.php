<?php

namespace App\Console\Commands;

use App\Jobs\SendMailJob;
use App\Mail\YourMailableName;
use App\Repositories\OrderRepository;
use Illuminate\Console\Command;

class SendEmails extends Command
{
    private $orderRepository;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Lấy danh sách người nhận và nội dung email
        $listMemberMails = $this->orderRepository->getDailyMemberOutOfDate();
        // Dispatch job để gửi email cho mỗi người nhận
        $listMails = [];
        foreach ($listMemberMails as $member) {
            SendMailJob::dispatch($member['member_email'],$member['list_book'])->onQueue('email');
            $listMails[] = $member['member_email'];
        }
        $this->orderRepository->updateOverDueOrder($listMails);
        $this->info('emails sent successfully!');
    }
}
