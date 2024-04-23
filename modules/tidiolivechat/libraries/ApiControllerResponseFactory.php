<?php

declare(strict_types=1);

class ApiControllerResponseFactory
{
    public function printOkResponse(array $responseData): void
    {
        header('Content-Type: application/json');
        header('Status: 200 OK');
        http_response_code(200);
        echo json_encode($responseData);
    }

    public function printCreatedResponse(array $responseData): void
    {
        header('Content-Type: application/json');
        header('Status: 201 Created');
        http_response_code(201);
        echo json_encode($responseData);
    }

    public function printNoContentResponse(): void
    {
        header('Content-Type: application/json');
        header('Status: 204 No Content');
        http_response_code(204);
    }

    public function printErrorResponse(string $errorMessage): void
    {
        header('Content-Type: application/json');
        header('Status: 400 Bad Request');
        http_response_code(400);
        echo json_encode([
            'error' => $errorMessage,
        ]);
    }
}
