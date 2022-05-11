<?php
declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

$basePath = realpath(dirname(__FILE__) . '/..');
$dotenv = Dotenv\Dotenv::createImmutable($basePath);
$dotenv->load();

require_once dirname(__DIR__) . '/routes/web.php';
?>

<style>
<?php echo include dirname(__DIR__) . '/public/app.css'?>
</style>