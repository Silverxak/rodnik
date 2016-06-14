<?php namespace App\Http\Middleware;

use Closure;
use Request;
use App\iptable;

class Ipcheck {
  
	public function handle($request, Closure $next)
    {
    	if(!\Auth::user()->is_admin)
    	{
        	$ip = Request::ip();
        	$iplist = iptable::all();

			function applyNetMask($ip, $mask)
			{
			    if ( is_string($ip  ) ) $ip   = ip2long($ip  );
			    if ( is_string($mask) ) $mask = ip2long($mask);
			    
			    return long2ip(sprintf('%u', $ip & $mask));
			}   

			if(count($iplist) == 0)
			{
				return view('denied');
			}
			else
			{
				foreach ($iplist as $ips) {
					if($ips->adds === applyNetMask($ip, $ips->mask))
					{
	        			return view('student');	
	        			break;
					}
					else
					{
	        			return view('denied');					
					}
				}
			}    		
    	}
        return $next($request);
    }
}

