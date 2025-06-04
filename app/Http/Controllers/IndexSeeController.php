<?php

namespace App\Http\Controllers;
use App\Events\Email;

use Illuminate\Http\Request;

class IndexSeeController extends Controller
{



         public function showprovince()
    {
        return view('indexprovince');
    }
         public function showwork()
    {
        return view('indexwork');
    }

            public function showmachine()
        {
            return view('index');
        }
    
            public function showmachinetype()
        {
            return view('indextype');
        }

           public function showmachinework()
        {
            return view('indexmachinework');
        }

}
