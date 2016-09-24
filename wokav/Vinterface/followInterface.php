<?php
namespace wokav\Vinterface;

/**
 *关注组件接口定义
 */
interface FollowInterface
{
    //查找用户的关注列表信息    
    public static function findFollow($id);
   //返回是否关注，已关注返回被关注用户信息，未关注返回null
    public static  function isFollow($id);
   
}
