<?php

namespace Wynd\ApiBundle\Service\Login;

use Exception;
use phpseclib3\Net\SFTP;

class LoginSFTP
{
    private $host;
    private $user;
    private $password;
    
    public function __construct(string $host, string $user, string $password)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
    }
    
    public static function sftpConnexion()
    {
        $host = $_ENV['SFTP_HOST'] ?? null;
        $user = $_ENV['SFTP_USER'] ?? null;
        $password = $_ENV['SFTP_PASSWORD'] ?? null;
        
        $sftp = new SFTP($host);
        if (!$sftp->login($user, $password)) {
            die('SFTP login failed');
        }
        return $sftp;
    }
}