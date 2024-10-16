require 'vendor/autoload.php';

use Aws\S3\S3Client;

$s3 = new S3Client([
'version' => 'latest',
'region' => 'us-east-1',
'endpoint' => 'http://localstack:4566', // URL do LocalStack
'use_path_style_endpoint' => true,
]);

// Criar um bucket no S3 local
$s3->createBucket(['Bucket' => 'meu-bucket']);