<?php
namespace NdeTermennetwerk\Suggester;

use Laminas\Http\Client;
use ValueSuggest\Suggester\SuggesterInterface;
use Omeka\Module\Manager as ModuleManager;

/**
 * Implementation following the structure of other Suggester classes, mainly
 * RdaSuggestAll
 */
class NdeTermsSuggest implements SuggesterInterface
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var string The term source URI.
     */
    protected $source;

    /**
     * @var ModuleManager
     */
    protected $moduleManager;

    public function __construct(Client $client, $source, ModuleManager $moduleManager)
    {
        $this->client = $client;
        $this->source = $source;
        $this->moduleManager = $moduleManager;
    }

    /**
     * Retrieve suggestions from the Dutch Digital Heritage Network of Terms
     * using GraphQL.
     *
     * @see https: //termennetwerk.netwerkdigitaalerfgoed.nl/faq
     * @todo implement info property using SKOS-properties from NDE
     *
     * @param string $query search phrase
     * @param string $lang language identifier, not supported by NDE Termennetwerk (yet?)
     * @return array sorted list of suggestions (see ../SuggesterInterface.php)
     */
    public function getSuggestions($query, $lang = null): array
    {
        // if someone tinkers with the javascript we still check the minimal
        // query length.
        if (strlen($query) < 4) {
            return [];
        }
        $module = $this->moduleManager->getModule('NdeTermennetwerk');
        $version = $module ? $module->getIni('version') : '1.0.0';
        $agent = "Omeka S ValueSuggest NdeTermennetwerk/{$version}";
        $endpoint = "https://termennetwerk-api.netwerkdigitaalerfgoed.nl/graphql";
        $graphqlQuery = $this->buildQuery($query, $this->source);
        $result = $this->graphqlExecute($endpoint, $agent, $graphqlQuery);
        $suggestions = $this->parseResult($result);
        return $suggestions;
    }

    /**
     * Generate the GraphQL query
     *
     * @param string $searchPhrase search phrase we will try to find terms for
     * @param string $source URI of the terms source we are retrieving results from
     */
    private function buildQuery($searchPhrase, $source): string
    {
        return <<<EOD
query FindTerm {
    terms(
        sources: ["$source"],
        query: "$searchPhrase",
        queryMode: OPTIMIZED)
    {
        source {
            name
        }
        result {
            ... on Terms {
                terms {
					uri
					prefLabel 
					altLabel 
					scopeNote
					broader { prefLabel }
					narrower { prefLabel }
					related { prefLabel }
					exactMatch { prefLabel }
				}
            }
            ... on Error {
                message
            }
        }
    }
}
EOD;
    }

    /**
     * Execute a GraphQL query and retrieve the result as an PHP array structure
     * or an empty array if an I/O error occured
     *
     * @param string $endpoint NDE Termennetwerk GraphQL endpoint URI
     * @param string $agent agent string for the HTTP request
     * @param string $query GraphQL query to execute
     * @return array PHP array structure which is basically decoded JSON wrapped in an array
     */
    private function graphqlExecute(string $endpoint, string $agent, string $query): array
    {
        $headers = $this->client->getRequest()->getHeaders();
        $headers->addHeaderLine('Content-Type', 'application/json');
        $headers->addHeaderLine('User-Agent', $agent);
        $response = $this->client
            ->setUri($endpoint)
            ->setMethod('POST')
            ->setRawBody(json_encode(['query' => $query]))
            ->send();
        if (!$response->isSuccess()) {
            return [];
        }
        return json_decode($response->getBody(), true) ?? [];
    }

    /**
     * Parse the result form the GraphQL query and format it according to the
     * SuggesterInterface specification.
     *
     * @param array $result GraphQL query result (i.e. JSON decoded into PHP array structure) wrapped in an array
     * @return array sorted list of suggestions (see ../SuggesterInterface.php)
     */
    private function parseResult($result): array
    {
        $suggestions = [];
        if (!isset($result['errors'])) {
            $baseNode = @$result["data"]["terms"][0]["result"]["terms"] ?: [];
            if (count($baseNode) > 0) {
                foreach ($baseNode as $item) {
                    $uri = @$item["uri"] ?: false;
                    $label = @$item["prefLabel"][0] ?: false;

                    $infos = [];
                    if (count(@$item["scopeNote"]) > 0) {
                        array_push($infos, join("\n", @$item["scopeNote"]) . "\n");
                    }
                    if (count(@$item["altLabel"]) > 0) {
                        array_push($infos, "Alternative label: " // @translate
                            . join(", ", @$item["altLabel"]));
                    }
                    if (count(@$item["broader"]) > 0) {
                        array_push($infos, "Broader term: " // @translate
                            . join(", ", array_map(function ($element) { return $element["prefLabel"][0] ?? null; }, $item["broader"])));
                    }
                    if (count(@$item["narrower"]) > 0) {
                        array_push($infos, "Narrower term: " // @translate
                            . join(", ", array_map(function ($element) { return $element["prefLabel"][0] ?? null; }, $item["narrower"])));
                    }
                    if (count(@$item["related"]) > 0) {
                        array_push($infos, "Related term: " // @translate
                            . join(", ", array_map(function ($element) { return $element["prefLabel"][0] ?? null; }, $item["related"])));
                    }

                    array_push($infos, "\nURI: " . $uri);

                    $info = join("\n", $infos);

                    if ($uri && $label) {
                        array_push($suggestions, ['value' => $label, 'data' => ['uri' => $uri, 'info' => $info]]);
                    }
                }
                usort($suggestions, function ($a, $b) {
                    return strcmp($a['value'], $b['value']);
                });
            }
        }
        return $suggestions;
    }
}
