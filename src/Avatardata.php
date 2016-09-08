<?php
/**
 * 
 */

namespace yishuixm\avatardata;

class AvatardataApi
{

    public static $error_code_list = [
        '0'=>	'请求成功',
        '1'=>	'参数错误',
        '10001'=>	'错误的请求KEY',
        '10002'=>	'该KEY无请求权限',
        '10003'=>	'KEY过期',
        '10004'=>	'错误的OPENID',
        '10005'=>	'应用未审核超时，请提交认证',
        '10006'=>	'未知的请求源',
        '10007'=>	'被禁止的IP',
        '10008'=>	'被禁止的KEY',
        '10009'=>	'当前IP请求超过限制',
        '10010'=>	'请求超过次数限制，请购买套餐',
        '10011'=>	'账户余额不足，请充值',
        '10012'=>	'测试KEY超过请求限制',
        '10013'=>	'请求错误，请重试',
        '10014'=>	'接口维护',
        '10015'=>	'接口停用',
        '10016'=>	'当日调用次数到达上限，请明日重试或联系我们申请更多上限次数',
    ];


    /**
     * 短信发送
     * @param string  	$key        应用APPKEY
     * @param string  	$mobile     发送手机号
     * @param string  	$templateId 短信模板ID
     * @param string  	$param      用于替换模板标志位的参数
     * @param integer 	$id         默认0 区分同一手机号发送的次数
     */
    public static function Sms($key, $mobile, $templateId, $param){

        $url = "http://v1.avatardata.cn/Sms/Send?key={$key}&mobile={$mobile}&templateId={$templateId}&param={$param}";
        $response = @file_get_contents($url);
        if($response){
            $json_data = json_decode($response, true);
            $erros = self::$error_code_list[$json_data['error_code']];
            if(intval($json_data['error_code'])===0){
                return [
                    'accessGranted'		=> true,
                    'errors'					=> $erros,
                ];
            }else{
                return [
                    'accessGranted'		=> false,
                    'errors'					=> $erros,
                ];
            }
        }else{
            return [
                'accessGranted'		=> false,
                'errors'					=> '发送失败请稍候再试……',
            ];
        }
    }


    /**
     * 实名认证
     * @param string $key      应用APPKEY
     * @param string $realname 真实姓名
     * @param string $idcard   身份证号
     */
    public static function IdCardCertificateVerify($key, $realname, $idcard){
        $url = "http://api.avatardata.cn/IdCardCertificate/Verify?key={$key}&realname={$realname}&idcard={$idcard}";
        $response = @file_get_contents($url);
        if($response){
            $json_data = json_decode($response, true);
            $erros = self::$error_code_list[$json_data['error_code']];
            if(intval($json_data['error_code'])===0){
                return [
                    'accessGranted'		=> true,
                    'errors'					=> '',
                    'result'					=> $json_data['result']
                ];
            }else{
                return [
                    'accessGranted'		=> false,
                    'errors'					=> $erros
                ];
            }
        }else{
            return [
                'accessGranted'		=> false,
                'errors'					=> '发送失败请稍候再试……'
            ];
        }
    }


    /**
     * 银行卡认证
     * @param string $key      		应用APPKEY
     * @param string $realname 		真实姓名
     * @param string $idcard   		身份证号
     * @param string $bankcardno   银行卡号
     * @param string $tel   			在银行预留的手机号
     */
    public static function IdCardBankMobileCertificateVerify($key, $realname, $idcard, $bankcardno, $tel){
        $url = "http://api.avatardata.cn/IdCardBankMobileCertificate/Verify?key={$key}&realname={$realname}&idcard={$idcard}&bankcardno={$bankcardno}&tel={$tel}";
        $response = @file_get_contents($url);
        if($response){
            $json_data = json_decode($response, true);
            $erros = self::$error_code_list[$json_data['error_code']];
            if(intval($json_data['error_code'])===0){
                return [
                    'accessGranted'		=> true,
                    'errors'					=> '',
                    'result'					=> $json_data['result']
                ];
            }else{
                return [
                    'accessGranted'		=> false,
                    'errors'					=> $erros
                ];
            }
        }else{
            return [
                'accessGranted'		=> false,
                'errors'					=> '发送失败请稍候再试……'
            ];
        }
    }

    /**
     * 快递公司列表
     * @param string $key      		应用APPKEY
     */
    public static function ExpressNumberCompany($key){
        $url = "http://api.avatardata.cn/ExpressNumber/Company?key={$key}";
        $response = @file_get_contents($url);
        if($response){
            $json_data = json_decode($response, true);
            $erros = self::$error_code_list[$json_data['error_code']];
            if(intval($json_data['error_code'])===0){
                return [
                    'accessGranted'		=> true,
                    'errors'					=> '',
                    'result'					=> $json_data['result']
                ];
            }else{
                return [
                    'accessGranted'		=> false,
                    'errors'					=> $erros
                ];
            }
        }else{
            return [
                'accessGranted'		=> false,
                'errors'					=> '发送失败请稍候再试……'
            ];
        }
    }

    /**
     * 快递公司查单
     * @param string $key      		应用APPKEY
     * @param string $company		公司CODE
     * @param string $id			运单号
     */
    public static function ExpressNumberLookup($key,$company,$id){
        $url = "http://api.avatardata.cn/ExpressNumber/Lookup?key={$key}&company={$company}&id={$id}";
        $response = @file_get_contents($url);
        if($response){
            $json_data = json_decode($response, true);
            $erros = self::$error_code_list[$json_data['error_code']];
            if(intval($json_data['error_code'])===0){
                return [
                    'accessGranted'		=> true,
                    'errors'					=> '',
                    'result'					=> $json_data['result']
                ];
            }else{
                return [
                    'accessGranted'		=> false,
                    'errors'					=> $erros
                ];
            }
        }else{
            return [
                'accessGranted'		=> false,
                'errors'					=> '发送失败请稍候再试……'
            ];
        }
    }
}