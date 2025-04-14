<?php

namespace App\Constants;

class Reaction
{
    public const NON = [
        'id' => 0,
        'name' => 'Top',
        'color' => '#606266',
        'imgSrc' => '/img/fire-outline.png',
    ];
    public const LIT = [
        'id' => 1,
        'name' => 'Top',
        'color' => '#ED694A',
        'imgSrc' => '/img/fire.png',
    ];
    public const LOVE = [
        'id' => 2,
        'name' => "J'adore",
        'color' => '#E12C4A',
        'imgSrc' => '/img/love.png',
    ];
    public const LAUGH = [
        'id' => 3,
        'name' => 'Haha',
        'color' => '#EAA823',
        'imgSrc' => '/img/laughing-emot.png',
    ];
    public const WOW = [
        'id' => 4,
        'name' => 'Wow',
        'color' => '#EAA823',
        'imgSrc' => '/img/shocked.png',
    ];
    public const SAD = [
        'id' => 5,
        'name' => 'Triste',
        'color' => '#EAA823',
        'imgSrc' => '/img/sad-face.png',
    ];
    public const MAD = [
        'id' => 6,
        'name' => 'En colère',
        'color' => '#DD6B0E',
        'imgSrc' => '/img/angry.png',
    ];

    // Helper method to get all reactions
    public static function getAll(): array
    {
        return [
            self::NON,
            self::LIT,
            self::LOVE,
            self::LAUGH,
            self::WOW,
            self::SAD,
            self::MAD,
        ];
    }

    // Helper method to find a reaction by ID
    public static function fromId(int $id): ?array
    {
        foreach (self::getAll() as $reaction) {
            if ($reaction['id'] === $id) {
                return $reaction;
            }
        }
        return null; // Return null if no matching reaction is found
    }
}