<?php
namespace ppphp\lib\cache;
use Memcached as Mem;
use ppphp\conf;

class Memcached
{
    private $path;  #�洢·��
    private $time = 3600;  #���ʱ��
    protected $handler    ;
    public function __construct($options)
    {
        $this->handler = new Mem;
        $this->handler->addServer('127.0.0.1', 11211);
    }

    public function get($name){
        return $this->handler->get($name);
    }

    public function set($name,$value,$time = false){
        if($time === false) {
            $time  = $this->time;
        } else if($time === 0){
            $time = 0;
        } else {
            $time += TIME;
        }
        $this->handler->set($name, $value, $time);
        return false;
    }

    public function del($name){
        
    }

    public function clear(){
        
    }

    /*protected function queue($key) {
        static $_handler = array(
            'file'  =>  array('F','F'),
            'xcache'=>  array('xcache_get','xcache_set'),
            'apc'   =>  array('apc_fetch','apc_store'),
        );
        $queue      =   isset($this->options['queue'])?$this->options['queue']:'file';
        $fun        =   isset($_handler[$queue])?$_handler[$queue]:$_handler['file'];
        $queue_name =   isset($this->options['queue_name'])?$this->options['queue_name']:'think_queue';
        $value      =   $fun[0]($queue_name);
        if(!$value) {
            $value  =   array();
        }
        // 
        if(false===array_search($key, $value))  array_push($value,$key);
            if(count($value) > $this->options['length']) {
                // 
                $key =  array_shift($value);
                // 
                $this->rm($key);
                if(APP_DEBUG){
                //
                N($queue_name.'_out_times',1,true);
            }
        }
        return $fun[1]($queue_name,$value);
    }*/
    
}
