<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display all the static pages when authenticated
     *
     * @param string $page
     * @return \Illuminate\View\View
     */
    public function index(string $page)
    {
        if (view()->exists("pages.{$page}")) {
            return view("pages.{$page}");
        }

        return abort(404);
    }

    public function vr()
    {
        return view("pages.virtual-reality");
    }

    public function rtl()
    {
        return view("pages.rtl");
    }

    public function profile()
    {
        return view("pages.profile-static");
    }

    public function signin()
    {
        return view("pages.sign-in-static");
    }

    public function signup()
    {
        return view("pages.sign-up-static");
    }

    public function inventory()
    {
        return view("pages.inventory");
    }

    public function schedules()
    {
        return view("pages.schedule");
    }

    public function patients()
    {
        return view("pages.patients");
    }

    public function cardiacDrugs()
    {
        return view("pages.inventory-cardiac-drugs");
    }

    public function antibiotics()
    {
        return view("pages.inventory-antibiotics");
    }

    public function antiInflammatory()
    {
        return view("pages.inventory-anti-inflammatory");
    }

    public function earMeds()
    {
        return view("pages.inventory-ear-meds");
    }

    public function topicals()
    {
        return view("pages.inventory-topicals");
    }
}
