<?php


require_once 'vendor/autoload.php';

$faker = Faker\Factory::create();

        for ($i = 0; $i < 1000; $i++) {
          echo $faker->name;
          echo "<br>";
          echo $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null);
          echo "<br>";

          echo $faker->biasedNumberBetween($min = 1, $max = 10000, $function = 'sqrt');
          echo "<br>";

        }

        ?>