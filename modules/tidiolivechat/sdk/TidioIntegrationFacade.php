<?php

declare(strict_types=1);

class TidioIntegrationFacade
{
    public const MODULE_STATUS_NONINTEGRATED = 'nonintegrated';
    public const MODULE_STATUS_INTEGRATED = 'integrated';

    private const UTM_SOURCE = 'platform';
    private const UTM_MEDIUM = 'prestashop';

    /**
     * @var TidioApi
     */
    private $api;
    /**
     * @var string
     */
    private $panelUrl;
    /**
     * @var string
     */
    private $widgetUrl;

    public function __construct(TidioApi $api, string $panelUrl, string $widgetUrl)
    {
        $this->api = $api;
        $this->panelUrl = $panelUrl;
        $this->widgetUrl = $widgetUrl;
    }

    public function createExternalProject(string $url): TidioProjectKeysDto
    {
        $response = $this->api->sendPostRequest('/prestaShop', [], [
            'url' => $url,
        ]);

        return $this->createProjectKeysDto([
            'public_key' => $response->data()['publicKey'],
            'private_key' => $response->data()['privateKey'],
        ]);
    }

    public function checkIfEmailIsRegistered(array $data): bool
    {
        $response = $this->api->sendGetRequest('/access/checkIfEmailIsRegistered', $data);

        return $response->data()['value']['registered'];
    }

    public function getAccessToken(string $email, string $password): string
    {
        $response = $this->api->sendGetRequest('/access/getUserToken', [
            'email' => $email,
            'password' => $password,
        ]);

        return $response->data()['value'];
    }

    public function getProjectByPublicKey(string $token, string $publicKey): TidioProjectDto
    {
        $path = sprintf('/project/%s', $publicKey);
        $response = $this->api->sendGetRequest($path, [
            'api_token' => $token,
        ]);

        if (empty($response->data()['value'])) {
            throw new TidioApiException(
                sprintf('Project with public key %s doesn\'t exist', $publicKey)
            );
        }

        $projectData = $response->data()['value'][0];

        return $this->createProjectDto($projectData);
    }

    /**
     * @return TidioProjectDto[]
     *
     * @throws TidioApiException
     */
    public function getProjects(string $token): array
    {
        $response = $this->api->sendGetRequest('/project', [
            'api_token' => $token,
        ]);

        return array_map(
            function (array $projectData) {
                return $this->createProjectDto($projectData);
            },
            $response->data()['value']
        );
    }

    public function integrateProject(string $token, string $publicKey): void
    {
        $this->api->sendPutRequest('/prestaShop/integrate', [
            'api_token' => $token,
            'project_public_key' => $publicKey,
        ]);
    }

    public function prepareRedirectUrl(string $privateKey, string $email): string
    {
        $queryParameters = [
            'privateKey' => $privateKey,
            'tour_default_email' => $email,
            'utm_source' => self::UTM_SOURCE,
            'utm_medium' => self::UTM_MEDIUM,
        ];

        return sprintf('%s/external-access?%s', $this->panelUrl, http_build_query($queryParameters));
    }

    public function prepareWidgetUrlForProject(string $projectPublicKey): string
    {
        return sprintf('%s/%s.js', $this->widgetUrl, $projectPublicKey);
    }

    private function createProjectDto(array $projectData): TidioProjectDto
    {
        $projectKeysDto = $this->createProjectKeysDto($projectData);

        return new TidioProjectDto(
            $projectData['id'],
            $projectData['name'],
            $projectData['platform'],
            (bool) $projectData['install'],
            $projectKeysDto
        );
    }

    private function createProjectKeysDto(array $projectData): TidioProjectKeysDto
    {
        return new TidioProjectKeysDto(
            $projectData['public_key'],
            $projectData['private_key']
        );
    }
}
