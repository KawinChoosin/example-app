<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('personals')->insert([
            ['type' => 'ISTJ', 'description' => 'The Inspector: Reserved and practical, they tend to be loyal, orderly, and traditional.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type' => 'ISTP', 'description' => 'The Crafter: Highly independent, they enjoy new experiences that provide first-hand learning.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type' => 'ISFJ', 'description' => 'The Protector: Warm-hearted and dedicated, they are always ready to protect the people they care about.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type' => 'ISFP', 'description' => 'The Artist: Easy-going and flexible, they tend to be reserved and artistic.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type' => 'INFJ', 'description' => 'The Advocate: Creative and analytical, they are considered one of the rarest Myers-Briggs types.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type' => 'INFP', 'description' => 'The Mediator: Idealistic with high values, they strive to make the world a better place.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type' => 'INTJ', 'description' => 'The Architect: Highly logical, they are both very creative and analytical.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type' => 'INTP', 'description' => 'The Thinker: Quiet and introverted, they are known for having a rich inner world.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type' => 'ESTP', 'description' => 'The Persuader: Out-going and dramatic, they enjoy spending time with others and focusing on the here-and-now.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type' => 'ESTJ', 'description' => 'The Director: Assertive and rule-oriented, they have high principles and a tendency to take charge.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type' => 'ESFP', 'description' => 'The Performer: Outgoing and spontaneous, they enjoy taking center stage.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type' => 'ESFJ', 'description' => 'The Caregiver: Soft-hearted and outgoing, they tend to believe the best about other people.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type' => 'ENFP', 'description' => 'The Champion: Charismatic and energetic, they enjoy situations where they can put their creativity to work.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type' => 'ENFJ', 'description' => 'The Giver: Loyal and sensitive, they are known for being understanding and generous.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type' => 'ENTP', 'description' => 'The Debater: Highly inventive, they love being surrounded by ideas and tend to start many projects (but may struggle to finish them).', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type' => 'ENTJ', 'description' => 'The Commander: Outspoken and confident, they are great at making plans and organizing projects.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ]);

    
    }
}
