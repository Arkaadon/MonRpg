<?php
namespace Rpg\Utils;
require_once __DIR__ . '/../../config/bootstrap.php';

abstract class AbstractController
{
    protected $em;

    public function __construct()
    {
        $this->em = GetEntityManager();
    }

    public function render(string $file, array $variables)
    {
        ob_start();

        extract($variables);

        include sprintf(__DIR__ . '/../../templates/%s', $file);

        echo ob_get_clean();
    }
}