<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('my_crypt'))
{
    function my_crypt($string, $action = 'e' )
    {
        $secret_key = 'starline_key';
	    $secret_iv = 'starline_iv';

	    $output = false;
	    $encrypt_method = "AES-256-CBC";
	    $key = hash( 'sha256', $secret_key );
	    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );

	    if( $action == 'e' ) {
	        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
	    }
	    else if( $action == 'd' ){
	        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
	    }

	    return $output;
    }   
}

if ( ! function_exists('flashMsg'))
{
    function flashMsg($success, $succmsg, $failmsg, $redirect)
    {
    	$CI =& get_instance();
        
        if ($success)
            $CI->session->set_flashdata('success',$succmsg);
        else
            $CI->session->set_flashdata('error', $failmsg);
        
        return redirect($redirect);
    }
}

if ( ! function_exists('assets'))
{
    function assets($url='')
    {
        return base_url('assets/').$url;
    }
}

if ( ! function_exists('re'))
{
    function re($array='')
    {
        echo "<pre>";
        print_r($array);
        exit;
    }
}

if ( ! function_exists('send_sms'))
{
    function send_sms($sms, $mobile)
    {
        if ($_SERVER['HTTP_HOST'] != 'localhost' && ENVIRONMENT === 'production') 
        {
            $url = 'key=35F6302ED228F8&routeid=415&type=text&contacts='.$mobile.'&senderid=DENSTK&msg='.urlencode($sms);

            $base_URL ='http://kutility.in/app/smsapi/index?'.$url;
            
            $curl_handle = curl_init();
            curl_setopt($curl_handle,CURLOPT_URL,$base_URL);
            curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
            curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
            $result = curl_exec($curl_handle);        
            curl_close($curl_handle);
        }
    }
}

if ( ! function_exists('admin'))
{
    function admin($url='')
    {
        return "adminPanel/$url";
    }
}

if ( ! function_exists('front'))
{
    function front($url='')
    {
        return "front/$url";
    }
}

if ( ! function_exists('e_id'))
{
    function e_id($id)
    {
        return $id * 44545;
    }
}

if ( ! function_exists('d_id'))
{
    function d_id($id)
    {
        return $id / 44545;
    }
}

if ( ! function_exists('error_404'))
{
    function error_404()
    {
        echo '<html>
                    <head>
                        <title>404 Page Not Found</title>
                        <style>
                            body {
                                margin: 0;
                                padding: 30px;
                                font: 12px/1.5 Helvetica, Arial, Verdana, sans-serif;
                            }

                            h1 {
                                margin: 0;
                                font-size: 48px;
                                font-weight: normal;
                                line-height: 48px;
                            }

                            strong {
                                display: inline-block;
                                width: 65px;
                            }
                        </style>
                    </head>

                    <body>
                        <h1>404 Page Not Found</h1>
                        <p>The page you are looking for could not be found. Check the address bar to ensure your URL is spelled correctly.
                            If all else fails, you can visit our home page at the link below.</p><a href="'.base_url().'">Visit the Home
                            Page</a>
                    </body>

                    </html>';
            die();
    }
}