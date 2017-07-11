<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\UserInfo;
use SoapBox\Formatter\Formatter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class LogXml extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:xml';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will add user information to the xml file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $newUserInfo = UserInfo::pluck('info');
        if (! $newUserInfo->isEmpty()) {
            $userInfo = $newUserInfo->toArray();
            if (Storage::disk('local')->exists('userInfo.xml')) {
                $oldXml = Storage::get('userInfo.xml');
                $formatter = Formatter::make($oldXml, Formatter::XML);
                $oldUserInfo = $formatter->toArray();
                $oldUserInfo = $oldUserInfo['item'];
                $userInfo = array_merge($userInfo, $oldUserInfo);
            }
            $formatter = Formatter::make($userInfo, Formatter::ARR);
            $xml = $formatter->toXml();
            Storage::disk('local')->put('userInfo.xml', $xml);
            DB::table('user_info')->delete();
        }
    }
}
