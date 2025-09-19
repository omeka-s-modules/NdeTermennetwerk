# Adding a newly available Network of Terms source

In the current implementation of the NdeTermennetwerk module the available sources are hardcoded.

The [Network of Terms](https://termennetwerk.netwerkdigitaalerfgoed.nl/en) (Termennetwerk) is an services which gives standardized access to a variety of durable terminology sources. The service is maintained by the Cultural Heritage Agency of the Netherlands ([RCE](https://english.cultureelerfgoed.nl/)). When there is a demand for a source to be added and this source is available via SPARQL and is well maintained, the RCE can add a source.

The software, query definitions and catalog of services are maintained via the [Network of Terms Github](https://github.com/netwerk-digitaal-erfgoed/network-of-terms/tree/master/packages/network-of-terms-catalog/catalog/datasets).

Via the [GraphQL API of the Network of Terms](https://termennetwerk-api.netwerkdigitaalerfgoed.nl/graphiql), the list of sources can be retrieved in a standardized way:

```graphql
query Sources {
  sources {
    uri
    name
    creators {
      alternateName
    }
  }
}
```

To make a newly added terminology source available to this module, the following files have to be edited and after testing in a development environment they should be provided to this repo via a pull request.

## 1 - Gather information about new terminology source

Lookup the relevant definition file (dataset) in the [catalog](https://github.com/netwerk-digitaal-erfgoed/network-of-terms/tree/master/packages/network-of-terms-catalog/catalog/datasets). 

For example, [rtf-personen.jsonld](https://github.com/netwerk-digitaal-erfgoed/network-of-terms/blob/master/packages/network-of-terms-catalog/catalog/datasets/rtf-personen.jsonld):
```json
{
  "@context": "https://schema.org",
  "@id": "https://fryslan.regiotermen.nl/personen",
  "@type": "Dataset",
  "name": [
    {
      "@language": "en",
      "@value": "Regiotermen Fryslân: Persons"
    },
    {
      "@language": "nl",
      "@value": "Regiotermen Fryslân: Personen"
    }
  ],
  ...
}
```
Take note of the English `name` of the Dataset (to be used as `label`) and the (persistent) @id of the Dataset (to be used as `source`).

## 2 - Update [src/Service/NdeTermsDataTypeFactory.php](src/Service/NdeTermsDataTypeFactory.php)

The `$types` array in the src/Service/NdeTermsDataTypeFactory.php file should be expanded with an entry like:

```php
  'valuesuggest:ndeterms:rtf' => [
    'label' => 'Regiotermen Fryslân: Persons', // @translate
    'source' => 'https://fryslan.regiotermen.nl/personen',
  ],
```

The key of the source in the `$types` array should be unique. The last part (`rtf` in this example) is made up. Be aware that this key is used within the definition of resource templates and therefor **MUST NOT** change. For consistency, the label should be prepended with "NDE: ".

## 3 - Update [config/module.config.php](config/module.config.php)

Add map the new source by key to `the `Service\NdeTermsDataTypeFactory::class` in the `data_type` => `factories` array, like:

```php
  'valuesuggest:ndeterms:rtf' => Service\NdeTermsDataTypeFactory::class,
```

## 4 - Update [README.md](README.md)

The README.md contains a description of the module as well of the list of terminology sources available via this module. The README.md is also the source of the module information page https://omeka.org/s/modules/NdeTermennetwerk/

The (English) name of the new source should be added to the list of this README.md file.

## 5 - Update version in [config/module.ini](config/module.ini)

The file config/module.ini contains the versionnumber of the module. When new terminology sources are added the patch level of the version should be incremented. Upon release the patch number should be set to 0 and the minor version number should be increased.

## 6 - Update language strings


The `// @translate` tag in [src/Service/NdeTermsDataTypeFactory.php](src/Service/NdeTermsDataTypeFactory.php) indicates a new English term which has to be translated.

?? Can the nl_NL.po be directly updated of should `gulp i18n:template` be issued first, or should this be done via [Transifex](https://app.transifex.com/omeka/omeka-s/translate/#nl_NL/module-NdeTermennetwerk)