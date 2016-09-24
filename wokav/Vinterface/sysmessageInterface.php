<?php
namespace wokav\Vinterface;

/**
 *
 */
interface SysMessageInterface
{
    /**
     * Summary of setUId
     * @param mixed $uid 
     * 设置
     */
    public  function getObj($uid);
    /**
     *返回单条 系统信息
     */
    public function findSysMessageAll($id);
    /**
     * Summary of findSysMessageCount
     * 返回用户的总信息条数
     */
    public  function findSysMessageCount();
    /**
     * Summary of findTopSysMessage
     * 返回用户信息前几条
     * @param mixed $uid 
     * @param mixed $topnum 
     */
    public  function findTopSysMessage($topnum=3);
    

   
}
