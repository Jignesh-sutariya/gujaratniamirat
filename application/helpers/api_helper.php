<?php 
if ( ! function_exists('post'))
{
    function post()
    {
        $CI =& get_instance();
        if ($CI->input->server('REQUEST_METHOD') == "POST") {
            return TRUE;
        }else{
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
                            If all else fails, you can visit our home page at the link below.</p><a href="">Visit the Home
                            Page</a>
                    </body>

                    </html>';
            die();
        }
    }
}

if ( ! function_exists('get'))
{
    function get()
    {
        $CI =& get_instance();
        if ($CI->input->server('REQUEST_METHOD') == "GET") {
            return TRUE;
        }else{
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
                            If all else fails, you can visit our home page at the link below.</p><a href="">Visit the Home
                            Page</a>
                    </body>

                    </html>';
            die();
        }
    }
}

if ( ! function_exists('verifyRequiredParams'))
{
    function verifyRequiredParams($required_fields)
    {

        $CI =& get_instance();
        $error = false;
        $error_fields = "";
        $request_params = array();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $request_params = $CI->input->post();
        }else{
            $request_params = $_REQUEST;
        }
        
        if ($_SERVER['REQUEST_METHOD'] == 'GET' || $_SERVER['REQUEST_METHOD'] == 'PUT') 
        {
            parse_str($_SERVER['QUERY_STRING'], $request_params);
        }
        
        foreach ($required_fields as $field) 
        {
            if (!isset($request_params[$field]) || strlen(trim($request_params[$field])) <= 0) 
            {
                $error = true;
                $error_fields .= $field . ', ';
            }
        }

        if ($error) 
        {
            $response = array();
            $response["error"] = true;
            $response["message"] = 'Required field(s) ' . substr($error_fields, 0, -2) . ' is missing or empty';
            
            echoRespnse(200, $response);
        }
    }
}

if ( ! function_exists('echoRespnse'))
{
    function echoRespnse($status_code, $response)
    {
        $CI =& get_instance();
        
        http_response_code ($status_code); 
        header('Content-Type: application/json');

        echo json_encode($response);
        die();
    }
}

if ( ! function_exists('authenticate'))
{
    function authenticate($table)
    {
        $CI =& get_instance();
        
        $headers = apache_request_headers();
        $response = array();
        
        if (isset($headers['Authorization'])) 
        {
            $key = $headers['Authorization'];        
            
            if (!$k=isValidApiKey($key,$table)) 
            {            
                $response["error"] = true;
                $response["message"] = "Access Denied Invalid Id";
                echoRespnse(200, $response);
            } else {
                return $key;
            }
        } else {
            $response["error"] = true;
            $response["message"] = "Api key is misssing";
            echoRespnse(200, $response);
        }
    }
}

if ( ! function_exists('isValidApiKey'))
{
    function isValidApiKey($key,$table)
    {
        $CI =& get_instance();
        $id = $CI->main->check($table, ['id'=>$key], 'id');
        if ($id) {
            return TRUE;
        }else{
            return FALSE;
        }
    }
}

if ( ! function_exists('mobile'))
{
    function mobile()
    {
        $CI =& get_instance();
        $CI->load->library('user_agent');
        if (!$CI->agent->is_mobile() && ENVIRONMENT == 'production') {
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
                            If all else fails, you can visit our home page at the link below.</p><a href="">Visit the Home
                            Page</a>
                    </body>

                    </html>';
            die();
        }
    }
}