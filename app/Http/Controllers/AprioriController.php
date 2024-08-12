<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Phpml\Association\Apriori;

class AprioriController extends Controller
{
    public function setupPerhitunganApriori()
    {
        $user_id = Auth()->user()->id;

        $transactions = DB::table('penjualans')
            ->where('penjualans.umkm_id', '=', $user_id)
            ->select('penjualans.no_faktur', 'penjualans.nama_produk', 'penjualans.letak_barang')
            ->get();

        // Konversi data ke dalam format yang sesuai
        $formattedTransactions = [];
        foreach ($transactions as $transaction) {
            // Pastikan setiap transaksi adalah array yang terkait dengan no_faktur
            $formattedTransactions[$transaction->no_faktur][] = [
                'nama_produk' => $transaction->nama_produk,
                'letak_barang' => $transaction->letak_barang,
            ];
        }

        $cooccurrenceData = $this->calculateCooccurrenceFrequency($formattedTransactions);

        $individualCounts = $cooccurrenceData['individualCounts'];
        $cooccurrenceCounts = $cooccurrenceData['cooccurrenceCounts'];
        $cooccurrence3Counts = $cooccurrenceData['cooccurrence3Counts'];
        // dd($individualCounts, $cooccurrenceCounts, $cooccurrence3Counts);

        // planogram
        arsort($cooccurrenceCounts);
        arsort($cooccurrence3Counts);

        $planogramRecommendations = [];
        foreach ($cooccurrenceCounts as $pair => $count) {
            $items = explode(',', $pair);

            // Dapatkan informasi letak barang dari $individualCounts
            $letakBarang1 = $individualCounts[$items[0]]['letak_barang'];
            $letakBarang2 = $individualCounts[$items[1]]['letak_barang'];

            $recommendation = "<strong>{$items[0]}</strong> di {$letakBarang1} dan <strong>{$items[1]}</strong> di {$letakBarang2} Sering dibeli bersamaan <br></br> <strong>Keterangan : </strong> sehingga sebaiknya diletakkan berdekatan dalam <strong style='color:#1D55D9;'>Satu Rak</strong> agar pelanggan dapat menemukan keduanya dengan mudah dan agar pelanggan dapat membeli keduanya sekaligus";
            $planogramRecommendations[] = $recommendation;
        }

        $planogramRecommendations3 = [];
        foreach ($cooccurrence3Counts as $triple => $count) {
            $items = explode(',', $triple);

            // Dapatkan informasi letak barang dari $individualCounts
            $letakBarang1 = $individualCounts[$items[0]]['letak_barang'];
            $letakBarang2 = $individualCounts[$items[1]]['letak_barang'];
            $letakBarang3 = $individualCounts[$items[2]]['letak_barang'];

            $recommendation = "<strong>{$items[0]}</strong> di {$letakBarang1}, <strong>{$items[1]}</strong> di {$letakBarang2} dan <strong>{$items[2]}</strong> di {$letakBarang3} Sering dibeli bersamaan  <br></br> <strong>Keterangan : </strong> sehingga sebaiknya diletakkan berdekatan dalam <strong>Satu Rak</strong> agar pelanggan dapat menemukan ketiganya dengan mudah dan agar pelanggan dapat membeli ketiganya sekaligus";
            $planogramRecommendations3[] = $recommendation;
        }

        // Take the top 3 recommendations for 2-itemset
        $top2ItemsetRecommendations = array_slice($planogramRecommendations, 0, 3);

        // Take the top 3 recommendations for 3-itemset
        $top3ItemsetRecommendations = array_slice($planogramRecommendations3, 0, 3);

        // Tampilkan hasil ke view
        return view('Umkm.apriori.index', compact('individualCounts', 'cooccurrenceCounts', 'cooccurrence3Counts', 'top2ItemsetRecommendations', 'top3ItemsetRecommendations'));
    }

    private function calculateCooccurrenceFrequency($formattedTransactions)
    {
        $individualCounts = [];
        $cooccurrenceCounts = [];
        $cooccurrence3Counts = [];

        // Iterasi melalui setiap nomor faktur
        foreach ($formattedTransactions as $faktur => $transaction) {
            $itemCount = count($transaction);

            // Tambahkan setiap produk secara individual
            foreach ($transaction as $item) {
                $productName = $item['nama_produk'];
                $letakBarang = $item['letak_barang'];

                if (!isset($individualCounts[$productName])) {
                    $individualCounts[$productName] = [
                        'count' => 1,
                        'letak_barang' => $letakBarang,
                    ];
                } else {
                    // Tambahkan jumlah kemunculan setiap produk
                    $individualCounts[$productName]['count']++;
                }
            }

            // Buat kombinasi dua item dari transaksi
            for ($i = 0; $i < $itemCount; $i++) {
                for ($j = $i + 1; $j < $itemCount; $j++) {
                    $itemA = $transaction[$i];
                    $itemB = $transaction[$j];

                    // Filter pasangan item yang identik
                    if ($itemA['nama_produk'] != $itemB['nama_produk']) {
                        // Urutkan agar pasangan item selalu dalam urutan yang sama
                        $sortedPair = [$itemA['nama_produk'], $itemB['nama_produk']];
                        sort($sortedPair);
                        $pairKey = implode(',', $sortedPair);

                        // Tambahkan atau update frekuensi kemunculan bersamaan (2-item)
                        if (!isset($cooccurrenceCounts[$pairKey])) {
                            $cooccurrenceCounts[$pairKey] = 1;
                        } else {
                            // Tambahkan jumlah kemunculan pasangan item
                            $cooccurrenceCounts[$pairKey]++;
                        }
                    }
                }
            }

            // Buat kombinasi tiga item dari transaksi
            for ($i = 0; $i < $itemCount; $i++) {
                for ($j = $i + 1; $j < $itemCount; $j++) {
                    for ($k = $j + 1; $k < $itemCount; $k++) {
                        $itemA = $transaction[$i];
                        $itemB = $transaction[$j];
                        $itemC = $transaction[$k];

                        // Filter tiga item yang identik
                        if ($itemA['nama_produk'] != $itemB['nama_produk'] && $itemB['nama_produk'] != $itemC['nama_produk'] && $itemA['nama_produk'] != $itemC['nama_produk']) {
                            // Urutkan agar tiga item selalu dalam urutan yang sama
                            $sortedTriple = [$itemA['nama_produk'], $itemB['nama_produk'], $itemC['nama_produk']];
                            sort($sortedTriple);
                            $tripleKey = implode(',', $sortedTriple);

                            // Tambahkan atau update frekuensi kemunculan bersamaan (3-item)
                            if (!isset($cooccurrence3Counts[$tripleKey])) {
                                $cooccurrence3Counts[$tripleKey] = 1;
                            } else {
                                // Tambahkan jumlah kemunculan tiga item
                                $cooccurrence3Counts[$tripleKey]++;
                            }
                        }
                    }
                }
            }
        }

        return [
            'individualCounts' => $individualCounts,
            'cooccurrenceCounts' => $cooccurrenceCounts,
            'cooccurrence3Counts' => $cooccurrence3Counts,
        ];
    }
}
