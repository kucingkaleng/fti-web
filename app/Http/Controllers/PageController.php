<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Cookie;

class PageController extends Controller
{
  protected $page = null;
  protected $data = [];

  function __construct () {
    $this->page = request()->route('page') == null ? 'index' : request()->route('page');
    $this->http = new Client();

    // Pages
    $this->data['pages'] = $this->getPages();

    // Page Info
    $this->data['page_info'] = $this->getPageInfo();

    // Meta
    $this->data['meta'] = $this->getPageInfo()->meta;

    // Global
    $this->data['global_info'] = $this->getGlobalInfo();
  }

  public function index ($page = null) {
    return view('pages.'.$this->page, $this->data);
  }

  public function single ($page = null) {
    return view('pages.'.$this->page.'-single', $this->data);
  }

  private function getPageInfo () {
    $page_info = $this->http->get(config('app.api') . '/items/pages?filter[key]=' . $this->page)->getBody()->getContents();
    return json_decode($page_info)->data[0];
  }

  private function getPages () {
    $pages = $this->http->get(config('app.api') . '/items/pages?status=published&fields=name,key,url')->getBody()->getContents();
    return json_decode($pages)->data;
  }

  private function getGlobalInfo () {
    $global =  $this->http->get(config('app.api') . '/items/organization')->getBody()->getContents();
    return json_decode($global)->data[0];
  }

  public function login () {
    $request = new HTTP('http://cms.fittechinova.com/fti-web/auth/authenticate');
    $request->setRequestType('POST');
    $request->setPostFields([
        'email' => 'ade@fittechinova.com',
        'password' => 'rosetta151',
        'mode' => 'cookie'
    ]);
    $request->execute();
    return response($request->getResponse())->withCookie(cookie()->forget('directus-fti-web-session'));;
  }
}
