<?php

declare (strict_types=1);

namespace App\Model\Talk;

use App\Model\BaseModel;

/**
 * 聊天记录(入群/退群消息)数据表模型
 *
 * @property int    $id              入群或退群通知ID
 * @property int    $record_id       消息记录ID
 * @property int    $type            通知类型[1:入群通知;2:自动退群;3:管理员踢群]
 * @property int    $operate_user_id 操作人的用户ID[邀请人OR管理员ID]
 * @property string $user_ids        用户ID(多个用 , 分割)
 * @package App\Model\Chat
 */
class TalkRecordsInvite extends BaseModel
{
    protected $table = 'talk_records_invite';

    protected $fillable = [
        'record_id',
        'type',
        'operate_user_id',
        'user_ids',
    ];

    protected $casts = [
        'record_id'       => 'integer',
        'type'            => 'integer',
        'operate_user_id' => 'integer'
    ];
}
