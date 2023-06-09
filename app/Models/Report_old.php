<?php

namespace App\Models;


class Report
{
    private static $report_posts = [
        [
            "date" => "08/06/2023",
            "equipment" => "444-FN1",
            "slug" => "08_06_2023-444_FN1",
            "author" => "Titok P",
            "problem" => "auto ballancer error",
            "action" => "reset dan restart auto balancer",
            "status" => "done"
        ],
        [
            "date" => "09/06/2023",
            "equipment" => "424-EP1",
            "slug" => "09_06_2023-424_EP1",
            "author" => "Yana",
            "problem" => "Trafo F1B1 indikasi rusak",
            "action" => "Pergantian Trafo F1B1",
            "status" => "done"
        ],
        [
            "date" => "09/06/2023",
            "equipment" => "preheater",
            "slug" => "09_06_2023-preheater",
            "author" => "Haryanto",
            "problem" => "equipment lifetime",
            "action" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex sunt dolorem magnam quis similique quia, consectetur et pariatur culpa repellat vero laboriosam iste veniam deserunt? Eos veritatis nostrum necessitatibus eaque ipsa consequatur modi. Autem pariatur, quisquam, vel fuga dolorum quam nesciunt quod dignissimos impedit earum eligendi quaerat amet soluta. Expedita voluptatem asperiores at ea eveniet cumque neque ex quisquam placeat, officia dolor, consequatur possimus consectetur rerum. Delectus cum neque expedita, eligendi ducimus molestiae, blanditiis officia nostrum reiciendis unde dolor at? Quod deserunt suscipit harum corporis, nisi quis earum! Qui quaerat cupiditate modi unde quod ut eos natus assumenda accusantium quae.",
            "status" => "done"
        ]
    ];

    public static function all()
    {
        return collect(self::$report_posts);
    }

    public static function find($slug)
    {
        $reports = static::all();
        return $reports->firstWhere('slug', $slug);
    }
}
