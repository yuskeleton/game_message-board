<?php
namespace Database\Factories;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;
class ReviewFactory extends Factory
{
    protected $model = Review::class;
    public function definition()
    {
        return [
            'game_id' => $this->faker->numberBetween(1, 2), // ゲームIDを2までに設定
            'user_id' => 1, // ユーザーIDを1に固定
            'body' => $this->faker->text(255),
            'stars' => $this->faker->numberBetween(1, 5),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ];
    }
}