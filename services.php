<?php
/*
 * class xử lý gạch thẻ
 * author: Nguyen Tat Loi
 * date: 26/03/2014
 */
Class ChargingAPIServices
{
    private $config;

    /*
     * hàm khởi tạo, truyền tham số config vào
     * biến config lấy từ file config.php
     * author: Nguyen Tat Loi
     * date: 26/03/2014
     */
    public function ChargingAPIServices($config)
    {
        $this->config = $config;
    }

    /*
     * gọi sang bên gạch thẻ
     * author: Nguyen Tat Loi
     * date: 26/03/2014
     */
    public function charging($info)
    {
        $url = $this->config['ws_url'];
        $url .= '?method=verifyCard';
        $url .= '&partnerId='.$this->config['partnerId'];
        $url .= '&cardSerial='.$info['cardSerial'];
        $url .= '&cardPin='.$info['cardPin'];
        $transid = $this->get_transid($this->config);
        $url .= '&transId='.$transid;
        $url .= '&telcoCode='.$info['telcoCode'];
        $url .= '&targetAcc='.$this->config['targetAcc'];
        $url .= '&password='.md5($this->config['password']);
        $url .= '&signature='.$this->signature_hash($transid, $this->config, $info);

        $response = $this->get_curl($url);

        if(!empty($response)){
            $response = $this->parseArray($response);
            if(!empty($response['status'])){

                return $response;
                //redirec sang trang gọi confirm giao dịch
                //hiện tại chưa làm vì chưa dựng xong webservice
                /*$url_response = $this->config['url_response'].'?transid='.$response['transId'];
                header('location: '.$url_response);
                exit;*/
            }else{
                echo 'Tham số truyền về không đúng định dạng. Mời bạn liên hệ với nhà cung cấp dịch vụ để biết thêm chi tiết'; die;
            }
        }else{
            echo 'Gạch thẻ không thành công. Mời bạn kiểm tra lại đường truyền và bật các extendsion cần thiết.'; die;
        }

    }

    /*
     * function mã hóa chữ ký
     * author: Nguyen Tat Loi
     * date: 26/03/2014
     */
    private function signature_hash($transId, $config, $data)
    {
        return md5($config['partnerId'].'&'.$data['cardSerial'].'&'.$data['cardPin'].'&'.$transId.'&'.$data['telcoCode'].'&'.md5($config['password']));
    }

    /*
     * function tạo mã giao dịch (transid) theo partner
     * author: Nguyen Tat Loi
     * date: 26/03/2014
     */
    private function get_transid($config)
    {
        return $config['partnerId'].'_'.date('YmdHis').'_'.rand(0, 999);
    }

    /*
     * function parse string response to Array
     * it make developer to easy to process
     * author: Nguyen Tat Loi
     * date: 27/03/2014
     */
    private function parseArray($response)
    {
        $return = array();
        $response = explode('&', $response);
        if(!empty($response)){
            foreach($response as $key => $value){
                $data = explode('=', $value);
                if(!empty($data[1])){
                    $return[$data[0]] = $data[1];
                }
            }
            return $return;
        }else{
            return array();
        }
    }

    /*
     * function get curl
     * author: Nguyen Tat Loi
     * date: 26/03/2014
     */
    private function get_curl($url)
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);

        $str = curl_exec($curl);
        if(empty($str)) $str = $this->curl_exec_follow($curl);
        curl_close($curl);

        return $str;
    }
    /*
     * function dùng curl gọi đến link
     * author: Nguyen Tat Loi
     * date: 26/03/2014
     */
    private function curl_exec_follow($ch, &$maxredirect = null)
    {
        $user_agent = "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.7.5)".
            " Gecko/20041107 Firefox/1.0";
        curl_setopt($ch, CURLOPT_USERAGENT, $user_agent );

        $mr = $maxredirect === null ? 5 : intval($maxredirect);

        if (ini_get('open_basedir') == '' && ini_get('safe_mode' == 'Off')) {

            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, $mr > 0);
            curl_setopt($ch, CURLOPT_MAXREDIRS, $mr);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        } else {

            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);

            if ($mr > 0)
            {
                $original_url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
                $newurl = $original_url;

                $rch = curl_copy_handle($ch);

                curl_setopt($rch, CURLOPT_HEADER, true);
                curl_setopt($rch, CURLOPT_NOBODY, true);
                curl_setopt($rch, CURLOPT_FORBID_REUSE, false);
                do
                {
                    curl_setopt($rch, CURLOPT_URL, $newurl);
                    $header = curl_exec($rch);
                    if (curl_errno($rch)) {
                        $code = 0;
                    } else {
                        $code = curl_getinfo($rch, CURLINFO_HTTP_CODE);
                        if ($code == 301 || $code == 302) {
                            preg_match('/Location:(.*?)\n/', $header, $matches);
                            $newurl = trim(array_pop($matches));

                            if(!preg_match("/^https?:/i", $newurl)){
                                $newurl = $original_url . $newurl;
                            }
                        } else {
                            $code = 0;
                        }
                    }
                } while ($code && --$mr);

                curl_close($rch);

                if (!$mr)
                {
                    if ($maxredirect === null)
                        trigger_error('Too many redirects.', E_USER_WARNING);
                    else
                        $maxredirect = 0;

                    return false;
                }
                curl_setopt($ch, CURLOPT_URL, $newurl);
            }
        }
        return curl_exec($ch);
    }

}
?>