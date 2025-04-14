<?php declare(strict_types = 1);

namespace Autodeal\Presentation\templates;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Loader\FilesystemLoader;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
//include '../../../bootstrap.php';

abstract class AbstractRender
{
    protected string $path = BASE_DIR . '/src/Presentation/templates/';

    public function getPath(): string
    {
        return $this->path;
    }
    protected string $templateName = 'base.twig';

    protected $twig;

    public function __construct() {
        $this->twig = new Environment(new FilesystemLoader($this->path));
    }
    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function renderTemplate($params = []): Response {
        return new Response($this->twig->render($this->templateName, $params), Response::HTTP_OK);
    }
}