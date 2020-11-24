<?php

namespace App\Http\Controllers;

use App\Repositories\DashboardRepository;
use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * @var Dashboard
     */
    private $repository;

    public function __construct(DashboardRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index() {
        return view('dashboard.index');
    }
}
