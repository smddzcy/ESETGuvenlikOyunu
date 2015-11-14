<?php

require_once("Config.php");
require_once(Config::HELPER_FILE_USERDB);
$function = $_POST['function'];
$data = $_POST['data'];
$returnData = array();

if (array_key_exists($function, Config::VALID_FUNCTIONS)) {

    switch ($function) {
        case "increasePoint":
            $userDBHelper = new User_DB_Helper();
            $socialID = (int)$data['id'];
            $userDBHelper->increasePoint($socialID, 10); // Puan sayısı burda değiştirilebilir
            break;

        case "decreasePoint":
            $userDBHelper = new User_DB_Helper();
            $socialID = (int)$data['id'];
            $userDBHelper->decreasePoint($socialID, 10); // Puan sayısı burda değiştirilebilir
            break;

        case "addUser":
            $userDBHelper = new User_DB_Helper();
            $data = array();
            $data['platform'] = (int)$data['platform'];
            $data['platform_id'] = (int)$data['platform_id'];
            $data['name'] = (string)$data['name'];
            $data['surname'] = (string)$data['surname'];
            $data['email'] = (string)$data['email'];
            //$points = (int)$data['points']; // Başlangıç puanı
            $userDBHelper->addUser($data);
            break;

        // Have no idea what it does, but "Mahmut: lazım olur"
        case "getUser":
            $userDBHelper = new User_DB_Helper();
            $socialID = (int)$data['id'];
            $userDBHelper->getUser($socialID);
            break;
    }

}
echo json_encode($returnData);

/*
 {
  "id": 1088476568,
  "id_str": "1088476568",
  "name": "Mahmut Karaca",
  "screen_name": "triforce930",
  "location": "İstanbul",
  "profile_location": null,
  "description": "Serbest Yazılım Geliştirici",
  "url": "http://t.co/X3pm1gSoE4",
  "entities":  {
    "url":  {
      "urls":  [
         {
          "url": "http://t.co/X3pm1gSoE4",
          "expanded_url": "http://www.karacasoft.com",
          "display_url": "karacasoft.com",
          "indices":  [
            0,
            22
          ]
        }
      ]
    },
    "description":  {
      "urls":  []
    }
  },
  "protected": false,
  "followers_count": 100,
  "friends_count": 142,
  "listed_count": 1,
  "created_at": "Mon Jan 14 09:05:40 +0000 2013",
  "favourites_count": 138,
  "utc_offset": 10800,
  "time_zone": "Baghdad",
  "geo_enabled": true,
  "verified": false,
  "statuses_count": 537,
  "lang": "en-gb",
  "status":  {
    "created_at": "Thu Oct 29 17:14:25 +0000 2015",
    "id": 659780338806321200,
    "id_str": "659780338806321152",
    "text": "RT @uyguntt: After the IEEEXtreme 9.0 Contest https://t.co/l5xLKQ8Ea4",
    "source": "<a href="http://twitter.com" rel="nofollow">Twitter Web Client</a>",
    "truncated": false,
    "in_reply_to_status_id": null,
    "in_reply_to_status_id_str": null,
    "in_reply_to_user_id": null,
    "in_reply_to_user_id_str": null,
    "in_reply_to_screen_name": null,
    "geo": null,
    "coordinates": null,
    "place": null,
    "contributors": null,
    "retweeted_status":  {
      "created_at": "Thu Oct 29 17:13:07 +0000 2015",
      "id": 659780009616371700,
      "id_str": "659780009616371713",
      "text": "After the IEEEXtreme 9.0 Contest https://t.co/l5xLKQ8Ea4",
      "source": "<a href="http://twitter.com" rel="nofollow">Twitter Web Client</a>",
      "truncated": false,
      "in_reply_to_status_id": null,
      "in_reply_to_status_id_str": null,
      "in_reply_to_user_id": null,
      "in_reply_to_user_id_str": null,
      "in_reply_to_screen_name": null,
      "geo": null,
      "coordinates": null,
      "place": null,
      "contributors": null,
      "retweet_count": 1,
      "favorite_count": 1,
      "entities":  {
        "hashtags":  [],
        "symbols":  [],
        "user_mentions":  [],
        "urls":  [
           {
            "url": "https://t.co/l5xLKQ8Ea4",
            "expanded_url": "http://www.bilginesayar.com/2015/10/29/after-the-ieeextreme-9-0-contest/",
            "display_url": "bilginesayar.com/2015/10/29/aft…",
            "indices":  [
              33,
              56
            ]
          }
        ]
      },
      "favorited": false,
      "retweeted": true,
      "possibly_sensitive": false,
      "lang": "en"
    },
    "retweet_count": 1,
    "favorite_count": 0,
    "entities":  {
      "hashtags":  [],
      "symbols":  [],
      "user_mentions":  [
         {
          "screen_name": "uyguntt",
          "name": "Tarık Uygun",
          "id": 339917204,
          "id_str": "339917204",
          "indices":  [
            3,
            11
          ]
        }
      ],
      "urls":  [
         {
          "url": "https://t.co/l5xLKQ8Ea4",
          "expanded_url": "http://www.bilginesayar.com/2015/10/29/after-the-ieeextreme-9-0-contest/",
          "display_url": "bilginesayar.com/2015/10/29/aft…",
          "indices":  [
            46,
            69
          ]
        }
      ]
    },
    "favorited": false,
    "retweeted": true,
    "possibly_sensitive": false,
    "lang": "en"
  },
  "contributors_enabled": false,
  "is_translator": false,
  "is_translation_enabled": false,
  "profile_background_color": "FFFFFF",
  "profile_background_image_url": "http://pbs.twimg.com/profile_background_images/441673295985782785/YB1vToGu.jpeg",
  "profile_background_image_url_https": "https://pbs.twimg.com/profile_background_images/441673295985782785/YB1vToGu.jpeg",
  "profile_background_tile": false,
  "profile_image_url": "http://pbs.twimg.com/profile_images/434910770359721984/aygD3AJB_normal.jpeg",
  "profile_image_url_https": "https://pbs.twimg.com/profile_images/434910770359721984/aygD3AJB_normal.jpeg",
  "profile_banner_url": "https://pbs.twimg.com/profile_banners/1088476568/1393766085",
  "profile_link_color": "3C6BFA",
  "profile_sidebar_border_color": "FFFFFF",
  "profile_sidebar_fill_color": "DDEEF6",
  "profile_text_color": "333333",
  "profile_use_background_image": true,
  "has_extended_profile": false,
  "default_profile": false,
  "default_profile_image": false,
  "following": false,
  "follow_request_sent": false,
  "notifications": false,
  "suspended": false,
  "needs_phone_verification": false
}
 */