<?php

class Video
{
    public function __construct(
        $id,
        $title,
        $author,
        $startDate,
        $endDate,
        $duration,
        $timezone,
        $url,
        $visibility,
        $status,
        $keyword1, $keyword2, $keyword3
    )

//----------------------------------------------------------------------
class Video
{
    public function __construct(
        $id,
        $title,
        $author,
        DateInfo $date,
        $url,
        VideoSettings $settings,
        KeywordCollection $keywords
    )
