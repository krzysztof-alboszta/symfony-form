<?php

namespace AppBundle\Enum;

abstract class DeclineType
{
    const CONFLICT = 1;
    const DISTANCE = 2;
    const OTHER = 3;

    const LABEL_CONFLICT = 'label.decline.conflict';
    const LABEL_DISTANCE = 'label.decline.distance';
    const LABEL_OTHER = 'label.decline.other';

    /** @var array|string[] */
    private static $labels = [
        self::CONFLICT => self::LABEL_CONFLICT,
        self::DISTANCE => self::LABEL_DISTANCE,
        self::OTHER => self::LABEL_OTHER,
    ];

    public static function getAll(): array
    {
        return [
            self::CONFLICT,
            self::DISTANCE,
            self::OTHER,
        ];
    }

    public static function getAsOptions(): array
    {
        return array_flip(self::$labels);
    }

    public static function getLabel(int $declineType): string
    {
        if (!array_key_exists($declineType, self::$labels)) {
            throw new \OutOfBoundsException(\sprintf('Unexpected decline reason type. Given %d', $declineType));
        }

        return self::$labels[$declineType];
    }
}