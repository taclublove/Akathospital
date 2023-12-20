<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubMenuShow;
use App\Models\GeneralPressRelease;

class pressReleaseController extends Controller
{
    public function index() {
        $subMenuShow = SubMenuShow::all();
        $gprls = GeneralPressRelease::all();
        return view('index_template.pressRelease.prl', compact('subMenuShow','gprls'));
    }

    public function prlFetchAll() {
        $gprls = GeneralPressRelease::all();
        $output = '';

        if ($gprls->count() > 0) {
            foreach ($gprls as $gprl) {
                $output .= '<ul class="grid grid-cols-1 xl:grid-row-3 gap-y-10 gap-x-6 items-start mt-[2rem] px-[100px]">
                                <li class="relative flex flex-col sm:flex-row xl:flex-row items-start pb-[10px] ">
                                    <div class="order-1 sm:ml-3 xl:ml-3 ms-5">
                                        <h3 class="mb-1 text-dark font-semibold dark:text-slate-200">
                                            <span class="mb-1 block text-sm leading-6 text-indigo-500">' . $gprl->user->fname . ' ' . $gprl->user->lname . ' : ' . $gprl->created_at . ' : ' . $gprl->updated_at . '
                                            </span>
                                            ' . $gprl->title . '
                                        </h3>
                                        <div class="prose prose-slate prose-sm text-dark dark:prose-dark">
                                            <p>เนื้อหา</p>
                                        </div>
                                        <a class="mt-[1.5rem] group inline-flex items-center h-9 rounded-full text-sm font-semibold whitespace-nowrap px-3 focus:outline-none focus:ring-2 bg-slate-100 text-slate-700 hover:bg-slate-200 hover:text-slate-900 focus:ring-slate-500 dark:bg-slate-700 dark:text-slate-100 dark:hover:bg-slate-600 dark:hover:text-white dark:focus:ring-slate-500 mt-6"
                                            href="' . route("gprlShow", ["id" => $gprl->id]) . '">Learn more
                                        </a>
                                    </div>';

                                    if ($gprl->image != "" && $gprl->pdf == "") {
                                        $output .= '<div class="me-[2rem]">
                                                        <img src="' . asset("storage/files/images/gprls/" . $gprl->image) . '" alt="" class="mb-6 shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:w-[17rem]" width="1116" height="540">
                                                    </div>';
                                    } elseif ($gprl->image == "" && $gprl->pdf != "") {
                                        $output .= '<div class="me-[2rem]">
                                                        <img src="https://blogue.monsiteprimo.com/wp-content/uploads/2013/12/pdf-file.gif" alt="" class="mb-6 shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:w-[17rem]" width="1116" height="540">
                                                    </div>';
                                    }

                $output .= '</li></ul>';
            }
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
        }
    }

    // public function prlSearch(Request $request) {
    //     if ($request->ajax()) {
    //         $gprls = GeneralPressRelease::where(function ($query) use ($request) {
    //             $query->where('id', 'like', '%' . $request->search . '%')
    //                 ->orWhere('title', 'like', '%' . $request->search . '%');
    //         })
    //         ->with('user') // Eager load the 'user' relationship
    //         ->groupBy('id') // Group by the press release ID
    //         ->get();

    //         $output = '';

    //         if (count($gprls) > 0) {
    //             $output .= '<ul class="grid grid-cols-1 xl:grid-row-3 gap-y-10 gap-x-6 items-start mt-[2rem] px-[100px]">';

    //             foreach ($gprls as $gprl) {
    //                 $output .= '<li class="relative flex flex-col sm:flex-row xl:flex-row items-start pb-[10px] ">
    //                                 <div class="order-1 sm:ml-3 xl:ml-3 ms-5">
    //                                     <h3 class="mb-1 text-dark font-semibold dark:text-slate-200">
    //                                         <span class="mb-1 block text-sm leading-6 text-indigo-500">' . $gprl->user->fname . ' ' . $gprl->user->lname . ' : ' . $gprl->created_at . ' : ' . $gprl->updated_at . '
    //                                         </span>
    //                                         ' . $gprl->title . '
    //                                     </h3>
    //                                     <div class="prose prose-slate prose-sm text-dark dark:prose-dark">
    //                                         <p>เนื้อหา</p>
    //                                     </div>
    //                                     <a class="mt-[1.5rem] group inline-flex items-center h-9 rounded-full text-sm font-semibold whitespace-nowrap px-3 focus:outline-none focus:ring-2 bg-slate-100 text-slate-700 hover:bg-slate-200 hover:text-slate-900 focus:ring-slate-500 dark:bg-slate-700 dark:text-slate-100 dark:hover:bg-slate-600 dark:hover:text-white dark:focus:ring-slate-500 mt-6"
    //                                         href="' . route("gprlShow", ["id" => $gprl->id]) . '">Learn more
    //                                     </a>
    //                                 </div>';

    //                 if ($gprl->image != "" && $gprl->pdf == "") {
    //                     $output .= '<div class="me-[2rem]">
    //                                     <img src="' . asset("storage/files/images/gprls/" . $gprl->image) . '" alt="" class="mb-6 shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:w-[17rem]" width="1116" height="540">
    //                                 </div>';
    //                 } elseif ($gprl->image == "" && $gprl->pdf != "") {
    //                     $output .= '<div class="me-[2rem]">
    //                                     <img src="https://blogue.monsiteprimo.com/wp-content/uploads/2013/12/pdf-file.gif" alt="" class="mb-6 shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:w-[17rem]" width="1116" height="540">
    //                                 </div>';
    //                 }

    //                 $output .= '</li>';
    //             }

    //             $output .= '</ul>';
    //         } else {
    //             $output .= 'No results';
    //         }

    //         echo $output;
    //         return $output;
    //     }
    // }

    public function prlSearch(Request $request) {
        if ($request->ajax()) {
            $searchTerm = $request->search;

            $gprls = GeneralPressRelease::where('id', 'like', '%' . $searchTerm . '%')
                ->orWhere('title', 'like', '%' . $searchTerm . '%')
                ->with('user')
                // ->groupBy('id')
                ->get();

            $output = '';

            if ($gprls->count() > 0) {
                foreach ($gprls as $gprl) {
                    $output .= '<div class="result-item">';
                    $output .= '<h3>' . $gprl->title . '</h3>';
                    $output .= '<p>' . $gprl->user->fname . ' ' . $gprl->user->lname . ' : ' . $gprl->created_at . ' : ' . $gprl->updated_at . '</p>';
                    // Add other details and formatting as needed
                    $output .= '<a href="' . route("gprlShow", ["id" => $gprl->id]) . '">Learn more</a>';
                    $output .= '</div>';
                }
            } else {
                $output .= 'No results';
            }

            return $output;
        }
    }


}
