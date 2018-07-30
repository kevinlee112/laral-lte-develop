<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

class userActionEvent extends Event
{
    use SerializesModels;
    public $time ,$model,$aid,$type,$content;

    /**
     * userActionEvent constructor.
     * @param string $model 被操作的模型
     * @param int $aid 被操作ID
     * @param int $type 类型 1:添加,2:删除,3:修改更新
     * @param string $content   操作详情
     */
    public function __construct(string $model, int $aid, int $type, string $content)
    {
//        $this->uid = auth('admin')->user()->id;
//        $this->adminName = auth('admin')->user()->name;
        $this->time = date('Y-m-d H:i:s');
        $this->model = $model;
        $this->aid = $aid;
        $this->type = $type;
        $this->content = $content;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}