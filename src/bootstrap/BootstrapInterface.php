<?php
/**
 * Created by PhpStorm.
 * User: tsingsun
 * Date: 2017/3/7
 * Time: 上午11:13
 */

namespace tsingsun\swoole\bootstrap;

use Swoole\Server;

/**
 * 服务启动器接口
 * @package tsingsun\swoole\bootstrap
 */
interface BootstrapInterface
{
    /**
     * worker进程启动，
     * @see https://wiki.swoole.com/wiki/page/46.html about swoole
     * @param Server $server
     * @param $worker_id
     */
    public function onWorkerStart(Server $server, $worker_id);

    /**
     * worker停止
     * @see https://wiki.swoole.com/wiki/page/47.html about swoole
     * @param Server $server
     * @param $worker_id
     */
    public function onWorkerStop(Server $server, $worker_id);

    /**
     * 接收请求事件
     * @see https://wiki.swoole.com/wiki/page/330.html about swoole
     * @param $request
     * @param $response
     * @return mixed
     */
    public function onRequest($request, $response);

    /**
     * 用户请求结束执行的动作,该方法中执行的任务类似于register_shut_down,其中不应该影响用户请求结果
     * @return mixed
     */
    public function onRequestEnd();

    public function onTask(Server $serv, int $task_id, int $src_worker_id, $data);

    public function onFinish(Server $serv, int $task_id, string $data);

    public function onWorkerError($swooleServer, $workerId, $workerPid, $exitCode, $sigNo);
}