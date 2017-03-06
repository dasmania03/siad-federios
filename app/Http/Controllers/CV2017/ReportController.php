<?php

namespace Siad\Http\Controllers\CV2017;

use Siad\CV2017\Athlete;
use Siad\Sport;
use Siad\CV2017\Venta;
use Siad\CV2017\Inscription;
use Siad\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function getReportActiveInscription() {

        $data = Inscription::with('athlete', 'athlete.agent', 'product', 'product.sport', 'user')
            ->where('status', '=', '1')
            ->orWhere('status', '=', '3')
            ->orWhere('status', '=', '4')
            ->get();

        return view('cv2017.report.active-inscription', compact('data'));
    }
    
    public function getSummary(){
        $summary = [];
        
        $total_sale = Venta::totalsale();
        $today_sale = Venta::todaysale();
        
        $t_ins = Inscription::totalinscription();
        $t_ins_free = Inscription::totalinscriptionfree();
        $t_ins_paid = Inscription::totalinscriptionpaid();
        $t_ins_exo = Inscription::totalinscriptionexo();
        $without_discount = Inscription::salewithoutdiscount();
        $discount_30 = Inscription::salediscount30();
        $discount_50 = Inscription::salediscount50();

        $sports = Sport::all();
        
        $inscriptions = Inscription::with('athlete', 'athlete.agent', 'product', 'product.sport', 'user')
            ->where('status', '=', '1')
            ->orWhere('status', '=', '3')
            ->orWhere('status', '=', '4')
            ->get();

        foreach ($sports as $sport) {
            $temp_summary = [
                'total_ins' => 0,
                'total_ins_m' => 0,
                'total_ins_f' => 0,
                'total_sale' => 0,
                'discount_0' => 0,
                'discount_1' => 0,
                'discount_2' => 0,
                'discount_3' => 0,
                'ins_free' => 0,
                'ins_paid' => 0,
                'ins_exo' => 0,
            ];
            foreach ($inscriptions as $ins) {
                if ($ins->product->sport->name == $sport->name) {
                    $temp_summary['total_ins']++;
                    $temp_summary['total_sale'] += $ins->paid_total;
                    if ($ins->athlete->gender == 'M') {
                        $temp_summary['total_ins_m']++;
                    } else {
                        $temp_summary['total_ins_f']++;
                    }
                    if($ins->status == 1) { $temp_summary['ins_free']++; }
                    if($ins->status == 3) { $temp_summary['ins_paid']++; }
                    if($ins->status == 4) { $temp_summary['ins_exo']++; }
                    if($ins->discount == 0) { $temp_summary['discount_0']++; }
                    if($ins->discount == 1) { $temp_summary['discount_1']++; }
                    if($ins->discount == 2) { $temp_summary['discount_2']++; }
                    if($ins->discount == 3) { $temp_summary['discount_3']++; }
                }
            }
            $summary[$sport->name] = $temp_summary;
        }

        $data = [
            'total_sale' => $total_sale,
            'today_sale' => $today_sale,
            't_ins' => $t_ins,
            't_ins_free' => $t_ins_free,
            't_ins_paid' => $t_ins_paid,
            't_ins_exo' => $t_ins_exo,
            'without_discount' => $without_discount,
            'discount_30' => $discount_30,
            'discount_50' => $discount_50,
            'summary_ins' => $summary,
            'sizes' => $this->getSize()
        ];

        return view('cv2017.summary', compact('data'));
    }
    
    public function getSize(){
        $sizes = [];
        $g = $p = $e = 0;

        $athletes = Athlete::with('inscriptions')->get();

        foreach ($athletes as $athlete) {
            if (array_key_exists( $athlete->size, $sizes )) {

                foreach ($athlete->inscriptions as $inscription) {
                    if ($inscription->status == 1) {
                        $g++;
                    } else if ($inscription->status == 3) {
                        $p++;
                    } else if ($inscription->status == 4) {
                        $e++;
                    }
                }

                if ($p > 0) {
                    $sizes[$athlete->size]['P'] = $sizes[$athlete->size]['P'] + $p;
                } else if ($g > 0) {
                    $sizes[$athlete->size]['G'] = $sizes[$athlete->size]['G'] + 1;
                } else if ($e > 0) {
                    $sizes[$athlete->size]['E'] = $sizes[$athlete->size]['E'] + 1;
                }
                $g = $p = $e = 0;

            } else {
                foreach ($athlete->inscriptions as $inscription) {
                    if ($inscription->status == 1) {
                        $g++;
                    } else if ($inscription->status == 3) {
                        $p++;
                    } else if ($inscription->status == 4) {
                        $e++;
                    }
                }

                if ($p > 0) {
                    $sizes[$athlete->size] = [
                        'P' => $p,
                        'G' => 0,
                        'E' => 0
                    ];
                } else if ($g > 0) {
                    $sizes[$athlete->size] = [
                        'P' => 0,
                        'G' => 1,
                        'E' => 0
                    ];
                } else if ($e > 0) {
                    $sizes[$athlete->size] = [
                        'P' => 0,
                        'G' => 0,
                        'E' => 1
                    ];
                }
                $g = $p = $e = 0;
            }
        }

        ksort($sizes);

        return [
            'sizes' => $sizes
        ];

    }
}
