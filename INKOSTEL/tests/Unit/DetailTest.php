<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Detail;

class DetailTest extends TestCase
{
    /** @test */
    public function it_can_convert_rupiah_to_dollar()
    {
        $detail = new Detail();
        $detail->harga_kos = 3000000; // Contoh harga dalam Rupiah

        $convertedPrice = $detail->convertCurrency(); // Gunakan default exchange rate 15000
        $this->assertEquals(200, $convertedPrice); // 3000000 / 15000 = 200
    }

    /** @test */
    public function it_returns_zero_if_harga_kos_is_not_set()
    {
        $detail = new Detail();
        $detail->harga_kos = null; // Harga tidak diset

        $convertedPrice = $detail->convertCurrency();
        $this->assertEquals(0, $convertedPrice); // Harus mengembalikan 0
    }

    /** @test */
    public function it_can_convert_with_custom_exchange_rate()
    {
        $detail = new Detail();
        $detail->harga_kos = 3000000; // Contoh harga dalam Rupiah

        $convertedPrice = $detail->convertCurrency(10000); // Menggunakan nilai tukar 10000
        $this->assertEquals(300, $convertedPrice); // 3000000 / 10000 = 300
    }
}
