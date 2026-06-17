namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KreditFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama' => $this->faker->word(),
            'tanggal' => $this->faker->date(),
            'id_gaji' => null, // Sesuai dengan data Anda yang banyak NULL
            'jenis_pengeluaran' => $this->faker->randomElement(['tetap', 'tidak tetap']),
            'saldo_kredit' => $this->faker->numberBetween(1000, 1000000),
            'keterangan' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['setuju', 'tidak disetuju']),
        ];
    }
}
