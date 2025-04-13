Для развертывания проекта необходимо установить docker и composer.
Затем открыть папку с проектом в консоли и прописать команды docker-compose up -d --build
(--build для сборки проекта, после сборки, флаг необходимо убрать)
docker-compose exec php-fpm composer install.
Для выключения микросервиса, прописать docker-compose down
