<?php

namespace App\Console\Commands;

use App\Http\Controllers\PostController;
use Illuminate\Console\Command;

class DeletePost extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'delete:post';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'This command will delete post after 15 days by its created';

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
   * @return int
   */
  public function handle()
  {
    $deletePost = new PostController();
    $deletePost->deletePostByDays();
  }
}
