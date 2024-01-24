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
        $listMember = $this->orderRepository->getDailyMemberOutOfDate();
        $listOrderIdUpdate = [];
        foreach ($listMember as $member){
            if ($member->order_status == 1) {
                $listOrderIdUpdate[] = $member->order_id;
            }
            $mailable = new YourMailableName($member);

            // Dispatch the job for each email
            dispatch(new SendMailJob($mailable->to($member->member_email)));
        }
        $this->orderRepository->updateOverDueOrder($listOrderIdUpdate);
        $this->info('Emails dispatched successfully.');
        return 0;
    }
}
