<?php

namespace App\Cache;

use App\Cache\Repository\HashRedis;
use App\Model\Contact\Contact;

/**
 * 好友备注 - 缓存助手
 *
 * @package App\Cache
 */
class FriendRemark extends HashRedis
{
    public $name = 'friend-remark';

    /**
     * 设置好友备注缓存
     *
     * @param int    $user_id   用户ID
     * @param int    $friend_id 好友ID
     * @param string $remark    好友备注
     */
    public function save(int $user_id, int $friend_id, string $remark)
    {
        $this->add($this->_flag($user_id, $friend_id), $remark);
    }

    /**
     * 获取好友备注
     *
     * @param int $user_id   用户ID
     * @param int $friend_id 好友ID
     * @return string
     */
    public function read(int $user_id, int $friend_id): string
    {
        return $this->get($this->_flag($user_id, $friend_id));
    }

    /**
     * 创建用户key
     *
     * @param int $user_id   用户ID
     * @param int $friend_id 好友ID
     * @return string
     */
    private function _flag(int $user_id, int $friend_id): string
    {
        return "{$user_id}_{$friend_id}";
    }

    /**
     * 加载所有数据进入缓存
     */
    public function reload()
    {
        Contact::select(['id', 'user_id', 'friend_id', 'remark'])->chunk(200, function ($rows) {
            foreach ($rows as $row) {
                $row->remark && $this->save($row->user_id, $row->friend_id, $row->remark);
            }
        });
    }
}
