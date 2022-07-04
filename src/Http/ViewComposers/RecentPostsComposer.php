<?php

namespace webkurcom\whatsapp\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class RecentPostsComposer extends Controller
{
  private $posts;

  public function __construct() {
    $this->posts = 10;
  }

  public function compose(View $view) {
    $view->with('posts', 10);
  }

}