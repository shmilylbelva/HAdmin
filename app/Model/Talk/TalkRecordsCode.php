<?php

declare (strict_types=1);

namespace App\Model\Talk;

use App\Model\BaseModel;

/**
 * 聊天记录(代码块消息)数据表模型
 *
 * @property int    $id         代码块ID
 * @property int    $record_id  聊天记录ID
 * @property int    $user_id    用户ID
 * @property string $lang       代码语言
 * @property string $code       代码详情
 * @property string $created_at 创建时间
 * @package App\Model\Chat
 */
class TalkRecordsCode extends BaseModel
{
    protected $table = 'talk_records_code';

    protected $fillable = [
        'record_id',
        'user_id',
        'lang',
        'code',
        'created_at'
    ];

    protected $casts = [
        'record_id'  => 'integer',
        'user_id'    => 'integer',
        'created_at' => 'datetime'
    ];
}
