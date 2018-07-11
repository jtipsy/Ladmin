<?php
return [
    'AccessKeyId' => env('ALIOSS_KEYID', null),                     // key
    'AccessKeySecret' => env('ALIOSS_KEYSECRET', null),             // secret
    'BucketName' => env('ALIOSS_BUCKETNAME', null)                  // bucket
];