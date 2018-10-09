<?php
defined('KEN') or die('Access Deny!');

class Work{
    public $connect = NULL;
    public function connectdb($a,$b,$c,$d){
		$this->connect = mysqli_connect($a,$b,$c) or die(mysqli_connect_error());
		mysqli_select_db($this->connect, $d) or die(mysqli_error($this->connect));
		mysqli_set_charset($this->connect, "UTF8") or die(mysqli_error($this->connect));
	}
	public function closedb(){
		if($this->connect) $this->connect = NULL;
		else return false;
	}
	public function query($a){
		if($this->connect){
			return mysqli_query($this->connect, $a);
		}
		else return false;
	}
	public function number_row($a = NULL){
		if($this->connect){
			$query = mysqli_query($this->connect, $a);
			if($query){
				$number_row = mysqli_num_rows($query);
				return $number_row;
			}
		}
		else return false;
	}
	public function fetch_array($a = NULL, $b){
		if($this->connect){
			$query = mysqli_query($this->connect, $a);
			if($query){
				if($b==0){
					while($row = mysqli_fetch_array($query)){
						$data[] = $row;
					}
					return @$data;
				}
				else if($b==1){
					$data = mysqli_fetch_array($query);
					return @$data;
				}
			}
		}
		else return false;
	}
	public function get_db($a = NULL, $b = NULL, $c = NULL, $d = NULL, $e = NULL){
		if($this->connect){
			if($a&&$b){
				if($c&&$d){
					if($e=='int'){
						$sql = "SELECT ".$a." FROM `".$b."` WHERE `".$c."` = ".$d;
						$data = $this->fetch_array($sql, 1);
						return $data;
					}
					else if($e==NULL){
						$sql = "SELECT ".$a." FROM `".$b."` WHERE `".$c."` = '".(string)$d."'";
						$data = $this->fetch_array($sql, 1);
						return $data;
					}
				}
				else{
					$sql = "SELECT ".$a." FROM `".$b."`";
					$data = $this->fetch_array($sql, 0);
					return $data;
				}
			}
		}
		else return false;
	}
	public function get_db_setting($a = NULL){
		if($this->connect){
			if($a){
				$get = $this->get_db('value', 'setting', 'title', $a);
				return $get['value'];
			}
		}
		else return false;
	}
	public function get_time_date($a){
		if($a=='time') return time();
		else if($a=='date') return date('d/m/Y');
		else if($a='time_date') return date('H:i:s d/m/Y');
		else return false;
	}
	public function captcha($a = NULL){
		if($a){
			$string = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
			$size = strlen($string);
			$str = '';
			for($i=0;$i<$a;$i++){
				$str .= $string[rand(0, $size-1)];
			}
			return $str;
		}
		else return false;
	}
	public function secu($a = NULL){
		if($a){
			$str = trim($a);
			$str = stripslashes($str);
			$str = addslashes($str);
			$str = htmlentities($str, ENT_COMPAT | ENT_HTML401, "UTF-8");
			return $str;
		}
		else return false;
	}
	public function cURL($a = NULL){
		if($a){
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_CONNECTTIMEOUT => 60,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_USERAGENT      => 'Opera/9.80 (Series 60; Opera Mini/6.5.27309/34.1445; U; en) Presto/2.8.119 Version/11.10',
				CURLOPT_URL            => $a,
				)
			);
			$result = curl_exec($curl);
			curl_close($curl);
			return $result;
		}
		else return false;
	}
	public function sign_creator(&$data){
		$sig = "";
		foreach($data as $key => $value){
			$sig .= "$key=$value";
		}
		$sig .= 'c1e620fa708a1d5696fb991c1bde5662';
		$sig = md5($sig);
		return $data['sig'] = $sig;
	}
	public function me($a = NULL){
		if($a){
			$result = $this->cURL('https://graph.facebook.com/me?access_token='.$a);
			return json_decode($result, true);
		}
		else return false;
	}
	public function app($a = NULL){
		if($a){
			$result = $this->cURL('https://graph.facebook.com/app?access_token='.$a);
			return json_decode($result, true);
		}
		else return false;
	}
	public function time_before($a = NULL){
		if($a){
			$to = time();
			$diff = (int)abs($to - $a);
			if($diff <= 60){
				$since = sprintf('Vừa Xong');
			}
			else if($diff <= 3600){
				$mins = round($diff / 60);
				$since = sprintf('%s Phút Trước', $mins);
			}
			else if(($diff <= 86400)&&($diff > 3600)){
				$hours = round($diff/3600);
				if($hours <= 1){
					$hours = 1;
				}
				$since = sprintf('%s Giờ Trước', $hours);
			}
			else if($diff >= 86400){
				$days = round($diff / 86400);
				if($days <= 1){
					$days = 1;
				}
				$since = sprintf('%s Ngày Trước', $days);
			}
			return $since;
		}
	}
	public function time_vip($a = NULL){
		if($a){
			$to = time();
			$diff = (int)abs($to - $a);
			if($diff <= 60){
				$since = sprintf('Còn Vài Giây');
			}
			else if($diff <= 3600){
				$mins = round($diff / 60);
				$since = sprintf('Còn %s Phút', $mins);
			}
			else if(($diff <= 86400)&&($diff > 3600)){
				$hours = round($diff/3600);
				if($hours <= 1){
					$hours = 1;
				}
				$since = sprintf('Còn %s Giờ', $hours);
			}
			else if($diff >= 86400){
				$days = round($diff / 86400);
				if($days <= 1){
					$days = 1;
				}
				$since = sprintf('Còn %s Ngày', $days);
			}
			return $since;
		}
	}
	public function is_mobile($a){
		if($a){
			$result = preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $a);
			if($result) return true;
		}
		else return false;
	}
	public function microtime_float(){
		$mtime = microtime();
		$mtime = explode(' ', $mtime);
		return $mtime[1] + $mtime[0];
	}
	public function debug($a = NULL){
		if($a){
			$runtime = sprintf('Xử Lý Trong %0.6f Giây', $this->microtime_float()-$a);
			$memory = sprintf('Bộ Nhớ Sử Dụng %0.2f MB', (!function_exists('memory_get_usage')) ? '0' : round(memory_get_usage()/1024/1024, 2));
			return $runtime.' - '.$memory;
		}
		else return false;
	}
	public function size_count($a){
		if($a > 1073741824){
			$size = round($a / 1073741824 * 100) / 100 . ' GB';
		}
		elseif ($a > 1048576){
			$size = round($a / 1048576 * 100) / 100 . ' MB';
		}
		elseif ($a > 1024){
			$size = round($a / 1024 * 100) / 100 . ' KB';
		}
		else{
			$size = $a . 'B';
		}
		return $size;
	}
	public function disk($a = NULL){
		if($a){
			$dir = '.';
			if($dir == '.'){
				$nowpath = str_replace('\\', '/', dirname('index.php')).'/';
			}
			$nowpath = str_replace('\\', '/', $nowpath);
			$nowpath = str_replace('//', '/', $nowpath);
			if(substr($nowpath, -1) != '/'){
				$nowpath = $nowpath . '/';
			}
			$all = @disk_total_space($nowpath);
			!$all && $all = 0;
			$free = @disk_free_space($nowpath);
			!$free && $free = 0;
			$used = $all - $free;
			!$used && $used = 0;
			$free_percent = @round(100 / ($all / $free), 0);
			$used_percent = 100 - $free_percent;
			if($a == 'all') return $this->size_count($all);
			else if($a == 'free') return $this->size_count($free);
			else if($a == 'used') return $this->size_count($used);
			else if($a == 'free_percent') return $free_percent;
			else if($a == 'used_percent') return $used_percent;
		}
	}
	public function sys_linux(){
		if(false === ($str = @file("/proc/cpuinfo"))) return false;
		$str = implode("", $str);
		@preg_match_all("/model\s+name\s{0,}\:+\s{0,}([\w\s\)\(\@.-]+)([\r\n]+)/s", $str, $model);
		@preg_match_all("/cpu\s+MHz\s{0,}\:+\s{0,}([\d\.]+)[\r\n]+/", $str, $mhz);
		@preg_match_all("/cache\s+size\s{0,}\:+\s{0,}([\d\.]+\s{0,}[A-Z]+[\r\n]+)/", $str, $cache);
		@preg_match_all("/bogomips\s{0,}\:+\s{0,}([\d\.]+)[\r\n]+/", $str, $bogomips);
		if(false !== is_array($model[1])){
			$res['cpu']['num'] = sizeof($model[1]);
			if($res['cpu']['num']==1) $x1 = ' ×1';
			else $x1 = ' ×'.$res['cpu']['num'];
			@$mhz[1][0] = ' - Tốc Độ Xử Lý: '.$mhz[1][0].' MHz';
			@$cache[1][0] = ' - Bộ Nhớ Cache Thứ Cấp: '.$cache[1][0];
			@$bogomips[1][0] = ' - BogoMIPS: '.$bogomips[1][0];
			$res['cpu']['model'][] = $model[1][0].$mhz[1][0].$cache[1][0].$bogomips[1][0].$x1.' Core';
			if(false !== is_array($res['cpu']['model'])) $res['cpu']['model'] = implode("<br />", $res['cpu']['model']);
			if(false !== is_array(@$res['cpu']['mhz'])) @$res['cpu']['mhz'] = implode("<br />", @$res['cpu']['mhz']);
			if(false !== is_array(@$res['cpu']['cache'])) @$res['cpu']['cache'] = implode("<br />", @$res['cpu']['cache']);
			if(false !== is_array(@$res['cpu']['bogomips'])) @$res['cpu']['bogomips'] = implode("<br />", @$res['cpu']['bogomips']);
		}
		if(false === ($str = @file("/proc/uptime"))) return false;
		$str = explode(" ", implode("", $str));
		$str = trim($str[0]);
		$min = $str / 60;
		$hours = $min / 60;
		$days = floor($hours / 24);
		$hours = floor($hours - ($days * 24));
		$min = floor($min - ($days * 60 * 24) - ($hours * 60));
		if($days !== 0) $res['uptime'] = $days."Day";
		if($hours !== 0) $res['uptime'] .= $hours."Hour";
		$res['uptime'] .= $min."Minute";
		if(false === ($str = @file("/proc/meminfo"))) return false;
		$str = implode("", $str);
		preg_match_all("/MemTotal\s{0,}\:+\s{0,}([\d\.]+).+?MemFree\s{0,}\:+\s{0,}([\d\.]+).+?Cached\s{0,}\:+\s{0,}([\d\.]+).+?SwapTotal\s{0,}\:+\s{0,}([\d\.]+).+?SwapFree\s{0,}\:+\s{0,}([\d\.]+)/s", $str, $buf);
		preg_match_all("/Buffers\s{0,}\:+\s{0,}([\d\.]+)/s", $str, $buffers);
		$res['memTotal'] = round($buf[1][0]*1024, 2);
		$res['memFree'] = round($buf[2][0]*1024, 2);
		$res['memBuffers'] = round($buffers[1][0]*1024, 2);
		$res['memCached'] = round($buf[3][0]*1024, 2);
		$res['memUsed'] = $res['memTotal']-$res['memFree'];
		$res['memPercent'] = (floatval($res['memTotal'])!=0) ? round($res['memUsed']/$res['memTotal']*100,0) : 0;
		$res['memRealUsed'] = $res['memTotal'] - $res['memFree'] - $res['memCached'] - $res['memBuffers'];
		$res['memRealFree'] = $res['memTotal'] - $res['memRealUsed'];
		$res['memRealPercent'] = (floatval($res['memTotal'])!=0) ? round($res['memRealUsed']/$res['memTotal']*100,0) : 0;
		$res['memCachedPercent'] = (floatval($res['memCached'])!=0) ? round($res['memCached']/$res['memTotal']*100,0) : 0;
		$res['swapTotal'] = round($buf[4][0]*1024, 2);
		$res['swapFree'] = round($buf[5][0]*1024, 2);
		$res['swapUsed'] = round($res['swapTotal']-$res['swapFree'], 2);
		$res['swapPercent'] = (floatval($res['swapTotal'])!=0) ? round($res['swapUsed']/$res['swapTotal']*100,0) : 0;
		if(false === ($str = @file("/proc/loadavg"))) return false;
		$str = explode(" ", implode("", $str));
		$str = array_chunk($str, 4);
		$res['loadAvg'] = implode(" ", $str[0]);
		return $res;
	}
	public function get_tag_shoutbox($id){
		$id = str_replace('@', '', $id);
		$number = $this->number_row("SELECT * FROM `user` WHERE `id_user` = '".$id."'");
		if($number==0) $tag = 'Haha' . $id;
		else{
			$getName = $this->get_db('*', 'user', 'id_user', $id);
			$name = $getName['name'];
			$tag = '<a href="' . $domain . '/profile.ken?id=' . $id . '" target="_blank">' . $name . '</a>';
		}
		return $tag;
	}
	public function getHome($token){
		if($token) $data = json_decode($this->cURL('https://graph.facebook.com/me/home?fields=id,from,comments.limit(50),comments.id&limit=10&access_token=' . $token), true);
		if(isset($data['data'])) return $data['data'];
		else return $data;
	}
	public function getData($id_user, $post, $type){
		if(!is_dir('data')) mkdir('data');
		if(file_exists('data/'.$type.'_' . $id_user)) $data = file_get_contents('data/'.$type.'_' . $id_user);
		else $data = ' ';
		if(preg_match('/' . $post['id'] . '/', $data)) return false;
		else{
			if(strlen($data) > 5000) $text = strlen($data) - 5000;
			else $text = 0;
			$this->saveFile('data/'.$type.'_' . $id_user, substr($data, $text) . ' ' . $post['id']);
			return true;
		}
	}
	public function getTag($id_user, $name){
		return '@[' . $id_user . ':' . $name . ']';
	}
	public function getEmoji($n){
		$emo = array(
			urldecode('%F3%BE%80%80'), urldecode('%F3%BE%80%81'), urldecode('%F3%BE%80%82'),
			urldecode('%F3%BE%80%83'), urldecode('%F3%BE%80%84'), urldecode('%F3%BE%80%85'),
			urldecode('%F3%BE%80%87'), urldecode('%F3%BE%80%B8'), urldecode('%F3%BE%80%BC'),
			urldecode('%F3%BE%80%BD'), urldecode('%F3%BE%80%BE'), urldecode('%F3%BE%80%BF'),
			urldecode('%F3%BE%81%80'), urldecode('%F3%BE%81%81'), urldecode('%F3%BE%81%82'),
			urldecode('%F3%BE%81%83'), urldecode('%F3%BE%81%85'), urldecode('%F3%BE%81%86'),
			urldecode('%F3%BE%81%87'), urldecode('%F3%BE%81%88'), urldecode('%F3%BE%81%89'), 
			urldecode('%F3%BE%81%91'), urldecode('%F3%BE%81%92'), urldecode('%F3%BE%81%93'), 
			urldecode('%F3%BE%86%90'), urldecode('%F3%BE%86%91'), urldecode('%F3%BE%86%92'),
			urldecode('%F3%BE%86%93'), urldecode('%F3%BE%86%94'), urldecode('%F3%BE%86%96'),
			urldecode('%F3%BE%86%9B'), urldecode('%F3%BE%86%9C'), urldecode('%F3%BE%86%9D'),
			urldecode('%F3%BE%86%9E'), urldecode('%F3%BE%86%A0'), urldecode('%F3%BE%86%A1'),
			urldecode('%F3%BE%86%A2'), urldecode('%F3%BE%86%A4'), urldecode('%F3%BE%86%A5'),
			urldecode('%F3%BE%86%A6'), urldecode('%F3%BE%86%A7'), urldecode('%F3%BE%86%A8'),
			urldecode('%F3%BE%86%A9'), urldecode('%F3%BE%86%AA'), urldecode('%F3%BE%86%AB'),
			urldecode('%F3%BE%86%AE'), urldecode('%F3%BE%86%AF'), urldecode('%F3%BE%86%B0'),
			urldecode('%F3%BE%86%B1'), urldecode('%F3%BE%86%B2'), urldecode('%F3%BE%86%B3'), 
			urldecode('%F3%BE%86%B5'), urldecode('%F3%BE%86%B6'), urldecode('%F3%BE%86%B7'),
			urldecode('%F3%BE%86%B8'), urldecode('%F3%BE%86%BB'), urldecode('%F3%BE%86%BC'),
			urldecode('%F3%BE%86%BD'), urldecode('%F3%BE%86%BE'), urldecode('%F3%BE%86%BF'),
			urldecode('%F3%BE%87%80'), urldecode('%F3%BE%87%81'), urldecode('%F3%BE%87%82'),
			urldecode('%F3%BE%87%83'), urldecode('%F3%BE%87%84'), urldecode('%F3%BE%87%85'),
			urldecode('%F3%BE%87%86'), urldecode('%F3%BE%87%87'), urldecode('%F3%BE%87%88'),
			urldecode('%F3%BE%87%89'), urldecode('%F3%BE%87%8A'), urldecode('%F3%BE%87%8B'),
			urldecode('%F3%BE%87%8C'), urldecode('%F3%BE%87%8D'), urldecode('%F3%BE%87%8E'),
			urldecode('%F3%BE%87%8F'), urldecode('%F3%BE%87%90'), urldecode('%F3%BE%87%91'),
			urldecode('%F3%BE%87%92'), urldecode('%F3%BE%87%93'), urldecode('%F3%BE%87%94'),
			urldecode('%F3%BE%87%95'), urldecode('%F3%BE%87%96'), urldecode('%F3%BE%87%97'),
			urldecode('%F3%BE%87%98'), urldecode('%F3%BE%87%99'), urldecode('%F3%BE%87%9B'), 
			urldecode('%F3%BE%8C%AC'), urldecode('%F3%BE%8C%AD'), urldecode('%F3%BE%8C%AE'),
			urldecode('%F3%BE%8C%AF'), urldecode('%F3%BE%8C%B0'), urldecode('%F3%BE%8C%B2'),
			urldecode('%F3%BE%8C%B3'), urldecode('%F3%BE%8C%B4'), urldecode('%F3%BE%8C%B6'),
			urldecode('%F3%BE%8C%B8'), urldecode('%F3%BE%8C%B9'), urldecode('%F3%BE%8C%BA'),
			urldecode('%F3%BE%8C%BB'), urldecode('%F3%BE%8C%BC'), urldecode('%F3%BE%8C%BD'),
			urldecode('%F3%BE%8C%BE'), urldecode('%F3%BE%8C%BF'), urldecode('%F3%BE%8C%A0'),
			urldecode('%F3%BE%8C%A1'), urldecode('%F3%BE%8C%A2'), urldecode('%F3%BE%8C%A3'),
			urldecode('%F3%BE%8C%A4'), urldecode('%F3%BE%8C%A5'), urldecode('%F3%BE%8C%A6'),
			urldecode('%F3%BE%8C%A7'), urldecode('%F3%BE%8C%A8'), urldecode('%F3%BE%8C%A9'),
			urldecode('%F3%BE%8C%AA'), urldecode('%F3%BE%8C%AB'), urldecode('%F3%BE%8D%80'),
			urldecode('%F3%BE%8D%81'), urldecode('%F3%BE%8D%82'), urldecode('%F3%BE%8D%83'),
			urldecode('%F3%BE%8D%84'), urldecode('%F3%BE%8D%85'), urldecode('%F3%BE%8D%86'),
			urldecode('%F3%BE%8D%87'), urldecode('%F3%BE%8D%88'), urldecode('%F3%BE%8D%89'),
			urldecode('%F3%BE%8D%8A'), urldecode('%F3%BE%8D%8B'), urldecode('%F3%BE%8D%8C'),
			urldecode('%F3%BE%8D%8D'), urldecode('%F3%BE%8D%8F'), urldecode('%F3%BE%8D%90'),
			urldecode('%F3%BE%8D%97'), urldecode('%F3%BE%8D%98'), urldecode('%F3%BE%8D%99'),
			urldecode('%F3%BE%8D%9B'), urldecode('%F3%BE%8D%9C'), urldecode('%F3%BE%8D%9E'), 
			urldecode('%F3%BE%93%B2'), urldecode('%F3%BE%93%B4'), urldecode('%F3%BE%93%B6'), 
			urldecode('%F3%BE%94%90'), urldecode('%F3%BE%94%92'), urldecode('%F3%BE%94%93'),
			urldecode('%F3%BE%94%96'), urldecode('%F3%BE%94%97'), urldecode('%F3%BE%94%98'),
			urldecode('%F3%BE%94%99'), urldecode('%F3%BE%94%9A'), urldecode('%F3%BE%94%9C'),
			urldecode('%F3%BE%94%9E'), urldecode('%F3%BE%94%9F'), urldecode('%F3%BE%94%A4'),
			urldecode('%F3%BE%94%A5'), urldecode('%F3%BE%94%A6'), urldecode('%F3%BE%94%A8'), 
			urldecode('%F3%BE%94%B8'), urldecode('%F3%BE%94%BC'), urldecode('%F3%BE%94%BD'), 
			urldecode('%F3%BE%9F%9C'), urldecode('%F3%BE%A0%93'), urldecode('%F3%BE%A0%94'),
			urldecode('%F3%BE%A0%9A'), urldecode('%F3%BE%A0%9C'), urldecode('%F3%BE%A0%9D'),
			urldecode('%F3%BE%A0%9E'), urldecode('%F3%BE%A0%A3'), urldecode('%F3%BE%A0%A7'),
			urldecode('%F3%BE%A0%A8'), urldecode('%F3%BE%A0%A9'), urldecode('%F3%BE%A5%A0'), 
			urldecode('%F3%BE%A6%81'), urldecode('%F3%BE%A6%82'), urldecode('%F3%BE%A6%83'), 
			urldecode('%F3%BE%AC%8C'), urldecode('%F3%BE%AC%8D'), urldecode('%F3%BE%AC%8E'),
			urldecode('%F3%BE%AC%8F'), urldecode('%F3%BE%AC%90'), urldecode('%F3%BE%AC%91'),
			urldecode('%F3%BE%AC%92'), urldecode('%F3%BE%AC%93'), urldecode('%F3%BE%AC%94'),
			urldecode('%F3%BE%AC%95'), urldecode('%F3%BE%AC%96'), urldecode('%F3%BE%AC%97')
		);
		$mess = $emo[rand(0,count($emo)-1)];
		$message = explode(' ',$n);
		foreach($message as $x => $y){
			$mess .= $emo[rand(0,count($emo)-1)].' '.$y.' ';
		}
		return($mess);
	}
	public function getContent($data, $id_user, $name, $bieutuong = NULL, $quangcao = NULL, $type, $content = NULL){
		$content_default = array(
			'photo' => array(
						'<3 Xinh Quá. ',
						'Đẹp Lắm <3 ',
						'Tớ Thích Cậu Rồi Đấy <3 ',
						'Thả Trym Cho Ảnh Nà <3 <3 <3 ',
						'Đăng Ảnh Ngàn Năm Có Một <3 <3 ',
						'Like Nào <3 '
						),
			'comment' => array(
						'Nếu mỗi lần nhớ tới em anh được 500 đồng chắc giờ này anh đã vượt xa Bill Gates. ',
						'Phải biết điềm tĩnh trước gái xinh, không giật mình trước gái xấu. ',
						'Không được đầu gấu với gái ngoan, không cần nhẹ nhàng với gái dữ. ',
						'Không được tự tử nếu mất gái ngon, không ngậm bồ hòn ôm gái nát. ',
						'Không được bộc phát thích gái teen, không được ném mình vào gái ế. ',
						'Hôm nay nhận tấm thiệp hồng Định ngày hôn lễ Em đi lấy chồng Đọc thiệp hồng thấy shock hông Báo năm trồng trọt cày bừa đi tong Thầm mong sánh ước nên duyên Thành chồng, thành vợ ngày đêm nguyện cầu Em không thèm nói một câu Gật đầu đồng ý hay em lắc đầu Em trả kết quả hôm nay Cầm tay Anh gửi: Mai Em lấy chồng . ',
						'Khi bạn buồn hãy gọi cho tôi...tôi không hứa sẽ làm bạn cười...nhưng tôi hứa sẽ cười vào mặt bạn... ',
						'Em thân yêu. Sự thiếu vắng em đang làm tan vỡ trái tim anh. Anh yêu em, anh muốn quay lại với em. Tái bút : Chúc mừng em đã trúng giải đặc biệt 2 tỉ đồng. ',
						'KendyDat nhà ở HCM. Ngày 12/4/2010, bật lửa soi xem xăng còn hay hết, xăng còn, KendyDat thọ 20 tuổi !!! ',
						'Uống nước nhớ kẻ trồng cây (uống nước dừa). ',
						'Học cho lắm tắm cũng xà bông. ',
						'Một phụ nữ toàn diện là : sáng diện, trưa diện, chiều diện, tối diện...  ',
						'Giang hồ hiểm ác, không bằng mạng lag thất thường. ',
						'Chỉ tay lên trời hận đời vô đối, chỉ tay xuống gối, đi ngủ cho rồi. ',
						'Ta về ta tắm ao ta dù trong dù đục cũng là cái ao. ',
						'Trúc xinh trúc mọc đầu đình...Em xinh em đứng một mình kệ em. ',
						'Trái tim em chỉ 2 lần mở cửa. Đón anh vào và tống cổ anh ra. (Câu chuẩn là : Trái tim em chỉ hé mở 1 lần, đón tình anh rồi khép kín muôn đời. ',
						'Bước đến nhà em, bóng xế tà. Đứng chờ năm phút bố em ra. Lơ thơ phía trước vài con chó. Lác đác đằng sau chổi lông gà. ',
						'Tình yêu là vĩnh cửu. Và chỉ duy nhất một thứ được phép thay đổi. Đó là người yêu. ',
						'Cần bán gấp nhà 3.000 m2, tường chống đạn, nhiều phòng, an ninh tốt, có camera, công an tuần 24/24. Địa chỉ: Nhà tù bộ công an. Giá thương lượng. ',
						'Xin thề tôi với anh kết nghĩa anh em , tuy không sinh cùng năm cùng tháng cùng ngày , nhưng nguyện sống cùng ngày cùng tháng cùng năm.  ',
						'Định nghĩa mới về vợ  học dốt nói ngông , đi chơi lông bông , mồm thì khoác lác , mua sắm nát đời , mà câu nào nói ra cũng lời lời đạo lý ',
						'Trăm năm bia đá cũng mòn , bia chai cũng bể , chỉ còn bia ... ôm. ',
						'Nghệ thuật che lấp sự bất tài cũng đòi hỏi không ít tài năng. ',
						'Nếu có ai đó khen bạn đẹp bạn có ½ là đẹp , ½ còn lại là tài năng , gộp lại thì vừa đẹp vừa tài năng , bạn hãy coi chừng  ½ đẹp tức là ½ đó không có chút chất xám nào , ½ tài năng , tức là ½ đó không có chút sắc đẹp nào, hợp lại hoá ra bạn là một con người vừa xấu vừa ngu đó sao?  ',
						'Không ít phụ nữ già đi nhanh chóng có khi do họ động não suy nghĩ phải làm sao để mình trẻ lại. Chết cho người phụ nữ mình yêu vẫn dễ hơn là phải sống chung với họ. ',
						'Ngắn gọn thể hiện sự thông minh nhưng không đúng trong trường hợp người ta nói Anh yêu em  ',
						'Đằng sau sự thành công của một người đan ông luôn có hình bóng của một người đàn bà , và đằng sau sự thất bại của một gười đan ông là một người đàn bà thật sự . ',
						'Thể thao là có hại . Nếu ta sống được thêm 10 năm nhờ luyện tập thì ta cũng mất 15 năm vào các buổi tập luyện đó.  ',
						'Tại sao chỉ có danh hiệu bà mẹ việt nam anh hùng mà không có danh hiệu ông bố việt nam anh hùng nhỉ ? ',
						'Tình yêu là bất tử , chỉ có người yêu là thay đổi.  ',
						'Hài kịch sẽ chuyển sang bi kịch nếu không bán được vé.  ',
						'Một người vợ tốt luôn tha thứ cho chồng khi cô ta sai. ',
						'Ly dị là sự kiện mà người đàn ông phải giặt đồ cho mình ... thay vì trước đó phải giặt đồ cho cả hai .  ',
						'Con đường ngắn nhất để đi từ một trái tim đến 1 trái tim là con đường truyền máu.  ',
						'Chân lý là mặt trời chói lọi . Nếu bạn không nghiên cứu về nó thì đừng có điên mà nhìn vào nó . 
						Theo lý thuyết thì Lý thuyết không khác với thực tế là mấy , nhưng thực tế thì thực tế khác xa lý thuyết. ',
						'Lương tâm là cái gì đó cảm thấy tổn thương trong khi các phần khác của cơ thể cảm thấy dễ chịu.  ',
						'Lương tâm là cái buộc ta phải kể hết mọi bí mật cho người tình trước khi có ai đó mách. ',
						'Thà sống hèn còn hơn chết dại.  ',
						'Bạn có thể mua một người trung thực không ? Không, nhưng bán một người như vậy dễ hơn . ',
						'Khi một cô gái được nhiều người theo đuổi cô ta sẽ làm cao , khi cô ấy được một người theo đuổi thì cô ta sẽ làm dáng , khi không có ai theo đuổi cô ấy cô ta sẽ làm ... thơ , và khi cô ta theo đuổi nhiều người cô ta sẽ làm ca ... ve.  ',
						'Bia độc hơn rượu , bằng chứng trên thế giới chỉ có mộ bia mà không có mộ rượu  ',
						'Đàn ông không khóc là đàn ông nhút nhát (không dám làm gì (khóc) là nhút nhát rồi). ',
						'Không có gì tiết kiệm thời gian và tiền bạc hơn là yêu ngay từ cái nhìn đầu tiên. ',
						'Anh bảo anh bỏ rượu...anh bỏ rượu. Em bảo anh bỏ thuốc...anh bỏ thuốc...Em bảo anh bỏ game...anh bỏ em. ',
						'Trăm lời anh nói không bằng làn khói anh còng SH  ',
						'Rõ ràng là trên đời này không có gì là rõ ràng.Vì tao chắc chắn là trên đời này không có gì là chắc chắn.  ',
						'Cách tốt nhất để giữ lời hứa là đừng hứa gì cả.  ',
						'Tôi đã nói không với ma túy, nhưng tụi nó không chịu nghe.  ',
						'Luôn luôn nhớ rằng bạn là duy nhất ... giống như những người khác  ',
						'Luôn cố gắng khiêm tốn, và hãy lấy làm ... tự hào về điều đó  ',
						'Khổ quá, sướng không chịu nổi  ',
						'Đừng tự ti vì mình nghèo mà vẫn giỏi mà hãy tự hỏi tại sao mình giỏi mà mình vẫn nghèo.  ',
						'Hồi lớp mầm em yêu con bé hàng xóm học cùng lớp vì hai đứa hay mút kẹo chung và cùng… truồng cởi tắm mưa, nhưng lên lớp lá nó bỏ em vì em… thấp hơn nó.  ',
						'Có cái nắng, có cái gió nhưng thiếu… cái đó thì ta xa nhau, người ơiiiiiiiiii  ',
						'Tự hào là hai bàn tay trắng lập nên… vô số nợ.  ',
						'Điều tuyệt đối nhất chính là tất cả chỉ là tương đối  ',
						'Ánh sáng đi trước âm thanh, vì thế, con người ta trông có vẻ thông minh cho đến khi ta nghe họ phát biểu!  ',
						'Nghèo mà sài sang để sau này có giàu bớt bỡ ngỡ.  ',
						'Bản chất xấu xa nhưng do dòng đời xô đẩy trở thành người lương thiện. 
						Người ta có chí thì nên...còn mình có chí thì nên gội đầu.  ',
						'Giang hồ hiểm ác anh không sợ...Chỉ sợ đường về vắng bóng em. ',
						'Phụ nữ thích mua đồ đẹp để con trai ngắm...Con trai thích ngắm con gái không mặc đồ...Vậy con gái mua sắm làm cái gì ??? ',
						'Nếu không có học sinh thì tất cả giáo viên đều mất dạy !  ',
						'Đi một ngày đàng…mất 10.000 tiền cơm ',
						'Xăng có thể cạn, lốp có thể mòn……nhưng số máy và số khung vẫn không đổi ! ',
						'Người ta mất 3s để nói tiếng yêu….mất 3 giờ để giải thích…mất 3 ngày để chấp nhận và mất cả đời để thực hiện và ân hận….! ',
						'Dù gái hay trai….cứ lai rai mà đẻ ! ',
						'Nợ nần biến người ta thành……con nợ ! ',
						'Tôi cao không bằng ai….nhưng được cái nằm xuống thì tôi dài 1m76 ! ',
						'Nếu tình yêu là ánh sáng thì hôn nhân là hoá đơn tiền điện !  ',
						'Đừng bao giờ đua đòi bồ bịch khi mà không ai yêu bạn cả ! ',
						'Một thằng ngốc xài máy vi tính nhận được thông báo sau Cannot found the printer …thế là hắn xoay cái monitor về phía máy in….thế đấy  ',
						'Nếu chồng bị bệnh tiểu đường thì vợ bị bệnh gì ?........ đó là sún răng  ',
						'Một cô gái có tật bẩm sinh là đi tiểu lúc 6h30 sáng không hơn không kém….nhưng vấn đề là cô ta luôn thức dậy vào lúc 7h30……thế đấy ',
						'Yêu nhau không phải là nhìn vào nhau mà là cùng nhau nhìn về một hướng... cái xe đang dựng ở gốc cây. ',
						'Toà hỏi: Thế hắn ta đã giết chết... anh như thế nào hử ? ',
						'Người cứu bạn khỏi cảnh sắp hết hơi chưa chắc là 1 bác sĩ, có thể là 1 tay vá xe  ',
						'Em có biết rằng anh nhớ em nhiều lắm không? Anh ăn không ngon nhưng ngủ như điên, anh đi giầy quên đi tất, ăn sáng quên đánh răng, anh dùng xăng vo gạo, anh khờ khạo cũng chỉ vì yêu em đó ',
						'Em đừng buồn vì những lời bạn anh nói nhé, nó nói em :Nhìn xa cứ tưởng con người, nhìn gần mới biết đười ươi xổng chuồng  
						Anh đau lắm nhưng không sao, bôi cao sẽ khỏi, không khỏi ăn tỏi sẽ hết, không hết cho chết là vừa. ',
						'Khi xưa ông cha ta xả thân cứu nước...Ngày nay, chúng ta xả nước cứu thân !!! ',
						'Đàn bà là những niềm đau...Anh em dù biết vẫn theo sau...đàn bà  ',
						'Con gái cũng như một quyển sách...Đừng mong đọc một ngày là hiểu được.  ',
						'Bực mình sinh sự...bụng bự sinh con... ',
						'Đề thi 40 câu, chỉ sai 1 câu còn lại xém đúng. ',
						'Giới tính của bạn là gì ?...Mình bảo nam, duy vật biện chứng bảo nữ...còn khoa học thì đang chứng minh... ',
						'Khi ai đó nói bạn vô duyên thì bạn nên mĩm cười vì vô duyên là viết tắt của Vô tư và Duyên dáng.  ',
						'Khi lòng người giông bão, không có nơi nào gọi là bình yên.  ',
						'Làm con gái phải ngang tàn ngạo ngễ...Sống trên đời phải hóng hách kiêu sa.  ',
						'Nếu bạn bị ăn hiếp hãy nhanh tay gọi cho tôi...Tôi sẽ nhanh chân chạy tới...gọi cảnh sát.  ',
						'Tôi xinh đẹp ? hiển nhiên...tôi thông minh ?...dĩ nhiên...tôi giàu có ?...tất nhiên...tôi học giỏi ?...đương nhiên..  ',
						'Tuy mình không đẹp...nhưng còn lâu mới xấu.  ',
						'Bạn gái tôi rất xấu nhưng được cái kết cấu nó đẹp.Tuy mình không đẹp...nhưng còn lâu mới xấu.  ',
						'Bạn gái tôi rất xấu nhưng được cái kết cấu nó đẹp.Thất tình tự tử đu dây điện.Điện giật tê tê chết từ từ  ',
						'Hồi xưa mình đẹp trai lắm...Bây giờ đỡ nhiều rồi.  ',
						'Đau đầu vì tiền, điên đầu vì tình, đâm đầu vào tường.  ',
						'Không bao giờ bán đứng bạn bè… khi chưa được giá.  ',
						'Sống là phải cho đi ! Hãy cho đi tất cả những gì bạn có, để rồi hối hận nhận ra rằng đòi lại sẽ rất khó.  ',
						'Trai thời nay như vàng lên giá...Gái thời nay như đá lót đường.Càng nhìn, anh càng thấy em giống con gái.Ai bảo rằng cây không buồn, không khóc...đá không sầu không nhớ thương ai ? Cây không buồn sao lá vàng rơi rụng. Đá không sầu sao đá phủ rêu xanh. ',
						'Xin bạn hãy dành ra vài giây để đọc hết câu này, đọc đến đây cũng đã hết vài giây rồi, cám ơn bạn.Bình tỉnh, tự tin, đừng cay cú – Âm thầm, chịu đựng, trả thù sau',
						'Trông bạn quen quen, hình như tớ … chưa gặp bao giờ  ',
						'Yêu hoài ốm, ôm hoài yếu.  ',
						'Tiền túng – Tình tan – Tư tưởng tồi tàn – Tiến tới tự tử ',
						'Dù bạn không đẹp nhưng người khác vẫn mắc ói  ',
						'Khi tôi ăn, cả quán dõi theo từng động tác. Tự tin – Gắp nhanh – Phong cách. Tôi thích cơm bụi. Cơm bụi rất lôi cuốn. Lôi cuốn là phải ăn nhanh. Ăn nhanh là sạch sẽ. Tôi là…Sinh viên nghèo!  ',
						'Khi tôi chạy, mọi người dõi theo từng bước chạy của tôi. Mạnh mẽ - Tự tin – Thần tốc. Chạy rất lôi cuốn. Lôi cuốn là phải chạy nhanh. Chạy nhanh thì mới thoát chết. Tôi là…Cướp!  ',
						'Nhà mình nghèo đến nỗi...bột giặt cũng không đủ xài.Mập thì đẹp – Ốm thì dễ thương – Lòi xương thì dễ mến.  ',
						'Trước khi yêu em, anh đã yêu một người phụ nữ khác...đó là mẹ anh.  ',
						'Đằng sau nụ cười là nước mắt...đằng sau nước mắt là..cá sấu.  ',
						'Cũng như bao định luật bảo toàn khác...đói thì phải ăn (định luật bảo toàn tính mạng) ',
						'Có khi nào trên đường đời tấp nập, ta vô tình vấp phải sấp đô la?  ',
						'Giang hồ hiểm ác anh không sợ, chỉ sợ đường về THẤY bóng em.  ',
						'Vì tương lai con em chúng ta. Đánh chết cha con em chúng nó!!!   ',
						'Không nói chuyện trong khi hôn. ',
						'Học hành như cá kho tiêu, kho nhiều thì mặn học nhiều thì ngu. ',
						'Tiên học lễ hậu học....ăn. ',
						'Thiếu nữ là chữ viết tắt của....thiếu nữ tính. ',
						'Còn....nói còn tát. ',
						'Một điều nhịn là chín điều nhục. ',
						'Cá không ăn muối cá ươn. Con không ăn muối....thiếu iot rồi con ơi. ',
						'Hãy cho tôi một điểm tựa, tôi....mỏi lắm rồi. ',
						'Chúng ta yêu súc vật, vì....thịt chúng rất ngon. ',
						'Người yêu không tự sinh ra và cũng không tự mất đi, mà nó chỉ chuyển từ tay thằng này sang tay thằng khác!!! ',
						'Dụng binh không gì quý bằng thần tốc, Dụng đàn bà không gì quý bằng tâng bốc. ',
						'Đằng sau người đàn ông thành công luôn luôn có một người phụ nữ..........nói rằng anh ta sẽ chẳng bao giờ làm được điều gì nên hồn cả.!!',
						'Ăn chọn nơi, chơi chọn hàng, lang thang chọn địa điểm. ',
						'Những cái hôn vụng trộm bao giờ cũng ngọt ngào nhất và bao giờ cũng tiềm ẩn những cái tát nảy đom đóm mắt nhất. ',
						'Để yêu một người đã khó, để đá nó càng khó hơn. ',
						'Đá bồ là một nghệ thuật và người đá bồ cũng là một nghệ sĩ. ',
						'Tình bạn sau tình yêu là phát đạn ân huệ cuả kẻ tử tù.  ',
						'Đèn nhà ai nấy rạng, vợ thằng bạn thì cố mà chăm.',
						'Da thịt đàn bà được nuôi dưỡng bằng âu yếm, lòng dạ đàn bà được nuôi dưỡng bằng kinh phí. ',
						'Trên bước đường thành công không có dấu chân của kẻ lười biếng vì kẻ lười biếng thì có đi bộ bao giờ, nhìn kỹ thì sẽ thấy rất nhiều vết bánh xe của họ để lại. ',
						'Tiền không thành vấn đề,  vấn đề là không có tiền. ',
						'Trăm năm kiều vẫn là kiều. Nên lần đầu khó là điều tất nhiên.  ',
						'Bạn đừng đi tìm người hoàn thiện, vì không có ai hoàn thiện cả. Chỉ khi bạn yêu họ, họ mới hoàn thiện. ',
						'Hoa mọc trên tuyết vẫn tươi, người trong đau khổ vẫn cười là anh. ',
						'Dù ai nói ngả nói nghiêng, chàng lười vẫn cứ triền miên chép bài. ',
						'Yêu nhau trái ấu cũng tròn, ghét nhau đôi dép dẫu mòn cũng chia. ',
						'Kiếp sau xin chớ làm người, nguyện làm gia xúc cho nàng hốt phân. ',
						'Lời nói chẳng mất tiền mua, lựa lời mà nói cho đừng đập nhau. ',
						'Đàn ông miệng rộng thì sang, đàn bà miệng rộng tan hoang cửa nhà. ',
						'Học mà không chơi đánh rơi tuổi trẻ, Chơi mà không học bán rẻ tương lai. Thôi thì ta chọn cả hai, Vừa chơi vừa học tương lai huy hoàng. ',

						'Gà mà không gáy là con gà chiên. 
						Gà mà hay gáy là con gà điên. 
						Đi lang thang trong sân ,bắt con gà, bỏ vô nồi. 
						Mua 2 lon Tiger , nhắm chân gà , nhắm chân gà. 
						Gà mà không gáy là con gà gay. 
						Gà mà không gáy là con gà toi. 
						Đi lang thang trong sân, bắt con gà, ướp tiêu hành. 
						Ăn lăn quay ra, chết tui rùi, cúm gia cầm',

						'Ba là con cá mập, mẹ là con cá voi, con là con cá kình, ba con cá hung hăng, la là lá la la ... quốc hết 1 con bò. 
						Ba là xúc xích bò, Mẹ là xúc xích heo, Con là xúc xích gà, 3 xúc xích ngon ngon, la là lá la la ... Nấu với mì ăn liền. 
						Ba là tên cướp vàng, Mẹ là tên cướp đô, Con là tên cướp tiền, 3 tên cướp lưu manh, la là lá la la ... Cướp hết 1 ngân hàng. 
						Lung lay lung lay tình Mẹ, tình Cha, Lung lay lung lay tội một mái nhà. Lung lay lung lay tình Mẹ tình cha, Lung lay lung lay hai tiếng...ra toà. He he !',

						'Mồng 8/3 em ra ngoài đồng, 
						chọn một bông hoa như con heo tặng bạn gái. 
						Nào bông nào ọe ,nào bông nào bông ghê. 
						1 phút 30 giây, bạn đã bay lên trời',

						'Làm thơ mình vốn không quen 
						Nhưng vì...muốn quá nên xen một bài 
						Bài này không được quá dài 
						Cũng không được ngắn kẻo hoài phí công 
						Làm thơ phải có...màu hồng  
						Có mây,có gió bềnh bồng lướt bay  
						Làm thơ phải có mê say 
						Đã làm là suốt đêm ngày không thôi 
						Không nên chỉ biết viết,ngồi  
						Phải ra ngắm cảnh,nhìn trời...lấy thơ 
						Khi nào đầu óc lơ mơ 
						Học bài thì khó,làm thơ rất vào 
						Mỗi khi cảm xúc tuôn trào  
						Chính là đất nặn để nhào ra thơ 
						Khi nào đầu óc lơ mơ 
						Nói gì thế nhỉ?Ơ ơ...hết rồi 
						Chú ý quan trọng : Đây không phải là bí kíp thật.Bạn nào làm theo là thành thơ...dở hơi ăn canh mồng tơi đó!HÌ HÌ',

						'Lấy vợ nên kiêng lấy vợ non 
						Ra đường ai biết cháu hay con 
						Nhí nha nhí nhảnh đòi vàng bạc 
						Bán cả bàn thờ sắm phấn son!',

						'Lấy vợ ta nên lấy vợ non 
						Tóc thề mườn mượt xõa eo thon 
						Mắt sáng, môi hồng, da tươi thắm 
						Đỡ tiền mua sắm những phấn son!',

						'Lấy vợ nên kiêng lấy vợ già 
						Ra đường ai biết chị hay bà 
						Sinh hai ba lượt mình teo nhếch 
						Má hóp, xương lòi, ốm như ma!',

						'Lấy vợ xin anh lấy vợ già 
						Ra đường em biết chuyện gần xa 
						Lỡ anh đi lạc thì em nhắc 
						Cũng tốt cho anh đó thôi mà!',

						'Lấy vợ nên kiêng vợ ngáy to 
						Đêm nào đi ngủ cũng khò khò 
						Tội đức lang quân nằm kế cạnh 
						Mất ngủ lâu ngày chắc phát ho!'
						),
			'interact' => array(
						'🌟 Quý Chủ Tus <poster> 😘 ❤ Addfr + Ib Tương Tác 🌟 Nào 😘 😍 ❤ 🌟
						https://www.facebook.com/profile.php',
						'🌟 Love You <poster> ❤ TTTốt Nà 😘 😍
						https://www.facebook.com/profile.php',
						)
		);
		$header_content = '💛💞💖 ' . $this->getTag($id_user, $name) . ' Đã Tới 💖💞💛' . urldecode('%0A');
		if($type=='comment'){
			if(isset($content)&&$content!=''){
				$arr_content = explode("\n", $content);
				$get_content = $arr_content[array_rand($arr_content)];
			}
			else{
				if(@$data['type']=='photo'){
					$content_photo = $content_default['photo'];
					$get_content = $content_photo[array_rand($content_photo)];
				}
				else{
					$content_comment = $content_default['comment'];
					$get_content = $content_comment[array_rand($content_comment)];
				}
			}
		}
		else if($type=='interact'){
			if(isset($content)&&$content!=''){
				$arr_content = explode("\n", $content);
				$get_content = $arr_content[array_rand($arr_content)];
			}
			else{
				$content_interact = $content_default['interact'];
				$get_content = $content_interact[array_rand($content_interact)];
			}
		}
		else if($type=='inbox'){
			if(isset($content)&&$content!=''){
				$arr_content = explode("\n", $content);
				$get_content = $arr_content[array_rand($arr_content)];
			}
			else{
				$content_interact = $content_default['inbox'];
				$get_content = $content_interact[array_rand($content_interact)];
			}
		}
		$replace = array('<me>', '<poster>');
		$replaced = array($this->getTag($id_user, $name), $this->getTag($data['from']['id'], $data['from']['name']));
		$get_content = str_replace($replace, $replaced, $get_content);
		$the_loai = array('Love ❤','Yêu 💗','Quý 💓','Cưng 💞','Thích 💘');
		$get_the_loai = $the_loai[array_rand($the_loai)];
		$footer_content = urldecode('%0A') . '[Đóng Dấu] ' . $get_the_loai . ' [' .date('H:i:s d-m-Y') . ']' .
		urldecode('%0A') . '➡ [AuTo && BoT] TạI: HOTLIKE*NET ⬅';
		if(@$bieutuong=='ON') $get_content = $this->getEmoji($get_content);
		if(@$quangcao=='ON') $noidung = $header_content . $get_content . $footer_content;
		else $noidung = $header_content . $get_content;
		return $noidung;
	}
	public function saveFile($path,$y){
		$file = @fopen($path, 'w');
				@fwrite($file, $y);
				@fclose($file);
	}
	public function like($id_user, $caidatcmt, $token){
		$data = $this->getHome($token);
		foreach($data as $post){
			if($this->getData($id_user, $post, 'like')&&$id_user!=$post['from']['id']){
				echo $this->cURL('https://graph.facebook.com/' . $post['id'] . '/likes?method=post&access_token=' . $token) . ' ';
			}
			if($caidatcmt=='ON'){
				$number_comment = @count($post['comments']['data']);
				if($number_comment > 0){
					if($number_comment > 5) $cat_comment = $number_comment - 5;
					else $cat_comment = 0;
					for($i=$cat_comment;$i<$number_comment;$i++){
						if($this->getData($id_user, $post['comments']['data'][$i], 'like')){
							echo $this->cURL('https://graph.facebook.com/' . $post['comments']['data'][$i]['id'] . '/likes?method=post&access_token=' . $token) . ' ';
						}
					}
				}
			}
		}
	}
	public function reaction($id_user, $token, $type){
		$data = $this->getHome($token);
		foreach($data as $post){
			if($this->getData($id_user, $post, 'reaction')&&$id_user!=$post['from']['id']){
				echo $this->cURL('https://graph.facebook.com/' . $post['id'] . '/reactions?method=post&type=' . $type . '&access_token=' . $token) . ' ';
			}
		}
	}
	public function comment($id_user, $name, $token, $bieutuong, $quangcao, $content){
		$data = $this->getHome($token);
		foreach($data as $post){
			if($this->getData($id_user, $post, 'comment')&&$id_user!=$post['from']['id']){
				$comment = $this->getContent(@$post, $id_user, $name, $bieutuong, $quangcao, 'comment', $content);
				echo $this->cURL('https://graph.facebook.com/' . $post['id'] . '/comments?method=post&message=' . urlencode($comment) . '&access_token=' . $token) . ' ';
			}
		}
	}
	public function interact($id_user, $name, $token, $bieutuong, $quangcao, $content){
		$data = $this->getHome($token);
		foreach($data as $post){
			if($this->getData($id_user, $post, 'interact')&&$id_user!=$post['from']['id']){
				$interact = $this->getContent(@$post, $id_user, $name, $bieutuong, 'ON', 'interact', $content);
				echo $this->cURL('https://graph.facebook.com/' . $post['id'] . '/comments?method=post&message=' . urlencode($interact) . '&access_token=' . $token) . ' ';
			}
		}
	}
}
?>